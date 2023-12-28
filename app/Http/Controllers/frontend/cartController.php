<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use GrahamCampbell\ResultType\Success;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $pro = Product::where('proid', $proid)->get();
        $userid = Auth::user()->email;
        $sessionid = session()->get('cart');
        $cart = Cart::where('sessionid', $sessionid)->orWhere('userid', $userid)->where('status', 'New')->get();
        foreach ($cart as $crt) {
            $pro[] = Product::where('proid', $crt->proid)->first();
        }
        $totalcart = count($cart);
        return view('frontend.cart', ['pro' => $pro, 'carts' => $cart, 'totalcart' => $totalcart]);
    }
    public function addcart($proid, $userid = null)
    {
        //return response(['user' => $userid, 'proid' => $proid]);
        $detail = Product::where('proid', $proid)->first();

        $session = session()->get('cart');
        $sesssionid = rand(10000, 999999999);
        if ($session == null) {
            $session = session()->put('cart', $sesssionid);
        }
        $cartdata = new Cart();
        $cartdata->proid = $proid;
        $cartdata->sessionid = $session;
        $cartdata->userid = $userid;
        $cartdata->quantity = 1;
        $cartdata->amount = $detail->price;
        $cartdata->status = "New";
        $cartdata->save();
        return response(['success' => 1], 200);


        // return response(['user' => $userid, 'proid' => $proid,]);
    }
    public function subtotal()
    {
        if (Auth::user()) {
            $user = Auth::user()->email;
        } else {
            $user = "";
        }

        $session = session()->get('cart');
        if ($user != "") {
            $data = Cart::where('sessionid', $session)->whereNull('userid')->where('status', 'New')->count();
            if ($data) {
                Cart::where('sessionid', $session)->where('status', 'New')->update(['userid' => $user]);
            }


        }
        $total = Cart::where('sessionid', $session)->orWhere('userid', $user)->where('status', 'New')->count();
        return response(['success' => 1, 'totalcart' => $total], 200);
    }

    public function delete($cartid)
    {
        $cartitem = Cart::where('id', $cartid)->first();
        $cartitem->delete();
        Alert::success('Ok', 'Product Deleted from cart Successfully!');
        return response(['success' => 1], 200);


    }

    public function cartvalue($num, $proid, $cartid)
    {
        $price = Product::where('proid', $proid)->value('price');
        $amount = $num * $price;

        $cartdata = Cart::where('id', $cartid)->first();
        $cartdata->quantity = $num;
        $cartdata->amount = $amount;
        $cartdata->save();
        return response(['num' => $num, 'proid' => $proid, 'cartid' => $cartid, 'price' => $price, 'amount' => $amount], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}