<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href={{ URL::asset('css/normalize.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/style.css') }}>
    <!-- <style>
        a{
            background-color: green;
        }
    </style> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{  route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{  route('Admin.Forms.index') }}">Formularios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Informe estadistico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Informe psicologico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Copias de seguridad</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesion ') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 
    @yield('dashboard')
    {{-- crear formulario --}}
    @yield('index')
    <!-- index en administrador.forms -->
    @yield('show')
    <!-- show en administrador.forms -->
    @yield('create')
    <!-- create en administrador.forms -->
    @yield('edit')
    <!-- edit en administrador.forms -->
    {{-- crear preguntas --}}
    @yield('CrearPreguntas')
    <!-- CDN bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- CDN Fontawesome icons -->
    <script src="https://use.fontawesome.com/db63f099d6.js"></script>
    {{-- CDN jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- CDN graficas -->
    @yield('amcharts')
    {{-- liveware --}}
    @livewireScripts
    {{-- scrip propio --}}
    <script src="{{ URL::asset('js/style.js') }}"></script>
    {{-- slug --}}
    @yield('js')
 
</body>

</html>