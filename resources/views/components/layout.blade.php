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

</head>

<body>
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