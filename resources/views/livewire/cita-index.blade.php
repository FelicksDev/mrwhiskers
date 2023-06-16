<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
        <div class="col-sm-9">


            <input type="text" name="" id="" placeholder="Buscar..." class="form-control"
                wire:model.live="search">
        </div>
        <div class="col-sm-3">
            <select name="" class="form-select" wire:model="paginacion">
                <option value="1">1</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>

    <table class="table table-dark table-stripeed mt-4">
        <thead>
            <th scope="col">ID</th>
            <th scrop="col">Cliente</th>
            <th scope="col" style="width:5px">Descripcion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Tipo de cita</th>
            <th scope="col">Estado</th>
            <th scope="col">Opciones</th>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>{{ $cita->persona_nombre . ' ' . $cita->persona_apellido }}</td>
                    <td>{{ $cita->descripcion }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>{{ $cita->tipo_de_cita }}</td>
                    <td>
                        <a href="#" class="{{ $estilos[$cita->estado_de_cita] }}" id="btn-cita"
                            data-toggle="modal" data-target="#modalEstado">{{ $cita->estado_de_cita }}</a>
                    </td>
                    <td>
                        {{-- Boton para modificar cita por ventana modal --}}
                        {{-- <a id="btn-show" class="btn btn-info" data-toggle="modal"
                            data-target="#modal-cita-{{ $cita->id_cita }}">Ver</a> --}}
                        <a class="btn btn-info" href="{{ route('admin.cita.edit', $cita) }}">Ver</a>
                    </td>
                </tr>


                <!-- Ventana modal -->
                <div class="modal fade" id="modal-cita-{{ $cita->id_cita }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDetallesLabel">Detalles de la Cita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-4">
                                <!-- Contenido de la ventana modal -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>ID de la cita:</strong> {{ $cita->id_cita }}</p>
                                        <p><strong>Cliente:</strong>
                                            {{ $cita->nombre . ' ' . $cita->apellido }}</p>
                                        <p><strong>Descripción:</strong> {{ $cita->descripcion }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
                                        <p><strong>Hora:</strong> {{ $cita->hora }}</p>
                                        <p><strong>Tipo de cita:</strong> {{ $cita->tipo_de_cita }}</p>
                                        <p><strong>Estado:</strong> {{ $cita->estado_de_cita }}</p>
                                    </div>
                                </div>

                                <!-- Opciones para cambiar el estado de la cita -->

                                <div class="form-group">
                                    <label for="estado">Cambiar Estado:</label>
                                    <select class="form-control" name="estado" id="estado">
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Completada">Completada</option>
                                        <option value="Cancelada">Cancelada</option>
                                    </select>
                                </div>
                                {{-- <button type="submit" class="btn btn-primary"
                                        onclick="confirmacion(event)">Guardar Cambios</button> --}}
                                <a onclick="confirmacion(event)"
                                    href="{{ route('admin.actualizarEstadoCita', $cita->id) }}" class="btn btn-primary"
                                    type="submit">Guardar cambios</a>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
        {{$citas->links()}}
    </table>
</div>
