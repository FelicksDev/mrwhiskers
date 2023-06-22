    @extends('layout.header')
    @csrf
    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')
        <h1>Dashboard</h1>
    @stop
    @section('content')
        <p>Welcome to this beautiful admin panel.</p>
        <p>Bienvenido </p>
        <p>Agregar un panel que mnuestre las cantida de cita que tiene pendiente el dia presente</p>
        {{--  @can('admin')
            <p>Eres el usuario Administrador </p>
        @endcan --}}
        
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datos generales</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="badge badge-primary">Datos</span>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @role('admin')
                    <p>Bienvenido. Tienes el rol administrador</p>
                
                mi rol es: {{ Auth::user()->getRole() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>6</h3>
                                <p>Citas registradas</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Mas información <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="small-box bg-gradient-success">
                            <div class="inner">
                                <h3>3</h3>
                                <p>Clientes registrados</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Mas información <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endrole
                @role('cliente')
                <p>Bienvenido. Tienes el rol cliente</p>
                mi rol es: {{ Auth::user()->getRole() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>2</h3>
                                <p>Citas realizadas</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Mas información <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endrole
            
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->


    @stop

    @extends('partials.footerScripts')
    @section('js')
        <script>
            ('$id').onClick(function() {
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
            })
        </script>
    @stop
