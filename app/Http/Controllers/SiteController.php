<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getHome()
    {
        return view('site.home');
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
