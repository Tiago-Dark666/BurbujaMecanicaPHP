<?php
    require_once "conexion.php";

    class actualizar extends DatabaseConnection{
        public function update($nombre,$apellido,$documento,$pass,$correo,$telefono,$ciudad){
            $conexion = parent::conectar();
            $sql= "UPDATE autor SET (nombre,apellido,documento,pass,correo,telefono,ciudad) VALUES (?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssss',$nombre,$apellido,$documento,$pass,$correo,$telefono,$ciudad);
            return $query->execute(); 
        }
    }