<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;
use App\Models\Idea;

/* =========================================
   Index of Notes(All Notes)
   =========================================
*/
Route::get('/ideas', function ()
{
    // $ideas = session()->get('ideas');
    // $ideas = DB::table('ideas')->get();                                           //Using facades to call database
    // $ideas = Idea::query()->when(request('state'), function ($query, $state)      //Using Eloqeunt to call Database
    // {
    //     $query->where('state', $state);
    // })->get();

    $ideas = Idea::all();
    return view("ideas/index", [
        'ideas' => $ideas
    ]);
});
/* =END= */

/* =========================================
   Showing one Note
   =========================================
*/
Route::get('/ideas/{idea}', function (Idea $idea)
{

    // $idea = Idea::findOrFail($id); Laravel very smart. It can easily identify things like this just by type casting the eloquent mode in the parameters.

    // if(is_null($idea))           //This can be shortened thanks to laravel. The shortened is findOrFail() used above. 
    //     abort(404);


    return view("ideas.show", [     //Same as "ideas/show", and is more commonly used. 
        'idea' => $idea
    ]);
});
/* =END= */

/* =========================================
   Editing a Note
   =========================================
*/
Route::get('/ideas/{idea}/edit', function ( Idea $idea) {

    return view("ideas.edit", [     //Same as "ideas/show", and is more commonly used. 
        'idea' => $idea
    ]);
});
/* =END= */

/* =========================================
   Updating the Note
   =========================================
*/
Route::patch('ideas/{idea}', function ( Idea $idea){
    $idea->update([
        'description' => request('description')
    ]);
    return redirect("/ideas/{$idea->id}");
});
/* =END= */

/* =========================================
   Deleting a note
   =========================================
*/
Route::delete('ideas/{idea}', function ( Idea $idea){
    $idea->delete();

    return redirect('/ideas');
});
/* =END= */



Route::post('/ideas', function ()
{
    $idea = request('description');
    //    session()->push('ideas', $idea); // Using Session to persist data
    //    $ideas = session()->get('ideas');

    Idea::create([
        'description' => $idea,
        'state' => "pending"
    ]);
    return redirect('/ideas');

});









Route::get("/about", function ()
{
    return view("about");
});

// Route::get("/contact", function (){
//     return view("contact");
// });

Route::view("/contact", "contact"); //Same as above