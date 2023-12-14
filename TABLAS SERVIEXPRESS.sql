-- Creación de la tabla region
CREATE TABLE region (
    cod_region INT(2) unsigned  NOT NULL primary key,
    nombre_region VARCHAR(30) NOT NULL
);

-- Creación de la tabla ciudad
CREATE TABLE ciudad (
    cod_ciudad INT(4) NOT NULL primary key,
    nombre_ciudad VARCHAR(30) NOT NULL,
    region_cod_region INT(2) NOT NULL
);

-- Creación de la tabla administrador
CREATE TABLE administrador (
    numrun1 INT(8) NOT NULL,
    username VARCHAR(10) NOT NULL,
    PRIMARY KEY (numrun1)
);

-- Creación de la tabla atencion
CREATE TABLE atencion (
    id_atencion INT(5) NOT NULL,
    factura_nro_factura INT(10) UNIQUE,
    boleta_nro_boleta INT(10) UNIQUE,
    empleado_numrun1 INT(8) NOT NULL,
    cliente_numrun1 INT(8) NOT NULL,
    vehiculo_patente VARCHAR(6),
    PRIMARY KEY (id_atencion),
    CONSTRAINT arc_2 CHECK ((factura_nro_factura IS NOT NULL AND boleta_nro_boleta IS NULL) OR (boleta_nro_boleta IS NOT NULL AND factura_nro_factura IS NULL))
);

-- Creación de la tabla atencion_producto
CREATE TABLE atencion_producto (
    atencion_id_atencion INT(5) NOT NULL,
    producto_id_producto INT(5) NOT NULL,
    PRIMARY KEY (atencion_id_atencion, producto_id_producto)
);

-- Creación de la tabla boleta
CREATE TABLE boleta (
    nro_boleta INT(10) NOT NULL,
    monto_neto DECIMAL(12,2) NOT NULL,
    monto_bruto DECIMAL(12,2) NOT NULL,
    montoiva DECIMAL(10,2) NOT NULL,
    atencion_id_atencion INT(5) NOT NULL,
    PRIMARY KEY (nro_boleta),
    UNIQUE KEY (atencion_id_atencion)
);



-- Creación de la tabla cliente
CREATE TABLE cliente (
    numrun1 INT(8) NOT NULL,
    giro VARCHAR(100),
    monto_fiado DECIMAL(8,2),
    limite_fiado DECIMAL(8,2) NOT NULL,
    razon_social VARCHAR(100),
    direccion_nombre_calle VARCHAR(50) NOT NULL,
    direccion_numero INT NOT NULL,
    PRIMARY KEY (numrun1)
);

-- Creación de la tabla comuna
CREATE TABLE comuna (
    cod_comuna INT(3) NOT NULL,
    nombre_comuna VARCHAR(30) NOT NULL,
    ciudad_cod_ciudad INT(4) NOT NULL,
    PRIMARY KEY (cod_comuna)
);

-- Creación de la tabla detalle_boleta
CREATE TABLE detalle_boleta (
    nro_detalle_bol INT(2) NOT NULL,
    total_item_neto DECIMAL(9,2) NOT NULL,
    total_item_bruto DECIMAL(9,2) NOT NULL,
    cantidad INT(3) NOT NULL,
    boleta_nro_boleta INT(10) NOT NULL,
    PRIMARY KEY (nro_detalle_bol),
    FOREIGN KEY (boleta_nro_boleta) REFERENCES boleta (nro_boleta) ON DELETE CASCADE
);

-- Creación de la tabla detalle_factura
CREATE TABLE detalle_factura (
    nro_detalle_fac INT(3) NOT NULL,
    cantidad INT(3) NOT NULL,
    total_item_neto DECIMAL(12,2) NOT NULL,
    total_item_bruto DECIMAL(12,2) NOT NULL,
    unidad_medida VARCHAR(10) NOT NULL,
    monto_iva_item DECIMAL(10,2) NOT NULL,
    factura_nro_factura INT(10) NOT NULL,
    PRIMARY KEY (nro_detalle_fac),
    FOREIGN KEY (factura_nro_factura) REFERENCES factura (nro_factura) ON DELETE CASCADE
);

-- Creación de la tabla direccion
CREATE TABLE direccion (
    nombre_calle VARCHAR(50) NOT NULL,
    numero INT NOT NULL,
    comuna_cod_comuna INT(3) NOT NULL,
    PRIMARY KEY (nombre_calle, numero),
    FOREIGN KEY (comuna_cod_comuna) REFERENCES comuna (cod_comuna) ON DELETE CASCADE
);

-- Creación de la tabla empleado
CREATE TABLE empleado (
    numrun1 INT(8) NOT NULL,
    username VARCHAR(10) NOT NULL,
    perfil VARCHAR(10) NOT NULL,
    PRIMARY KEY (numrun1)
);

