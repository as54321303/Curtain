<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // public function calculate_price(Request $request) {
    //     // $area = $request->width * $request->height;
    //     // $total_price = $area * 4; // Hard Code Price to 4
    //     return response()->json("HURRAY FROM ORIGINAL");
    // }

    public function calculate(Request $request) {
        $area = $request->width * $request->height;
        $price = DB::table('prices')->where('fabric_id',$request->productId)->get('price');
        $total_price = $area * $price[0]->price;
        return response()->json($total_price);
    }
}
