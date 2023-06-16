<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @extends('layout.header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/sidebars.css') }}" rel="stylesheet">
</head>

<body>
    @csrf
    @extends('adminlte::page')
    @section('title', 'Dashboard Cliente')
    @section('content_header')
        <h1>Dashboard</h1>
    @stop
    @section('content')
        <p>Welcome to this beautiful Cliente panel.</p>
        @can('user')
            <p>Eres el usuario Cliente </p>
        @endcan
        @role('cliente', 'administrador')
            {{-- comprueba si tiene rol usuario --}}
            <h2>SOY CLIENTE</h2>
        @endrole
        @foreach (Auth::guard('administrador')->user()->roles as $role)
            {{ $role->name }}
        @endforeach
        @if (auth('administrador')->user()->can('user'))
            <p>Tengo los permisos user</p>
        @endif

        mi rol es: {{ Auth::guard('administrador')->user()->roles->first()->name }}
        mi rol es: {{ Auth::guard('administrador')->user()->getRole() }} usando metodo getRole

    @stop

    @auth



    @endauth
    @guest

    @endguest
</body>

</html>
