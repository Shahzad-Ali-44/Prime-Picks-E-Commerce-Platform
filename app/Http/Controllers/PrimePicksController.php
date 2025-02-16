<?php

namespace App\Http\Controllers;

use App\Models\PrimePicks;
use App\Models\PrimePicksUsers;
use App\Models\PrimePicksUserCart;
use App\Models\PrimePicksDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PrimePicksController extends Controller
{

    // For Cart

    public function addToCart(Request $request)
    {
        if (!session('isLoggedIn')) {
            return response()->json(['message' => 'You are not logged in!'], 401);
        }
        $username = session('username');
        $item_name = $request->input('item_Name');
        $item_price = $request->input('price');
        $userCart = PrimePicksUserCart::where('username', $username)->where('item_name', $item_name)->first();
        if ($userCart) {
            $userCart->item_quantity += 1;
            $userCart->save();
        } else {
            $userCart = new PrimePicksUserCart();
            $userCart->username = $username;
            $userCart->item_name = $item_name;
            $userCart->item_price = $item_price;
            $userCart->item_quantity = 1;
            $userCart->save();
        }
        return response()->json(['message' => 'Product successfully added to cart!'], 200);
    }


    public function cart()
    {
        if (session('isLoggedIn') == 'success') {
            $username = session('username');
            $cartRecord = PrimePicksUserCart::where('username', $username)->get();
            return view('cart', ['data' => $cartRecord]);
        } else {
            session()->flash('notLoggedIn', 'fail');
            $PrimePicksDashboard = PrimePicksDashboard::all();
            return view('welcome', ['data' => $PrimePicksDashboard]);
        }
    }


    public function quantityAdd($item_name, $item_quantity)
    {
        $item_quantity = (int) $item_quantity;
        $username = session('username');
        $userCart = PrimePicksUserCart::where('username', $username)->where('item_name', $item_name)->first();
        if ($userCart) {
            $userCart->item_quantity = max(0, $item_quantity + 1);
            if ($userCart->save()) {
                $cartRecord = PrimePicksUserCart::all();
                return view('cart', ['data' => $cartRecord]);
            }
        }
    }


    public function quantityMinus($item_name, $item_quantity)
    {
        $item_quantity = (int) $item_quantity;
        $username = session('username');
        $userCart = PrimePicksUserCart::where('username', $username)->where('item_name', $item_name)->first();
        if ($userCart) {
            $userCart->item_quantity = max(0, $item_quantity - 1);
            if ($userCart->save()) {
                $cartRecord = PrimePicksUserCart::all();
                return view('cart', ['data' => $cartRecord]);
            }
        }
    }


    public function process_order()
    {
        return view('order');
    }


    public function orderDone(Request $r)
    {
        session()->forget('success');
        $phone = $r->input('phone');
        $address = $r->input('address');
        $username = session('username');
        $cartItems = PrimePicksUserCart::where('username', $username)->get();
        $adminRecords = [];
        if ($cartItems->isEmpty()) {
            session()->flash('fail', 'Your Cart is Empty! Go back and add items to your cart');
            return view('order');
        }else{
        foreach ($cartItems as $cartItem) {
            $adminRecords[] = [
                'username' => $cartItem->username,
                'phone' => $phone,
                'address' => $address,
                'item_name' => $cartItem->item_name,
                'item_price' => $cartItem->item_price,
                'item_quantity' => $cartItem->item_quantity,
            ];
            PrimePicksDashboard::where('item_name', $cartItem->item_name)->decrement('item_quantity', $cartItem->item_quantity);
        }
        PrimePicks::insert($adminRecords);
        PrimePicksUserCart::truncate();
        session()->flash('success', 'Order processed successfully!');
        return view('order');}
    }

    public function remove($item_name)
    {
        $username = session('username');
        $userCart = PrimePicksUserCart::where('username', $username)->where('item_name', $item_name)->first();
        if ($userCart) {
            if ($userCart->delete()) {
                $cartRecord = PrimePicksUserCart::all();
                return view('cart', ['data' => $cartRecord]);
            }
        } else {
            $cartRecord = PrimePicksUserCart::all();
            return view('cart', ['data' => $cartRecord]);
        }

    }




    // For Admin

    public function admin_login(Request $r)
    {
        $username = $r->input('name');
        $pass = $r->input('pass');
        if ($username == 'admin' && $pass == 'admin') {

            session()->put('admin', 'loggedIn');
            return redirect('/admin/dashboard');

        } else {
            return redirect('/admin')->with('fail', 'Invalid Credientals!');
        }
    }
    public function admin_dashboard(Request $r)
    {
        if (!session()->has('admin') || session('admin') !== 'loggedIn') {
            return redirect('/admin');
        }

        $cartRecord = PrimePicks::all();
        $PrimePicksDashboard = PrimePicksDashboard::all();

        return view('admin-dashboard', ['data' => $cartRecord, 'data2' => $PrimePicksDashboard]);
    }

    public function admin_logout(Request $r)
    {
        session()->forget('admin');
        return redirect('/admin')->with('fail', 'You have logged out successfully.');
    }

    public function productAdded(Request $request)
    {
        if ($request->hasFile('pic') && $request->file('pic')->isValid()) {
            $targetDir = 'public/uploads/';
            $file = $request->file('pic');
            $fileName = $file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
            if (!in_array(strtolower($fileType), $allowedTypes)) {
                session()->flash('PicType', "error");
            } else {
                $file->storeAs($targetDir, $fileName);
                $product = new PrimePicksDashboard();
                $product->item_pic = $fileName;
                $product->item_name = $request->input('name');
                $product->item_price = $request->input('price');
                $product->item_quantity = $request->input('quantity');
                if ($product->save()) {
                    session()->flash('alertSuccess', "true");
                } else {
                    session()->flash('alertError', "true");
                }
            }
        }
        return view('addproduct');
    }


    public function editProduct($id)
    {
        $PrimePicksDashboard = PrimePicksDashboard::where('id', '=', $id)->first();
        return view('editProduct', ['data' => $PrimePicksDashboard]);
    }


    public function updateProduct(Request $request)
    {
        if ($request->hasFile('pic') && $request->file('pic')->isValid()) {
            $targetDir = 'public/uploads/';
            $file = $request->file('pic');
            $fileName = $file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
            if (!in_array(strtolower($fileType), $allowedTypes)) {
                session()->flash('PicType', 'error');
            } else {
                $file->storeAs($targetDir, $fileName);

                $id = $request->input('id');
                $name = $request->input('name');
                $price = $request->input('price');
                $quantity = $request->input('quantity');
                $product = PrimePicksDashboard::find($id);
                if ($product) {
                    $product->item_pic = $fileName;
                    $product->item_name = $name;
                    $product->item_price = $price;
                    $product->item_quantity = $quantity;

                    if ($product->save()) {
                        session()->flash('alertSuccess', 'true');
                    } else {
                        session()->flash('alertError', 'true');
                    }
                } else {
                    session()->flash('alertError', 'true');
                }
            }
        }
        $PrimePicksDashboard = PrimePicksDashboard::where('id', '=', $id)->first();
        return view('editProduct', ['data' => $PrimePicksDashboard]);
    }


    public function removeProduct($id)
    {
        $product = PrimePicksDashboard::find($id);
        if ($product) {
            $product->delete();
            session()->flash('productdeleted', 'true');
        }
        $cartRecord = PrimePicks::all();
        $PrimePicksDashboard = PrimePicksDashboard::all();
        return view('admin-dashboard', ['data' => $cartRecord, 'data2' => $PrimePicksDashboard]);
    }






    // For User
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = PrimePicksUsers::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            session(['isLoggedIn' => true, 'username' => $user->username]);
            return response()->json(['message' => 'Login successful!'], 200);
        }

        return response()->json(['message' => 'Invalid credentials!'], 401);
    }

    public function signup(Request $request)
    {
        $user = new PrimePicksUsers();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        if ($user->save()) {
            session(['isLoggedIn' => true, 'username' => $user->username]);
            return response()->json(['message' => 'Signup successful!'], 200);
        }

        return response()->json(['message' => 'Signup failed!'], 500);
    }

    public function logout(Request $request)
    {
        $username = session('username');
        if ($username) {

            PrimePicksUserCart::where('username', $username)->delete();
        }
        session()->flush();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Successfully logged out and cart cleared.']);
    }



    public function index()
{
    $PrimePicksDashboard = PrimePicksDashboard::all();

    if ($PrimePicksDashboard->isEmpty()) {
        return view('welcome', ['data' => collect()]);
    } else {
        return view('welcome', ['data' => $PrimePicksDashboard]);
    }
}

    public function productpage()
    {
        $PrimePicksDashboard = PrimePicksDashboard::all();

        if ($PrimePicksDashboard->isEmpty()) {
            return view('productpage', ['data' => collect()]);
        } else {
            return view('productpage', ['data' => $PrimePicksDashboard]);
        }
    }


}
