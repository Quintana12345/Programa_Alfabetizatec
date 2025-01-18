<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALFABETIZATEC - Login</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('../assets/img/logos/image.png') no-repeat center center;
            background-size: cover;
            background-position: center 50%;
            background-attachment: fixed;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
        }

        header {
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        footer {
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #0044cc;
            padding: 40px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #0044cc;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #0044cc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0033aa;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
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

        <!-- Formulario de login -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>">

            <label for="contra">contra:</label>
            <input type="password" id="contra" name="contra" required value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['contra']) : ''; ?>">


            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>


    <footer>
        <p>&copy; 2024 ALFABETIZATEC</p>
    </footer>
</body>

</html>