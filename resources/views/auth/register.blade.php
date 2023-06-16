<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    @extends('layout.header')
    

</head>
<body>
    sssssssss
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Registro de usuario - SISTEMA
                    </div>
                    <div class="card-body">
                        @include('partials.mensajes')
                        <form action="/register" method="POST" novalidate>
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre completo</label>
                                <input type="text" class="form-control" name="name" id="name" required>

                   
                            </div>
                            <div class="form-group">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" name="username" id="username"required>

                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control" name="email" id="email"required>

    
                                
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password"required>

                                
                        
                               
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm"required>
                            </div>

                            <div class="form-group mt-3 text-center">
                                <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    @extends('partials.bootstrapValidator')
</body>
</html>
