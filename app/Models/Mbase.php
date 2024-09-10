<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mbase extends Model
{
    use HasFactory;

    public function getQueryData($sql){
        $query = DB::select($sql);
        if (is_array($query) && !empty($query)) {
            return $query;
        } else {
            return [];
        }
    }

}