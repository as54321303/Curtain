<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Cart;
use App\Models\Color;

class CartController extends Controller
{
    public function cart_value(Request $request) {
        $cart = Cart::where(['product_id' => $request->productId, 'status' => '0'])->get()->toArray();
        $color_id = Cart::where(['product_id' => $request->productId, 'status' => '0'])->value('color_id');

        // For Guest User
        if (!$request->session()->has('user_id')) {
            $product = Product::select('price', 'product_name')->where('product_id', '=', $request->productId)->get()->toArray();
            $cart = [
                'product_id' => $request->productId,
                'color_id' => $request->colorId,
                'product_width' => $request->width,
                'product_height' => $request->height,
                'price' => $request->width * $request->height * $product[0]['price'],
                'product_name' => $product[0]['product_name']
            ];
            $request->session()->push('cart_value', $cart);
            $response = [
                'inc_cart_by' => 1,
                'message' => "Product has been Added to Cart"
            ];
        } 
        // For Registered User
        else {
            $flag = 0;
            if (!empty($cart)) {
                foreach ($cart as $value) {
                    if ($value['color_id'] == $request->colorId) {
                        $flag = 1;
                    }
                }
            }
            if ($flag == 1) {
                $response = [
                    'inc_cart_by' => 0,
                    'message' => "This color is already added. Wanna add another color"
                ];
            }
            else {
                // Adding new product to cart
                if (session()->has('guestUser')) {
            
                    $cart = new Cart;
                    foreach (session('cart_value') as $value) {
                        $cart->product_id = $value['product_id'];
                        $cart->color_id = $value['color_id'];
                        $cart->product_width = $value['product_width'];
                        $cart->product_height = $value['product_height'];
                        $cart->user_id = $request->session()->get('user_id');
                        $cart->status = "0";
                        $cart->save();     
                    } 
                    $cart_value = count(Cart::where(['user_id' => $request->session()->get('user_id'), 'status' => '0'])->get()->toArray());
                    
                    session()->put('cart_value', $cart_value);

                    return redirect(route('customers.checkout'));              

                } else {
                    $cart = new Cart;
                    $cart->product_id = $request->productId;
                    $cart->color_id = $request->colorId;
                    $cart->product_width = $request->width;
                    $cart->product_height = $request->height;
                    $cart->user_id = $request->session()->get('user_id');
                    $cart->status = "0";
                    $cart->save();
    
                    $cart_value = session()->get('cart_value') + 1;
                    $request->session()->put('cart_value', $cart_value);
    
                    $response = [
                        'inc_cart_by' => 1,
                        'message' => "Product has been Added to Cart"
                    ];
                }
                
                // $product_quant = Cart::where('product_id', $request->productId)->value('product_quantity');
                // $product_quant = $product_quant + 1;
                // Cart::where('product_id', $request->productId)->update(['product_quantity' => $product_quant]);
            }
        }

        return response()->json($response);
    }

    public function show_cart(Request $request) {
        // For Guest User
        if (!$request->session()->has('user_id')) {
            $cart = $request->session()->get('cart_value');

            $color = \DB::table('colors')->select('color_id', 'name')->get()->toArray();
            $available_color = array();
            foreach ($color as $key => $value) {
                $available_color[$value->color_id] = $value->name;
            }

            $subtotal = 0;
            $shipping = 0;
            $total = 0;
            foreach ($cart as $item) {
                $subtotal += $item['price'];
            }
            $shipping = floor($subtotal * (3 / 100));
            $total = $subtotal + $shipping;
            $cart_total = array(
                'subtotal' =>$subtotal,
                'shipping' => $shipping,
                'total' => $total
            );
            
            session()->put('cart_total', $cart_total['total']);
            return view('customers.cart', ['data' => $cart, 'colors' => $available_color, 'cart_total' => $cart_total]);
        } 
        // For Registered User
        else {
            $cart = \DB::table('products')
            ->join('carts', 'products.product_id', '=', 'carts.product_id')
            ->select('products.product_name', 'products.price', 'carts.color_id', 'carts.product_width', 'carts.product_height', 'carts.cart_id')
            ->where(['user_id' => $request->session()->get('user_id'), 'status' => '0'])
            ->get()->toArray();
    
            $color = \DB::table('colors')->select('color_id', 'name')->get()->toArray();
            $available_color = array();
            foreach ($color as $key => $value) {
                $available_color[$value->color_id] = $value->name;
            }
    
            $subtotal = 0;
            $shipping = 0;
            $total = 0;
            foreach ($cart as $item) {
                $subtotal += $item->product_width * $item->product_height * $item->price;
            }
            $shipping = floor($subtotal * (3 / 100));
            $total = $subtotal + $shipping;
            $cart_total = array(
                'subtotal' =>$subtotal,
                'shipping' => $shipping,
                'total' => $total
            );

            session()->put('cart_total', $cart_total['total']);
            return view('customers.cart', ['data' => $cart, 'colors' => $available_color, 'cart_total' => $cart_total]);
        }
    }

    // Removing products from cart
    public function removefrom_cart(Request $request, $id) {
        Cart::destroy($id);

        $cart_value = session()->get('cart_value') - 1;
        $request->session()->put('cart_value', $cart_value);
        $response = "Product has been successfully removed";

        return response()->json($response);
    }

    // My Order Page
    public function my_order(Request $request) {
        $products = Cart::join('colors', 'colors.color_id', '=', 'carts.color_id')
                    ->join('products', 'products.product_id', '=', 'carts.product_id')
                    ->select('products.product_name', 'products.price', 'carts.product_height', 'carts.product_width', 'colors.name')
                    ->where([
                        'carts.user_id' => $request->session()->get('user_id'),
                        'carts.status' => '1',
                    ])->get();

        return view('customers.myorders', ['products' => $products]);
    }
}
