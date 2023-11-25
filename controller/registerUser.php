<?php
   require_once "../models/auth.php";

   $nombre = $_POST['nombre']; 
   $apellido = $_POST['apellido']; 
   $documento = $_POST['documento']; 
   $pass = $_POST['pass']; 
   $correo = $_POST['correo']; 
   $telefono = $_POST['telefono']; 
   $ciudad = $_POST['ciudad'];

   $Auth = new auth();

   if($Auth->registrar($nombre,$apellido,$documento,$pass,$correo,$telefono,$ciudad)){
        header("location: ../view/main.php");
   }else{
        echo "No se pudo registrar";
   }