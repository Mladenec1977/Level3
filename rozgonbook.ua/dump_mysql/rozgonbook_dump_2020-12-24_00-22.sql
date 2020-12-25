-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: rozgonbook
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `author` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_author` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Андрей Богуславский'),(2,'Марк Саммерфильд'),(3,'М., Вильямс'),(4,'Уэс Маккинни'),(5,'Брюс Эккель'),(6,'Томас Кормен'),(7,'Чарльз Лейзерсон'),(8,'Рональд Ривест'),(9,'Клиффорд Штайн'),(10,'Дэвид Флэнаган'),(11,'Гэри Маклин Холл'),(12,'Джеймс Р. Грофф'),(13,'Люк Веллинг'),(14,'Сергей Мастицкий'),(15,'Джон Вудкок'),(16,'Джереми Блум'),(17,'А. Белов'),(18,'Сэмюэл Грингард'),(19,'Сет Гринберг'),(20,'Александр Сераков'),(21,'Тим Кедлек'),(22,'Пол Дейтел'),(23,'Харви Дейтел'),(24,'Роберт Мартин'),(25,'Энтони Грей'),(26,'Мартин Фаулер'),(27,'Прамодкумар Дж. Садаладж'),(28,'Джей Макгаврен'),(29,'Дрю Нейл');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author_book`
--

DROP TABLE IF EXISTS `author_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `author_book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author_book`
--

LOCK TABLES `author_book` WRITE;
/*!40000 ALTER TABLE `author_book` DISABLE KEYS */;
INSERT INTO `author_book` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,6,7),(8,6,8),(9,6,9),(10,7,10),(11,8,11),(12,9,12),(13,10,13),(14,11,14),(15,12,15),(16,13,16),(17,14,17),(18,15,18),(19,16,19),(20,17,20),(21,18,21),(22,19,22),(23,19,23),(24,20,24),(25,21,25),(26,22,26),(27,22,27),(28,23,28),(29,24,29);
/*!40000 ALTER TABLE `author_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `img` varchar(20) DEFAULT NULL,
  `book_delete` int NOT NULL DEFAULT '0',
  `data_delet` date DEFAULT NULL,
  `look` int NOT NULL DEFAULT '0',
  `click` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА',2003,'22.jpg',0,NULL,5,2),(2,'Программирование на языке Go',2000,'23.jpg',0,NULL,0,0),(3,'Толковый словарь сетевых терминов и аббревиатур',2000,'25.jpg',0,NULL,0,0),(4,'Python for Data Analysis',2000,'26.jpg',0,NULL,0,0),(5,'Thinking in Java (4th Edition)',2000,'27.jpg',0,NULL,0,0),(6,'Introduction to Algorithms',2000,'29.jpg',0,NULL,1,0),(7,'JavaScript Pocket Reference',2000,'31.jpg',0,NULL,0,0),(8,'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles',2000,'32.jpg',0,NULL,0,0),(9,'SQL: The Complete Referenc',2000,'33.jpg',0,NULL,2,0),(10,'PHP and MySQL Web Development',2000,'34.jpg',0,NULL,1,1),(11,'Статистический анализ и визуализация данных с помощью R',2000,'35.jpg',0,NULL,0,0),(12,'Computer Coding for Kid',2000,'36.jpg',0,NULL,0,0),(13,'Exploring Arduino: Tools and Techniques for Engineering Wizardry',2000,'37.jpg',0,NULL,0,0),(14,'Программирование микроконтроллеров для начинающих и не только',2000,'38.jpg',0,NULL,0,0),(15,'The Internet of Things',2000,'39.jpg',0,NULL,0,0),(16,'Sketching User Experiences: The Workbook',2000,'40.jpg',0,NULL,0,0),(17,'InDesign CS6',2000,'41.jpg',0,NULL,0,0),(18,'Адаптивный дизайн. Делаем сайты для любых устройств',2000,'42.jpg',0,NULL,0,0),(19,'Android для разработчиков',2000,'43.jpg',0,NULL,0,0),(20,'Clean Code: A Handbook of Agile Software Craftsmanship',2000,'44.jpg',0,NULL,0,0),(21,'Swift Pocket Reference: Programming for iOS and OS X',2000,'45.jpg',0,NULL,0,0),(22,'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence',2000,'46.jpg',0,NULL,0,0),(23,'Head First Ruby',2000,'47.jpg',0,NULL,0,0),(24,'Practical Vim',2000,'48.jpg',0,NULL,0,0);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `versions`
--

DROP TABLE IF EXISTS `versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `versions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `versions`
--

LOCK TABLES `versions` WRITE;
/*!40000 ALTER TABLE `versions` DISABLE KEYS */;
INSERT INTO `versions` VALUES (1,'0001_base_book.sql','2020-12-23 11:32:10'),(2,'0002_add_book.sql','2020-12-23 11:32:11'),(3,'0003_base_author.sql','2020-12-23 11:32:11'),(4,'0004_add.author.sql','2020-12-23 11:32:11'),(5,'0005_base_author_book.sql','2020-12-23 11:32:11'),(6,'0006_add_author_book.sql','2020-12-23 11:32:12');
/*!40000 ALTER TABLE `versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-23 23:22:31
