<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function addToCartDirect($slug)
    {

        $product = Product::where('slug', $slug)->where('deleted_at', null)->where('status', 'active')->limit(1)->first();

        if (is_null($product)) {
            return redirect()->back()->with('error', 'Product not found');
        }
        dd($slug);
    }
}
