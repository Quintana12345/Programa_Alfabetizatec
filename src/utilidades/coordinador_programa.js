$(document).ready(function () {
  // Formulario dinámico de educador
  // Mostrar campos adicionales si se selecciona "Estudiante"
  $("#tipo_participante").change(function () {
    if ($(this).val() === "estudiante") {
      $("#grupo_numero_control").show();
      $("#grupo_carrera").show();
      $("#grupo_semestre").show();
    } else {
      $("#grupo_numero_control").hide();
      $("#grupo_carrera").hide();
      $("#grupo_semestre").hide();
    }
  });

  // Asegurar que los campos estén ocultos al cargar la página si no es "estudiante"
  if ($("#tipo_participante").val() !== "estudiante") {
    $("#grupo_numero_control").hide();
    $("#grupo_carrera").hide();
    $("#grupo_semestre").hide();
  }
  // Fin de formulario educador

  // Mostrar modales al hacer clic en los botones correspondientes
  $(".btn_submit_programa").click(function () {
    $("#modal_programa").fadeIn();
  });

  $(".btn_submit_educador").click(function () {
    $("#modal_educador").fadeIn();
  });

  $(".btn_submit_estudiante").click(function () {
    $("#modal_estudiante").fadeIn();
  });

  // Cerrar los modales cuando se haga clic en el botón de cierre
  $(".close").click(function () {
    $(this).closest(".modal").fadeOut();
  });

  // Cerrar el modal si se hace clic fuera de él
  $(window).click(function (event) {
    if ($(event.target).is(".modal")) {
      $(".modal").fadeOut();
    }
  });

  // Procesar formularios de los modales (sin recargar la página)
  // Modal programa
  $("#registrationFormPrograma").submit(function (event) {
    event.preventDefault();
    $("#modal_programa").fadeOut();
  });

  // Modal educador
  $("#registrationFormEducador").submit(function (event) {
    event.preventDefault();
    $("#modal_educador").fadeOut();
  });

  // Modal estudiante
  $("#registrationFormEstudiante").submit(function (event) {
    // Prevenir el comportamiento por defecto del formulario (recarga de página)
    event.preventDefault();

    // Llamar a la función para enviar el formulario
    enviarFormularioEstudiante();

    // Cerrar el modal después de enviar el formulario
    $("#modal_estudiante").fadeOut();
  });
  // Envío de formulario de educador con AJAX
  $("#registrationFormEducador").submit(function (e) {
    e.preventDefault(); // Evita el envío tradicional del formulario

    // Recopilar los datos del formulario con FormData
    var formData = new FormData(this); // 'this' hace referencia al formulario

    // Enviar solicitud AJAX
    $.ajax({
      url: "./api/addEducador.php", // Cambiar URL según sea necesario
      type: "POST",
      data: formData,
      processData: false, // No procesar los datos, ya que se usa FormData
      contentType: false, // No establecer contentType, se ajusta automáticamente con FormData
      success: function (response) {
        var responseJson = JSON.parse(response);

        if (responseJson.success) {
          console.log(responseJson.message); // Mostrar mensaje de éxito
          Swal.fire({
            title: "¡Éxito!",
            text: responseJson.message,
            icon: "success",
            confirmButtonText: "Aceptar",
          }).then(() => {
            // Ocultar modal después de aceptar
            const modal = document.getElementById("modal_educador");

            // Opcional: reiniciar el formulario
            const formulario = document.getElementById(
              "registrationFormEducador"
            );
            formulario.reset();
          });
          obtenerEducadores();
        } else {
          Swal.fire({
            title: "Error",
            text: responseJson.message,
            icon: "error",
            confirmButtonText: "Aceptar",
          });
          console.error(responseJson.message); // Mostrar mensaje de error
        }
      },
      error: function (xhr, status, error) {
        // Manejo de errores AJAX
        Swal.fire({
          title: "Error",
          text: "Hubo un problema al procesar la solicitud.",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
        console.error(xhr.responseText); // Ver el error del servidor
      },
    });
  });
});

//envio de estudiante:
function enviarFormularioEstudiante() {
  // Crear un objeto con los datos del formulario
  const formData = {};

  // Obtener los valores del formulario usando los 'name' de los inputs
  $("#registrationFormEstudiante")
    .find("input, select") // Incluye también los elementos <select>
    .each(function () {
      const name = $(this).attr("name"); // Obtiene el 'name' del elemento
      const value = $(this).val(); // Obtiene el valor del elemento
      formData[name] = value; // Almacena en el objeto formData
    });

  // Mostrar alerta antes de enviar (usando SweetAlert)
  Swal.fire({
    title: "Enviando formulario...",
    text: "Por favor espera mientras enviamos los datos.",
    icon: "info",
    showConfirmButton: false,
    willOpen: () => {
      Swal.showLoading(); // Muestra el cargando mientras se espera la respuesta
    },
  });

  // Realizar la petición AJAX con datos en formato JSON
  $.ajax({
    url: "./api/addEstudiante.php", // Cambia esta URL por la ruta correcta en tu servidor
    type: "POST",
    contentType: "application/json", // Indicamos que el contenido será en formato JSON
    data: JSON.stringify(formData), // Convertimos el objeto formData en JSON
    success: function (response) {
      console.log(response); // Maneja la respuesta del servidor

      // Mostrar SweetAlert con el mensaje recibido desde el backend
      let responseObj = JSON.parse(response); // Asegúrate de que el servidor devuelve un JSON
      Swal.fire({
        title: responseObj.success ? "¡Éxito!" : "Error",
        text: responseObj.message, // El mensaje que el backend envía
        icon: responseObj.success ? "success" : "error",
        confirmButtonText: "Aceptar",
      });
      obtenerEstudiantes();
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud:", error); // Maneja errores
      Swal.fire({
        title: "Error",
        text: "Hubo un problema al enviar los datos.",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
    },
  });
}

// Código adicional para manejar formularios con "fetch" y carga de educadores

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registrationForm");
  const modal = document.getElementById("modal_programa");
  const closeModal = document.querySelector(".close");

  // Cerrar el modal cuando se hace clic en el botón de cierre
  closeModal.addEventListener("click", () => {
    modal.style.display = "none";
  });

  // Enviar formulario usando fetch (AJAX)
  form.addEventListener("submit", async (event) => {
    event.preventDefault(); // Evita el comportamiento predeterminado

    const formData = new FormData(form); // Recoge los datos del formulario

    // Convertir FormData a objeto simple
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });

    try {
      const response = await fetch("./api/addPrograma.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data), // Enviar como JSON
      });

      if (response.ok) {
        const result = await response.json();

        Swal.fire({
          icon: "success",
          title: "¡Éxito!",
          text: `${result.message}`,
          showConfirmButton: true,
        });

        form.reset(); // Limpiar formulario
        modal.style.display = "none"; // Cerrar modal
        obtenerProgramas();
      } else {
        const error = await response.json();
        Swal.fire({
          icon: "error",
          title: "Error",
          text: `Error al enviar el formulario: ${
            error.message || "Algo salió mal"
          }`,
          showConfirmButton: true,
        });
      }
    } catch (error) {
      // Manejar errores imprevistos
      Swal.fire({
        icon: "error",
        title: "Error inesperado",
        text: "Ocurrió un problema al enviar el formulario. Por favor, inténtalo de nuevo más tarde.",
        showConfirmButton: true,
      });
    }
  });
});

