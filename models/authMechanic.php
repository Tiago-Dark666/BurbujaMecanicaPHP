<?php
    require_once "conexion.php";

    class authMechanic extends DatabaseConnection{
        public function registrar($nombre,$apellido,$passMechanic,$correo,$especialidad,$experiencia,$telefono){
            $conexion = parent::conectar();
            $sql = "INSERT INTO mecanico (nombre,apellido,passMechanic,correo,especialidad,experiencia,telefono) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssss',$nombre,$apellido,$passMechanic,$correo,$especialidad,$experiencia,$telefono);
            return $query->execute();
        }
    }