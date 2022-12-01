USE db_tienda_ropa;

CREATE TABLE prendas (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL,
    talla VARCHAR(10) NOT NULL,
    precio NUMERIC(6,2) NOT NULL,
    categoria VARCHAR(20)
);

ALTER TABLE prendas DROP COLUMN imagen;

ALTER TABLE prendas
	ADD COLUMN imagen VARCHAR(80);

ALTER TABLE prendas
	ADD CONSTRAINT chk_talla_valida 
    CHECK (talla IN ('XS', 'S', 'M', 'L', 'XL'));
    
ALTER TABLE prendas
	ADD CONSTRAINT chk_categoria_valida
    CHECK (categoria IN ('CAMISETAS', 'PANTALONES', 'ACCESORIOS'));

CREATE TABLE clientes (
	id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(20) UNIQUE NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    primer_apellido VARCHAR(40) NOT NULL,
    segundo_apellido VARCHAR(40),
    fecha_nacimiento DATE NOT NULL
);

DROP TABLE clientes_prendas;

CREATE TABLE clientes_prendas (
	id INT PRIMARY KEY AUTO_INCREMENT,
	cliente_id INT,
    prenda_id INT,
    cantidad INT,
    fecha DATE,
    CONSTRAINT clientes_prendas_cliente_fk
		FOREIGN KEY (cliente_id)
		REFERENCES clientes(id),
	CONSTRAINT clientes_prendas_prenda_fk
		FOREIGN KEY (prenda_id)
        REFERENCES prendas(id),
	CONSTRAINT chk_cantidad_valida
		CHECK (cantidad >= 1)
);

ALTER TABLE clientes_prendas
	ADD COLUMN talla VARCHAR(10);

CREATE OR REPLACE VIEW vw_clientes_prendas AS
	(SELECT c.usuario, p.nombre producto, cp.cantidad, 
		p.precio precio_unitario, cp.fecha
		FROM clientes c
		JOIN clientes_prendas cp ON c.id = cp.cliente_id
		JOIN prendas p ON p.id = cp.prenda_id);
        
SELECT * FROM vw_clientes_prendas WHERE usuario = 'miguel';

SELECT * FROM clientes;

ALTER TABLE clientes
	ADD COLUMN contrasena VARCHAR(60);

ALTER TABLE clientes
	ADD COLUMN rol VARCHAR(15);
    
ALTER TABLE clientes 
	ADD CONSTRAINT chk_rol_valido 
		CHECK (rol IN ('cliente', 'administrador'));