<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALFABETIZATEC - Login</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/login.css">

</head>

<body>

    <header>
        <img src="../assets/img/logotipos/sep.png" alt="Logotiopo SEP">
        <img src="../assets/img/logotipos/TecNM_Azteca.png" alt="Logotiopo TecNM">
        <img src="../assets/img/logotipos/inea_blanco.png" alt="Logotiopo Inea">
    </header>
    <main>
        <div class="decorador"></div>

        <div class="container_form">
            <!-- Formulario de login -->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" required value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>">

                <label for="contra">contra:</label>
                <input type="password" id="contra" name="contra" required value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['contra']) : ''; ?>">


                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>


        <div class="decorador"></div>


    </main>
    <footer></footer>



    <footer>
        <p>&copy; 2024 ALFABETIZATEC</p>
    </footer>

    <?php
    // Inicializar el correo ingresado por el usuario
    $correo = "";

    // Si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el correo del formulario
        $correo = $_POST["correo"];

        // Redirigir según el correo electrónico ingresado
        session_start();
        $_SESSION['correo'] = $correo;  // Guardar el correo en la sesión

        // Redirección según el correo del usuario
        if ($correo == 'yimmi.quintan@example.com') {
            header("Location: coordinador_programa.php");  // Redirigir a coordinador programa
        } elseif ($correo == 'ramon.jimenez_lopez@example.com') {
            header("Location: coordinador_nacional.php");  // Redirigir a coordinador nacional
        } elseif ($correo == 'hugo.agaton@example.com') {
            header("Location: coordinador_regional.php");  // Redirigir a coordinador regional
        } else {
            echo "<script>alert('Correo no reconocido. Acceso denegado.');</script>";
        }
    }
    ?>
</body>

</html>