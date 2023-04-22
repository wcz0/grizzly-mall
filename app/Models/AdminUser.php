<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\AdminUser as ModelAdminUser;

class AdminUser extends ModelAdminUser
{
    use SoftDeletes;

}
