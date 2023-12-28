<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userid = Auth::user()->email;
        $sessionid = session()->get('cart');
        $cart = Cart::where('sessionid', $sessionid)->orWhere('userid', $userid)->where('status', 'New')->get();
        foreach ($cart as $crt) {
            $product[] = Product::where('proid', $crt->proid)->first();
        }
        $totalcart = count($cart);
        return view('frontend.checkout', ['carts' => $cart, 'product' => $product, 'totalcart' => $totalcart]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $userid = Auth::user()->email;
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3|max:255',
                'state' => 'required|string|min:3|max:255',
                'city' => 'required|string|min:3|max:255',
                'pin' => 'required',
                'address' => 'required|string|min:3|max:255',
                'mobile' => 'required',

            ]
        );

        $data = $request->input();
        $Address = new Address;
        $Address->userid = $userid;
        $Address->name = $data['name'];
        $Address->state = $data['state'];
        $Address->city = $data['city'];
        $Address->pin = $data['pin'];
        $Address->address = $data['address'];
        $Address->mobile = $data['mobile'];
        //$Address->save();

        $order_id = 'T' . date('ymdhi') . mt_rand(1000, 9999);
        $carts = Cart::where('userid', $userid)->where('status', 'New')->get();
        foreach ($carts as $cart) {
            //dd('test');
            $orderdetail = new Order;
            $orderdetail->orderid = $order_id;
            $orderdetail->userid = $userid;
            $cartdetail = Cart::where('id', $cart->id)->first();
            $cartdetail->status = "Ordered";
            $cartdetail->save();
            $orderdetail->cartid = $cart->id;
            $orderdetail->name = $data['name'];
            $orderdetail->mobile = $data['mobile'];
            $orderdetail->state = $data['state'];
            $orderdetail->city = $data['city'];
            $orderdetail->pin = $data['pin'];
            $orderdetail->address = $data['address'];
            $orderdetail->save();


        }

        return redirect('/')->with('status', "Ordered successfully");

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