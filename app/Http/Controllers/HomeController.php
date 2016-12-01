<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        return view('home', ['ads' => $ads]);
    }

    public function registered()
    {
        Auth::logout();
        return view('ads.verification');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
