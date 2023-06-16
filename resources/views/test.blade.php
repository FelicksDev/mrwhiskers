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

        <p>Welcome to this beautiful admin panel.</p>
        

        <form method="" action="{{route('postFormCita')}}" novalidate>
            @csrf
            <div class="container text-start">
                <div class="row align-items-start">
                    <div class="col col-6">
                        <div class="mb-3 mt-2">
                            <label for="cedula" class="form-label">Cédula de identidad</label>
                            <input type="text" class="form-control" id="cedula" disabled
                                value="{{ $cliente->cedula_de_identidad }}">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" disabled
                                value="{{ $cliente->nombre }}">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" disabled
                                value="{{ $cliente->telefono }}">
                        </div>
                        <div>RFID</div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" disabled
                                value="{{ $cliente->correo }}">
                        </div>
                        <div class="mb-3">
                            <label for="mascota" class="form-label">Nombre de la mascota</label>
                            <input type="text" class="form-control" id="mascota" required>
                        </div>
                        <div class="mb-3">
                            <label for="raza" class="form-label">Raza de la mascota</label>
                            <input type="text" class="form-control" id="raza" required>
                        </div>
                    </div>
                    <div class="col col-6">
                        <div class="mb-3 mt-2">
                            <label for="direccion" class="form-label">Direccion de domicilio:</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Direccion" name=direccion
                                disabled value="{{ $cliente->direccion }}">
                        </div>
                        <div class="mb-3 mt-2">
                            <label for="exampleTextarea" class="form-label mt-4">Breve detalle o descripción</label>
                            <textarea class="form-control" id="exampleTextarea" rows="1" placeholder="Mal estar desde hace 2 dias" name=detalle></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" required name=fecha>
                        </div>
                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora</label>
                            <select class="form-select" aria-label="Seleccionar hora" id="hora" required name=hora>

                                {{-- //Logica para agregar options segun los horarios obtenidos en la base de datos --}}
                                <option selected disabled value="">Seleccionar hora</option>
                                <option value="9:00">9:00am</option>
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
                        <div class="mb-3">
                            <label for="tipoConsulta" class="form-label">Tipo de consulta</label>
                            <select class="form-select" aria-label="Seleccionar tipo de consulta" id="tipoConsulta"
                                required>
                                <option selected disabled value="">Seleccionar hora</option>
                                <option value="">Consulta general</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
               {{--  <button type="button" value="Confirmar reserva" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Realiza reserva</button> --}}
                <input type="button" name="btn" value="Continuar" id="submitBtn" data-toggle="modal" data-target="#exampleModal" class="btn btn-default" />
            </div>            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirmar cita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de realizar una reserva?</p>
                        <p><strong>Nombre:</strong> <span id="modalName"></span></p>
                        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>

    @stop
    <script>
      var newHTML = document.createElement ('div');
      newHTML.innerHTML =
      newHTML = document.createElement ('div');
      newHTML.innerHTML = ' <div id=\"myModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
      document.body.appendChild (newHTML);
      $(window).load(function(){
           $('#myModal').modal('show');
      });
  </script>
</body>

</html>
