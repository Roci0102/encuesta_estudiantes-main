<?php
session_start();
require_once __DIR__ . '/includes/funciones.php';
require_once __DIR__ . '/config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Validar el token CSRF por seguridad
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Error de validación de seguridad.");
    }

    $email = trim($_POST['email']);

    // 2. Verificar si el correo ya está registrado en la base de datos
    $sql_check = "SELECT id FROM respuestas WHERE email = ?";
    $stmt = $pdo->prepare($sql_check);
    $stmt->execute([$email]);

    if ($stmt->fetchColumn()) {
        // EL CORREO YA EXISTE: Muestra la alerta y activa el script de 10 segundos
        mostrarMensajeDuplicado("El mail ya está registrado. Serás redirigido al inicio en 10 segundos...");
        exit;
    }

    // 3. SI EL CORREO NO EXISTE: Guardar los datos de la encuesta normalmente...
    $institucion         = $_POST['institucion'] ?? '';
    $carrera             = $_POST['carrera'] ?? '';
    $edad                = $_POST['edad'] ?? '';
    $genero              = $_POST['genero'] ?? '';
    $departamento        = $_POST['departamento'] ?? '';
    $convivencia         = $_POST['convivencia'] ?? '';
    $personas_cargo      = $_POST['personas_cargo'] ?? '';
    $distancia           = $_POST['distancia'] ?? '';
    $transporte          = $_POST['transporte'] ?? '';
    $situacion_laboral   = $_POST['situacion_laboral'] ?? '';
    $relacion_laboral    = $_POST['relacion_laboral'] ?? '';
    $ayuda_social        = $_POST['ayuda_social'] ?? '';
    $trayectoria_previa  = $_POST['trayectoria_previa'] ?? '';
    $interrupcion        = $_POST['interrupcion'] ?? '';
    $impacto_laboral     = $_POST['impacto_laboral'] ?? '';
    $impacto_familiar    = $_POST['impacto_familiar'] ?? '';
    $asistencia          = $_POST['asistencia'] ?? '';
    $factor_inasistencia = $_POST['factor_inasistencia'] ?? '';
    $puntualidad         = $_POST['puntualidad'] ?? '';
    $dispositivo         = $_POST['dispositivo'] ?? '';
    $propiedad_dispositivo = $_POST['propiedad_dispositivo'] ?? '';
    $conexion_internet   = $_POST['conexion_internet'] ?? '';

    $sql_insert = "INSERT INTO respuestas (institucion, carrera, email, edad, genero, departamento, convivencia, personas_cargo, distancia, transporte, situacion_laboral, relacion_laboral, ayuda_social, trayectoria_previa, interrupcion, impacto_laboral, impacto_familiar, asistencia, factor_inasistencia, puntualidad, dispositivo, propiedad_dispositivo, conexion_internet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt_insert = $pdo->prepare($sql_insert);
    try {
        $stmt_insert->execute([
        $institucion, $carrera, $email, $edad, $genero, $departamento, $convivencia, 
        $personas_cargo, $distancia, $transporte, $situacion_laboral, $relacion_laboral, 
        $ayuda_social, $trayectoria_previa, $interrupcion, $impacto_laboral, 
        $impacto_familiar, $asistencia, $factor_inasistencia, $puntualidad, 
        $dispositivo, $propiedad_dispositivo, $conexion_internet
        ]);
        $_SESSION['mensaje_exito'] = "¡Encuesta enviada con éxito!";
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al guardar la encuesta: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }
}

// Función que dibuja la alerta visual y maneja el temporizador de JavaScript por 10 segundos
function mostrarMensajeDuplicado($mensaje) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Correo ya registrado</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script>
            // Redirección automática utilizando JavaScript tras 10000 ms (10 segundos)
            setTimeout(function() {
                window.location.href = "index.php";
            }, 10000); 
        </script>
    </head>
    <body class="bg-light d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow p-4 text-center" style="max-width: 450px; width: 100%;">
            <h3 class="text-danger mb-3">¡Atención!</h3>
            <p class="fs-5 text-secondary">' . htmlspecialchars($mensaje) . '</p>
            <p class="text-muted">Regresando al inicio en <span id="contador" class="fw-bold text-dark fs-4">10</span> segundos...</p>
        </div>
        <script>
            // Cuenta regresiva visual dinámica con JavaScript
            let segundos = 10;
            let intervalo = setInterval(function() {
                segundos--;
                document.getElementById("contador").innerText = segundos;
                if (segundos <= 0) {
                    clearInterval(intervalo);
                }
            }, 1000);
        </script>
    </body>
    </html>
    ';
}
?>