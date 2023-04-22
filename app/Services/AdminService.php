<?php

namespace App\Services;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Slowlyo\OwlAdmin\Services\AdminUserService;


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

    public function getEditDataNew($id) : Model|Collection|Builder|array|null
    {
        $adminUser = parent::getEditData($id)
            ->makeHidden('last_ip')
            ->makeHidden('last_time')
            ->makeHidden('login_count')
            ->makeHidden('deleted_at')
            ->makeHidden('password');

        $adminUser->load('roles');

        return $adminUser;
    }
}