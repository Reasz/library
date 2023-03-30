<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) { // Book::newQuery()->filter()
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('summary', 'like', '%' . $search . '%');
        });
        /*
        if($filters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('summary', 'like', '%' . request('search') . '%');
        }
        */
    }

    public function authors() {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'book_genres');
    }
}
