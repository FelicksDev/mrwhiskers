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
    @section('title', 'Reserva de citas')
    @section('content_header')
        <h1>Formulario de reserva de citas</h1>
    @stop
    @section('content')


        <div class="card">
            <div class="card-header">
                Welcome to this beautiful admin panel.
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <span class="badge badge-primary">Label</span>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('postFormCita') }}" id="form-cita" class="row g-3 needs-validation"
                    novalidate>
                    @csrf
                    <div class="container text-start">
                        <div class="row align-items-start">
                            <div class="col col-6">

                                <div class="mb-3 mt-2">
                                    <label for="cedula" class="form-label">Cédula de identidad</label>
                                    <input type="text" class="form-control" id="cedula" disabled
                                        value="{{ $cliente->cedula_de_identidad }}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Looks wrong!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombre" disabled
                                        value="{{ $cliente->nombre }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" disabled
                                        value="{{ $cliente->telefono }}">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" disabled
                                        value="{{ $cliente->correo }}">
                                </div>

                                <div class="mb-3 form-group">

                                    <label for="mascota" class="form-label">Nombre de la mascota</label>
                                    <input type="text" class="form-control" id="mascota" name="mascota"required value="{{old('mascota')}}">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="raza" class="form-label">Raza de la mascota</label>
                                    <input type="text" class="form-control" id="raza" name="raza" required value="{{old('raza')}}">
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="mb-3 mt-2 form-group">
                                    <label for="direccion" class="form-label">Dirección de domicilio:</label>
                                    <input type="text" class="form-control" id="direccion" placeholder="Dirección"
                                        name="direccion" disabled value="{{ $cliente->direccion }}">
                                </div>
                                <div class="mb-3 mt-2 form-group">
                                    <label for="exampleTextarea" class="form-label mt-4">Breve detalle o descripción</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="1" placeholder="Mal estar desde hace 2 días"
                                        name="descripcion" required
                                        value="{{old('descripcion')}}"></textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" required name="fecha"
                                    value="{{old('fecha')}}">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="hora" class="form-label">Hora</label>
                                    <select class="form-select" aria-label="Seleccionar hora" id="hora" required
                                        name="hora" value="{{old('hora')}}">
                                        {{-- Logica para agregar options según los horarios obtenidos en la base de datos --}}
                                        <option selected disabled value="">Seleccionar hora</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="tipoConsulta" class="form-label">Tipo de consulta</label>
                                    <select class="form-select" aria-label="Seleccionar tipo de consulta"
                                        id="tipoConsulta" required>
                                        <option selected disabled value="">Seleccionar hora</option>
                                        @foreach ( $datas as $data )
                                            <option value={{$data->id}}>{{$data->tipo_de_cita}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('partials.mensajes')
                    <div class="text-center">
                        <input type="submit" name="btn" value="Continuar" id="submitBtn" data-toggle="modal"
                            data-target="#exampleModal" class="btn btn-default" onclick="showConfirmationModal()" />
                        <button type="submit" class="btn btn-primary" data-toggle=""
                            data-target="#confimation_modal">Enviar</button>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        


        <!-- Modal -->
        <div class="modal fade" id="confimation_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirmar cita</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de realizar una reserva?</p>
                        <p>Por favor, revisa los datos antes de enviar el formulario:</p>
                        <ul>
                            <li><strong>Nombre:</strong> <span id="modalName"></span></li>
                            <li><strong>Email:</strong> <span id="modalEmail"></span></li>
                            <!-- Agrega aquí el resto de los campos del formulario -->
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button id="btn-confirm" type="submit" class="btn btn-primary">Confirmar reserva</button>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('js')

        <script>
            (function() {
                'use strict';

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation');

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault();
                                event.stopPropagation();
                            }

                            form.classList.add('was-validated');
                        }, false);
                    });
            })();
            $("#form-cita").submit(function(e) {
                e.preventDefault();
                //Mostrar modal de vonfirmacion
                //$('#confimation_modal').modal('show');
                if (document.getElementById("form-cita").checkValidity()) {
                    $('#confimation_modal').modal('show');
                }

                var name = document.getElementById("nombre").value;
                var email = document.getElementById("email").value;
                // Mostrar los datos en la ventana modal
                document.getElementById("modalName").innerText = name;
                document.getElementById("modalEmail").innerHTML = email;
                //resto código   
                //Esperar confirmacion del boton
                $('#btn-confirm').click(function() {
                    console.log("envio");
                    e.target.submit();
                });
            });
        </script>
    @stop
</body>

</html>
