<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        "namae" => request("person", "WORLD"),
        "tasks" => [
            "Play Games",
            "Build a Resume",
            "Get a Job",
            "Earn Loads and Loads of cash"
        ]
    ]);
});

Route::get("/about", function () {
    return view("about");
});

// Route::get("/contact", function (){
//     return view("contact");
// });

Route::view("/contact", "contact"); //Same as above