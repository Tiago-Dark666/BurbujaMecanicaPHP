<?php
require_once "../models/conexion.php";

if (isset($_POST["bottonUpdateMechanic"])) {
    $id_mecanico = $_GET['id'];  // Cambiado a $_GET['id'] ya que estás obteniendo el ID desde la URL
    $nombre = $_POST['nombre']; 
    $apellido = $_POST['apellido']; 
    $passMechanic = $_POST['passMechanic']; 
    $correo = $_POST['correo']; 
    $especialidad = $_POST['especialidad']; 
    $experiencia = $_POST['experiencia']; 
    $telefono = $_POST['telefono'];


    if (!empty($nombre && !empty($apellido) && !empty($passMechanic) && !empty($correo) && !empty($especialidad) && !empty($experiencia) && !empty($telefono)) ) {
        $conexion = new DatabaseConnection();
        $db = $conexion->conectar();
        
        $sql = "UPDATE mecanico SET  nombre=?, apellido=?, passMechanic=?, correo=?, especialidad=?, experiencia=?, telefono=? WHERE id_mecanico=?";
        $query = $db->prepare($sql);
        $query->bind_param('sssssssi', $nombre,$apellido,$passMechanic,$correo,$especialidad,$experiencia,$telefono, $id_mecanico);

        if ($query->execute()) {
            // Redirigir a la página principal u otra página de tu elección
            header("location: ../view/main.php");
            exit();
        } else {
            echo "Error al actualizar los datos: " . $query->error;
        }
    } else {
        echo "Campos vacíos";
    }
}
?>
