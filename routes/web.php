<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\SessionsController;
// use Illuminate\Support\Facades\DB;
use App\Models\Idea;

Route::get('/', function () //Forgot how these work.
{
    return 'Placeholder For the HomePage';
});

Route::middleware('auth')->group(function ()
{
    Route::get('/ideas', [IdeaController::class, 'index'])->middleware('auth');
    Route::get('/ideas/create', [IdeaController::class, 'create']);
    Route::get('/ideas/{idea}', [IdeaController::class, 'show']);
    Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);
    Route::patch('ideas/{idea}', [IdeaController::class, 'update']);
    Route::delete('ideas/{idea}', [IdeaController::class, 'destroy']);
    Route::post('/ideas', [IdeaController::class, 'store']);

    Route::delete('/logout', [SessionsController::class, 'destroy']);
});

Route::middleware('guest')->group(function ()
{
    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login', [SessionsController::class, 'store']);
});










//This was used to store data and persist it, In other words, this was used to save the data into the database as well as redirect to the homepage. 
// $idea = request('description');
// //    session()->push('ideas', $idea); // Using Session to persist data
// //    $ideas = session()->get('ideas');


// Idea::create([
//     'description' => $idea,
//     'state' => "pending"
// ]);
// return redirect('/ideas');











Route::get("/about", function ()
{
    return view("about");
});

// Route::get("/contact", function (){
//     return view("contact");
// });

Route::view("/contact", "contact"); //Same as above