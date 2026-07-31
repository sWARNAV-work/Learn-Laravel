@props([
    'name' => 'required'
])

@error($name)
    <p class="text-xs text-red-800">{{ $message }}</p>
@enderror