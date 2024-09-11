<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mcategory;
use App\Models\Msubcategory;

class Cadmin extends Controller
{
    public function home(){
    
        return $this->showView('home');
    }
}
