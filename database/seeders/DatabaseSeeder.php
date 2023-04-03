<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthors;
use App\Models\Comment;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret'),
            'edited_at' => now()
        ]);
/*
        $author1 = Author::factory()->create();
        $author2 = Author::factory()->create();
        $book1 = Book::factory()->create();

        $bookAuthorIds = [$author1->id, $author2->id];
        $book1->authors()->attach($bookAuthorIds);
*/
        Book::factory(10)->create();

        Comment::factory(50)->create();
        
        Author::factory(5)->create();

        $authors = Author::all();
        Book::all()->each(function ($book) use ($authors) { 
            $book->authors()->attach(
                $authors->random(rand(1, 2))->pluck('id')->toArray()
            );
        });

        $scifi = Genre::factory()->create(['name' => 'sci-fi']);
        $reallife = Genre::factory()->create(['name' => 'real life']);
        $fantasy = Genre::factory()->create(['name' => 'fantasy']);
        Genre::factory()->create(['name' => 'thriller']);
        Genre::factory()->create(['name' => 'horror']);
        Genre::factory()->create(['name' => 'historical']);
        Genre::factory()->create(['name' => 'romance']);

        //Genre::factory(5)->create();

        //$book1->genres()->attach($scifi->id);

        $genres = Genre::all();
        Book::all()->each(function ($book) use ($genres) { 
            $book->genres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        
    }
}
