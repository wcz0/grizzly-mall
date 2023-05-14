<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

class SystemUserLevel extends Model
{
    use SoftDeletes;

    protected $table = 'system_user_levels';
    
}
