<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function show(Book $book)
    {
        return view('admin.rent', [
            'book' => $book
        ]);
    }

    public function index()
    {
        return view('admin.index', [
            'rents' => Rent::latest()
                    ->paginate(18)
                    ->withQueryString()
        ]);
    }

    public function store(Book $book)
    {
        $attributes = request()->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'number_of_copies' => 'required|numeric|max:' . $book->number_of_copies - $book->rented_copies . '|min:1'
        ]);
        
        Rent::create($attributes);
        $book->update([
            'rented_copies' => $book->rented_copies + $attributes['number_of_copies']
        ]);
        
        return back()->with('success', 'Book succesfully rented');
    }

    public function destroy(Rent $rent)
    {
        $book = Book::where(['id' => $rent->book_id])->first();
        $book->update([
            'rented_copies' => $book->rented_copies - $rent->number_of_copies
        ]);
        $rent->delete();

        return back()->with('success', 'Rented Book Deleted');
    }
}