-- Creación de la tabla factura
CREATE TABLE factura (
    nro_factura INT(10) NOT NULL,
    fecha_fac DATE NOT NULL,
    monto_neto DECIMAL(12,2) NOT NULL,
    monto_iva DECIMAL(8,2) NOT NULL,
    monto_total DECIMAL(12,2) NOT NULL,
    atencion_id_atencion INT(5) NOT NULL,
    PRIMARY KEY (nro_factura),
    FOREIGN KEY (atencion_id_atencion) REFERENCES atencion (id_atencion) ON DELETE CASCADE
);

-- Creación de la tabla informe
CREATE TABLE informe (
    id_informe INT(4) NOT NULL,
    fecha_informe DATE NOT NULL,
    numero_dias INT(4) NOT NULL,
    tipo_informe VARCHAR(10) NOT NULL,
    monto_ventas_periodo DECIMAL(13,2) NOT NULL,
    PRIMARY KEY (id_informe)
);

-- Creación de la tabla orden_pedido
CREATE TABLE orden_pedido (
    nro_pedido INT(4) NOT NULL,
    estado VARCHAR(15) NOT NULL,
    fecha_pedido DATE NOT NULL,
    proveedor_numrun_proveedor INT(9) NOT NULL,
    PRIMARY KEY (nro_pedido),
    FOREIGN KEY (proveedor_numrun_proveedor) REFERENCES proveedor (numrun_proveedor) ON DELETE CASCADE
);

-- Creación de la tabla producto
CREATE TABLE producto (
    id_producto INT(5) NOT NULL,
    nombre_producto VARCHAR(20) NOT NULL,
    descripción VARCHAR(100),
    stock INT(5) NOT NULL,
    valor_producto DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_producto)
);

-- Creación de la tabla producto_op
CREATE TABLE producto_op (
    producto_id_producto INT(5) NOT NULL,
    orden_pedido_nro_pedido INT(4) NOT NULL,
    PRIMARY KEY (producto_id_producto, orden_pedido_nro_pedido),
    FOREIGN KEY (producto_id_producto) REFERENCES producto (id_producto) ON DELETE CASCADE,
    FOREIGN KEY (orden_pedido_nro_pedido) REFERENCES orden_pedido (nro_pedido) ON DELETE CASCADE
);

-- Creación de la tabla proveedor
CREATE TABLE proveedor (
    numrun_proveedor INT(9) NOT NULL,
    dv_run_proveedor CHAR(1) NOT NULL,
    nombre_proveedor VARCHAR(50) NOT NULL,
    telefono INT(10) NOT NULL,
    email_proveedor VARCHAR(50) NOT NULL,
    nombre_contacto VARCHAR(50),
    PRIMARY KEY (numrun_proveedor)
);


-- Creación de la tabla reserva
CREATE TABLE reserva (
    nro_reserva INT(5) NOT NULL,
    fecha_reserva DATE NOT NULL,
    hora_reserva TIME NOT NULL, -- Aquí se cambia DATE por TIME para almacenar solo la hora
    cliente_numrun1 INT(8) NOT NULL,
    PRIMARY KEY (nro_reserva),
    FOREIGN KEY (cliente_numrun1) REFERENCES cliente (numrun1) ON DELETE CASCADE
);

-- Creación de la tabla servicio
CREATE TABLE servicio (
    id_servicio INT(3) NOT NULL,
    nombre_servicio VARCHAR(30) NOT NULL,
    descripcion_servicio VARCHAR(150) NOT NULL,
    precio_servicio DECIMAL(10,2) NOT NULL,
    fecha_servicio DATE,
    atencion_id_atencion INT(5) NOT NULL,
    PRIMARY KEY (id_servicio),
    FOREIGN KEY (atencion_id_atencion) REFERENCES atencion (id_atencion) ON DELETE CASCADE
);

-- Creación de la tabla usuario
CREATE TABLE usuario (
    numrun1 INT(8) NOT NULL,
    dvrun CHAR(1) NOT NULL,
    email VARCHAR(70) NOT NULL,
    pnombre VARCHAR(30) NOT NULL,
    snombre VARCHAR(30),
    papellido VARCHAR(30) NOT NULL,
    sapellido VARCHAR(30) NOT NULL,
    telefono INT(9) NOT NULL,
    PRIMARY KEY (numrun1)
);

-- Creación de la tabla vehiculo
CREATE TABLE vehiculo (
    patente CHAR(6) NOT NULL,
    marca   VARCHAR(15) NOT NULL,
    modelo  VARCHAR(15) NOT NULL,
    color   VARCHAR(15) NOT NULL,
    PRIMARY KEY (patente)
);

-- Resto de relaciones Foreign Key se añaden aquí según sea necesario y se soporten en su versión de MySQL
