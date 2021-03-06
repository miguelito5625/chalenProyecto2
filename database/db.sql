CREATE TABLE rol
  (
     id          INT NOT NULL PRIMARY KEY auto_increment,
     rol         INT NOT NULL,
     descripcion VARCHAR(20)
  );

INSERT INTO `rol`
            (`rol`,
             `descripcion`)
VALUES      (1,
             "administrador");

INSERT INTO `rol`
            (`rol`,
             `descripcion`)
VALUES      (2,
             "usuario");

CREATE TABLE vacuna
  (
     id     INT NOT NULL PRIMARY KEY auto_increment,
     nombre VARCHAR(30) NOT NULL
  );

CREATE TABLE centro_vacunacion
  (
     id     INT NOT NULL PRIMARY KEY auto_increment,
     nombre VARCHAR(30) NOT NULL
  );

INSERT INTO `centro_vacunacion`
            (`nombre`)
VALUES      ("morales");

INSERT INTO `centro_vacunacion`
            (`nombre`)
VALUES      ("los amates");

INSERT INTO `centro_vacunacion`
            (`nombre`)
VALUES      ("puerto barrios");

CREATE TABLE usuario
  (
     id         INT NOT NULL PRIMARY KEY auto_increment,
     cui        VARCHAR(20) NOT NULL,
     nombres    VARCHAR(50) NOT NULL,
     apellidos  VARCHAR(50) NOT NULL,
     nacimiento DATE NOT NULL,
     clave      VARCHAR(200) NOT NULL,
     idrol      INT NOT NULL,
     CONSTRAINT fk_usuario_rol FOREIGN KEY (idrol) REFERENCES rol(id)
  );

CREATE TABLE grupo_vacunacion
  (
     id        INT NOT NULL PRIMARY KEY auto_increment,
     fecha1     DATE NULL,
     fecha2     DATE NULL,
     fecha3     DATE NULL,
     lugar     VARCHAR(50) NOT NULL,
     idusuario INT NOT NULL,
     idvacuna  INT NOT NULL,
     CONSTRAINT fk_grupo_vacunacion_usuario FOREIGN KEY (idusuario) REFERENCES
     usuario(id),
     CONSTRAINT fk_grupo_vacunacion_vacunas FOREIGN KEY (idvacuna) REFERENCES
     vacuna(id)
  );

CREATE OR REPLACE view vista_grupos_vacunacion
AS
  SELECT grupo_vacunacion.id AS id_grupo_vacunacion,
         grupo_vacunacion.fecha1,
         grupo_vacunacion.fecha2,
         grupo_vacunacion.fecha3,
         grupo_vacunacion.lugar,
         usuario.id          AS id_usuario,
         usuario.cui,
         usuario.nombres     AS nombres_usuario,
         usuario.apellidos   AS apellidos_usuario,
         usuario.nacimiento  AS nacimiento_usuario,
         usuario.clave  AS clave_usuario,
         usuario.idRol  AS idRol_usuario,
         vacuna.id           AS id_vacuna,
         vacuna.nombre       AS nombre_vacuna
  FROM   grupo_vacunacion
         INNER JOIN usuario ON grupo_vacunacion.idusuario = usuario.id
         INNER JOIN vacuna ON grupo_vacunacion.idvacuna = vacuna.id;