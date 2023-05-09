<?php

namespace App\Services;

use App\Models\UserLabel;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserLabel getModel()
 * @method UserLabel|\Illuminate\Database\Query\Builder query()
 */
class UserLabelService extends AdminService
{
    protected string $modelName = UserLabel::class;
}
