<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    <script src="{{mix('js/app.js')}}" defer></script>
    <title>Laravel App - @yield('title')</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4
                    bg-white border-bottom shadow-sm mb-3">
        <h5 class="my-0 mr-md-auto font-weight-normal">Laravel App</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a href="{{route('home')}}" class="p-2 text-dark">Home</a>
            <a href="{{route('home.contact')}}" class="p-2 text-dark">Contact</a>
            <a href="{{route('posts.index')}}" class="p-2 text-dark">BlogPost</a>
            <a href="{{route('posts.create')}}" class="p-2 text-dark">Add BlogPost</a>

            @guest
                @if (Route::has('register'))
                    <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
                @endif
                <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
            @else
                <a class="p-2 text-dark" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    >Logout {{Auth::user()->name}} </a>

                <form id="logout-form" action={{ route('logout') }} method="POST"
                    style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest

        </nav>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
