<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class BookCommentsController extends Controller
{
    public function store(Book $book) {
        request()->validate([
            'comment' => 'required'
        ]);

        $book->comments()->create([
            'user_id' => request()->user()->id,
            'comment' => request('comment')
        ]);

        return back();
    }
}
