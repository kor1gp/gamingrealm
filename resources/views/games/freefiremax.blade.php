<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $game->name }} - GamingGenius</title>
</head>
<body>
    <div>
        <h1>{{ $game->name }}</h1>
        <p>{{ $game->description }}</p>
        <!-- Add your game-specific content and guides here -->
    </div>
</body>
</html>
