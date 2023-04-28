<?php

namespace App\Services;

use App\Models\StoreOrder;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method StoreOrder getModel()
 * @method StoreOrder|\Illuminate\Database\Query\Builder query()
 */
class StoreOrderService extends AdminService
{
    protected string $modelName = StoreOrder::class;
}
