<?php

namespace App\Http\Controllers;

use App\Models\Read;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function show()
    {   
        return view('books.booktable',[
            'favorites' => Read::where('user_id', auth()->user()->id)->with('book')->paginate(18)->withQueryString()
        ]);
    }

    public function store(){
        $attributes = request()->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id'
        ]);

        Read::create($attributes);

        return redirect('/read');
    }

    public function destroy(Read $read)
    {
        $read->delete();

        return back()->with('success', 'Book removed from read list');
    }
}