$("#programa_estudiante").on("change", function () {
  const selectedValue = $(this).val();
  console.log("Programa seleccionado:", selectedValue); // Para depurar
});

// Función para obtener los programas del Tecnológico
function obtenerProgramas() {
  // Obtener el ID del instituto desde localStorage
  const idInstituto = localStorage.getItem("tecnologico_id");

  // Verificar si el ID está disponible
  if (!idInstituto) {
    $("#Programas_tec").html(
      "<p>Error: No se encontró el ID del instituto.</p>"
    );
    console.error("ID del instituto no encontrado en localStorage.");
    return;
  }

  // Mostramos un mensaje mientras esperamos la respuesta
  $("#Programas_tec").html("<p>Cargando programas...</p>");

  // Realizar la solicitud AJAX
  $.ajax({
    url: "./api/getProgramas.php", // Ruta al endpoint que devuelve los programas
    type: "GET", // Usamos GET para obtener los datos
    data: { id_instituto: idInstituto }, // Enviamos el id del instituto como parámetro
    success: function (response) {
      try {
        // Verificar que la respuesta tenga el formato esperado
        if (response.success && response.data.length > 0) {
          let tableHTML = `
              <table id="tablaProgramas" class="display" style="width:100%">
                <thead>
                  <tr>
                  <th> Nivel</th>
                  <th>Educador</th>
                  <th>Meta</th>
                  <th>Inicio Periodo</th>
                  <th>Fin Periodo</th>
                  <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
            `;

          let selectOptionsHTML =
            '<option value="">Selecciona un programa</option>'; // Opción por defecto

          response.data.forEach((programa) => {
            // Agregar filas a la tabla
            tableHTML += `
                <tr>
                 

                  <td>${programa.nivel_nombre}</td>
                  <td>${programa.coordinador_nombre	}</td>
                  <td>${programa.meta}</td>
                  <td>${programa.inicio_periodo}</td>
                  <td>${programa.fin_periodo}</td>
                  <td>
    <a href="detalles_programa.php?id=${programa.id}">Detalles</a>
</td>
                </tr>
              `;

            // Agregar opciones al select
            selectOptionsHTML += `
                <option value="${programa.id}">${programa.nivel_nombre}: ${programa.inicio_periodo} -  ${programa.fin_periodo} </option>
              `;
          });

          tableHTML += `</tbody></table>`;

          // Insertar la tabla en el contenedor
          $("#Programas_tec").html(tableHTML);

          // Insertar las opciones en el select
          $("#programa_estudiante").html(selectOptionsHTML);

          // Inicializar DataTable
          $("#tablaProgramas").DataTable({
            paging: true,
            searching: true,
            ordering: true,
          });
        } else {
          // Si no hay programas, mostramos un mensaje adecuado
          $("#Programas_tec").html("<p>No se encontraron programas.</p>");
        }
      } catch (error) {
        // Si hubo un error al procesar la respuesta
        console.error("Error al procesar los datos:", error);
        $("#Programas_tec").html("<p>Error al procesar los programas.</p>");
      }
    },
    error: function (xhr, status, error) {
      // En caso de error con la solicitud AJAX
      console.error("Error en la solicitud:", error);
      $("#Programas_tec").html(
        "<p>Hubo un problema al obtener los programas.</p>"
      );
    },
  });
}

