
CREATE DATABASE `bancos`;
USE `bancos`;

CREATE TABLE `banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NomBanco` varchar(100) NOT NULL,
  `TipoViaBanco` varchar(50) NOT NULL,
  `NumBanco` varchar(5) NOT NULL,
  `CPBanco` char(5) NOT NULL,
  `NomViaBanco` varchar(100) NOT NULL,
  `ProvBanco` varchar(50) NOT NULL,
  `LocalBanco` varchar(100) NOT NULL,
  `BicSwift` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `banco` WRITE;
INSERT INTO `banco` VALUES (1,'Banco Santander, S.A','Paseo','9-12','39004','De Pereda','Santander','Santander','BSCHESMMXXX'),(2,'Ibercaja Banco, S.A','Plaza','2','50008','D. Basilio Paraíso','Zaragoza','Zaragoza','CAZRES2ZXXX'),(3,'Bankinter, S.A','Paseo','29','28046','De la Castellana','Madrid','Madrid','BKBKESMMXXX'),(4,'Caixabank, S.A','Calle','2-4','46002','Pintor Sorolla','Valencia','Valencia','CAIXESBBXXX'),(5,'Cajasur Banco, S.A','Ronda','18-24','14001','De los Tejares','Córdoba','Córdoba','CSURES2CXXX'),(6,'Unicaja Banco, S.A','Avenida','10-12','29007','De Andalucía','Málaga','Málaga','UCJAES2MXXX'),(7,'Targobank, S.A','Calle','29','28043','Ramírez de Arellano','Madrid','Madrid','CMCIESMMXXX'),(8,'Open Bank, S.A','Plaza','2','28004','De Santa Bárbara','Madrid','Madrid','OPENESMMXXX'),(9,'Kutxabank, S.A','Calle','30-32','48009','Gran Vía','Bilbao','Bilbao','BASKES2BXXX'),(10,'ING Bank, S.A','Vía','1','28033','De los Poblados','Madrid','Madrid','INGDESMMXXX');

UNLOCK TABLES;

--
-- Table structure for table `empleado`
--


DROP TABLE IF EXISTS `sede`;
CREATE TABLE `sede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProvSede` varchar(50) NOT NULL,
  `LocalSede` varchar(100) NOT NULL,
  `TipoViaSede` varchar(50) NOT NULL,
  `NomViaSede` varchar(100) NOT NULL,
  `NumSede` varchar(5) NOT NULL,
  `CPSede` char(5) NOT NULL,
  `PreAnualSede` float NOT NULL,
  `RetBrutoSede` float NOT NULL,
  `CodBanco` INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`CodBanco`)
  	REFERENCES `banco` (`id`)
  	ON DELETE CASCADE
  	ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
INSERT INTO `sede` VALUES (1,'Málaga','Málaga','Calle','Lope de Rueda','108','29190',174200,214149,1),(2,'Córdoba','Córdoba','Avenida','Del Gran Capitán','44','14001',115000,116000,2),(3,'Sevilla','Sevilla','Calle','Sta. María de García','5','41003',129000,139000,3),(4,'Toledo','Toledo','Carretera','De Carlos V','10','45001',109000,99000,4),(5,'Valencia','Valencia','Carrer','De Sant Vicent de Päul','32','46009',151500,72840,5),(6,'Granada','Granada','Calle','Marcos','9','28006',74200,114149,6),(7,'Segovia','Caserío de Acedos','Calle','Ruela Calero','12','44738',54200,64201,4),(8,'Barcelona','Mataró','Avenida','Travesía Rojas','42','43227',291500,301400,7),(9,'Lleida','Agramunt','Calle','Camiño Bautista','69','81193',100940,172950,8),(10,'Álava','Pineda Baja','Avenida','Daniel Plaza','88','67483',154900,178120,9),(11,'León','León','Plaza','Tello','9','32573',89500,80100,10),(12,'Cádiz','Barbate','Paseo','Almanza','76','06267',87500,88100,1),(13,'Pontevedra','Menas del Mirador','Camino','Aleix','20','68736',152500,96100,8),(14,'Tarragona','Tarragona','Plaza','Jon Carrer','5','49123',42000,31569,4),(15,'Girona','Girona','Plaza','Cepeda','8','04302',189000,212558,7),(16,'Badajoz','Baca del\r\nPozo','Travesía','Roberto Bautista','11','66813',74900,72500,2),(17,'A Coruña','Martinez del\r\nBages','Calle','Obispo Andrés','8','25886',100100,99000,9),(18,'Vizcaya','Terrazas de San\r\nPedro','Avenida','Conde Lucanor','9','29934',16000,15000,6),(19,'Alicante','Alicante','Carrer','Salas','228','40013',125000,120000,3),(20,'Islas Baleares','Orta del\r\nBages','Plaza','Montenegro','10','37933',135000,0,2);
UNLOCK TABLES;


DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NomEmp` varchar(100) NOT NULL,
  `Ape1Emp` varchar(100) NOT NULL,
  `Ape2Emp` varchar(100) DEFAULT NULL,
  `TlfEmp` char(9) NOT NULL,
  `SuelEmp` float NOT NULL,
  `ProvEmp` varchar(50) NOT NULL,
  `LocalEmp` varchar(100) NOT NULL,
  `TipoViaEmp` varchar(50) NOT NULL,
  `NomViaEmp` varchar(100) NOT NULL,
  `NumEmp` varchar(5) NOT NULL,
  `CPEmp` char(5) NOT NULL,
  `PuestoEmp` varchar(50) NOT NULL,
  `CodSede` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`CodSede`) 
  	REFERENCES `sede` (`id`)
  	ON DELETE CASCADE
  	ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
INSERT INTO `empleado` VALUES (1,'Sancho','Bermúdez','Garriga','724562309',1500,'Málaga','Málaga','Calle','Tórtola','1','29150','Comercial',1),(2,'Narciso','Oliva','Melero','625900845',1200,'Teruel','Las Valles','Calle','Flores','61','44150','Comercial',2),(3,'Daniel','Prieto','Hijo','989606145',2200,'Burgos','Burgos','Avenida','Travesía Lázaro','91','95289','Comercial',3),(4,'Javier','Arreola','Pérez','682712566',1619,'Zamora','Zamora','Plaza','Castillo','4','34263','Comercial',3),(5,'Elsa','Barrientos','Luna','634492799',1019,'Almería','Albrucena','Calle','Emma','52','38308','Comercial',5),(6,'Lucas','Rico','Segundo','672009786',1199,'Burgos','Burgos','Camino','Flores','2','89567','Directivo',2),(7,'Francisco','Vallés',NULL,'904832166',2550,'Melilla','Melilla','Plaza','Sanabria','71','80112','Directivo',3),(8,'Hugo','Badillo','Segundo','970027834',2750,'Ourense','Ourense','Calle','Irene Delgado','31','45345','Directivo',6),(9,'Juan José','De Jesús','Ronda','925511003',2150,'Murcia','Murcia','Avenida','Alejandro\r\nDelgado','12','36840','Directivo',3),(10,'Cruz','Sarmiento','Obregón','667345651',3150,'Teruel','Teruel','Calle','Ingeniero Noa\r\nCarretero','27','57214','Directivo',7),(11,'Alma','Vergara','Prieto','692550156',2220,'Salamanca','Salamanca','Plaza','Mar','247','85175','Directivo',9),(12,'Jimena','Villagómez','Cuevas','610871108',11590,'Madrid','Madrid','Plaza','España','24','48120','Directivo',11),(13,'África','Navas','Toledano','687372354',14500,'Barcelona','Barcelona','Plaza','Rueda Gabriel','6','98961','Directivo',16),(14,'Laura','Aparicio','González','604217224',4750,'Huelva','Punta Umbría','Plaza','Samuel Castillo','3','03603','Directivo',6),(15,'Ainhoa','Rosa','Nieto','905129227',5000,'Madrid','Madrid','Calle','Escudero de Arriba','25','52825','Directivo',14),(16,'Alba','Marroquín','Huercano','933450456',2315,'Valladolid','Valladolid','Calle','Profesor Javier','92','38310','Personal de banca',18),(17,'Martí','Arenas',NULL,'953261473',3580,'Álava','Vall Jaime','Calle','Benavídez','7','76583','Personal de banca',15),(18,'Adam','Ocaso',NULL,'635321927',14750,'Girona','Vall Pichardo','Camino','Olivera','12','08244','Personal de banca',12),(19,'Juan José','Martos','Martos','682646400',1750,'Lugo','A Delarosa','Paseo','Jesús Passeig','45','63556','Personal de banca',18),(20,'Roberto','Valdivia','Mortadela','636144741',2120,'Alicante','Villaseñor','Plaza','Ruela Cobo','2','52554','Personal de banca',14),(21,'Erik','Dominguez','Pérez','607891890',1400,'Almería','Almería','Paseo','Conde Amor','1','17091','Personal de banca',19),(22,'Mario','Escobedo','Rodríguez','638301598',3400,'Toledo','Toledo','Plaza','Alejandro\r\nRamírez','212','29325','Personal de banca',14),(23,'Oliver','Luque','Moreno','704568990',2500,'Cuenca','Toledo','Calle','Ingeniero Miguel\r\nAngel Acevedo','12','65431','Gestor de riesgo',11),(24,'Ana','Rodríguez','Zurriaga','709541285',7500,'Málaga','Málaga','Calle','Adela Quigisola','24','29010','Gestor de riesgo',13),(25,'Arturo','Pérez','Cuñado','763432312',4189,'Madrid','Madrid','Plaza','Perales Segundo','45','87619','Gestor de riesgo',17);
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

