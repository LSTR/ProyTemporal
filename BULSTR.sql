-- MySQL dump 10.13  Distrib 5.1.44, for apple-darwin8.11.1 (i386)
--
-- Host: localhost    Database: cevicheria
-- ------------------------------------------------------
-- Server version	5.1.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `cevicheria`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cevicheria` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cevicheria`;

--
-- Table structure for table `bebidas`
--

DROP TABLE IF EXISTS `bebidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bebidas` (
  `id_bebidas` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_bebida` varchar(45) NOT NULL,
  `tipo_beb` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio_bebida` decimal(10,2) NOT NULL,
  `estado_Beb` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_bebidas`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bebidas`
--

LOCK TABLES `bebidas` WRITE;
/*!40000 ALTER TABLE `bebidas` DISABLE KEYS */;
INSERT INTO `bebidas` VALUES (1,'Jarra','Jarra','helada','18.00','A'),(2,'Cerveza (Cristal, Pilsen)','Personal',NULL,'7.50','A'),(3,'Cerveza (Cusqueña Malta y Cusqueña Red Lager)','Personal',NULL,'8.50','A'),(4,'Cerveza (Cusqueña Trigo Edición Limitada)','Personal',NULL,'8.50','A'),(5,'Cerveza (Cusqueña)','Personal',NULL,'8.00','A'),(6,'Cerveza (Miller y Peroni)','Personal',NULL,'10.00','A'),(7,'Chicha morada','Personal',NULL,'5.00','A'),(8,'Chicha morada','Jarra',NULL,'18.00','A'),(9,'Gaseosa (Guaraná)','Personal',NULL,'6.00','A');
/*!40000 ALTER TABLE `bebidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `cod_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cargo` char(50) NOT NULL,
  `suel_cargo` decimal(10,1) NOT NULL,
  `estado_carg` char(10) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cod_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Administrador','1600.0','A'),(2,'Cajero(a)','950.0','A'),(3,'Cocinero','950.0','A'),(4,'Mozo','600.0','A');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedido_bebidas`
--

DROP TABLE IF EXISTS `detalle_pedido_bebidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pedido_bebidas` (
  `cod_detallePedBeb` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `id_bebidas` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`cod_detallePedBeb`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedido_bebidas`
--

LOCK TABLES `detalle_pedido_bebidas` WRITE;
/*!40000 ALTER TABLE `detalle_pedido_bebidas` DISABLE KEYS */;
INSERT INTO `detalle_pedido_bebidas` VALUES (1,1,2,2),(2,1,4,2),(4,1,2,0),(5,1,2,21),(6,1,2,23),(7,1,5,23),(8,1,8,23),(9,1,2,24),(10,1,1,34),(11,1,1,35),(12,1,2,35),(13,1,3,35),(14,1,1,35),(15,1,8,36),(16,1,3,36),(17,1,2,36),(18,1,2,37),(19,1,2,37),(20,1,3,37),(21,1,3,37),(22,1,3,37),(23,1,1,37),(24,1,1,37),(25,1,1,37),(26,1,1,37),(27,1,3,38),(28,1,3,38),(29,1,3,38),(30,1,3,38),(31,1,3,38);
/*!40000 ALTER TABLE `detalle_pedido_bebidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedido_platos`
--

DROP TABLE IF EXISTS `detalle_pedido_platos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pedido_platos` (
  `cod_detallePed` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(10) NOT NULL,
  `cod_platos` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `estado_cocina` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cod_detallePed`),
  KEY `Refplatos18` (`cod_platos`),
  KEY `Refpedido36` (`id_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedido_platos`
--

LOCK TABLES `detalle_pedido_platos` WRITE;
/*!40000 ALTER TABLE `detalle_pedido_platos` DISABLE KEYS */;
INSERT INTO `detalle_pedido_platos` VALUES (5,1,1,2,'C'),(6,1,5,2,'C'),(21,1,2,2,'C'),(8,1,27,2,'C'),(12,1,1,1,'C'),(34,1,1,22,'C'),(13,1,2,1,'C'),(33,1,2,21,'C'),(16,1,1,0,'C'),(17,1,1,5,'C'),(18,1,1,6,'C'),(19,1,2,6,'C'),(32,1,3,20,'C'),(23,1,6,1,'C'),(24,1,2,18,'C'),(35,1,2,22,'C'),(36,1,5,22,'C'),(30,1,12,19,'C'),(31,1,11,19,'C'),(37,1,2,23,'C'),(38,1,5,23,'C'),(39,1,2,23,'C'),(40,1,6,23,'C'),(46,1,3,24,'C'),(45,1,1,24,'C'),(44,1,1,24,'C'),(47,1,3,25,'C'),(48,1,4,26,'C'),(49,1,1,28,'C'),(50,1,1,29,'C'),(51,1,1,30,'C'),(52,1,2,31,'C'),(58,1,15,33,'C'),(57,1,3,33,'C'),(56,1,2,33,'C'),(59,1,3,35,'C'),(60,1,2,35,'C'),(61,1,3,35,'C'),(67,1,3,36,'C'),(63,1,1,36,'C'),(64,1,1,36,'C'),(65,1,2,36,'C'),(66,1,3,36,'C'),(68,1,20,36,'C'),(69,1,1,37,'C'),(70,1,2,37,'C'),(71,1,1,38,'C'),(72,1,1,38,'C'),(73,1,2,38,'C'),(74,1,2,38,'C'),(75,1,2,38,'C');
/*!40000 ALTER TABLE `detalle_pedido_platos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesa`
--

DROP TABLE IF EXISTS `mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesa` (
  `num_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) DEFAULT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `estado_Mesa` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`num_mesa`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa`
--

LOCK TABLES `mesa` WRITE;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` VALUES (1,'','1er piso','A'),(2,NULL,'1er piso','A'),(3,NULL,'1er piso','A'),(4,NULL,'1er piso','A'),(5,NULL,'1er piso','A'),(6,NULL,'1er piso','A'),(7,NULL,'1er piso','A'),(8,NULL,'1er piso','A'),(9,NULL,'1er piso','A'),(10,NULL,'1er piso','A'),(11,NULL,'2do piso','A'),(12,NULL,'2do piso','A'),(13,NULL,'2do piso','A'),(14,NULL,'2do piso','A'),(15,NULL,'2do piso','A'),(16,NULL,'2do piso','A'),(17,NULL,'2do piso','A'),(18,NULL,'2do piso','A'),(19,NULL,'2do piso','A'),(20,NULL,'2do piso','A'),(21,NULL,'2do piso','A');
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `especificaciones` varchar(30) DEFAULT NULL,
  `cod_empleado` int(11) NOT NULL,
  `num_mesa` int(11) NOT NULL,
  `estado_Pedido` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_pedido`),
  KEY `Refpersonal2` (`cod_empleado`),
  KEY `Refmesa32` (`num_mesa`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (35,'Pagado',6,20,'E'),(34,'Finalizado',6,8,'D'),(33,'Finalizado',6,8,'D'),(32,'Cancelado',6,8,'C'),(31,'Cancelado',3,5,'C'),(28,'Cancelado',6,4,'C'),(29,'Cancelado',3,5,'C'),(30,'Cancelado',3,5,'C'),(26,'Cancelado',3,3,'C'),(25,'Cancelado',3,9,'C'),(24,'Cancelado',6,1,'C'),(22,'Cancelado',6,1,'C'),(23,'Cancelado',6,1,'C'),(36,'Finalizado',6,5,'D'),(37,'Finalizado',6,11,'D'),(38,'Pagado',6,2,'E');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `cod_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `cod_cargo` int(11) NOT NULL,
  `estado_empl` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cod_empleado`),
  KEY `Refcargo37` (`cod_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'Sergio','Rojas Urbano','Calle Hualmay A4',4,'A'),(2,'Alvaro','Acuña Ortiz','Huaura e4',3,'A'),(3,'Kathy','Grados Minaya','Moore D7',4,'A'),(5,'Administrador','Ad','min',1,'A'),(6,'Jorge','Colan','Av chancay 123',4,'A'),(7,'Jeair','Cangana','Av chancay 111',3,'A'),(9,'Cajero','Caja','Av aaa',2,'A');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platos`
--

DROP TABLE IF EXISTS `platos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `platos` (
  `cod_platos` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_plato` char(45) NOT NULL,
  `tipo_plato` varchar(45) NOT NULL,
  `descripcion` varchar(160) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado_plat` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cod_platos`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platos`
--

LOCK TABLES `platos` WRITE;
/*!40000 ALTER TABLE `platos` DISABLE KEYS */;
INSERT INTO `platos` VALUES (1,'Ceviche 3 ajíes','Piqueos Frío','','50.00','A'),(2,'Ceviche de pescado','Piqueos Fríos',NULL,'50.50','A'),(3,'Ceviche Mi Norte','Fuentes',NULL,'60.00','A'),(4,'Ceviche El Clásico','Fuentes',NULL,'60.00','A'),(5,'Ceviche Mixto','Fuentes',NULL,'50.00','A'),(6,'Conchas de San Miguel','Piqueos Fríos',NULL,'32.00','A'),(7,'Uñas de cangrejos en salsa de su elección','Piqueos Fríos',NULL,'45.00','A'),(8,'Mis ceviches','Piqueos Fríos','Ceviche de pescado, tres ajíes y premium','55.00','A'),(9,'De mis entradas','Piqueos Fríos','Causa de pulpa de cangrejo, pulpo al olivo, tiradito a su elección','48.00','A'),(10,'Piqueo huerto marino','Piqueos Fríos','Variedad de 5 tipos de ceviche, cocona, mariscos al ají, ceviche de atún.','65.00','A'),(11,'Ronda de la casa','Piqueos Fríos','Ceviche de pescado con langostinos al rocoto, pulpo al olivo.','65.00','A'),(12,'Ronda Fría','Piqueos Fríos','Ceviche de la abuela, pulpo al olivo, premium y conchas San Miguel','55.00','A'),(13,'Conchas a la parmesana','Piqueos Calientes','8 unidades','40.00','A'),(14,'Conchas al pisco','Piqueos Calientes','Conchas al abanico selecta, en una salsa de crema de ají amarillo y punto de pisco','35.00','A'),(15,'Crocante de pulpa de cangrejo','Piqueos Calientes','Enrollado de pulpa de cangrejo con espinaca y masa wantán','70.00','A'),(16,'Dedos marinos','Piqueos Calientes','8 unidades. Enrollado de pescado empanizado con relleno de pulpa de cangrejo','30.00','A'),(17,'Jalea El Clasico','Fuentes','Filete de pescado, pulpo, langostinos, calamar','65.00','A'),(18,'Parrilla de Manuel y Pepe','Piqueos Calientes','MAriscos, langostinos, pulpo, papas con mantequilla salteada, ajos y pimienta','70.00','A'),(19,'Piqueo caliente El Clásico','Piqueos Calientes','Anticucho, dedos marinos, chicharrón mixto','60.00','A'),(20,'Piqueo Crillísimo','Piqueos Calientes','Papitas rellenas de mariscos, anticucho de pescado y chicharrón de calamar','60.00','A'),(21,'Piqueo Mixto','Piqueos Calientes','Jalea de choros, causa de pulpa de cangrejo','60.00','A'),(22,'Ronda caliente','Piqueos Calientes',NULL,'40.00','A'),(23,'Caldo de Choros','Sopas',NULL,'25.00','A'),(24,'Chilcano de pescado','Sopas',NULL,'25.00','A'),(25,'Chupe de camarones','Sopas',NULL,'45.00','A'),(26,'Parihuela','Sopas',NULL,'35.00','A'),(27,'Sudado de lenguado','Sopas',NULL,'42.00','A'),(28,'Super sopa de choros y cangrejo','Sopas',NULL,'30.00','A'),(29,'Ceviche mixto','Piqueos Fríos','','18.00','A');
/*!40000 ALTER TABLE `platos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_almacen`
--

DROP TABLE IF EXISTS `productos_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_almacen` (
  `id_insumos` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProd` varchar(45) NOT NULL,
  `tipoProd` varchar(45) NOT NULL,
  `unidadProd` varchar(45) NOT NULL,
  `cantidadProd` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado_Prod` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_insumos`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_almacen`
--

LOCK TABLES `productos_almacen` WRITE;
/*!40000 ALTER TABLE `productos_almacen` DISABLE KEYS */;
INSERT INTO `productos_almacen` VALUES (1,'Aceite Mirasol','Envasados','Botella 1 L',8,'','A'),(2,'Aceite Mirasol','Envasados','Galón 5 L',3,NULL,'A'),(3,'Cebolla','Verduras','Kilo',6,NULL,'A'),(4,'Camote','Tuberculos','Kilo',8,NULL,'A'),(5,'Papa','Tuberculos','Kilo',10,NULL,'A'),(6,'Lechuga','Verduras','Kilo',6,NULL,'A'),(7,'Apio','Verduras','Kilo',2,NULL,'A'),(8,'Pimiento','Verduras','Kilo',6,NULL,'A'),(9,'Arroz','Cereales','Kilo',40,NULL,'A'),(10,'Limón','Frutas','Kilo',20,NULL,'A'),(11,'Palta','Fruta','Kilo',27,'','A');
/*!40000 ALTER TABLE `productos_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_boleta`
--

DROP TABLE IF EXISTS `tb_boleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_boleta` (
  `id_boleta` int(11) NOT NULL AUTO_INCREMENT,
  `numero_boleta` varchar(15) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `dni` int(10) NOT NULL,
  `telefono` int(15) NOT NULL,
  `id_comprobante` int(11) NOT NULL,
  PRIMARY KEY (`id_boleta`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_boleta`
--

LOCK TABLES `tb_boleta` WRITE;
/*!40000 ALTER TABLE `tb_boleta` DISABLE KEYS */;
INSERT INTO `tb_boleta` VALUES (1,'00000001','Lester luigui narvasta ramirez',472332299,9893344,2),(2,'00000002','Empresa unodostres',546596959,32543543,3),(3,'00000003','egretre',0,0,4),(4,'00000004','Lester',325453324,32432543,5),(5,'00000005','Jose Perez',44775588,8753023,10);
/*!40000 ALTER TABLE `tb_boleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_comprobante`
--

DROP TABLE IF EXISTS `tb_comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_comprobante` (
  `id_comprobante` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` char(1) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_comprobante`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comprobante`
--

LOCK TABLES `tb_comprobante` WRITE;
/*!40000 ALTER TABLE `tb_comprobante` DISABLE KEYS */;
INSERT INTO `tb_comprobante` VALUES (7,'0000-00-00','222.50','P',35),(2,'0000-00-00','222.50','P',35),(3,'0000-00-00','222.50','P',35),(4,'0000-00-00','222.50','P',35),(5,'0000-00-00','222.50','P',35),(6,'0000-00-00','222.50','P',35),(8,'2013-12-20','222.50','P',35),(9,'2013-12-20','222.50','P',35),(10,'2013-12-20','294.00','P',38);
/*!40000 ALTER TABLE `tb_comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_factura`
--

DROP TABLE IF EXISTS `tb_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(15) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `ruc` int(15) NOT NULL,
  `telefono` int(15) NOT NULL,
  `id_comprobante` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_factura`
--

LOCK TABLES `tb_factura` WRITE;
/*!40000 ALTER TABLE `tb_factura` DISABLE KEYS */;
INSERT INTO `tb_factura` VALUES (1,'00000001','etretretert',23423423,432423432,6),(2,'00000002','Empresa ABCD',44553322,12443434,7),(3,'00000003','Empresa 123',324234234,344443333,8),(4,'00000004','Industrias SA',1234567890,9894433,9);
/*!40000 ALTER TABLE `tb_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `contrasena` varchar(10) NOT NULL,
  `cod_empleado` int(11) NOT NULL,
  `esta_usu` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idUsuario`),
  KEY `Refpersonal40` (`cod_empleado`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'urbano',1,'A'),(2,'acuña',2,'A'),(3,'grados',3,'A'),(7,'123',5,'A'),(8,'jcolan',6,'A'),(9,'jeair',7,'A'),(11,'123',9,'A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_bebidas`
--

DROP TABLE IF EXISTS `v_bebidas`;
/*!50001 DROP VIEW IF EXISTS `v_bebidas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_bebidas` (
  `id_bebidas` int(11),
  `nomb_bebida` varchar(45),
  `tipo_beb` varchar(45),
  `descripcion` varchar(45),
  `precio_bebida` decimal(10,2)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_cargo`
--

DROP TABLE IF EXISTS `v_cargo`;
/*!50001 DROP VIEW IF EXISTS `v_cargo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_cargo` (
  `cod_cargo` int(11),
  `nom_cargo` char(50),
  `suel_cargo` decimal(10,1)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_detalle_pedido_bebidas`
--

DROP TABLE IF EXISTS `v_detalle_pedido_bebidas`;
/*!50001 DROP VIEW IF EXISTS `v_detalle_pedido_bebidas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_detalle_pedido_bebidas` (
  `cod_detallePedBeb` int(11),
  `cantidad` int(11),
  `id_bebidas` int(11),
  `id_pedido` int(11),
  `nomb_bebida` varchar(45),
  `tipo_beb` varchar(45),
  `descripcion` varchar(45),
  `precio_bebida` decimal(10,2),
  `especificaciones` varchar(30),
  `num_mesa` int(11),
  `cod_empleado` int(11),
  `estado_Pedido` char(1),
  `nombre` varchar(50),
  `apellido` varchar(50)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_detalle_pedido_platos`
--

DROP TABLE IF EXISTS `v_detalle_pedido_platos`;
/*!50001 DROP VIEW IF EXISTS `v_detalle_pedido_platos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_detalle_pedido_platos` (
  `cod_detallePed` int(11),
  `cantidad` int(10),
  `cod_platos` int(11),
  `id_pedido` int(11),
  `estado_cocina` char(1),
  `nomb_plato` char(45),
  `tipo_plato` varchar(45),
  `descripcion` varchar(160),
  `precio` decimal(10,2),
  `especificaciones` varchar(30),
  `num_mesa` int(11),
  `cod_empleado` int(11),
  `estado_Pedido` char(1),
  `nombre` varchar(50),
  `apellido` varchar(50)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_mesa`
--

DROP TABLE IF EXISTS `v_mesa`;
/*!50001 DROP VIEW IF EXISTS `v_mesa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_mesa` (
  `num_mesa` int(11),
  `descripcion` varchar(60),
  `ubicacion` varchar(45)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pedido`
--

DROP TABLE IF EXISTS `v_pedido`;
/*!50001 DROP VIEW IF EXISTS `v_pedido`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_pedido` (
  `id_pedido` int(11),
  `especificaciones` varchar(30),
  `num_mesa` int(11),
  `cod_empleado` int(11),
  `estado_Pedido` char(1),
  `nombre` varchar(50),
  `apellido` varchar(50)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_personal`
--

DROP TABLE IF EXISTS `v_personal`;
/*!50001 DROP VIEW IF EXISTS `v_personal`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_personal` (
  `cod_empleado` int(11),
  `nombre` varchar(50),
  `apellido` varchar(50),
  `direccion` varchar(50),
  `cod_cargo` int(11),
  `nom_cargo` char(50),
  `suel_cargo` decimal(10,1)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_platos`
--

DROP TABLE IF EXISTS `v_platos`;
/*!50001 DROP VIEW IF EXISTS `v_platos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_platos` (
  `cod_platos` int(11),
  `nomb_plato` char(45),
  `tipo_plato` varchar(45),
  `descripcion` varchar(160),
  `precio` decimal(10,2)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_productos`
--

DROP TABLE IF EXISTS `v_productos`;
/*!50001 DROP VIEW IF EXISTS `v_productos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_productos` (
  `id_insumos` int(11),
  `nombreProd` varchar(45),
  `tipoProd` varchar(45),
  `unidadProd` varchar(45),
  `cantidadProd` int(11),
  `descripcion` varchar(60)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_usuario`
--

DROP TABLE IF EXISTS `v_usuario`;
/*!50001 DROP VIEW IF EXISTS `v_usuario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_usuario` (
  `idUsuario` int(11),
  `contrasena` varchar(10),
  `cod_empleado` int(11),
  `nombre` varchar(50),
  `apellido` varchar(50),
  `direccion` varchar(50),
  `cod_cargo` int(11),
  `nom_cargo` char(50),
  `suel_cargo` decimal(10,1)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Current Database: `cevicheria`
--

USE `cevicheria`;

--
-- Final view structure for view `v_bebidas`
--

/*!50001 DROP TABLE IF EXISTS `v_bebidas`*/;
/*!50001 DROP VIEW IF EXISTS `v_bebidas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bebidas` AS select `bebidas`.`id_bebidas` AS `id_bebidas`,`bebidas`.`nomb_bebida` AS `nomb_bebida`,`bebidas`.`tipo_beb` AS `tipo_beb`,`bebidas`.`descripcion` AS `descripcion`,`bebidas`.`precio_bebida` AS `precio_bebida` from `bebidas` where (`bebidas`.`estado_Beb` = 'A') order by `bebidas`.`id_bebidas` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_cargo`
--

/*!50001 DROP TABLE IF EXISTS `v_cargo`*/;
/*!50001 DROP VIEW IF EXISTS `v_cargo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_cargo` AS select `cargo`.`cod_cargo` AS `cod_cargo`,`cargo`.`nom_cargo` AS `nom_cargo`,`cargo`.`suel_cargo` AS `suel_cargo` from `cargo` where (`cargo`.`estado_carg` = 'A') order by `cargo`.`cod_cargo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_detalle_pedido_bebidas`
--

/*!50001 DROP TABLE IF EXISTS `v_detalle_pedido_bebidas`*/;
/*!50001 DROP VIEW IF EXISTS `v_detalle_pedido_bebidas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_detalle_pedido_bebidas` AS select `dpb`.`cod_detallePedBeb` AS `cod_detallePedBeb`,`dpb`.`cantidad` AS `cantidad`,`dpb`.`id_bebidas` AS `id_bebidas`,`dpb`.`id_pedido` AS `id_pedido`,`b`.`nomb_bebida` AS `nomb_bebida`,`b`.`tipo_beb` AS `tipo_beb`,`b`.`descripcion` AS `descripcion`,`b`.`precio_bebida` AS `precio_bebida`,`pe`.`especificaciones` AS `especificaciones`,`pe`.`num_mesa` AS `num_mesa`,`pe`.`cod_empleado` AS `cod_empleado`,`pe`.`estado_Pedido` AS `estado_Pedido`,`pe`.`nombre` AS `nombre`,`pe`.`apellido` AS `apellido` from ((`detalle_pedido_bebidas` `dpb` join `v_bebidas` `b`) join `v_pedido` `pe`) where ((`b`.`id_bebidas` = `dpb`.`id_bebidas`) and (`dpb`.`id_pedido` = `pe`.`id_pedido`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_detalle_pedido_platos`
--

/*!50001 DROP TABLE IF EXISTS `v_detalle_pedido_platos`*/;
/*!50001 DROP VIEW IF EXISTS `v_detalle_pedido_platos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_detalle_pedido_platos` AS select `dpb`.`cod_detallePed` AS `cod_detallePed`,`dpb`.`cantidad` AS `cantidad`,`dpb`.`cod_platos` AS `cod_platos`,`dpb`.`id_pedido` AS `id_pedido`,`dpb`.`estado_cocina` AS `estado_cocina`,`b`.`nomb_plato` AS `nomb_plato`,`b`.`tipo_plato` AS `tipo_plato`,`b`.`descripcion` AS `descripcion`,`b`.`precio` AS `precio`,`pe`.`especificaciones` AS `especificaciones`,`pe`.`num_mesa` AS `num_mesa`,`pe`.`cod_empleado` AS `cod_empleado`,`pe`.`estado_Pedido` AS `estado_Pedido`,`pe`.`nombre` AS `nombre`,`pe`.`apellido` AS `apellido` from ((`detalle_pedido_platos` `dpb` join `v_platos` `b`) join `v_pedido` `pe`) where ((`b`.`cod_platos` = `dpb`.`cod_platos`) and (`dpb`.`id_pedido` = `pe`.`id_pedido`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_mesa`
--

/*!50001 DROP TABLE IF EXISTS `v_mesa`*/;
/*!50001 DROP VIEW IF EXISTS `v_mesa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_mesa` AS select `mesa`.`num_mesa` AS `num_mesa`,`mesa`.`descripcion` AS `descripcion`,`mesa`.`ubicacion` AS `ubicacion` from `mesa` where (`mesa`.`estado_Mesa` = 'A') order by `mesa`.`num_mesa` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pedido`
--

/*!50001 DROP TABLE IF EXISTS `v_pedido`*/;
/*!50001 DROP VIEW IF EXISTS `v_pedido`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pedido` AS select `pedido`.`id_pedido` AS `id_pedido`,`pedido`.`especificaciones` AS `especificaciones`,`pedido`.`num_mesa` AS `num_mesa`,`pedido`.`cod_empleado` AS `cod_empleado`,`pedido`.`estado_Pedido` AS `estado_Pedido`,`personal`.`nombre` AS `nombre`,`personal`.`apellido` AS `apellido` from (`pedido` join `personal` on((`pedido`.`cod_empleado` = `personal`.`cod_empleado`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_personal`
--

/*!50001 DROP TABLE IF EXISTS `v_personal`*/;
/*!50001 DROP VIEW IF EXISTS `v_personal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_personal` AS select `e`.`cod_empleado` AS `cod_empleado`,`e`.`nombre` AS `nombre`,`e`.`apellido` AS `apellido`,`e`.`direccion` AS `direccion`,`c`.`cod_cargo` AS `cod_cargo`,`c`.`nom_cargo` AS `nom_cargo`,`c`.`suel_cargo` AS `suel_cargo` from (`personal` `e` join `cargo` `c`) where ((`e`.`cod_cargo` = `c`.`cod_cargo`) and (`e`.`estado_empl` = 'A')) order by `e`.`cod_empleado` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_platos`
--

/*!50001 DROP TABLE IF EXISTS `v_platos`*/;
/*!50001 DROP VIEW IF EXISTS `v_platos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_platos` AS select `platos`.`cod_platos` AS `cod_platos`,`platos`.`nomb_plato` AS `nomb_plato`,`platos`.`tipo_plato` AS `tipo_plato`,`platos`.`descripcion` AS `descripcion`,`platos`.`precio` AS `precio` from `platos` where (`platos`.`estado_plat` = 'A') order by `platos`.`cod_platos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_productos`
--

/*!50001 DROP TABLE IF EXISTS `v_productos`*/;
/*!50001 DROP VIEW IF EXISTS `v_productos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_productos` AS select `productos_almacen`.`id_insumos` AS `id_insumos`,`productos_almacen`.`nombreProd` AS `nombreProd`,`productos_almacen`.`tipoProd` AS `tipoProd`,`productos_almacen`.`unidadProd` AS `unidadProd`,`productos_almacen`.`cantidadProd` AS `cantidadProd`,`productos_almacen`.`descripcion` AS `descripcion` from `productos_almacen` where (`productos_almacen`.`estado_Prod` = 'A') order by `productos_almacen`.`id_insumos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_usuario`
--

/*!50001 DROP TABLE IF EXISTS `v_usuario`*/;
/*!50001 DROP VIEW IF EXISTS `v_usuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_usuario` AS select `u`.`idUsuario` AS `idUsuario`,`u`.`contrasena` AS `contrasena`,`p`.`cod_empleado` AS `cod_empleado`,`p`.`nombre` AS `nombre`,`p`.`apellido` AS `apellido`,`p`.`direccion` AS `direccion`,`p`.`cod_cargo` AS `cod_cargo`,`p`.`nom_cargo` AS `nom_cargo`,`p`.`suel_cargo` AS `suel_cargo` from (`usuario` `u` join `v_personal` `p` on((`p`.`cod_empleado` = `u`.`cod_empleado`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-19 20:54:46
