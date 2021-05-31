-- MySQL dump 10.13  Distrib 8.0.22, for osx10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: cms_dev
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `classes_infos`
--

DROP TABLE IF EXISTS `classes_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classes_infos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_id` varchar(32) DEFAULT NULL,
  `school_id` int DEFAULT NULL COMMENT '學校ID',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '班級名稱',
  `teacher_id` int DEFAULT NULL COMMENT '帶班教師ID',
  `teacher_assistant_id` int DEFAULT NULL COMMENT '助教ID',
  `substitute_teacher_id` int DEFAULT NULL COMMENT '代課教師ID',
  `teaching_material_1` int DEFAULT NULL COMMENT '教材1_ID',
  `teaching_material_2` int DEFAULT NULL COMMENT '教材2_ID',
  `teaching_material_3` int DEFAULT NULL COMMENT '教材3_ID',
  `teaching_material_4` int DEFAULT NULL COMMENT '教材4_ID',
  `period_start_date` date DEFAULT NULL COMMENT '本期開始日',
  `period_end_date` date DEFAULT NULL COMMENT '本期結束日',
  `calss_start_date` date DEFAULT NULL COMMENT '上課開始日',
  `class_schedule` varchar(255) DEFAULT NULL COMMENT '上課時段',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '建立日期',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '最後更新日期',
  `status` int DEFAULT '1' COMMENT '狀態:1啟用2關閉',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes_infos`
--

LOCK TABLES `classes_infos` WRITE;
/*!40000 ALTER TABLE `classes_infos` DISABLE KEYS */;
INSERT INTO `classes_infos` (`id`, `class_id`, `school_id`, `name`, `teacher_id`, `teacher_assistant_id`, `substitute_teacher_id`, `teaching_material_1`, `teaching_material_2`, `teaching_material_3`, `teaching_material_4`, `period_start_date`, `period_end_date`, `calss_start_date`, `class_schedule`, `created_at`, `updated_at`, `status`) VALUES (1,NULL,NULL,'test1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-01','2020-12-23','2020-12-09','早上','2020-12-12 23:40:32','2020-12-13 00:47:38',1),(2,NULL,NULL,'test2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-01','2020-12-08','2020-12-23','下午','2020-12-13 00:34:44','2020-12-13 00:47:52',1);
/*!40000 ALTER TABLE `classes_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_template`
--

DROP TABLE IF EXISTS `email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_template` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_template`
--

