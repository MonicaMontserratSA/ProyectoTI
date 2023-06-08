<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: Index.php");
}
if(isset($_POST["submit"])){
  //$name = $_POST["name"];
  $username = $_POST["username"];
  $apellido = $_POST["apellido"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $direccion = $_POST["direccion"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM propietarios WHERE nombre = '$username' OR correo = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Nombre de usuario o correo ya estan registrados'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO propietarios VALUES('','$username','$apellido','$email','$phone','$direccion','$password','')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registro exitoso'); </script>";
    }
    else{
      echo
      "<script> alert('Las contrseñas no son compatibles'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Registro</title>
  </head>
  <body>
  <nav  class="navbar navbar-inverse shadow p-3 mb-5" style="background-color:#031926; height:80px;">
        <form class="container-fluid" style="position:absolute;">
    
            <ul class="nav" style="width: 80%; margin-right: 2%;">
                <a style="color: white;" class="navbar-brand" href="Inicio/Página.html">Veterinaria</a>
                <li><a style="color: #cdcdcd;" class="nav-item nav-link" href="../Inicio/Página.html">Inicio</a></li>
            </ul>
            <a href="Login.php"><button class="btn btn-success me-2" type="button" id="IniciaSesion">Iniciar sesión</button></a>
        </form>
    </nav>
    <div class="contenedor">
    <h2>Registro</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="name">
      <img width="25px" src="ICONS/User.svg" alt="">
        Nombre : 
      </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <label for="name">
      <img width="25px" src="ICONS/User.svg" alt="">
        Apellido : 
      </label>
      <input type="text" name="apellido" id = "apellido" required value=""> <br>
      <label for="email">
      <img width="25px" src="ICONS/mail.svg" alt="">
        Email : 
      </label>
      <input type="email" name="email" id = "email" required value=""> <br>
      <label for="phone">
      <img width="25px" src="ICONS/phone.svg" alt="">
        Telefono : 
      </label>
      <input type="text" name="phone" id = "phone" required value=""> <br>
      <label for="direccion">
      <img width="25px" src="ICONS/map.svg" alt="">
        Direccion : 
      </label>
      <input type="text" name="direccion" id = "direccion" required value=""> <br>
      <label for="password">
      <img width="25px" src="ICONS/key.svg" alt="">
        Contraseña : 
      </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">
      <img width="25px" src="ICONS/key.svg" alt="">
        Confirmar Contraseña : 
      </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Registrar</button>
    </form>
    <br>
    <a href="login.php">Iniciar Sesión</a>
</div>
  </body>
</html>
