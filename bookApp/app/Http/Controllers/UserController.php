<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    // TODO : verifier dans la vue/personnel le total de livres et faire la somme
    // TODO : mail notifications
    public function index()
    {
        $users = User::with('orders.books', 'roles')->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->orderBy('name')->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::admin()->get();
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // TODO : taille image && redimensionnement
        $attributes = request()->validate([
            'file_name' => 'image|mimes:jpeg,png,jpg,gif,svg|size:2048',
            'email' => [
                'string',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'confirmed'
            ],
        ]);
        if ($request->hasfile("file_name")) {
            $attributes['file_name'] = request('file_name')->store('users');
        }
        $attributes['email'] = request('email');
        $attributes['password'] = Hash::make(request('password'));

        $user->update($attributes);

        return redirect(route('users.show', ['user' => $user->name]));
    }

}
