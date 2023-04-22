<?php

namespace App\Services;

use App\Models\AdminUser;
use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Illuminate\Support\Facades\Auth;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/**
 * @method AdminUser getModel()
 * @method AdminUser|\Illuminate\Database\Query\Builder query()
 */
class WebSocketService implements WebSocketHandlerInterface
{
    /**@var \Swoole\Table $wsTable */
    private $wsTable;
    public function __construct()
    {
        $this->wsTable = app('swoole')->wsTable;
    }
    // 场景：WebSocket中UserId与FD绑定
    public function onOpen(Server $server, Request $request)
    {
        // var_dump(app('swoole') === $server);// 同一实例
        /**
         * 获取当前登录的用户
         * 此特性要求建立WebSocket连接的路径要经过Authenticate之类的中间件。
         * 例如：
         * 浏览器端：var ws = new WebSocket("ws://127.0.0.1:5200/ws");
         * 那么Laravel中/ws路由就需要加上类似Authenticate的中间件。
         * Route::get('/ws', function () {
         *     // 响应状态码200的任意内容
         *     return 'websocket';
         * })->middleware(['auth']);
         */
        $user = Auth::user();
        $userId = $user ? $user->id : 0; // 0 表示未登录的访客用户
        if (!$userId) {
            // 未登录用户直接断开连接
            $server->disconnect($request->fd);
            return;
        }
        $this->wsTable->set('id:' . $userId, ['value' => $request->fd]);// 绑定uid到fd的映射
        $this->wsTable->set('fd:' . $request->fd, ['value' => $userId]);// 绑定fd到uid的映射
        $server->push($request->fd, "connect is success #{$request->fd}");
    }
    public function onMessage(Server $server, Frame $frame)
    {
        // 广播
        foreach ($this->wsTable as $key => $row) {
            if (strpos($key, 'uid:') === 0 && $server->isEstablished($row['value'])) {
                $content = sprintf('Broadcast: new message "%s" from #%d', $frame->data, $frame->fd);
                $server->push($row['value'], $content);
            }
        }
    }
    public function onClose(Server $server, $fd, $reactorId)
    {
        $uid = $this->wsTable->get('fd:' . $fd);
        if ($uid !== false) {
            $this->wsTable->del('uid:' . $uid['value']); // 解绑uid映射
        }
        $this->wsTable->del('fd:' . $fd);// 解绑fd映射
        $server->push($fd, "Goodbye #{$fd}");
    }
}
