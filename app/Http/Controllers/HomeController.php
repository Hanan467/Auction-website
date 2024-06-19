<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function seller(){
        return view('seller.dashboard');
    }
    public function bidder(){
        return view('bidder.dashboard');
    }
}
