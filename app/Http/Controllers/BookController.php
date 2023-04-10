<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorite;
use App\Models\Read;

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
            'book' => $book,
            'favorite' => Favorite::where(['user_id' => auth()->user()->id, 'book_id' => $book->id])->first(),
            'read' => Read::where(['user_id' => auth()->user()->id, 'book_id' => $book->id])->first()
        ]);
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
