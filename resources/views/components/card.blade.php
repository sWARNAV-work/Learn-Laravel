<div {{ $attributes->merge(["class" => "card"]) }}> <!-- This array could be written as ` class="card" `The merge class combines the default value along with values passed on from the attribute -->
    {{ $slot }}
</div>