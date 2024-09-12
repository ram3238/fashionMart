<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mbase;
use App\Models\Mproducts;

class Cproducts extends Controller
{
   public function __construct(Mproducts $Mproducts,Mbase $Mbase){
        $this->Mproducts = $Mproducts;
        $this->Mbase = $Mbase;
    }

   public function showProductsBySubcategory(Request $request, $id){
    
      $productArr = $this->Mproducts->getProduct($request, $id);
      
      $data['productArr'] = $productArr;
      $data['id'] = $id;
      return $this->showView('shop',$data);
   }
}