


<?php
// Verifica si 'rol_id' está presente en la sesión
if (!isset($_SESSION['rol_id'])) {
    // Muestra la alerta y redirige a login.php
    echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Sesión Expirada',
            text: 'Por favor, inicia sesión nuevamente.',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.location.href = 'login.php';
        });
    </script>";
    exit(); // Asegura que el script se detenga aquí
}
?>

