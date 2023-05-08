<?php

namespace App\Services;

use App\Models\UserBrokerage;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserBrokerage getModel()
 * @method UserBrokerage|\Illuminate\Database\Query\Builder query()
 */
class UserBrokerageService extends AdminService
{
    protected string $modelName = UserBrokerage::class;
}
