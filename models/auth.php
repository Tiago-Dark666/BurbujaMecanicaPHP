<?php
    require_once "conexion.php";

    class auth extends DatabaseConnection{
        public function registrar($nombre,$apellido,$documento,$pass,$correo,$telefono,$ciudad){
            $conexion = parent::conectar();
            $sql = "INSERT INTO usuario (nombre,apellido,documento,pass,correo,telefono,ciudad) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssss',$nombre,$apellido,$documento,$pass,$correo,$telefono,$ciudad);
            return $query->execute();
        }
    }