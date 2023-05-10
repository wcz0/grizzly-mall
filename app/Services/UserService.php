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

    public function store($data): bool
    {
        $columns = $this->getTableColumns();

        $model = $this->getModel();

        foreach ($data as $k => $v) {
            if (!in_array($k, $columns)) {
                continue;
            }

            $model->setAttribute($k, $v);
        }

        if ($model->save()) {
            return true;
        }

        return false;
    }
}
