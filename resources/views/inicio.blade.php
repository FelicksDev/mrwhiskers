<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @extends('layout.header')
    <title>Inicio</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <div class="d-flex align-items-center m-2">
                <img class="" src="{{ asset('bootstrap-4.svg') }}" alt="logo" width="30"
                    height="24">
                <p class="mb-0 fw-semibold ms-4">¡Mr. Whiskers!</p>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
            aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link mx-3 text-reset text-uppercase fw-semibold" href="#">Inicio
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 text-reset text-uppercase fw-semibold" href="#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 text-reset text-uppercase fw-semibold" href="#campanias">Campañas de salud</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 text-reset text-uppercase fw-semibold" href="#contacto">Contacto</a>
                </li>
                <li class="d-flex mx-3">
                    <button class="btn btn-primary my-2 my-sm-0 " type="submit">
                        <a class="nav-link text-white fw-bold" href=" {{route ('user.getLogin') }} ">Inicio de sesión!</a>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
    {{-- <div class="container">
  <img class="img-fluid" src="https://statitatic.com/media/24536d_8610bbeb807d4d45ab9e6600e27c1e2c~mv2.png/v1/fill/w_980,h_680,q_90/24536d_8610bbeb807d4d45ab9e6600e27c1e2c~mv2.png" alt="1.png" loading="eager" style="width: 100%; height: auto;">
</div> --}}
    {{-- Carrusel --}}
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="truc.wixse" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active d-item">
                <img src="https://static.wixstatic.com/media/24536d_8610bbeb807d4d45ab9e6600e27c1e2c~mv2.png/v1/fill/w_1920,h_680,q_90/24536d_8610bbeb807d4d45ab9e6600e27c1e2c~mv2.webp"
                    class="d-block w-100 d-img " alt="...">
            </div>
            <div class="carousel-item d-item">
                <img src="https://static.wixstatic.com/media/24536d_8610bbeb807d4d45ab9e6600e27c1e2c~mv2.png/v1/fill/w_1920,h_680,q_90/24536d_8610bbeb807d4d45ab9e6600e27c1e2c~mv2.webp"
                    class="d-block w-100 d-img " alt="...">
            </div>
            <div class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">Clinica Veterinaria </p>
                <h1 class="display-1 fw-bolder text-capitalize">Mr Whiskers</h1>
                <p class="mt-5 fs-3 text-uppercase">Consultas y servicios</p>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row align-items-start mt-5">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-4  " id="servicios">
                <h2 class="font_2" style="line-height:1em; font-size:45px;"><span
                        style="font-weight:bold;">NUESTROS</span></h2>

                <h2 class="font_2" style="line-height:1em; font-size:45px;"><span>SERVICIOS</span></h2>
            </div>


            <div class="col col-md-7">
              <div class="container"> 
                <section style="height:400px;">

                  <div class="d-flex">
                      <svg xmlns="http://www.w3.org/2000/svg " style="width:70px; height:60px; " class="icon-section" fill="black">
                          <path
                              d="M46.5 28.9L20.6 3c-.6-.6-1.6-.6-2.2 0l-4.8 4.8c-.6.6-.6 1.6 0 2.2l19.8 20-19.9 19.9c-.6.6-.6 1.6 0 2.2l4.8 4.8c.6.6 1.6.6 2.2 0l21-21 4.8-4.8c.8-.6.8-1.6.2-2.2z">
                          </path>
                      </svg>
                      <div>
                          <h6 class="font_6" style="font-size:20px;">EXÁMENES DE CONTROL</h6>
                          <p class="font_8" style="font-size:14px;">Haz clic para editar y agregar tu propio
                              texto.&nbsp;</p>
                      </div>
                  </div>

                  <div class="d-flex mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg " style="width:70px; height:60px; " class="icon-section" fill="black">
                        <path
                            d="M46.5 28.9L20.6 3c-.6-.6-1.6-.6-2.2 0l-4.8 4.8c-.6.6-.6 1.6 0 2.2l19.8 20-19.9 19.9c-.6.6-.6 1.6 0 2.2l4.8 4.8c.6.6 1.6.6 2.2 0l21-21 4.8-4.8c.8-.6.8-1.6.2-2.2z">
                        </path>
                    </svg>
                    <div>
                        <h6 class="font_6" style="font-size:20px;">EXÁMENES DE CONTROL</h6>
                        <p class="font_8" style="font-size:14px;">Haz clic para editar y agregar tu propio
                            texto.&nbsp;</p>
                    </div>
                </div>
                <div class="d-flex mt-5">
                  <svg xmlns="http://www.w3.org/2000/svg " style="width:70px; height:60px; " class="icon-section" fill="black">
                      <path
                          d="M46.5 28.9L20.6 3c-.6-.6-1.6-.6-2.2 0l-4.8 4.8c-.6.6-.6 1.6 0 2.2l19.8 20-19.9 19.9c-.6.6-.6 1.6 0 2.2l4.8 4.8c.6.6 1.6.6 2.2 0l21-21 4.8-4.8c.8-.6.8-1.6.2-2.2z">
                      </path>
                  </svg>
                  <div>
                      <h6 class="font_6" style="font-size:20px;">EXÁMENES DE CONTROL</h6>
                      <p class="font_8" style="font-size:14px;">Haz clic para editar y agregar tu propio
                          texto.&nbsp;</p>
                  </div>
              </div>


              </section>
            </div>
              </div>
                

            </div>

        </div>
    </div>

    <div class="container ">
        <div class="row align-items-start mt-5">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-4 "id="campanias">
                <h2 id="servicios" class="fw-bold" style="font-size:45px;">
                    <span>CAMPAÑAS DE </span>
                </h2>
                <h2 class="fw-medium" style=" font-size:45px;">
                    <span>SALUD</span>
                </h2>
            </div>

            <div class="col col-md-7">
                <section class="container ">
                    <div style="display: flex; align-items: center;">
                        <div class="bg-primary p-4 lh-base ">
                            <p class="text-white fw-bold " style="font-size:16px;">Lorem ipsum dolor sit, amet
                                consectetur adipisicing elit. Quaerat labore odio autem vel, dolor illum quam, dolorum
                                nesciunt cum adipisci corrupti ducimus soluta. Exercitationem quidem maxime beatae, fuga
                                repudiandae iure! Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae
                                doloremque, delectus nesciunt exercitationem omnis ad consequatur ex repellat esse harum
                                qui ipsa, adipisci amet repudiandae quae assumenda a officiis nihil?</p>
                        </div>
                    </div>
                </section>

            </div>


        </div>
    </div>
    <div class="container">
        <div class="row align-items-start mt-5">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-4" id="contacto">
                <h2 class="fw-bold" style="line-height:1em; font-size:45px;"><span>SIGUE EN</span></h2>
                <h2 class="font_2" style="line-height:1em; font-size:45px;"><span style="font-weight:bold;">CONTACTO
                    </span></h2>
            </div>
            <div class="col col-md-7">


                <section class="container bg-secondary p-5">

                    <div style="display: flex; align-items: center; " class="row align-items-start">
                        <div class="col col-6">
                            <h6 class="fs-5"> NUESTRA DIRECCION:</h6>
                            {{-- <p class="font_8" style="font-size:14px;">Av. Los Jarrones</p><br>
                    <p class="font_8" style="font-size:14px;">#26726. Edificio Microsoft </p> --}}
                            <div class="fs-6 mt-4">
                                <p class="">
                                    <span>Av. Los Santos 122</span>
                                </p>
                                <p class="" style="">
                                    <span>28021, Everywhere.</span>
                                </p>
                                <p class="" style="">
                                    <span>
                                        <span style="font-weight:bold;">Email:</span><a data-auto-recognition="true"
                                            href="mailto:">correo elctronic@test.com</a><br>
                                        <span style="font-weight:bold;">Tel: </span>22222222
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col col-6 ">
                            <h6 class="fs-5"> NUESTROS HORARIOS:</h6>
                            <div class=" fs-6 mt-4">
                                <p class="fw-semibold"><span>
                                        <span>7:00 AM - 10:00 PM</span>
                                    </span>
                                </p>
                                <p class="">Lunes- Sábado</p>
                                <p class="fw-semibold">
                                    <span> 10:00 AM - 6:00 PM</span>
                                </p>
                                <p class=""><span>Domingo</span></p>
                            </div>
                        </div>

                    </div>


                </section>

            </div>

        </div>
    </div>
    <div class="my-5 py-5 px-5 text-center">
        <button type="button " class="btn btn-primary fw-semibold fs-5 px-4">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary fw-semibold fs-5 px-4 ">
                ¡Reserva tu cita aqui!
            </a>
        </button>
    </div>

    

    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reserva de citas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
              <p>Para realizar una reserva de cita debes iniciar sesión.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Cerrar</button>
                <a href="{{route('user.getRegister')}}" class="btn btn-primary">Registrarse</a>
                <a href="{{route('user.getLogin')}}" class="btn btn-primary">Iniciar sesión</a>
              </div>
          </div>
        </div>
      </div>


</body>
@extends('partials.footer')
</html>
