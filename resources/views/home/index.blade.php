<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @extends('layout.header')
    {{--     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('/css/sidebars.css') }}" rel="stylesheet"> --}}
</head>

<body>
    @csrf
    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')
        <h1>Dashboard</h1>
    @stop
    @section('content')
<script></script>
        <p>Welcome to this beautiful admin panel.</p>
        <p>Bienvenido </p>
       {{--  <p>Agregar un panel que mnuestre las cantida de cita que tiene pendiente el dia presente</p>
        @can('admin')
            <p>Eres el usuario Administrador </p>
        @endcan
        @role('admin')
            <p>Eres el usuario Administrador CON ROL</p>
        @endrole
        mi rol es: {{ Auth::user()->getRole() }} usando metodo get role modelo user rol ADMIN --}}
    @stop

    @extends('partials.footerScripts')
    @section('js')
        <script>
            ('$id').onClick(function (){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
            })
        </script>
    @stop
</body>

</html>
