<?php
/**
 * @author Milton
 * desarrollo para CESAL
 */
class ValidacionLogin {

    protected $usuario;
    protected $contrasena;
    protected $activo;
    
    function __construct($usuario, $contrasena) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->activo=false;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function validacion() {
        include "../Controladores/ConexionDB.php";
        $conex = new ConexionDB();
        if ($localconexion = $conex->getConexion()) {
            
            $rs =$localconexion->query("CALL ValidacionLogin('$this->usuario','$this->contrasena')");
            if($rs->num_rows!=0){
                while($row =$rs->fetch_array()){
                    $_SESSION['ID']=$row['ID'];
                    $_SESSION['Nombre']=$row['Nombre'];
                    $_SESSION['RolId']=$row['RolId'];
                    $_SESSION['RolNombre']=$row['RolNombre'];
                    $this->activo=true;
                }
            }else {
                $this->activo=false;
            }
        } else {
            $this->activo=false;
        }
        $conex->getConexion()->close();
        return $this->activo;
    }

}
