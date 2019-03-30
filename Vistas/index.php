<?php 
session_start();
include "../Controladores/ValidacionLogin.php";
if (!isset($_SESSION['Nombre'])) {
    $usuario = $_POST["txtUsuario"];
    $contrasena = $_POST["txtContrasena"];
    
    $validando = new ValidacionLogin($usuario, $contrasena);
    if (!$validando->validacion())
        header("Location: ../");
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
    
	<section class="container">
            <h2 style=" padding-top: 100px;"class="text-center">Sistema Control Administrativo</h2>
                
		<?php
                include '../Controladores/PermisosUsuarios.php';
                $permiso = new PermisosUsuarios($_SESSION['Rol']);
                $permiso->getPermisos();
                ?>
	</section>
	<script src="../Js/bootstrap.js"></script>
</body>
</html>