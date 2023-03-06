<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="toastr.css" rel="stylesheet"/>
</head>
<body>
                <div class="container-fluid">
                    <!-- First section -->
                    <nav class="navbar navbar-dark bg-dark">
                        <div class="container">
                            <h1>
                                <a href="/" class="navbar-brand">Orion</a>
                            </h1>
                            <form action="{{route('category.search')}}" method="POST" class="form-inline mr-3 mb-2 mb-sm-0">
                                @csrf
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" name="keyword" placeholder="Search Category"/>
                                <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                            </div>
                            </div>
                            </form>
                            @guest
                            <a class="nav-item nav-link text-white btn btn-dark" href="{{route('login')}}">Login</a>
                            <a class="nav-item nav-link text-white btn btn-dark" href="{{route('register')}}">Register</a>
                            @endguest
                                @auth
                                @if(auth()->user()->is_admin)
                                <form action="{{route('dashboard.home')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success">Admin Panel</button>
                                </form>
                                @endif
                                <form action="{{route('home')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success">{{auth()->user()->name}}</button>
                                </form>
                                <form id="logout-form" action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                                </form>
                                @endauth
                        </div>
                    </nav>

                    <!-- first section end -->
                </div>
                <div class="container">
                    @yield('content')
                </div>
    <div class="container-fluid">
        <footer class="small bg-dark text-white">
            <div class="container py-4">
                <ul class="list-inline mb-0 text-center">
                    <li class="list-inline-item">
                        &copy; 2021 Orion
                    </li>
                    <li class="list-inline-item">All rights reserved</li>
                    <li class="list-inline-item">Terms and privacy policy</li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script src="jquery.min.js"></script>
<script src="toastr.js"></script>
@toastr_render
</html>