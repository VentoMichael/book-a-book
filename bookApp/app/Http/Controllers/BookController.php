<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $book->picture = request('picture');
        $book->title = request('title');
        $book->author = request('author');
        $book->publishing_house = request('publishing_house');
        $book->isbn = request('isbn');
        $book->presentation = request('presentation');
        $book->public_price = request('public_price');
        $book->proposed_price = request('proposed_price');
        $book->stock = request('stock');
        $book->save();

        //if ($request->hasfile("picture")) {
        //    $file = $request->file("picture");
        //    $img = Image::make($file)->resize(500, 500)->encode();
        //    $filename = time().'.'.$file->getClientOriginalExtension();

        //    Storage::put($filename, $img);
        //    //Move file to your location
        //    Storage::move($filename, 'public/books/'.$filename);
        //    $book->picture = $img;
        //    $book->update();
        //}
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
        //si y a une image envoye alors change
        //alors book->picture = request('picture')
        //formRequest
        $book->picture = request('picture');
        $book->title = request('title');
        $book->author = request('author');
        $book->publishing_house = request('publishing_house');
        $book->isbn = request('isbn');
        $book->presentation = request('presentation');
        $book->public_price = request('public_price');
        $book->proposed_price = request('proposed_price');
        $book->stock = request('stock');
        $validatedData['picture'] = request('picture')->store('books');
        $book->update($validatedData);
        return redirect($book->path());
    }

    protected function validateBook()
    {
        // TODO: NOT VALIDATED MIMES PICTURE
        return request()->validate([
            'picture' => 'required|mimes:jpeg,jpg,png',
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
    //TODO: Add a second chance to delete
    public function destroy(Book $book)
    {
        $book->delete();

        Session::flash('message', 'Le livre a bien été supprimé !');
        return Redirect::to('books');
    }
}
