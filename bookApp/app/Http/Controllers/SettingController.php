<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }
}
