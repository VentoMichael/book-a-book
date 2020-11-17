<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::student()->with('orders.books')->orderBy('name')->get();
        $orders = Order::all();
        return view('admin.dashboard', compact('users','orders'));
    }
}
