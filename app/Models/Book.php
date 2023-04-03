<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters) { // Book::newQuery()->filter()
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('summary', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['genres'] ?? false, fn ($query, $genres) =>
            $query->whereHas('genres', fn ($query) => 
                $query->where('genre_id', $genres)
            )
        );

        $query->when($filters['authors'] ?? false, fn ($query, $authors) =>
            $query->whereHas('authors', fn ($query) => 
                $query->where('author_id', $authors)
            )
        );

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

    public function comments() {
        return $this->hasMany(Comment::class, 'book_id');
    }
}
