#LoginUsuario
DELIMITER //
CREATE OR REPLACE FUNCTION funcion_login(p_nombre VARCHAR(255), p_clave VARCHAR(255)) RETURNS INT
BEGIN
  DECLARE v_count INT;
  SELECT COUNT(*) INTO v_count FROM usuario WHERE nombre_usuario = p_nombre AND clave = p_clave;
  RETURN v_count;
END//
DELIMITER ;

#Crear procedimiento para Insertar proveedor nuevo
DELIMITER //

CREATE PROCEDURE InsertarProveedor(
    IN p_numrun_proveedor INT,
    IN p_dv_run_proveedor CHAR(1),
    IN p_nombre_proveedor VARCHAR(50),
    IN p_telefono INT,
    IN p_email_proveedor VARCHAR(50),
    IN p_nombre_contacto VARCHAR(50)
)
BEGIN
    INSERT INTO proveedor (numrun_proveedor, dv_run_proveedor, nombre_proveedor, telefono, email_proveedor, nombre_contacto)
    VALUES (p_numrun_proveedor, p_dv_run_proveedor, p_nombre_proveedor, p_telefono, p_email_proveedor, p_nombre_contacto);
END //

DELIMITER ;




#funcion para ver si existe el proveedor
DELIMITER //

CREATE FUNCTION funcion_existenciaProveedor(p_rut INT) RETURNS INT
BEGIN
  DECLARE v_count INT;
  SELECT COUNT(*) INTO v_count FROM proveedor WHERE numrun_proveedor = p_rut;
  RETURN v_count;
END;

DELIMITER ;

#Insertar cosas en pedido propducto

DELIMITER //
CREATE PROCEDURE procedimiento_registrarOrden(
    IN producto_id INT,
    IN proveedor_numrun INT
)
BEGIN
    DECLARE nro_pedido_nuevo INT;
    INSERT INTO orden_pedido (estado, fecha_pedido, proveedor_numrun_proveedor)
    VALUES ('pendiente', CURDATE(), proveedor_numrun);
    SET nro_pedido_nuevo = LAST_INSERT_ID();
    INSERT INTO producto_op (producto_id_producto, orden_pedido_nro_pedido)
    VALUES (producto_id, nro_pedido_nuevo);
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER disparador_insertar_producto_op
AFTER INSERT ON orden_pedido
FOR EACH ROW
BEGIN
    -- Actualizar la tabla producto_op con el nuevo nro_pedido
    UPDATE producto_op
    SET orden_pedido_nro_pedido = NEW.nro_pedido
    WHERE orden_pedido_nro_pedido IS NULL;
END;
//
DELIMITER ;

#LoginCliente
DELIMITER //
CREATE FUNCTION funcion_loginCliente(p_nombre int, p_clave int) RETURNS INT
BEGIN
  DECLARE v_count INT;
  SELECT COUNT(*) INTO v_count FROM cliente WHERE numrun1 = p_nombre AND numrun1 = p_clave;
  RETURN v_count;
END//
DELIMITER ;

#crear reserva
DELIMITER //

CREATE PROCEDURE procedimiento_registrarReserva(
    IN p_fecha_reserva DATE,
    IN p_hora_reserva TIME,
    IN p_cliente_numrun INT
)
BEGIN
    INSERT INTO reserva (fecha_reserva, hora_reserva, cliente_numrun1)
    VALUES (p_fecha_reserva, p_hora_reserva, p_cliente_numrun);
END;

//

DELIMITER ;


#Insertar Cliente
DELIMITER //
CREATE PROCEDURE InsertarCliente(
    IN p_numrun_cliente INT,
    IN p_giro_cliente varchar(100),
    IN p_monto_fiado decimal(8,0),
    IN p_limite_fiado decimal(8,0),
    IN p_razon_social VARCHAR(100),
    IN p_direccion_nombre_calle VARCHAR(50),
    in p_direccion_numero int
)
BEGIN
    INSERT INTO cliente (numrun1, giro, monto_fiado, limite_fiado, razon_social, direccion_nombre_calle,direccion_numero)
    VALUES (p_numrun_cliente, p_giro_cliente, 0, p_limite_fiado, p_razon_social, p_direccion_nombre_calle, p_direccion_numero);
END //

DELIMITER ;