LOCK TABLES `email_template` WRITE;
/*!40000 ALTER TABLE `email_template` DISABLE KEYS */;
INSERT INTO `email_template` (`id`, `created_at`, `updated_at`, `content`, `name`, `subject`) VALUES (1,NULL,NULL,'<!DOCTYPE html>\n                <html lang=\"en\">\n                <head>\n                    <meta charset=\"utf-8\">\n                    <meta name=\"viewport\" content=\"width=device-width\">\n                    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \n                    <meta name=\"x-apple-disable-message-reformatting\">\n                    <title>Example</title>\n                    <style>\n                        body {\n                            background-color:#fff;\n                            color:#222222;\n                            margin: 0px auto;\n                            padding: 0px;\n                            height: 100%;\n                            width: 100%;\n                            font-weight: 400;\n                            font-size: 15px;\n                            line-height: 1.8;\n                        }\n                        .continer{\n                            width:400px;\n                            margin-left:auto;\n                            margin-right:auto;\n                            background-color:#efefef;\n                            padding:30px;\n                        }\n                        .btn{\n                            padding: 5px 15px;\n                            display: inline-block;\n                        }\n                        .btn-primary{\n                            border-radius: 3px;\n                            background: #0b3c7c;\n                            color: #fff;\n                            text-decoration: none;\n                        }\n                        .btn-primary:hover{\n                            border-radius: 3px;\n                            background: #4673ad;\n                            color: #fff;\n                            text-decoration: none;\n                        }\n                    </style>\n                </head>\n                <body>\n                    <div class=\"continer\">\n                        <h1>Lorem ipsum dolor</h1>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea <strong>commodo consequat</strong>. \n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n                        </p>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <a href=\"#\">tempor incididunt ut labore</a> et dolore magna aliqua.\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n                        </p>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n                        </p>\n                        <a href=\"#\" class=\"btn btn-primary\">Lorem ipsum dolor</a>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\n                            Ut enim ad minim veniam, quis nostrud exercitation <a href=\"#\">ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. \n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n                        </p>\n                    </div>\n                </body>\n                </html>','Example E-mail','Example E-mail');
/*!40000 ALTER TABLE `email_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `folder`
--

DROP TABLE IF EXISTS `folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `folder` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int unsigned DEFAULT NULL,
  `resource` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folder`
--

LOCK TABLES `folder` WRITE;
/*!40000 ALTER TABLE `folder` DISABLE KEYS */;
INSERT INTO `folder` (`id`, `created_at`, `updated_at`, `name`, `folder_id`, `resource`) VALUES (1,NULL,NULL,'root',NULL,NULL),(2,NULL,NULL,'resource',1,1),(3,NULL,NULL,'documents',1,NULL),(4,NULL,NULL,'graphics',1,NULL),(5,NULL,NULL,'other',1,NULL);
/*!40000 ALTER TABLE `folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `pagination` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
INSERT INTO `form` (`id`, `created_at`, `updated_at`, `name`, `table_name`, `read`, `edit`, `add`, `delete`, `pagination`) VALUES (3,'2020-12-21 04:53:24','2020-12-21 05:47:08','總校屬性分類','school_category',1,1,1,1,10),(7,'2021-01-16 07:52:52','2021-01-16 08:01:21','題庫分級設定','myway_topic_levels',1,1,1,1,10),(8,'2021-01-16 09:38:49','2021-01-16 09:40:07','題庫類型列表','myway_topic_types',0,0,0,0,10);
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_field`
--

DROP TABLE IF EXISTS `form_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_field` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browse` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `relation_table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int unsigned NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_field`
--

LOCK TABLES `form_field` WRITE;
/*!40000 ALTER TABLE `form_field` DISABLE KEYS */;
INSERT INTO `form_field` (`id`, `created_at`, `updated_at`, `name`, `type`, `browse`, `read`, `edit`, `add`, `relation_table`, `relation_column`, `form_id`, `column_name`) VALUES (13,'2020-12-21 04:53:24','2020-12-21 04:53:24','分類名稱','text',1,1,1,1,NULL,NULL,3,'name'),(14,'2020-12-21 04:53:24','2020-12-21 04:59:53','分類說明','text_area',1,1,1,1,NULL,NULL,3,'description'),(15,'2020-12-21 04:53:24','2020-12-21 05:03:05','建立時間','datetime-local',1,1,0,0,NULL,NULL,3,'created_at'),(16,'2020-12-21 04:53:24','2020-12-21 05:33:01','最後更新時間','datetime-local',1,1,0,0,NULL,NULL,3,'updated_at'),(17,'2020-12-21 04:53:24','2020-12-21 05:02:35','deleted_at','datetime-local',0,0,0,0,NULL,NULL,3,'deleted_at'),(34,'2021-01-16 07:52:52','2021-01-16 07:53:24','分級名稱','text',1,1,1,1,NULL,NULL,7,'name'),(35,'2021-01-16 07:52:52','2021-01-16 08:01:21','建立日期','datetime-local',1,1,0,0,NULL,NULL,7,'created_at'),(36,'2021-01-16 07:52:52','2021-01-16 08:01:21','最後更新時間','datetime-local',1,0,0,0,NULL,NULL,7,'updated_at'),(37,'2021-01-16 09:38:49','2021-01-16 09:38:49','類型名稱','checkbox',1,0,0,0,NULL,NULL,8,'type_name'),(38,'2021-01-16 09:38:49','2021-01-16 09:40:07','建立日期','checkbox',1,0,0,0,NULL,NULL,8,'created_at'),(39,'2021-01-16 09:38:49','2021-01-16 09:40:07','最後更新時間','checkbox',1,0,0,0,NULL,NULL,8,'updated_at');
/*!40000 ALTER TABLE `form_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint unsigned NOT NULL,
  `uuid` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_role`
--

DROP TABLE IF EXISTS `menu_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menus_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_role`
--

LOCK TABLES `menu_role` WRITE;
/*!40000 ALTER TABLE `menu_role` DISABLE KEYS */;
INSERT INTO `menu_role` (`id`, `role_name`, `menus_id`) VALUES (4,'admin',2),(5,'admin',3),(6,'admin',4),(7,'admin',5),(8,'admin',6),(9,'admin',7),(10,'admin',8),(11,'admin',9),(12,'admin',10),(15,'user',13),(16,'admin',13),(17,'user',14),(18,'admin',14),(19,'user',15),(20,'admin',15),(21,'user',16),(22,'admin',16),(23,'user',17),(24,'admin',17),(25,'user',18),(26,'admin',18),(27,'user',19),(28,'admin',19),(29,'user',20),(30,'admin',20),(33,'user',22),(34,'admin',22),(35,'user',23),(36,'admin',23),(37,'user',24),(38,'admin',24),(39,'user',25),(40,'admin',25),(41,'user',26),(42,'admin',26),(43,'user',27),(44,'admin',27),(45,'user',28),(46,'admin',28),(47,'user',29),(48,'admin',29),(49,'user',30),(50,'admin',30),(51,'user',31),(52,'admin',31),(53,'user',32),(54,'admin',32),(55,'user',33),(56,'admin',33),(57,'user',34),(58,'admin',34),(59,'user',35),(60,'admin',35),(61,'user',36),(62,'admin',36),(63,'user',37),(64,'admin',37),(65,'user',38),(66,'admin',38),(67,'user',39),(68,'admin',39),(69,'user',40),(70,'admin',40),(71,'user',41),(72,'admin',41),(73,'user',42),(74,'admin',42),(75,'user',43),(76,'admin',43),(77,'user',44),(78,'admin',44),(79,'user',45),(80,'admin',45),(81,'user',46),(82,'admin',46),(83,'user',47),(84,'admin',47),(85,'user',48),(86,'admin',48),(87,'user',49),(88,'admin',49),(93,'user',52),(94,'admin',52),(95,'user',53),(96,'admin',53),(106,'guest',57),(107,'user',57),(108,'admin',57),(109,'user',58),(110,'admin',58),(111,'admin',59),(112,'admin',60),(113,'admin',61),(114,'admin',62),(115,'admin',63),(116,'admin',64),(117,'admin',65),(120,'admin',66),(121,'mywayAdmin',66),(122,'schoolAdmin',66),(123,'admin',67),(124,'mywayAdmin',67),(125,'schoolAdmin',67),(126,'admin',68),(127,'mywayAdmin',68),(128,'schoolAdmin',68),(132,'admin',56),(133,'admin',1),(136,'admin',69),(137,'mywayAdmin',69),(138,'admin',70),(139,'mywayAdmin',70),(140,'admin',71),(141,'mywayAdmin',71),(164,'admin',73),(165,'mywayAdmin',73),(166,'admin',74),(167,'mywayAdmin',74),(168,'admin',75),(169,'mywayAdmin',75),(170,'admin',72),(171,'mywayAdmin',72),(178,'admin',78),(179,'mywayAdmin',78),(182,'admin',21),(183,'user',21),(184,'admin',80),(185,'admin',81),(186,'admin',82),(189,'admin',76),(190,'mywayAdmin',76),(191,'admin',79),(192,'mywayAdmin',79);
/*!40000 ALTER TABLE `menu_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menulist`
--

DROP TABLE IF EXISTS `menulist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menulist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menulist`
--

LOCK TABLES `menulist` WRITE;
/*!40000 ALTER TABLE `menulist` DISABLE KEYS */;
INSERT INTO `menulist` (`id`, `name`) VALUES (1,'sidebar menu'),(2,'top menu'),(3,'邁威選單');
/*!40000 ALTER TABLE `menulist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `menu_id` int unsigned NOT NULL,
  `sequence` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `name`, `href`, `icon`, `slug`, `parent_id`, `menu_id`, `sequence`) VALUES (1,'Dashboard','/','cil-speedometer','link',NULL,1,1),(2,'Settings',NULL,'cil-calculator','dropdown',NULL,1,2),(3,'Notes','/notes',NULL,'link',2,1,3),(4,'Users','/users',NULL,'link',2,1,4),(5,'Edit menu','/menu/menu',NULL,'link',2,1,5),(6,'Edit menu elements','/menu/element',NULL,'link',2,1,6),(7,'Edit roles','/roles',NULL,'link',2,1,7),(8,'Media','/media',NULL,'link',2,1,8),(9,'BREAD','/bread',NULL,'link',2,1,9),(10,'Email','/mail',NULL,'link',2,1,10),(13,'Theme',NULL,NULL,'title',NULL,1,13),(14,'Colors','/colors','cil-drop1','link',NULL,1,14),(15,'Typography','/typography','cil-pencil','link',NULL,1,15),(16,'Base',NULL,'cil-puzzle','dropdown',NULL,1,16),(17,'Breadcrumb','/base/breadcrumb',NULL,'link',16,1,17),(18,'Cards','/base/cards',NULL,'link',16,1,18),(19,'Carousel','/base/carousel',NULL,'link',16,1,19),(20,'Collapse','/base/collapse',NULL,'link',16,1,20),(21,'Forms','/base/forms','cil-notes','dropdown',NULL,1,21),(22,'Jumbotron','/base/jumbotron',NULL,'link',16,1,22),(23,'List group','/base/list-group',NULL,'link',16,1,23),(24,'Navs','/base/navs',NULL,'link',16,1,24),(25,'Pagination','/base/pagination',NULL,'link',16,1,25),(26,'Popovers','/base/popovers',NULL,'link',16,1,26),(27,'Progress','/base/progress',NULL,'link',16,1,27),(28,'Scrollspy','/base/scrollspy',NULL,'link',16,1,28),(29,'Switches','/base/switches',NULL,'link',16,1,29),(30,'Tables','/base/tables',NULL,'link',16,1,30),(31,'Tabs','/base/tabs',NULL,'link',16,1,31),(32,'Tooltips','/base/tooltips',NULL,'link',16,1,32),(33,'Buttons',NULL,'cil-cursor','dropdown',NULL,1,33),(34,'Buttons','/buttons/buttons',NULL,'link',33,1,34),(35,'Buttons Group','/buttons/button-group',NULL,'link',33,1,35),(36,'Dropdowns','/buttons/dropdowns',NULL,'link',33,1,36),(37,'Brand Buttons','/buttons/brand-buttons',NULL,'link',33,1,37),(38,'Charts','/charts','cil-chart-pie','link',NULL,1,38),(39,'Icons',NULL,'cil-star','dropdown',NULL,1,39),(40,'CoreUI Icons','/icon/coreui-icons',NULL,'link',39,1,40),(41,'Flags','/icon/flags',NULL,'link',39,1,41),(42,'Brands','/icon/brands',NULL,'link',39,1,42),(43,'Notifications',NULL,'cil-bell','dropdown',NULL,1,43),(44,'Alerts','/notifications/alerts',NULL,'link',43,1,44),(45,'Badge','/notifications/badge',NULL,'link',43,1,45),(46,'Modals','/notifications/modals',NULL,'link',43,1,46),(47,'Widgets','/widgets','cil-calculator','link',NULL,1,47),(48,'Extras',NULL,NULL,'title',NULL,1,48),(49,'Pages',NULL,'cil-star','dropdown',NULL,1,49),(52,'Error 404','/404',NULL,'link',49,1,52),(53,'Error 500','/500',NULL,'link',49,1,53),(56,'Pages',NULL,NULL,'dropdown',NULL,2,56),(57,'Dashboard','/',NULL,'link',56,2,57),(58,'Notes','/notes',NULL,'link',56,2,58),(59,'Users','/users',NULL,'link',56,2,59),(60,'Settings',NULL,'','dropdown',NULL,2,60),(61,'Edit menu','/menu/menu',NULL,'link',60,2,61),(62,'Edit menu elements','/menu/element',NULL,'link',60,2,62),(63,'Edit roles','/roles',NULL,'link',60,2,63),(64,'Media','/media',NULL,'link',60,2,64),(65,'BREAD','/bread',NULL,'link',60,2,65),(66,'使用者設定',NULL,'cil-user','dropdown',NULL,3,1),(67,'新增使用者','/users/create',NULL,'link',66,3,2),(68,'使用者列表','/users',NULL,'link',66,3,3),(69,'總校設定',NULL,'cil-school','dropdown',NULL,3,4),(70,'屬性分類建置','/resource/3/resource',NULL,'link',69,3,5),(71,'總校列表','/schools',NULL,'link',69,3,6),(72,'教材分類設定',NULL,'cil-folder','dropdown',NULL,3,7),(73,'系列設定','/firstCategory',NULL,'link',72,3,8),(74,'冊別設定','/secondCategory',NULL,'link',72,3,9),(75,'課別設定','/thirdCategory',NULL,'link',72,3,10),(76,'考券設定',NULL,'cil-book','dropdown',NULL,3,11),(78,'題目類型列表','/resource/8/resource',NULL,'link',76,3,13),(79,'考券列表','/topics',NULL,'link',76,3,14),(80,'Basic Forms','/forms/basic-forms',NULL,'link',21,1,54),(81,'Advanced Forms','/forms/advanced-forms',NULL,'link',21,1,55),(82,'Validation Forms','/forms/validation',NULL,'link',21,1,56);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2020_11_27_094012_create_user_roles_table',1),(9,'2014_10_12_000000_create_users_table',2),(10,'2014_10_12_100000_create_password_resets_table',2),(11,'2019_08_19_000000_create_failed_jobs_table',2),(12,'2019_10_11_085455_create_notes_table',2),(13,'2019_10_12_115248_create_status_table',2),(14,'2019_11_08_102827_create_menus_table',2),(15,'2019_11_13_092213_create_menurole_table',2),(16,'2019_12_10_092113_create_permission_tables',2),(17,'2019_12_11_091036_create_menulist_table',2),(18,'2019_12_18_092518_create_role_hierarchy_table',2),(19,'2020_01_07_093259_create_folder_table',2),(20,'2020_01_08_184500_create_media_table',2),(21,'2020_01_21_161241_create_form_field_table',2),(22,'2020_01_21_161242_create_form_table',2),(23,'2020_01_21_161243_create_example_table',2),(24,'2020_03_12_111400_create_email_template_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1,'App\\Models\\User',1),(9,'App\\Models\\User',1),(9,'App\\Models\\User',2),(9,'App\\Models\\User',3),(9,'App\\Models\\User',38);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `myway_first_category`
--

DROP TABLE IF EXISTS `myway_first_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `myway_first_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '大類別名稱',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '代碼',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '說明',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `myway_first_category`
--

LOCK TABLES `myway_first_category` WRITE;
/*!40000 ALTER TABLE `myway_first_category` DISABLE KEYS */;
INSERT INTO `myway_first_category` (`id`, `name`, `alias`, `description`, `created_at`, `updated_at`, `status`) VALUES (1,'FunEnglish','FE',NULL,'2020-12-28 00:20:58','2020-12-29 01:25:23',1),(5,'Happy English','HE',NULL,'2020-12-29 01:59:03','2020-12-29 01:59:03',1);
/*!40000 ALTER TABLE `myway_first_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `myway_second_category`
--

DROP TABLE IF EXISTS `myway_second_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `myway_second_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_cat_id` int DEFAULT NULL COMMENT '系列ID',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '冊別名稱',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '冊別代碼',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '說明',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `myway_second_category`
--

LOCK TABLES `myway_second_category` WRITE;
/*!40000 ALTER TABLE `myway_second_category` DISABLE KEYS */;
INSERT INTO `myway_second_category` (`id`, `first_cat_id`, `name`, `alias`, `description`, `created_at`, `updated_at`, `status`) VALUES (5,1,'1','FE-1',NULL,'2020-12-29 02:27:43','2020-12-29 02:46:24',1),(6,5,'2','HE-2',NULL,'2020-12-29 02:48:24','2020-12-29 07:34:50',1),(7,5,'1','HE-1',NULL,'2020-12-29 07:35:29','2020-12-29 07:35:29',1);
/*!40000 ALTER TABLE `myway_second_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `myway_third_category`
--

DROP TABLE IF EXISTS `myway_third_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `myway_third_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_cat_id` int DEFAULT NULL COMMENT '系列ID',
  `second_cat_id` int DEFAULT NULL COMMENT '冊別ID',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '課別名稱',
  `alias` varchar(255) DEFAULT NULL COMMENT '課別代碼',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '說明',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `myway_third_category`
--

LOCK TABLES `myway_third_category` WRITE;
/*!40000 ALTER TABLE `myway_third_category` DISABLE KEYS */;
INSERT INTO `myway_third_category` (`id`, `first_cat_id`, `second_cat_id`, `name`, `alias`, `description`, `created_at`, `updated_at`, `status`) VALUES (2,5,7,'1','HE-1-1',NULL,'2020-12-29 06:57:17','2021-05-31 10:16:26',1);
/*!40000 ALTER TABLE `myway_third_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `myway_topic_types`
--

DROP TABLE IF EXISTS `myway_topic_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `myway_topic_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) DEFAULT NULL COMMENT '題庫類型',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `myway_topic_types`
--

LOCK TABLES `myway_topic_types` WRITE;
/*!40000 ALTER TABLE `myway_topic_types` DISABLE KEYS */;
INSERT INTO `myway_topic_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES (1,'選擇題','2021-01-16 15:13:48',NULL),(2,'填空題','2021-01-16 15:13:48',NULL);
/*!40000 ALTER TABLE `myway_topic_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `myway_topics`
--

