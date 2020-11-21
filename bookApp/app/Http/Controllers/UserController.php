<?php

namespace App\Http\Controllers;

use App\Mail\AccountChanged;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    // TODO : mail notifications
    public function index()
    {
        $users = User::student()->with('orders')->orderBy('name')->get();
        $statuses = [
            'paid' => 'Payé',
            'available' => 'Disponible au bureau',
            'delivered' => 'Delivré',
            'ordered' => 'Commandé',
        ];
        return view('admin.user.index', compact('users','statuses'));
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
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = request()->validate([
            'file_name' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => [
                'string',
                'email',
                'max:255',
            ]
        ]);
        if (request('password')) {
            request()->validate([
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'confirmed'
                ],
            ]);
        }
        //if ($request->hasFile('file_name')) {
        //    Storage::makeDirectory('users');
        //    $filename = request('file_name')->hashName();
        //    $img = Image::make($request->file('file_name'))->resize(300, null, function ($constraint) {
        //        $constraint->aspectRatio();
        //    })->save(storage_path('app/public/users/'.$filename));
        //    $user->file_name = 'users/'.$filename;
        //    $attributes['file_name'] = $img;
        //}
//TODO : file_name -> private folder why ?
        $attributes['email'] = request('email');
        $attributes['password'] = Hash::make(request('password'));

        $user->update($attributes);
        Mail::to(request('email'))
            ->send(new AccountChanged());
        return redirect(route('users.show', ['user' => $user->name]));
    }

}
