<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del educador</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/vista_programa.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="../assets/css/detallesEducador.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <ul class="breadcrumb">
            <li><a href="./coordinador_programa.php">Inicio</a></li>
            <li><a href="#">Detalles del educador:</a></li>
        </ul>



        <div id="detallesPrograma">
            <h1>
                Detalles del Educador 📚
            </h1>




        </div>


    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Obtener el id del coordinador desde la URL
        const urlParams = new URLSearchParams(window.location.search);
        const idCooordinador = urlParams.get('id');

        // Función para formatear las fechas
        function formatDate(dateString) {
            const date = new Date(dateString);
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        }

        if (idCooordinador) {
            $.ajax({
                url: `./api/coordinador_gral/obtenerDetallesEducador.php?id=${idCooordinador}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {

                        // Mostrar el nombre del educador
                        let nombreEducador = data.educador || "Desconocido";
                        $('#detallesPrograma').append(`<h3>Educador: <span class="nombre">${nombreEducador}</span></h3>`);

                        // Mostrar información del educador
                        $('#detallesPrograma').append(`
    <div class="programa-cantidad">
        <p>Este educador tiene <span>${data.programas.length}</span> programas disponibles para los estudiantes.</p>
    </div>
`);

                        // Mostrar los cursos y estudiantes
                        if (data.programas.length > 0) {
                            data.programas.forEach(programa => {

                                // Crear una tarjeta para el programa
                                let programaCard = `
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="programa_titulo"> ➡️ ${programa.nivel} ${programa.inicio_periodo} - ${programa.fin_periodo} </h3>
        `;

                                if (programa.estudiantes.length > 0) {
                                    // Si hay estudiantes, mostrar tabla
                                    let tableContent = `
                <table id="estudiantesTable_${programa.id}" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>CURP</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

                                    programa.estudiantes.forEach(estudiante => {
                                        tableContent += `
                    <tr>
                        <td>${estudiante.nombre}</td>
                        <td>${estudiante.apellidos}</td>
                        <td>${estudiante.curp}</td>
                        <td>${estudiante.telefono}</td>
                        <td>${estudiante.correo || "N/A"}</td>
                    </tr>
                `;
                                    });

                                    tableContent += '</tbody></table>';
                                    programaCard += tableContent;

                                    // Inicializar DataTable
                                    $(`#estudiantesTable_${programa.id}`).DataTable();

                                } else {
                                    // Si no hay estudiantes, mostrar mensaje
                                    programaCard += `<p>Sin estudiantes registrados en este curso.</p>`;
                                }

                                // Cerrar la tarjeta del programa
                                programaCard += `</div></div>`;
                                $('#detallesPrograma').append(programaCard);

                            });
                        } else {
                            $('#detallesPrograma').append('<p>No hay programas registrados para este educador.</p>');
                        }

                    } else {
                        alert(data.message || 'Hubo un error al obtener los detalles del educador.');
                    }

                },
                error: function(error) {
                    console.log('Error al obtener los detalles:', error);
                }
            });
        }
    </script>
</body>