<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participante</title>
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
            background-color: blanco_universal;
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
            background-image: url('logos/Tec.1-removebg-preview.png');
            background-size: 70%;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #007BFF;
            color: blanco_universal;
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


        .back-button {
            background-color: blanco_universal;
            color: #007BFF;
            border: 2px solid blanco_universal;
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
            color: blanco_universal;
        }

        footer {
            background-color: #007BFF;
            color: blanco_universal;
            text-align: center;
            padding: 10px;
     
        }
        .content {
            flex: 1;
            padding: 20px;
            padding-top: 120px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            overflow-y: auto;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.6);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-container h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #007BFF;
            text-align: center;
        }

        .form-box {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-box label {
            font-size: 1.1em;
            color: #333;
        }

        .form-box input,
        .form-box select {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #007BFF;
            color: blanco_universal;
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
<?php
// Incluir archivo de conexión a la base de datos
include_once('./conexion.php'); // Asegúrate de que 'conexion.php' esté en la ubicación correcta

// Consulta SQL para obtener los nombres de los Tecnológicos
$sql = "SELECT nombre FROM tecnologicos"; // Ajusta el nombre de la tabla y columna
$result = $conn->query($sql);
?>

<body>

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
        <h1>Participantes del programa</h1>
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
            <form action="procesar_registro.php" method="POST">
                <h2>Formulario de Registro</h2>

                <div class="form-box">
                    <label for="estado">Estado Tecnológico:</label>
                    <select id="estado" name="instituto_id">
                        <?php
                        // Conexión y consulta para obtener los institutos
                        include('conexion.php');
                        $query = "SELECT id, nombre FROM tecnologicos";
                        $result = $conn->query($query);

                        // Si hay resultados, los muestra en el select
                        // Verifica si hay resultados
                        if ($result->num_rows > 0) {
                            // Mostrar opciones en el select
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay tecnológicos disponibles</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-box">
                    <h3>Responsable del Programa</h3>
                    <label for="nombre_responsable">Nombre:</label>
                    <input type="text" id="nombre_responsable" name="nombre_responsable" required>

                    <label for="puesto">Puesto:</label>
                    <input type="text" id="puesto" name="puesto" required>

                    <label for="telefono_responsable">Teléfono:</label>
                    <input type="text" id="telefono_responsable" name="telefono_responsable" required>

                    <label for="correo_institucional">Correo Institucional:</label>
                    <input type="email" id="correo_institucional" name="correo_institucional" required>

                    <label for="correo_personal">Correo Personal:</label>
                    <input type="email" id="correo_personal" name="correo_personal" required>
                </div>

                <div class="form-box">
                    <h3>Participante Alfabetizando</h3>
                    <label for="tipo_participante">Tipo de Participante:</label>
                    <select id="tipo_participante" name="tipo_participante">
                        <option value="estudiante">Estudiante</option>
                        <option value="docente">Docente</option>
                        <option value="voluntario">Voluntario Externo</option>
                    </select>

                    <!-- Estudiante -->
                    <div id="estudiante" class="participante_tipo" style="display: none;">
                        <label for="nombre_estudiante">Nombre:</label>
                        <input type="text" id="nombre_estudiante" name="nombre_estudiante">

                        <label for="carrera">Carrera:</label>
                        <input type="text" id="carrera" name="carrera">

                        <label for="numero_control">Número de Control:</label>
                        <input type="text" id="numero_control" name="numero_control">

                        <label for="semestre">Semestre:</label>
                        <input type="text" id="semestre" name="semestre">

                        <label for="telefono_estudiante">Teléfono:</label>
                        <input type="text" id="telefono_estudiante" name="telefono_estudiante">

                        <label for="direccion_estudiante">Dirección:</label>
                        <input type="text" id="direccion_estudiante" name="direccion_estudiante">

                        <label for="modalidad_participacion">Modalidad de Participación:</label>
                        <select id="modalidad_participacion" name="modalidad_participacion">
                            <option value="alfabetizaTEC">Construyendo tu Servicio Social en AlfabetizaTEC</option>
                            <option value="servicio_comunitario">Servicio Social Comunitario</option>
                            <option value="creditos_complementarios">Créditos Complementarios</option>
                            <option value="valor_curricular">Constancia de Valor Curricular</option>
                            <option value="participacion_honorifica">Diploma de Participación Honorífica</option>
                        </select>
                    </div>

                    <!-- Docente -->
                    <div id="docente" class="participante_tipo" style="display: none;">
                        <label for="nombre_docente">Nombre:</label>
                        <input type="text" id="nombre_docente" name="nombre_docente">

                        <label for="departamento_docente">Departamento:</label>
                        <input type="text" id="departamento_docente" name="departamento_docente">

                        <label for="telefono_docente">Teléfono:</label>
                        <input type="text" id="telefono_docente" name="telefono_docente">

                        <label for="direccion_docente">Dirección:</label>
                        <input type="text" id="direccion_docente" name="direccion_docente">

                        <label for="modalidad_docente">Modalidad de Participación:</label>
                        <select id="modalidad_docente" name="modalidad_docente">
                            <option value="alfabetizaTEC">Construyendo tu Servicio Social en AlfabetizaTEC</option>
                            <option value="servicio_comunitario">Servicio Social Comunitario</option>
                            <option value="creditos_complementarios">Créditos Complementarios</option>
                            <option value="valor_curricular">Constancia de Valor Curricular</option>
                            <option value="participacion_honorifica">Diploma de Participación Honorífica</option>
                        </select>
                    </div>

                    <!-- Voluntario -->
                    <div id="voluntario" class="participante_tipo" style="display: none;">
                        <label for="nombre_voluntario">Nombre:</label>
                        <input type="text" id="nombre_voluntario" name="nombre_voluntario">

                        <label for="telefono_voluntario">Teléfono:</label>
                        <input type="text" id="telefono_voluntario" name="telefono_voluntario">

                        <label for="direccion_voluntario">Dirección:</label>
                        <input type="text" id="direccion_voluntario" name="direccion_voluntario">

                        <label for="modalidad_voluntario">Modalidad de Participación:</label>
                        <select id="modalidad_voluntario" name="modalidad_voluntario">
                            <option value="alfabetizaTEC">Construyendo tu Servicio Social en AlfabetizaTEC</option>
                            <option value="servicio_comunitario">Servicio Social Comunitario</option>
                            <option value="creditos_complementarios">Créditos Complementarios</option>
                            <option value="valor_curricular">Constancia de Valor Curricular</option>
                            <option value="participacion_honorifica">Diploma de Participación Honorífica</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit">Registrar</button>
                </div>
            </form>

        </div>
    </div>

    <footer>
        <p>&copy; 2024. Todos los derechos reservados.</p>
    </footer>

</body>

<?php
// Cerrar conexión
$conn->close();
?>

<script>
    // Obtener el select de tipo de participante
    const tipoParticipante = document.getElementById('tipo_participante');

    // Función para mostrar los campos según el tipo de participante seleccionado
    function mostrarCampos() {
        // Ocultar todos los grupos de campos
        const tipos = document.querySelectorAll('.participante_tipo');
        tipos.forEach(tipo => tipo.style.display = 'none');

        // Mostrar el campo correspondiente al tipo seleccionado
        const tipoSeleccionado = tipoParticipante.value;
        if (tipoSeleccionado) {
            document.getElementById(tipoSeleccionado).style.display = 'block';
        }
    }

    // Llamar a la función mostrarCampos cuando se cambie el tipo de participante
    tipoParticipante.addEventListener('change', mostrarCampos);

    // Llamar a la función mostrarCampos al cargar la página para verificar el tipo seleccionado por defecto
    window.onload = mostrarCampos;
</script>


</html>