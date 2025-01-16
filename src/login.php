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
            background: url('logos/image.png') no-repeat center center;
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

        input, select {
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
    <header>
        <h1>Iniciar sesión</h1>
    </header>

    <div class="login-container">
        <?php
            include('conexion.php');  // Asegúrate de que la conexión se haya establecido correctamente

            // Inicializar variables y errores
            $curpErr = $passwordErr = $roleErr = "";
            $curp = $password = $role = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Validación CURP
                if (empty($_POST["curp"]) || !preg_match("/^[A-Z0-9]{18}$/", $_POST["curp"])) {
                    $curpErr = "CURP inválido. Debe contener 18 caracteres alfanuméricos.";
                } else {
                    $curp = $_POST["curp"];
                }

                // Validación Contraseña (8 números)
                if (empty($_POST["password"]) || !preg_match("/^\d{8}$/", $_POST["password"])) {
                    $passwordErr = "La contraseña debe contener exactamente 8 números.";
                } else {
                    $password = $_POST["password"];
                }

                // Validación del Rol
                if (empty($_POST["role"])) {
                    $roleErr = "Por favor seleccione un rol.";
                } else {
                    $role = $_POST["role"];
                }

                // Si no hay errores, procesar el login
                if (empty($curpErr) && empty($passwordErr) && empty($roleErr)) {
                    // Preparar la consulta SQL
                    $sql = "SELECT * FROM usuarios WHERE curp = ? AND contraseña = ? AND rol = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $curp, $password, $role);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Verificar si el usuario existe
                    if ($result->num_rows > 0) {
                        // Obtener los datos del usuario
                        $user = $result->fetch_assoc();
                        // Redirigir según el rol
                        session_start();
                        $_SESSION['nombre'] = $user['nombre'];
                        $_SESSION['rol'] = $user['rol'];

                        if ($user['rol'] == 'coordinador_general') {
                            header("Location: catalogo.php");  // Redirigir al coordinador general
                        } elseif ($user['rol'] == 'coordinador_tecnologico') {
                            header("Location: coordinador_tecnologico.php");  // Redirigir al coordinador tecnológico
                        } elseif ($user['rol'] == 'participante') {
                            header("Location: participante.php");  // Redirigir al catálogo
                        } else {
                            echo "<p>Rol desconocido. Acceso denegado.</p>";
                        }
                    } else {
                        echo "<p>CURP o contraseña incorrectos.</p>";
                    }

                    $stmt->close();
                }
            }
        ?>

        <!-- Formulario de login -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="curp">CURP:</label>
            <input type="text" id="curp" name="curp" required pattern="[A-Z0-9]{18}" maxlength="18" value="<?php echo isset($_POST['curp']) ? htmlspecialchars($_POST['curp']) : ''; ?>">
            <span class="error"><?php echo $curpErr; ?></span>

            <label for="password">Contraseña (8 números):</label>
            <input type="text" id="password" name="password" required maxlength="8" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" oninput="validateNumberInput(event)">
            <span class="error"><?php echo $passwordErr; ?></span>

            <label for="role">Rol:</label>
            <select id="role" name="role" required>
                <option value="">Seleccione un rol</option>
                <option value="coordinador_general" <?php if (isset($role) && $role == "coordinador_general") echo "selected"; ?>>Coordinador General</option>
                <option value="coordinador_tecnologico" <?php if (isset($role) && $role == "coordinador_tecnologico") echo "selected"; ?>>Coordinador Tecnológico</option>
                <option value="participante" <?php if (isset($role) && $role == "participante") echo "selected"; ?>>Participante</option>
            </select>
            <span class="error"><?php echo $roleErr; ?></span>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 ALFABETIZATEC</p>
    </footer>
</body>
</html>
