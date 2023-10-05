<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- REFERENCIAS-->
  <link rel="stylesheet" href="{{('css/styles.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <div class="container py-5 h-80">
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
      
                      <form action="/login" method="POST">
                        @csrf
                        
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar sesión como administrador</h5>
                        @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                          </div>
                        @endif
                        @if(session('success'))
                          <div class="alert alert-success">
                            {{ session('success') }}
                          </div>
                        @endif
                        <div class="form-outline mb-4">
                          
                          <label class="form-label" for="nom_usuario">Nombre de Usuario o Email</label>
                          <input type="text" id="nom_usuario" name ="nom_usuario" class="form-control form-control-lg" required />
                        </div>

                        <div class="form-outline mb-4">
                          
                          <label class="form-label" for="password">Contraseña</label>
                          <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button style="background-color: #1b3039; color: #eceff1; font-size:20px;" 
                          class="btn btn-lg btn-block" type="submit">Iniciar sesión</button>
                        </div>

                        <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes una cuenta? <a href="register"
                            style="color: #393f81;">Registrate aquí</a></p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
