<?php

namespace App\Services;

use App\Models\UserBill;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserBill getModel()
 * @method UserBill|\Illuminate\Database\Query\Builder query()
 */
class UserBillService extends AdminService
{
    protected string $modelName = UserBill::class;
}
