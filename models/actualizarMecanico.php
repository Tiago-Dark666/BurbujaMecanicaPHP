<?php
    require_once "conexion.php";

    class actualizar extends DatabaseConnection{
        public function update($nombre,$apellido,$passMechanic,$correo,$especialidad,$experiencia,$telefono){
            $conexion = parent::conectar();
            $sql= "UPDATE mecanico SET (nombre,apellido,passMechanic,correo,especialidad,experiencia,telefono) VALUES (?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssss',$$nombre,$apellido,$passMechanic,$correo,$especialidad,$experiencia,$telefono);
            return $query->execute(); 
        }
    }