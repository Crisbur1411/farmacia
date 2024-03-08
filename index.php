<?php
require_once('Models/conexion_BD.php'); // Incluir el archivo de conexión

// Crear una instancia de la clase Conexion para obtener la conexión a la base de datos
$conexion = new Conexion();

// Obtener la conexión
$db = $conexion->obtenerConexion();

// Inicializar la variable de mensaje de error
$mensaje_error = "";

// Verificar si se ha enviado el formulario y procesar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que se hayan enviado los campos de usuario y contraseña
    if(isset($_POST["userName"]) && isset($_POST["password"])) {
        // Obtener los valores de usuario y contraseña enviados por el formulario
        $usuario = $_POST["userName"];
        $contraseña = $_POST["password"];
        
        // Consulta SQL para verificar si el usuario y la contraseña existen en la base de datos
        $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contrasena = '$contraseña'";
        
        // Ejecutar la consulta
        $resultado = $db->query($consulta);
        
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Usuario y contraseña válidos, redireccionar a la página de inicio de sesión exitosa o realizar otras acciones
            header("Location: Views/Registro.html");
            exit();
        } else {
            // Usuario o contraseña inválidos, establecer el mensaje de error
            $mensaje_error = "Usuario o contraseña incorrectos";
        }
    }
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
    <style>
        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
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
        <!-- Mostrar mensaje de error si existe -->
        <?php if(!empty($mensaje_error)): ?>
            <div class="error-message"><?php echo $mensaje_error; ?></div>
        <?php endif; ?>
        <!-- Formulario de inicio de sesión -->
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
            <button type="submit" class="btn mt-3">Iniciar</button>
            <br><br>
            <button class="btn mt-3">Registrarse</button>
        </form>
    </div>
</body>
</html>