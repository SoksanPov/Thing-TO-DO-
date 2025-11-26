<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-bold text-center mb-5">Event Detail - ID: {{ $id }}</h1>
        <p class="text-center">This is the detail page for Event {{ $id }}.</p>
        <div class="text-center mt-5">
            <a href="{{ route('events.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back to Events</a>
        </div>
    </div>
</body>
</html>
