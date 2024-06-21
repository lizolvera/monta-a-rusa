<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Una Montaña Rusa</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

    <h2>Formulario de Validación para la Montaña Rusa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="altura">Altura (en cm, mínimo 120):</label>
        <input type="text" id="altura" name="altura" pattern="\d+" title="Por favor, ingrese un número válido" required>
        <br><br>
        <label for="edad">Edad (mínimo 16 años):</label>
        <input type="number" id="edad" name="edad" min="16" required>
        <br><br>
        <label>¿Rechaza llevarnos a juicio por daños y perjuicios de un mal mantenimiento?</label><br>
        <input type="radio" id="rechazo_si" name="rechazo" value="si" required>
        <label for="rechazo_si">Sí</label><br>
        <input type="radio" id="rechazo_no" name="rechazo" value="no" required>
        <label for="rechazo_no">No</label>
        <br><br>
        <input type="submit" name="submit" value="Validar">
      </form>

      <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $altura = $_POST["altura"];
        $edad = $_POST["edad"];
        $rechazo = $_POST["rechazo"];
        $errors = [];

        if ($altura < 120) {
            $errors[] = "La altura debe ser mayor o igual a 120 cm.";
        }

        if ($edad < 16) {
            $errors[] = "La edad debe ser mayor o igual a 16 años.";
        }

        if ($rechazo !== "si") {
            $errors[] = "Debe rechazar llevarnos a juicio por daños y perjuicios.";
        }

        if (empty($errors)) {
            echo "<h3>Ticket Aprobado</h3>";
            echo "<p>¡Felicidades! Cumple con todos los requisitos para montar la Montaña Rusa.</p>";
            echo "<img src='ruta/a/imagen_del_ticket.jpg' alt='Ticket'>";
        } else {
            echo "<h3>Errores de Validación</h3>";
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
    }
    ?>


    
</body>
</html>