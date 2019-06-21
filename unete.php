<?php

require 'funciones/funciones.php';

$message = "";
$type = "";


if(isset($_POST["nombre"])) {

    $conexion = abrirConexion();

    $sql = "INSERT INTO `gc`.`usuario` (`nombre`, `apellido`, `fechaNacimiento`, `direccion`, `email`, `password`) VALUES (:nombre, :apellido, :fechaNacimiento, :direccion, :email, :password)";

    $stmt = $conexion->prepare($sql);

    $stmt->bindParam(":nombre", $_POST["nombre"]);
    $stmt->bindParam(":apellido", $_POST["apellido"]);
    $stmt->bindParam(":fechaNacimiento", $_POST["fechaNacimiento"]);
    $stmt->bindParam("direccion", $_POST["direccion"]);
    $stmt->bindParam(":email", $_POST["email"]);
    $stmt->bindParam(":password", $_POST["password"]);

    if ($stmt->execute()) {
        $message = "Se ha creado un nuevo usuario satisfactorimente, ingrese <a href='login.php'>aqui</a>";
        $type = "success";
    } else {
        $message = "Hubo un problemas al crear el usuario";
        $type = "danger";
    }
}

 ?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- llamado de los archivos bootstrap de css y js -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- titulo en la pestaña de la pagina -->
    <title>Green & Clean</title>
    <style>
        div.a {
            text-align: center;
        }

        div.b {
            text-align: center;
            position: relative;
            top: 50%;
            -ms-transform: translateY(50%);
            -webkit-transform: translateY(-50%);
            transform: translateY(100%);
        }

        body {
            background: #F1F3FA;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #abebc6;">
        <a class="navbar-brand" href="#">
            <img src="img/GC.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Green & Clean
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Donar.php">Donar</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nosotros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="mision.php">Misión y Visión</a>
                        <a class="dropdown-item" href="somos.php">¿Quiénes somos?</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contáctanos</a>
                </li>
            </ul>

        </div>
    </nav>
    <?php if (!empty($message)): ?>

            <div class="alert alert-<?=$type?> alert-dismissible fade show" role="alert">
                <?=$message?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

    <?php endif; ?>
    <!-- FORMULARIO -->
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="form-group">
            <div class="a">
                <label for="exampleFormControlInput1" style="margin-top: 1%">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" style="width: 30% ; margin-left:35%">
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="exampleFormControlInput1">Apellidos</label>
                <input type="text" name="apellido" class="form-control" placeholder="Apellidos" style="width: 30% ; margin-left:35%">
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="exampleFormControlInput1">Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="Dirección" style="width: 30% ; margin-left:35%">
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="name@example.com" style="width: 30% ; margin-left:35%">
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="exampleFormControlSelect2">Año de nacimiento</label>
                <input type="date" name="fechaNacimiento" class="form-control" style="width: 30% ; margin-left:35%">
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="exampleInputPassword1">Password</label>
            </div>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width: 30% ; margin-left:35%">
        </div>
        <input type="submit" name="" value="Submit" class="btn btn-success" style="margin-left:35%">
    </form>
    <img src="Img/GC.jpg" style="display: block; margin-left: 40% ; height: 300px ; width: 300px ">
