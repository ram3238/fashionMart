<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcategory extends Model
{
    use HasFactory;
    protected $table = 'tbl_category';

    public function subCategories()
    {
        return $this->hasMany(Msubcategory::class, 'category_id');
    }
}
