    @extends('layout.header')
    @csrf
    @extends('adminlte::page')
    @section('title', 'Mis citas')
    @section('content_header')
        <h1>Citas</h1>
    @stop
    @section('content')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mis citas</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <span class="badge badge-primary">Label</span>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('partials.mensajes')
                <table class="table table-dark table-stripeed mt-4">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th> 

                        <th scope="col">Tipo de cita</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                            <tr>
                                <td>{{ $cita->id_cita }}</td>
                                <td>{{ $cita->descripcion }}</td>
                                <td>{{ $cita->fecha }}</td>
                                <td>{{ $cita->hora }}</td>
                                <td>{{ $cita->tipo_de_cita }}</td>
                                <td> 
                                    <button class="{{ $estilos[$cita->estado_de_cita] }}">
                                        {{ $cita->estado_de_cita }}
                                    </button>
                                </td>
                                <td>
                                    {{-- <a id="btn-edit" href="/miCitas/{{$cita->id}}" class="btn btn-info">Editar</a> --}}
                                    <a id="btn-show" href="" class="btn btn-info">Ver</a>
                                    {{-- <button id="btn-del"class="btn btn-danger">Borrar</button> --}}
                                    @if ($cita->estado_de_cita == 'Pendiente')
                                        <a onclick="confirmacion(event)"
                                            href="{{ route('user.cancelarCita', ['idCita' => $cita->id_cita]) }}"
                                            class="btn btn-danger">Cancelar cita</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
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
    @stop
    @extends('partials.footerScripts')
    @section('js')
        <script>
            function confirmacion(event) {

                event.preventDefault();
                var route = event.currentTarget.getAttribute('href');
                Swal.fire({
                    title: 'Estas seguro/a de que quieres cancelar la cita?',
                    text: "No podrás revertirlo después!",
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
                        window.location.href = route;
                    } else {
                        console.log("No cancelar la cita");
                    }

                })
            }
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