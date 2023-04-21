<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\AdminUser as ModelAdminUser;

class AdminUser extends ModelAdminUser
{
    use SoftDeletes;

    public function getEditData($id): Model|\Illuminate\Database\Eloquent\Collection|Builder|array|null
    {
        $adminUser = parent::getEditData($id)
            ->makeHidden('password')
            ->makeHidden('deleted_at')
            ->makeHidden('last_ip')
            ->makeHidden('login_count')
            ->makeHidden('last_time');
        
        $adminUser->load('roles');

        return $adminUser;
    }
}
