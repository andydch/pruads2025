<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: lightgray;
            font-family: 'Quicksand', sans-serif
        }

        /* sort column */
        .table-sortable>thead>tr>th.sort {
            cursor: pointer;
            position: relative;
        }

        .table-sortable>thead>tr>th.sort:after,
        .table-sortable>thead>tr>th.sort:after,
        .table-sortable>thead>tr>th.sort:after {
            content: ' ';
            position: absolute;
            height: 0;
            width: 0;
            right: 10px;
            top: 16px;
        }

        .table-sortable>thead>tr>th.sort:after {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #ccc;
            border-bottom: 0px solid transparent;
        }

        .table-sortable>thead>tr>th:hover:after {
            border-top: 5px solid #888;
        }

        .table-sortable>thead>tr>th.sort.asc:after {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 0px solid transparent;
            border-bottom: 5px solid #333;
        }

        .table-sortable>thead>tr>th.sort.asc:hover:after {
            border-bottom: 5px solid #888;
        }

        .table-sortable>thead>tr>th.sort.desc:after {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #333;
            border-bottom: 5px solid transparent;
        }
        /* sort column */
    </style>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container">
                {{-- @if (Auth::check())
                    <a href="{{ route('agent.index') }}" wire:navigate class="navbar-brand">AGENT</a>
                    <a href="{{ route('category.index') }}" wire:navigate class="navbar-brand">CATEGORY</a>
                    <a href="{{ route('achievement.index') }}" wire:navigate class="navbar-brand">ACHIEVEMENT</a>
                    <a href="{{ route('logout') }}" wire:navigate class="navbar-brand">LOGOUT</a>
                @else
                    <a href="{{ route('login.login-page') }}" wire:navigate class="navbar-brand">LOGIN</a>
                @endif --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <img src="{{ asset('assets/images/logo-alumni-unair.jpg') }}" alt="" class="navbar-nav ms-auto" style="width: 10%;">
                    {{-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0" role="searchx">
                        <a href="https://koidigi.com" target="_blank" class="btn btn-success">KOIdigital</a>
                    </ul> --}}
                </div>
            </div>
        </nav>
    </div>

    {{ $slot }}

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>