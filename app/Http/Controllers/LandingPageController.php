<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function shop()
    {
        return view('shop');
    }

    public function shop_detail()
    {
        return view('shop-detail');
    }

    public function chart()
    {
        return view('chart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function testimonial()
    {
        return view('testimonial');
    }

    public function contact()
    {
        return view('contact');
    }
    public function login()
    {
        return view('login');
    }
    public function daftar()
    {
        return view('daftar');
    }
}
