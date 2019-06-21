<?php
  session_start();

  if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
  }

  require "funciones/funciones.php";
  require "funciones/gets.php";

  $conexion = abrirConexion();

  $records = $conexion->prepare('SELECT * FROM `usuario` WHERE `idUsuario`=:idUsuario');
  $records->bindParam(':idUsuario', $_SESSION['idUsuario']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0) {
    $usuario = $results;
  }
?>

<?php
  $recordsPosts = $conexion->query("SELECT * FROM `post` ORDER BY fechaInicio DESC");
?>

<?php
  $getFunction = new getFunction($conexion);
?>
<html lang="es">

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

    a:hover {
      text-decoration: none;
    }

    .btn {
      transition: all .2s linear;
      -webkit-transition: all .2s linear;
      -moz-transition: all .2s linear;
      -o-transition: all .2s linear;
    }

    .btn-read-more {
      padding: 5px;
      text-align: center;
      border-radius: 0px;
      display: inline-block;
      border: 2px solid #662D91;
      text-decoration: none;
      text-transform: uppercase;
      font-weight: bold;
      font-size: 12px;
      color: #662D91;
    }

    .btn-read-more:hover {
      color: #FFF;
      background: #662D91;
    }

    .post {
      border-bottom: 1px solid #DDD
    }

    .post-title {
      color: #662D91;
    }

    .post .glyphicon {
      margin-right: 5px;
    }

    .post-header-line {
      border-top: 1px solid #DDD;
      border-bottom: 1px solid #DDD;
      padding: 5px 0px 5px 15px;
      font-size: 12px;
    }

    .post-content {
      padding-bottom: 15px;
      padding-top: 15px;
    }

    body {
      background: #F1F3FA;
    }

    .profile {
      margin: 20px 0;
    }

    .profile-sidebar {
      padding: 20px 0 10px 0;
      background: #fff;
    }

    .profile-userpic img {
      float: none;
      margin: 0 auto;
      width: 50%;
      height: 50%;
      -webkit-border-radius: 50% !important;
      -moz-border-radius: 50% !important;
      border-radius: 50% !important;
    }

    .profile-usertitle {
      text-align: center;
      margin-top: 20px;
    }

    .profile-usertitle-name {
      color: #5a7391;
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 7px;
    }

    .profile-usertitle-job {
      text-transform: uppercase;
      color: #5b9bd1;
      font-size: 12px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .profile-userbuttons {
      text-align: center;
      margin-top: 10px;
    }

    .profile-userbuttons .btn {
      text-transform: uppercase;
      font-size: 11px;
      font-weight: 600;
      padding: 6px 15px;
      margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
      margin-right: 0px;
    }

    .profile-usermenu {
      margin-top: 30px;
    }

    .profile-usermenu ul li {
      border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
      border-bottom: none;
    }

    .profile-usermenu ul li a {
      color: #93a3b5;
      font-size: 14px;
      font-weight: 400;
    }

    .profile-usermenu ul li a i {
      margin-right: 8px;
      font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
      background-color: #fafcfd;
      color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
      border-bottom: none;
    }

    .profile-usermenu ul li.active a {
      color: #5b9bd1;
      background-color: #f6f9fb;
      border-left: 2px solid #5b9bd1;
      margin-left: -2px;
    }

    .profile-content {
      padding: 20px;
      background: #fff;
      min-height: 460px;
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
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
  <link href="" rel="stylesheet" id="bootstrap-css">
  <script src=""></script>
  <script src=""></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <!-- Post Entries -->
        <?php while($resultsPosts = $recordsPosts->fetch(PDO::FETCH_ASSOC)): ?>
          <div class="row post-entry">
            <div class="col-md-12 post">
              <div class="row">
                <div class="col-md-12">
                  <h4>
                    <strong><a href="" class="post-title"><?=$resultsPosts["titulo"]?></a></strong>
                  </h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 post-header-line">
                  <span class="glyphicon glyphicon-user"></span>by <a href="#"><?=$getFunction->getNombreUsuario($resultsPosts["Usuario_idUsuario"])?></a> | <span
                    class="glyphicon glyphicon-calendar">
                  </span><?=$resultsPosts["fechaInicio"]?>| <span class="glyphicon glyphicon-comment"></span><a href="#">
                    Comments</a>
                </div>
              </div>
              <div class="row post-content">
                <div class="col-md-3">
                  <a href="#">
                    <img src="Img/GC.jpg" style="display: block; height: 150px ; width: 150px " alt=""
                      class="img-responsive">
                  </a>
                </div>
                <div class="col-md-9">
                  <p>
                    <ul class="list-group list-group-flush">
                      <li> Evento: <?=$getFunction->getNombreTipo($resultsPosts["Tipo_idTipo"])?></li>
                      <li> Descripción: <?=$resultsPosts["descripcion"]?> </li>
                      <li> Dirección: <?=$resultsPosts["direccion"]?> </li>
                    </ul>

                  </p>
                  <p>
                    <a class="btn btn-read-more" href="blog.php?Post_idPost=<?=$resultsPosts["idPost"]?>">Read more</a></p>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      </div>

      <div class="col-md-3">
        <div class="container">
          <div class="row profile">

            <div class="profile-sidebar">

              <div class="profile-userpic">
                <img src="Img/GC.jpg" style="display: block; height: 200px ; width: 200px ">
              </div>
              <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                  <?=$usuario["nombre"]?> <?=$usuario["apellido"]?>
                </div>
                <div class="profile-usertitle-job">
                  College Student
                </div>
              </div>

              <div class="profile-usermenu">
                <ul class="nav">
                  <li class="active">
                    <a href="#">
                      <i class="glyphicon glyphicon-home"></i>
                      Overview </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="glyphicon glyphicon-user"></i>
                      Account Settings </a>
                  </li>
                  <li>
                    <a href="#" target="_blank">
                      <i class="glyphicon glyphicon-ok"></i>
                      Tasks </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="glyphicon glyphicon-flag"></i>
                      Help </a>
                  </li>
                </ul>
              </div>
            </div>


          </div>
        </div>
        <a class="btn btn-success" href="crear_post.php" style=" margin-left: 7% ">Post</a>
        <a class="btn btn-danger" href="logout.php" style=" margin-left: 7% ">Cerrar Sesion</a>
        <br>
        <br>
