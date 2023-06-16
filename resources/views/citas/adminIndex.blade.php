<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @extends('layout.header')

</head>

<body>
    @csrf
    @extends('adminlte::page')
    @section('title', 'Lista de citas')
    @section('content_header')
        <h1>Lista de citas</h1>
        @extends('partials.mensajes')
    @stop
    @section('content')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de citas</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <span class="badge badge-primary">Label</span>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                @include('partials.mensajes')
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
                                    <a class="btn btn-info" href="{{route('admin.cita.edit',$cita)}}">Ver</a>
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
                                                    href="{{ route('admin.actualizarEstadoCita', $cita->id) }}"
                                                    class="btn btn-primary"
                                                    type="submit">Guardar cambios</a>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>


            </tbody>
            </table>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            The footer of the card
        </div>
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->






        <div class="modal fade" id="modalEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Estao de cita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Cambiar estado de cita
                        <select class="form-select" aria-label="Seleccionar estado" id="estado_cita" name="estado_cita">
                            {{-- TODO mostrar estado en base de datos --}}
                            <option value="1">Pendiente</option>
                            <option value="2">Cancelada</option>
                            <option value="3">Completada</option>
                            <option value="4">Ausente</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Actualizar estado</button>
                    </div>
                </div>
            </div>
        </div>

    @stop
    @extends('partials.footerScripts')
    @section('js')
        <script>
            function confirmacion(event) {
                //$('#modal-cita').hide();
                //$('#modal-cita').modal('hide');
                /* $('#modal-cita').hide('toogle'); */
                var modal = document.getElementById('modal-cita');
                console.log(modal);

                // Agrega la clase CSS "hidden" para ocultar la ventana modal
                //modal.classList.add('hidden');
                /* $('#modal-cita').modal('toggle') */
                //$('#modal-cita').hide();
                //$('#modal-cita').remove();
                event.preventDefault();
                /* document.getElementById('modal-cita').modal('hide'); */
                /* document.getElementById('modal-cita').modal('hide'); */
                var route = event.currentTarget.getAttribute('href');
                Swal.fire({
                    html: 'data-toggle="modal" ',
                    title: '¿Estás seguro/a de que quieres actualizar la cita?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'No, no quiero actualizar',
                    confirmButtonText: 'Sí, quiero actualizar la cita'
                    /*  inputAttributes: {
                         data-dismiss="modal"
                     }, */

                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            '¡Actualizado!',
                            'Cita actualizada',
                            'success'
                        ).then(() => {

                            console.log("Actualizar cit. Cerra modal");
                            $('#modal-cita').hide();
                            /* $('#modal-cita').modal('hide'); */

                            console.log($('#modal-cita').modal('hide'));
                            // Agregar lógica adicional después de cerrar la ventana modal
                            window.location.href = route;
                        });

                    } else {
                        $('#modal-cita').modal('hide');
                        console.log("La cita no se actualizó");
                    }
                });
            }

            //Para prevenir envios de fomrulario.s  es decir ventada de cofmriacion
            /* $('#btn-delete').submit(function(e) {
                e.preventDefault();
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
            });  */
            $("#btn-cancel").click(function() {
                Swal.fire({
                    title: 'Estas seguro/a de que quieres cancelar la cita?',
                    text: "No podrás cambiarlo después!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'No, asistiré a la cita',
                    confirmButtonText: 'Si, quiero cancelar la cita'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Cancelado!',
                            'Cancelaste la cita.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @stop
</body>

</html>
