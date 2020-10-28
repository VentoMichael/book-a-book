<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;


class SearchController extends Controller
{
    public function index()
    {
        $search = Request::input('search');
        $user = User::where('name', 'LIKE', '%' . $search . '%')->orWhere('surname', 'LIKE', '%' . $search . '%')->get();

        if (count($user) > 0)
            return view('admin.search')->withDetails($user)->withQuery($search);
        else return view('admin.search')->withMessage("Je n\'ai rien trouvé, essayez une autre recherche !");
    }
    //verifier si le input est autre que un utilisateur probleme
    // mettre les livres aussi en recherche
    //
}
