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
        if (count($user) || count($book)) {
            if (count($user)) {
                return view('admin.search.search',compact('user','book'))->withQuery($search);
            }
        } else return view('admin.search.no-result');
    }
}
