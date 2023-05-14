<?php

namespace App\Services;

use App\Models\SystemUserLevel;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method SystemUserLevel getModel()
 * @method SystemUserLevel|\Illuminate\Database\Query\Builder query()
 */
class SystemUserLevelService extends AdminService
{
    protected string $modelName = SystemUserLevel::class;
}
