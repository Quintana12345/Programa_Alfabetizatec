<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizatec - Coor. Regional</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="../assets/css/coordinador_regional.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


</head>




<body>

    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <h2 class="titulo_principal">Bienvenido <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h2>
        <p class="tec_nombre"><?php echo $_SESSION['nombre_tecnologico']; ?></p>

        <main>

</body>

</html>