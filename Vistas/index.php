<?php 
session_start();
include '../Controladores/PermisosUsuarios.php';                      
if (!isset($_SESSION['Nombre'])) {
    $usuario = $_POST["txtUsuario"];
    $contrasena = $_POST["txtContrasena"];
    include "../Controladores/ValidacionLogin.php";    
    $validando = new ValidacionLogin($usuario, $contrasena);
    if ($validado = !$validando->validacion()) {
        header("Location: ../");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../Css/bootstrap.css">
	<title>Pantalla Principal</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#">CESAL</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="sessionout.php">cerrar sesión</a>
                    </li>
                    
                </ul> 
    </nav>
	<section class="container">
            <h2 style=" padding-top: 100px; padding-bottom: 50px;"class="text-center">Sistema Control Administrativo</h2>
                
		<?php
                
                $permiso = new PermisosUsuarios($_SESSION['RolId']);
                $permisos = $permiso->getPermisos();
                ?>
	</section>
	<script src="../Js/bootstrap.js"></script>
</body>
</html>