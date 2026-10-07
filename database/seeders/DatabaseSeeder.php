<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(50)
            ->has(Review::factory(10))
            ->create()
            ->each(function (Author $author) {
                Book::factory(rand(1, 10))
                    ->has(Review::factory(rand(1, 5)))
                    ->for($author)
                    ->create();
            });

    }
}
