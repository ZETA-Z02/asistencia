<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      background-image: url('../img/fondo.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      font-family: Arial, sans-serif;
    }

    .login {
      width: 300px;
      margin: 200px auto;
      background-color:;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
    }

    .login img {
      max-width: 100%;
      height: auto;
    }

    .login h1 {
      font-size: 24px;
      margin-top: 20px;
    }

    .login h2 {
      font-size: 16px;
      margin-top: 20px;
    }

    .login input[type="text"],
    .login input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .login button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }

    .login button:hover {
      background-color: #45a049;
    }

    .login a {
      display: block;
      margin-top: 10px;
      color: #999;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <center>
    <form action="../controller/loguin.controller.php" method="post" >
      <div class="login">
        <img src="../img/logoindex3.png" alt="Image">
        <h1>Bienvendo a la Empresa de Trasporte</h1>
        <br>
        <br>
        <h2>La Empresa brinda servicios a los clientes de diferentes lugares</h2>
        <input type="text" name="usuario" placeholder="Usuario">
        <br>
        <br>
        <input type="password" name="password" placeholder="Contraseña">
        <br>
        <br>
        <button type="submit" href="">Iniciar Sesión</button>
        <button type="submit" href="">Registrarse</button>
        <br>
        <br>
        <a href="#">¿Olvidaste tu Contraseña?</a>
      </div>
    </form>
  </center>
</body>
</html>
