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
        $search = Request::input('search');
        $user = User::where('name', 'LIKE', '%' . $search . '%')->orWhere('surname', 'LIKE', '%' . $search . '%')->get();
        $book = Book::where('title', 'LIKE', '%' . $search . '%')->get();

        if (count($user) > 0 || count($book) > 0) {
            if (count($user) > 0) {
                return view('admin.search-user',compact('user'))->withDetails($user)->withQuery($search);
            }
            if (count($book) > 0) {
                return view('admin.search-book',compact('book'))->withDetails($book)->withQuery($search);
            }
        } else return Redirect::back();
    }
}
