<?php
    session_start();

    if (isset($_SESSION['idUsuario'])) {
        header('Location: blog.php');
    }

    require "funciones/funciones.php";

    $conexion = abrirConexion();

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        // Preparando la consulta para extraer los datos de la bd
        $records = $conexion->prepare("SELECT `idUsuario`,`email`, `password` FROM `usuario` WHERE `email` = :email;");
        $records->bindParam(":email", $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && $results["password"]==$_POST["password"]) {
            $_SESSION['idUsuario'] = $results['idUsuario'];
            header("Location: blog.php");
        } else {
            $message = 'Sorry, Email o contraseña incorrectos';
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
    <img src="Img/GC.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
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
<h1 class="text-center"> Ingresa a tu cuenta </h1>

<!-- FORMULARIO -->
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" >
  <div class="form-group">
    <div class="a" >
    <label for="exampleFormControlInput1" style="margin-top: 1%">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" style="width: 30% ; margin-left:35%">
    </div>
  </div>

  <div class="form-group">
    <div class="a" >
    <label for="exampleInputPassword1">Password</label>
    </div>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width: 30% ; margin-left:35%">
  </div>
   <input type="submit" name="submit" value="Login" class="btn btn-success" style="margin-left:35%">
</form>
<img  src="Img/GC.jpg" style="display: block; margin-left: 40% ; height: 300px ; width: 300px ">
