$(document).ready(function () {
  console.log("loaded");

  $("#form_login").on("submit", function (e) {
    e.preventDefault(); // Evitar el envío estándar del formulario

    const $button = $(".btn_submit");
    const $form = $(this);

    // Deshabilitar el botón y mostrar un estado de carga
    $button.prop("disabled", true).text("Enviando...");

    // Obtener los datos del formulario
    const formData = {
      correo: $("#correo").val(),
      contrasena: $("#Contraseña").val(), // Cambié el nombre de 'Contrasena' a 'contrasena' para que coincida con el nombre del input
    };

    // Enviar la petición AJAX
    $.ajax({
      url: "./api/auth/login.php", // Cambiar por la URL de tu API
      method: "POST",
      data: formData,
      success: function (response) {
        if (response.success) {
          Swal.fire({
            icon: "success",
            title: "¡Bienvenido!",
            text: "Acceso exitoso. Redirigiendo...",
            timer: 1000,
            showConfirmButton: false,
          });

          console.log(response);

          // Guardar datos en localStorage
          localStorage.setItem("user_id", response.user.id);
          localStorage.setItem("user_nombre", response.user.nombre);
          localStorage.setItem("user_apellido", response.user.apellido);
          localStorage.setItem("user_correo", response.user.correo);
          localStorage.setItem("user_rol_id", response.user.rol_id);
          localStorage.setItem("tecnologico_id", response.user.id_tecnologico);
          localStorage.setItem("id_region", response.user.id_region);
          localStorage.setItem("nombre_region", response.user.nombre_region); // Guardar nombre de la región

          localStorage.setItem(
            "tecnologico_nombre",
            response.user.nombre_tecnologico
          );

          // Redirigir según el rol usando switch
          let redirectUrl = "/"; // Ruta por defecto si no se encuentra el rol
          console.log(response.user.rol_id);

          switch (response.user.rol_id) {
            case 1:
              redirectUrl = "coordinador_nacional.php"; // Ruta para el panel de administración
              break;
            case 2:
              redirectUrl = `vista_region.php?region=${response.user.nombre_region}`;
              break;
            case 3:
              redirectUrl = "coordinador_programa.php"; // Ruta para el panel de administración
              break;

            default:
              redirectUrl = "404.php"; // Ruta por defecto en caso de un rol no reconocido
              break;
          }

          // Redirigir después de 2 segundos
          setTimeout(() => {
            window.location.href = redirectUrl; // Usamos la ruta determinada por el rol
          }, 1200);
        } else {
          // Mostrar mensaje de error si no es exitoso
          console.log("Error: ", response);
          if (response.message === "Contraseña incorrecta.") {
            Swal.fire({
              icon: "error",
              title: "Acceso denegado",
              text: "La contraseña que ingresaste es incorrecta.",
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Acceso denegado",
              text:
                response.message || "Hubo un error al procesar la solicitud.",
            });
          }

          // Si hay detalles de error adicionales, puedes mostrarlo en la consola
          if (response.error_details) {
            console.error("Detalles del error: ", response.error_details);
          }

          // Rehabilitar el botón
          $button.prop("disabled", false).text("Iniciar Sesión");
        }
      },
      error: function (xhr, status, error) {
        // Mostrar mensaje de error de servidor
        Swal.fire({
          icon: "error",
          title: "Error del servidor",
          text: "No se pudo completar la solicitud. Intente nuevamente más tarde.",
        });

        console.log("Error en la solicitud AJAX: ", error);
        console.log("Detalles del servidor: ", xhr.responseText);

        // Rehabilitar el botón
        $button.prop("disabled", false).text("Iniciar Sesión");
      },
    });
  });
});
