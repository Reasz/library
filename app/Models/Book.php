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
                    ->orWhereHas('authors', fn ($query) => 
                                    $query->where('name', 'like', '%' . $search . '%')
                                )
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

    public function favorites() {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function read() {
        return $this->belongsToMany(User::class, 'reads');
    }

    public function rents() {
        return $this->belongsToMany(User::class, 'rented');
    }

    public function checkFavorites()
    {
        if(Favorite::where(['book_id' => $this->id, 'user_id' => auth()->user()->id])->exists()){
            return true;
        }
        return false;
    }

    public function checkRead()
    {
        if(Read::where(['book_id' => $this->id, 'user_id' => auth()->user()->id])->exists()){
            return true;
        }
        return false;
    }
}
