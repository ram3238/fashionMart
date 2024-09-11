<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msubcategory extends Model
{
    use HasFactory;
    protected $table = 'tbl_sub_category';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
