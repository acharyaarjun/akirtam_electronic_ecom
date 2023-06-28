<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public function getHome()
    {
        $data = [
            'categories' => Category::where('deleted_at', null)->where('status', 'active')->orderby('category_title', 'asc')->get(),
            'products' => Product::where('deleted_at', null)->where('status', 'active')->limit(8)->get(),
        ];
        return view('site.home', $data);
    }

    public function getProductDetails($slug)
    {
        $product = Product::where('slug', $slug)->where('deleted_at', null)->where('status', 'active')->first();
        if (is_null($product)) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $data = [
            'product' => $product
        ];
        return view('site.productdetails', $data);
    }

    public function getProductsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->where('deleted_at', null)->where('status', 'active')->first();
        if (is_null($category)) {
            return redirect()->back()->with('error', 'Category not found');
        }
        $data = [
            'category' => $category
        ];
        return view('site.productsbycategory', $data);
    }

    public function getAbout()
    {
        return view('site.about');
    }
    public function getService()
    {
        return view('site.service');
    }
    public function getContact()
    {
        return view('site.contact');
    }

    public function addToCartDirect(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->where('deleted_at', null)->where('status', 'active')->limit(1)->first();

        if (is_null($product)) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart_code = $this->getCartCode();

        $quantity = 1;

        $stock = $product->product_stock;
        $new_stock = $stock -  $quantity;
        if ($new_stock < 1) {
            return redirect()->back()->with('error', 'Product is out of stock');
        }

        $price = $product->orginal_cost - $product->discounted_cost;
        $total_price = $quantity * $price;

        $cart = new Cart;
        $cart->cart_code = $cart_code;
        $cart->product_id = $product->id;
        $cart->quantity = $quantity;
        $cart->price = $price;
        $cart->total_price = $total_price;
        $cart->save();

        $product->product_stock = $new_stock;
        $product->save();

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function postAddToCart(Request $request, $slug)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:5'
        ]);
        $product = Product::where('slug', $slug)->where('deleted_at', null)->where('status', 'active')->limit(1)->first();

        if (is_null($product)) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $quantity = $request->input('quantity');

        $stock = $product->product_stock;
        $new_stock = $stock -  $quantity;
        if ($new_stock < 1) {
            return redirect()->back()->with('error', 'Product is out of stock');
        }

        $cart_code = $this->getCartCode();

        $price = $product->orginal_cost - $product->discounted_cost;
        $total_price = $quantity * $price;

        $cart = new Cart;
        $cart->cart_code = $cart_code;
        $cart->product_id = $product->id;
        $cart->quantity = $quantity;
        $cart->price = $price;
        $cart->total_price = $total_price;
        $cart->save();

        $product->product_stock = $new_stock;
        $product->save();

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function  getCart()
    {
        $cart_code = $this->getCartCode();

        $data = [
            'carts' => Cart::where('cart_code', $cart_code)->get()
        ];
        return view('site.cart', $data);
    }

    public function getUpdateCart(Request $request, $id)
    {
        $cart_code = $this->getCartCode();
        $cart = Cart::where('cart_code', $cart_code)->where('id', $id)->limit(1)->first();
        if (is_null($cart)) {
            return redirect()->back()->with('error', 'Cart not found');
        }
        $request->validate([
            'quantity' => 'required|integer|min:1|max:5'
        ]);

        $product = $cart->getProductFromCart;
        // dd($product);

        $quantity = $request->input('quantity');
        $product_stock = $product->product_stock + $cart->quantity;
        $new_stock = $product_stock -  $quantity;

        if ($new_stock < 1) {
            return redirect()->back()->with('error', 'Product is out of stock');
        }

        $price = $product->orginal_cost - $product->discounted_cost;
        $total_price = $quantity * $price;

        $cart->quantity = $quantity;
        $cart->price = $price;
        $cart->total_price = $total_price;
        $cart->save();

        $product->product_stock = $new_stock;
        $product->save();

        return redirect()->back()->with('success', 'Cart Updated Successfully');
    }

    public function getDeleteCart($id)
    {
        $cart_code = $this->getCartCode();
        $cart = Cart::where('cart_code', $cart_code)->where('id', $id)->limit(1)->first();
        if (is_null($cart)) {
            return redirect()->back()->with('error', 'Cart not found');
        }

        $product = $cart->getProductFromCart;
        $new_stock = $product->product_stock +  $cart->quantity;
        $product->product_stock = $new_stock;
        $product->save();

        $cart->delete();
        return redirect()->back()->with('success', 'Cart deleted Successfully');
    }

    // cart code return garni function
    public function getCartCode()
    {
        // session bata cart code taneko
        $cart_code = Session::get('cart_code');

        // yedi session ma cart_code xaina vaney
        if (is_null($cart_code)) {
            // naya cart code generate gareko jun chai 8 length ko hunxa ani return gareko
            $cart_code = Str::random(8);
            // Session::put('cart_code', $cart_code);
            session(['cart_code' => $cart_code]);
            return $cart_code;
        }
        // yedi session ma cart code xa vaney
        else {
            // yedi tyo cart code already orders table ma xa vaney yaniki tyo cart code ko checkout vaeskako check gareko
            $check = Order::where('cart_code', $cart_code)->limit(1)->first();

            // orders table ma tyo cart code xaina vaney tehi cart_code return gareko
            if (is_null($check)) {
                return $cart_code;
            }
            // yedi orders table ma tyo cart code xa vaney naya cart code generate gareko
            else {
                $cart_code = Str::random(8);
                session(['cart_code' => $cart_code]);
                // Session::put('cart_code', $cart_code);
                return $cart_code;
            }
        }
    }
}
