<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tere', function () {

    $authors = Author::all();

    $authors->load('books.reviews', 'reviews');

    // $books = [];

    // foreach ($authors as $author) {
    //     $books = array_merge($books, $author->books->toArray());
    // }
    
    return view('tere', [
        'authors' => $authors,
    ]);

});
