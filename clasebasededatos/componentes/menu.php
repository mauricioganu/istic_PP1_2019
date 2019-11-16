
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
          <?php if(isset($_SESSION['usuario']))
          {
            echo $_SESSION['usuario'];
        }
         else
        {
       ?>
         Entre y salga despacio S.A
        <?php
       }
       ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-iconx|"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
              <?php 
            if(isset($_SESSION['usuario'])==false){
              //solo muestra estos item , si el usuario no esta logeado
            ?>
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/registro.php">Registrate</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="/clasebasededatos/paginas/login.php">Login</a>
            </li>
            <?php 
            }
            ?>

            <?php 
            if(isset($_SESSION['usuario'])){
              //solo muestra el menu si estas con la variable de sesión instaciada
            ?>

            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/ingresoVehiculo.php">Ingresar Vehiculo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/facturar.php">Facturar Vehiculo</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/facturados.php">Vehiculos facturados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/estacionados.php">Vehiculos ingresados</a>
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/listaUsuarios.php">Listar usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/funciones/hacerLogout.php">Cerrar Sesion</a>
            </li>
          
            <?php 
            }
            ?>



            <?php 
            if(isset($_SESSION['usuario']) && isset($_SESSION['perfil']) &&$_SESSION['perfil']=="admin"){
              //solo muestra el menu si estas con la variable de sesión instaciada y sos de perfil admin
            ?>

           
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/facturados.php">Historial Vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/clasebasededatos/paginas/listaUsuarios.php">Historial Empleados</a>
            </li>

            <?php 
            }
            ?>
         
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="/clasebasededatos/funciones/hacerLogout.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Quien Soy" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Salir</button>
          </form>
        </div>
      </nav>
 