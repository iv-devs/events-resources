CREATE DATABASE IF NOT EXISTS  sitcom
        DEFAULT CHARACTER SET  utf8
              DEFAULT COLLATE  utf8_spanish_ci;

USE sitcom;

CREATE TABLE IF NOT EXISTS contrato(
    contrato_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    denominacion VARCHAR(30),
    fecha DATETIME
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS cliente(
    cliente_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    run VARCHAR(12),
    contrato INT(11),
        FOREIGN KEY (contrato) REFERENCES contrato (contrato_id)
        ON DELETE SET NULL
)ENGINE=InnoDB;





-- CREATE TABLE IF NOT EXISTS contrato(
--     contrato_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     denominacion VARCHAR(30),
--     fecha DATETIME
-- )ENGINE=InnoDB;

-- INSERT IGNORE INTO contrato (contrato_id, denominacion, fecha) 
-- VALUES   (1,'Estandar','2016-03-21')
--         ,(2,'Extendido','2018-03-30')
--         ;

-- CREATE TABLE IF NOT EXISTS cliente (
--     cliente_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     nombre VARCHAR(30),
--     run VARCHAR(12),
--     contrato INT(11),
--         FOREIGN KEY (contrato) REFERENCES contrato (contrato_id)
--         ON DELETE SET NULL
-- )ENGINE=InnoDB;

-- CREATE TABLE IF NOT EXISTS pedido(
--     pedido_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     fecha DATETIME,
--     monto INT(11),
--     cliente INT(11),
--     FOREIGN KEY cliente REFERENCES cliente (cliente_id)
--     ON DELETE SET NULL
-- ) ENGINE=InnoDB;