<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Http\Controllers\UserController;

class UserController extends Controller
{
    // Guest User Session setting
    public function set_session(Request $request) {
        $cart = collect([]);
        $request->session()->put('cart_value', $cart);
        // $cart = $request->session()->get('cart_value');
        // printc($cart);
        return redirect(route('customer.welcome'));
    } 

    // Creating User Account
    public function create_account(Request $request) {
        $user = new User;
        $user->name = $request->fullName;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->save();

        return view('customers.afterSignup');
    }

    // User Login
    public function login(Request $request) {
        $email = $request->email;
        $user = User::where('email', $email)->get()->toArray();

        if (!empty($user)) {
            $user = $user[0];
            if (password_verify($request->password, $user['password'])) {
                // User Logged In Here
                if (!isset($request->guestUser)) {
                    $cart = Cart::where(['user_id' => $user['user_id'], 'status' => '0'])->get()->toArray();
                    $cart_value = count($cart);
                    $request->session()->put('cart_value', $cart_value);
                }

                $request->session()->put('user_id', $user['user_id']);
                $request->session()->put('user_name', $user['name']);
                $request->session()->put('user_email', $user['email']);
                // printc(session()->all());
                if (isset($request->guestUser) && $request->guestUser == "1") {
                    return redirect()->action([CartController::class, 'cart_value'])->with('guestUser', $request->guestUser);
                }
                return redirect(route('customer.welcome'));
            } 
            else {
                $message = "Password is incorrect";
            }
        }
        else {
            $message = "Email doesn't Match";
        }
        return view('customers.login', ['showMsg' => $message]);
    }

    // Login out User
    public function logout(Request $request) {
        $request->session()->forget([
            'cart_value', 
            'user_id', 
            'user_name', 
            'user_email'
        ]);

        return redirect(route('guest.session'));
    }

    public function signup() {
        return view('customers.signup');
    }

    public function auth() {
        return view('customers.login');
    }
}
