<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $table = 'rented';

    protected $guarded = [];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query) =>
                $query->WhereHas('book', fn ($query) => 
                                    $query->where('title', 'like', '%' . $search . '%')
                                )
            )
        );
    }

    
    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
