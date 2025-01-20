<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizatec - Coor. Nacional</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="../assets/css/coordinador_nacional.css">



</head>


<body>

    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <h2 class="titulo_principal">Bienvenido <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h2>
        <div class="hero_cord_nacional">
            <div class="map_container">
                <?php include('./components/mapa.html') ?>
            </div>

            <!-- Contenedor de las cards -->
            <div class="cards_container">
                <!-- Card de vista de regiones -->
                <div class="card" id="card-regiones">
                    <h3>Vista de Regiones</h3>
                    <p>Accede a la vista detallada de las diferentes regiones del país.</p>
                </div>

                <!-- Card de vista de tecnológicos -->
                <div class="card" id="card-tecnologicos">
                    <h3>Vista de Tecnológicos</h3>
                    <p>Consulta información sobre los tecnológicos distribuidos por México.</p>
                </div>

                <!-- Card de vista de estadísticas -->
                <div class="card" id="card-estadisticas">
                    <h3>Vista de Estadísticas</h3>
                    <p>Obtén las estadísticas más recientes sobre diversos aspectos del país.</p>
                </div>
            </div>

        </div>
    </main>

</body>
<footer>
    <?php include('./layout/footer.php') ?>

</footer>


<script src="../assets/js/jquery.js"></script>
<script src="./utilidades/logout.js"></script>


<script>
    $(document).ready(function() {
        // Redirigir al hacer clic en "Vista de Regiones"
        $('#card-regiones').click(function() {
            window.location.href = './Regiones.php'; // Cambia '/ruta-regiones' por la ruta que desees
        });

        // Redirigir al hacer clic en "Vista de Tecnológicos"
        $('#card-tecnologicos').click(function() {
            window.location.href = '/ruta-tecnologicos'; // Cambia '/ruta-tecnologicos' por la ruta que desees
        });

        // Redirigir al hacer clic en "Vista de Estadísticas"
        $('#card-estadisticas').click(function() {
            window.location.href = '/ruta-estadisticas'; // Cambia '/ruta-estadisticas' por la ruta que desees
        });
    });
</script>

</html>