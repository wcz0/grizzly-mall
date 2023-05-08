<?php

namespace App\Services;

use App\Models\StoreCart;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method StoreCart getModel()
 * @method StoreCart|\Illuminate\Database\Query\Builder query()
 */
class StoreCartService extends AdminService
{
    protected string $modelName = StoreCart::class;
}
