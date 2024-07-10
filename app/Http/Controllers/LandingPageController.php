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

    public function umkm()
    {
        return view('umkm');
    }

    public function informasi()
    {
        return view('informasi');
    }

    public function chart()
    {
        return view('chart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function pembina()
    {
        return view('pembina');
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
