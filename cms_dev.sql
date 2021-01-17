/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 80022
 Source Host           : localhost:3306
 Source Schema         : cms_dev

 Target Server Type    : MySQL
 Target Server Version : 80022
 File Encoding         : 65001

 Date: 17/01/2021 18:26:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for classes_infos
-- ----------------------------
DROP TABLE IF EXISTS `classes_infos`;
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

-- ----------------------------
-- Records of classes_infos
-- ----------------------------
BEGIN;
INSERT INTO `classes_infos` VALUES (1, NULL, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-01', '2020-12-23', '2020-12-09', '早上', '2020-12-13 07:40:32', '2020-12-13 08:47:38', 1);
INSERT INTO `classes_infos` VALUES (2, NULL, NULL, 'test2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-01', '2020-12-08', '2020-12-23', '下午', '2020-12-13 08:34:44', '2020-12-13 08:47:52', 1);
COMMIT;

-- ----------------------------
-- Table structure for email_template
-- ----------------------------
DROP TABLE IF EXISTS `email_template`;
CREATE TABLE `email_template` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of email_template
-- ----------------------------
BEGIN;
INSERT INTO `email_template` VALUES (1, NULL, NULL, '<!DOCTYPE html>\n                <html lang=\"en\">\n                <head>\n                    <meta charset=\"utf-8\">\n                    <meta name=\"viewport\" content=\"width=device-width\">\n                    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \n                    <meta name=\"x-apple-disable-message-reformatting\">\n                    <title>Example</title>\n                    <style>\n                        body {\n                            background-color:#fff;\n                            color:#222222;\n                            margin: 0px auto;\n                            padding: 0px;\n                            height: 100%;\n                            width: 100%;\n                            font-weight: 400;\n                            font-size: 15px;\n                            line-height: 1.8;\n                        }\n                        .continer{\n                            width:400px;\n                            margin-left:auto;\n                            margin-right:auto;\n                            background-color:#efefef;\n                            padding:30px;\n                        }\n                        .btn{\n                            padding: 5px 15px;\n                            display: inline-block;\n                        }\n                        .btn-primary{\n                            border-radius: 3px;\n                            background: #0b3c7c;\n                            color: #fff;\n                            text-decoration: none;\n                        }\n                        .btn-primary:hover{\n                            border-radius: 3px;\n                            background: #4673ad;\n                            color: #fff;\n                            text-decoration: none;\n                        }\n                    </style>\n                </head>\n                <body>\n                    <div class=\"continer\">\n                        <h1>Lorem ipsum dolor</h1>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea <strong>commodo consequat</strong>. \n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n                        </p>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <a href=\"#\">tempor incididunt ut labore</a> et dolore magna aliqua.\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n                        </p>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n                        </p>\n                        <a href=\"#\" class=\"btn btn-primary\">Lorem ipsum dolor</a>\n                        <h4>Ipsum dolor cet emit amet</h4>\n                        <p>\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\n                            Ut enim ad minim veniam, quis nostrud exercitation <a href=\"#\">ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. \n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n                        </p>\n                    </div>\n                </body>\n                </html>', 'Example E-mail', 'Example E-mail');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for folder
-- ----------------------------
DROP TABLE IF EXISTS `folder`;
CREATE TABLE `folder` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int unsigned DEFAULT NULL,
  `resource` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of folder
-- ----------------------------
BEGIN;
INSERT INTO `folder` VALUES (1, NULL, NULL, 'root', NULL, NULL);
INSERT INTO `folder` VALUES (2, NULL, NULL, 'resource', 1, 1);
INSERT INTO `folder` VALUES (3, NULL, NULL, 'documents', 1, NULL);
INSERT INTO `folder` VALUES (4, NULL, NULL, 'graphics', 1, NULL);
INSERT INTO `folder` VALUES (5, NULL, NULL, 'other', 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for form
-- ----------------------------
DROP TABLE IF EXISTS `form`;
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

-- ----------------------------
-- Records of form
-- ----------------------------
BEGIN;
INSERT INTO `form` VALUES (3, '2020-12-21 12:53:24', '2020-12-21 13:47:08', '總校屬性分類', 'school_category', 1, 1, 1, 1, 10);
INSERT INTO `form` VALUES (7, '2021-01-16 15:52:52', '2021-01-16 16:01:21', '題庫分級設定', 'myway_topic_levels', 1, 1, 1, 1, 10);
INSERT INTO `form` VALUES (8, '2021-01-16 17:38:49', '2021-01-16 17:40:07', '題庫類型列表', 'myway_topic_types', 0, 0, 0, 0, 10);
COMMIT;

-- ----------------------------
-- Table structure for form_field
-- ----------------------------
DROP TABLE IF EXISTS `form_field`;
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

-- ----------------------------
-- Records of form_field
-- ----------------------------
BEGIN;
INSERT INTO `form_field` VALUES (13, '2020-12-21 12:53:24', '2020-12-21 12:53:24', '分類名稱', 'text', 1, 1, 1, 1, NULL, NULL, 3, 'name');
INSERT INTO `form_field` VALUES (14, '2020-12-21 12:53:24', '2020-12-21 12:59:53', '分類說明', 'text_area', 1, 1, 1, 1, NULL, NULL, 3, 'description');
INSERT INTO `form_field` VALUES (15, '2020-12-21 12:53:24', '2020-12-21 13:03:05', '建立時間', 'datetime-local', 1, 1, 0, 0, NULL, NULL, 3, 'created_at');
INSERT INTO `form_field` VALUES (16, '2020-12-21 12:53:24', '2020-12-21 13:33:01', '最後更新時間', 'datetime-local', 1, 1, 0, 0, NULL, NULL, 3, 'updated_at');
INSERT INTO `form_field` VALUES (17, '2020-12-21 12:53:24', '2020-12-21 13:02:35', 'deleted_at', 'datetime-local', 0, 0, 0, 0, NULL, NULL, 3, 'deleted_at');
INSERT INTO `form_field` VALUES (34, '2021-01-16 15:52:52', '2021-01-16 15:53:24', '分級名稱', 'text', 1, 1, 1, 1, NULL, NULL, 7, 'name');
INSERT INTO `form_field` VALUES (35, '2021-01-16 15:52:52', '2021-01-16 16:01:21', '建立日期', 'datetime-local', 1, 1, 0, 0, NULL, NULL, 7, 'created_at');
INSERT INTO `form_field` VALUES (36, '2021-01-16 15:52:52', '2021-01-16 16:01:21', '最後更新時間', 'datetime-local', 1, 0, 0, 0, NULL, NULL, 7, 'updated_at');
INSERT INTO `form_field` VALUES (37, '2021-01-16 17:38:49', '2021-01-16 17:38:49', '類型名稱', 'checkbox', 1, 0, 0, 0, NULL, NULL, 8, 'type_name');
INSERT INTO `form_field` VALUES (38, '2021-01-16 17:38:49', '2021-01-16 17:40:07', '建立日期', 'checkbox', 1, 0, 0, 0, NULL, NULL, 8, 'created_at');
INSERT INTO `form_field` VALUES (39, '2021-01-16 17:38:49', '2021-01-16 17:40:07', '最後更新時間', 'checkbox', 1, 0, 0, 0, NULL, NULL, 8, 'updated_at');
COMMIT;

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
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

-- ----------------------------
-- Records of media
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for menu_role
-- ----------------------------
DROP TABLE IF EXISTS `menu_role`;
CREATE TABLE `menu_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menus_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of menu_role
-- ----------------------------
BEGIN;
INSERT INTO `menu_role` VALUES (4, 'admin', 2);
INSERT INTO `menu_role` VALUES (5, 'admin', 3);
INSERT INTO `menu_role` VALUES (6, 'admin', 4);
INSERT INTO `menu_role` VALUES (7, 'admin', 5);
INSERT INTO `menu_role` VALUES (8, 'admin', 6);
INSERT INTO `menu_role` VALUES (9, 'admin', 7);
INSERT INTO `menu_role` VALUES (10, 'admin', 8);
INSERT INTO `menu_role` VALUES (11, 'admin', 9);
INSERT INTO `menu_role` VALUES (12, 'admin', 10);
INSERT INTO `menu_role` VALUES (15, 'user', 13);
INSERT INTO `menu_role` VALUES (16, 'admin', 13);
INSERT INTO `menu_role` VALUES (17, 'user', 14);
INSERT INTO `menu_role` VALUES (18, 'admin', 14);
INSERT INTO `menu_role` VALUES (19, 'user', 15);
INSERT INTO `menu_role` VALUES (20, 'admin', 15);
INSERT INTO `menu_role` VALUES (21, 'user', 16);
INSERT INTO `menu_role` VALUES (22, 'admin', 16);
INSERT INTO `menu_role` VALUES (23, 'user', 17);
INSERT INTO `menu_role` VALUES (24, 'admin', 17);
INSERT INTO `menu_role` VALUES (25, 'user', 18);
INSERT INTO `menu_role` VALUES (26, 'admin', 18);
INSERT INTO `menu_role` VALUES (27, 'user', 19);
INSERT INTO `menu_role` VALUES (28, 'admin', 19);
INSERT INTO `menu_role` VALUES (29, 'user', 20);
INSERT INTO `menu_role` VALUES (30, 'admin', 20);
INSERT INTO `menu_role` VALUES (33, 'user', 22);
INSERT INTO `menu_role` VALUES (34, 'admin', 22);
INSERT INTO `menu_role` VALUES (35, 'user', 23);
INSERT INTO `menu_role` VALUES (36, 'admin', 23);
INSERT INTO `menu_role` VALUES (37, 'user', 24);
INSERT INTO `menu_role` VALUES (38, 'admin', 24);
INSERT INTO `menu_role` VALUES (39, 'user', 25);
INSERT INTO `menu_role` VALUES (40, 'admin', 25);
INSERT INTO `menu_role` VALUES (41, 'user', 26);
INSERT INTO `menu_role` VALUES (42, 'admin', 26);
INSERT INTO `menu_role` VALUES (43, 'user', 27);
INSERT INTO `menu_role` VALUES (44, 'admin', 27);
INSERT INTO `menu_role` VALUES (45, 'user', 28);
INSERT INTO `menu_role` VALUES (46, 'admin', 28);
INSERT INTO `menu_role` VALUES (47, 'user', 29);
INSERT INTO `menu_role` VALUES (48, 'admin', 29);
INSERT INTO `menu_role` VALUES (49, 'user', 30);
INSERT INTO `menu_role` VALUES (50, 'admin', 30);
INSERT INTO `menu_role` VALUES (51, 'user', 31);
INSERT INTO `menu_role` VALUES (52, 'admin', 31);
INSERT INTO `menu_role` VALUES (53, 'user', 32);
INSERT INTO `menu_role` VALUES (54, 'admin', 32);
INSERT INTO `menu_role` VALUES (55, 'user', 33);
INSERT INTO `menu_role` VALUES (56, 'admin', 33);
INSERT INTO `menu_role` VALUES (57, 'user', 34);
INSERT INTO `menu_role` VALUES (58, 'admin', 34);
INSERT INTO `menu_role` VALUES (59, 'user', 35);
INSERT INTO `menu_role` VALUES (60, 'admin', 35);
INSERT INTO `menu_role` VALUES (61, 'user', 36);
INSERT INTO `menu_role` VALUES (62, 'admin', 36);
INSERT INTO `menu_role` VALUES (63, 'user', 37);
INSERT INTO `menu_role` VALUES (64, 'admin', 37);
INSERT INTO `menu_role` VALUES (65, 'user', 38);
INSERT INTO `menu_role` VALUES (66, 'admin', 38);
INSERT INTO `menu_role` VALUES (67, 'user', 39);
INSERT INTO `menu_role` VALUES (68, 'admin', 39);
INSERT INTO `menu_role` VALUES (69, 'user', 40);
INSERT INTO `menu_role` VALUES (70, 'admin', 40);
INSERT INTO `menu_role` VALUES (71, 'user', 41);
INSERT INTO `menu_role` VALUES (72, 'admin', 41);
INSERT INTO `menu_role` VALUES (73, 'user', 42);
INSERT INTO `menu_role` VALUES (74, 'admin', 42);
INSERT INTO `menu_role` VALUES (75, 'user', 43);
INSERT INTO `menu_role` VALUES (76, 'admin', 43);
INSERT INTO `menu_role` VALUES (77, 'user', 44);
INSERT INTO `menu_role` VALUES (78, 'admin', 44);
INSERT INTO `menu_role` VALUES (79, 'user', 45);
INSERT INTO `menu_role` VALUES (80, 'admin', 45);
INSERT INTO `menu_role` VALUES (81, 'user', 46);
INSERT INTO `menu_role` VALUES (82, 'admin', 46);
INSERT INTO `menu_role` VALUES (83, 'user', 47);
INSERT INTO `menu_role` VALUES (84, 'admin', 47);
INSERT INTO `menu_role` VALUES (85, 'user', 48);
INSERT INTO `menu_role` VALUES (86, 'admin', 48);
INSERT INTO `menu_role` VALUES (87, 'user', 49);
INSERT INTO `menu_role` VALUES (88, 'admin', 49);
INSERT INTO `menu_role` VALUES (93, 'user', 52);
INSERT INTO `menu_role` VALUES (94, 'admin', 52);
INSERT INTO `menu_role` VALUES (95, 'user', 53);
INSERT INTO `menu_role` VALUES (96, 'admin', 53);
INSERT INTO `menu_role` VALUES (106, 'guest', 57);
INSERT INTO `menu_role` VALUES (107, 'user', 57);
INSERT INTO `menu_role` VALUES (108, 'admin', 57);
INSERT INTO `menu_role` VALUES (109, 'user', 58);
INSERT INTO `menu_role` VALUES (110, 'admin', 58);
INSERT INTO `menu_role` VALUES (111, 'admin', 59);
INSERT INTO `menu_role` VALUES (112, 'admin', 60);
INSERT INTO `menu_role` VALUES (113, 'admin', 61);
INSERT INTO `menu_role` VALUES (114, 'admin', 62);
INSERT INTO `menu_role` VALUES (115, 'admin', 63);
INSERT INTO `menu_role` VALUES (116, 'admin', 64);
INSERT INTO `menu_role` VALUES (117, 'admin', 65);
INSERT INTO `menu_role` VALUES (120, 'admin', 66);
INSERT INTO `menu_role` VALUES (121, 'mywayAdmin', 66);
INSERT INTO `menu_role` VALUES (122, 'schoolAdmin', 66);
INSERT INTO `menu_role` VALUES (123, 'admin', 67);
INSERT INTO `menu_role` VALUES (124, 'mywayAdmin', 67);
INSERT INTO `menu_role` VALUES (125, 'schoolAdmin', 67);
INSERT INTO `menu_role` VALUES (126, 'admin', 68);
INSERT INTO `menu_role` VALUES (127, 'mywayAdmin', 68);
INSERT INTO `menu_role` VALUES (128, 'schoolAdmin', 68);
INSERT INTO `menu_role` VALUES (132, 'admin', 56);
INSERT INTO `menu_role` VALUES (133, 'admin', 1);
INSERT INTO `menu_role` VALUES (136, 'admin', 69);
INSERT INTO `menu_role` VALUES (137, 'mywayAdmin', 69);
INSERT INTO `menu_role` VALUES (138, 'admin', 70);
INSERT INTO `menu_role` VALUES (139, 'mywayAdmin', 70);
INSERT INTO `menu_role` VALUES (140, 'admin', 71);
INSERT INTO `menu_role` VALUES (141, 'mywayAdmin', 71);
INSERT INTO `menu_role` VALUES (164, 'admin', 73);
INSERT INTO `menu_role` VALUES (165, 'mywayAdmin', 73);
INSERT INTO `menu_role` VALUES (166, 'admin', 74);
INSERT INTO `menu_role` VALUES (167, 'mywayAdmin', 74);
INSERT INTO `menu_role` VALUES (168, 'admin', 75);
INSERT INTO `menu_role` VALUES (169, 'mywayAdmin', 75);
INSERT INTO `menu_role` VALUES (170, 'admin', 72);
INSERT INTO `menu_role` VALUES (171, 'mywayAdmin', 72);
INSERT INTO `menu_role` VALUES (172, 'admin', 76);
INSERT INTO `menu_role` VALUES (173, 'mywayAdmin', 76);
INSERT INTO `menu_role` VALUES (176, 'admin', 77);
INSERT INTO `menu_role` VALUES (177, 'mywayAdmin', 77);
INSERT INTO `menu_role` VALUES (178, 'admin', 78);
INSERT INTO `menu_role` VALUES (179, 'mywayAdmin', 78);
INSERT INTO `menu_role` VALUES (180, 'admin', 79);
INSERT INTO `menu_role` VALUES (181, 'mywayAdmin', 79);
INSERT INTO `menu_role` VALUES (182, 'admin', 21);
INSERT INTO `menu_role` VALUES (183, 'user', 21);
INSERT INTO `menu_role` VALUES (184, 'admin', 80);
INSERT INTO `menu_role` VALUES (185, 'admin', 81);
INSERT INTO `menu_role` VALUES (186, 'admin', 82);
COMMIT;

-- ----------------------------
-- Table structure for menulist
-- ----------------------------
DROP TABLE IF EXISTS `menulist`;
CREATE TABLE `menulist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of menulist
-- ----------------------------
BEGIN;
INSERT INTO `menulist` VALUES (1, 'sidebar menu');
INSERT INTO `menulist` VALUES (2, 'top menu');
INSERT INTO `menulist` VALUES (3, '邁威選單');
COMMIT;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
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

-- ----------------------------
-- Records of menus
-- ----------------------------
BEGIN;
INSERT INTO `menus` VALUES (1, 'Dashboard', '/', 'cil-speedometer', 'link', NULL, 1, 1);
INSERT INTO `menus` VALUES (2, 'Settings', NULL, 'cil-calculator', 'dropdown', NULL, 1, 2);
INSERT INTO `menus` VALUES (3, 'Notes', '/notes', NULL, 'link', 2, 1, 3);
INSERT INTO `menus` VALUES (4, 'Users', '/users', NULL, 'link', 2, 1, 4);
INSERT INTO `menus` VALUES (5, 'Edit menu', '/menu/menu', NULL, 'link', 2, 1, 5);
INSERT INTO `menus` VALUES (6, 'Edit menu elements', '/menu/element', NULL, 'link', 2, 1, 6);
INSERT INTO `menus` VALUES (7, 'Edit roles', '/roles', NULL, 'link', 2, 1, 7);
INSERT INTO `menus` VALUES (8, 'Media', '/media', NULL, 'link', 2, 1, 8);
INSERT INTO `menus` VALUES (9, 'BREAD', '/bread', NULL, 'link', 2, 1, 9);
INSERT INTO `menus` VALUES (10, 'Email', '/mail', NULL, 'link', 2, 1, 10);
INSERT INTO `menus` VALUES (13, 'Theme', NULL, NULL, 'title', NULL, 1, 13);
INSERT INTO `menus` VALUES (14, 'Colors', '/colors', 'cil-drop1', 'link', NULL, 1, 14);
INSERT INTO `menus` VALUES (15, 'Typography', '/typography', 'cil-pencil', 'link', NULL, 1, 15);
INSERT INTO `menus` VALUES (16, 'Base', NULL, 'cil-puzzle', 'dropdown', NULL, 1, 16);
INSERT INTO `menus` VALUES (17, 'Breadcrumb', '/base/breadcrumb', NULL, 'link', 16, 1, 17);
INSERT INTO `menus` VALUES (18, 'Cards', '/base/cards', NULL, 'link', 16, 1, 18);
INSERT INTO `menus` VALUES (19, 'Carousel', '/base/carousel', NULL, 'link', 16, 1, 19);
INSERT INTO `menus` VALUES (20, 'Collapse', '/base/collapse', NULL, 'link', 16, 1, 20);
INSERT INTO `menus` VALUES (21, 'Forms', '/base/forms', 'cil-notes', 'dropdown', NULL, 1, 21);
INSERT INTO `menus` VALUES (22, 'Jumbotron', '/base/jumbotron', NULL, 'link', 16, 1, 22);
INSERT INTO `menus` VALUES (23, 'List group', '/base/list-group', NULL, 'link', 16, 1, 23);
INSERT INTO `menus` VALUES (24, 'Navs', '/base/navs', NULL, 'link', 16, 1, 24);
INSERT INTO `menus` VALUES (25, 'Pagination', '/base/pagination', NULL, 'link', 16, 1, 25);
INSERT INTO `menus` VALUES (26, 'Popovers', '/base/popovers', NULL, 'link', 16, 1, 26);
INSERT INTO `menus` VALUES (27, 'Progress', '/base/progress', NULL, 'link', 16, 1, 27);
INSERT INTO `menus` VALUES (28, 'Scrollspy', '/base/scrollspy', NULL, 'link', 16, 1, 28);
INSERT INTO `menus` VALUES (29, 'Switches', '/base/switches', NULL, 'link', 16, 1, 29);
INSERT INTO `menus` VALUES (30, 'Tables', '/base/tables', NULL, 'link', 16, 1, 30);
INSERT INTO `menus` VALUES (31, 'Tabs', '/base/tabs', NULL, 'link', 16, 1, 31);
INSERT INTO `menus` VALUES (32, 'Tooltips', '/base/tooltips', NULL, 'link', 16, 1, 32);
INSERT INTO `menus` VALUES (33, 'Buttons', NULL, 'cil-cursor', 'dropdown', NULL, 1, 33);
INSERT INTO `menus` VALUES (34, 'Buttons', '/buttons/buttons', NULL, 'link', 33, 1, 34);
INSERT INTO `menus` VALUES (35, 'Buttons Group', '/buttons/button-group', NULL, 'link', 33, 1, 35);
INSERT INTO `menus` VALUES (36, 'Dropdowns', '/buttons/dropdowns', NULL, 'link', 33, 1, 36);
INSERT INTO `menus` VALUES (37, 'Brand Buttons', '/buttons/brand-buttons', NULL, 'link', 33, 1, 37);
INSERT INTO `menus` VALUES (38, 'Charts', '/charts', 'cil-chart-pie', 'link', NULL, 1, 38);
INSERT INTO `menus` VALUES (39, 'Icons', NULL, 'cil-star', 'dropdown', NULL, 1, 39);
INSERT INTO `menus` VALUES (40, 'CoreUI Icons', '/icon/coreui-icons', NULL, 'link', 39, 1, 40);
INSERT INTO `menus` VALUES (41, 'Flags', '/icon/flags', NULL, 'link', 39, 1, 41);
INSERT INTO `menus` VALUES (42, 'Brands', '/icon/brands', NULL, 'link', 39, 1, 42);
INSERT INTO `menus` VALUES (43, 'Notifications', NULL, 'cil-bell', 'dropdown', NULL, 1, 43);
INSERT INTO `menus` VALUES (44, 'Alerts', '/notifications/alerts', NULL, 'link', 43, 1, 44);
INSERT INTO `menus` VALUES (45, 'Badge', '/notifications/badge', NULL, 'link', 43, 1, 45);
INSERT INTO `menus` VALUES (46, 'Modals', '/notifications/modals', NULL, 'link', 43, 1, 46);
INSERT INTO `menus` VALUES (47, 'Widgets', '/widgets', 'cil-calculator', 'link', NULL, 1, 47);
INSERT INTO `menus` VALUES (48, 'Extras', NULL, NULL, 'title', NULL, 1, 48);
INSERT INTO `menus` VALUES (49, 'Pages', NULL, 'cil-star', 'dropdown', NULL, 1, 49);
INSERT INTO `menus` VALUES (52, 'Error 404', '/404', NULL, 'link', 49, 1, 52);
INSERT INTO `menus` VALUES (53, 'Error 500', '/500', NULL, 'link', 49, 1, 53);
INSERT INTO `menus` VALUES (56, 'Pages', NULL, NULL, 'dropdown', NULL, 2, 56);
INSERT INTO `menus` VALUES (57, 'Dashboard', '/', NULL, 'link', 56, 2, 57);
INSERT INTO `menus` VALUES (58, 'Notes', '/notes', NULL, 'link', 56, 2, 58);
INSERT INTO `menus` VALUES (59, 'Users', '/users', NULL, 'link', 56, 2, 59);
INSERT INTO `menus` VALUES (60, 'Settings', NULL, '', 'dropdown', NULL, 2, 60);
INSERT INTO `menus` VALUES (61, 'Edit menu', '/menu/menu', NULL, 'link', 60, 2, 61);
INSERT INTO `menus` VALUES (62, 'Edit menu elements', '/menu/element', NULL, 'link', 60, 2, 62);
INSERT INTO `menus` VALUES (63, 'Edit roles', '/roles', NULL, 'link', 60, 2, 63);
INSERT INTO `menus` VALUES (64, 'Media', '/media', NULL, 'link', 60, 2, 64);
INSERT INTO `menus` VALUES (65, 'BREAD', '/bread', NULL, 'link', 60, 2, 65);
INSERT INTO `menus` VALUES (66, '使用者設定', NULL, 'cil-user', 'dropdown', NULL, 3, 1);
INSERT INTO `menus` VALUES (67, '新增使用者', '/users/create', NULL, 'link', 66, 3, 2);
INSERT INTO `menus` VALUES (68, '使用者列表', '/users', NULL, 'link', 66, 3, 3);
INSERT INTO `menus` VALUES (69, '總校設定', NULL, 'cil-school', 'dropdown', NULL, 3, 4);
INSERT INTO `menus` VALUES (70, '屬性分類建置', '/resource/3/resource', NULL, 'link', 69, 3, 5);
INSERT INTO `menus` VALUES (71, '總校列表', '/schools', NULL, 'link', 69, 3, 6);
INSERT INTO `menus` VALUES (72, '教材分類設定', NULL, 'cil-folder', 'dropdown', NULL, 3, 7);
INSERT INTO `menus` VALUES (73, '系列設定', '/firstCategory', NULL, 'link', 72, 3, 8);
INSERT INTO `menus` VALUES (74, '冊別設定', '/secondCategory', NULL, 'link', 72, 3, 9);
INSERT INTO `menus` VALUES (75, '課別設定', '/thirdCategory', NULL, 'link', 72, 3, 10);
INSERT INTO `menus` VALUES (76, '題庫設定', NULL, 'cil-book', 'dropdown', NULL, 3, 11);
INSERT INTO `menus` VALUES (77, '分級設定', '/resource/7/resource', NULL, 'link', 76, 3, 12);
INSERT INTO `menus` VALUES (78, '題目類型列表', '/resource/8/resource', NULL, 'link', 76, 3, 13);
INSERT INTO `menus` VALUES (79, '題庫列表', '/topics', NULL, 'link', 76, 3, 14);
INSERT INTO `menus` VALUES (80, 'Basic Forms', '/forms/basic-forms', NULL, 'link', 21, 1, 54);
INSERT INTO `menus` VALUES (81, 'Advanced Forms', '/forms/advanced-forms', NULL, 'link', 21, 1, 55);
INSERT INTO `menus` VALUES (82, 'Validation Forms', '/forms/validation', NULL, 'link', 21, 1, 56);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (8, '2020_11_27_094012_create_user_roles_table', 1);
INSERT INTO `migrations` VALUES (9, '2014_10_12_000000_create_users_table', 2);
INSERT INTO `migrations` VALUES (10, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` VALUES (11, '2019_08_19_000000_create_failed_jobs_table', 2);
INSERT INTO `migrations` VALUES (12, '2019_10_11_085455_create_notes_table', 2);
INSERT INTO `migrations` VALUES (13, '2019_10_12_115248_create_status_table', 2);
INSERT INTO `migrations` VALUES (14, '2019_11_08_102827_create_menus_table', 2);
INSERT INTO `migrations` VALUES (15, '2019_11_13_092213_create_menurole_table', 2);
INSERT INTO `migrations` VALUES (16, '2019_12_10_092113_create_permission_tables', 2);
INSERT INTO `migrations` VALUES (17, '2019_12_11_091036_create_menulist_table', 2);
INSERT INTO `migrations` VALUES (18, '2019_12_18_092518_create_role_hierarchy_table', 2);
INSERT INTO `migrations` VALUES (19, '2020_01_07_093259_create_folder_table', 2);
INSERT INTO `migrations` VALUES (20, '2020_01_08_184500_create_media_table', 2);
INSERT INTO `migrations` VALUES (21, '2020_01_21_161241_create_form_field_table', 2);
INSERT INTO `migrations` VALUES (22, '2020_01_21_161242_create_form_table', 2);
INSERT INTO `migrations` VALUES (23, '2020_01_21_161243_create_example_table', 2);
INSERT INTO `migrations` VALUES (24, '2020_03_12_111400_create_email_template_table', 2);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (9, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (9, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (9, 'App\\Models\\User', 3);
COMMIT;

-- ----------------------------
-- Table structure for myway_first_category
-- ----------------------------
DROP TABLE IF EXISTS `myway_first_category`;
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

-- ----------------------------
-- Records of myway_first_category
-- ----------------------------
BEGIN;
INSERT INTO `myway_first_category` VALUES (1, 'FunEnglish', 'FE', NULL, '2020-12-28 08:20:58', '2020-12-29 09:25:23', 1);
INSERT INTO `myway_first_category` VALUES (5, 'Happy English', 'HE', NULL, '2020-12-29 09:59:03', '2020-12-29 09:59:03', 1);
COMMIT;

-- ----------------------------
-- Table structure for myway_second_category
-- ----------------------------
DROP TABLE IF EXISTS `myway_second_category`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myway_second_category
-- ----------------------------
BEGIN;
INSERT INTO `myway_second_category` VALUES (5, 1, '1', 'FE-1', NULL, '2020-12-29 10:27:43', '2020-12-29 10:46:24', 1);
INSERT INTO `myway_second_category` VALUES (6, 5, '2', 'HE-2', NULL, '2020-12-29 10:48:24', '2020-12-29 15:34:50', 1);
INSERT INTO `myway_second_category` VALUES (7, 5, '1', 'HE-1', NULL, '2020-12-29 15:35:29', '2020-12-29 15:35:29', 1);
COMMIT;

-- ----------------------------
-- Table structure for myway_third_category
-- ----------------------------
DROP TABLE IF EXISTS `myway_third_category`;
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

-- ----------------------------
-- Records of myway_third_category
-- ----------------------------
BEGIN;
INSERT INTO `myway_third_category` VALUES (2, 1, 5, '1', 'FE-1-1', NULL, '2020-12-29 14:57:17', '2020-12-29 15:42:57', 1);
COMMIT;

-- ----------------------------
-- Table structure for myway_topic_levels
-- ----------------------------
DROP TABLE IF EXISTS `myway_topic_levels`;
CREATE TABLE `myway_topic_levels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myway_topic_levels
-- ----------------------------
BEGIN;
INSERT INTO `myway_topic_levels` VALUES (1, '初級', '2021-01-17 01:36:30', NULL);
INSERT INTO `myway_topic_levels` VALUES (2, '中級', '2021-01-17 01:36:45', NULL);
INSERT INTO `myway_topic_levels` VALUES (3, '中高級', '2021-01-17 01:36:49', NULL);
INSERT INTO `myway_topic_levels` VALUES (4, '高級', '2021-01-17 01:36:52', NULL);
COMMIT;

-- ----------------------------
-- Table structure for myway_topic_types
-- ----------------------------
DROP TABLE IF EXISTS `myway_topic_types`;
CREATE TABLE `myway_topic_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) DEFAULT NULL COMMENT '題庫類型',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myway_topic_types
-- ----------------------------
BEGIN;
INSERT INTO `myway_topic_types` VALUES (1, '看圖填空', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (2, '看圖選答', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (3, '看圖選圖', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (4, '單字克漏', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (5, '中翻英整句與句子克漏', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (6, '聽語音句子克漏', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (7, '段落選填空', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (8, '選擇題', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (9, '閱讀測驗', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (10, '看圖選文字答案(多題)\n', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (11, '改錯', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (12, '依提示回答問題', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (13, '依提示寫單字變化', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (14, '依提示修改句子', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (15, '依提示合併句子', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (16, '聽力理解', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (17, '聽語音看圖選答案', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (18, '聽語音選圖案', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (19, '聽語音看圖辯意', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (20, '聽語音選文字答案', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (21, '聽力言談理解', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (22, '句子重組', '2021-01-16 23:13:48', NULL);
INSERT INTO `myway_topic_types` VALUES (23, '聽打', '2021-01-16 23:14:08', NULL);
COMMIT;

-- ----------------------------
-- Table structure for myway_topics
-- ----------------------------
DROP TABLE IF EXISTS `myway_topics`;
CREATE TABLE `myway_topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_id` int DEFAULT NULL COMMENT '題目類型',
  `level_id` int DEFAULT NULL COMMENT '題庫分級ID',
  `name` varchar(45) DEFAULT NULL COMMENT '題目名稱',
  `book_alias` varchar(45) DEFAULT NULL,
  `main_text` text COMMENT '題目文字',
  `main_pic` varchar(255) DEFAULT NULL COMMENT '題目圖檔',
  `main_audio` varchar(255) DEFAULT NULL COMMENT '題目音檔',
  `main_options` json DEFAULT NULL COMMENT '選項',
  `main_answers` json DEFAULT NULL COMMENT '答案',
  `sub_topics` json DEFAULT NULL COMMENT '子題目組',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myway_topics
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for notes
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
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

-- ----------------------------
-- Records of notes
-- ----------------------------
BEGIN;
INSERT INTO `notes` VALUES (1, 'Et perspiciatis dolorum.', 'Sapiente pariatur hic numquam. Autem sed exercitationem voluptatem culpa quae. Voluptatibus neque error quos.', 'voluptatibus est', '1999-06-16', 2, 1, NULL, NULL);
INSERT INTO `notes` VALUES (2, 'Facere quidem inventore aut.', 'Sequi sed exercitationem molestias repellendus. Consequuntur et adipisci expedita. Modi consequatur asperiores et delectus iste. Consequatur consequatur et incidunt dolore consequatur.', 'non', '1979-01-16', 2, 4, NULL, NULL);
INSERT INTO `notes` VALUES (3, 'Qui adipisci ipsam ut.', 'Omnis vitae eos labore voluptatem animi. Quia sunt necessitatibus consequatur sequi iste unde voluptate quia. Assumenda molestiae ut saepe ex rerum rerum omnis.', 'rem sint', '1995-06-27', 2, 4, NULL, NULL);
INSERT INTO `notes` VALUES (4, 'Saepe commodi consequatur necessitatibus harum.', 'Aspernatur nulla et reiciendis. Officiis aut ipsum voluptate. Omnis cupiditate voluptates sed reprehenderit voluptates sed est. Tempore molestiae incidunt praesentium sint dolor cum.', 'a facilis', '2012-09-03', 2, 4, NULL, NULL);
INSERT INTO `notes` VALUES (5, 'Consequatur sed quo nemo et molestiae.', 'Distinctio eveniet at veniam totam. Qui dolor voluptatem occaecati sit nulla. Pariatur repellat laborum eos nulla dolor.', 'consequatur', '1978-03-16', 2, 4, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES (1, 'browse bread 1', 'web', '2020-12-15 03:38:22', '2020-12-15 03:38:22');
INSERT INTO `permissions` VALUES (2, 'read bread 1', 'web', '2020-12-15 03:38:22', '2020-12-15 03:38:22');
INSERT INTO `permissions` VALUES (3, 'edit bread 1', 'web', '2020-12-15 03:38:22', '2020-12-15 03:38:22');
INSERT INTO `permissions` VALUES (4, 'add bread 1', 'web', '2020-12-15 03:38:22', '2020-12-15 03:38:22');
INSERT INTO `permissions` VALUES (5, 'delete bread 1', 'web', '2020-12-15 03:38:22', '2020-12-15 03:38:22');
INSERT INTO `permissions` VALUES (6, 'browse bread 2', 'web', '2020-12-15 06:51:07', '2020-12-15 06:51:07');
INSERT INTO `permissions` VALUES (7, 'read bread 2', 'web', '2020-12-15 06:51:07', '2020-12-15 06:51:07');
INSERT INTO `permissions` VALUES (8, 'edit bread 2', 'web', '2020-12-15 06:51:07', '2020-12-15 06:51:07');
INSERT INTO `permissions` VALUES (9, 'add bread 2', 'web', '2020-12-15 06:51:07', '2020-12-15 06:51:07');
INSERT INTO `permissions` VALUES (10, 'delete bread 2', 'web', '2020-12-15 06:51:07', '2020-12-15 06:51:07');
INSERT INTO `permissions` VALUES (11, 'browse bread 3', 'web', '2020-12-21 12:53:24', '2020-12-21 12:53:24');
INSERT INTO `permissions` VALUES (12, 'read bread 3', 'web', '2020-12-21 12:53:24', '2020-12-21 12:53:24');
INSERT INTO `permissions` VALUES (13, 'edit bread 3', 'web', '2020-12-21 12:53:24', '2020-12-21 12:53:24');
INSERT INTO `permissions` VALUES (14, 'add bread 3', 'web', '2020-12-21 12:53:24', '2020-12-21 12:53:24');
INSERT INTO `permissions` VALUES (15, 'delete bread 3', 'web', '2020-12-21 12:53:24', '2020-12-21 12:53:24');
INSERT INTO `permissions` VALUES (16, 'browse bread 4', 'web', '2020-12-28 07:25:07', '2020-12-28 07:25:07');
INSERT INTO `permissions` VALUES (17, 'read bread 4', 'web', '2020-12-28 07:25:07', '2020-12-28 07:25:07');
INSERT INTO `permissions` VALUES (18, 'edit bread 4', 'web', '2020-12-28 07:25:07', '2020-12-28 07:25:07');
INSERT INTO `permissions` VALUES (19, 'add bread 4', 'web', '2020-12-28 07:25:07', '2020-12-28 07:25:07');
INSERT INTO `permissions` VALUES (20, 'delete bread 4', 'web', '2020-12-28 07:25:07', '2020-12-28 07:25:07');
INSERT INTO `permissions` VALUES (21, 'browse bread 5', 'web', '2020-12-28 07:27:28', '2020-12-28 07:27:28');
INSERT INTO `permissions` VALUES (22, 'read bread 5', 'web', '2020-12-28 07:27:28', '2020-12-28 07:27:28');
INSERT INTO `permissions` VALUES (23, 'edit bread 5', 'web', '2020-12-28 07:27:28', '2020-12-28 07:27:28');
INSERT INTO `permissions` VALUES (24, 'add bread 5', 'web', '2020-12-28 07:27:28', '2020-12-28 07:27:28');
INSERT INTO `permissions` VALUES (25, 'delete bread 5', 'web', '2020-12-28 07:27:28', '2020-12-28 07:27:28');
INSERT INTO `permissions` VALUES (26, 'browse bread 6', 'web', '2020-12-28 07:28:58', '2020-12-28 07:28:58');
INSERT INTO `permissions` VALUES (27, 'read bread 6', 'web', '2020-12-28 07:28:58', '2020-12-28 07:28:58');
INSERT INTO `permissions` VALUES (28, 'edit bread 6', 'web', '2020-12-28 07:28:58', '2020-12-28 07:28:58');
INSERT INTO `permissions` VALUES (29, 'add bread 6', 'web', '2020-12-28 07:28:58', '2020-12-28 07:28:58');
INSERT INTO `permissions` VALUES (30, 'delete bread 6', 'web', '2020-12-28 07:28:58', '2020-12-28 07:28:58');
INSERT INTO `permissions` VALUES (31, 'browse bread 7', 'web', '2021-01-16 15:52:52', '2021-01-16 15:52:52');
INSERT INTO `permissions` VALUES (32, 'read bread 7', 'web', '2021-01-16 15:52:52', '2021-01-16 15:52:52');
INSERT INTO `permissions` VALUES (33, 'edit bread 7', 'web', '2021-01-16 15:52:52', '2021-01-16 15:52:52');
INSERT INTO `permissions` VALUES (34, 'add bread 7', 'web', '2021-01-16 15:52:52', '2021-01-16 15:52:52');
INSERT INTO `permissions` VALUES (35, 'delete bread 7', 'web', '2021-01-16 15:52:52', '2021-01-16 15:52:52');
INSERT INTO `permissions` VALUES (36, 'browse bread 8', 'web', '2021-01-16 17:38:49', '2021-01-16 17:38:49');
INSERT INTO `permissions` VALUES (37, 'read bread 8', 'web', '2021-01-16 17:38:49', '2021-01-16 17:38:49');
INSERT INTO `permissions` VALUES (38, 'edit bread 8', 'web', '2021-01-16 17:38:49', '2021-01-16 17:38:49');
INSERT INTO `permissions` VALUES (39, 'add bread 8', 'web', '2021-01-16 17:38:49', '2021-01-16 17:38:49');
INSERT INTO `permissions` VALUES (40, 'delete bread 8', 'web', '2021-01-16 17:38:49', '2021-01-16 17:38:49');
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (35, 1);
INSERT INTO `role_has_permissions` VALUES (36, 1);
INSERT INTO `role_has_permissions` VALUES (6, 2);
INSERT INTO `role_has_permissions` VALUES (7, 2);
INSERT INTO `role_has_permissions` VALUES (8, 2);
INSERT INTO `role_has_permissions` VALUES (9, 2);
INSERT INTO `role_has_permissions` VALUES (10, 2);
INSERT INTO `role_has_permissions` VALUES (11, 2);
INSERT INTO `role_has_permissions` VALUES (12, 2);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (14, 2);
INSERT INTO `role_has_permissions` VALUES (15, 2);
INSERT INTO `role_has_permissions` VALUES (16, 2);
INSERT INTO `role_has_permissions` VALUES (17, 2);
INSERT INTO `role_has_permissions` VALUES (18, 2);
INSERT INTO `role_has_permissions` VALUES (19, 2);
INSERT INTO `role_has_permissions` VALUES (20, 2);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (22, 2);
INSERT INTO `role_has_permissions` VALUES (23, 2);
INSERT INTO `role_has_permissions` VALUES (24, 2);
INSERT INTO `role_has_permissions` VALUES (25, 2);
INSERT INTO `role_has_permissions` VALUES (26, 2);
INSERT INTO `role_has_permissions` VALUES (27, 2);
INSERT INTO `role_has_permissions` VALUES (28, 2);
INSERT INTO `role_has_permissions` VALUES (29, 2);
INSERT INTO `role_has_permissions` VALUES (30, 2);
INSERT INTO `role_has_permissions` VALUES (31, 2);
INSERT INTO `role_has_permissions` VALUES (32, 2);
INSERT INTO `role_has_permissions` VALUES (33, 2);
INSERT INTO `role_has_permissions` VALUES (34, 2);
INSERT INTO `role_has_permissions` VALUES (35, 2);
INSERT INTO `role_has_permissions` VALUES (36, 2);
INSERT INTO `role_has_permissions` VALUES (6, 3);
INSERT INTO `role_has_permissions` VALUES (7, 3);
INSERT INTO `role_has_permissions` VALUES (8, 3);
INSERT INTO `role_has_permissions` VALUES (9, 3);
INSERT INTO `role_has_permissions` VALUES (10, 3);
INSERT INTO `role_has_permissions` VALUES (1, 10);
INSERT INTO `role_has_permissions` VALUES (2, 10);
INSERT INTO `role_has_permissions` VALUES (3, 10);
INSERT INTO `role_has_permissions` VALUES (4, 10);
INSERT INTO `role_has_permissions` VALUES (5, 10);
COMMIT;

-- ----------------------------
-- Table structure for role_hierarchy
-- ----------------------------
DROP TABLE IF EXISTS `role_hierarchy`;
CREATE TABLE `role_hierarchy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL,
  `hierarchy` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_hierarchy
-- ----------------------------
BEGIN;
INSERT INTO `role_hierarchy` VALUES (1, 1, 1);
INSERT INTO `role_hierarchy` VALUES (2, 2, 2);
INSERT INTO `role_hierarchy` VALUES (3, 3, 3);
INSERT INTO `role_hierarchy` VALUES (4, 4, 4);
INSERT INTO `role_hierarchy` VALUES (5, 5, 5);
INSERT INTO `role_hierarchy` VALUES (6, 6, 6);
INSERT INTO `role_hierarchy` VALUES (7, 7, 7);
INSERT INTO `role_hierarchy` VALUES (8, 8, 8);
INSERT INTO `role_hierarchy` VALUES (9, 9, 9);
INSERT INTO `role_hierarchy` VALUES (10, 10, 10);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES (1, 'admin', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (2, 'mywayAdmin', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (3, 'schoolAdmin', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (4, 'principal', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (5, 'teacher', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (6, 'assistant', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (7, 'parent', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (8, 'student', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (9, 'user', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
INSERT INTO `roles` VALUES (10, 'guest', 'web', '2020-12-15 03:38:21', '2020-12-15 03:38:21');
COMMIT;

-- ----------------------------
-- Table structure for school_category
-- ----------------------------
DROP TABLE IF EXISTS `school_category`;
CREATE TABLE `school_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分類名稱',
  `description` varchar(255) DEFAULT NULL COMMENT '分類描述',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school_category
-- ----------------------------
BEGIN;
INSERT INTO `school_category` VALUES (3, '分類1測試', '這是分類說明', '2020-12-21 21:43:29', '2020-12-21 21:43:29');
COMMIT;

-- ----------------------------
-- Table structure for schools_branch_info
-- ----------------------------
DROP TABLE IF EXISTS `schools_branch_info`;
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

-- ----------------------------
-- Records of schools_branch_info
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for schools_main_info
-- ----------------------------
DROP TABLE IF EXISTS `schools_main_info`;
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

-- ----------------------------
-- Records of schools_main_info
-- ----------------------------
BEGIN;
INSERT INTO `schools_main_info` VALUES (1, '狀元補習班', '狀元', '南陽街', '0212345678', '', 'AE12345678', 3, '19WQR1OXWB4', NULL, NULL, 37, '2020-12-28 01:41:42', '2020-12-31', '2020-12-27 17:42:13', 1);
COMMIT;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of status
-- ----------------------------
BEGIN;
INSERT INTO `status` VALUES (1, 'ongoing', 'badge badge-pill badge-primary');
INSERT INTO `status` VALUES (2, 'stopped', 'badge badge-pill badge-secondary');
INSERT INTO `status` VALUES (3, 'completed', 'badge badge-pill badge-success');
INSERT INTO `status` VALUES (4, 'expired', 'badge badge-pill badge-warning');
COMMIT;

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
BEGIN;
INSERT INTO `user_roles` VALUES (1, '超級管理員', NULL, NULL);
INSERT INTO `user_roles` VALUES (2, '管理員', NULL, NULL);
INSERT INTO `user_roles` VALUES (3, '會員', NULL, NULL);
INSERT INTO `user_roles` VALUES (4, '分校校長', NULL, NULL);
INSERT INTO `user_roles` VALUES (5, '教師', NULL, NULL);
INSERT INTO `user_roles` VALUES (6, '助教', NULL, NULL);
INSERT INTO `user_roles` VALUES (7, '家長', NULL, NULL);
INSERT INTO `user_roles` VALUES (8, '學生', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'admin', NULL, NULL, NULL, NULL, 'admin@admin.com', '2020-12-15 03:38:21', '$2y$10$2zdhLPnCTLn0K/zihJBiz.1A5xHnlFCu07wrpuJLIlNB4g5F5SD5W', 'admin', 'jlnU7PxaLsmWJNLuSCLVgYFzbpRhA6hyrWnvsBk2ixhKKIySemAPTxArZE4B', '2020-12-15 03:38:21', '2020-12-15 03:38:21', NULL, 1);
INSERT INTO `users` VALUES (6, 'test', NULL, NULL, NULL, NULL, 'admin@myway.com', NULL, '$2y$10$2zdhLPnCTLn0K/zihJBiz.1A5xHnlFCu07wrpuJLIlNB4g5F5SD5W', 'mywayAdmin', NULL, '2020-12-15 10:34:21', '2020-12-15 10:34:21', NULL, 1);
INSERT INTO `users` VALUES (19, 'teachera', NULL, NULL, NULL, NULL, 'test@gmail.com', NULL, '$2y$10$ApZ2vlv1bixjyb9180oMHefnKt1fF7SQRjZLObJuhVHZA/zR6bDIW', 'teacher', NULL, NULL, '2020-12-16 15:09:08', NULL, 1);
INSERT INTO `users` VALUES (23, 'linba', NULL, '0912345678', 'linba', NULL, 'linba@gmail.com', NULL, '$2y$10$RzpGqnPx3ipAQJmhhx451.27j6VhoCUSpBuXz/Zm0jxm7jcuyeTSS', 'parent', NULL, '2020-12-16 16:26:04', NULL, NULL, 1);
INSERT INTO `users` VALUES (24, 'linma', 'linma', '0912345678', 'linma', 'ss', 'linma@gmail.com', NULL, '$2y$10$d9uz1Z5HNK/5oyYhLiTrxe/.S/VMoi9LGB1993coxPTaKx4UzEQD2', 'parent', NULL, '2020-12-16 16:26:04', '2020-12-21 11:33:58', NULL, 1);
INSERT INTO `users` VALUES (25, '林寶', 'linbo', NULL, 'linbo', NULL, 'linbo@gmail.com', NULL, '$2y$10$xkJc3fqvsIwejWr3fRNnLOpExLh4eddWAY2dzTr2CMdhvWetGQz9e', 'student', NULL, '2020-12-16 16:26:04', '2020-12-21 11:51:44', NULL, 1);
INSERT INTO `users` VALUES (26, 'Q爸', NULL, '0912345678', 'qba', NULL, 'qba@gmail.com', NULL, '$2y$10$r6a55yCQJumWUtyabVMwsO.L6tZir1iHak/DnMIeD6CJBxfKUUlni', 'parent', NULL, '2020-12-21 12:31:53', NULL, NULL, 1);
INSERT INTO `users` VALUES (27, 'Q媽', NULL, '0987654321', 'qma', NULL, 'qma@gmail.com', NULL, '$2y$10$jvT43le9mr8zJA3SVONJ1ObVVKR3/bKBcWTf1XNfzf4dKwE38ouQy', 'parent', NULL, '2020-12-21 12:31:53', NULL, NULL, 1);
INSERT INTO `users` VALUES (28, 'Q寶', 'QQ', NULL, 'qbo', NULL, 'qbo@gmail.com', NULL, '$2y$10$iAuDWo1ogI9/0lQdcHHvOO3kcajlKNX4RpXaYz/MncaWEqf0AKWpO', 'student', NULL, '2020-12-21 12:31:53', NULL, NULL, 1);
INSERT INTO `users` VALUES (37, '林總校長', NULL, '0912222332', 'linprincipal', NULL, 'admin@testschool.com', NULL, '$2y$10$Oyg0ib6u9m5lYgKYzbx/1.Rddm4AzCH3/iBukv8lTrDqDlqy8CPfS', 'schoolAdmin', NULL, '2020-12-27 16:10:39', '2020-12-27 17:42:13', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for users_student_infos
-- ----------------------------
DROP TABLE IF EXISTS `users_student_infos`;
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

-- ----------------------------
-- Records of users_student_infos
-- ----------------------------
BEGIN;
INSERT INTO `users_student_infos` VALUES (4, 25, NULL, 23, 24, 'otherss', '2020-12-18', '2020-12-31', '2020-12-16 16:26:04', '2020-12-21 20:25:41');
INSERT INTO `users_student_infos` VALUES (5, 28, NULL, 26, 27, 'p', '2020-12-22', '2020-12-31', '2020-12-21 12:31:53', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
