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
    // TODO : link notifications
    // TODO : show view paied or not
    // TODO : link to student if is ordered or not
    // TODO : add message of sucess or not in (notifications,add book, delete book,...)
<<<<<<< 4f95b62a3e11769b3815c3c24aa6c4661f507165
=======
    // TODO : check the update of user
    // TODO : http://127.0.0.1:8000/users/Vento/ don't have access
>>>>>>> add update data of admin
    public function index()
    {
        $students = \App\Models\User::with('orders.books', 'roles')->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->get();

        return view('admin.user.index', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $student)
    {
        return view('admin.user.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit()
    {
        $admin = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'administrator');
        })->get();
        return view('admin.user.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        // TODO : password n'est pas le même qu'avant
        $attributes = request()->validate([
            'file_name' => 'image',
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' =>
                'required',
                'string',
                'min:8',
                'max:255',
                'confirmed'

        ]);
        if ($request->hasfile("file_name")) {
            $attributes['file_name'] = request('file_name')->store('users');

        } else {
           // $attributes['file_name'] = Input::old('file_name');
        }
        if (Hash::check($request->password, $admin->password)) {
            $admin->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
        }
        $attributes['email'] = request('email');
        //$attributes['password'] = Hash::make(request('password'));

        $admin->first()->update($attributes);

        return redirect(asset('/users/Vento/edit'));
    }

    public function validateBook()
    {
        return;
    }

}
