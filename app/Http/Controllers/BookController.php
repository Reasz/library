<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthors;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function books()
    {
        //$books = Book::latest()->get();
        
        return view('books.books', [
            //'books' => Book::latest()->get(),
            //'books' => $this->getBooks(),
            'books' => Book::latest()->filter(
                request(['search', 'genres', 'authors'])
            )->paginate(18)->withQueryString()
        ]);
    }

    public function book(Book $book)
    {
        return view('books.book', [
            'book' => $book
        ]);
    }

    public function create(){
        return view('books.create');
    }

    public function store(){
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

        $attributes['rented_copies'] = 0;

        $book = Book::create($attributes);
        $book->genres()->attach(request()->input('genres'));

        return redirect('/books');
    }

    // index --show all resoruce, show --sow one resource, create, store, edit, update, destroy

    

/*
    public function getBooks() {
        //return Book::latest()->filter()->get();

        
        $books = Book::latest();

        if(request('search')) {
            $books
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('summary', 'like', '%' . request('search') . '%');
        }

        return $books->get();
        
    }
*/
}
