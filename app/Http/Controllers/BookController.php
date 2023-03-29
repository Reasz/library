<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books()
    {
        return view('books', [
            'books' => Book::latest()->get()
        ]);
    }

    public function book(Book $book)
    {
        return view('book', [
            'book' => $book
        ]);
    }
}
