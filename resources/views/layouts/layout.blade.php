<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
</head>
<body>
    <div class="col-12 bg-info text-center py-2">
        <h1>{{ config('app.name')}}</h1>
    </div>
    <div class="col-12 bg-secondary text-center py-3">
        <nav>
            <a href="/" data-link class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Home</a>
            <a href="/brands" data-link class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Brands</a>
        </nav>
    </div>
    @yield('content')
</body>
</html>