-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: projeto_01
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_admin.online`
--

DROP TABLE IF EXISTS `tb_admin.online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin.online`
--

LOCK TABLES `tb_admin.online` WRITE;
/*!40000 ALTER TABLE `tb_admin.online` DISABLE KEYS */;
INSERT INTO `tb_admin.online` VALUES (69,'::1','2023-06-12 12:01:07','648732d008b1e');
/*!40000 ALTER TABLE `tb_admin.online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_admin.usuarios`
--

DROP TABLE IF EXISTS `tb_admin.usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin.usuarios`
--

LOCK TABLES `tb_admin.usuarios` WRITE;
/*!40000 ALTER TABLE `tb_admin.usuarios` DISABLE KEYS */;
INSERT INTO `tb_admin.usuarios` VALUES (1,'admin','admin','Bandeira_de_Pernambuco.svg.png','Administrador',2),(4,'caina','caina','645e84558a552.jpg','Cainã Micael',1),(5,'lira','lira','64873155ca118.jpg','Willian Lira',1);
/*!40000 ALTER TABLE `tb_admin.usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_admin.visitas`
--

DROP TABLE IF EXISTS `tb_admin.visitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin.visitas`
--

LOCK TABLES `tb_admin.visitas` WRITE;
/*!40000 ALTER TABLE `tb_admin.visitas` DISABLE KEYS */;
INSERT INTO `tb_admin.visitas` VALUES (1,'::1','2023-05-11'),(4,'::1','2023-05-11'),(5,'::1','2023-05-12'),(6,'::1','2023-05-12'),(7,'::1','2023-05-12'),(8,'::1','2023-05-13'),(9,'::1','2023-05-13'),(10,'::1','2023-05-13'),(11,'::1','2023-05-15'),(12,'::1','2023-05-16'),(13,'::1','2023-05-16'),(14,'::1','2023-05-16'),(15,'::1','2023-05-16'),(16,'::1','2023-05-18'),(17,'::1','2023-06-12'),(18,'::1','2023-06-12'),(19,'::1','2023-06-12');
/*!40000 ALTER TABLE `tb_admin.visitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_site.depoimentos`
--

DROP TABLE IF EXISTS `tb_site.depoimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_site.depoimentos`
--

LOCK TABLES `tb_site.depoimentos` WRITE;
/*!40000 ALTER TABLE `tb_site.depoimentos` DISABLE KEYS */;
INSERT INTO `tb_site.depoimentos` VALUES (29,'Guilherme','Muito bom o serviço','18/03/2023',4),(30,'Josival','Excelente conteúdo','18/05/2023',2),(31,'Rulianderson','Encontrei tudo o que eu precisava','18/05/2023',1),(32,'Edriano','Gostei muito','16/04/2023',3),(34,'Sidicley','Top ','16/08/2022',34),(35,'Djalma Severino','Comprei uma 125cc para fazer trilha. Levei em tião, ele mudou o motor e agora a minha moto tem 600cc, e sobe qualquer morro em 5º marcha','12/06/2023',35),(36,'Silverlando Lourival','Levei a minha santa fé para tião resolver o problema de consumo que ela tinha. Ele tirou 3 bicos injetores e hoje ela está mais econômica  que um kwid a gás.  Só gratidão a ele!','12/06/2023',36),(37,'Rui Orleans','O ultraleve do meu genro estava comprometido, pois enquanto voava, colidiu com um pombo. Tião foi lá na casa dele, e concertou o trinco na asa com massa plástica e durepox.','12/06/2023',37);
/*!40000 ALTER TABLE `tb_site.depoimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_site.servicos`
--

DROP TABLE IF EXISTS `tb_site.servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_site.servicos`
--

LOCK TABLES `tb_site.servicos` WRITE;
/*!40000 ALTER TABLE `tb_site.servicos` DISABLE KEYS */;
INSERT INTO `tb_site.servicos` VALUES (7,'Elética automotiva',7),(8,'Mecânica automotiva',8),(9,'Funilaria',9),(10,'Grande Artifício da Mecânica Brasileira Inventada para Arrumar, Recuperar ou Realizar Algo (GAMBIARRA)',10),(11,'Concerto de Ar-Condicionado e Compressores',11),(12,'Restauração de pneu careca',12),(13,'Instalação de turbina automotiva',14),(14,'Sucataria em geral',13);
/*!40000 ALTER TABLE `tb_site.servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_site.slides`
--

DROP TABLE IF EXISTS `tb_site.slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_site.slides`
--

LOCK TABLES `tb_site.slides` WRITE;
/*!40000 ALTER TABLE `tb_site.slides` DISABLE KEYS */;
INSERT INTO `tb_site.slides` VALUES (12,'Bandeira do Brasil','646636ce56416.jpg',13),(13,'Imagem Duvidosa','646633d0bec49.jpg',12),(14,'Imagem 3','64873194ee2e8.jpg',14);
/*!40000 ALTER TABLE `tb_site.slides` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-12 12:04:54
