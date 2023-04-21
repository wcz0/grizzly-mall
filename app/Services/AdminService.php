<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\AdminUser;
use Slowlyo\OwlAdmin\Services\AdminUserService;

/**
 * @method AdminUser getModel()
 * @method AdminUser|\Illuminate\Database\Query\Builder query()
 */
class AdminService extends AdminUserService
{
    protected string $modelName = AdminUser::class;

    public function list()
    {
        $keyword = request()->keyword;

        $query = $this
            ->query()
            ->with('roles')
            ->select([
                'id',
                'name', 
                'username', 
                'avatar', 
                'state',
                'last_ip',
                'last_time',
                'created_at',
            ])
            ->when($keyword, function ($query) use ($keyword)
            {
                $query->where('username', 'like', "%{$keyword}%")->orWhere('name', 'like', "%{$keyword}%");
            });

        $items = (clone $query)->paginate(request()->input('perPage', 20))->items();
        $total = (clone $query)->count();

        return compact('items', 'total');
    }
}