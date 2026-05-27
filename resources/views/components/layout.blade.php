@props([
    'title' => "sWARNAV"
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <style>
        nav > a 
        {
            color: green;
        }

        .max-w-300
        {
            max-width: 300px;
            margin: auto;
        }

        .card
        {
            background: grey;
            padding: 15px; 
            text-align: center;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="bg-black p-6 max-w-xl mx-auto">
    <nav>
        <a href="/">Home</a>
        <a href="/about">The About</a>
        <a href="/contact">The Contacts</a>
    </nav>

    <main>
        {{ $slot }}
    </main>

</body>

</html>