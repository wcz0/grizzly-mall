<?php

namespace App\Services;

use App\Models\StoreCategory;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method StoreCategory getModel()
 * @method StoreCategory|\Illuminate\Database\Query\Builder query()
 */
class StoreCategoryService extends AdminService
{
    protected string $modelName = StoreCategory::class;
}
