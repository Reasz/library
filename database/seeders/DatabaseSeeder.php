<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
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

        Book::factory(15)->create();
        Author::factory(5)->create();

        $author = Author::factory()->create();

        $scifi = Genre::factory()->create(['name' => 'sci-fi']);
        $reallife = Genre::factory()->create(['name' => 'real life']);
        $fantasy = Genre::factory()->create(['name' => 'fantasy']);
    }
}
