<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del programa</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/vista_programa.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <ul class="breadcrumb">
            <?php if ($_SESSION['rol_id'] === 2): ?>
                <li><a href="./coordinador_nacional.php">Home</a></li>
                <li><a href="./vista_region.php?region=<?php echo urlencode($_SESSION['nombre_region']); ?>">Mi región</a></li>
                <li><a href="javascript:history.back();">Tecnológico:</a></li>
                <li><a href="#">Detalles por programa:</a></li>
            <?php else: ?>
                <li><a href="./coordinador_nacional.php">Home</a></li>
                <li><a href="javascript:history.go(-2);">Estado:</a></li>
                <li><a href="javascript:history.back();">Tecnológico:</a></li>
                <li><a href="#">Detalles por programa:</a></li>
            <?php endif; ?>
        </ul>

        <h3 id="titulo-programa" class="titulo_principal"></h3>
        <p>Estudiantes:</p>

        <div id="detallesPrograma" class="full_center"></div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Obtener el id del programa de la URL
        const urlParams = new URLSearchParams(window.location.search);
        // Obtener el id del programa de la URL
        const idPrograma = urlParams.get('id');

        // Verificar si se tiene el id del programa
        if (idPrograma) {
            // Realizar la petición AJAX para obtener los detalles del programa y la lista de estudiantes
            $.ajax({
                url: `./api/coordinador_gral/obtenerDetallesPrograma.php?id=${idPrograma}`, // Cambia esta URL a la correcta
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        // Mostrar los detalles del programa
                        $('#titulo-programa').text(`Programa: ${data.data.nombre}`);
                        $('#descripcion-programa').text(data.data.descripcion || "N/A");
                        $('#fecha-inicio').text(data.data.inicio_periodo);
                        $('#fecha-fin').text(data.data.fin_periodo);
                        $('#nivel-programa').text(data.data.nivel);

                        // Crear la tabla de estudiantes
                        if (data.data.estudiantes && data.data.estudiantes.length > 0) {
                            let tableContent = `
                    <table id="estudiantesTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>CURP</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Estado Solicitud</th> <!-- Nueva columna wpara el estado -->
                            </tr>
                        </thead>
                        <tbody>
                    `;

                            // Agregar los estudiantes a la tabla
                            data.data.estudiantes.forEach(function(estudiante) {
                                tableContent += '<tr>' +
                                    `<td><p href="./vista_detalleEstudiante.php?id=${estudiante.id}" class="text-decoration-none">${estudiante.nombre}</p></td>` + // Enlace en el nombre del estudiante
                                    `<td>${estudiante.apellidos}</td>` +
                                    `<td>${estudiante.curp}</td>` +
                                    `<td>${estudiante.telefono}</td>` +
                                    `<td>${estudiante.correo || "N/A"}</td>` +
                                    `<td>${estudiante.status || "No especificado"}</td>` + // Mostrar el estado de la solicitud
                                    '</tr>';
                            });

                            tableContent += '</tbody></table>';
                            $('#detallesPrograma').append(tableContent);

                            // Inicializar DataTable sobre la tabla de estudiantes
                            $('#estudiantesTable').DataTable({
                                paging: true,
                                searching: true,
                                ordering: true,
                                info: true,
                                lengthChange: true, // Permitir seleccionar cantidad de registros por página
                                language: {
                                    search: "Buscar:",
                                    lengthMenu: "Mostrar _MENU_ registros por página",
                                    info: "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                                    infoEmpty: "Mostrando 0 a 0 de 0 registros",
                                    infoFiltered: "(filtrado de _MAX_ registros en total)",
                                    paginate: {
                                        first: "Primero",
                                        previous: "Anterior",
                                        next: "Siguiente",
                                        last: "Último"
                                    }
                                }
                            });
                        } else {
                            $('#detallesPrograma').append('<p>No hay estudiantes registrados para este programa.</p>');
                        }

                    } else {
                        alert(data.message || 'Hubo un error al obtener los detalles del programa.');
                    }
                },
                error: function(error) {
                    console.log('Error al obtener los detalles del programa:', error);
                }
            });
        } else {
            console.log('No se encontró el id del programa en la URL');
        }
    </script>
</body>