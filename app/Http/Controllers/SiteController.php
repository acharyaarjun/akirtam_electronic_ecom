<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getHome()
    {
        $data = [
            'categories' => Category::where('deleted_at', null)->where('status', 'active')->orderby('category_title', 'asc')->get(),
        ];
        return view('site.home', $data);
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
}
