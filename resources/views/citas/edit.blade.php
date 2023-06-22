    @extends('layout.header')
    @csrf
    @extends('adminlte::page')
    @section('title', 'Editar Cita')
    @section('content_header')
        <h1>Editar Cita</h1>
    @stop
    @section('content')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edicion de cita</h3>
            </div>
            <div class="card-body">
                @extends('partials.mensajes')
                <!-- Aquí colocas los campos de edición de la cita -->
                <form action = "{{route('admin.cita.update',$detalle_cita)}}"  method="POST">
                    @method('put')
                    @csrf
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_cita">Tipo de Cita:</label>
                                <input type="text" class="form-control" id="tipo_cita" name="tipo_cita" value="{{ $detalle_cita->tipo_de_cita }}">
                            </div>
                
                            <div class="form-group">
                                <label for="estado_cita">Estado de Cita:</label>
                                <select class="form-control" id="estado_de_cita" name="estado_de_cita" >
                                    <option value="1" {{ $detalle_cita->id_estado_de_cita == 1 ? 'selected' : '' }} >Pendiente</option>
                                    <option value="2" {{ $detalle_cita->id_estado_de_cita == 2 ? 'selected' : '' }}>Cancelada</option>
                                    <option value="3" {{ $detalle_cita->id_estado_de_cita == 3 ? 'selected' : '' }}>Completada</option>
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label for="cliente">Cliente:</label>
                                <input type="text" class="form-control" id="cliente" name="cliente" value="{{ $detalle_cita->persona_nombre }} {{ $detalle_cita->persona_apellido }}" readonly>
                            </div>
                
                            <div class="form-group">
                                <label for="mascota">Mascota:</label>
                                <input type="text" class="form-control" id="mascota" name="mascota" value="{{ $detalle_cita->mascota_nombre }}" readonly>
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $detalle_cita->fecha }}">
                            </div>
                
                            <div class="form-group">
                                <label for="hora">Hora:</label>
                                <select class="form-control" id="hora" name="hora">
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <!-- Agrega más opciones de hora según tus necesidades -->
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{ $detalle_cita->descripcion }}</textarea>
                            </div>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    
                    
                </form>
                <form action="{{route('admin.cita.delete',$detalle_cita)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                
            </div>
        </div>
    @stop
    @extends('partials.footerScripts')

