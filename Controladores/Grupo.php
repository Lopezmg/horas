<?php

/**
 * Description of Grupo
 *
 * @author Milton
 */
class Grupo {
    //put your code here
    protected $rolUsuario;
    protected $grupal;// variable para verificar si el rol del usuario es administrativo o educador y asi generar el listado de los talleres o grupos de acuerdo al rol
    protected $idusuario;
    
    function __construct($rolUsuario,$usuarioid) {
        $this->rolUsuario = $rolUsuario;
        $this->idusuario=$usuarioid;
     
    }

    function getRolUsuario() {
        return $this->rolUsuario;
    }

    function getGrupal() {
        return $this->grupal;
    }
    

    function getIdusuario() {
        return $this->idusuario;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setRolUsuario($rolUsuario) {
        $this->rolUsuario = $rolUsuario;
    }

    function setGrupal($grupal) {
        $this->grupal = $grupal;
    }

    function ListadoDeGrupos(){
        $this->grupal= false;
        include "../Controladores/ConexionDB.php";
            $objConexion = new ConexionDB();
            if($this->rolUsuario=='FACILITADOR')
            $sentencia = "CALL MisGrupos($this->idusuario);";
            else $sentencia = "CALL LosGrupos();";
            if($rs = $objConexion->conexion->query($sentencia)){
                while($row= $rs->fetch_array()){
                    echo "<tr>";
                        echo "<td>".$row['Rubro']."</td>";
                        echo "<td>".$row['Ciclo']."</td>";
                        echo "<td>".$row['Dia']."</td>";
                        echo "<td>".$row['Horario']."</td>";
                        echo "<td>".$row['Nombre']."</td>";
                        echo "<td>".$row['Lugar']."</td>";
                        echo "<td>".$row['Municipalidad']."</td>";
                    echo "</tr>";
                }
                
            }
            }
    }

