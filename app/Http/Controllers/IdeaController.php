<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Http\Attributes\RedirectTo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $ideas = session()->get('ideas');
        // $ideas = DB::table('ideas')->get();                                           //Using facades to call database
        // $ideas = Idea::query()->when(request('state'), function ($query, $state)      //Using Eloqeunt to call Database
        // {
        //     $query->where('state', $state);
        // })->get();


        // $ideas = Idea::query()->where([                                                //Redundant, since the emergence of belongsTo & hasMany,
        //     'user_id' => Auth::id()                                                    //which allows the use of the direct call, that has been
        // ])->get();                                                                     //inlined.

        return view("ideas/index", [
            'ideas' => Auth::user()->ideas
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
    public function store(IdeaRequest $request): RedirectResponse
    {
        //This $request parses the entire POST data. 

        // $request->validate([
        //     'description' => ['required', 'min:10']
        // ]);

        // Idea::create([
        //     'description' => $request['description'],
        //     'state' => "pending",
        //     'user_id' => Auth::id()
        // ]);

        /** @var User $user */                  //This helps clear the confusion of the editor, that couldn't find the ideas()
        $user=Auth::user();
        $user->ideas()->create([
            'description' => $request['description'],
            'state' => 'pending',
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
    public function update(IdeaRequest $request, Idea $idea)
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
