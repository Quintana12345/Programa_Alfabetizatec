$(document).ready(function () {
    $('.form_login').on('submit', function (e) {
      e.preventDefault(); // Evitar el envío estándar del formulario
  
      const $button = $('.btn_submit');
      const $form = $(this);
  
      // Deshabilitar el botón y mostrar un estado de carga
      $button.prop('disabled', true).text('Enviando...');
  
      // Obtener los datos del formulario
      const formData = {
        correo: $('#correo').val(),
        Contrasena: $('#Contraseña').val(),
      };
  
      // Enviar la petición AJAX
      $.ajax({
        url: '/path/to/login/endpoint', // Cambiar por la URL de tu API
        method: 'POST',
        data: formData,
        success: function (response) {
          if (response.success) {
            Swal.fire({
              icon: 'success',
              title: '¡Bienvenido!',
              text: 'Acceso exitoso. Redirigiendo...',
              timer: 2000,
              showConfirmButton: false,
            });
  
            // Redirigir después de 2 segundos
            setTimeout(() => {
              window.location.href = '/ruta/a/redirigir'; // Cambiar por la ruta destino
            }, 2000);
          } else {
            // Mostrar mensaje de error
            Swal.fire({
              icon: 'error',
              title: 'Acceso denegado',
              text: 'Correo o contraseña incorrectos.',
            });
  
            // Rehabilitar el botón
            $button.prop('disabled', false).text('Iniciar Sesión');
          }
        },
        error: function () {
          Swal.fire({
            icon: 'error',
            title: 'Error del servidor',
            text: 'No se pudo completar la solicitud. Intente nuevamente más tarde.',
          });
  
          // Rehabilitar el botón
          $button.prop('disabled', false).text('Iniciar Sesión');
        },
      });
    });
  });
  