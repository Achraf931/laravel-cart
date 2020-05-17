<?php

namespace App\Http\Controllers;

use App\Mail\MailtrapExampl;
use App\Order;
use App\Order_Products;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/products', ['products' => Product::paginate(3), 'title' => 'Products']);
    }

    public function show($id)
    {
        return view('products/product', ['product' => Product::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        if($id AND $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            return redirect()->back();
        }
    }

    public function remove($id)
    {
        if($id)
        {
            $cart = session()->get('cart');

            if(isset($cart[$id])) {

                unset($cart[$id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            return redirect()->back();
        }
    }

    public function cart()
    {
        return view('products/cart');
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if(!$product)
        {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart)
        {
            $cart = [
                $id => [
                    "id" => $id,
                    "title" => $product->title,
                    "quantity" => $request->quantity,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];

            session()->put('cart', $cart);
            session()->flash('success', 'Product added to cart successfully!');

            return redirect()->back();
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id]))
        {

            $cart[$id]['quantity']+= $request->quantity;

            session()->put('cart', $cart);
            session()->flash('success', 'Product added to cart successfully!');

            return redirect()->back();

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $id,
            "title" => $product->title,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "image" => $product->image
        ];

        session()->put('cart', $cart);
        session()->flash('success', 'Product added to cart successfully!');

        return redirect()->back();
    }

    public function checkoutPage()
    {
        return view('products/checkout');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required|numeric',
            'cardNumber' => 'required|numeric',
            'codeCvv' => 'required|numeric',
            'month' => 'required|numeric',
            'year' => 'required|numeric'
        ]);

        $token = bin2hex(openssl_random_pseudo_bytes(16));

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash('md5', $request->password);
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->additional = $request->additional;
        $user->save();

        $order = new Order();
        $order->order_token = $token;
        $order->user_id = $user->id;
        $order->save();

        foreach (session()->get('cart') as $product) {
            $order_products = new Order_Products();
            $order_products->order_id = $order->id;
            $order_products->product_id = $product['id'];
            $order_products->quantity = $product['quantity'];
            $order_products->save();
        }

        Mail::to($user->email)->send(new MailtrapExampl($token));

        return redirect('/confirm');
    }

    public function pageConfirm()
    {
        $products = session()->get('cart');

        if (!isset($products) )
            return redirect('/');

        session()->forget('cart');
        $user = User::latest()->first();

        return view('products/confirmation',['user' => $user, 'products' => $products]);
    }
}
