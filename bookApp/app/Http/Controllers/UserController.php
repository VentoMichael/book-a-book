<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    // TODO : gerer le cas ou il n'y a pas d'étudiants
    // TODO : verifier dans la vue/personnel le total de livres et faire la somme
    // TODO : link notifications
    public function index()
    {
        $students = \App\Models\User::with('orders.admins', 'roles')->whereHas('roles', function ($query) {
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
        dd('ff');
        $validatedData = request($this->validateBook());
        $book->picture = request('picture')->store('books');
        $book->title = request('title');
        $book->author = request('author');
        $book->publishing_house = request('publishing_house');
        $book->isbn = request('isbn');
        $book->presentation = request('presentation');
        $book->public_price = request('public_price');
        $book->proposed_price = request('proposed_price');
        $book->stock = request('stock');
        // TODO: check the file
        //if ($request->hasfile("picture")) {
        //    $book->picture = '';
        //}
        $book->update($validatedData);
        return redirect($book->path());

    }

    protected function validateAdmin()
    {
        return request()->validate([
            'file_name' => 'image',
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}
