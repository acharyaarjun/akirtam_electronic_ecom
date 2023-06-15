<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    // Category manage garni function
    public function getManageCategory()
    {
        return view('admin.category.manage');
    }
    // Product manage garni function
    public function getManageProduct()
    {
        return view('admin.product.manage');
    }
}