DROP TABLE IF EXISTS `myway_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `myway_topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_cat_id` int DEFAULT NULL COMMENT '系列編號',
  `second_cat_id` int DEFAULT NULL COMMENT '冊別編號',
  `third_cat_id` int DEFAULT NULL COMMENT '課別編號',
  `alias` varchar(45) DEFAULT NULL COMMENT '考券編號',
  `name` varchar(45) DEFAULT NULL COMMENT '考券標題',
  `contents` json DEFAULT NULL COMMENT '考券內容',
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `myway_topics`
--

LOCK TABLES `myway_topics` WRITE;
/*!40000 ALTER TABLE `myway_topics` DISABLE KEYS */;
INSERT INTO `myway_topics` (`id`, `first_cat_id`, `second_cat_id`, `third_cat_id`, `alias`, `name`, `contents`, `status`, `created_at`, `updated_at`) VALUES (1,1,5,NULL,'FE-1-sss','sss','[{\"text\": \"aaa\", \"type\": 1, \"image\": \"\", \"media\": \"\", \"qType\": 1, \"children\": [{\"text\": \"bbb\", \"image\": \"\", \"media\": \"\", \"qType\": 1, \"answer\": \"\", \"options\": \"\"}]}]',1,'2021-05-31 13:23:49','2021-05-31 13:23:49');
/*!40000 ALTER TABLE `myway_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applies_to_date` date NOT NULL,
  `users_id` int unsigned NOT NULL,
  `status_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`, `title`, `content`, `note_type`, `applies_to_date`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES (1,'Et perspiciatis dolorum.','Sapiente pariatur hic numquam. Autem sed exercitationem voluptatem culpa quae. Voluptatibus neque error quos.','voluptatibus est','1999-06-16',2,1,NULL,NULL),(2,'Facere quidem inventore aut.','Sequi sed exercitationem molestias repellendus. Consequuntur et adipisci expedita. Modi consequatur asperiores et delectus iste. Consequatur consequatur et incidunt dolore consequatur.','non','1979-01-16',2,4,NULL,NULL),(3,'Qui adipisci ipsam ut.','Omnis vitae eos labore voluptatem animi. Quia sunt necessitatibus consequatur sequi iste unde voluptate quia. Assumenda molestiae ut saepe ex rerum rerum omnis.','rem sint','1995-06-27',2,4,NULL,NULL),(4,'Saepe commodi consequatur necessitatibus harum.','Aspernatur nulla et reiciendis. Officiis aut ipsum voluptate. Omnis cupiditate voluptates sed reprehenderit voluptates sed est. Tempore molestiae incidunt praesentium sint dolor cum.','a facilis','2012-09-03',2,4,NULL,NULL),(5,'Consequatur sed quo nemo et molestiae.','Distinctio eveniet at veniam totam. Qui dolor voluptatem occaecati sit nulla. Pariatur repellat laborum eos nulla dolor.','consequatur','1978-03-16',2,4,NULL,NULL);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1,'browse bread 1','web','2020-12-14 19:38:22','2020-12-14 19:38:22'),(2,'read bread 1','web','2020-12-14 19:38:22','2020-12-14 19:38:22'),(3,'edit bread 1','web','2020-12-14 19:38:22','2020-12-14 19:38:22'),(4,'add bread 1','web','2020-12-14 19:38:22','2020-12-14 19:38:22'),(5,'delete bread 1','web','2020-12-14 19:38:22','2020-12-14 19:38:22'),(6,'browse bread 2','web','2020-12-14 22:51:07','2020-12-14 22:51:07'),(7,'read bread 2','web','2020-12-14 22:51:07','2020-12-14 22:51:07'),(8,'edit bread 2','web','2020-12-14 22:51:07','2020-12-14 22:51:07'),(9,'add bread 2','web','2020-12-14 22:51:07','2020-12-14 22:51:07'),(10,'delete bread 2','web','2020-12-14 22:51:07','2020-12-14 22:51:07'),(11,'browse bread 3','web','2020-12-21 04:53:24','2020-12-21 04:53:24'),(12,'read bread 3','web','2020-12-21 04:53:24','2020-12-21 04:53:24'),(13,'edit bread 3','web','2020-12-21 04:53:24','2020-12-21 04:53:24'),(14,'add bread 3','web','2020-12-21 04:53:24','2020-12-21 04:53:24'),(15,'delete bread 3','web','2020-12-21 04:53:24','2020-12-21 04:53:24'),(16,'browse bread 4','web','2020-12-27 23:25:07','2020-12-27 23:25:07'),(17,'read bread 4','web','2020-12-27 23:25:07','2020-12-27 23:25:07'),(18,'edit bread 4','web','2020-12-27 23:25:07','2020-12-27 23:25:07'),(19,'add bread 4','web','2020-12-27 23:25:07','2020-12-27 23:25:07'),(20,'delete bread 4','web','2020-12-27 23:25:07','2020-12-27 23:25:07'),(21,'browse bread 5','web','2020-12-27 23:27:28','2020-12-27 23:27:28'),(22,'read bread 5','web','2020-12-27 23:27:28','2020-12-27 23:27:28'),(23,'edit bread 5','web','2020-12-27 23:27:28','2020-12-27 23:27:28'),(24,'add bread 5','web','2020-12-27 23:27:28','2020-12-27 23:27:28'),(25,'delete bread 5','web','2020-12-27 23:27:28','2020-12-27 23:27:28'),(26,'browse bread 6','web','2020-12-27 23:28:58','2020-12-27 23:28:58'),(27,'read bread 6','web','2020-12-27 23:28:58','2020-12-27 23:28:58'),(28,'edit bread 6','web','2020-12-27 23:28:58','2020-12-27 23:28:58'),(29,'add bread 6','web','2020-12-27 23:28:58','2020-12-27 23:28:58'),(30,'delete bread 6','web','2020-12-27 23:28:58','2020-12-27 23:28:58'),(31,'browse bread 7','web','2021-01-16 07:52:52','2021-01-16 07:52:52'),(32,'read bread 7','web','2021-01-16 07:52:52','2021-01-16 07:52:52'),(33,'edit bread 7','web','2021-01-16 07:52:52','2021-01-16 07:52:52'),(34,'add bread 7','web','2021-01-16 07:52:52','2021-01-16 07:52:52'),(35,'delete bread 7','web','2021-01-16 07:52:52','2021-01-16 07:52:52'),(36,'browse bread 8','web','2021-01-16 09:38:49','2021-01-16 09:38:49'),(37,'read bread 8','web','2021-01-16 09:38:49','2021-01-16 09:38:49'),(38,'edit bread 8','web','2021-01-16 09:38:49','2021-01-16 09:38:49'),(39,'add bread 8','web','2021-01-16 09:38:49','2021-01-16 09:38:49'),(40,'delete bread 8','web','2021-01-16 09:38:49','2021-01-16 09:38:49');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2),(35,2),(36,2),(6,3),(7,3),(8,3),(9,3),(10,3),(1,10),(2,10),(3,10),(4,10),(5,10);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_hierarchy`
