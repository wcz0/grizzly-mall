<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

class UserAddres extends Model
{
    use SoftDeletes;

    protected $table = 'user_address';
    
}
