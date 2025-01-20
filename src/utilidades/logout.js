document.addEventListener('DOMContentLoaded', () => {
    // Seleccionar el enlace de logout
    const logoutLink = document.querySelector('.logout');

    // Verificar si el enlace existe
    if (logoutLink) {
        logoutLink.addEventListener('click', (event) => {
            event.preventDefault(); // Prevenir la acción predeterminada del enlace

            // Realizar la solicitud AJAX al endpoint de logout
            fetch('./api/auth/logout.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json()) // Parsear la respuesta como JSON
                .then(data => {
                    if (data.success) {
                        // Redirigir a la página principal
                        window.location.href = '../index.php';
                    } else {
                        // Mostrar un mensaje de error en caso de fallo
                        alert(data.message || 'Error al cerrar sesión.');
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud de logout:', error);
                    alert('Hubo un problema al procesar la solicitud.');
                });
        });
    }
});