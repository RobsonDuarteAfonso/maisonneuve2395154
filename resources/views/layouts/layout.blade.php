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
            <div class="menu-center">
                @php $locale = session()->get('locale') @endphp
                <a href="/" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">@lang('lang.text_home')</a>
                @guest
                <a href="/login" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">@lang('lang.text_login')</a>
                <a href="/registration" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">@lang('lang.text_registration')</a>
                @else
                <a href="/students" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">@lang('lang.text_students')</a>
                <a href="/articles" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">@lang('lang.text_forum')</a>
                <a href="/files" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">@lang('lang.text_filedirectory')</a>
                <a href="/logout" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-uppercase fs-5 px-3">@lang('lang.text_logout')</a>
                @endguest
                <a class="px-2 py-2 menu-center @if($locale == 'en') bg-light @endif" href="{{route('lang', 'en')}}"><img src="{{ asset('images/flag1.png') }}" alt="flag" class="flag"></a>
                <a class="px-2 py-2 menu-center @if($locale == 'fr') bg-light @endif" href="{{route('lang', 'fr')}}"><img src="{{ asset('images/flag2.png') }}" alt="flag" class="flag"></a>
            </div>
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
    @elseif(session('error'))
        <div class="container-lg mt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>    
    @endif

    @yield('content')
</body>
</html>