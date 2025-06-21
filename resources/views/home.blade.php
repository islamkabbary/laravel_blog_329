<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>name {{ $name }}</h1>
    <h1>age {{ $age }}</h1>
    <h1>job {{ $job }}</h1>
    
    
    <h1>skills</h1>
    <ul>
        @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>
</body>

</html>
