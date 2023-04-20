<?php

namespace App\Services;

use App\Models\StoreProduct;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method StoreProduct getModel()
 * @method StoreProduct|\Illuminate\Database\Query\Builder query()
 */
class StoreProductService extends AdminService
{
    protected string $modelName = StoreProduct::class;
}
