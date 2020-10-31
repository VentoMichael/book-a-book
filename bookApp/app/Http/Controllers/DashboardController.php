<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $students = \App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->orderBy('name')->get();

        return view('admin.dashboard', compact('students','books'));
    }
}
