<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthors;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books()
    {
        //$books = Book::latest()->get();
        
        return view('books.books', [
            //'books' => Book::latest()->get(),
            //'books' => $this->getBooks(),
            'books' => Book::latest()->filter(request(['search', 'genres', 'authors']))->get()
        ]);
    }

    public function book(Book $book)
    {
        return view('books.book', [
            'book' => $book
        ]);
    }
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
