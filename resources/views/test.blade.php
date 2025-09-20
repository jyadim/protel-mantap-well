<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Example</title>
</head>
<body>
    <h1>Cookie Example</h1>
    <p>User preferences have been set in a cookie!</p>

    <!-- Display the flash message if the cookie is removed -->
    @if (Session::has('cookie_removed'))
    <div class="bg-lime-700 text-white p-3 rounded mt-4 mb-2">
        {{ Session::get('cookie_removed') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="bg-red-500 text-white p-3 rounded mt-4 mb-2">
        {{ Session::get('error') }}
    </div>
@endif

    <form action="?remove_cookie=true" method="GET">
        <button type="submit">Remove Cookie</button>
    </form>
</body>
</html>
