<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="col-12 bg-info text-center py-2">
        <h1>{{ config('app.name')}}</h1>
    </div>
    <div class="col-12 bg-secondary text-center py-3">
        <nav>
            @guest
            <a href="/" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Home</a>
            <a href="/login" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Login</a>
            <a href="/registration" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Registration</a>
            @else
            <a href="/students" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Students</a>
            <a href="/articles" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Forum</a>
            <a href="/files" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Files Directory</a>
            <a href="/logout" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">Logout</a>
            @endguest        
        </nav>
    </div>

    @if(Auth::user())
        <div class="col-12 bg-color-user text-end py-1 pe-3 text-uppercase fw-bold">
            {{ Auth::user()->name }}
        </div>
    @endif

    @if(session('success'))
        <div class="container-lg mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @yield('content')
</body>
</html>