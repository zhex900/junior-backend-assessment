-- MySQL dump 10.13  Distrib 8.0.11, for osx10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: mindarc_assessment
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrated_data`
--

DROP TABLE IF EXISTS `migrated_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrated_data` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrated_data`
--

LOCK TABLES `migrated_data` WRITE;
/*!40000 ALTER TABLE `migrated_data` DISABLE KEYS */;
INSERT INTO `migrated_data` VALUES (113,'men_red_shirt','Mens Red Shirt','./media/1.jpeg'),(114,'women_red_blouse','Womens Red Blouse','./media/2.jpeg'),(115,'men_blue_shorts','Mens Blue Shorts','./media/3.jpeg'),(116,'women_blue_skirt','Womens Blue Skirt','./media/4.jpeg'),(117,'women_rainbow_singlet','Singlet in Rainbow Colours','./media/11.jpeg'),(118,'women_sun_one','Aviator Sunglasses','./media/14.jpeg'),(119,'women_gold_neck','Gold Necklace Chain','./media/15.jpeg'),(120,'women_iph_case','Iphone Case pink','./media/16.jpeg'),(121,'men_sam_case','Samsung Case Skulls','./media/17.jpeg'),(122,'men_black_shirt','AC/DC Shirt','');
/*!40000 ALTER TABLE `migrated_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `original_data`
--

DROP TABLE IF EXISTS `original_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `original_data` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) NOT NULL,
  `product_label` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `original_data`
--

LOCK TABLES `original_data` WRITE;
/*!40000 ALTER TABLE `original_data` DISABLE KEYS */;
INSERT INTO `original_data` VALUES (108,'red_shirt','Mens Red Shirt','m'),(109,'red_blouse','Womens Red Blouse','f'),(110,'blue_shorts','Mens Blue Shorts','m'),(111,'blue_skirt','Womens Blue Skirt','f'),(112,'rainbow_singlet','Singlet in Rainbow Colours','v'),(113,'sun_one','Aviator Sunglasses','f'),(114,'gold_neck','Gold Necklace Chain',''),(115,'iph_case','Iphone Case pink',' F'),(116,'sam_case','Samsung Case Skulls','M'),(117,'black_shirt','AC/DC Shirt','m');
/*!40000 ALTER TABLE `original_data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-18 19:11:45
