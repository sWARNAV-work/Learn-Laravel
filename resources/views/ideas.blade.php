<x-layout title="Ideas">

    <form method="POST" action="/ideas">
        @csrf
        <div class="col-span-full">
            <label for="idea" class="block text-sm/6 font-medium text-white">Enter your Idea</label>
            <div class="mt-2">
                <textarea id="idea" name="idea" rows="3"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Add an idea to your list.</p>
        </div>

        <div class="mt-6 mr-4 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
            <button type="submit"
                class="rounded-md bg-purple-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
        </div>
    </form>

    <div class="text-white">
        @if ($ideas->count())
            <h1 class="text-indigo-600">Notes</h1>
            <ol class="mt-4">
                @foreach($ideas as $idea)
                    <li>{{ $idea->description }}</li>
                @endforeach
            </ol>
        @endif
    </div>



</x-layout>