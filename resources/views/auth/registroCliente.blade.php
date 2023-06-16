<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
        integrity="sha512-RccFYiF0ywvRzRm+dd8TJj2Xr1EJDP1l3s+LLoGJSMnn/mPUZoNGN+M/jBveghA1NjgXJ+TRQ2rhPY1NhE+lZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>


    <body>
        
        @section('title', 'Prueba')
        @section('content_header')
    <h1>Dashboard</h1>
@stop
        {{--   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}

        @if (session('success'))
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="container card col-md-5 p-3 mt-4">
            <form class="row needs-validation" method="POST" action="{{ route('user.postRegister') }}" novalidate>
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                    {{-- <script type="text/javascript">alert("YOUR MESSAGE")</script> --}}
                @endif
                @extends('partials.mensajes')
                @error('nombre')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror


                <div class="justify-content-center text-senter fw-bold"> Registro de usuarios</div>
                <div class="form-group col-6">
                    <label for="nameId" class="form-label mt-4">Nombre completo: </label>
                    <input type="text" class="form-control" id="nameId" placeholder="Nombre" name=nombre
                        value="{{ old('nombre') }}" required>
                </div>
                <div class="col-6">
                    <label for="apellidos" class="form-label mt-4">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" name=apellidos
                        value="{{ old('apellidos') }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="cinum" class="form-label mt-4">Numero de Cedula:</label>
                    <input type="text" class="form-control" id="cinum" placeholder="Numero de cedula"
                        name=cedula_de_identidad value="{{ old('cedula_de_identidad') }}"required>
                </div>
                <div class="form-group col-6">
                    <label for="fecha" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha" required name="fecha"
                        value="{{ old('fecha') }}">
                </div>


                <div class="form-group">
                    <label for="number" class="form-label mt-4">Telefono:</label>
                    <input type="text" class="form-control" id="number" placeholder="Telefono" name=telefono
                        value="{{ old('telefono') }}" required>
                </div>
                <div class="form-group">
                    <label for="direccion" class="form-label mt-4">Direccion de domicilio:</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Direccion" name=direccion
                        value="{{ old('direccion') }}" required>
                </div>
                <div class="form-group">
                    <label for="correo" class="form-label mt-4">Correo electronico:</label>
                    <input type="text" class="form-control" id="correo" placeholder="Enter email" name=correo
                        value="{{ old('correo') }}"required>
                </div>
                <div class="form-group">
                    <label for="username" class="form-label mt-4">Usuario:</label>
                    <input type="text" class="form-control" id="username" placeholder="Usuario" name="username"
                        value="{{ old('username') }}" required>
                </div>
                <div class="form-group">
                    <label for="contrasenia" class="form-label mt-4">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasenia" placeholder="Password" name="password"
                        value="{{ old('password') }}"required>
                </div>

                <div class="form-group">
                    <label for="contrasenia" class="form-label mt-4">Confrimacion de contraseña:</label>
                    <input type="password" class="form-control" id="contrasenia" placeholder="Password"
                        name="password_confirmation" value="{{ old('password') }}"required>
                </div> <button type="submit" class="btn btn-primary btn-lg mt-4" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Enviar registro!</button>

            </form>


        </div>
        <script>
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        </script>
    </body>

    </html>
