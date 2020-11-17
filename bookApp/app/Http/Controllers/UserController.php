<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    // TODO : verifier dans la vue/personnel le total de livres et faire la somme
    // TODO : if order or not
    // TODO : mail notifications
    public function index()
    {
        $users = User::student()->orderBy('name')->get();

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
            'file_name' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => [
                'string',
                'email',
                'max:255',
            ]
        ]);
        if (request('password')){
            request()->validate([
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'max:255',
                    'confirmed'
                ],
            ]);
        }
        if ($request->hasFile('file_name')){
            Storage::makeDirectory('users');
            $filename = request('file_name')->hashName();
            $img = Image::make($user->file_name)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/users/'.$filename));
            $user->file_name = 'users/' . $filename;
        }
        $attributes['email'] = request('email');
        $attributes['password'] = Hash::make(request('password'));

        $user->update($attributes);

        return redirect(route('users.show', ['user' => $user->name]));
    }

}
