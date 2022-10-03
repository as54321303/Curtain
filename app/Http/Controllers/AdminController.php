<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Image;
use App\Models\Color;
use App\Models\Fabric;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // Authenticating User
    public function auth(Request $request) {
        $email = $request->adminEmail;
        $password = $request->adminPassword;
        $admin = Admin::where('email', $email)->first();
        if ($email == $admin->email && $password == $admin->password) {
            session([
                'username' => $admin->name,
                'userid' => $admin->admin_id
            ]);
            return view('admin.admin');
        }
        else {
            $showError = "Invalid Credentials";
            return view('admin.login')->with($showError);
        }
    }

    // Logging Out User
    public function logout(Request $request) {
        $request->session()->flush();
        return redirect(route('admin.login'));
    }

    // Indexing Products
    public function index() {
        $products = Product::join('categories', 'categories.category_id', '=', 'products.category_id')
                    ->select(['products.product_id', 'products.product_name', 'products.price', 'products.remain', 'categories.name'])
                    ->get()
                    ->toArray();
        // $color = Color::all();
        // $categories = Category::all();

        return view('admin.products', ['products' => $products]);
    }

    // Add Product Page
    public function add_product_page() {
        $color = Color::all();
        $categories = Category::all();
        $fabrics = Fabric::all();

        return view('admin.addProduct', ['color' => $color, 'categories' => $categories, 'fabrics' => $fabrics]);
    }

    // Showing specific product
    public function show($id) {
        $product = Product::with('getImages')->get();
        $product = $product->where('product_id', $id);
        $product = $product->toArray();
        // $color = Color::all()->toArray();
        $allcolor = Color::all()->pluck('name')->toArray();
        // $id_color = array();
        
        foreach ($product as  $value) {
            $product = $value;
        }
        
        // foreach ($color as $key) {
        //     $id_color[$key['color_id']] = $key['name']; 
        // }

        return view('admin.showProduct', ['data' => $product, 'allcolor' => $allcolor]);
    }

    // Storing Product
    public function store(Request $request) {
        $product = new Product;
        $image = new Image;

        // Inserting in products table
        $product->product_name = $request->productName;
        $product->price = $request->productPrice;
        $product->remain = $request->productStock;
        $product->category_id = $request->productCategory;
        $product->save();

        // Inserting in images table
        $color_id = $request->productColorId;
        $last = \DB::table('products')->latest()->first();
        $product_id = $last->product_id;
        $multiple_names = $request->productImages;
        $single_names = array();
        foreach ($multiple_names as $value) {
            $image_name = time() . '_adm_' . rand(1000, 9999) . '.' . $value->getClientOriginalExtension();
            $value->storeAs('/public/images', $image_name);
            array_push($single_names, $image_name);
            Image::insert(['image_name'=>$image_name, 'product_id'=>$product_id, 'color_id'=>$color_id]);
        }
        return redirect(route('admin.products'));
    }

    // Adding images to existing product
    public function add_image(Request $request) {
        // Inserting in images table
        $color_id = $request->productColorId + 1;
        $product_id = $request->productId;
        $multiple_names = $request->productImages;
        $single_names = array();
        foreach ($multiple_names as $value) {
            $image_name = time() . '_adm_' . rand(1000, 9999) . '.' . $value->getClientOriginalExtension();
            $value->storeAs('/public/images', $image_name);
            array_push($single_names, $image_name);
            Image::insert(['image_name'=>$image_name, 'product_id'=>$product_id, 'color_id'=>$color_id]);
        }
        return redirect(route('product.show', $request->productId));
    }

    // Adding color
    public function add_color(Request $request) {
        $colors = Color::all()->pluck('name')->toArray();

        $flag = 0;
        foreach ($colors as $color) {
            if (strtolower($color) == strtolower($request->color)) {
                $flag = 1;
            }
        }

        if ($flag == 1) {
            $response = [
                'status' => "0",
                'message' => 'Color is already in the Database'
            ];
        }
        else {
            $color = new Color;
            $color->name = ucfirst(strtolower($request->color));
            $color->name = $request->color;
            $color->save();
            $response = [
                'status' => "1",
                'message' => 'Color has been added successfully!'
            ];
        }

        return response()->json($response);
    }

    // Adding Fabric
    public function add_fabric(Request $request) {
        $fabrics = Fabric::all()->pluck('name')->toArray();

        $flag = 0;
        foreach ($fabrics as $fabric) {
            if (strtolower($fabric) == strtolower($request->fabVal)) {
                $flag = 1;
            }
        }

        if ($flag == 1) {
            $response = [
                'status' => "0",
                'message' => 'Fabric is already in the Database'
            ];
        }
        else {
            $fabric = new Fabric;
            $fabric->name = ucfirst(strtolower($request->fabVal));
            $fabric->save();
            $response = [
                'status' => "1",
                'message' => 'Fabric has been added successfully!'
            ];
        }

        return response()->json($response);
    }

    // Update Product
    public function update_product(Request $request) {
        $product = Product::find($request->productId);
        $remain = $product->remain;
        if (!is_null($request->remainInc)) {
            $remain = $remain + $request->productStock;
        }
        Product::where('product_id', $request->productId)->update(['product_name' => $request->productName, 'price' => $request->productPrice, 'remain' => $remain]);
        return redirect(route('product.show', $request->productId));
    }

    // Deleting product from db
    public function delete_product($id) {
        $images = Image::all();
        $images = $images->where('product_id', $id);
        foreach ($images as $image) {
            $name = $image->image_name;
            $image_path = 'storage/images/'.$name;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            Image::destroy($image->id);
        }
        Product::destroy($id);
        return response()->json('Product Succesfully Deleted');
    }

    // Deleting images from db
    public function delete_image($id) {
        $image = Image::find($id);
        $name = $image->image_name;
        $image_path = 'storage/images/'.$name;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        Image::where('id', $id)->delete();
        return response()->json('Product Succesfully Deleted');
    }
}
