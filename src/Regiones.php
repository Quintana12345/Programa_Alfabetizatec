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
        <ul class="breadcrumb">
            <li><a href="./coordinador_nacional.php">Home</a></li>
            <li><a href="#">Vista regiones:</a></li>

        </ul>

        <h1 class="titulo_principal">Regiones alfabetizatec</h1>
        <div class="">
            <?php include('./components/mapa_regiones/mapa_reg.html') ?>
        </div>

        <div class="container_cards">
            <!-- Las cards se generarán dinámicamente aquí -->
        </div>
        <h2>Resumen de las regiones</h2>
        <canvas id="graficoRegiones" width="400" height="200"></canvas>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // Realizar la solicitud AJAX al endpoint PHP
            $.ajax({
                url: './api/graficas/datos_region.php', // Aquí debes poner la URL de tu endpoint PHP
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Extraer los datos de la respuesta
                        const regionesData = response.data.regiones;

                        // Crear arrays para las etiquetas y los datos de las gráficas
                        const regiones = [];
                        const metas = [];
                        const estudiantes = [];
                        const educadores = [];

                        // Recorrer los datos para llenar los arrays
                        $.each(regionesData, function(regionId, region) {
                            regiones.push(region.region_nombre);

                            let totalMeta = 0;
                            let totalEstudiantes = 0;
                            let totalEducadores = 0;

                            // Recorrer los tecnológicos de cada región
                            $.each(region.tecnologicos, function(index, tecnologico) {
                                totalMeta += tecnologico.meta_total;
                                totalEstudiantes += tecnologico.estudiantes_aprobados;
                                totalEducadores += tecnologico.total_educadores;
                            });

                            metas.push(totalMeta);
                            estudiantes.push(totalEstudiantes);
                            educadores.push(totalEducadores);
                        });

                        // Crear la gráfica con Chart.js
                        const ctx = document.getElementById('graficoRegiones').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: regiones, // Etiquetas de las regiones
                                datasets: [{
                                        label: 'Metas Totales',
                                        data: metas,
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Estudiantes Aprobados',
                                        data: estudiantes,
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Total Educadores',
                                        data: educadores,
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    } else {
                        alert('No se encontraron datos.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Hubo un error en la solicitud: ', status, error);
                    alert('Hubo un error al obtener los datos.');
                }
            });
        });
    </script>

    <script src="../assets/js/jquery.js"></script>








</body>

</html>