function obtenerEstudiantes() {
  const idInstituto = localStorage.getItem("tecnologico_id");

  if (!idInstituto) {
    $("#Estudiantes").html("<p>Error: No se encontró el ID del instituto.</p>");
    console.error("ID del instituto no encontrado en localStorage.");
    return;
  }

  $("#Estudiantes").html("<p>Cargando estudiantes...</p>");

  $.ajax({
    url: "./api/getEstudiantes.php",
    type: "GET",
    data: { id_instituto: idInstituto },
    success: function (response) {
      if (response.success && response.data.length > 0) {
        let tableHTML = `
            <table id="tablaEstudiantes" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Domicilio</th>
                  <th>CURP</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                </tr>
              </thead>
              <tbody>
          `;

        response.data.forEach((estudiante) => {
          tableHTML += `
              <tr>
                <td>${estudiante.nombre}</td>
                <td>${estudiante.apellidos}</td>
                <td>${estudiante.domicilio}</td>
                <td>${estudiante.curp}</td>
                <td>${estudiante.telefono}</td>
                <td>${estudiante.correo}</td>
              </tr>
            `;
        });

        tableHTML += `
              </tbody>
            </table>
          `;

       /*  $("#Estudiantes_tec").html(tableHTML); */

        $("#tablaEstudiantes").DataTable({
          paging: true,
          searching: true,
          ordering: true,
        });
      } else {
        $("#Estudiantes_tec").html("<p>No se encontraron estudiantes.</p>");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud:", error);
      $("#Estudiantes_tec").html(
        "<p>Hubo un problema al obtener los estudiantes.</p>"
      );
    },
  });
}

function obtenerEducadores() {
  const idInstituto = localStorage.getItem("tecnologico_id");

  if (!idInstituto) {
    $("#Educadores_tec").html(
      "<p>Error: No se encontró el ID del instituto.</p>"
    );
    console.error("ID del instituto no encontrado en localStorage.");
    return;
  }

  // Mostrar mensaje mientras se carga la información
  $("#Educadores_tec").html("<p>Cargando educadores...</p>");

  $.ajax({
    url: "./api/getEducadores.php", // Ajusta la ruta de la API
    type: "GET",
    data: { id_tecnologico: idInstituto },
    success: function (response) {
      try {
        if (response.status && response.data.length > 0) {
          // Crear las opciones para el select
          let optionsHTML = '<option value="">Selecciona un educador</option>';
          response.data.forEach((educador) => {
            optionsHTML += `
                <option value="${educador.id}">${educador.nombre} ${educador.apellido}</option>
              `;
          });

          // Actualizar el select con las nuevas opciones
          $("#educadorSelect").empty().html(optionsHTML);

          // Crear la tabla con los datos de los educadores
          let tableHTML = `
              <table id="tablaEducadores" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Modalidad</th>
                    <th>Tipo</th>
                  </tr>
                </thead>
                <tbody>
            `;

          response.data.forEach((educador) => {
            tableHTML += `
                <tr>
                  <td>${educador.id}</td>
                  <td>${educador.nombre}</td>
                  <td>${educador.apellido}</td>
                  <td>${educador.correo}</td>
                  <td>${educador.telefono}</td>
                  <td>${educador.tipo_participante}</td>
                  <td>${educador.modalidad}</td>
                </tr>
              `;
          });

          tableHTML += `
                </tbody>
              </table>
            `;

          // Actualizar el contenedor con la tabla
          $("#Educadores_tec").html(tableHTML);

          // Inicializar DataTable
          $("#tablaEducadores").DataTable({
            paging: true,
            searching: true,
            ordering: true,
          });
        } else {
          $("#Educadores_tec").html(
            `<p>${response.message || "No se encontraron educadores."}</p>`
          );
        }
      } catch (error) {
        console.error("Error al procesar los datos:", error);
        $("#Educadores_tec").html("<p>Error al procesar los educadores.</p>");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud:", error);
      $("#Educadores_tec").html(
        "<p>Hubo un problema al obtener los educadores.</p>"
      );
    },
  });
}

obtenerProgramas();
obtenerEstudiantes();
obtenerEducadores();
