@props([
    'title' => 'MovieTracker'
])

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        nav > a {
            color: blue;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }

        .max-w-400 {
            margin: auto;
            max-width: 400px;
        }

    </style>
</head>
<body>

@include('components.navigation')

<main>
    {{$slot}}
</main>
</body>
</html>

