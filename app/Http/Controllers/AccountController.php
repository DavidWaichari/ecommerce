<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('client/account/index');
    }
    public function orders()
    {
        // Get the user's orders sorted by the latest using query builder
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->get();

        return view('client/account/orders', compact('orders'));
    }

}
