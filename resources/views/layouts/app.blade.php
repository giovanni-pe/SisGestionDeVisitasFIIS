<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* General Settings */
        body {
            font-family: 'Nunito', sans-serif;
            background: #ecf0f3;
        }

        /* Neomorphic Form Container */
        .neo-form-container {
            width: 400px;
            padding: 2rem;
            background: #ecf0f3;
            border-radius: 20px;
            box-shadow: 8px 8px 15px #b8b9be, -8px -8px 15px #ffffff;
            margin: auto;
        }

        .neo-form-container h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Neomorphic Input */
        .neo-input {
            position: relative;
            display: flex;
            flex-direction: column;
            margin-bottom: 1.5rem;
        }

        .neo-input label {
            color: #555;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .neo-input input {
            padding: 10px;
            border: none;
            border-radius: 10px;
            background: #ecf0f3;
            box-shadow: inset 3px 3px 8px #b8b9be, inset -3px -3px 8px #ffffff;
            outline: none;
            font-size: 16px;
        }

        .neo-input input:focus {
            box-shadow: inset 2px 2px 5px #b8b9be, inset -2px -2px 5px #ffffff;
        }

        /* Neomorphic Button */
        .neo-button {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background: #ecf0f3;
            color: #555;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            box-shadow: 5px 5px 10px #b8b9be, -5px -5px 10px #ffffff;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .neo-button:hover {
            box-shadow: inset 3px 3px 6px #b8b9be, inset -3px -3px 6px #ffffff;
            background: #d9dde2;
            color: #333;
        }

        .neo-button:active {
            box-shadow: inset 2px 2px 4px #b8b9be, inset -2px -2px 4px #ffffff;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel Neomorphic Intranet') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Neomorphic Form -->
        <main class="d-flex justify-content-center align-items-center vh-100 bg-light">
            <div class="neo-form-container">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="neo-input">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="neo-input">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="neo-button w-100">Login</button>
                </form>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
