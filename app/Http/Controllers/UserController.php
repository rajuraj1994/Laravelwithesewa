<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use App\Models\Cart;
use App\Models\Order;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->limit(8)->get();
        return view('users.homepage', compact('products'));
    }
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('users.products', compact('products'));
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('users.productdetails', compact('product'));
    }

    public function add_to_cart(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();
        if ($existingCartItem) {
            return redirect()->back()->with('error', 'Item is already in the cart');
        }
        Cart::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => $request->get('quantity')
        ]);
        $request->session()->flash('msg', 'item added to cart');
        return redirect()->back();

    }

    public function show_user_cart()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        return view('users.cart', compact('cartItems'));
    }
    public function buy_form($id)
    {
        $cart = Cart::find($id);
        return view('users.buy', compact('cart'));
    }

    public function order_process(Request $request, $id)
    {
        $user = Auth::user();
        $cart = Cart::find($id);
        $quantity = $request->get('quantity');
        $price = $cart->products->product_price;
        $totalAmount = $quantity * $price;
        $payment_method = $request->get('pay');
        $order = Order::create([
            'product_id' => $cart->products->id,
            'user_id' => $cart->user->id,
            'quantity' => $quantity,
            'total_amount' => $totalAmount,
            'payment_method' => $request->get('pay'),
            'address' => $request->get('address'),
            'contact' => $request->get('contact')
        ]);
        if ($payment_method == 'esewa') {
            return view('users.esewa', compact('order', 'cart'));
        } else {
            $cart->delete();
            $request->session()->flash('msg', 'order completed');
            return redirect()->route('myorders');
        }
    }

    public function myorders()
    {
        $user = Auth::user();
        $orderItems = Order::where('user_id', $user->id)->get();
        return view('users.order', compact('orderItems'));
    }

    public function esewaVerify(Request $request)
    {
        $o_id = $request->input('oid');
        $amount = $request->input('amt');
        $refId = $request->input('refId');
        $url = "https://uat.esewa.com.np/epay/transrec";

        $data = [
            'amt' => $amount,
            'rid' => $refId,
            'pid' => $o_id,
            'scd' => 'EPAYTEST'
        ];

        // Initialize cURL session
        $curl = curl_init($url);

        // Set cURL options
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request and get response
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        $status = trim($response);
        if ($status=='Success') {
            list($order_id, $cart_id) = explode('_', $o_id);
            $order = Order::find($order_id);
            $order->payment_status = true;
            $order->save();

            $cart = Cart::find($cart_id);
            $cart->delete();

            $request->session()->flash('success', 'Payment Successful');
            return redirect()->route('myorders');
        } else {
            $request->session()->flash('error', 'Unable to make Payment');
            return redirect()->route('cart');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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