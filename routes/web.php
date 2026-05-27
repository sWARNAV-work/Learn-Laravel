<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    // $ideas = session()->get('ideas');
    $ideas = DB::table('ideas')->get(); //Using facades to call database
    return view("ideas", [
        'ideas' => $ideas
   ]);
});

Route::post('/ideas', function () {
   $idea = request('idea');
   session()->push('ideas', $idea);
   
   $ideas = session()->get('ideas');
   return redirect('/');
   
});









Route::get("/about", function () {
    return view("about");
});

// Route::get("/contact", function (){
//     return view("contact");
// });

Route::view("/contact", "contact"); //Same as above