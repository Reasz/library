<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorite;
use App\Models\Read;

class BookController extends Controller
{
    public function books()
    {        
        return view('books.books', [
            'books' => Book::latest()->filter(
                request(['search', 'genres', 'authors'])
            )->with(['authors', 'genres'])->paginate(18)->withQueryString()
        ]);
    }

    public function book(Book $book)
    {
        if (auth()->user())
        {
            return view('books.book', [
                'book' => $book,
                'favorite' => Favorite::where(['user_id' => auth()->user()->id, 'book_id' => $book->id])->first(),
                'read' => Read::where(['user_id' => auth()->user()->id, 'book_id' => $book->id])->first()
            ]);
        }

        return view('books.book', [
            'book' => $book
        ]);
        
    }

}
