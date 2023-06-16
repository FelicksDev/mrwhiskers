<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-RccFYiF0ywvRzRm+dd8TJj2Xr1EJDP1l3s+LLoGJSMnn/mPUZoNGN+M/jBveghA1NjgXJ+TRQ2rhPY1NhE+lZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <title>Registro exitoso</title>
</head>

<body>
    @csrf
    <div>
        @if (session('success'))
        <div class="container mt-5"> 
            <div class="card mx-auto" style="width: 30rem;">
                <div class="card-body">
                  <h5 class="card-title">Usuario creado correctamente</h5>
                  <p class="card-text">Sus credenciales de acceso son:</p>
                  Usuario: {{ session('usuario') }}
                  <br>
                  Contrasenia: {{ session('password') }}
                </div>
              </div>
              <a href="{{route('user.getLogin')}}">Iniciar sesion</a>
        </div>
      

        @else
        <div class="text-center mt-5">
            <h5>No puedes acceder a esta página</h5>
        </div>
            
        @endif

    </div>
</body>

</html>
