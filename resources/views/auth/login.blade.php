<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/boostrap.min.css">
    @extends('layout.header')
    <title>Incio de sesión - Clientes</title>
</head>
<body>

  <div class="d-flex align-items-center justify-content-center"  style="height: 100vh;">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header bg-primary text-white text-center fw-bold">Inicio de sesión</div>
          <div class="card-body"> 
            
            <form action="{{route('user.postLogin')}} " method="POST" class="row g-3 needs-validation" novalidate >
              @include('partials.mensajes')
              @csrf
              <div class="form-group">
                <label for="inputEmail" class="m-1">Usuario</label>
                <input type="text" class="form-control" id="inputEmail" placeholder="ejemplo@ejemplo.com" name='username' required>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                  Debes llenar el campo
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="m-1">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="********" name='password' required>
                <div class="valid-feedback">
            
                </div>
                <div class="invalid-feedback">
                  Debes llenar el campo
                </div>
              </div>
              <div class="mt-3">
              <button type="submit" class="btn btn-primary w-100  fw-bold">Iniciar sesión</button>
            </div>
            <div class="text-center">
              ¿No tienes una cuenta? <a href="{{route('user.getRegister')}}">Regístrate aquí</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    
  </div>
  <a href="{{route('inicio')}}" class="btn btn-primary position-absolute bottom-0 start-0 mb-3 ms-3 p-3">Regresar</a>
  @extends('partials.bootstrapValidator')
</body>
</html>