<?php
   require_once "../models/authMechanic.php";

   $nombre = $_POST['nombre']; 
   $apellido = $_POST['apellido']; 
   $passMechanic = $_POST['passMechanic']; 
   $correo = $_POST['correo']; 
   $especialidad = $_POST['especialidad']; 
   $experiencia = $_POST['experiencia']; 
   $telefono = $_POST['telefono'];

   $Auth = new authMechanic();

   if($Auth->registrar($nombre,$apellido,$passMechanic,$correo,$especialidad,$experiencia,$telefono)){
        header("location: ../view/main.php");
   }else{
        echo "No se pudo registrar";
   }