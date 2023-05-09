<?php

namespace App\Services;

use App\Models\LabelCategory;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method LabelCategory getModel()
 * @method LabelCategory|\Illuminate\Database\Query\Builder query()
 */
class LabelCategoryService extends AdminService
{
    protected string $modelName = LabelCategory::class;
}
