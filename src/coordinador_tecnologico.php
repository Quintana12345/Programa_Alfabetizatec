<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador Tecnológico</title>
    <style>
        .menu-button {
            font-size: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;

        }

        #menu {
            position: absolute;
            top: 90px;
            left: 10px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #menu ul li {
            margin: 0;
            padding: 10px;
        }

        #menu ul li a {
            text-decoration: none;
            color: black;
        }

        #menu ul li:hover {
            background-color: #f0f0f0;
        }

        .hidden {
            display: none;
        }

        .visible {
            display: absolute;
            z-index: 99999999;
        }



        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding-top: 70px;
            background-image: url('logos/Tec.1-removebg-preview.png');
            background-size: 70%;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }



        .back-button {
            background-color: white;
            color: #007BFF;
            border: 2px solid white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, color 0.3s;
            position: absolute;
            left: 20px;
        }

        .back-button:hover {
            background-color: #0056b3;
            color: white;
        }


        header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 10px;

            width: 100%;
        }


        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
            box-sizing: border-box;
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .form-box {
            width: 48%;
        }

        .form-container h2 {
            font-size: 1.8em;
            margin-bottom: 30px;
            color: #007BFF;
            text-align: center;
            width: 100%;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-spacing: 0;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        td input,
        td select {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        td input:focus,
        td select:focus {
            border-color: #007BFF;
            outline: none;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .form-group button {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            width: 50%;
            margin: 20px auto;
            display: block;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tecnologicos_programa";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Si el formulario ha sido enviado, procesamos los datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger datos del formulario
        $estado = $conn->real_escape_string($_POST['estado']);
        $tecnologico = $conn->real_escape_string($_POST['Tecnológico']);
        $responsable = $conn->real_escape_string($_POST['responsable']);
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $puesto = $conn->real_escape_string($_POST['puesto']);
        $telefono = $conn->real_escape_string($_POST['telefono']);
        $correo_institucional = $conn->real_escape_string($_POST['correo_institucional']);
        $correo_personal = $conn->real_escape_string($_POST['correo_personal']);

        // Crear la consulta SQL para insertar los datos
        $sql = "INSERT INTO registros_coordinadores (estado, tecnologico, responsable, nombre, puesto, telefono, correo_institucional, correo_personal)
            VALUES ('$estado', '$tecnologico', '$responsable', '$nombre', '$puesto', '$telefono', '$correo_institucional', '$correo_personal')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green; text-align:center;'>Nuevo registro insertado correctamente</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }


    $tecnologicos_query = "SELECT nombre FROM tecnologicos";
    $result = $conn->query($tecnologicos_query);

    $conn->close();
    ?>

    <header>
        <button class="menu-button" onclick="toggleMenu()">☰</button>
        <nav id="menu" class="hidden">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="catalogo.php">Tecnológicos</a></li>
                <li><a href="participante.php">Participantes</a></li>
                <li><a href="login.php">Cerrar sesión</a></li>
            </ul>
        </nav>
        <h1>Coordinador Tecnológico</h1>
        <div></div>
    </header>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            console.log("si")
            menu.classList.toggle('hidden');
            menu.classList.toggle('visible');
        }
    </script>

    

    <div class="content">
        <div class="form-container">
            <h2>Registro</h2>

            <div class="form-box">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table>
                        <tr>
                            <td><label for="estado">Estado</label></td>
                            <td>
                                <select id="estado" name="estado" required>
                                    <option value="">Selecciona un estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Tecnológico">Tecnológico</label></td>
                            <td>
                                <select id="Tecnológico" name="Tecnológico" required>
                                    <option value="">Selecciona un Tecnológico</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . htmlspecialchars($row['nombre']) . "'>" . htmlspecialchars($row['nombre']) . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay tecnológicos disponibles</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="responsable">Nombre del Responsable</label></td>
                            <td><input type="text" id="responsable" name="responsable" placeholder="Ingresa el nombre del responsable" required></td>
                        </tr>
                    </table>
            </div>

            <div class="form-box">
                <table>
                    <tr>
                        <td><label for="nombre">Nombre</label></td>
                        <td><input type="text" id="nombre" name="nombre" placeholder="Nombre del coordinador" required></td>
                    </tr>
                    <tr>
                        <td><label for="puesto">Puesto</label></td>
                        <td><input type="text" id="puesto" name="puesto" placeholder="Puesto" required></td>
                    </tr>
                    <tr>
                        <td><label for="telefono">Teléfono</label></td>
                        <td><input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required></td>
                    </tr>
                    <tr>
                        <td><label for="correo_institucional">Correo Institucional</label></td>
                        <td><input type="email" id="correo_institucional" name="correo_institucional" placeholder="Correo institucional" required></td>
                    </tr>
                    <tr>
                        <td><label for="correo_personal">Correo Personal</label></td>
                        <td><input type="email" id="correo_personal" name="correo_personal" placeholder="Correo personal" required></td>
                    </tr>
                </table>
            </div>

            <!-- Botón de enviar -->
            <div class="form-group">
                <button type="submit">Registrar</button>
            </div>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2024 Coordinación de Tecnológicos</p>
    </footer>

</body>

</html>