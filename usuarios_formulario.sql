

CREATE TABLE `usuarios_formulario` (
  `ID` int(255) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `PRIMER_APELLIDO` varchar(30) NOT NULL,
  `SEGUNDO_APELLIDO` varchar(30) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `LOG_IN` varchar(10) NOT NULL,
  `CONTRASEÑA` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `usuarios_formulario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);


