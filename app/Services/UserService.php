<?php

namespace App\Services;

use App\Models\User;
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
        }
        $total = (clone $query)->count();
        return compact('items', 'total');
    }

    public function getDetail($id)
    {
        $user = parent::getDetail($id)->makeHidden('password');
        return $user;
    }
}
