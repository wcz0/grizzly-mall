<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

class StoreOrder extends Model
{
    use SoftDeletes;

    protected $table = 'store_order';
    
}
