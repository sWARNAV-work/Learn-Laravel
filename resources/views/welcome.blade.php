<x-layout title="Home">

    <h1>Home</h1>
    <p>Hey Jude, don't make it better!</p>
    <p>
        Hello There, {{ $namae }}!
    </p>

    @if (count($tasks))
    <p> There are about {{ count($tasks) }} tasks. </p>
    @else
    <p>There are no tasks.</p>
    @endif

    @foreach($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach
    
</x-layout>