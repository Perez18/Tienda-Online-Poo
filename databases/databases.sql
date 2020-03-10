
CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios(

id         int(255) auto_increment not null,
nombre     varchar(255) not null,
apellidos  varchar(255) ,
email      varchar(255) not null ,
password   varchar(255) not null,
rol        varchar(50) ,
imagen     varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=innoDb;


INSERT INTO usuarios VALUES(NULL,'Admin','Admin','admin','admin@admin','admin','admin',null);

CREATE TABLE categorias(

id    int(255) auto_increment not null,
nombre VARCHAR(255) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE = innoDb;

INSERT INTO categorias VALUES(null,'Manga cortas');
INSERT INTO categorias VALUES(null,'Tirantes');
INSERT INTO categorias VALUES(null,'Manga larga');
INSERT INTO categorias VALUES(null,'Sudaderas');

CREATE TABLE productos(
id  int(255) auto_increment NOT NULL ,
categoria_id  int(255) not null,
nombre varchar(255) not null,
descripcion text ,
precio   float(100,2) NOT NULL,
stock INT(255) not null,
oferta varchar(2),
fecha_registro date not null,
imagen VARCHAR(255),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_productos_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=innoDb ;

CREATE TABLE pedidos(
id  int(255) auto_increment NOT NULL ,
usuario_id  int(255) not null,
provincia varchar(255) not null,
localidad varchar(255) not null ,
direccion   varchar(255) not null ,
costo float(200,2) not null,
estado varchar(20) not null,
fecha_registro date not null,
hora time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=innoDb ;

CREATE TABLE lineas_pedidos(
id int(255) AUTO_INCREMENT NOT NULL,
pedido_id int(255) NOT NULL,
producto_id  int(255) NOT NULL,
unidades int(255) NOT NULL,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_lineas_pedidos FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_lineas_productos FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=innoDb;