
<?php
session_start();

require_once __DIR__ . '/includes/funciones.php';
require_once __DIR__ . '/config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. OBTENER Y NORMALIZAR EL EMAIL
    $email = strtolower(trim($_POST['email'] ?? ''));

    // Validar formato del correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico ingresado no es válido.");
    }

    // 3. VERIFICAR SI EL EMAIL YA EXISTE
    $sql_check = "SELECT COUNT(*) FROM respuestas WHERE LOWER(TRIM(email)) = ?";

    $stmt = $pdo->prepare($sql_check);
    $stmt->execute([$email]);

    $existe = (int) $stmt->fetchColumn();

    if ($existe > 0) {

        mostrarMensajeDuplicado(
            "El correo electrónico " . $email .
            " ya se encuentra registrado. No es posible enviar otra encuesta."
        );

        exit;
    }

    // 4. RECUPERAR LOS DATOS DEL FORMULARIO

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

    // 5. INSERTAR LOS DATOS

    $sql_insert = "INSERT INTO respuestas (
        institucion, carrera, email, edad, genero, departamento,
        convivencia, personas_cargo, distancia, transporte,
        situacion_laboral, relacion_laboral, ayuda_social,
        trayectoria_previa, interrupcion, impacto_laboral,
        impacto_familiar, asistencia, factor_inasistencia,
        puntualidad, dispositivo, propiedad_dispositivo,
        conexion_internet
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    try {

        $stmt_insert = $pdo->prepare($sql_insert);

        $stmt_insert->execute([
            $institucion,
            $carrera,
            $email,
            $edad,
            $genero,
            $departamento,
            $convivencia,
            $personas_cargo,
            $distancia,
            $transporte,
            $situacion_laboral,
            $relacion_laboral,
            $ayuda_social,
            $trayectoria_previa,
            $interrupcion,
            $impacto_laboral,
            $impacto_familiar,
            $asistencia,
            $factor_inasistencia,
            $puntualidad,
            $dispositivo,
            $propiedad_dispositivo,
            $conexion_internet
        ]);

        mostrarMensajeExito(
        "¡La encuesta se guardó correctamente! Gracias por participar."
        );
        exit;

    } catch (PDOException $e) {

        // No mostrar detalles internos de la base de datos al usuario
        error_log($e->getMessage());

        echo "Error al guardar la encuesta. Intente nuevamente.";
    }
}


// 6. FUNCIÓN PARA MOSTRAR MENSAJE DE EMAIL DUPLICADO

function mostrarMensajeDuplicado($mensaje) {

    $mensaje = htmlspecialchars(
        $mensaje,
        ENT_QUOTES,
        'UTF-8'
    );

    echo '
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">

        <title>Correo ya registrado</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 10000);
        </script>
    </head>

    <body class="bg-light d-flex align-items-center justify-content-center vh-100">

        <div class="card shadow p-4 text-center"
             style="max-width: 450px; width: 100%;">

            <h3 class="text-danger mb-3">
                ¡Atención!
            </h3>

            <p class="fs-5 text-secondary">
                ' . $mensaje . '
            </p>

            <p class="text-muted">
                Regresando al inicio en
                <span id="contador" class="fw-bold text-dark fs-4">10</span>
                segundos...
            </p>

            <a href="index.php" class="btn btn-primary">
                Volver al inicio
            </a>

        </div>

        <script>

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
// 7. FUNCIÓN PARA MOSTRAR MENSAJE DE REGISTRO EXITOSO

function mostrarMensajeExito($mensaje) {

    $mensaje = htmlspecialchars(
        $mensaje,
        ENT_QUOTES,
        'UTF-8'
    );

    echo '
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registro exitoso</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
              rel="stylesheet">

        <script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 10000);
        </script>

    </head>

    <body class="bg-light d-flex align-items-center justify-content-center vh-100">

        <div class="card shadow p-4 text-center"
             style="max-width: 450px; width: 100%;">

            <h3 class="text-success mb-3">
                ¡Operación exitosa!
            </h3>

            <div class="mb-3">
                <span style="font-size: 55px; color: #198754;">
                    &#10004;
                </span>
            </div>

            <p class="fs-5 text-secondary">
                ' . $mensaje . '
            </p>

            <p class="text-muted">
                Regresando al inicio en
                <span id="contador"
                      class="fw-bold text-dark fs-4">10</span>
                segundos...
            </p>

            <a href="index.php" class="btn btn-success">
                Volver al inicio
            </a>

        </div>

        <script>

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
