CREATE TABLE rol(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol INT NOT NULL,
    descripcion VARCHAR(20)
);

INSERT INTO
    `rol`(`rol`, `descripcion`)
VALUES
    (1, "Administrador");

INSERT INTO
    `rol`(`rol`, `descripcion`)
VALUES
    (2, "Usuario");

CREATE TABLE vacuna(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL
);

CREATE TABLE usuario (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cui varchar(20) NOT NULL,
    nombres varchar(50) NOT NULL,
    apellidos varchar(50) NOT NULL,
    nacimiento DATE NOT NULL,
    clave VARCHAR(200) NOT NULL,
    idRol INT NOT NULL,
    CONSTRAINT FK_usuario_rol FOREIGN KEY (idRol) REFERENCES rol(id)
);

CREATE TABLE grupo_vacunacion(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    lugar VARCHAR(50) NOT NULL,
    idUsuario INT NOT NULL,
    idVacuna INT NOT NULL,
    CONSTRAINT FK_grupo_vacunacion_usuario FOREIGN KEY (idUsuario) REFERENCES usuario(id),
    CONSTRAINT FK_grupo_vacunacion_vacunas FOREIGN KEY (idVacuna) REFERENCES vacuna(id)
);