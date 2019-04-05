<?php
session_start();
if (!isset($_SESSION['RolId'])) {
    header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="../Css/bootstrap.css">
        <title>Registro de Estudiante</title>
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
            <h2 style=" padding-top: 100px; padding-bottom: 50px;"class="text-center">Registro de Alumno</h2>

            <form name="FormRegistroAlumno" action="RegistroAlumno.php" method="POST">
                <h2 class="text-center ">Datos Generales</h2>
                <div class="row justify-content-center">

                    <div class="col-lg-9 col-md-6 col-sm-8">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Nombres</div>
                            </div>
                            <input type="text" class="form form-control" name="txtNombre" >
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Apellidos</div>
                            </div>
                            <input type="text" class="form form-control" name="txtApellidos" >
                        </div>                    
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">                    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text" >Sexo</div>
                            </div>
                            <select class="form form-control">
                                <option >Seleccione</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Fecha de Nacimiento</div>
                            </div>
                            <input type="date" class="form form-control" name="txtFechaNacimiento" >
                        </div>
                    </div>
                    <?php
                    // aqui van los controladores que llaman dos select:  municipio y depto de nacimiento
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Identificación</div>
                            </div>
                        <input type="text"class="form form-control" name="txtIdentificacion" placeholder="DUI">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Estado Civil</div>
                            </div>
                        <select class="form form-control" name="txtSexo">
                            <option>SELECCIONE</option>
                            <option >Soltero/a</option>
                            <option >Casada/a</option>
                            <option>Acompañado/a</option>
                            <option>Divorciado/a</option>
                            <option>Separado/a</option>
                            <option>Viudo/a</option>
                        </select>
                        </div>       
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                        <label>Jefe Familiar</label>
                        <div class="form-check-inline">
                                <label class="form-check-label" for="jefe">
                                    <input type="radio" class="form-check-input" id="jefe" name="txtJefeFamiliar" value="SI" checked>Si
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="jefe2">
                                    <input type="radio" class="form-check-input" id="jefe2" name="txtJefeFamiliar" value="NO">No
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Hijos</div>
                            </div>
                        <input placeholder="Cantidad" min="0" type="number" class="form form-control" name="txtHijos" >
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Oficio</div>
                            </div>
                        <input placeholder="Profesion/Oficio" type="text" class="form form-control" name="txtOficio" >
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-6 col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Discapacidad</div>
                            </div>
                        <input placeholder="-" type="number" class="form form-control" name="txtDiscapacidad" >
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-8">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Contacto">Siguiente</button>    
                    </div>
                    
                </div>
                
                    <!-- The Modal -->
                <div class="modal fade" id="Contacto">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Contacto</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div> 

            </form>

        </section>
                
                
                
                <!-- Button trigger modal -->

        <script src="../Js/jquery.js"></script>        
        <script src="../Js/bootstrap.js"></script>

    </body>
</html>