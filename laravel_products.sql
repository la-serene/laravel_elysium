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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `subcategory_id1` bigint unsigned NOT NULL,
  `subcategory_id2` bigint unsigned NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total_sales` int NOT NULL DEFAULT '0',
  `total_stock` int NOT NULL DEFAULT '0',
  `discount` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_subcategory_id1_foreign` (`subcategory_id1`),
  KEY `products_subcategory_id2_foreign` (`subcategory_id2`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_subcategory_id1_foreign` FOREIGN KEY (`subcategory_id1`) REFERENCES `subcategory1s` (`id`),
  CONSTRAINT `products_subcategory_id2_foreign` FOREIGN KEY (`subcategory_id2`) REFERENCES `subcategory2s` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (37,'Men\'s T-Shirt',3,21,5,19.99,180,370,10,'Classic men\'s t-shirt made from soft and comfortable fabric. Perfect for everyday wear.','2023-07-01 05:00:00','2023-07-10 08:30:00','/img/mtshirt1.png'),(40,'Women\'s Jeans',1,6,80,49.99,600,800,20,'Stylish women\'s jeans crafted with high-quality denim for a trendy and comfortable fit.','2023-07-07 03:45:00','2023-07-17 02:00:00','/img/wjeans1.png'),(41,'Men\'s Polo Shirt',1,3,14,34.99,300,500,10,'Classic men\'s polo shirt made from breathable fabric. Ideal for a smart casual look.','2023-07-09 09:20:00','2023-07-16 07:10:00','/img/mpolo1.png'),(42,'Women\'s Dress',1,8,27,59.99,160,300,10,'Beautiful women\'s dress designed for elegance and comfort. Perfect for special occasions and events.','2023-07-10 01:30:00','2023-07-15 12:40:00','/img/wdress1.png'),(43,'Men\'s Jacket',1,13,60,79.99,240,360,15,'Stylish men\'s jacket crafted with durable materials. Ideal for layering and adding a fashionable touch to your outfit.','2023-07-12 06:45:00','2023-07-17 10:10:00','/img/mjacket1.png'),(44,'Women\'s Skirt',2,25,109,39.99,60,200,5,'Versatile women\'s skirt with a flattering silhouette. Suitable for various occasions and easy to style.','2023-07-14 02:20:00','2023-07-16 05:30:00','/img/wskirt1.png'),(48,'Women\'s Jumpsuit',1,18,12,54.99,70,120,10,'Chic women\'s jumpsuit that combines style and comfort. Ideal for effortless fashion statements.','2023-07-22 06:20:00','2023-07-25 03:15:00','/img/wjumpsuit1.png'),(49,'Unisex Sweatpants',2,26,77,34.99,100,300,10,'Relaxed-fit unisex sweatpants made for comfort and casual style. Perfect for lounging or workouts.','2023-07-24 03:30:00','2023-07-27 08:40:00','/img/usweatpants1.png'),(50,'Women\'s Coat',3,7,135,29.99,180,250,15,'Stylish women\'s coat designed for warmth and elegance. A versatile outerwear piece for any occasion.','2023-07-26 09:40:00','2023-07-28 05:55:00','/img/wcoat1.png'),(51,'Men\'s Dress Shirt',3,2,58,39.99,90,180,10,'Classic men\'s dress shirt crafted with high-quality fabric. Suitable for formal or business attire.','2023-07-28 02:50:00','2023-07-30 07:35:00','/img/mdressshirt1.png'),(52,'Women\'s Pants',3,22,111,34.99,120,200,10,'Comfortable and versatile women\'s pants for effortless style. Can be dressed up or down for any occasion.','2023-07-30 08:10:00','2023-08-02 04:20:00','/img/wpants1.png'),(53,'Men\'s Swim Shorts',2,13,37,29.99,60,150,5,'Stylish men\'s swim shorts designed for comfort and durability. Perfect for beach or poolside activities.','2023-08-01 04:45:00','2023-08-03 09:30:00','/img/mswimshorts1.png'),(54,'Men\'s Blazer',3,16,47,59.99,100,200,10,'Sophisticated men\'s blazer for a polished and refined look. Suitable for formal events or professional settings.','2023-08-03 07:20:00','2023-08-06 03:45:00','/img/mblazer1.png'),(55,'Unisex Beanie',3,12,74,14.99,80,250,5,'Cozy unisex beanie made from soft and warm materials. Protects from cold weather while adding a stylish touch.','2023-08-05 03:35:00','2023-08-07 08:50:00','/img/ubeanie1.png'),(56,'Men\'s Sweater',1,24,98,49.99,150,300,10,'Classic men\'s sweater crafted with high-quality fabric. Provides warmth and style for any occasion.','2023-08-07 09:05:00','2023-08-09 04:15:00','/img/msweater1.png'),(58,'Unisex Backpack',1,19,99,49.99,100,200,10,'Versatile unisex backpack with ample storage and comfortable straps. Ideal for daily use or travel.','2023-09-10 04:20:00','2023-09-12 08:25:00','/img/ubackpack1.png'),(59,'Women\'s Coat',2,19,79,79.99,130,250,15,'Stylish women\'s coat designed for warmth and fashion-forward style. Perfect for colder seasons and formal occasions.','2023-09-12 08:30:00','2023-09-14 04:35:00','/img/wcoat2.png'),(60,'Men\'s T-Shirt',2,7,72,19.99,80,150,5,'Classic men\'s t-shirt made from soft and comfortable fabric. Perfect for everyday wear.','2023-09-14 02:40:00','2023-09-16 06:45:00','/img/mtshirt2.png'),(61,'Women\'s Sandals',3,9,51,29.99,100,200,10,'Stylish women\'s sandals designed for comfort and style. Ideal for casual outings or summer adventures.','2023-09-16 04:50:00','2023-09-18 08:55:00','/img/wsandals1.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-18  5:07:04
