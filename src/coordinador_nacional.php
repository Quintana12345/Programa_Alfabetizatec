<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <style>
        /* Estilos básicos */
        main {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 80%;
            max-width: 1200px;
        }

        /* Estilo para la imagen */
        .image-container {
            flex: 1;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border: 3px solid #ddd;
            border-radius: 8px;
        }

        /* Estilo para las cards */
        .cards-container {
            flex: 1;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .card p {
            font-size: 1em;
            color: #777;
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

    <main>
        <div class="container">
            <!-- Contenedor de la imagen -->
            <div class="image-container">
                <img src="../assets/img/mapa.webp" alt="Mapa de México">
            </div>

            <!-- Contenedor de las cards -->
            <div class="cards-container">
                <!-- Card de vista de regiones -->
                <div class="card">
                    <h3>Vista de Regiones</h3>
                    <p>Accede a la vista detallada de las diferentes regiones del país.</p>
                </div>

                <!-- Card de vista de tecnológicos -->
                <div class="card">
                    <h3>Vista de Tecnológicos</h3>
                    <p>Consulta información sobre los tecnológicos distribuidos por México.</p>
                </div>

                <!-- Card de vista de estadísticas -->
                <div class="card">
                    <h3>Vista de Estadísticas</h3>
                    <p>Obtén las estadísticas más recientes sobre diversos aspectos del país.</p>
                </div>
            </div>
        </div>
    </main>

</body>

</html>