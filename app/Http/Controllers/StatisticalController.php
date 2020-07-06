<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class StatisticalController extends Controller
{

    public function index()
    {
        $user_new = User::latest('id')->limit(5)->get();
        $product = Product::all()->count();
        $bill = Bill::all()->count();
        $order = Order::all()->count();
        $user = User::all()->count();

        return view('backend.statistical', compact('user', 'product', 'order', 'bill', 'user_new'));
    }

    public function thongke()
    {
        $days = 30;

        $range = Carbon::now()->subDays($days);

        $stats = DB::table('orders')
            ->where('created_at', '>=', $range)
            ->where('deleted_at', null)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ]);

        return $stats;
    }
    public function kekhai()
    {
        $range = Carbon::now()->subMonth(5);
        $orderYear = DB::table('bills')
            ->select(DB::raw('month(created_at) as getYear'), DB::raw('COUNT(*) as value'))
            ->where('created_at', '>=', $range)
            ->where('deleted_at', null)
            ->groupBy('getYear')
            ->orderBy('getYear', 'ASC')
            ->get();

        return view('backend.thongke',compact('orderYear'));
    }
}
