<x-layout title="Edit">

    <form method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('PATCH')

        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Edit</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">{{ $idea->description }}</textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Edit an idea, it's alright to change your mind.</p>
        </div>



        <div class="mt-6 mr-4 flex items-center justify-between">

            <button form="delete-a-form" type="submit" class="rounded-md px-3 py-2 text-white bg-red-800">Delete</button>


            <div class="flex gap-x-4 justify-end">
                <a href="/ideas/{{ $idea->id }}" class="text-sm py-2 font-semibold text-white">Cancel</a>

                <button type="submit"
                    class="rounded-md bg-purple-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
            </div>
        </div>
    </form>

    <!-- =========================================
       Delete Form
       =========================================
    -->
    <form id="delete-a-form" method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('DELETE')
    </form>
    <!-- =END= -->



</x-layout>