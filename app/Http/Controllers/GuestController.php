<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        $categories = Category::where('status', 'Active')->get();
        return view('welcome', compact('categories'));
    }
}
