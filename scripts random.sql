#Login
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
