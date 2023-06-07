<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

class StoreProduct extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'store_products';

}
