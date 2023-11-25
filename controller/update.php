<?php
require_once "../models/conexion.php";

if (isset($_POST["bottonUpdate"])) {
    $id_usuario = $_GET['id'];  // Cambiado a $_GET['id'] ya que estás obteniendo el ID desde la URL
    $nombre = $_POST['nombre']; 
    $apellido = $_POST['apellido']; 
    $documento = $_POST['documento']; 
    $pass = $_POST['pass']; 
    $correo = $_POST['correo']; 
    $telefono = $_POST['telefono']; 
    $ciudad = $_POST['ciudad'];



    if (!empty($nombre && !empty($apellido) && !empty($documento) && !empty($pass) && !empty($correo) && !empty($telefono) && !empty($ciudad)) ) {
        $conexion = new DatabaseConnection();
        $db = $conexion->conectar();
        
        $sql = "UPDATE usuario SET  nombre=?, apellido=?, documento=?, pass=?, correo=?, telefono=?, ciudad=? WHERE id_usuario=?";
        $query = $db->prepare($sql);
        $query->bind_param('sssssssi', $nombre,$apellido,$documento,$pass,$correo,$telefono,$ciudad, $id_usuario);

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
_