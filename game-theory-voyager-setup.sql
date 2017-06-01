-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for game_theory_2
CREATE DATABASE IF NOT EXISTS `game_theory_2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `game_theory_2`;


-- Dumping structure for table game_theory_2.categories
CREATE TABLE IF NOT EXISTS `categories` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) unsigned DEFAULT NULL,
	`order` int(11) NOT NULL DEFAULT '1',
	`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `categories_slug_unique` (`slug`),
	KEY `categories_parent_id_foreign` (`parent_id`),
	CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.categories: ~0 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.data_rows
CREATE TABLE IF NOT EXISTS `data_rows` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`data_type_id` int(10) unsigned NOT NULL,
	`field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`required` tinyint(1) NOT NULL DEFAULT '0',
	`browse` tinyint(1) NOT NULL DEFAULT '1',
	`read` tinyint(1) NOT NULL DEFAULT '1',
	`edit` tinyint(1) NOT NULL DEFAULT '1',
	`add` tinyint(1) NOT NULL DEFAULT '1',
	`delete` tinyint(1) NOT NULL DEFAULT '1',
	`details` text COLLATE utf8mb4_unicode_ci,
	`order` int(11) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`),
	KEY `data_rows_data_type_id_foreign` (`data_type_id`),
	CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.data_rows: ~109 rows (approximately)
