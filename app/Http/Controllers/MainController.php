<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Color;
use App\Models\Fabric;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    // Indexing all products on welcome page
    public function index() {
        $curtains = Product::join('categories', 'categories.category_id', '=', 'products.category_id')
                    ->join('images', 'images.product_id', '=', 'products.product_id')
                    ->select(['products.product_id', 'products.product_name', 'products.price', 'categories.category_id', 'categories.name', 'images.color_id', 'images.image_name'])
                    ->groupBy('products.product_name')
                    ->where('categories.category_id', "1")
                    ->get();
        $curtains = $curtains->toArray();

        $blinders = Product::join('categories', 'categories.category_id', '=', 'products.category_id')
                    ->join('images', 'images.product_id', '=', 'products.product_id')
                    ->select(['products.product_id', 'products.product_name', 'products.price', 'categories.category_id', 'categories.name', 'images.color_id', 'images.image_name'])
                    ->groupBy('products.product_name')
                    ->where('categories.category_id', "2")
                    ->get();
        $blinders = $blinders->toArray();

        $newArrivals = Product::join('categories', 'categories.category_id', '=', 'products.category_id')
                    ->join('images', 'images.product_id', '=', 'products.product_id')
                    ->select(['products.product_id', 'products.product_name', 'products.price', 'categories.category_id', 'categories.name', 'images.color_id', 'images.image_name'])
                    ->groupBy('products.product_name')
                    ->limit(10)
                    ->orderBy('products.product_id', 'desc')
                    ->get();
        $newArrivals = $newArrivals->toArray();

        // printc($newArrivals);
        return view('customers.welcome', 
        [
            'newArrivals' => $newArrivals, 
            'curtains' => $curtains, 
            'blinders' => $blinders
        ]);
    }

    // Show Particular Product
    public function show($id) {
        $image=DB::table('images')->get();
        $fabrics=Fabric::all();
        $product = Product::join('images', 'images.product_id', '=', 'products.product_id')
                            ->join('colors', 'colors.color_id', '=', 'images.color_id')
                            ->select('products.product_name', 'products.product_id', 'colors.color_id', 'colors.name', \DB::raw('GROUP_CONCAT(image_name) as image_name'))
                            ->groupBy('colors.color_id')
                            ->where('products.product_id', $id)
                            ->get()
                            ->toArray();

        for ($i=0; $i < count($product); $i++) { 
            $product[$i]['image_name'] = explode(",", $product[$i]['image_name']);
        }
        // echo '<pre>';
        // print_r($product);
        // die;
        return view('customers.product', ['data' => $product,'fabrics'=>$fabrics,'images'=>$image]);
    }

    // Proceed to checkout page
    public function show_checkout() {
        return view('customers.checkout');
    }

    // About us page
    public function aboutus() {
        return view('customers.aboutus');
    }

    // Contact us page
    public function contactus() {
        return view('customers.contactus');
    }
}
