<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista tecnológico</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/vista_tecnologico.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <h3 id="titulo-tecnologico" class="titulo_principal"></h3>
        <p>Programas</p>

        <div id="detallesTecnologico" class="full_center"></div>
    </main>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        $(document).ready(function() {
            // Obtener el id del tecnológico de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const idTecnologico = urlParams.get('id');

            if (idTecnologico) {
                // Realizar la petición AJAX para obtener los detalles del tecnológico
                $.ajax({
                    url: `./api/coordinador_gral/obtenerDetallesTec.php?id=${idTecnologico}`, // Cambia esta URL a la correcta
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            // Mostrar el nombre del tecnológico en el título
                            $('#titulo-tecnologico').text(`Tecnológico: ${data.data.tecnologico_nombre}`);

                            // Crear la tabla de programas
                            if (data.data.programas && data.data.programas.length > 0) {
                                let tableContent = `
                                <table id="programasTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Programa</th>
                                            <th>Descripción</th>
                                            <th>Inicio Periodo</th>
                                            <th>Fin Periodo</th>
                                            <th>Nivel</th> <!-- Nueva columna para el nivel -->
                                        </tr>
                                    </thead>
                                    <tbody>
                            `;

                                // Agregar los programas a la tabla
                                data.data.programas.forEach(function(programa) {
                                    tableContent += '<tr>' +
                                        `<td><a href="./vista_programa.php?id=${programa.id}" >${programa.nombre}</a></td>` +
                                        '<td>' + (programa.descripcion || "N/A") + '</td>' +
                                        '<td>' + programa.inicio_periodo + '</td>' +
                                        '<td>' + programa.fin_periodo + '</td>' +
                                        '<td>' + programa.nivel + '</td>' + // Mostrar el nombre del nivel
                                        '</tr>';
                                });

                                tableContent += '</tbody></table>';
                                $('#detallesTecnologico').append(tableContent);

                                // Inicializar DataTable sobre la tabla generada
                                $('#programasTable').DataTable({
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
                                $('#detallesTecnologico').append('<p>No hay programas disponibles para este tecnológico.</p>');
                            }

                        } else {
                            alert(data.message || 'Hubo un error al obtener los detalles del tecnológico.');
                        }
                    },
                    error: function(error) {
                        console.log('Error al obtener los detalles del tecnológico:', error);
                    }
                });
            } else {
                console.log('No se encontró el id del tecnológico en la URL');
            }
        });
    </script>


</body>


</html>