<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM veterinario WHERE Nombre = '$usernameemail' OR correo = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: ../Inicio/Página.html");
    }
    else{
      echo
      "<script> alert('Contraseña Incorrecta'); </script>";
    }
  }
  else{
    echo
    "<script> alert('Usuario no registrado'); </script>";
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
    <title>Iniciar Sesión</title>
  </head>
  <body>
  <nav  class="navbar navbar-inverse shadow p-3 mb-5" style="background-color:#031926; height:80px;">
        <form class="container-fluid" style="position:absolute;">
    
            <ul class="nav" style="width: 80%; margin-right: 2%;">
                <a style="color: white;" class="navbar-brand" href="Inicio/Página.html">Veterinaria</a>
                <li><a style="color: #cdcdcd;" class="nav-item nav-link" href="../Inicio/Página.html">Inicio</a></li>
            </ul>
            <a href="login.php"><button class="btn btn-success me-2" type="button" id="IniciaSesion">Iniciar sesión</button></a>
        </form>
    </nav>

    <div class="contenedor">
    <h2>Iniciar Sesión</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">
      <img width="25px" src="ICONS/User.svg" alt="">
        Nombre o Email : 
      </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">
      <img width="25px" src="ICONS/Key.svg" alt="">
        Contraseña : 
      </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Inicia Sesion</button>
    </form>
    <br>
    <a href="registration.php">Registro</a>
    </div>
  </body>
</html>
