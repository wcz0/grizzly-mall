<?php

namespace App\Services;

use App\Models\UserGroup;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserGroup getModel()
 * @method UserGroup|\Illuminate\Database\Query\Builder query()
 */
class UserGroupService extends AdminService
{
    protected string $modelName = UserGroup::class;
}
