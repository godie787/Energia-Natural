<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina princial :) miauu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- REFERENCIAS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="{{('css/styles.css')}}">
</head>

<body>
  <header class="header">
    <div class="logo">
        <img src="{{asset('images/logo_empresa.JPG')}}" alt="Logo de la marca">
    </div>
    <nav>
       <ul class="nav-links">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Ver Tienda</a>
          </li>
        </ul>        
    </nav>
    <a class="btn" href="#"><button>Contacto</button></a>
</header>
    <section class="vh-100" style="background-color:#e8e8e8;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block text-center"
                  style="background-color: #9A616D; ">
                    <img src="{{asset('images/logo_empresa.JPG')}}"
                      alt="Cuarzos energía natural" class="img-fluid w-80 mx-auto rounded-circle"
                      style="margin-top:220px; max-width: 400px; height: auto; " />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="POST" action="/register" >
                        @csrf
                        @include('layouts.partials.messages')
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Crear cuenta de administrador</h5>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="rut">Rut</label>
                            <input value="{{ old('rut') }}"type="text" id="rut" name ="rut" class="form-control form-control-lg" />
                            
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="nom_usuario">Nombre de Usuario</label>
                            <input value="{{ old('nom_usuario') }}" type="text" id="nom_usuario"name ="nom_usuario" class="form-control form-control-lg" />
                            
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input value="{{ old('nombre') }}"type="text" id="nombre" name ="nombre"class="form-control form-control-lg" />
                            
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="apellido">Apellido</label>
                            <input value="{{ old('apellido') }}"type="text" id="apellido"name="apellido" class="form-control form-control-lg" />
                            
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form2Example27">Contraseña</label>
                            <input value="{{ old('password') }}"type="password" id="password" name="password" class="form-control form-control-lg" />
                            
                        </div>
                        <div class="form-outline mb-2">
                          <label class="form-label" for="form2Example27">Confirmar contraseña</label>
                          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
                          
                      </div>
                        <div class="form-outline mb-2">
                          <label class="form-label" for="correo">Email</label>
                          <input value="{{ old('correo') }}" type="email" id="correo" name="correo"class="form-control form-control-lg" />
                          
                        </div>
                        <div class="pt-1 mb-4">
                          <button style="background-color: #1b3039; color: #eceff1; font-size:20px;" 
                          class="btn btn-lg btn-block" type="submit">Registrarse</button>

                          <a href="/login"style="background-color: #1b3039; color: #eceff1; font-size:20px;" 
                            class="btn btn-lg btn-block" type="button">Login</a>
                        </div>
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
