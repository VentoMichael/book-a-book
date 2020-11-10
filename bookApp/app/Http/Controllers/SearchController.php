<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;


class SearchController extends Controller
{

    public function index()
    {
        // TODO : https://laravel.com/docs/8.x/eloquent#query-scopes
        $search = Request::input('search');
        $users = User::admin()->where('name', 'LIKE', '%' . $search . '%')->orWhere('surname', 'LIKE', '%' . $search . '%')->get();
        $books = Book::where('title', 'LIKE', '%' . $search . '%')->get();
        if (count($users) || count($books)) {
            if (count($users)) {
                return view('admin.search.search',compact('users','books'))->withQuery($search);
            }
        } else return view('admin.search.no-result');
    }
}
