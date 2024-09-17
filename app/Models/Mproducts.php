<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Mproducts extends Mbase
{
    use HasFactory;
    protected $table = 'tbl_product';

    // public function getProduct(Request $request, $id) {
    //     // Retrieve the current page number and items per page from the request or use defaults
    //     $page = $request->input('page', 1);
    //     $perPage = $request->input('per_page', 15);

    //     // Query builder for pagination
    //     $query = DB::table('tbl_product')
    //                 ->where('sub_category_id', $id)
    //                 ->where('status', 1);

    //     // Paginate results
    //     $products = $query->paginate($perPage, ['*'], 'page', $page);

    //     return $products;
    // }

    public function getProduct(Request $request, $id) {
        // Retrieve the current page number and items per page from the request or use defaults
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 5);

        // Build the query
        $query = DB::table('tbl_product')
            ->select(
                'tbl_product.id as product_id', 
                'tbl_product.sku',
                'tbl_product_details.*', 
                'tbl_product_image.*'
            )
            ->leftJoin('tbl_product_details', 'tbl_product.id', '=', 'tbl_product_details.product_id')
            ->leftJoin('tbl_product_image', 'tbl_product_details.id', '=', 'tbl_product_image.product_id')
            ->where('tbl_product.sub_category_id', $id)
            ->where('tbl_product_details.status', 1)
            ->where('tbl_product_image.main_image', 1);

        // Apply pagination
        $products = $query->paginate($perPage, ['*'], 'page', $page);

        return $products;
    }


}
