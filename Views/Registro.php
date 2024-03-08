<?php
require_once('../Models/conexion_BD.php'); // Incluir el archivo de conexión

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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="./Registro.css">
</head>
<body>
    <div class="registration-form">
        <form>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="Nombre" placeholder="Nombre(s)" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="A_paterno" placeholder="Apellido paterno" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="A_materno" placeholder="Apellido materno" required>
            </div>
            <div class="form-group">
                <!-- Input de fecha de nacimiento con selector -->
                <input type="text" class="form-control item" id="F_N" placeholder="Fecha de Nacimiento" readonly>
            </div>
            <div class="form-group">
                <!-- Input de teléfono con validación de longitud y solo números -->
                <input type="tel" class="form-control item" id="Telefono" placeholder="Telefono" maxlength="10" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="Usuario" placeholder="Usuario">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="A_paterno" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-block create-account">Crear cuenta</button>
            </div>
        </form>
        <div class="social-media">
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="./Registro.js"></script>
    <script>
        // Activar el selector de fecha
        $( function() {
            $( "#F_N" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0", // Rango de años permitidos
                dateFormat: "dd/mm/yy", // Formato de fecha (día/mes/año)
                onClose: function(selectedDate) {
                    // Reducir el año a los dos últimos dígitos
                    var dateParts = selectedDate.split('/');
                    var year = dateParts[2].substring(2);
                    $( "#F_N" ).val(dateParts[0] + '/' + dateParts[1] + '/' + year);
                }
            });
        });

        // Validar que los campos de nombre y apellidos solo contengan letras
        $('#Nombre, #A_paterno, #A_materno').on('input', function() {
            var sanitized = $(this).val().replace(/[^A-Za-zñÑáéíóúÁÉÍÓÚ\s]/g, '');
            $(this).val(sanitized);
        });

        // Validar que el campo de teléfono solo acepte números y tenga una longitud de 10 dígitos
        $('#Telefono').on('input', function() {
            var sanitized = $(this).val().replace(/\D/g, '');
            sanitized = sanitized.substring(0, 10);
            $(this).val(sanitized);
        });
    </script>
</body>
</html>