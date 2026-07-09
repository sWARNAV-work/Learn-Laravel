<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/ideas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //This $request parses the entire POST data. 
        Idea::create([
            'description' => $request['description'],
            'state' => "pending"
        ]);
        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        // $idea = Idea::findOrFail($id); Laravel very smart. It can easily identify things like this just by type casting the eloquent mode in the parameters.

        // if(is_null($idea))           //This can be shortened thanks to laravel. The shortened is findOrFail() used above.
        //     abort(404);


        return view("ideas.show", [     //Same as "ideas/show", and is more commonly used.
            'idea' => $idea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {

        return view("ideas.edit", [     //Same as "ideas/show", and is more commonly used.
            'idea' => $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $idea->update([
            'description' => request('description')
        ]);
        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect('/ideas');
    }
}
