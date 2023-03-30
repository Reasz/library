<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthors extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_author_id';  
/*
    public function book() {
        return $this->hasMany(Book::class);
    }

    public function author(){
        return $this->hasMany(Author::class);
    }
    */
}
