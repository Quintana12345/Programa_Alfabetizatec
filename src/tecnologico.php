<?php
// Conexión a la base de datos
include('./conexion.php');

// Obtener el ID del tecnológico desde la URL
$id_tecnologico = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_tecnologico) {
    // Consultar información del tecnológico según el ID
    $consulta_tecnologico = "SELECT * FROM tecnologicos WHERE id = " . intval($id_tecnologico);
    $resultado_tecnologico = $conn->query($consulta_tecnologico);

    if ($resultado_tecnologico->num_rows > 0) {
        $tecnologico = $resultado_tecnologico->fetch_assoc();
    } else {
        die("Tecnológico no encontrado.");
    }

    // Consultar los programas relacionados con el tecnológico
    $consulta_programas = "SELECT * FROM programas WHERE id_tecnologico = " . intval($id_tecnologico);
    $resultado_programas = $conn->query($consulta_programas);

    // Obtener los IDs de los programas asociados a este tecnológico
    $programa_ids = [];
    while ($programa = $resultado_programas->fetch_assoc()) {
        $programa_ids[] = $programa['id'];
    }

    // Consultar los estudiantes relacionados con esos programas
    $programa_ids_str = implode(',', $programa_ids);
    if (!empty($programa_ids_str)) {
        $consulta_estudiantes = "SELECT * FROM estudiantes WHERE programa_id IN ($programa_ids_str)";
        $resultado_estudiantes = $conn->query($consulta_estudiantes);
    }
} else {
    die("ID del tecnológico no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tecnologico['nombre']; ?></title>

    <!-- Incluir librerías necesarias para DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../assets/css/root.css">
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





        main {

            font-family: 'Arial', sans-serif;

            margin: 0;

            padding: 0;

            background-color: #f4f4f4;

            display: flex;

            flex-direction: column;

            height: 100vh;

            /* Asegura que el cuerpo ocupe toda la altura de la ventana */

            background-image: url('logos/Tec.1-removebg-preview.png');

            /* Ruta de la imagen */

            background-size: 70%;

            /* Aquí ajustamos el tamaño de la imagen de fondo */

            background-position: center;

            /* Centra la imagen */

            background-repeat: no-repeat;

            /* Evita que la imagen se repita */

            background-attachment: fixed;

            /* Mantiene la imagen fija mientras haces scroll */

            overflow: hidden;

            /* Desactiva el desplazamiento */

        }







        footer {

            background-color: #007BFF;

            color: blanco_universal;

            text-align: center;

            padding: 10px;

            width: 100%;

        }



        .content {

            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: center;

            flex: 1;

            padding: 20px;

            padding-top: 90px;

            /* Asegura que el contenido no quede oculto debajo del header */

            box-sizing: border-box;

            overflow-y: scroll;

        }



        .form-container {

            background-color: rgba(255, 255, 255, 0.9);

            /* Fondo blanco semi-transparente */

            padding: 20px;

            border-radius: 8px;

            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

            width: 100%;

            max-width: 1000px;

            box-sizing: border-box;

            display: flex;

            gap: 30px;

            flex-wrap: wrap;

            justify-content: center;

        }



        .form-box {

            width: 48%;

        }



        .form-container h2 {

            font-size: 1.8em;

            margin-bottom: 30px;

            /* Ajuste el espacio debajo del título */

            color: #007BFF;

            text-align: center;

            /* Centrar el texto dentro del formulario */

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

            color: blanco_universal;

            padding: 12px 20px;

            border: none;

            border-radius: 5px;

            cursor: pointer;

            font-size: 1.1em;

            width: 50%;

            margin: 20px auto;

            /* Centra el botón */

            display: block;

        }



        .form-group button:hover {

            background-color: #0056b3;

        }




        .card {

            border-radius: 1.2rem;

            background-color: blanco_universal;

            padding: 2rem;

            display: flex;

            flex-direction: row;

            justify-content: center;

            align-items: center;

            margin: 3rem 0rem;

            max-height: 50vh;

            max-width: 60%;

            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2), 0 4px 6px rgba(0, 0, 0, 0.1);

            transition: box-shadow 0.3s ease, transform 0.3s ease;

        }



        .card:hover {

            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3), 0 6px 8px rgba(0, 0, 0, 0.2);

            transform: translateY(-4px);

        }



        .card img {

            width: 45%;

            align-self: flex-start;

            margin-right: 2rem;

        }



        .lado_izq {

            flex: 1;

        }



        h1,

        h3,

        p {

            margin: 0.5rem 0;

        }



        /* Media query para pantallas pequeñas */

        @media (max-width: 768px) {

            .card {

                flex-direction: column;



            }



            .card img {

                width: 50%;

                margin: 0;

                align-self: center;

            }



            .lado_izq {

                width: 100%;

            }

        }
    </style>
</head>

<body>
    <header class="principal_header">
        <img src="../assets/img/logotipos/sep.png" alt="Logotipo SEP">
        <img src="../assets/img/logotipos/TecNM_Azteca.png" alt="Logotipo TECNM">
        <img src="../assets/img/logotipos/inea_blanco.png" alt="Logotipo INEA">

        <!-- Menú de navegación -->
        <nav class="menu">
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="otros_apartados.html">Otros Apartados</a></li>
                <li><a href="login.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('visible');
        }
    </script>

    <main>
    <div class="content">
        <div class="card">
        <img src="../assets/img/logos/Tecnologico-Nacional-Mexico.jpg" alt="Logo">
        <div class="lado_izq">
                <h1><?php echo $tecnologico['nombre']; ?></h1>
                <h3>Detalles</h3>
                <p>Director: <?php echo isset($tecnologico['director']) && $tecnologico['director'] !== null ? $tecnologico['director'] : ''; ?></p>
            </div>
        </div>

        <!-- Tabla de estudiantes -->
        <div class="form-container">
            <h2>Estudiantes</h2>
            <table id="tabla-estudiantes" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado_estudiantes && $resultado_estudiantes->num_rows > 0) {
                        while ($estudiante = $resultado_estudiantes->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$estudiante['id']}</td>";
                            echo "<td>{$estudiante['nombre']}</td>";
                            echo "<td>{$estudiante['apellidos']}</td>";
                            echo "<td>{$estudiante['telefono']}</td>";
                            echo "<td>{$estudiante['correo']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron estudiantes.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </main>

   
    <footer>
        <p>&copy; 2024 Coordinador General. Todos los derechos reservados.</p>
    </footer>

    <script>
        $(document).ready(function() {
            $('#tabla-estudiantes').DataTable();
        });
    </script>
</body>

</html>