DELETE FROM `data_rows`;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
	(26, 3, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
	(27, 3, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
	(28, 3, 'email', 'text', 'email', 1, 1, 1, 1, 1, 1, '', 3),
	(29, 3, 'password', 'password', 'password', 1, 0, 0, 1, 1, 0, '', 4),
	(30, 3, 'remember_token', 'text', 'remember_token', 0, 0, 0, 0, 0, 0, '', 5),
	(31, 3, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 6),
	(32, 3, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
	(33, 3, 'avatar', 'image', 'avatar', 0, 1, 1, 1, 1, 1, '', 8),
	(34, 5, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
	(35, 5, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
	(36, 5, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
	(37, 5, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
	(45, 6, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
	(46, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
	(47, 6, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
	(48, 6, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
	(49, 6, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
	(52, 3, 'role_id', 'text', 'role_id', 1, 1, 1, 1, 1, 1, '', 9),
	(53, 7, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(54, 7, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(55, 7, 'design_chain', 'text_area', 'Design Chain', 1, 0, 1, 1, 1, 1, NULL, 3),
	(56, 7, 'bias_chain', 'text_area', 'Bias Chain', 1, 0, 1, 1, 1, 1, NULL, 4),
	(57, 7, 'text_chain', 'text_area', 'Text Chain', 1, 0, 1, 1, 1, 1, NULL, 5),
	(58, 7, 'random_design_iteration', 'checkbox', 'Random Design Iteration', 1, 1, 1, 1, 1, 1, NULL, 6),
	(59, 7, 'random_design_chain', 'checkbox', 'Random Design Chain', 1, 1, 1, 1, 1, 1, NULL, 7),
	(60, 7, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 8),
	(61, 7, 'opponent', 'text', 'Opponent', 1, 1, 1, 1, 1, 1, NULL, 9),
	(62, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 10),
	(63, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 11),
	(64, 8, 'id', 'number', 'Id', 1, 1, 1, 0, 0, 0, NULL, 1),
	(65, 8, 'ip', 'text', 'Ip', 1, 1, 1, 0, 0, 0, NULL, 2),
	(66, 8, 'code', 'text', 'Code', 1, 1, 1, 0, 0, 0, NULL, 3),
	(67, 8, 'study_name', 'text', 'Study Name', 1, 1, 1, 0, 0, 0, NULL, 4),
	(68, 8, 'study_time', 'checkbox', 'Study Time', 1, 1, 1, 0, 0, 0, NULL, 5),
	(69, 8, 'condition_name', 'text', 'Condition Name', 1, 1, 1, 0, 0, 0, NULL, 6),
	(70, 8, 'game_phases_played', 'text', 'Game Phases Played', 1, 1, 1, 0, 0, 0, NULL, 7),
	(71, 8, 'practice_phases_played', 'text', 'Practice Phases Played', 1, 0, 1, 0, 0, 0, NULL, 8),
	(72, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 9),
	(73, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 10),
	(74, 9, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(75, 9, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(76, 9, 'iterations', 'number', 'Iterations', 1, 1, 1, 1, 1, 1, NULL, 3),
	(77, 9, 'competitive_option', 'number', 'Competitive Option', 1, 1, 1, 1, 1, 1, NULL, 4),
	(78, 9, 'outcome_1_value', 'text', 'Outcome 1 Value', 1, 0, 1, 1, 1, 1, NULL, 5),
	(79, 9, 'outcome_2_value', 'text', 'Outcome 2 Value', 1, 0, 1, 1, 1, 1, NULL, 6),
	(80, 9, 'outcome_3_value', 'text', 'Outcome 3 Value', 1, 0, 1, 1, 1, 1, NULL, 7),
	(81, 9, 'outcome_4_value', 'text', 'Outcome 4 Value', 1, 0, 1, 1, 1, 1, NULL, 8),
	(82, 9, 'label', 'text', 'Label', 1, 1, 1, 1, 1, 1, NULL, 9),
	(83, 9, 'outcome_1_description', 'text_area', 'Outcome 1 Description', 1, 0, 1, 1, 1, 1, NULL, 10),
	(84, 9, 'outcome_2_description', 'text_area', 'Outcome 2 Description', 1, 0, 1, 1, 1, 1, NULL, 11),
	(85, 9, 'outcome_3_description', 'text_area', 'Outcome 3 Description', 1, 0, 1, 1, 1, 1, NULL, 12),
	(86, 9, 'outcome_4_description', 'text_area', 'Outcome 4 Description', 1, 0, 1, 1, 1, 1, NULL, 13),
	(87, 9, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 14),
	(88, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 15),
	(89, 10, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(90, 10, 'current_url', 'text', 'Current Url', 1, 0, 1, 1, 1, 1, NULL, 2),
	(91, 10, 'next_url', 'text', 'Next Url', 1, 0, 1, 1, 1, 1, NULL, 3),
	(92, 10, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
	(93, 10, 'text', 'rich_text_box', 'Text', 1, 1, 1, 1, 1, 1, NULL, 5),
	(94, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 6),
	(95, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
	(96, 11, 'id', 'number', 'Id', 1, 1, 1, 0, 0, 0, NULL, 1),
	(97, 11, 'current_url', 'text', 'Current Url', 1, 1, 1, 1, 1, 1, NULL, 2),
	(98, 11, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 3),
	(99, 11, 'order', 'number', 'Order', 1, 1, 1, 1, 1, 1, NULL, 4),
	(100, 11, 'tag_type', 'text', 'Tag Type', 1, 0, 1, 1, 1, 1, NULL, 5),
	(101, 11, 'attr_name', 'text', 'Attr Name', 1, 0, 1, 1, 1, 1, NULL, 6),
	(102, 11, 'attr_id', 'text', 'Attr Id', 1, 0, 1, 1, 1, 1, NULL, 7),
	(103, 11, 'label', 'text', 'Label', 1, 0, 1, 1, 1, 1, NULL, 8),
	(104, 11, 'attr_type', 'text', 'Attr Type', 0, 0, 1, 1, 1, 1, NULL, 9),
	(105, 11, 'attr_placeholder', 'text', 'Attr Placeholder', 0, 0, 1, 1, 1, 1, NULL, 10),
	(106, 11, 'attr_value', 'text', 'Attr Value', 0, 0, 1, 1, 1, 1, NULL, 11),
	(107, 11, 'attr_class', 'text', 'Attr Class', 0, 0, 1, 1, 1, 1, NULL, 12),
	(108, 11, 'attr_min', 'number', 'Attr Min', 0, 0, 1, 1, 1, 1, NULL, 13),
	(109, 11, 'attr_max', 'number', 'Attr Max', 0, 0, 1, 1, 1, 1, NULL, 14),
	(110, 11, 'attr_required', 'checkbox', 'Attr Required', 0, 1, 1, 1, 1, 1, NULL, 15),
	(111, 11, 'attr_autocomplete', 'checkbox', 'Attr Autocomplete', 0, 1, 1, 1, 1, 1, NULL, 16),
	(112, 11, 'attr_disabled', 'checkbox', 'Attr Disabled', 0, 1, 1, 1, 1, 1, NULL, 17),
	(113, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 18),
	(114, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 19),
	(115, 12, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(116, 12, 'form_element_id', 'number', 'Form Element Id', 1, 1, 1, 1, 1, 1, NULL, 2),
	(117, 12, 'order', 'number', 'Order', 1, 1, 1, 1, 1, 1, NULL, 3),
	(118, 12, 'value', 'text', 'Value', 1, 0, 1, 1, 1, 1, NULL, 4),
	(119, 12, 'text', 'text', 'Text', 1, 1, 1, 1, 1, 1, NULL, 5),
	(120, 12, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 6),
	(121, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
	(122, 13, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(123, 13, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(124, 13, 'condition_set', 'text_area', 'Condition Set', 1, 1, 1, 1, 1, 1, NULL, 3),
	(125, 13, 'practice', 'text_area', 'Practice', 1, 1, 1, 1, 1, 1, NULL, 4),
	(126, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 5),
	(127, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 6),
	(128, 15, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(129, 15, 'load_study', 'text', 'Load Study', 1, 1, 1, 1, 1, 1, NULL, 2),
	(130, 15, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
	(131, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
	(132, 16, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(133, 16, 'order', 'number', 'Order', 1, 1, 1, 1, 1, 1, NULL, 2),
	(134, 16, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 3),
	(135, 16, 'text', 'text_area', 'Text', 1, 1, 1, 1, 1, 1, NULL, 4),
	(136, 16, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 5),
	(137, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 6),
	(138, 17, 'id', 'checkbox', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
	(139, 17, 'order', 'number', 'Order', 1, 1, 1, 1, 1, 1, NULL, 2),
	(140, 17, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 3),
	(141, 17, 'text', 'text_area', 'Text', 1, 1, 1, 1, 1, 1, NULL, 4),
	(142, 17, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 5),
	(143, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 6);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.data_types
CREATE TABLE IF NOT EXISTS `data_types` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
	`server_side` tinyint(4) NOT NULL DEFAULT '0',
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `data_types_name_unique` (`name`),
	UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.data_types: ~13 rows (approximately)
DELETE FROM `data_types`;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`) VALUES
	(3, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', '', '', 1, 0, '2017-05-07 21:33:07', '2017-05-07 21:33:07'),
	(5, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', '', '', 1, 0, '2017-05-07 21:33:07', '2017-05-07 21:33:07'),
	(6, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', '', '', 1, 0, '2017-05-07 21:33:07', '2017-05-07 21:33:07'),
	(7, 'conditions', 'conditions', 'Condition', 'Conditions', NULL, 'App\\Models\\Condition', NULL, NULL, 1, 0, '2017-05-07 22:24:08', '2017-05-07 22:24:08'),
	(8, 'data_participants', 'data-participants', 'Data Participant', 'Data Participants', 'voyager-people', 'App\\Models\\DataParticipant', NULL, 'A place where you can see all the people that have been joined the study so far.', 1, 0, '2017-05-07 22:38:35', '2017-05-07 22:38:35'),
	(9, 'designs', 'designs', 'Design', 'Designs', 'voyager-paint-bucket', 'App\\Models\\Design', NULL, NULL, 1, 0, '2017-05-07 22:46:22', '2017-05-07 22:46:22'),
	(10, 'instructions', 'instructions', 'Instruction', 'Instructions', 'voyager-news', 'App\\Models\\Instruction', NULL, NULL, 1, 0, '2017-05-07 22:55:26', '2017-05-07 22:55:26'),
	(11, 'form_elements', 'form-elements', 'Form Element', 'Form Elements', NULL, 'App\\Models\\FormElement', NULL, NULL, 1, 0, '2017-05-07 23:37:07', '2017-05-07 23:37:07'),
	(12, 'select_options', 'select-options', 'Select Option', 'Select Options', NULL, 'App\\Models\\SelectOption', NULL, NULL, 1, 0, '2017-05-07 23:41:09', '2017-05-07 23:41:09'),
	(13, 'studies', 'studies', 'Study', 'Studies', NULL, 'App\\Models\\Study', NULL, NULL, 1, 0, '2017-05-07 23:44:35', '2017-05-07 23:44:35'),
	(15, 'study_loaders', 'study-loaders', 'Study Loader', 'Study Loaders', NULL, 'App\\Models\\StudyLoader', NULL, NULL, 1, 0, '2017-05-07 23:52:51', '2017-05-07 23:52:51'),
	(16, 'personality_items', 'personality-items', 'Personality Item', 'Personality Items', NULL, 'App\\Models\\PersonalityItem', NULL, NULL, 1, 0, '2017-05-07 23:55:27', '2017-05-07 23:55:27'),
	(17, 'item_scales', 'item-scales', 'Item Scale', 'Item Scales', NULL, 'App\\Models\\ItemScale', NULL, NULL, 1, 0, '2017-05-07 23:59:09', '2017-05-07 23:59:09');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.menus
CREATE TABLE IF NOT EXISTS `menus` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.menus: ~1 rows (approximately)
DELETE FROM `menus`;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2017-05-07 21:33:07', '2017-05-07 21:33:07');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`menu_id` int(10) unsigned DEFAULT NULL,
	`title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
	`icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`parent_id` int(11) DEFAULT NULL,
	`order` int(11) NOT NULL,
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	`route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`parameters` text COLLATE utf8mb4_unicode_ci,
	PRIMARY KEY (`id`),
	KEY `menu_items_menu_id_foreign` (`menu_id`),
	CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.menu_items: ~24 rows (approximately)
DELETE FROM `menu_items`;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
	(1, 1, 'Presentation', '/admin/instructions', '_self', 'voyager-bar-chart', '#000000', NULL, 3, '2017-05-07 21:33:07', '2017-05-07 22:57:47', NULL, ''),
	(2, 1, 'Media', '/admin/media', '_self', 'voyager-images', NULL, NULL, 8, '2017-05-07 21:33:07', '2017-05-07 23:58:07', NULL, NULL),
	(3, 1, 'Access', '', '_self', 'voyager-lock', '#000000', NULL, 6, '2017-05-07 21:33:07', '2017-05-07 23:58:07', NULL, ''),
	(4, 1, 'Users', '/admin/users', '_self', 'voyager-person', NULL, 3, 1, '2017-05-07 21:33:07', '2017-05-07 22:51:38', NULL, NULL),
	(7, 1, 'Roles', '/admin/roles', '_self', 'voyager-lock', NULL, 3, 2, '2017-05-07 21:33:07', '2017-05-07 22:51:43', NULL, NULL),
	(8, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 7, '2017-05-07 21:33:07', '2017-05-07 23:58:07', NULL, NULL),
	(9, 1, 'Menu Builder', '/admin/menus', '_self', 'voyager-list', NULL, 8, 1, '2017-05-07 21:33:07', '2017-05-07 22:51:52', NULL, NULL),
	(10, 1, 'Database', '/admin/database', '_self', 'voyager-data', NULL, 8, 2, '2017-05-07 21:33:07', '2017-05-07 22:51:52', NULL, NULL),
	(11, 1, 'Settings', '/admin/settings', '_self', 'voyager-settings', NULL, 8, 3, '2017-05-07 21:33:07', '2017-05-07 22:51:52', NULL, NULL),
	(12, 1, 'Export Data', 'admin/export', '_blank', 'voyager-file-text', '#000000', 17, 2, '2017-05-07 21:46:15', '2017-05-08 10:24:33', NULL, ''),
	(13, 1, 'Conditions', 'admin/conditions', '_self', 'voyager-controller', '#000000', 16, 1, '2017-05-07 22:25:29', '2017-05-07 22:48:55', NULL, ''),
	(14, 1, 'Participants', 'admin/data-participants', '_self', 'voyager-people', '#000000', 17, 1, '2017-05-07 22:39:30', '2017-05-07 23:16:32', NULL, ''),
	(15, 1, 'Designs', 'admin/designs', '_self', 'voyager-paint-bucket', '#000000', 16, 2, '2017-05-07 22:47:30', '2017-05-07 23:12:22', NULL, ''),
	(16, 1, 'Configuration', '', '_self', 'voyager-hammer', '#000000', NULL, 2, '2017-05-07 22:48:25', '2017-05-07 22:49:46', NULL, ''),
	(17, 1, 'Data', '', '_self', 'voyager-folder', '#000000', NULL, 1, '2017-05-07 22:49:37', '2017-05-07 22:49:42', NULL, ''),
	(18, 1, 'Instructions', 'admin/instructions', '_self', 'voyager-list', '#000000', 1, 1, '2017-05-07 22:57:41', '2017-05-07 22:57:53', NULL, ''),
	(19, 1, 'Forms', 'forms', '_self', 'voyager-params', '#000000', NULL, 5, '2017-05-07 23:38:08', '2017-05-07 23:58:07', NULL, ''),
	(20, 1, 'Elements', 'admin/form-elements', '_self', 'voyager-chat', '#000000', 19, 1, '2017-05-07 23:39:10', '2017-05-07 23:39:16', NULL, ''),
	(21, 1, 'Options', 'admin/select-options', '_self', 'voyager-character', '#000000', 19, 2, '2017-05-07 23:41:52', '2017-05-07 23:42:00', NULL, ''),
	(22, 1, 'Studies', 'admin/studies', '_self', 'voyager-study', '#000000', 16, 3, '2017-05-07 23:45:15', '2017-05-07 23:49:18', NULL, ''),
	(23, 1, 'Current Study', 'admin/study-loaders', '_self', 'voyager-medal-rank-star', '#000000', 16, 4, '2017-05-07 23:46:55', '2017-05-07 23:52:05', NULL, ''),
	(24, 1, 'Questionnaires', '', '_self', 'voyager-paper-plane', '#000000', NULL, 4, '2017-05-07 23:56:18', '2017-05-07 23:56:37', NULL, ''),
	(25, 1, 'Items', 'admin/personality-items', '_self', 'voyager-font', '#000000', 24, 1, '2017-05-07 23:57:25', '2017-05-07 23:57:32', NULL, ''),
	(26, 1, 'Scales', 'admin/item-scales', '_self', 'voyager-sort', '#000000', 24, 2, '2017-05-07 23:58:01', '2017-05-08 08:39:14', NULL, '');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.pages
CREATE TABLE IF NOT EXISTS `pages` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`author_id` int(11) NOT NULL,
	`title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`excerpt` text COLLATE utf8mb4_unicode_ci,
	`body` text COLLATE utf8mb4_unicode_ci,
	`image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`meta_description` text COLLATE utf8mb4_unicode_ci,
	`meta_keywords` text COLLATE utf8mb4_unicode_ci,
	`status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.pages: ~0 rows (approximately)
DELETE FROM `pages`;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	`permission_group_id` int(10) unsigned DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.permissions: ~69 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
	(1, 'browse_admin', NULL, '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(2, 'browse_database', NULL, '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(3, 'browse_media', NULL, '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(4, 'browse_settings', NULL, '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(5, 'browse_menus', 'menus', '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(6, 'read_menus', 'menus', '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(7, 'edit_menus', 'menus', '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(8, 'add_menus', 'menus', '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(9, 'delete_menus', 'menus', '2017-05-07 21:33:07', '2017-05-07 21:33:07', NULL),
	(15, 'browse_roles', 'roles', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(16, 'read_roles', 'roles', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(17, 'edit_roles', 'roles', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(18, 'add_roles', 'roles', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(19, 'delete_roles', 'roles', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(20, 'browse_users', 'users', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(21, 'read_users', 'users', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(22, 'edit_users', 'users', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(23, 'add_users', 'users', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(24, 'delete_users', 'users', '2017-05-07 21:33:08', '2017-05-07 21:33:08', NULL),
	(35, 'browse_conditions', 'conditions', '2017-05-07 22:24:08', '2017-05-07 22:24:08', NULL),
	(36, 'read_conditions', 'conditions', '2017-05-07 22:24:08', '2017-05-07 22:24:08', NULL),
	(37, 'edit_conditions', 'conditions', '2017-05-07 22:24:08', '2017-05-07 22:24:08', NULL),
	(38, 'add_conditions', 'conditions', '2017-05-07 22:24:08', '2017-05-07 22:24:08', NULL),
	(39, 'delete_conditions', 'conditions', '2017-05-07 22:24:08', '2017-05-07 22:24:08', NULL),
	(40, 'browse_data_participants', 'data_participants', '2017-05-07 22:38:35', '2017-05-07 22:38:35', NULL),
	(41, 'read_data_participants', 'data_participants', '2017-05-07 22:38:35', '2017-05-07 22:38:35', NULL),
	(42, 'edit_data_participants', 'data_participants', '2017-05-07 22:38:35', '2017-05-07 22:38:35', NULL),
	(43, 'add_data_participants', 'data_participants', '2017-05-07 22:38:35', '2017-05-07 22:38:35', NULL),
	(44, 'delete_data_participants', 'data_participants', '2017-05-07 22:38:35', '2017-05-07 22:38:35', NULL),
	(45, 'browse_designs', 'designs', '2017-05-07 22:46:22', '2017-05-07 22:46:22', NULL),
	(46, 'read_designs', 'designs', '2017-05-07 22:46:22', '2017-05-07 22:46:22', NULL),
	(47, 'edit_designs', 'designs', '2017-05-07 22:46:22', '2017-05-07 22:46:22', NULL),
	(48, 'add_designs', 'designs', '2017-05-07 22:46:22', '2017-05-07 22:46:22', NULL),
	(49, 'delete_designs', 'designs', '2017-05-07 22:46:22', '2017-05-07 22:46:22', NULL),
	(50, 'browse_instructions', 'instructions', '2017-05-07 22:55:26', '2017-05-07 22:55:26', NULL),
	(51, 'read_instructions', 'instructions', '2017-05-07 22:55:26', '2017-05-07 22:55:26', NULL),
	(52, 'edit_instructions', 'instructions', '2017-05-07 22:55:26', '2017-05-07 22:55:26', NULL),
	(53, 'add_instructions', 'instructions', '2017-05-07 22:55:26', '2017-05-07 22:55:26', NULL),
	(54, 'delete_instructions', 'instructions', '2017-05-07 22:55:26', '2017-05-07 22:55:26', NULL),
	(55, 'browse_form_elements', 'form_elements', '2017-05-07 23:37:07', '2017-05-07 23:37:07', NULL),
	(56, 'read_form_elements', 'form_elements', '2017-05-07 23:37:07', '2017-05-07 23:37:07', NULL),
	(57, 'edit_form_elements', 'form_elements', '2017-05-07 23:37:07', '2017-05-07 23:37:07', NULL),
	(58, 'add_form_elements', 'form_elements', '2017-05-07 23:37:07', '2017-05-07 23:37:07', NULL),
	(59, 'delete_form_elements', 'form_elements', '2017-05-07 23:37:07', '2017-05-07 23:37:07', NULL),
	(60, 'browse_select_options', 'select_options', '2017-05-07 23:41:09', '2017-05-07 23:41:09', NULL),
	(61, 'read_select_options', 'select_options', '2017-05-07 23:41:09', '2017-05-07 23:41:09', NULL),
	(62, 'edit_select_options', 'select_options', '2017-05-07 23:41:09', '2017-05-07 23:41:09', NULL),
	(63, 'add_select_options', 'select_options', '2017-05-07 23:41:09', '2017-05-07 23:41:09', NULL),
	(64, 'delete_select_options', 'select_options', '2017-05-07 23:41:09', '2017-05-07 23:41:09', NULL),
	(65, 'browse_studies', 'studies', '2017-05-07 23:44:35', '2017-05-07 23:44:35', NULL),
	(66, 'read_studies', 'studies', '2017-05-07 23:44:35', '2017-05-07 23:44:35', NULL),
	(67, 'edit_studies', 'studies', '2017-05-07 23:44:35', '2017-05-07 23:44:35', NULL),
	(68, 'add_studies', 'studies', '2017-05-07 23:44:35', '2017-05-07 23:44:35', NULL),
	(69, 'delete_studies', 'studies', '2017-05-07 23:44:35', '2017-05-07 23:44:35', NULL),
	(70, 'browse_study_loaders', 'study_loaders', '2017-05-07 23:52:51', '2017-05-07 23:52:51', NULL),
	(71, 'read_study_loaders', 'study_loaders', '2017-05-07 23:52:51', '2017-05-07 23:52:51', NULL),
	(72, 'edit_study_loaders', 'study_loaders', '2017-05-07 23:52:51', '2017-05-07 23:52:51', NULL),
	(73, 'add_study_loaders', 'study_loaders', '2017-05-07 23:52:51', '2017-05-07 23:52:51', NULL),
	(74, 'delete_study_loaders', 'study_loaders', '2017-05-07 23:52:51', '2017-05-07 23:52:51', NULL),
	(75, 'browse_personality_items', 'personality_items', '2017-05-07 23:55:27', '2017-05-07 23:55:27', NULL),
	(76, 'read_personality_items', 'personality_items', '2017-05-07 23:55:27', '2017-05-07 23:55:27', NULL),
	(77, 'edit_personality_items', 'personality_items', '2017-05-07 23:55:27', '2017-05-07 23:55:27', NULL),
	(78, 'add_personality_items', 'personality_items', '2017-05-07 23:55:27', '2017-05-07 23:55:27', NULL),
	(79, 'delete_personality_items', 'personality_items', '2017-05-07 23:55:27', '2017-05-07 23:55:27', NULL),
	(80, 'browse_item_scales', 'item_scales', '2017-05-07 23:59:09', '2017-05-07 23:59:09', NULL),
	(81, 'read_item_scales', 'item_scales', '2017-05-07 23:59:09', '2017-05-07 23:59:09', NULL),
	(82, 'edit_item_scales', 'item_scales', '2017-05-07 23:59:09', '2017-05-07 23:59:09', NULL),
	(83, 'add_item_scales', 'item_scales', '2017-05-07 23:59:09', '2017-05-07 23:59:09', NULL),
	(84, 'delete_item_scales', 'item_scales', '2017-05-07 23:59:09', '2017-05-07 23:59:09', NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.permission_groups
CREATE TABLE IF NOT EXISTS `permission_groups` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `permission_groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.permission_groups: ~0 rows (approximately)
DELETE FROM `permission_groups`;
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_groups` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
	`permission_id` int(10) unsigned NOT NULL,
	`role_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`permission_id`,`role_id`),
	KEY `permission_role_permission_id_index` (`permission_id`),
	KEY `permission_role_role_id_index` (`role_id`),
	CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
	CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.permission_role: ~69 rows (approximately)
DELETE FROM `permission_role`;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(54, 1),
	(55, 1),
	(56, 1),
	(57, 1),
	(58, 1),
	(59, 1),
	(60, 1),
	(61, 1),
	(62, 1),
	(63, 1),
	(64, 1),
	(65, 1),
	(66, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(74, 1),
	(75, 1),
	(76, 1),
	(77, 1),
	(78, 1),
	(79, 1),
	(80, 1),
	(81, 1),
	(82, 1),
	(83, 1),
	(84, 1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.posts
CREATE TABLE IF NOT EXISTS `posts` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`author_id` int(11) NOT NULL,
	`category_id` int(11) DEFAULT NULL,
	`title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
	`body` text COLLATE utf8mb4_unicode_ci NOT NULL,
	`image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
	`meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
	`status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
	`featured` tinyint(1) NOT NULL DEFAULT '0',
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.posts: ~0 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.roles
CREATE TABLE IF NOT EXISTS `roles` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.roles: ~2 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Administrator', '2017-05-07 21:33:07', '2017-05-07 21:33:07'),
	(2, 'user', 'Normal User', '2017-05-07 21:33:07', '2017-05-07 21:33:07');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.settings
CREATE TABLE IF NOT EXISTS `settings` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`value` text COLLATE utf8mb4_unicode_ci NOT NULL,
	`details` text COLLATE utf8mb4_unicode_ci,
	`type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`order` int(11) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`),
	UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.settings: ~5 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`) VALUES
	(1, 'admin_description', 'Login description', 'Welcome to the Game Theory and Personality dashboard!', NULL, 'text_area', 0),
	(2, 'admin_title', 'Admin Title', 'Individual Differences', NULL, 'text', 1),
	(3, 'admin_icon_image', 'Admin Icon Image', 'settings/May2017/1HiPkKp8QQ9U2KHOPofI.png', NULL, 'image', 2),
	(4, 'admin_bg_image', 'Background image', 'settings/May2017/PHcCBXnJvF7bpWyE0R00.jpg', NULL, 'image', 3),
	(5, 'admin_favicon', 'Admin Favicon', 'settings/June2017/IAYfG1anSM2vvhb6qgEe.png', NULL, 'image', 4);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table game_theory_2.translations
CREATE TABLE IF NOT EXISTS `translations` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`foreign_key` int(10) unsigned NOT NULL,
	`locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
	`value` text COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` timestamp NULL DEFAULT NULL,
	`updated_at` timestamp NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table game_theory_2.translations: ~0 rows (approximately)
DELETE FROM `translations`;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;