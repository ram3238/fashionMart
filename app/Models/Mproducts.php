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
        $perPage = $request->input('per_page', 15);

        // Query builder for pagination
        $query = DB::table('tbl_product')
                ->select('tbl_product.sku', 'tbl_product_details.*', 'tbl_product_image.*')
                ->where('tbl_product.sub_category_id', $id)
                ->where('tbl_product_details.status', 1)
                ->leftJoin('tbl_product_details', 'tbl_product.id', '=', 'tbl_product_details.product_id')
                ->leftJoin('tbl_product_image', 'tbl_product_details.id', '=', 'tbl_product_image.product_id');

        // Apply pagination directly on the query builder
        $products = $query->paginate($perPage, ['*'], 'page', $page);

        return $products;
    }

}
