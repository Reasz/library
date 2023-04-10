<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AdminAuthorController extends Controller
{
    public function create(){
        return view('admin.authors.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|string'
        ]);

        $book = Author::create($attributes);

        return back()->with('success', 'Author Added');
    }
}
