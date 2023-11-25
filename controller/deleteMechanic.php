<?php
require_once "../models/conexion.php";

// Obtén el ID del autor que deseas eliminar desde el formulario
$id = $_GET['id'];

$conexion = new DatabaseConnection();
$db = $conexion->conectar();

// Consulta SQL para eliminar el autor por su ID
$sql = "DELETE FROM mecanico WHERE id_mecanico = ?";
$query = $db->prepare($sql);
$query->bind_param('i', $id); // 'i' indicates integer type

if ($query->execute()) {
    // Eliminación exitosa, redirige a la página principal
    header("location: ../view/main.php");
    exit();
} else {
    echo "No se pudo borrar el libro.";
}

$query->close();
$db->close();
?>
