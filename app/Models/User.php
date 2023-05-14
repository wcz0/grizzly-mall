<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

class User extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'id' => 'string',
    ];

    public function userGroup()
    {
        return $this->hasOne(UserGroup::class, 'id', 'group_id');
    }

    public function storeOrder()
    {
        return $this->hasMany(StoreOrder::class, 'user_id', 'id');
    }

    public function spreadUser()
    {
        return $this->hasOne(User::class, 'id', 'spread_id');
    }
}
