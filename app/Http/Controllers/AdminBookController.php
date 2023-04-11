<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index() {
        return view('admin.books.index', [
            'books' => Book::latest()->filter(
                request(['search', 'authors'])
            )->with('authors')->paginate(18)
        ]);
    }

    public function create(){
        return view('admin.books.create');
    }

    public function store(){
        $attributes = request()->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'edition' => 'required|integer',
            'placement' => 'required|string',
            'isbn' => 'required|integer',
            'number_of_copies' => 'required|integer'
        ]);

        request()->validate([
            'genres' => 'required|array|min:1',
            'genres.*' => 'required|string|distinct|min:1',//['required', Rule::exists('genres', 'id')]
            'authors' => 'required|array|min:1',
            'authors.*' => 'required|string|distinct|min:1'//['required', Rule::exists('authors', 'id')]
        ]);

        $attributes['rented_copies'] = 0;

        $book = Book::create($attributes);
        $book->genres()->attach(request()->input('genres'));
        $book->authors()->attach(request()->input('authors'));

        return back()->with('success', 'Book Added');
    }

    public function edit(Book $book) {
        return view('admin.books.edit', [
            'book' => $book
        ]);
    }

    public function update(Book $book)
    {
        $attributes = request()->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'edition' => 'required|integer',
            'placement' => 'required|string',
            'isbn' => 'required|integer',
            'number_of_copies' => 'required|integer',
            //'genres' => 'required',
            //'genres.*' => 'required'//['required', Rule::exists('genres', 'id')],
            //'author' => 'required'
        ]);

        $book->update($attributes);

        return back()->with('success', 'Book Updated');
    }

    public function destroy(Book $book){
        $book->delete();

        return back()->with('success', 'Book Deleted');
    }
}
