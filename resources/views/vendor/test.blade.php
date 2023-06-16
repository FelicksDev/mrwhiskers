<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('postFormCita') }}" id="form-cita" class="row g-3 needs-validation">
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

                <div class="text-center">
                    {{--  <button type="button" value="Confirmar reserva" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Realiza reserva</button> --}}
                    <input type="submit" name="btn" value="Continuar" id="submitBtn" data-toggle="modal"
                        data-target="#exampleModal" class="btn btn-default" onclick="showConfirmationModal()" />
                    <button type="submit" class="btn btn-primary" data-toggle=""
                        data-target="#confimation_modal">Enviar</button>
                </div>
            </div>
    </form>
</body>

</html>
