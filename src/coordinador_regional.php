<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Tecnológicos</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            margin-top: auto;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            margin-top: 40px;
        }

        .menu-item {
            width: 200px;
            text-align: center;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .menu-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .menu-item:hover img {
            transform: scale(1.1);
        }

        .menu-item h3 {
            background-color: var(--azul_TecNM);
            color: blanco_universal;
            margin: 0;
            padding: 10px;
            font-size: .8rem;
            transition: background-color 0.3s;
        }

       

        .menu-item:hover {
            transform: translateY(-10px);
        }

        @media (max-width: 768px) {
            .menu-container {
                padding: 10px;
            }
        }


        body {
            font-family: 'Montserrat', sans-serif;
            /* Usamos Montserrat con peso 300 */
        }

        .menu-item {
            width: 250px;
            /* Aumentamos el ancho para que sea más espaciosa */
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            background-color: #f9f9f9;
        }

        .menu-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .menu-item:hover img {
            transform: scale(1.1);
        }

        .menu-item h3 {
            background-color: var(--azul_TecNM);
            color: blanco_universal;
            margin: 10px 0;
            padding: 10px;
            font-size: 1rem;
            transition: background-color 0.3s;
            font-weight: 300;
        }

        .menu-item .details {
            font-size: 0.9rem;
            color: #333;
            background-color: var(--azul_TecNM);
            color :blanco_universal;
            border-radius: 5px;
            text-decoration: none
        }
        .details h3{
            text-decoration: none;
        }

        .menu-item .details i {
            margin-right: 5px;
        }

        .menu-item .region {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .menu-item:hover {
            transform: translateY(-10px);
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
            console.log("si")
            menu.classList.toggle('hidden');
            menu.classList.toggle('visible');
        }
    </script>

    <div class="menu-container">
        <?php
        include('./conexion.php');

        $consulta = "SELECT t.id, t.nombre, t.estado_id, t.modalidad, e.nombre AS estado, r.nombre AS region
        FROM tecnologicos t
        JOIN estados e ON t.estado_id = e.id
        JOIN regiones r ON e.id_region = r.id
        WHERE r.id =2"; // Cambié el id de la región sur

        $resultado = $conn->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($tecnologico = $resultado->fetch_assoc()) {
                echo '<a href="vista_tecnologico.php?id=' . urlencode($tecnologico['id']) . '">';
                echo '<div class="menu-item">';
                echo '<img src="../assets/img/logotipos/campus_san_marcos.png" alt="' . htmlspecialchars($tecnologico['nombre'], ENT_QUOTES, 'UTF-8') . '">';

                // Agregamos detalles de estado y región
                echo '<div class="details">';
                echo '<h3>' . htmlspecialchars($tecnologico['nombre'], ENT_QUOTES, 'UTF-8') . '</h3>';
                echo '<div class="state"><i class="fas fa-check-circle"></i>' . htmlspecialchars($tecnologico['estado'], ENT_QUOTES, 'UTF-8') . '</div>';
                echo '<div class="region"><i class="fas fa-map-marker-alt"></i>' . htmlspecialchars($tecnologico['region'], ENT_QUOTES, 'UTF-8') . '</div>';
                echo '</div>';

                echo '</div>';
                echo '</a>';
            }
        } else {
            echo '<p style="text-align: center; font-size: 1.2em; color: #555;">No se encontraron resultados.</p>';
        }
        ?>
    </div>


    <footer>
        <p>&copy; 2024 Menú de Tecnológicos. Todos los derechos reservados.</p>
    </footer>

</body>

</html>