CREATE TABLE `Estados`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `id_region` BIGINT NOT NULL
);
CREATE TABLE `Regiones`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL
);
CREATE TABLE `Tecnologicos`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `estado_id` BIGINT NOT NULL,
    `modalidad` VARCHAR(255) NOT NULL
);
CREATE TABLE `Coordinadores_regionales`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_usuario` BIGINT NOT NULL,
    `id_tecnologico` BIGINT NOT NULL
);
CREATE TABLE `Usuarios`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `apellido` VARCHAR(255) NOT NULL,
    `telefono` BIGINT NOT NULL,
    `correo` VARCHAR(255) NOT NULL,
    `correo_inst` VARCHAR(255) NULL,
    `contrasena` TEXT NOT NULL
);
CREATE TABLE `Roles`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `nivel_permiso` VARCHAR(255) NOT NULL
);
CREATE TABLE `Programas`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` VARCHAR(255) NOT NULL,
    `id_tecnologico` BIGINT NOT NULL,
    `id_nivel` BIGINT NOT NULL,
    `meta` BIGINT NOT NULL,
    `id_coordinador` BIGINT NOT NULL,
    `id_educador` BIGINT NOT NULL,
    `inicio_periodo` DATE NOT NULL,
    `fin_periodo` DATE NOT NULL
);
CREATE TABLE `Educadores`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_usuario` BIGINT NOT NULL,
    `tipo_participante` VARCHAR(255) NOT NULL
);
CREATE TABLE `Coordinadores_programa`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_usuario` BIGINT NOT NULL
);
CREATE TABLE `Estudiantes`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `programa_id` BIGINT NOT NULL,
    `nombre` VARCHAR(255) NOT NULL,
    `apellidos` VARCHAR(255) NOT NULL,
    `domicilio` VARCHAR(255) NOT NULL,
    `curp` VARCHAR(255) NOT NULL,
    `telefono` BIGINT NOT NULL,
    `correo` VARCHAR(255) NULL
);
CREATE TABLE `Niveles`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT NOT NULL
);
CREATE TABLE `coordinadores_nacionales`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_usuario` BIGINT NOT NULL
);
CREATE TABLE `Solicitudes`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `status` VARCHAR(255) NOT NULL,
    `id_programa` BIGINT NOT NULL,
    `id_estudiante` BIGINT NOT NULL,
    `fecha` DATE NOT NULL
);
ALTER TABLE
    `Usuarios` ADD CONSTRAINT `usuarios_id_foreign` FOREIGN KEY(`id`) REFERENCES `Educadores`(`id`);
ALTER TABLE
    `Solicitudes` ADD CONSTRAINT `solicitudes_id_programa_foreign` FOREIGN KEY(`id_programa`) REFERENCES `Programas`(`id`);
ALTER TABLE
    `Programas` ADD CONSTRAINT `programas_id_coordinador_foreign` FOREIGN KEY(`id_coordinador`) REFERENCES `Coordinadores_programa`(`id`);
ALTER TABLE
    `coordinadores_nacionales` ADD CONSTRAINT `coordinadores_nacionales_id_usuario_foreign` FOREIGN KEY(`id_usuario`) REFERENCES `Usuarios`(`id`);
ALTER TABLE
    `Coordinadores_regionales` ADD CONSTRAINT `coordinadores_regionales_id_tecnologico_foreign` FOREIGN KEY(`id_tecnologico`) REFERENCES `Tecnologicos`(`id`);
ALTER TABLE
    `Programas` ADD CONSTRAINT `programas_id_educador_foreign` FOREIGN KEY(`id_educador`) REFERENCES `Educadores`(`id`);
ALTER TABLE
    `Coordinadores_regionales` ADD CONSTRAINT `coordinadores_regionales_id_usuario_foreign` FOREIGN KEY(`id_usuario`) REFERENCES `Usuarios`(`id`);
ALTER TABLE
    `Solicitudes` ADD CONSTRAINT `solicitudes_id_estudiante_foreign` FOREIGN KEY(`id_estudiante`) REFERENCES `Estudiantes`(`id`);
ALTER TABLE
    `Tecnologicos` ADD CONSTRAINT `tecnologicos_estado_id_foreign` FOREIGN KEY(`estado_id`) REFERENCES `Estados`(`id`);
ALTER TABLE
    `Coordinadores_programa` ADD CONSTRAINT `coordinadores_programa_id_usuario_foreign` FOREIGN KEY(`id_usuario`) REFERENCES `Usuarios`(`id`);
ALTER TABLE
    `Estados` ADD CONSTRAINT `estados_id_region_foreign` FOREIGN KEY(`id_region`) REFERENCES `Regiones`(`id`);
ALTER TABLE
    `Programas` ADD CONSTRAINT `programas_id_tecnologico_foreign` FOREIGN KEY(`id_tecnologico`) REFERENCES `Tecnologicos`(`id`);
ALTER TABLE
    `Programas` ADD CONSTRAINT `programas_id_nivel_foreign` FOREIGN KEY(`id_nivel`) REFERENCES `Niveles`(`id`);