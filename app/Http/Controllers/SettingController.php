<?php

namespace App\Http\Controllers;

<<<<<<< 4f95b62a3e11769b3815c3c24aa6c4661f507165
=======
use App\Models\User;
>>>>>>> add update data of admin
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }
}
