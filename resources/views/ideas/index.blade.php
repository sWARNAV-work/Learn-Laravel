<x-layout title="Ideas">



    <div>
        @if ($ideas->count())
            <h1 class="text-indigo-600">Yooooooour Ideas!</h1>
            <ol class="mt-4">
                @foreach($ideas as $idea)
                    <a href="/ideas/{{ $idea->id }}">
                        <li class="text-white hover:text-purple-300">{{ $idea->description }}</li>
                    </a>

                @endforeach
            </ol>
        @else
            <h1 class="text-red-600 mb-4">There aren't any Ideas yet!! Create One using the button below!</h1>
        @endif
        <hr class="mt-4">
        <a href="/ideas/create" class="rounded-md text-gray-200 bg-yellow-900 px-4 py-2">Idea Fabrication</a>
    </div>



</x-layout>