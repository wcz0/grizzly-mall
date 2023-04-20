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
}
