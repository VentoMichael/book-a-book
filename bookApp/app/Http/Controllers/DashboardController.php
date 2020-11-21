<?php

namespace App\Http\Controllers;

use App\Models\{Order, User};

class DashboardController extends Controller
{
    public function index()
    {
        //TODO : firstletter variable -> clean
        $users = User::student()->with('orders.books')->orderBy('name')->get();
        $orders = Order::all();
        $firstLetter = '';
        $totalbooks = 0;
        foreach ($users as $user) {
            foreach ($user->orders as $order){
                $totalbooks += $order->books->count();
            }
            //if(strtoupper(substr($user->name,0,1)) !== $firstLetter){
            //    $firstLetter = strtoupper(substr($user->name, 0, 1));
            //}
        }
        $statuses = [
            'paid' => 'Payé',
            'available' => 'Disponible au bureau',
            'delivered' => 'Delivré',
            'ordered' => 'Commandé',
        ];
        return view('admin.dashboard', compact('users', 'orders', 'firstLetter', 'statuses','totalbooks'));
    }
}
