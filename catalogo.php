<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Tecnológicos</title>
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

        footer {
            background-color: #007BFF;
            color: white;
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
            margin-top: 120px;
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
            background-color: #007BFF;
            color: white;
            margin: 0;
            padding: 10px;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }

        .menu-item:hover h3 {
            background-color: #0056b3;
        }

        .menu-item:hover {
            transform: translateY(-10px);
        }

        @media (max-width: 768px) {
            .menu-container {
                padding: 10px;
            }
        }
    </style>
</head>

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
        <h1>Menú de Tecnológicos</h1>
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

    <div class="menu-container">
        <?php


        include('./conexion.php');

        $consulta = "SELECT * FROM tecnologicos";

        $resultado = $conn->query($consulta);


        if ($resultado->num_rows > 0) {
            while ($tecnologico = $resultado->fetch_assoc()) {
                echo '<a href="vista_tecnologico.php?id=' . urlencode($tecnologico['id']) . '">';  // Cambié 'nombre' por 'id'
                echo '<div class="menu-item">';
                echo '<img src="' . htmlspecialchars($tecnologico['imagen'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($tecnologico['nombre'], ENT_QUOTES, 'UTF-8') . '">';
                echo '<h3>' . htmlspecialchars($tecnologico['nombre'], ENT_QUOTES, 'UTF-8') . '</h3>';
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