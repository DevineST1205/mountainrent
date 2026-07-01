-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mountainrent
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `alat`
--

DROP TABLE IF EXISTS `alat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL AUTO_INCREMENT,
  `perlengkapan` varchar(50) NOT NULL,
  `1_malam` int(11) NOT NULL,
  `2_malam` int(11) NOT NULL,
  `3_malam` int(11) NOT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alat`
--

LOCK TABLES `alat` WRITE;
/*!40000 ALTER TABLE `alat` DISABLE KEYS */;
INSERT INTO `alat` VALUES (1,'Tenda 2p Double layer',25000,40000,50000),(2,'Tenda 4p Double layer',35000,45000,55000),(3,'Hydropack 10L',15000,20000,25000),(4,'Daypack 30-35L',20000,25000,30000),(5,'Semi Carrier 40-50L',25000,30000,35000),(6,'Carrier 60L',30000,35000,40000),(7,'Sepatu Hiking',25000,30000,35000),(8,'Sepatu Trail Run',20000,25000,30000),(9,'Trekking Pole',10000,15000,20000),(10,'Sleeping Bag',10000,15000,20000),(11,'Jaket Parasut',20000,25000,30000),(12,'Jaket Gorpcore',30000,35000,40000),(13,'Jaket Puffer',30000,35000,40000),(14,'Sarung Tangan',7000,8000,10000),(15,'Kompor Camping Mini',10000,15000,20000),(16,'Kompor Portable Besar',20000,25000,30000),(17,'Grill Pan',20000,25000,30000),(18,'Nesting/Cooking Set',10000,15000,20000),(19,'Gas Isi',5000,7000,10000),(20,'Lampu Tenda',10000,15000,20000),(21,'Headlamp',10000,15000,20000),(22,'Kacamata',5000,7000,8000),(23,'Topi Outdoor',7000,8000,9000),(24,'Kursi Lipat Mini',10000,15000,20000),(25,'Kursi Lipat Besar',15000,20000,25000),(26,'Meja Lipat',20000,25000,30000),(27,'Flysheet',10000,15000,20000),(28,'Hammock/Ayunan',10000,20000,25000),(29,'Matras',5000,6000,7000),(30,'Tripod',15000,20000,25000),(31,'Powerbank',10000,15000,20000);
/*!40000 ALTER TABLE `alat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penyewa`
--

DROP TABLE IF EXISTS `penyewa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penyewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `jaminan` varchar(10) DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `total_barang` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'dipinjam',
  `detail_alat` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyewa`
--

LOCK TABLES `penyewa` WRITE;
/*!40000 ALTER TABLE `penyewa` DISABLE KEYS */;
INSERT INTO `penyewa` VALUES (1,'delara ','08876453437','KTP','2026-06-03','2026-06-04',2,10,'dikembalikan',NULL),(2,'delara ','08876453437','KTP','2026-06-03','2026-06-04',2,10,'dikembalikan',NULL),(3,'delara ','08876453437','KTP','2026-06-03','2026-06-04',3,17,'dipinjam',NULL),(4,'delara ','08876453437','KTP','2026-06-03','2026-06-04',3,17,'dipinjam',NULL),(5,'delara ','08876453437','KTP','2026-06-03','2026-06-04',3,17,'dipinjam',NULL),(6,'delara ','08876453437','KTP','2026-06-03','2026-06-04',3,17000,'dipinjam',NULL),(7,'delara ','08876453437','KTP','2026-06-01','2026-06-02',0,0,'dipinjam',NULL),(8,'delara pin','08876453437','KTP','2026-06-02','2026-06-03',0,0,'dipinjam',NULL),(9,'delara pin','08876453437','SIM','2026-06-02','2026-06-03',3,45000,'dipinjam',NULL),(10,'delara pin','08876453437','SIM','2026-06-02','2026-06-03',2,20000,'dipinjam',NULL),(11,'delara pin','08876453437','SIM','2026-06-02','2026-06-03',1,7000,'dikembalikan',NULL),(12,'delara pin','08876453437','SIM','2026-06-02','2026-06-03',2,35000,'dipinjam','Kompor Camping Mini (1 buah), Sepatu Hiking (1 buah), '),(13,'Hadi','08876453437','SIM','2026-06-02','2026-06-03',3,85000,'dipinjam','Jaket Puffer (2 buah), Tenda 2p Double layer (1 buah), '),(14,'Hadi','08876453437','KTP','2026-06-02','2026-06-03',2,40000,'dipinjam','Grill Pan (2 buah), ');
/*!40000 ALTER TABLE `penyewa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-01 15:16:35
