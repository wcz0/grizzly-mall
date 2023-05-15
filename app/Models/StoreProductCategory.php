<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

class StoreProductCategory extends Model
{
    use SoftDeletes;

    protected $table = 'store_product_category';
    
}
