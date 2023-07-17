CREATE DATABASE  IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `subcategory1s`
--

DROP TABLE IF EXISTS `subcategory1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategory1s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategory1s_category_id_foreign` (`category_id`),
  CONSTRAINT `subcategory1s_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory1s`
--

LOCK TABLES `subcategory1s` WRITE;
/*!40000 ALTER TABLE `subcategory1s` DISABLE KEYS */;
INSERT INTO `subcategory1s` VALUES (1,1,'Tops','2023-07-16 10:38:04','2023-07-16 10:38:04'),(2,1,'Bottoms','2023-07-16 10:38:04','2023-07-16 10:38:04'),(3,1,'Outerwear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(4,1,'Innerwear & Underwear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(5,1,'Loungewear & Home','2023-07-16 10:38:04','2023-07-16 10:38:04'),(6,1,'Accessories','2023-07-16 10:38:04','2023-07-16 10:38:04'),(7,1,'Sport Utility Wear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(8,1,'Featured','2023-07-16 10:38:04','2023-07-16 10:38:04'),(9,2,'Tops','2023-07-16 10:38:04','2023-07-16 10:38:04'),(10,2,'Bottoms','2023-07-16 10:38:04','2023-07-16 10:38:04'),(11,2,'Dresses & Skirts','2023-07-16 10:38:04','2023-07-16 10:38:04'),(12,2,'Outerwear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(13,2,'Innerwear & Underwear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(14,2,'Loungewear & Home','2023-07-16 10:38:04','2023-07-16 10:38:04'),(15,2,'Accessories','2023-07-16 10:38:04','2023-07-16 10:38:04'),(16,2,'Sport Utility Wear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(17,2,'Maternity Clothes','2023-07-16 10:38:04','2023-07-16 10:38:04'),(18,2,'Featured','2023-07-16 10:38:04','2023-07-16 10:38:04'),(19,3,'Tops','2023-07-16 10:38:04','2023-07-16 10:38:04'),(20,3,'Bottoms','2023-07-16 10:38:04','2023-07-16 10:38:04'),(21,3,'Dresses & Skirts','2023-07-16 10:38:04','2023-07-16 10:38:04'),(22,3,'Outerwear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(23,3,'Innerwear & Underwear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(24,3,'Loungewear','2023-07-16 10:38:04','2023-07-16 10:38:04'),(25,3,'Accessories','2023-07-16 10:38:04','2023-07-16 10:38:04'),(26,3,'Sport Utility Wear','2023-07-16 10:38:04','2023-07-16 10:38:04');
/*!40000 ALTER TABLE `subcategory1s` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-18  5:07:03