--

DROP TABLE IF EXISTS `role_hierarchy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_hierarchy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL,
  `hierarchy` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_hierarchy`
--

LOCK TABLES `role_hierarchy` WRITE;
/*!40000 ALTER TABLE `role_hierarchy` DISABLE KEYS */;
INSERT INTO `role_hierarchy` (`id`, `role_id`, `hierarchy`) VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10);
/*!40000 ALTER TABLE `role_hierarchy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1,'admin','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(2,'mywayAdmin','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(3,'schoolAdmin','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(4,'principal','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(5,'teacher','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(6,'assistant','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(7,'parent','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(8,'student','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(9,'user','web','2020-12-14 19:38:21','2020-12-14 19:38:21'),(10,'guest','web','2020-12-14 19:38:21','2020-12-14 19:38:21');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_category`
--

DROP TABLE IF EXISTS `school_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分類名稱',
  `description` varchar(255) DEFAULT NULL COMMENT '分類描述',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_category`
--

LOCK TABLES `school_category` WRITE;
/*!40000 ALTER TABLE `school_category` DISABLE KEYS */;
INSERT INTO `school_category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (3,'分類1測試','這是分類說明','2020-12-21 13:43:29','2020-12-21 13:43:29');
/*!40000 ALTER TABLE `school_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools_branch_info`
--

DROP TABLE IF EXISTS `schools_branch_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schools_branch_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `main_school_id` int DEFAULT NULL COMMENT '主校',
  `name` varchar(255) DEFAULT NULL COMMENT '學校名稱',
  `address` varchar(255) DEFAULT NULL COMMENT '學校地址',
  `telephone` varchar(255) DEFAULT NULL COMMENT '學校電話',
  `principal` int DEFAULT NULL COMMENT '校長',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '建立日期',
  `expired_at` timestamp NULL DEFAULT NULL COMMENT '到期日期',
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '最後更新日期',
  `status` int DEFAULT '1' COMMENT '狀態:1啟用2關閉',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools_branch_info`
--

LOCK TABLES `schools_branch_info` WRITE;
/*!40000 ALTER TABLE `schools_branch_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `schools_branch_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools_main_info`
--

