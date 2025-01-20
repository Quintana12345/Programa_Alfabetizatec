<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizatec - Coor. Programa</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="../assets/css/coordinador_programa.css">

</head>


<body>


    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <h2 class="titulo_principal">Bienvenido <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h2>
        <p class="tec_nombre"><?php echo $_SESSION['nombre_tecnologico']; ?></p>

        <div class="actions">
            <button class="btn_submit_educador">Registrar educador </button>
            <button class="btn_submit_programa">Nuevo Programa </button>
            <button class="btn_submit_estudiante">Agregar Estudiante </button>
        </div>


    </main>

    <!-- Modal programa -->
    <div id="modal_programa" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro</h2>
            <form id="registrationForm">
                <div class="input_grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input_grupo">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div>

                <div class="input_grupo">
                    <label for="id_nivel">Nivel:</label>
                    <select id="id_nivel" name="id_nivel" required>
                        <option value="1">Analfabeta</option>
                        <option value="2">Inicial</option>
                        <option value="3">Superior</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="educador">Educador:</label>
                    <input type="text" id="educador" name="educador" required placeholder="Escribe al educador">
                </div>

                <div class="input_grupo">
                    <label for="meta">Meta:</label>
                    <input type="number" id="meta" name="meta" required>
                </div>

                <div class="input_grupo">
                    <label for="inicio_periodo">Inicio Periodo:</label>
                    <input type="date" id="inicio_periodo" name="inicio_periodo" required>
                </div>

                <div class="input_grupo">
                    <label for="fin_periodo">Fin Periodo:</label>
                    <input type="date" id="fin_periodo" name="fin_periodo" required>
                </div>

                <button class="btn_submit">Enviar</button>
            </form>


        </div>
    </div>

    <!-- Modal Educador -->
    <div id="modal_educador" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro - Educador</h2>
            <form id="registrationFormEducador">
                <div class="input_grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input_grupo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>

                <div class="input_grupo">
                    <label for="curp">CURP:</label>
                    <input type="text" id="curp" name="curp">
                </div>

                <div class="input_grupo">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>

                <div class="input_grupo">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" required>
                </div>

                <div class="input_grupo">
                    <label for="correo_inst">Correo Institucional:</label>
                    <input type="email" id="correo_inst" name="correo_inst">
                </div>

                <div class="input_grupo">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>

                <input type="hidden" value="4" id="rol_id" name="rol_id" required>

                <div class="input_grupo">
                    <label for="puesto">Puesto:</label>
                    <input type="text" id="puesto" name="puesto">
                </div>

                <div class="input_grupo">
                    <label for="tipo_participante">Tipo de Participante:</label>
                    <select id="tipo_participante" name="tipo_participante" class="styled-select" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="docente">Docente</option>
                        <option value="externo">Externo</option>
                    </select>
                </div>


                <div class="input_grupo">
                    <label for="modalidad">Modalidad:</label>
                    <select id="modalidad" name="modalidad" required>
                        <option value="alfabetizaTEC">Construyendo tu Servicio Social en AlfabetizaTEC</option>
                        <option value="servicio_comunitario">Servicio Social Comunitario</option>
                        <option value="creditos_complementarios">Créditos Complementarios</option>
                        <option value="valor_curricular">Constancia de Valor Curricular</option>
                        <option value="participacion_honorifica">Diploma de Participación Honorífica</option>
                    </select>
                </div>

                <div class="input_grupo" id="grupo_numero_control" style="display:none;">
                    <label for="numero_control">Número de Control:</label>
                    <input type="number" id="numero_control" name="numero_control">
                </div>

                <div class="input_grupo" id="grupo_carrera" style="display:none;">
                    <label for="carrera">Carrera:</label>
                    <input type="number" id="carrera" name="carrera">
                </div>

                <div class="input_grupo" id="grupo_semestre" style="display:none;">
                    <label for="semestre">Semestre:</label>
                    <input type="number" id="semestre" name="semestre">
                </div>

                <button type="btn_submit">Enviar</button>
            </form>


        </div>
    </div>

    <!-- Modal Estudiante -->
    <div id="modal_estudiante" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro - Estudiante</h2>
            <form id="registrationFormEstudiante">
                <!-- Campos del formulario aquí -->
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="../assets/js/sweetalert.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="api/auth/login.js"></script>


    <script>
        $(document).ready(function() {

            //formulario dinamico educador
            // Mostrar campos adicionales si se selecciona "Estudiante"
            $('#tipo_participante').change(function() {
                if ($(this).val() === 'estudiante') {
                    $('#grupo_numero_control').show();
                    $('#grupo_carrera').show();
                    $('#grupo_semestre').show();
                } else {
                    $('#grupo_numero_control').hide();
                    $('#grupo_carrera').hide();
                    $('#grupo_semestre').hide();
                }
            });

            // Opcional: Asegurarse de que los campos estén ocultos al cargar la página
            if ($('#tipo_participante').val() !== 'estudiante') {
                $('#grupo_numero_control').hide();
                $('#grupo_carrera').hide();
                $('#grupo_semestre').hide();
            }
            //fin educador


            // Mostrar modal_programa al hacer clic en el botón
            $('.btn_submit_programa').click(function() {
                $('#modal_programa').fadeIn();
            });

            // Mostrar modal_educador al hacer clic en el botón
            $('.btn_submit_educador').click(function() {
                $('#modal_educador').fadeIn();
            });

            // Mostrar modal_estudiante al hacer clic en el botón
            $('.btn_submit_estudiante').click(function() {
                $('#modal_estudiante').fadeIn();
            });

            // Cerrar modal_programa
            $('.close').click(function() {
                $(this).closest('.modal').fadeOut();
            });

            // Si el usuario hace clic fuera del modal, lo cierra
            $(window).click(function(event) {
                if ($(event.target).is('.modal')) {
                    $('.modal').fadeOut();
                }
            });

            // Procesar formulario de modal_programa
            $('#registrationFormPrograma').submit(function(event) {
                event.preventDefault();
                $('#modal_programa').fadeOut();
            });

            // Procesar formulario de modal_educador
            $('#registrationFormEducador').submit(function(event) {
                event.preventDefault();
                $('#modal_educador').fadeOut();
            });

            // Procesar formulario de modal_estudiante
            $('#registrationFormEstudiante').submit(function(event) {
                event.preventDefault();
                alert('Formulario Estudiante Enviado');
                $('#modal_estudiante').fadeOut();
            });


            //envio de educador
            $('#registrationFormEducador').submit(function(e) {
                e.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

                // Recopilar los datos del formulario con FormData
                var formData = new FormData(this); // 'this' es el formulario que ha sido enviado

                // Enviar la solicitud AJAX
                $.ajax({
                    url: './api/addEducador.php', // Cambia la URL a la ruta correcta de tu API
                    type: 'POST',
                    data: formData,
                    processData: false, // Importante: No proceses los datos, ya que estamos usando FormData
                    contentType: false, // Importante: No establezcas el contentType, ya que es autoajustado con FormData
                    success: function(response) {
                        // Convertir la respuesta a JSON si es necesario (si el servidor la envía como texto)
                        var responseJson = JSON.parse(response);

                        if (responseJson.success) {
                            console.log(responseJson.message); // Mostrar mensaje de éxito
                            Swal.fire({
                                title: '¡Éxito!',
                                text: responseJson.message,
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then(() => {
                                // Ocultar el modal después de aceptar el SweetAlert
                                const modal = document.getElementById('modal_educador'); // Cambiar 'miModal' por el ID de tu modal
                                const bootstrapModal = bootstrap.Modal.getInstance(modal);
                                bootstrapModal.hide();

                                // Opcional: reiniciar el formulario
                                const formulario = document.getElementById('miFormulario'); // Cambiar 'miFormulario' por el ID de tu formulario
                                formulario.reset();

                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: responseJson.message,
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                            console.error(responseJson.message); // Mostrar mensaje de error
                        }
                    },
                    error: function(xhr, status, error) {
                        // Manejo de errores de la solicitud AJAX
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al procesar la solicitud.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                        console.error(xhr.responseText); // Ver el error del servidor
                    }
                });
            });

        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('registrationForm');
            const modal = document.getElementById('modal_programa');
            const closeModal = document.querySelector('.close');

            // Cierra el modal cuando se hace clic en el botón de cerrar
            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            // Manejo del envío del formulario mediante AJAX
            form.addEventListener('submit', async (event) => {
                event.preventDefault(); // Evita el comportamiento por defecto del formulario

                // Obtén los datos del formulario
                const formData = new FormData(form);

                // Convertir FormData a objeto simple
                const data = {};
                formData.forEach((value, key) => {
                    data[key] = value;
                });

                try {
                    // Enviar datos al servidor mediante fetch
                    const response = await fetch('./api/addPrograma.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data), // Enviar datos como JSON
                    });

                    // Manejar la respuesta del servidor
                    if (response.ok) {
                        const result = await response.json();
                        alert('Formulario enviado con éxito: ' + result.message);
                        form.reset(); // Limpia el formulario
                        modal.style.display = 'none'; // Cierra el modal
                    } else {
                        const error = await response.json();
                        alert('Error al enviar el formulario: ' + (error.message || 'Algo salió mal'));
                    }
                } catch (err) {
                    console.error('Error en la solicitud:', err);
                    alert('Ocurrió un error inesperado al enviar el formulario.');
                }
            });
        });
    </script>




    <script>
        //educadores
        document.addEventListener('DOMContentLoaded', () => {
            const educadorSelect = document.getElementById('educador');
            const idTecnologico = 44; // Reemplaza con el ID dinámico del tecnológico

            const cargarEducadores = async () => {
                try {
                    const response = await fetch(`./api/getEducadores.php?id_tecnologico=${idTecnologico}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    });

                    if (response.ok) {
                        const educadores = await response.json();
                        console.log(educadores); // Mostrar los datos de los educadores en la consola

                        educadorSelect.innerHTML = '<option value="">Seleccione un educador</option>';

                        educadores.forEach(educador => {
                            const option = document.createElement('option');
                            option.value = educador.id; // ID del educador
                            option.textContent = `Usuario ${educador.id_usuario} (${educador.modalidad})`;
                            educadorSelect.appendChild(option);
                        });
                    } else {
                        alert('Error al cargar educadores.');
                    }
                } catch (error) {
                    console.error('Error al cargar educadores:', error);
                    alert('Error en la conexión.');
                }
            };

            // cargarEducadores();
        });
    </script>
</body>

</html>