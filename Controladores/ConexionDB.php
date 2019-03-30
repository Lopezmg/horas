<?php

/**
  CONEXION PARA LA BASE DE DATOS
 * @author Milton
 * Desarrollo para CESAL
 */
class ConexionDB {

    //put your code here
    public $conexion;
    public $msj;

    function __construct() {
        $servidor = "localhost";
        $usuario = "root";
        $contrasena = "";
        $base = "CESAL";
        try {
            $this->conexion = new mysqli($servidor, $usuario, $contrasena, $base);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        if ($this->conexion)
            $this->msj = "CONECTADO_EXITOSAMENTE";
        else
            $this->msj = "ERROR_AL_CONECTAR_" . $this->conexion->error();
    }
    
    function getConexion() {
        return $this->conexion;
    }

    function getMsj() {
        return $this->msj;
    }

    function setConexion($conexion) {
        $this->conexion = $conexion;
    }

    function setMsj($msj) {
        $this->msj = $msj;
    }



}
