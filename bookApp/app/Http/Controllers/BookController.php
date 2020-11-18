<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Hash;
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
        $books = Book::noDraft()->orderBy('title')
            ->get();
        $booksDraft = Book::draft()->orderBy('title')
            ->get();
        return view('admin.book.index', compact('books', 'booksDraft'));
    }

    public function draft()
    {
        $booksDraft = Book::draft()->orderBy('title')
            ->get();
        return view('admin.book.draft', compact('booksDraft'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $booksDraft = Book::draft()->orderBy('title')
            ->get();
        return view('admin.book.create', compact('booksDraft'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        // TODO : mail notifications book
        // TODO : saveBook fake book
        // TODO : Update resize don't work
        $book = new Book($this->validateBook());
        if ($request->hasFile('picture')) {
            Storage::makeDirectory('books');
            $filename = request('picture')->hashName();
            $img = Image::make($book->picture)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/books/'.$filename));
            $book->picture = 'books/'.$filename;
        }
        $book->picture = request('picture')->store('books');
        $book->title = request('title');
        $book->author = request('author');
        $book->publishing_house = request('publishing_house');
        $book->isbn = request('isbn');
        if (request('orientation')) {
            $book->orientation = request('orientation');
        }
        $book->orientation = request('orientation');
        $book->presentation = request('presentation');
        $book->public_price = request('public_price');
        $book->proposed_price = request('proposed_price');
        $book->stock = request('stock');
        $book->is_draft = $request->has('save');
        $book->save();
        Session::flash('message', 'Livre créer avec succès');
        return \redirect(route('books.show', ['book' => $book->title]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $booksDraft = Book::draft()->orderBy('title')
            ->get();
        return view('admin.book.show', compact('book', 'booksDraft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $booksDraft = Book::draft()->orderBy('title')
            ->get();
        return view('admin.book.edit', compact('book', 'booksDraft'));
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
        // name publish/not
        //if ($book->is_draft) {
        //    $book->is_draft = false;
        //    $book->update();
        //} else {
            $validatedData = request($this->validateBook());
            if ($request->hasFile('picture')) {
                Storage::makeDirectory('books');
                $filename = request('picture')->hashName();
                Image::make($request->file('picture'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/books/'.$filename));
                $book->picture = 'books/'.$filename;
            }
            $book->title = request('title');
            $book->author = request('author');
            $book->publishing_house = request('publishing_house');
            $book->isbn = request('isbn');
            if (request('orientation')) {
                $book->orientation = request('orientation');
            }
            $book->presentation = request('presentation');
            $book->public_price = request('public_price');
            $book->proposed_price = request('proposed_price');
            $book->stock = request('stock');
            $book->update($validatedData);
       // }
        Session::flash('message', 'Livre éditer avec succès');
        return redirect(route('books.index', ['book' => $book]));

    }

    protected function validateBook()
    {
        return request()->validate([
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'author' => 'required',
            'publishing_house' => 'required',
            'isbn' => 'required',
            'orientation' => 'required',
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
    //TODO: add a saveBook book PRIORITY HIGHT ADD SAVE BUTTON WORK AND SHOW OR NOT THE INFORMATIONS OF BOOKS SAVED ?
    public function destroy(Book $book, Request $request)
    {
        $book->delete();
        Session::flash('message', 'Livre supprimé avec succès');
        return Redirect::to(route('books.index'));
    }
}
