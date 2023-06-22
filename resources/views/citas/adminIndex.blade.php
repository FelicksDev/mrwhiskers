
    @extends('layout.header')
    @livewireStyles
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
                @livewire('cita-index')
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
    @livewireScripts

