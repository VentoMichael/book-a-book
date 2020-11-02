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
        $students = \App\Models\User::with('orders.books','roles')->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->get();

        return view('admin.user.index', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $student)
    {
        return view('admin.user.show', compact('student'));
    }
}
