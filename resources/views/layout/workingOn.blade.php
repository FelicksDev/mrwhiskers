<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @extends('layout.header')
</head>
<body>
    @csrf
    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')
        
        <header class="py-5 text-center">
            <h1 class="mb-3"><i class="fas fa-wrench"></i> Página en construcción</h1>
            <p class="lead">Lo siento, esta página aún está en construcción. Vuelve pronto para ver el contenido completo.</p>
        </header>
    @stop
    
    @section('content')
        <section class="row">
            <div class="col-12 text-center">
                <img src="https://via.placeholder.com/500x300" class="img-fluid" alt="Página en construcción">
            </div>
        </section>
    @stop
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</body>
</html>