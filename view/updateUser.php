
<body>
<?php include("templates/header.php")?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <div class="container">
        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
              <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
              </div>
    <?php
        include_once "../models/conexion.php"; // Incluye el archivo de conexión
        $dbConnection = new DatabaseConnection();
        $conexion = $dbConnection->conectar();

        // Verifica si se ha enviado el formulario
        if (isset($_POST["bottonUpdate"])) {
            include "../controller/update.php"; // Incluye el controlador de actualización
        }
        
        $id_usuario = $_GET['id'];
        $sql = $conexion->query("SELECT * FROM usuario WHERE id_usuario = $id_usuario");
        $datos = $sql->fetch_object();
    ?>
    <div class="card-body p-4 p-sm-5">
              <form  class="col-4 p-3 m-auto" method="post">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Modificar autor</h5>
                <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nameUser" name="nombre" value="<?php echo $datos->nombre; ?>">
                        <label for="nameUser">Nombre</label>
                      </div>
        
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastname" name="apellido"  value="<?php echo $datos->apellido; ?>">
                        <label for="lastname">Apellido</label>
                      </div>
        
                      <hr>
        
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="passwordUser" name="documento"  value="<?php echo $datos->documento; ?>">
                        <label for="passwordUser">Documento</label>
                      </div>
        
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="pass"  value="<?php echo $datos->pass; ?>">
                        <label for="email">Contraseña</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="correo"  value="<?php echo $datos->correo; ?>">
                        <label for="email">Correo</label>
                      </div>
        
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="telefono"  value="<?php echo $datos->telefono; ?>">
                        <label for="email">Telefono</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="ciudad"  value="<?php echo $datos->ciudad; ?>">
                        <label for="email">Ciudad</label>
                      </div>
                     
        
        
                      
                      <div class="">
                        <button class="btn btn-primary" name="bottonUpdate" type="submit">Actualizar</button>
                      </div>
        
                    </form>
                  </div>
                </div>
                </body>
    <!-- Aquí va el resto de tu código HTML y el formulario -->
    <!-- Similar a lo que tenías antes, solo con el valor de los campos obtenido de $datos -->

    
    </div>
            <a href="main.php">Volver</a>
    </div>
    <?php
        // Cierre de la conexión a la base de datos
        $conexion->close();
    ?>
