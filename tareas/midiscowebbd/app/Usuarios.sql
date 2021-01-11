SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

CREATE TABLE `Usuarios` (
    `identificador` varchar(10) NOT NULL,
    `clave` varchar(15) NOT NULL,
    `nombre` varchar(20) NOT NULL,
    `email` varchar(20) NOT NULL,
    `plan` varchar(10) NOT NULL,
    `estado` varchar(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Usuarios` (`identificador`, `clave`, `nombre`, `email`, `plan`, `estado`) VALUES
('admin', '12345', 'Administrador', 'admin@system.com', '3', 'A'),
('user01', 'user01clave', 'Fernando P\u00e9rez', 'user01@gmailio.com', '0', 'A'),
('user02', 'user02clave', 'Carmen Garc\u00eda', 'user02@gmailio.com', '1', 'B'),
('yes33', 'micasa23', 'Jesica Rico', 'yes33@gmailio.com', '2', 'I'),
('user0001', 'User0001$', 'Fernando Garc\u00eda', 'cosa01@iestetuan.es', '1', 'A');

ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`identificador`);
COMMIT;