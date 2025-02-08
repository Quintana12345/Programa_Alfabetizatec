<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del educador</title>
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
            <li><a href="./coordinador_programa.php">Inicio</a></li>
            <li><a href="#">Detalles del educador:</a></li>
    <div id="detallesPrograma"></div>
        </ul>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Obtener el id del programa de la URL
        const urlParams = new URLSearchParams(window.location.search);
        // Obtener el id del programa de la URL
        const idCooordinador = urlParams.get('id');

        // Función para formatear las fechas
        function formatDate(dateString) {
            const date = new Date(dateString);
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();
            console.log("aaa", day, month, year)

            return `${day}/${month}/${year}`;
        }

        // Verificar si se tiene el id del coordinador
        if (idCooordinador) {
    // Realizar la petición AJAX para obtener los detalles del programa y la lista de estudiantes
    $.ajax({
        url: `./api/coordinador_gral/obtenerDetallesEducador.php?id=${idCooordinador}`,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                console.log(data);

                // Limpiar el contenedor antes de agregar nuevos elementos
                $('#detallesPrograma').empty();

                // Obtener el nombre del educador desde la nueva estructura de respuesta
                let nombreEducador = data.educador || "Desconocido";
                $('#detallesPrograma').append(`<h2>Educador: ${nombreEducador}</h2>`);

                // Verificar si hay programas
                if (data.programas.length > 0) {
                    data.programas.forEach(programa => {
                        // Mostrar el nivel del programa
                        $('#detallesPrograma').append(`<h3>${programa.nivel}</h3>`);

                        // Verificar si hay estudiantes en el programa
                        if (programa.estudiantes.length > 0) {
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

                            // Agregar filas para cada estudiante
                            programa.estudiantes.forEach(estudiante => {
                                tableContent += `
                                    <tr>
                                        <td><p class="text-decoration-none">${estudiante.nombre}</p></td>
                                        <td>${estudiante.apellidos}</td>
                                        <td>${estudiante.curp}</td>
                                        <td>${estudiante.telefono}</td>
                                        <td>${estudiante.correo || "N/A"}</td>
                                    </tr>
                                `;
                            });

                            tableContent += '</tbody></table>';
                            $('#detallesPrograma').append(tableContent);

                            // Inicializar DataTable para cada tabla generada
                            $(`#estudiantesTable_${programa.id}`).DataTable({
                                paging: true,
                                searching: true,
                                ordering: true,
                                info: true,
                                lengthChange: true,
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
                            // Mostrar mensaje si no hay estudiantes en el programa
                            $('#detallesPrograma').append('<p>No hay estudiantes registrados en este nivel.</p>');
                        }
                    });
                } else {
                    // Mostrar mensaje si no hay programas para el educador
                    $('#detallesPrograma').append('<p>No hay programas registrados para este educador.</p>');
                }
            } else {
                // Mostrar mensaje de error si la solicitud no fue exitosa
                alert(data.message || 'Hubo un error al obtener los detalles del programa.');
            }
        },
        error: function(error) {
            // Manejar errores de la petición AJAX
            console.log('Error al obtener los detalles del programa:', error);
        }
    });
}


        $(document).on('change', 'input[type="radio"]', function() {
            // Obtener el ID del estudiante del atributo name
            const nameAttr = $(this).attr('name');
            const studentId = nameAttr.split('_')[1]; // Supone que el formato es "estado_ID"

            // Obtener el valor seleccionado
            const newStatus = $(this).val();

            // Obtener el id de la solicitud desde el campo oculto
            const solicitudId = $(this).closest('form').find('input[name="id_solicitud"]').val();

            // Enviar la petición AJAX
            $.ajax({
                url: './api/actualizarEstadoSolicitud.php', // Cambia a la URL correcta de tu API
                type: 'POST',
                data: {
                    id_solicitud: solicitudId, // Enviar el id de la solicitud
                    estado: newStatus // Nuevo estado seleccionado
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Mostrar notificación de éxito usando SweetAlert2 (Toast)
                        Swal.fire({
                            icon: 'success',
                            title: 'Estado actualizado correctamente.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000, // Duración del toast
                            timerProgressBar: true
                        });
                    } else {
                        // Mostrar notificación de error usando SweetAlert2 (Toast)
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al actualizar el estado.',
                            text: response.message || 'Inténtalo nuevamente.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000, // Duración del toast
                            timerProgressBar: true
                        });
                    }
                },
                error: function(error) {
                    console.error('Error en la petición:', error);
                    // Notificación de error al fallar la petición AJAX
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un problema al actualizar el estado.',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000, // Duración del toast
                        timerProgressBar: true
                    });
                }
            });
        });
    </script>
</body>