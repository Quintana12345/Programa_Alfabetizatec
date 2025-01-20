<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regiones alfabetizatec</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/regiones.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
</head>

<body>
    <header>
        <?php include('./layout/header.php') ?>
    </header>
    <main>

        <h1 class="titulo_principal">Regiones alfabetizatec</h1>
        <div class="">
            <?php include('./components/mapa_regiones/mapa_reg.html') ?>
        </div>

        <div class="container_cards">
            <!-- Las cards se generarán dinámicamente aquí -->
        </div>
    </main>


    <script src="../assets/js/jquery.js"></script>



   




</body>

</html>