<?php

namespace App\Services;

use App\Models\UserAddres;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserAddres getModel()
 * @method UserAddres|\Illuminate\Database\Query\Builder query()
 */
class UserAddresService extends AdminService
{
    protected string $modelName = UserAddres::class;
}
