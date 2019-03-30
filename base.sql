create table rol_usuario(
    ID int PRIMARY KEY AUTO_INCREMENT,
    Nombre varchar(40)
);

CREATE TABLE usuario
(
    ID int PRIMARY KEY AUTO_INCREMENT,
    Nombre varchar(250),
    Usuario Varchar(30),
    Contrasena text,
    Rol int
);

ALTER table usuario
ADD CONSTRAINT r_rol_user
FOREIGN KEY (Rol)
REFERENCES rol_usuario(ID);

