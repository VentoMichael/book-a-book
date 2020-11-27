<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $books = Book::orderBy('title')
            ->get();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        new Book($this->validateBook());
        $book = new Book();
        $book->picture = request('picture')->store('books');
        $book->title = request('title');
        $book->author = request('author');
        $book->publishing_house = request('publishing_house');
        $book->isbn = request('isbn');
        $book->presentation = request('presentation');
        $book->public_price = request('public_price');
        $book->proposed_price = request('proposed_price');
        $book->stock = request('stock');
        $book->save();
        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = request($this->validateBook());
        if ($request->hasfile("picture")) {
            $book->picture = request('picture')->store('books');
        } else {
            $book->picture = Input::old('picture');
        }
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
        $book->update($validatedData);
        return redirect($book->path());

    }

    protected function validateBook()
    {
        return request()->validate([
            'picture' => 'required|image',
            'title' => 'required',
            'author' => 'required',
            'publishing_house' => 'required',
            'presentation' => 'required',
            'isbn' => 'required',
            'public_price' => 'required',
            'proposed_price' => 'required',
            'stock' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return string
     */
    //TODO: add a save book
    public function destroy(Book $book)
    {
        $book->delete();
<<<<<<< 4f95b62a3e11769b3815c3c24aa6c4661f507165

=======
>>>>>>> add update data of admin
        return Redirect::to('books');
    }
}
