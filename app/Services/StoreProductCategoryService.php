<?php

namespace App\Services;

use App\Models\StoreProductCategory;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method StoreProductCategory getModel()
 * @method StoreProductCategory|\Illuminate\Database\Query\Builder query()
 */
class StoreProductCategoryService extends AdminService
{
    protected string $modelName = StoreProductCategory::class;
}
