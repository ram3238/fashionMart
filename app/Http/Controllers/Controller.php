<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showView($viewpage, $data = []) {
       
        return view($viewpage, $data);     
    }
}
