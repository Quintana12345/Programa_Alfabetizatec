<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: #0056b3;
        }

        .message {
            padding: 10px;
            margin: 20px 0;
            text-align: center;
            border-radius: 4px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <header>

    <a href="../../coordinador_programa.php" class="back">Volver</a>

    </header>
    <h1>Restablecer Contraseña</h1>
    <?php
    include '../../config/conexionDB.php';
    session_start(); // Iniciar la sesión

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $conn = Database::getConnection();
            $email = $_SESSION['correo'] ?? '';

            // Recuperar datos del formulario
            $new_password = $_POST['new_password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            // Consulta para verificar la contraseña actual
            $stmt = $conn->prepare("SELECT contrasena FROM usuarios WHERE correo = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verificar si la contraseña permite cambios
                $allowed_password = '$2y$10$L9ujKEY9UYcG9i4q1FPrU.utEYt0LXelnKMn1mG2rb8JFDPGz11sa';
                if ($user['contrasena'] === $allowed_password) {
                    if ($new_password === $confirm_password) {
                        // Generar hash de la nueva contraseña
                        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                        // Actualizar contraseña
                        $update_stmt = $conn->prepare("UPDATE usuarios SET contrasena = ? WHERE correo = ?");
                        $update_stmt->bind_param("ss", $hashed_password, $email);

                        if ($update_stmt->execute()) {
                            echo "<p>Contraseña actualizada con éxito.</p>";
                        } else {
                            echo "<p>Error al actualizar la contraseña.</p>";
                        }
                        $update_stmt->close();
                    } else {
                        echo "<p>Las contraseñas no coinciden. Inténtalo de nuevo.</p>";
                    }
                } else {
                    echo "<p>Ya no se permite cambiar la contraseña.</p>";
                }
            } else {
                echo "<p>El correo institucional no está registrado.</p>";
            }
            $stmt->close();
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    }

    ?>
    <form method="POST" action="">
        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" id="new_password" name="new_password" required>

        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">Restablecer Contraseña</button>
    </form>
</body>

</html>