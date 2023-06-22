    @extends('layout.header')


    @section('js')
         {{-- Full Calendar dependency --}}
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="{{ asset('js/index.global.min.js') }}"></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment@6.1.6/index.global.min.js'></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
    
    @stop
    @extends('partials.calendarScript')


    @csrf
    @extends('adminlte::page')
    @section('title', 'Calendario - Whiskers')
    @section('content_header')
        <h1>Calendario</h1>
    @stop

    @section('content')
    <div class="card p-3"> 
        <p>Mostrar citas en forma de calendario</p>
        <div class="text-start">
            <div class="row align-items-start">

                <div class="col col-2">
                    <div class="m-3">
                        <label for="estado" class="form-label">Estado de la cita</label>
                        <select class="form-select" aria-label="Seleccionar estado de la cita" id="estado" required
                            disabled>
                            <option selected disabled value=""></option>
                            <option value="pendiente">Pendiente</option>
                            <option value="en-proceso">En proceso</option>
                            <option value="cancelado">Cancelado</option>
                            <option value="completado">Completado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" required>
                      </div>
                    <div class="mb-3 mt-2">
                        <label for="direccion" class="form-label">Numero de contacto:</label>
                        <input type="text" class="form-control" id="telefono" 
                            disabled value="">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de mascota</label>
                        <input type="text" class="form-control" id="nombreMascota"  value="">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Direccion</label>
                        <input type="tel" class="form-control" id="direccion"  value="">
                    </div>
                </div>
                <div class="col col-2">
                    <div class="mb-3 mt-2">
                        <label for="detalle" class="form-label mt-4">Detalle</label>
                        <textarea class="form-control" id="detalle" rows="2"
                            name=detalle disabled style="resize: none;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de reserva</label>
                        <input type="date" class="form-control" id="fecha" required name=fecha>
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora reserva</label>
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
                        <select class="form-select" aria-label="Seleccionar tipo de consulta" id="tipoConsulta" required>
                            <option selected disabled value="">Seleccionar hora</option>
                            <option value="">Consulta general</option>
                        </select>
                    </div>
                </div>
                <div class="col col-8">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloEvento">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="descripcionEvento">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    </div>

    @stop