DROP TABLE IF EXISTS `schools_main_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schools_main_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '總校名稱',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '總校簡稱',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '總校地址',
  `telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '總校電話',
  `website` varchar(255) DEFAULT NULL COMMENT '總校網址',
  `identity_id` varchar(255) DEFAULT NULL COMMENT '立案字號',
  `category_id` int DEFAULT NULL COMMENT '總校分類',
  `code` varchar(255) DEFAULT NULL COMMENT '總校編號',
  `city` varchar(255) DEFAULT NULL COMMENT '總校縣市',
  `area` varchar(255) DEFAULT NULL COMMENT '總校鄉鎮市區',
  `principal_id` int DEFAULT NULL COMMENT '總校負責人',
  `created_at` timestamp NOT NULL COMMENT '建立日期',
  `expired_at` date DEFAULT NULL COMMENT '到期日期',
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '最後更新日期',
  `status` int DEFAULT '1' COMMENT '狀態:1啟用2關閉',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools_main_info`
--

LOCK TABLES `schools_main_info` WRITE;
/*!40000 ALTER TABLE `schools_main_info` DISABLE KEYS */;
INSERT INTO `schools_main_info` (`id`, `name`, `alias`, `address`, `telephone`, `website`, `identity_id`, `category_id`, `code`, `city`, `area`, `principal_id`, `created_at`, `expired_at`, `updated_at`, `status`) VALUES (1,'狀元補習班','狀元','南陽街','0212345678','','AE12345678',3,'19WQR1OXWB4',NULL,NULL,37,'2020-12-27 17:41:42','2020-12-31','2020-12-27 09:42:13',1);
/*!40000 ALTER TABLE `schools_main_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`, `class`) VALUES (1,'ongoing','badge badge-pill badge-primary'),(2,'stopped','badge badge-pill badge-secondary'),(3,'completed','badge badge-pill badge-success'),(4,'expired','badge badge-pill badge-warning');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1,'超級管理員',NULL,NULL),(2,'管理員',NULL,NULL),(3,'會員',NULL,NULL),(4,'分校校長',NULL,NULL),(5,'教師',NULL,NULL),(6,'助教',NULL,NULL),(7,'家長',NULL,NULL),(8,'學生',NULL,NULL);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuroles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `english_name`, `telephone`, `line`, `address`, `email`, `email_verified_at`, `password`, `menuroles`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES (1,'admin',NULL,NULL,NULL,NULL,'admin@admin.com','2020-12-14 19:38:21','$2y$10$QaE66UT.yLUuEUbG5hagVueWQ51/Nk6gb.p9Abwn33fCgYqHTOvAS','admin','jlnU7PxaLsmWJNLuSCLVgYFzbpRhA6hyrWnvsBk2ixhKKIySemAPTxArZE4B','2020-12-14 19:38:21','2020-12-14 19:38:21',NULL,1),(6,'test',NULL,NULL,NULL,NULL,'admin@myway.com',NULL,'$2y$10$2zdhLPnCTLn0K/zihJBiz.1A5xHnlFCu07wrpuJLIlNB4g5F5SD5W','mywayAdmin',NULL,'2020-12-15 02:34:21','2020-12-15 02:34:21',NULL,1),(19,'teachera',NULL,NULL,NULL,NULL,'test@gmail.com',NULL,'$2y$10$ApZ2vlv1bixjyb9180oMHefnKt1fF7SQRjZLObJuhVHZA/zR6bDIW','teacher',NULL,NULL,'2020-12-16 07:09:08',NULL,1),(23,'linba',NULL,'0912345678','linba',NULL,'linba@gmail.com',NULL,'$2y$10$RzpGqnPx3ipAQJmhhx451.27j6VhoCUSpBuXz/Zm0jxm7jcuyeTSS','parent',NULL,'2020-12-16 08:26:04',NULL,NULL,1),(24,'linma','linma','0912345678','linma','ss','linma@gmail.com',NULL,'$2y$10$d9uz1Z5HNK/5oyYhLiTrxe/.S/VMoi9LGB1993coxPTaKx4UzEQD2','parent',NULL,'2020-12-16 08:26:04','2020-12-21 03:33:58',NULL,1),(25,'林寶','linbo',NULL,'linbo',NULL,'linbo@gmail.com',NULL,'$2y$10$xkJc3fqvsIwejWr3fRNnLOpExLh4eddWAY2dzTr2CMdhvWetGQz9e','student',NULL,'2020-12-16 08:26:04','2020-12-21 03:51:44',NULL,1),(26,'Q爸',NULL,'0912345678','qba',NULL,'qba@gmail.com',NULL,'$2y$10$r6a55yCQJumWUtyabVMwsO.L6tZir1iHak/DnMIeD6CJBxfKUUlni','parent',NULL,'2020-12-21 04:31:53',NULL,NULL,1),(27,'Q媽',NULL,'0987654321','qma',NULL,'qma@gmail.com',NULL,'$2y$10$jvT43le9mr8zJA3SVONJ1ObVVKR3/bKBcWTf1XNfzf4dKwE38ouQy','parent',NULL,'2020-12-21 04:31:53',NULL,NULL,1),(28,'Q寶','QQ',NULL,'qbo',NULL,'qbo@gmail.com',NULL,'$2y$10$iAuDWo1ogI9/0lQdcHHvOO3kcajlKNX4RpXaYz/MncaWEqf0AKWpO','student',NULL,'2020-12-21 04:31:53',NULL,NULL,1),(37,'林總校長',NULL,'0912222332','linprincipal',NULL,'admin@testschool.com',NULL,'$2y$10$Oyg0ib6u9m5lYgKYzbx/1.Rddm4AzCH3/iBukv8lTrDqDlqy8CPfS','schoolAdmin',NULL,'2020-12-27 08:10:39','2020-12-27 09:42:13',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_student_infos`
--

DROP TABLE IF EXISTS `users_student_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_student_infos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL COMMENT '使用者ID',
  `class_id` int DEFAULT NULL COMMENT '班級ID',
  `parent_1_id` int DEFAULT NULL COMMENT '家長_1_ID',
  `parent_2_id` int DEFAULT NULL COMMENT '家長_2_ID',
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '備註',
  `start_date` date DEFAULT NULL COMMENT '入學日',
  `expire_date` date DEFAULT NULL COMMENT '退學日',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '建立日期',
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '最後更新日期',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_student_infos`
--

LOCK TABLES `users_student_infos` WRITE;
/*!40000 ALTER TABLE `users_student_infos` DISABLE KEYS */;
INSERT INTO `users_student_infos` (`id`, `user_id`, `class_id`, `parent_1_id`, `parent_2_id`, `other`, `start_date`, `expire_date`, `created_at`, `update_at`) VALUES (4,25,NULL,23,24,'otherss','2020-12-18','2020-12-31','2020-12-16 08:26:04','2020-12-21 12:25:41'),(5,28,NULL,26,27,'p','2020-12-22','2020-12-31','2020-12-21 04:31:53',NULL);
/*!40000 ALTER TABLE `users_student_infos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-01  5:35:52
