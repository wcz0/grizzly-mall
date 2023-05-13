<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'user_groups';
    public $timestamps = false;

}
