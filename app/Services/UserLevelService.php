<?php

namespace App\Services;

use App\Models\UserLevel;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserLevel getModel()
 * @method UserLevel|\Illuminate\Database\Query\Builder query()
 */
class UserLevelService extends AdminService
{
    protected string $modelName = UserLevel::class;
}
