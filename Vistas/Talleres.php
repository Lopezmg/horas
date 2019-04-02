<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../Css/bootstrap.css">
	<title>Listado de Grupos</title>
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
    <section  class="container">
        <h1 style=" padding-top: 100px; padding-bottom: 50px;"class="text-center">
         Listado de Grupos-Talleres</h1>
        <br>
        <br>
        <div class="input-group mb-3 col-lg-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Buscar</span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar" aria-label="Username" aria-describedby="basic-addon1">
            <input type="button" value="Buscar" class="btn btn-primary" />
            
        </div>
        
        <div class="table-responsive">
        <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <td>Taller</td><td>Ciclo</td><td>día</td><td>Horario</td>
                    <td>Nombre</td><td>Lugar</td><td>Municipio</td><td>Opción</td>
                </tr>
            </thead>
            <tbody>
            <?php
            include "../Controladores/Grupo.php";
            $grupo = new Grupo($_SESSION['RolNombre'], $_SESSION['ID']);
            $grupo->ListadoDeGrupos();
            ?>
            </tbody>
        </table>
        </div>
    </section>
    
    <script src="../Js/bootstrap.js"></script>
</body>
</html>