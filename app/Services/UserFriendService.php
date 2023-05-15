<?php

namespace App\Services;

use App\Models\UserFriend;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * @method UserFriend getModel()
 * @method UserFriend|\Illuminate\Database\Query\Builder query()
 */
class UserFriendService extends AdminService
{
    protected string $modelName = UserFriend::class;
}
