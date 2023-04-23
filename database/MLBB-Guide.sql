-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 23, 2023 at 07:03 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MLBB-Guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `battle_spells`
--

CREATE TABLE `battle_spells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `battle_spells`
--

INSERT INTO `battle_spells` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Aegis', 'aegis.png', NULL, NULL),
(2, 'Arrival', 'arrival.png', NULL, NULL),
(3, 'Execute', 'execute.png', NULL, NULL),
(4, 'Flameshot', 'flameshot.png', NULL, NULL),
(5, 'Flicker', 'flicker.png', NULL, NULL),
(6, 'Inspire', 'inspire.png', NULL, NULL),
(7, 'Petrify', 'petrify.png', NULL, NULL),
(8, 'Purify', 'purify.png', NULL, NULL),
(9, 'Retribution', 'retribution.png', NULL, NULL),
(10, 'Revitalize', 'revitalize.png', NULL, NULL),
(11, 'Sprint', 'sprint.png', NULL, NULL),
(12, 'Vengeance', 'vengeance.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emblems`
--

CREATE TABLE `emblems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emblem_type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emblems`
--

INSERT INTO `emblems` (`id`, `emblem_type_id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vitality', '/storage/emblems/1682126523_physical_1_1.png', 'HP + 65 * level', '2023-04-21 18:22:03', '2023-04-21 19:01:12'),
(2, 1, 'Firmness', '/storage/emblems/1682128762_physical_.png', 'physical defense +4.00 * level', '2023-04-21 18:59:22', '2023-04-21 19:00:01'),
(3, 1, 'Shield', '/storage/emblems/1682128794_physical_1_3.png', 'Magic defense +4.00 * level', '2023-04-21 18:59:54', '2023-04-21 18:59:54'),
(4, 1, 'Bravery', '/storage/emblems/1682128855_physical_2_1.png', 'Physical attack +4.00 * level', '2023-04-21 19:00:55', '2023-04-21 19:00:55'),
(5, 1, 'Swift', '/storage/emblems/1682128895_physical_2_2.png', 'Attack speed +2.00% * level', '2023-04-21 19:01:35', '2023-04-21 19:01:35'),
(6, 1, 'Fatal', '/storage/emblems/1682128921_physical_2_3.png', 'Critical chance + 1.20% * level', '2023-04-21 19:02:01', '2023-04-21 19:02:01'),
(7, 1, 'Life Drain', '/storage/emblems/1682128978_physical_3_1.png', 'Killing an enemy minion restores 3% max hp', '2023-04-21 19:02:58', '2023-04-21 19:02:58'),
(8, 1, 'Open Fire', '/storage/emblems/1682129047_physical_3_2.png', 'Dealing damage with skills increase physical attack by 5% for 3sec. this effect has a 6sec cooldown', '2023-04-21 19:04:07', '2023-04-21 19:04:07'),
(9, 7, 'Mastery', '/storage/emblems/1682229368_support_1_1.png', 'Cooldown reduction + 1.50%', '2023-04-22 22:56:08', '2023-04-22 22:56:08'),
(10, 7, 'Vitality', '/storage/emblems/1682229399_support_1_2.png', 'HP + 65', '2023-04-22 22:56:39', '2023-04-22 22:56:39'),
(11, 7, 'Agility', '/storage/emblems/1682229429_support_1_3.png', 'Movement Speed +2.00%', '2023-04-22 22:57:09', '2023-04-22 22:57:09'),
(12, 7, 'Gift', '/storage/emblems/1682229453_support_2_1.png', 'Healing effect +3.00%', '2023-04-22 22:57:33', '2023-04-22 22:57:33'),
(13, 7, 'Rupture', '/storage/emblems/1682229476_support_2_2.png', 'Hybrid Pen +2.00', '2023-04-22 22:57:56', '2023-04-22 22:57:56'),
(14, 7, 'Recovery', '/storage/emblems/1682229519_support_2_3.png', 'Hybrid Regen +1.00 * level', '2023-04-22 22:58:39', '2023-04-22 22:58:39'),
(15, 7, 'Focusing Mark', '/storage/emblems/1682229599_support_3_1.png', 'Dealing damage to an enemy hero increases allied hero\'s damage by 6% for 3sec. This effect has a 6sec cooldown', '2023-04-22 22:59:59', '2023-04-22 22:59:59'),
(16, 7, 'Avarice', '/storage/emblems/1682229668_support_3_2.png', 'Dealing damage to an enemy hero grant an extra 10 gold. This effect has a 4sec cooldown. Up to 1200 gold can be gained this way', '2023-04-22 23:01:08', '2023-04-22 23:01:08'),
(17, 7, 'Pull yourself together', '/storage/emblems/1682229741_support_3_3.png', 'Respawn time is reduced by 15%, while Battle Spell cooldown is reduced by 15', '2023-04-22 23:02:21', '2023-04-22 23:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `emblem_types`
--

CREATE TABLE `emblem_types` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emblem_types`
--

INSERT INTO `emblem_types` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Physical', 'physical_icon.png', '2023-04-22 01:17:57', NULL),
(2, 'Magic', 'magical_icon.png', '2023-04-22 01:18:02', NULL),
(3, 'Jungle', 'jungle_icon.png', '2023-04-22 01:18:08', NULL),
(4, 'Assassin', 'assassin_icon.png', '2023-04-22 01:18:14', NULL),
(5, 'Mage', 'mage_icon.png', '2023-04-22 01:18:20', NULL),
(6, 'Fighter', 'fighter_icon.png', '2023-04-22 01:18:26', NULL),
(7, 'Support', 'support_icon.png', '2023-04-22 01:18:31', NULL),
(8, 'Marksman', 'marksman_icon.png', '2023-04-22 01:18:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `durability` int(10) UNSIGNED DEFAULT NULL,
  `offense` int(10) UNSIGNED DEFAULT NULL,
  `control_effect` int(10) UNSIGNED DEFAULT NULL,
  `difficulty` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `role_id`, `icon`, `banner`, `created_at`, `updated_at`, `durability`, `offense`, `control_effect`, `difficulty`) VALUES
(1, 'Akai', 1, '/storage/mlbb/heroes/1681381704_akai.png', '/storage/mlbb/heroes/1681381704_akai.jpg', '2023-04-13 03:13:10', '2023-04-13 03:28:24', NULL, NULL, NULL, NULL),
(2, 'Aldous', 2, '/storage/mlbb/heroes/1681995251_aldous.png', '/storage/mlbb/banner/1681995226_aldous.jpg', '2023-04-13 06:06:42', '2023-04-20 05:54:11', NULL, NULL, NULL, NULL),
(3, 'Aamon', 3, '/storage/mlbb/heroes/1681391235_6437fe83c584c.png', '/storage/mlbb/heroes/1681391235_6437fe83c5b76.jpg', '2023-04-13 06:07:15', '2023-04-19 00:31:35', 1, 2, NULL, NULL),
(4, 'Alice', 4, '/storage/mlbb/heroes/1681391341_6437feed4a4ed.png', '/storage/mlbb/heroes/1681391341_6437feed4a87d.jpg', '2023-04-13 06:09:01', '2023-04-13 06:09:01', NULL, NULL, NULL, NULL),
(5, 'Beatrix', 5, '/storage/mlbb/heroes/1681391538_6437ffb209809.png', '/storage/mlbb/heroes/1681391538_6437ffb209c0b.jpg', '2023-04-13 06:12:18', '2023-04-13 06:12:18', NULL, NULL, NULL, NULL),
(6, 'Akai', 6, '/storage/mlbb/heroes/1681391571_6437ffd38477f.png', '/storage/mlbb/heroes/1681391571_6437ffd384af3.jpg', '2023-04-13 06:12:51', '2023-04-13 06:12:51', NULL, NULL, NULL, NULL),
(7, 'Angela', 6, '/storage/mlbb/heroes/1681391620_64380004e96be.png', '/storage/mlbb/heroes/1681391620_64380004e994c.jpg', '2023-04-13 06:13:40', '2023-04-13 06:13:40', NULL, NULL, NULL, NULL),
(8, 'Atlas', 6, '/storage/mlbb/heroes/1681393290_6438068ade9fb.png', '/storage/mlbb/heroes/1681393290_6438068adef6e.jpg', '2023-04-13 06:41:30', '2023-04-13 06:41:30', NULL, NULL, NULL, NULL),
(9, 'Carmilla', 6, '/storage/mlbb/heroes/1681393320_643806a848ab4.png', '/storage/mlbb/heroes/1681393320_643806a848e57.jpg', '2023-04-13 06:42:00', '2023-04-13 06:42:00', NULL, NULL, NULL, NULL),
(10, 'Diggie', 6, '/storage/mlbb/heroes/1681393341_643806bd5924d.png', '/storage/mlbb/heroes/1681393341_643806bd5956f.jpg', '2023-04-13 06:42:21', '2023-04-13 06:42:21', NULL, NULL, NULL, NULL),
(11, 'Estes', 6, '/storage/mlbb/heroes/1681393369_643806d909aa0.png', '/storage/mlbb/heroes/1681393369_643806d909da7.jpg', '2023-04-13 06:42:49', '2023-04-13 06:42:49', NULL, NULL, NULL, NULL),
(12, 'Faramis', 6, '/storage/mlbb/heroes/1681394291_64380a7305032.png', '/storage/mlbb/heroes/1681394291_64380a730572f.jpg', '2023-04-13 06:58:11', '2023-04-13 06:58:11', NULL, NULL, NULL, NULL),
(13, 'Alice', 1, '/storage/mlbb/heroes/1681394627_64380bc3cb2c4.png', '/storage/mlbb/heroes/1681394627_64380bc3cb6be.jpg', '2023-04-13 07:03:47', '2023-04-13 07:03:47', NULL, NULL, NULL, NULL),
(14, 'Floryn', 6, '/storage/mlbb/heroes/1681701817_floryn.png', '/storage/mlbb/heroes/1681701817_floryn.jpg', '2023-04-16 20:16:36', '2023-04-16 20:23:37', 60, 20, 70, 30),
(15, 'Franco', 6, '/storage/mlbb/heroes/1681703719_643cc327dd053.png', '/storage/mlbb/heroes/1681703719_643cc327dd40e.jpg', '2023-04-16 20:55:19', '2023-04-16 20:55:19', 100, 10, 80, 10),
(16, 'Johnson', 6, '/storage/mlbb/heroes/1681709141_643cd85525bb8.png', '/storage/mlbb/heroes/1681709141_643cd8552615b.jpg', '2023-04-16 22:25:41', '2023-04-16 22:25:41', 90, 30, 80, 40);

-- --------------------------------------------------------

--
-- Table structure for table `hero_battle_spell`
--

CREATE TABLE `hero_battle_spell` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_id` bigint(20) UNSIGNED NOT NULL,
  `battle_spell_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_battle_spell`
--

INSERT INTO `hero_battle_spell` (`id`, `hero_id`, `battle_spell_id`) VALUES
(1, 1, 5),
(2, 1, 7),
(3, 15, 3),
(4, 15, 5),
(5, 16, 5),
(6, 16, 12),
(7, 3, 3),
(8, 3, 9),
(10, 2, 5),
(11, 2, 9),
(12, 2, 11),
(13, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hero_duos`
--

CREATE TABLE `hero_duos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero1_id` bigint(20) UNSIGNED NOT NULL,
  `hero2_id` bigint(20) UNSIGNED NOT NULL,
  `spell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_emblems`
--

CREATE TABLE `hero_emblems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_id` bigint(20) UNSIGNED NOT NULL,
  `emblems` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emblem_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_emblems`
--

INSERT INTO `hero_emblems` (`id`, `hero_id`, `emblems`, `emblem_type_id`, `created_at`, `updated_at`) VALUES
(1, 3, '[{\"name\":\"Vitality\",\"icon\":\"\\/storage\\/emblems\\/1682126523_physical_1_1.png\",\"id\":\"1\"},{\"name\":\"Swift\",\"icon\":\"\\/storage\\/emblems\\/1682128895_physical_2_2.png\",\"id\":\"5\"},{\"name\":\"Open Fire\",\"icon\":\"\\/storage\\/emblems\\/1682129047_physical_3_2.png\",\"id\":\"8\"}]', 1, '2023-04-22 22:52:02', '2023-04-22 23:57:11'),
(2, 3, '[{\"name\":\"Firmness\",\"icon\":\"\\/storage\\/emblems\\/1682128762_physical_.png\",\"id\":\"2\"},{\"name\":\"Fatal\",\"icon\":\"\\/storage\\/emblems\\/1682128921_physical_2_3.png\",\"id\":\"6\"},{\"name\":\"Life Drain\",\"icon\":\"\\/storage\\/emblems\\/1682128978_physical_3_1.png\",\"id\":\"7\"}]', 1, '2023-04-22 22:52:21', '2023-04-22 22:53:09'),
(3, 3, '[{\"name\":\"Shield\",\"icon\":\"\\/storage\\/emblems\\/1682128794_physical_1_3.png\",\"id\":\"3\"},{\"name\":\"Bravery\",\"icon\":\"\\/storage\\/emblems\\/1682128855_physical_2_1.png\",\"id\":\"4\"},{\"name\":\"Life Drain\",\"icon\":\"\\/storage\\/emblems\\/1682128978_physical_3_1.png\",\"id\":\"7\"}]', 1, '2023-04-22 22:52:32', '2023-04-22 22:53:09'),
(4, 6, '[{\"name\":\"Agility\",\"icon\":\"\\/storage\\/emblems\\/1682229429_support_1_3.png\",\"id\":\"11\"},{\"name\":\"Rupture\",\"icon\":\"\\/storage\\/emblems\\/1682229476_support_2_2.png\",\"id\":\"13\"},{\"name\":\"Avarice\",\"icon\":\"\\/storage\\/emblems\\/1682229668_support_3_2.png\",\"id\":\"16\"}]', 7, '2023-04-22 23:04:45', '2023-04-23 00:00:17'),
(5, 6, '[{\"name\":\"Shield\",\"icon\":\"\\/storage\\/emblems\\/1682128794_physical_1_3.png\",\"id\":\"3\"},{\"name\":\"Swift\",\"icon\":\"\\/storage\\/emblems\\/1682128895_physical_2_2.png\",\"id\":\"5\"},{\"name\":\"Open Fire\",\"icon\":\"\\/storage\\/emblems\\/1682129047_physical_3_2.png\",\"id\":\"8\"}]', 1, '2023-04-22 23:59:32', '2023-04-23 00:00:17'),
(6, 6, '[{\"name\":\"Vitality\",\"icon\":\"\\/storage\\/emblems\\/1682229399_support_1_2.png\",\"id\":\"10\"},{\"name\":\"Rupture\",\"icon\":\"\\/storage\\/emblems\\/1682229476_support_2_2.png\",\"id\":\"13\"},{\"name\":\"Pull yourself together\",\"icon\":\"\\/storage\\/emblems\\/1682229741_support_3_3.png\",\"id\":\"17\"}]', 7, '2023-04-23 00:00:17', '2023-04-23 00:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `hero_item_counters`
--

CREATE TABLE `hero_item_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_item_counters`
--

INSERT INTO `hero_item_counters` (`id`, `hero_id`, `item_id`, `created_at`, `updated_at`) VALUES
(4, 3, 8, NULL, NULL),
(5, 3, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hero_strengths`
--

CREATE TABLE `hero_strengths` (
  `id` bigint(20) NOT NULL,
  `hero_id` bigint(20) UNSIGNED NOT NULL,
  `strong_against_hero_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hero_strengths`
--

INSERT INTO `hero_strengths` (`id`, `hero_id`, `strong_against_hero_id`, `created_at`, `updated_at`) VALUES
(17, 3, 15, '2023-04-21 17:36:54', NULL),
(18, 3, 7, '2023-04-22 07:05:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hero_weaknesses`
--

CREATE TABLE `hero_weaknesses` (
  `id` bigint(20) NOT NULL,
  `hero_id` bigint(20) UNSIGNED NOT NULL,
  `weak_against_hero_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hero_weaknesses`
--

INSERT INTO `hero_weaknesses` (`id`, `hero_id`, `weak_against_hero_id`, `created_at`, `updated_at`) VALUES
(5, 3, 11, '2023-04-20 12:59:06', NULL),
(9, 3, 2, '2023-04-21 17:15:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `item_type_id`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Allow Throw', '3', '/storage/mlbb/items/1681724023_Allow_Throw.png', 'A', '2023-04-17 02:18:13', '2023-04-21 18:58:21'),
(2, 'Antique Cuirass', '3', '/storage/mlbb/items/1681723715_Antique_Cuirass.png', 'dd', '2023-04-17 02:28:35', '2023-04-17 02:28:35'),
(3, 'Arcane Boots', '4', '/storage/mlbb/items/1681724230_Arcane_Boots.png', 'addss', '2023-04-17 02:37:10', '2023-04-17 03:10:43'),
(4, 'Ares Belt', '3', '/storage/mlbb/items/1681724521_Ares_Belt.png', 'gg', '2023-04-17 02:42:01', '2023-04-17 02:42:01'),
(5, 'Athena\'s Shield', '3', '/storage/mlbb/items/1681725767_Athena_s_Shield.png', 'add', '2023-04-17 03:02:47', '2023-04-17 03:08:14'),
(6, 'Azure Blade', '1', '/storage/mlbb/items/1681726497_Azure_Blade.png', 'blad', '2023-04-17 03:14:57', '2023-04-17 03:14:57'),
(7, 'Berserker\'s Fury', '1', '/storage/mlbb/items/1681726524_Berserker_s_Fury.png', 'gg', '2023-04-17 03:15:24', '2023-04-17 03:15:24'),
(8, 'Black Ice Shield', '3', '/storage/mlbb/items/1682000666_Black_Ice_Shield.png', 'test', '2023-04-20 07:21:43', '2023-04-20 07:24:26'),
(9, 'Black Armor', '3', '/storage/items/1682000820_Blade_Armor.png', NULL, '2023-04-20 07:27:00', '2023-04-20 07:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `item_builds`
--

CREATE TABLE `item_builds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_id` bigint(20) UNSIGNED NOT NULL,
  `items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `build_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_counters`
--

CREATE TABLE `item_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `hero_id` bigint(20) UNSIGNED NOT NULL,
  `damage_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_counters`
--

INSERT INTO `item_counters` (`id`, `item_id`, `hero_id`, `damage_type`, `created_at`, `updated_at`) VALUES
(16, 8, 3, NULL, NULL, NULL),
(17, 9, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Attack', NULL, NULL),
(2, 'Magic', NULL, NULL),
(3, 'Defense', NULL, NULL),
(4, 'Movement', NULL, NULL),
(5, 'Jungling', NULL, NULL),
(6, 'Roaming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_13_045534_create_roles_table', 1),
(6, '2023_04_13_045601_create_heroes_table', 1),
(7, '2023_04_13_045613_create_items_table', 1),
(8, '2023_04_13_045630_create_hero_duos_table', 1),
(9, '2023_04_13_045645_create_item_counters_table', 1),
(10, '2023_04_13_045657_create_item_builds_table', 1),
(11, '2023_04_13_045709_create_emblems_table', 1),
(12, '2023_04_13_090459_add_username_to_users_table', 2),
(13, '2014_10_12_100000_create_password_resets_table', 3),
(14, '2023_04_17_023014_add_extra_fields_to_heroes_table', 4),
(15, '2023_04_17_023119_create_battle_spells_table', 5),
(16, '2023_04_17_032845_create_hero_battle_spell_table', 6),
(17, '2023_04_17_090208_create_hero_item_counters_table', 7),
(18, '2023_04_17_090345_create_hero_emblems_table', 8),
(19, '2023_04_17_094420_add_item_type_to_items_table', 9),
(20, '2023_04_17_094841_create_item_types_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Tank', '', NULL, NULL),
(2, 'Fighter', '', NULL, NULL),
(3, 'Assassin', '', NULL, NULL),
(4, 'Mage', '', NULL, NULL),
(5, 'Marksman', '', NULL, NULL),
(6, 'Support', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KOR', 'kor1gp', NULL, NULL, '$2a$12$xXf5rNJsNpQzw5MfYP36O.rapryuxallNqGDyenhHvzOpoE2ezbGO', 1, NULL, '2023-04-13 09:28:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `battle_spells`
--
ALTER TABLE `battle_spells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emblems`
--
ALTER TABLE `emblems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emblem_type_id` (`emblem_type_id`);

--
-- Indexes for table `emblem_types`
--
ALTER TABLE `emblem_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heroes_role_id_foreign` (`role_id`);

--
-- Indexes for table `hero_battle_spell`
--
ALTER TABLE `hero_battle_spell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_battle_spell_hero_id_foreign` (`hero_id`),
  ADD KEY `hero_battle_spell_battle_spell_id_foreign` (`battle_spell_id`);

--
-- Indexes for table `hero_duos`
--
ALTER TABLE `hero_duos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_duos_hero1_id_foreign` (`hero1_id`),
  ADD KEY `hero_duos_hero2_id_foreign` (`hero2_id`);

--
-- Indexes for table `hero_emblems`
--
ALTER TABLE `hero_emblems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_emblems_hero_id_foreign` (`hero_id`);

--
-- Indexes for table `hero_item_counters`
--
ALTER TABLE `hero_item_counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_item_counters_hero_id_foreign` (`hero_id`),
  ADD KEY `hero_item_counters_item_id_foreign` (`item_id`);

--
-- Indexes for table `hero_strengths`
--
ALTER TABLE `hero_strengths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_id` (`hero_id`),
  ADD KEY `hero_strong_against` (`strong_against_hero_id`);

--
-- Indexes for table `hero_weaknesses`
--
ALTER TABLE `hero_weaknesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_id` (`hero_id`),
  ADD KEY `hero_weak_against_id` (`weak_against_hero_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_builds`
--
ALTER TABLE `item_builds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_builds_hero_id_foreign` (`hero_id`);

--
-- Indexes for table `item_counters`
--
ALTER TABLE `item_counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_counters_item_id_foreign` (`item_id`),
  ADD KEY `item_counters_hero_id_foreign` (`hero_id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `battle_spells`
--
ALTER TABLE `battle_spells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emblems`
--
ALTER TABLE `emblems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `emblem_types`
--
ALTER TABLE `emblem_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hero_battle_spell`
--
ALTER TABLE `hero_battle_spell`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hero_duos`
--
ALTER TABLE `hero_duos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_emblems`
--
ALTER TABLE `hero_emblems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hero_item_counters`
--
ALTER TABLE `hero_item_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hero_strengths`
--
ALTER TABLE `hero_strengths`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hero_weaknesses`
--
ALTER TABLE `hero_weaknesses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item_builds`
--
ALTER TABLE `item_builds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_counters`
--
ALTER TABLE `item_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `heroes`
--
ALTER TABLE `heroes`
  ADD CONSTRAINT `heroes_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hero_battle_spell`
--
ALTER TABLE `hero_battle_spell`
  ADD CONSTRAINT `hero_battle_spell_battle_spell_id_foreign` FOREIGN KEY (`battle_spell_id`) REFERENCES `battle_spells` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hero_battle_spell_hero_id_foreign` FOREIGN KEY (`hero_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hero_duos`
--
ALTER TABLE `hero_duos`
  ADD CONSTRAINT `hero_duos_hero1_id_foreign` FOREIGN KEY (`hero1_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hero_duos_hero2_id_foreign` FOREIGN KEY (`hero2_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hero_item_counters`
--
ALTER TABLE `hero_item_counters`
  ADD CONSTRAINT `hero_item_counters_hero_id_foreign` FOREIGN KEY (`hero_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hero_item_counters_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_builds`
--
ALTER TABLE `item_builds`
  ADD CONSTRAINT `item_builds_hero_id_foreign` FOREIGN KEY (`hero_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_counters`
--
ALTER TABLE `item_counters`
  ADD CONSTRAINT `item_counters_hero_id_foreign` FOREIGN KEY (`hero_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_counters_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
