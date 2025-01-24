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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


</head>


<body>


    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <ul class="breadcrumb">
            <li><a href="#">Inicio</a></li>

        </ul>
        <h2 class="titulo_principal">Bienvenido <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h2>
        <p class="tec_nombre"><?php echo $_SESSION['nombre_tecnologico']; ?></p>


        <div class="actions">
            <button class="btn_submit_educador">1. -Registrar educador </button>
            <button class="btn_submit_programa">2.- Nuevo Programa </button>
            <button class="btn_submit_estudiante">3. -Agregar Estudiante </button>
        </div>


        <div class="datos_tec">

            <div class="info">
                <h4>Educadores:</h4>
                <div id="Educadores_tec"></div>
            </div>

            <div class="info">
                <h4>Programas:</h4>
                <div id="Programas_tec"></div>
            </div>


            <!--  <div class="info">
                <h4>Estudiantes:</h4>
                <div id="Estudiantes_tec">
                </div>


            </div> -->



        </div>


    </main>

    <!-- Modal programa -->
    <div id="modal_programa" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro</h2>
            <form id="registrationForm">
                <!-- Oculto para despues -->
                <!-- <div class="input_grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input_grupo">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div> -->

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
                    <select id="educadorSelect" name="educador" required>
                        <option value="">Selecciona un educador</option> <!-- Opción por defecto -->
                    </select>

                    <span class="tooltip">Recuerda que debes registrar primero a tus educadores:</span>
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
                    <label for="tipo_participante">Tipo de Educador:</label>
                    <select id="tipo_participante" name="tipo_participante" class="styled-select" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="estudiante Universitario">Estudiante Universitario</option>
                        <option value="docente">Docente</option>
                        <option value="externo">Externo</option>
                    </select>
                </div>

                <input type="hidden" id="id_tec" name="id_tecnologico" value="<?php echo isset($_SESSION['id_tecnologico']) ? $_SESSION['id_tecnologico'] : ''; ?>">


                <div class="input_grupo">
                    <label for="modalidad">Modalidad:</label>
                    <select id="modalidad" name="modalidad" required>
                        <option value="" select selected>Selecciona</option>
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
                    <input type="text" id="carrera" name="carrera">
                </div>

                <div class="input_grupo" id="grupo_semestre" style="display:none;">
                    <label for="semestre">Semestre:</label>
                    <input type="number" id="semestre" name="semestre">
                </div>

                <button class="submit_principal" type="btn_submit">Enviar</button>
            </form>


        </div>
    </div>

    <!-- Modal Estudiante -->
    <div id="modal_estudiante" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro - Estudiante</h2>
            <form id="registrationFormEstudiante" class="formulario_registro">
                <!-- Grupo para el campo de nombre -->
                <div class="input_grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required maxlength="255">
                </div>

                <!-- Grupo para el campo de apellidos -->
                <div class="input_grupo">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" required maxlength="255">
                </div>

                <!-- Grupo para el campo de domicilio -->
                <div class="input_grupo">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" required maxlength="255">
                </div>

                <!-- Grupo para el campo de CURP -->
                <div class="input_grupo">
                    <label for="curp">CURP:</label>
                    <input type="text" name="curp" required maxlength="18" pattern="[A-Z0-9]{18}">
                </div>

                <!-- Grupo para el campo de teléfono -->
                <div class="input_grupo">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" required pattern="[0-9]{10}" maxlength="10">
                </div>

                <!-- Grupo para el campo de correo -->
                <div class="input_grupo">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo">
                </div>

                <div class="input_grupo">
                    <label for="programa_estudiante">Programa:</label>
                    <select id="programa_estudiante" name="programa_estudiante" required>
                        <option value="">Selecciona un programa</option> <!-- Opción por defecto -->
                    </select>
                    <span class="tooltip">Recuerda que debes registrar primero los programas:</span>

                </div>





                <!-- Botón para enviar el formulario -->
                <button class="btn_submit" type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <script src="../assets/js/sweetalert.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="api/auth/login.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="./utilidades/coordinador_programa.js"></script>




</body>

</html>