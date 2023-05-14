<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method User getModel()
 * @method User|\Illuminate\Database\Query\Builder query()
 */
class UserService extends AdminService
{
    protected string $modelName = User::class;

    public function store($request): bool
    {
        $columns = $this->getTableColumns();

        $model = $this->getModel();
        $snowflake = app('snowflake');
        $request->collect()->each(function ($value, $key) use ($model, $request, $columns) {
            if (!in_array($key, $columns)) {
                return;
            }
            if ($request->filled($key)) {
                $model->setAttribute($key, $value);
            }
        });
        $model->id = $snowflake->id();
        $model->password = bcrypt($request->password);
        if ($model->save()) {
            return true;
        }
        return false;
    }

    public function updateNew($request): bool
    {
        $columns = $this->getTableColumns();

        $model = $this->query()->where('id', $request->id)->first();
        $request->collect()->each(function ($value, $key) use ($model, $request, $columns) {
            if (!in_array($key, $columns)) {
                return;
            }
            if ($request->filled($key)) {
                $model->setAttribute($key, $value);
            }
        });
        if($request->filled('password')){
            $model->password = bcrypt($request->password);
        }
        if ($model->save()) {
            return true;
        }
        return false;
    }

    public function list()
    {
        $keyword = request()->keyword;

        $query = $this
            ->query()
            ->select([
                'id',
                'username',
                'name',
                'member_level',
                'level',
                'user_type',
                'phone',
                'group_id',
                'money',
            ])
            ->with('userGroup:id,name')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('username', 'like', "%{$keyword}%")
                    ->orWhere('name', 'like', "%{$keyword}%");
            });

        $items = (clone $query)->paginate(request()->input('perPage', 20))->items();
        foreach ($items as $item) {
            $item->member_level = $item->member_level > 0 ? 1 : 0;
            $item->level = 'V'.$item->level;
        }
        $total = (clone $query)->count();
        return compact('items', 'total');
    }

    public function getDetail($id)
    {
        $data = $this->query()
            ->where('id', $id)
            ->with([
                'userGroup:id,name',
                'spreadUser:id,name',
            ])
            ->withCount([
                'storeOrder as total_order',
                'storeOrder as month_order' => function ($query) {
                    $query->whereBetween('created_at', [
                        now()->startOfMonth(),
                        now()->endOfMonth(),
                    ]);
                },
            ])
            ->withSum('storeOrder as total_price', 'pay_price')
            ->withSum(['storeOrder as month_price' => function ($query) {
                $query->whereBetween('created_at', [
                    now()->startOfMonth(),
                    now()->endOfMonth(),
                ]);
            }], 'pay_price')
            ->select([
                'id',
                'name',
                'birthday',
                'avatar',
                'card_id',
                'address',
                // 'level',
                DB::raw('CONCAT("V",level) as level'),
                'mark',
                'state',
                'phone',
                'group_id',
                'money',
                'integral',
                'is_spread',
                'spread_user',
                'last_time',
                'created_at',
                // todo: 标签
            ])->first();
        return $data;
    }

    public function getEditDataNew($id)
    {
        $data = $this->query()
            ->where('id', $id)
            ->with([
                'userGroup:id,name',
                // 'spreadUser:id,name',
            ])
            ->select([
                'id',
                'name',
                'birthday',
                'avatar',
                'card_id',
                'address',
                'level',
                'mark',
                'state',
                'phone',
                'group_id',
                'money',
                'integral',
                'is_spread',
                'spread_user',
                'last_time',
                'created_at',
                // todo: 标签
            ])->first();
        return $data;
    }
}
