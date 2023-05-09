<?php

namespace App\Services;

use App\Models\UserLabelRelation;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserLabelRelation getModel()
 * @method UserLabelRelation|\Illuminate\Database\Query\Builder query()
 */
class UserLabelRelationService extends AdminService
{
    protected string $modelName = UserLabelRelation::class;
}
