<x-layout title="Ideas">



    <div>
        @if ($ideas->count())
            <h1 class="text-indigo-600">Yooooooour Ideas!</h1>
            <ol class="mt-4 mb-4 grid grid-cols-2 gap-x-6 gap-y-4">

                @foreach($ideas as $idea)
                    <!-- <a href="/ideas/{{ $idea->id }}">
                                <li class="text-white hover:text-purple-300">{{ $idea->description }}</li>
                            </a> -->
                    <a href="ideas/{{ $idea->id }}" class="card bg-neutral text-neutral-content w-96">
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">{{ $idea->description}}</h2>
                        </div>
                    </a>

                @endforeach
            </ol>
        @else
            <h1 class="text-red-600 mb-4">There aren't any Ideas yet!! Create One using the button below!</h1>
        @endif

    </div>

    <!-- <a href="/ideas/create" class="rounded-md text-gray-200 bg-yellow-900 px-4 py-2">Idea Fabrication</a> -->



</x-layout>