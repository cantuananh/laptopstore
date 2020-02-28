<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Product;
use App\User;

class StatisticalController extends Controller
{

    public function index()
    {
        $user_new = User::latest('id')->limit(5)->get();
        $product = Product::all()->count();
        $bill = Bill::all()->count();
        $category = Bill::all()->count();
        $user = User::all()->count();

        return view('backend.statistical', compact('user', 'product', 'category', 'bill', 'user_new'));
    }

}
