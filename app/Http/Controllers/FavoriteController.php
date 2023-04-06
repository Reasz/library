<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function show()
    {   
        return view('books.booktable',[
            'favorites' => Favorite::where('user_id', auth()->user()->id)->with('book')->paginate(18)->withQueryString()
        ]);
    }

    public function store(){
        $attributes = request()->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id'
        ]);

        Favorite::create($attributes);

        return redirect('/favorites');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return back()->with('success', 'Book removed from favorites');
    }
}
