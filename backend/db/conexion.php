<?php

class conexionToDb{
    private $conexion;

    public function __construct(){
        $stringDB = "mysql:host=localhost;dbname=kenneth_pc_component_db";
        $user = "root";
        $password = ""
    }

    try{
        $this->conexion = new PDO($stringDB, $user, $password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
    } catch(PDOException $err){
        die("Error de conexión:" . $err->getMessage());
    }

    protected function Conex(){
        return $this->conexion;
    }

    function Close_conexion(){
        $this->conexion = null;
        return $this->conexion;
    }
}