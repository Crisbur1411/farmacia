<?php
require_once('Models/conexion_BD.php'); // Incluir el archivo de conexión

// Crear una instancia de la clase Conexion para obtener la conexión a la base de datos
$conexion = new Conexion();

// Obtener la conexión
$db = $conexion->obtenerConexion();

// Verificar si se ha enviado el formulario y procesar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí puedes procesar los datos del formulario, como el inicio de sesión o registro de usuarios
}

// Cerrar la conexión al finalizar el script
$conexion->cerrarConexion();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./Views/index.css'>
    <script src='main.js'></script>
</head>
<body>
    
    <div class="wrapper">
        <!-- Div de Contenedor de imagen -->
        <div class="logo">
            <img src="./Imagenes/logo.png" alt="">
        </div>
        <!-- Texto de entrada -->
        <div class="text-center mt-4 name">
          <center>Bienvenido</center>  
        </div>
        <form class="p-3 mt-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Caja de texto para usuario -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="Usuario">
            </div>
            <!-- Caja de texto para contraseña -->
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Contraseña">
            </div>
            <!-- Botones dentro de formulario -->
            <button class="btn mt-3">Iniciar</button>
            <br><br>
            <button class="btn mt-3">Registrarse</button>
        </form>
    </div>
</body>
</html>