<x-layout title="Idea">


    <div class="text-white">
            <h1 class="text-indigo-600">Your Note</h1>
            
            <div>
                <p>{{ $idea->description }}</p>
            </div>
    </div>

    <div>
        <div class="mt-6 mr-4 flex items-center justify-end gap-x-6">
            <a href="/ideas/{{ $idea->id }}/edit" 
                class="bg-purple-900 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Edit</a>
        </div>
    </div>

</x-layout>