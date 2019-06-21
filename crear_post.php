<?php
    session_start();

    if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    }

    require "funciones/funciones.php";
    require "funciones/gets.php";

    $conexion = abrirConexion();

?>

<?php
    if (isset($_POST["titulo"])) {
        $sql = "INSERT INTO `gc`.`post` (`titulo`, `descripcion`, `Tipo_idTipo`, `Usuario_idUsuario`, `fechaInicio`, `fechaFin`, `direccion`) VALUES (:titulo, :descripcion, :Tipo_idTipo, :Usuario_idUsuario, :fechaInicio, :fechaFin, :direccion)";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(":titulo",$_POST["titulo"]);
        $stmt->bindParam(":descripcion",$_POST["descripcion"]);
        $stmt->bindParam(":Tipo_idTipo",$_POST["Tipo_idTipo"]);
        $stmt->bindParam(":Usuario_idUsuario",$_SESSION["idUsuario"]);
        $stmt->bindParam(":fechaInicio",$_POST["fechaInicio"]);
        $stmt->bindParam(":fechaFin",$_POST["fechaFin"]);
        $stmt->bindParam(":direccion",$_POST["direccion"]);

        if ($stmt->execute()) {
            header("Location: blog.php");
        } else {
            echo "<h1>Hubo un error</h1>";
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
                    <a class="nav-link" href="donar.php">Donar</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <!-- FORM SECTION -->
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="form-group">
            <div class="a">
                <label for="" style="margin-top: 1%">Titulo</label>
                <input type="text" name="titulo" class="form-control" placeholder="Nombre" style="width: 30% ; margin-left:35%" required>
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="">Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" style="width: 30% ; margin-left:35%" required>
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="">Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="Dirección" style="width: 30% ; margin-left:35%" required>
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="">Tipo de evento</label>
                <select name="Tipo_idTipo" id="" class="form-control" style="width: 30% ; margin-left:35%" required>
                    <option value="1">Campaña de reciclaje</option>
                    <option value="2">Recojo de basura</option>
                    <option value="3">Limpieza zona contaminada</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="">Fecha de Inicio</label>
                <input type="date" name="fechaInicio" class="form-control" style="width: 30% ; margin-left:35%" required>
            </div>
        </div>
        <div class="form-group">
            <div class="a">
                <label for="exampleFormControlSelect2">Fecha de Fin</label>
                <input type="date" name="fechaFin" class="form-control" style="width: 30% ; margin-left:35%" required>
            </div>
        </div>
        <input type="submit" name="" value="Submit" class="btn btn-success" style="margin-left:35%">
    </form>
</body>

</html>