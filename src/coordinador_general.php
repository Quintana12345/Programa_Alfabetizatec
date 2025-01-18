<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador General - Catálogo de Tecnológicos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('logos/Tec.1-removebg-preview.png');
            /* Ruta de la imagen de fondo */
            background-size: 70%;
            /* Ajusta el tamaño de la imagen */
            background-position: center;
            /* Centra la imagen en la página */
            background-repeat: no-repeat;
            /* Evita que la imagen se repita */
            background-attachment: fixed;
            /* Hace que la imagen sea fija al hacer scroll */
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            /* Asegura que el header se mantenga encima del contenido */
        }

        footer {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .content {
            padding: 20px;
            margin-top: 70px;
            /* Deja espacio suficiente para evitar que el contenido se solape con el header */
            color: #333;
            /* Color del texto para garantizar legibilidad */
            background-color: rgba(255, 255, 255, 0.8);
            /* Fondo blanco semitransparente */
            border-radius: 10px;
            /* Bordes redondeados */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra para destacar el contenido */
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.5em;
            margin-top: 20px;
        }

        /* Estilos para el menú */
        .menu {
            display: none;
            flex-direction: column;
            background-color: #007BFF;
            color: white;
            position: absolute;
            top: 50px;
            left: 10px;
            border-radius: 5px;
            padding: 10px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 5px;
        }

        .menu a:hover {
            background-color: #0056b3;
        }

        .hamburger {
            cursor: pointer;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .menu.active {
            display: flex;
        }

        table {
            width: 0%;
            /* Reduce el ancho de la tabla */
            margin: 20px auto;
            /* Centra la tabla y añade margen superior e inferior */
            border-collapse: collapse;
            background-color: white;
            /* Fondo blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra */
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Estilo para hacer la tabla y gráfica responsive */
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }

        .chart-container canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>

<body>

    <header>
        <h1>Coordinador General - Catálogo de Tecnológicos</h1>
    </header>

    <div class="menu" id="menu">
        <a href="#tecnologicos">Tecnológicos Registrados</a>
        <a href="#directores">Directores</a>
        <a href="#coordinadores">Coordinadores</a>
        <a href="#graficas">Gráficas</a>
    </div>

    <div class="content">
        <h2 id="tecnologicos">Tecnológicos Registrados:</h2>

        <table id="tecnologicos-table" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Tecnológico</th>
                    <th>Estado</th>
                    <th>Director</th>
                    <th>Coordinador</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <h2 id="graficas">Gráficas</h2>

        <div class="chart-container">
            <canvas id="chart"></canvas>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Coordinador General. Todos los derechos reservados.</p>
    </footer>

    <!-- Librerías de DataTables y Chart.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Función para cargar datos desde el backend
        async function cargarDatos() {
            try {
                const response = await fetch('./data/datos_tecnologicos.php');
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();

                const tableBody = document.querySelector('#tecnologicos-table tbody');

                tableBody.innerHTML = '';

                data.forEach((tecnologico, index) => {
                    const row = document.createElement('tr');

                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${tecnologico.nombre}</td>
                        <td>${tecnologico.estado}</td>
                        <td>${tecnologico.director}</td>
                        <td>${tecnologico.coordinador}</td>
                    `;

                    tableBody.appendChild(row);
                });

                $('#tecnologicos-table').DataTable({
                    destroy: true, // Reiniciar DataTables para evitar conflictos
                    language: {
                        search: "Buscar:",
                        lengthMenu: "Mostrar _MENU_ registros por página",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando página _PAGE_ de _PAGES_",
                        infoEmpty: "No hay registros disponibles",
                        infoFiltered: "(filtrado de _MAX_ registros totales)"
                    }
                });
            } catch (error) {
                console.error('Error al cargar los datos:', error);
            }
        }

        document.addEventListener('DOMContentLoaded', cargarDatos);

        const ctx = document.getElementById('chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tecnológico 1', 'Tecnológico 2', 'Tecnológico 3'],
                datasets: [{
                    label: 'Estándar de Calidad',
                    data: [85, 90, 75], // Datos de ejemplo
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Hace la gráfica adaptable al tamaño del contenedor
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>