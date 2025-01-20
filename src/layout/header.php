<nav class="layout_header">
    <!-- Logotipos -->
    <img src="../assets/img/logotipos/TecNM_Azteca.png" alt="Logotipo TECNM">
    <img src="../assets/img/logotipos/inea_blanco.png" alt="Logotipo INEA">

    <!-- Menú desplegable -->
    <div class="menu_layout full_center">
        <span>Menu</span>
        <img src="../assets/img/svg/menu.svg" alt="menu icon">
    </div>

    <!-- Opciones del menú -->
    <ul class="dropdown_menu hidden">
        <li class="menu_item">
            <img src="../assets/img/svg/back.svg" alt="volver icono">
            <a href="#" class="back">Volver</a>
        </li>
        <li>
            <img src="../assets/img/svg/logout.svg" alt="volver icono">
            <a href="#" class="logout">Cerrar Sesión</a>
        </li>
    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Elementos del DOM
        const menuLayout = document.querySelector('.menu_layout');
        const dropdownMenu = document.querySelector('.dropdown_menu');
        const logoutLink = document.querySelector('.logout');
        const backLink = document.querySelector('.back');

        // Mostrar/Ocultar el menú desplegable
        menuLayout.addEventListener('click', () => {
            console.log("click")
            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('show');
        });

        // Cerrar sesión
        logoutLink.addEventListener('click', (event) => {
            event.preventDefault(); // Prevenir comportamiento predeterminado

            // Realizar la solicitud AJAX al endpoint de logout
            fetch('/ruta/a/logout.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirigir al usuario a la página de inicio
                        window.location.href = '/';
                    } else {
                        alert(data.message || 'Error al cerrar sesión.');
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud de logout:', error);
                    alert('Hubo un problema al procesar la solicitud.');
                });
        });

        // Volver
        backLink.addEventListener('click', (event) => {
            event.preventDefault(); // Prevenir comportamiento predeterminado
            window.history.back(); // Volver a la página anterior
        });

        // Cerrar el menú desplegable al hacer clic fuera
        document.addEventListener('click', (event) => {
            if (!menuLayout.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>