<?php


/**
 * Description of PermisosUsuarios
 * clase para gestionar los permisos de usuario de acuerdo a Roles
 
 * @author Milton
 */
class PermisosUsuarios {
        protected $idRol;
        
                
        function __construct($idRol) {
            $this->idRol = $idRol;
            
        }
        
        function getIdRol() {
            return $this->idRol;
        }

        function setIdRol($idRol) {
            $this->idRol = $idRol;
        }

        function getPermisos(){
            include "../Controladores/ConexionDB.php";
            $objConexion = new ConexionDB();
            $sentencia = "SELECT Modulo,Ver,Modificar FROM permisos_usuarios WHERE Rol=$this->idRol;";
            if($rs = $objConexion->getConexion()->query($sentencia)){
                echo "<div class='row'>";  
                while($row= $rs->fetch_array()){
                    echo "<div class='col-md-4'>";
                    echo "<div class='card bg-default'>";
                    echo "<div class='card-body '>";
                    echo "<h3 class='card-title text-center'>$row[Modulo]</h3>";                    
                    $this->submenu($row['Modulo']);
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";  
            }
                echo "</div>";  
            }
            
       $objConexion->getConexion()->close();
            
        }
        
        public function submenu($modulo){
            switch ($modulo){
                case "Talleres":
                    echo "<ul>";
                    echo "<li><a href='talleres.php'>Talleres</a></li>";
                    echo "<li><a href='#Modal_Planificacion'>Planificacion</a></li>";
                    echo "<li><a href='#'>Asistencias </a></li>";
                    echo "<li><a href='#'>Notas </a></li>";
                    echo "</ul>";
                    break;
                case "Alumnos":
                    echo "<ul>";
                    echo "<li><a href='RegistroAlumno.php'>Registrar Alumno</a></li>";                                        
                    echo "</ul>";
                    break;
                case "Administrativo":
                    echo "<ul>";
                    echo "<li><a href='NuevoTaller.php'>Nuevo Taller</a></li>";
                    echo "<li><a href='EditTaller.php'>Modificar Taller</a></li>";
                    echo "<li><a href='EditEstudiante.php'>Modificar Estudiante</a></li>";
                    
                    echo "</ul>";
                    break;

        }
        }
}
