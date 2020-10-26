<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;


class SearchController extends Controller
{
    public function index(){
        $search = Request::input('search');
        $user = User::where('name', 'LIKE', '%' . $search . '%')->orWhere('surname', 'LIKE', '%' . $search . '%')->get();
        if (count($user) > 0)
            return view('admin.search')->withDetails($user)->withQuery($search);
        else return view('admin.search')->withMessage('No Details found. Try to search again !');
    }
}
