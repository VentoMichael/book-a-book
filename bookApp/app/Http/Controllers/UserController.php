<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    // TODO : gerer le cas ou il n'y a pas d'étudiants
    public function index()
    {
        $orders = Order::with('user')->get();
        $students = \App\Models\User::whereHas('roles', function ($query){
            $query->where('name', 'student');
        })->orderBy('name')->get();
        return view('admin.dashboard', compact('students','orders'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $books = Book::all();
        return view ('admin.user.show',compact('user','books'));
    }
}
