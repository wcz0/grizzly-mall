<?php

namespace App\Services;

use App\Models\UserBrokerageFrozen;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserBrokerageFrozen getModel()
 * @method UserBrokerageFrozen|\Illuminate\Database\Query\Builder query()
 */
class UserBrokerageFrozenService extends AdminService
{
    protected string $modelName = UserBrokerageFrozen::class;
}
