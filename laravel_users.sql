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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint unsigned DEFAULT NULL,
  `district_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_city_id_foreign` (`city_id`),
  KEY `users_district_id_foreign` (`district_id`),
  CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'johnsmith','John','Smith','+1555555001','123 Main St','1982-07-15','johnsmith@example.com','2023-07-17 03:00:00','password1',NULL,'token1','2023-07-17 03:00:00','2023-07-17 03:00:00',1,1),(3,'janesmith','Jane','Smith','+1555555002','456 Elm St','1985-03-21','janesmith@example.com','2023-07-17 03:30:00','password2',NULL,'token2','2023-07-17 03:30:00','2023-07-17 03:30:00',2,3),(4,'davidwilson','David','Wilson','+1555555003','789 Maple Ave','1987-11-05','davidwilson@example.com','2023-07-17 04:00:00','password3',NULL,'token3','2023-07-17 04:00:00','2023-07-17 04:00:00',3,5),(5,'emilyjohnson','Emily','Johnson','+1555555004','987 Oak St','1983-04-12','emilyjohnson@example.com','2023-07-17 04:30:00','password4',NULL,'token4','2023-07-17 04:30:00','2023-07-17 04:30:00',4,7),(6,'michaeltaylor','Michael','Taylor','+1555555005','246 Pine St','1986-09-08','michaeltaylor@example.com','2023-07-17 05:00:00','password5',NULL,'token5','2023-07-17 05:00:00','2023-07-17 05:00:00',5,9),(7,'sarahmartin','Sarah','Martin','+1555555006','543 Cedar St','1984-02-17','sarahmartin@example.com','2023-07-17 05:30:00','password6',NULL,'token6','2023-07-17 05:30:00','2023-07-17 05:30:00',6,11),(8,'johncarter','John','Carter','+1555555007','789 Elmwood Dr','1981-06-24','johncarter@example.com','2023-07-17 06:00:00','password7',NULL,'token7','2023-07-17 06:00:00','2023-07-17 06:00:00',1,2),(9,'oliviamiller','Olivia','Miller','+1555555008','567 Willow Dr','1983-08-03','oliviamiller@example.com','2023-07-17 06:30:00','password8',NULL,'token8','2023-07-17 06:30:00','2023-07-17 06:30:00',2,4),(10,'danielbrown','Daniel','Brown','+1555555009','876 Oakwood Ave','1985-01-11','danielbrown@example.com','2023-07-17 07:00:00','password9',NULL,'token9','2023-07-17 07:00:00','2023-07-17 07:00:00',3,6),(11,'sophiawilson','Sophia','Wilson','+1555555010','234 Maplewood Dr','1987-05-28','sophiawilson@example.com','2023-07-17 07:30:00','password10',NULL,'token10','2023-07-17 07:30:00','2023-07-17 07:30:00',4,8),(12,'matthewdavis','Matthew','Davis','+1555555011','789 Oak Ave','1984-03-02','matthewdavis@example.com','2023-07-17 08:00:00','password11',NULL,'token11','2023-07-17 08:00:00','2023-07-17 08:00:00',5,10),(13,'isabellathompson','Isabella','Thompson','+1555555012','567 Pine Ave','1982-09-16','isabellathompson@example.com','2023-07-17 08:30:00','password12',NULL,'token12','2023-07-17 08:30:00','2023-07-17 08:30:00',6,12),(14,'ethanjones','Ethan','Jones','+1555555013','890 Cedar Ave','1981-12-08','ethanjones@example.com','2023-07-17 09:00:00','password13',NULL,'token13','2023-07-17 09:00:00','2023-07-17 09:00:00',1,3),(15,'ameliasmith','Amelia','Smith','+1555555014','123 Elmwood Dr','1983-06-19','ameliasmith@example.com','2023-07-17 09:30:00','password14',NULL,'token14','2023-07-17 09:30:00','2023-07-17 09:30:00',2,5),(16,'aidenwilson','Aiden','Wilson','+1555555015','456 Oakwood Dr','1986-02-14','aidenwilson@example.com','2023-07-17 10:00:00','password15',NULL,'token15','2023-07-17 10:00:00','2023-07-17 10:00:00',3,7),(17,'chloebrown','Chloe','Brown','+1555555016','789 Maplewood Ave','1984-08-03','chloebrown@example.com','2023-07-17 10:30:00','password16',NULL,'token16','2023-07-17 10:30:00','2023-07-17 10:30:00',4,9),(18,'jacobjohnson','Jacob','Johnson','+1555555017','987 Pine St','1981-01-27','jacobjohnson@example.com','2023-07-17 11:00:00','password17',NULL,'token17','2023-07-17 11:00:00','2023-07-17 11:00:00',5,11),(19,'sophiasmith','Sophia','Smith','+1555555018','234 Cedar St','1983-07-05','sophiasmith@example.com','2023-07-17 11:30:00','password18',NULL,'token18','2023-07-17 11:30:00','2023-07-17 11:30:00',6,13),(20,'williamjones','William','Jones','+1555555019','567 Elm Ave','1982-12-13','williamjones@example.com','2023-07-17 12:00:00','password19',NULL,'token19','2023-07-17 12:00:00','2023-07-17 12:00:00',1,4),(21,'emmawilson','Emma','Wilson','+1555555020','890 Oakwood Dr','1984-05-23','emmawilson@example.com','2023-07-17 12:30:00','password20',NULL,'token20','2023-07-17 12:30:00','2023-07-17 12:30:00',2,6);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
