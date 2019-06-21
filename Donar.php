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
        <a class="nav-link" href="donar.php">Donar</a>
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
<a class="btn btn-success" href="unete.php">Únete</a>
  </div>
</nav>
  <body>
<form>
  <div class="form-group">

      <label for="inputEmail4" style="width: 30% ; margin-left:35%" >Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" style="width: 30% ; margin-left:35%">

     <div class="form-group">

      <label for="inputPassword4" style="width: 30% ; margin-left:35%">Card Number</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Card Number" style="width: 30% ; margin-left:35%">

     </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity" style="width: 30% ; margin-left:70%">CVC Code</label>
      <input type="text" class="form-control" id="inputCity" style="width: 15% ; margin-left:70%">
    </div>
    <div class="form-group col-md-4">

         <label for="inputCity" style="width: 30%">Expiration Date</label>
      <input type="text" class="form-control" id="inputCity" style="width: 50% ">
    </div>
   </div>
  </div>
  <div class="form-group">

    <label for="inputAddress"  style="width: 30% ; margin-left:35%">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" style="width: 30% ; margin-left:35%">

    </div>
  <div class="form-group">

    <label for="inputAddress2"  style="width: 30% ; margin-left:35%">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" style="width: 30% ; margin-left:35%">

   </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity" style="width: 30% ; margin-left:70%">City</label>
      <input type="text" class="form-control" id="inputCity" style="width: 25% ; margin-left:70%">
    </div>
    <div class="form-group col-md-4">

      <label for="inputState">State</label>
      <select id="inputState" class="form-control" style="width: 50% ">
        <option selected>Choose...</option>
        <option>...</option>
      </select>

   </div>
  </div>
     <div class="form-group">

      <label for="inputZip" style="width: 30% ; margin-left:35%">Zip</label>
      <input type="text" class="form-control" id="inputZip" style="width: 30% ; margin-left:35%">

       </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" style=" margin-left:35%" >
      <label class="form-check-label" for="gridCheck" style="width: 50% ; margin-left:38%">
        Check me out
      </label>
    </div>
  </div>
   <a class="btn btn-success" href="" style="margin-left:35%">Submit</a>
</form>
  </body>
