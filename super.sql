-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 11:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attend_at` time DEFAULT NULL,
  `departure_at` time DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `store_id`, `date`, `attend_at`, `departure_at`, `note`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '2021-02-08', '10:12:38', '12:12:38', 'rtrtye', '2021-01-11 08:22:38', '2021-01-11 08:12:38'),
(2, 5, 2, '2021-02-21', '10:12:38', '12:12:38', 'rtrtye', '2021-01-11 08:22:38', '2021-01-11 08:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=negaitve2=posaitve',
  `total` double NOT NULL DEFAULT 0,
  `last_transaction` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `customer_id`, `type`, `total`, `last_transaction`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 896, NULL, '2022-09-12 06:34:02', '2022-09-11 04:50:47'),
(2, 8, 1, 58.7, NULL, '2022-09-12 06:34:02', '2022-09-11 03:23:26'),
(3, 5, 1, 320, NULL, '2022-09-12 06:34:02', '2021-11-30 15:02:20'),
(4, 7, 1, -25, NULL, '2022-09-12 06:34:02', '2021-12-01 18:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `balance_detalies`
--

CREATE TABLE `balance_detalies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `by_id` int(11) DEFAULT NULL,
  `balance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barrens`
--

CREATE TABLE `barrens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  `by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `suppler_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lsuppler_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lcustomer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hbill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lbill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hsbill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lsbill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hProductS_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hProductB_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lProductS_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lProductB_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hProductD_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lProductD_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hBalance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hsBalance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_money` double NOT NULL DEFAULT 0,
  `total_sales` double NOT NULL DEFAULT 0,
  `total_debt` double NOT NULL DEFAULT 0,
  `total_term` double NOT NULL DEFAULT 0,
  `total_lost` double NOT NULL DEFAULT 0,
  `total_profit` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barrens`
--

INSERT INTO `barrens` (`id`, `start_at`, `end_at`, `by_id`, `suppler_id`, `lsuppler_id`, `customer_id`, `lcustomer_id`, `hbill_id`, `lbill_id`, `hsbill_id`, `lsbill_id`, `hProductS_id`, `hProductB_id`, `lProductS_id`, `lProductB_id`, `hProductD_id`, `lProductD_id`, `hBalance_id`, `hsBalance_id`, `total_money`, `total_sales`, `total_debt`, `total_term`, `total_lost`, `total_profit`, `created_at`, `updated_at`) VALUES
(7, '2022-09-15', '2022-09-15', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2023-03-07 21:43:59', '2023-03-07 21:43:59'),
(8, '2022-09-15', '2022-09-15', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2023-03-08 13:05:07', '2023-03-08 13:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_pay` date DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `unpaid` double NOT NULL DEFAULT 0,
  `paid` double NOT NULL DEFAULT 0,
  `is_print` tinyint(9) NOT NULL DEFAULT 0,
  `product_type` int(10) NOT NULL DEFAULT 1,
  `comment` varchar(200) DEFAULT NULL,
  `addtional` double DEFAULT NULL,
  `is_block` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rival` double NOT NULL DEFAULT 0,
  `addRival` double NOT NULL DEFAULT 0,
  `addPrice` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `store_id`, `customer_id`, `type_id`, `date_pay`, `total`, `unpaid`, `paid`, `is_print`, `product_type`, `comment`, `addtional`, `is_block`, `created_at`, `updated_at`, `rival`, `addRival`, `addPrice`) VALUES
(1, 2, 1, 1, 2, NULL, 146, 0, 146, 0, 1, NULL, NULL, 0, '2023-02-25 00:28:16', '2023-02-25 00:28:16', 0, 0, 0),
(2, 1, 1, 4, 2, NULL, 10, 0, 10, 1, 1, NULL, NULL, 0, '2023-03-07 21:22:08', '2023-03-07 21:22:17', 0, 0, 0),
(3, 1, 1, 4, 2, NULL, 344400, 0, 344400, 0, 1, NULL, NULL, 0, '2023-03-07 21:41:25', '2023-03-07 21:41:25', 0, 0, 0),
(4, 1, 1, 2, 1, NULL, 29550, 0, 29550, 2, 1, NULL, NULL, 0, '2023-03-07 21:48:23', '2023-03-07 21:48:43', 0, 0, 0),
(5, 1, 1, 2, 1, NULL, 118220, 0, 118220, 0, 1, NULL, NULL, 0, '2023-03-07 21:50:23', '2023-03-07 21:50:23', 0, 0, 0),
(6, 1, 1, 2, 1, NULL, 3910, 0, 3910, 0, 1, NULL, NULL, 0, '2023-03-07 21:53:21', '2023-03-07 21:53:21', 0, 0, 0),
(7, 1, 1, 3, 2, NULL, 107040, 0, 107040, 0, 1, NULL, NULL, 0, '2023-03-08 14:41:38', '2023-03-08 14:41:38', 0, 0, 0),
(8, 1, 1, 3, 2, NULL, 816696, 0, 816696, 0, 1, NULL, NULL, 0, '2023-03-08 14:42:48', '2023-03-08 14:42:48', 0, 0, 0),
(9, 1, 1, 3, 2, NULL, 191052, 0, 191052, 0, 1, NULL, NULL, 0, '2023-03-08 14:43:15', '2023-03-08 14:43:15', 0, 0, 0),
(10, 1, 1, 3, 2, NULL, 265698, 0, 265698, 0, 1, NULL, NULL, 0, '2023-03-08 14:43:38', '2023-03-08 14:43:38', 0, 0, 0),
(11, 1, 1, 3, 2, NULL, 76048, 0, 76048, 0, 1, NULL, NULL, 0, '2023-03-08 14:43:59', '2023-03-08 14:43:59', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_types`
--

CREATE TABLE `bill_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `info` varchar(191) DEFAULT NULL,
  `slug` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=sale2=buy3=expiredorother',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_types`
--

INSERT INTO `bill_types` (`id`, `title`, `info`, `slug`, `created_at`, `updated_at`) VALUES
(1, '???????????? ??????', NULL, 1, '2021-11-01 04:00:43', '2021-11-10 04:00:43'),
(2, '???????????? ????????', NULL, 2, '2021-11-01 04:00:43', '2021-11-01 04:00:43'),
(3, '???????????? ??????????', NULL, 3, '2021-11-01 04:00:43', '2021-11-10 04:00:43'),
(4, '???????????? ?????????? ??????????', NULL, 4, '2021-11-01 04:00:43', '2021-11-01 04:00:43'),
(5, '???????????? ??????????', NULL, 5, '2021-11-01 04:00:43', '2021-11-01 04:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `img_url` varchar(191) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `info` text DEFAULT NULL,
  `is_blocked` int(11) NOT NULL DEFAULT 0,
  `parent` int(11) DEFAULT 0,
  `main` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `img_url`, `active`, `info`, `is_blocked`, `parent`, `main`, `created_at`, `updated_at`) VALUES
(1, '????????', NULL, 1, 'fgb', 1, 0, 1, '2022-08-24 14:30:06', '2023-03-07 21:26:58'),
(2, '?????????? ??????????', NULL, 0, NULL, 1, 0, 3, '2022-08-27 23:28:50', '2023-03-07 21:27:05'),
(3, '?????? ??????????????', NULL, 1, NULL, 1, 0, 1, '2022-09-09 23:33:36', '2023-03-07 21:27:12'),
(4, '????????????????', NULL, 1, NULL, 1, 0, 1, '2022-09-14 16:50:29', '2023-03-07 21:26:51'),
(5, '??????????????', NULL, 1, NULL, 0, 0, 0, '2023-03-07 21:30:32', '2023-03-08 10:33:40'),
(6, '?????????? ????????', NULL, 1, NULL, 0, 0, 0, '2023-03-08 10:41:48', '2023-03-08 10:41:48'),
(7, '????????????', NULL, 1, NULL, 0, 0, 0, '2023-03-08 10:42:31', '2023-03-08 10:42:31'),
(8, '???????????? ????????????', NULL, 1, NULL, 0, 0, 0, '2023-03-08 10:42:51', '2023-03-08 10:42:51'),
(9, '????????????', NULL, 1, NULL, 0, 0, 0, '2023-03-08 10:43:02', '2023-03-08 10:43:02'),
(10, '?????????? ??????????', NULL, 1, NULL, 0, 0, 0, '2023-03-08 10:43:15', '2023-03-08 10:43:15'),
(11, '????????????', NULL, 1, NULL, 0, 0, 0, '2023-03-08 14:32:11', '2023-03-08 14:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `countr`
--

CREATE TABLE `countr` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countr`
--

INSERT INTO `countr` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL,
  `en_title` varchar(100) NOT NULL DEFAULT '',
  `ar_title` varchar(100) NOT NULL DEFAULT '',
  `phone_code` varchar(190) DEFAULT NULL,
  `country_enNationality` varchar(100) NOT NULL DEFAULT '',
  `country_arNationality` varchar(100) NOT NULL DEFAULT '',
  `flag` varchar(190) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `en_title`, `ar_title`, `phone_code`, `country_enNationality`, `country_arNationality`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', '??????????????????', '263', 'Afghan', '????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(2, 'Albania', '??????????????', '355', 'Albanian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(3, 'Aland Islands', '?????? ??????????', '213', 'Aland Islander', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(4, 'Algeria', '??????????????', '1684', 'Algerian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(5, 'American Samoa', '??????????-????????????????', '376', 'American Samoan', '???????????? ??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(6, 'Andorra', '????????????', '244', 'Andorran', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(7, 'Angola', '????????????', '1264', 'Angolan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(8, 'Anguilla', '??????????????', '0', 'Anguillan', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(9, 'Antarctica', '????????????????????', '1268', 'Antarctican', '????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(10, 'Antigua and Barbuda', '?????????????? ??????????????', '54', 'Antiguan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(11, 'Argentina', '??????????????????', '374', 'Argentinian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(12, 'Armenia', '??????????????', '297', 'Armenian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(13, 'Aruba', '??????????', '61', 'Aruban', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(14, 'Australia', '????????????????', '43', 'Australian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(15, 'Austria', '????????????', '994', 'Austrian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(16, 'Azerbaijan', '????????????????', '1242', 'Azerbaijani', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(17, 'Bahamas', '??????????????????', '973', 'Bahamian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(18, 'Bahrain', '??????????????', '880', 'Bahraini', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(19, 'Bangladesh', '????????????????', '1246', 'Bangladeshi', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(20, 'Barbados', '??????????????', '375', 'Barbadian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(21, 'Belarus', '?????????? ??????????????', '32', 'Belarusian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(22, 'Belgium', '????????????', '501', 'Belgian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(23, 'Belize', '??????????', '229', 'Belizean', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(24, 'Benin', '????????', '1441', 'Beninese', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(25, 'Saint Barthelemy', '?????? ????????????????', '975', 'Saint Barthelmian', '?????? ????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(26, 'Bermuda', '?????? ????????????', '591', 'Bermudan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(27, 'Bhutan', '??????????', '387', 'Bhutanese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(28, 'Bolivia', '??????????????', '267', 'Bolivian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(29, 'Bosnia and Herzegovina', '?????????????? ?? ????????????', '0', 'Bosnian / Herzegovinian', '??????????/??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(30, 'Botswana', '????????????????', '55', 'Botswanan', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(31, 'Bouvet Island', '?????????? ??????????', '246', 'Bouvetian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(32, 'Brazil', '????????????????', '673', 'Brazilian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(33, 'British Indian Ocean Territory', '?????????? ???????????? ???????????? ??????????????????', '359', 'British Indian Ocean Territory', '?????????? ???????????? ???????????? ??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(34, 'Brunei Darussalam', '??????????', '226', 'Bruneian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(35, 'Bulgaria', '??????????????', '257', 'Bulgarian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(36, 'Burkina Faso', '?????????????? ????????', '855', 'Burkinabe', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(37, 'Burundi', '??????????????', '237', 'Burundian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(38, 'Cambodia', '??????????????', '1', 'Cambodian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(39, 'Cameroon', '??????????????', '238', 'Cameroonian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(40, 'Canada', '????????', '1345', 'Canadian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(41, 'Cape Verde', '?????????? ????????????', '236', 'Cape Verdean', '?????????? ????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(42, 'Cayman Islands', '?????? ????????????', '235', 'Caymanian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(43, 'Central African Republic', '?????????????? ?????????????? ????????????', '56', 'Central African', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(44, 'Chad', '????????', '86', 'Chadian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(45, 'Chile', '????????', '61', 'Chilean', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(46, 'China', '??????????', '672', 'Chinese', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(47, 'Christmas Island', '?????????? ?????? ??????????????', '57', 'Christmas Islander', '?????????? ?????? ??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(48, 'Cocos (Keeling) Islands', '?????? ??????????', '269', 'Cocos Islander', '?????? ??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(49, 'Colombia', '????????????????', '242', 'Colombian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(50, 'Comoros', '?????? ??????????', '242', 'Comorian', '?????? ??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(51, 'Congo', '??????????????', '682', 'Congolese', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(52, 'Cook Islands', '?????? ??????', '506', 'Cook Islander', '?????? ??????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(53, 'Costa Rica', '??????????????????', '225', 'Costa Rican', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(54, 'Croatia', '??????????????', '385', 'Croatian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(55, 'Cuba', '????????', '53', 'Cuban', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(56, 'Cyprus', '????????', '357', 'Cypriot', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(57, 'Cura??ao', '??????????????', '420', 'Curacian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(58, 'Czech Republic', '?????????????????? ????????????????', '45', 'Czech', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(59, 'Denmark', '??????????????????', '253', 'Danish', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(60, 'Djibouti', '????????????', '1767', 'Djiboutian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(61, 'Dominica', '????????????????', '1809', 'Dominican', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(62, 'Dominican Republic', '?????????????????? ??????????????????????', '593', 'Dominican', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(63, 'Ecuador', '??????????????', '20', 'Ecuadorian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(64, 'Egypt', '??????', '503', 'Egyptian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(65, 'El Salvador', '??????????????????', '240', 'Salvadoran', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(66, 'Equatorial Guinea', '?????????? ??????????????????', '291', 'Equatorial Guinean', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(67, 'Eritrea', '??????????????', '372', 'Eritrean', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(68, 'Estonia', '??????????????', '251', 'Estonian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(69, 'Ethiopia', '??????????????', '500', 'Ethiopian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(70, 'Falkland Islands (Malvinas)', '?????? ??????????????', '298', 'Falkland Islander', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(71, 'Faroe Islands', '?????? ????????', '679', 'Faroese', '?????? ????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(72, 'Fiji', '????????', '358', 'Fijian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(73, 'Finland', '????????????', '33', 'Finnish', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(74, 'France', '??????????', '594', 'French', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(75, 'French Guiana', '???????????? ????????????????', '689', 'French Guianese', '???????????? ????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(76, 'French Polynesia', '?????????????????? ????????????????', '0', 'French Polynesian', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(77, 'French Southern and Antarctic Lands', '???????? ???????????? ???????????? ??????????????????????', '241', 'French', '???????? ???????????? ???????????? ??????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(78, 'Gabon', '??????????????', '220', 'Gabonese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(79, 'Gambia', '????????????', '995', 'Gambian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(80, 'Georgia', '??????????????', '49', 'Georgian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(81, 'Germany', '??????????????', '233', 'German', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(82, 'Ghana', '????????', '350', 'Ghanaian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(83, 'Gibraltar', '?????? ????????', '30', 'Gibraltar', '?????? ????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(84, 'Guernsey', '????????????', '299', 'Guernsian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(85, 'Greece', '??????????????', '1473', 'Greek', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(86, 'Greenland', '????????????????', '590', 'Greenlandic', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(87, 'Grenada', '??????????????', '1671', 'Grenadian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(88, 'Guadeloupe', '?????? ??????????????', '502', 'Guadeloupe', '?????? ??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(89, 'Guam', '????????', '224', 'Guamanian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(90, 'Guatemala', '????????????????', '245', 'Guatemalan', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(91, 'Guinea', '??????????', '592', 'Guinean', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(92, 'Guinea-Bissau', '??????????-??????????', '509', 'Guinea-Bissauan', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(93, 'Guyana', '??????????', '0', 'Guyanese', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(94, 'Haiti', '??????????', '39', 'Haitian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(95, 'Heard and Mc Donald Islands', '?????????? ???????? ???????? ??????????????????', '504', 'Heard and Mc Donald Islanders', '?????????? ???????? ???????? ??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(96, 'Honduras', '??????????????', '852', 'Honduran', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(97, 'Hong Kong', '???????? ????????', '36', 'Hongkongese', '???????? ??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(98, 'Hungary', '??????????', '354', 'Hungarian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(99, 'Iceland', '??????????????', '91', 'Icelandic', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(100, 'India', '??????????', '62', 'Indian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(101, 'Isle of Man', '?????????? ??????', '98', 'Manx', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(102, 'Indonesia', '??????????????????', '964', 'Indonesian', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(103, 'Iran', '??????????', '353', 'Iranian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(104, 'Iraq', '????????????', '972', 'Iraqi', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(105, 'Ireland', '??????????????', '39', 'Irish', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(106, 'Israel', '??????????????', '1876', 'Israeli', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(107, 'Italy', '??????????????', '81', 'Italian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(108, 'Ivory Coast', '???????? ??????????', '962', 'Ivory Coastian', '???????? ??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(109, 'Jersey', '??????????', '7', 'Jersian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(110, 'Jamaica', '????????????', '254', 'Jamaican', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(111, 'Japan', '??????????????', '686', 'Japanese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(112, 'Jordan', '????????????', '850', 'Jordanian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(113, 'Kazakhstan', '??????????????????', '82', 'Kazakh', '????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(114, 'Kenya', '??????????', '965', 'Kenyan', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(115, 'Kiribati', '????????????????', '996', 'I-Kiribati', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(116, 'Korea(North Korea)', '?????????? ????????????????', '856', 'North Korean', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(117, 'Korea(South Korea)', '?????????? ????????????????', '371', 'South Korean', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(118, 'Kosovo', '????????????', '961', 'Kosovar', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(119, 'Kuwait', '????????????', '266', 'Kuwaiti', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(120, 'Kyrgyzstan', '????????????????????', '231', 'Kyrgyzstani', '??????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(121, 'Lao PDR', '????????', '218', 'Laotian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(122, 'Latvia', '????????????', '423', 'Latvian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(123, 'Lebanon', '??????????', '370', 'Lebanese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(124, 'Lesotho', '????????????', '352', 'Basotho', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(125, 'Liberia', '??????????????', '853', 'Liberian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(126, 'Libya', '??????????', '389', 'Libyan', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(127, 'Liechtenstein', '??????????????????', '261', 'Liechtenstein', '????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(128, 'Lithuania', '??????????????', '265', 'Lithuanian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(129, 'Luxembourg', '??????????????????', '60', 'Luxembourger', '????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(130, 'Sri Lanka', '????????????????', '960', 'Sri Lankian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(131, 'Macau', '??????????', '223', 'Macanese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(132, 'Macedonia', '??????????????', '356', 'Macedonian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(133, 'Madagascar', '????????????', '692', 'Malagasy', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(134, 'Malawi', '????????????', '596', 'Malawian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(135, 'Malaysia', '??????????????', '222', 'Malaysian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(136, 'Maldives', '????????????????', '230', 'Maldivian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(137, 'Mali', '????????', '269', 'Malian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(138, 'Malta', '??????????', '52', 'Maltese', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(139, 'Marshall Islands', '?????? ????????????', '691', 'Marshallese', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(140, 'Martinique', '????????????????', '373', 'Martiniquais', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(141, 'Mauritania', '??????????????????', '377', 'Mauritanian', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(142, 'Mauritius', '????????????????', '976', 'Mauritian', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(143, 'Mayotte', '??????????', '1664', 'Mahoran', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(144, 'Mexico', '??????????????', '212', 'Mexican', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(145, 'Micronesia', '??????????????????????', '258', 'Micronesian', '??????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(146, 'Moldova', '????????????????', '95', 'Moldovan', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(147, 'Monaco', '????????????', '264', 'Monacan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(148, 'Mongolia', '??????????????', '674', 'Mongolian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(149, 'Montenegro', '?????????? ????????????', '977', 'Montenegrin', '?????????? ????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(150, 'Montserrat', '??????????????????', '31', 'Montserratian', '????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(151, 'Morocco', '????????????', '599', 'Moroccan', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(152, 'Mozambique', '??????????????', '687', 'Mozambican', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(153, 'Myanmar', '??????????????', '64', 'Myanmarian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(154, 'Namibia', '??????????????', '505', 'Namibian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(155, 'Nauru', '????????', '227', 'Nauruan', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(156, 'Nepal', '??????????', '234', 'Nepalese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(157, 'Netherlands', '????????????', '683', 'Dutch', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(158, 'Netherlands Antilles', '?????? ?????????????? ????????????????', '672', 'Dutch Antilier', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(159, 'New Caledonia', '?????????????????? ??????????????', '1670', 'New Caledonian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(160, 'New Zealand', '??????????????????', '47', 'New Zealander', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(161, 'Nicaragua', '??????????????????', '968', 'Nicaraguan', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(162, 'Niger', '????????????', '92', 'Nigerien', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(163, 'Nigeria', '??????????????', '680', 'Nigerian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(164, 'Niue', '????', '970', 'Niuean', '????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(165, 'Norfolk Island', '?????????? ??????????????', '507', 'Norfolk Islander', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(166, 'Northern Mariana Islands', '?????? ?????????????? ????????????????', '675', 'Northern Marianan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(167, 'Norway', '??????????????', '595', 'Norwegian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(168, 'Oman', '????????', '51', 'Omani', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(169, 'Pakistan', '??????????????', '63', 'Pakistani', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(170, 'Palau', '??????????', '0', 'Palauan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(171, 'Palestine', '????????????', '48', 'Palestinian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(172, 'Panama', '????????', '351', 'Panamanian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(173, 'Papua New Guinea', '?????????? ?????????? ??????????????', '1787', 'Papua New Guinean', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(174, 'Paraguay', '????????????????', '974', 'Paraguayan', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(175, 'Peru', '????????', '262', 'Peruvian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(176, 'Philippines', '????????????????', '40', 'Filipino', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(177, 'Pitcairn', '??????????????', '70', 'Pitcairn Islander', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(178, 'Poland', '??????????????', '250', 'Polish', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(179, 'Portugal', '????????????????', '290', 'Portuguese', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(180, 'Puerto Rico', '?????????? ????????', '1869', 'Puerto Rican', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(181, 'Qatar', '??????', '1758', 'Qatari', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(182, 'Reunion Island', '??????????????', '508', 'Reunionese', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(183, 'Romania', '??????????????', '1784', 'Romanian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(184, 'Russian', '??????????', '684', 'Russian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(185, 'Rwanda', '????????????', '378', 'Rwandan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(186, 'Saint Kitts and Nevis', '???????? ???????? ??????????,', '239', 'Kittitian/Nevisian', '???????? ???????? ??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(187, 'Saint Martin (French part)', '?????????? ?????????? ??????????', '966', 'St. Martian(French)', '?????????? ???????????? ??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(188, 'Sint Maarten (Dutch part)', '?????????? ?????????? ????????????', '221', 'St. Martian(Dutch)', '?????????? ???????????? ????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(189, 'Saint Pierre and Miquelon', '?????? ???????? ??????????????', '381', 'St. Pierre and Miquelon', '?????? ???????? ????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(190, 'Saint Vincent and the Grenadines', '???????? ?????????? ???????? ????????????????', '248', 'Saint Vincent and the Grenadines', '???????? ?????????? ???????? ????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(191, 'Samoa', '??????????', '232', 'Samoan', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(192, 'San Marino', '?????? ????????????', '65', 'Sammarinese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(193, 'Sao Tome and Principe', '?????? ???????? ??????????????????', '421', 'Sao Tomean', '?????? ???????? ??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(194, 'Saudi Arabia', '?????????????? ?????????????? ????????????????', '386', 'Saudi Arabian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(195, 'Senegal', '??????????????', '677', 'Senegalese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(196, 'Serbia', '??????????', '252', 'Serbian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(197, 'Seychelles', '??????????', '27', 'Seychellois', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(198, 'Sierra Leone', '????????????????', '0', 'Sierra Leonean', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(199, 'Singapore', '????????????????', '34', 'Singaporean', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(200, 'Slovakia', '????????????????', '94', 'Slovak', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(201, 'Slovenia', '????????????????', '249', 'Slovenian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(202, 'Solomon Islands', '?????? ????????????', '597', 'Solomon Island', '?????? ????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(203, 'Somalia', '??????????????', '47', 'Somali', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(204, 'South Africa', '???????? ??????????????', '268', 'South African', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(205, 'South Georgia and the South Sandwich', '?????????????? ?????????????? ????????????????', '46', 'South Georgia and the South Sandwich', '???????????? ?????????????? ????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(206, 'South Sudan', '?????????????? ??????????????', '41', 'South Sudanese', '???????????? ??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(207, 'Spain', '??????????????', '963', 'Spanish', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(208, 'Saint Helena', '???????? ????????????', '886', 'St. Helenian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(209, 'Sudan', '??????????????', '992', 'Sudanese', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(210, 'Suriname', '??????????????', '255', 'Surinamese', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(211, 'Svalbard and Jan Mayen', '???????????????? ???????? ????????', '66', 'Svalbardian/Jan Mayenian', '???????????????? ???????? ????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(212, 'Swaziland', '????????????????', '670', 'Swazi', '??????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(213, 'Sweden', '????????????', '228', 'Swedish', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(214, 'Switzerland', '????????????', '690', 'Swiss', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(215, 'Syria', '??????????', '676', 'Syrian', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(216, 'Taiwan', '????????????', '1868', 'Taiwanese', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(217, 'Tajikistan', '??????????????????', '216', 'Tajikistani', '????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(218, 'Tanzania', '??????????????', '90', 'Tanzanian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(219, 'Thailand', '??????????????', '7370', 'Thai', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(220, 'Timor-Leste', '?????????? ??????????????', '1649', 'Timor-Lestian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(221, 'Togo', '????????', '688', 'Togolese', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(222, 'Tokelau', '??????????????', '256', 'Tokelaian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(223, 'Tonga', '??????????', '380', 'Tongan', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(224, 'Trinidad and Tobago', '???????????????? ??????????????', '971', 'Trinidadian/Tobagonian', '???????????????? ??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(225, 'Tunisia', '????????', '44', 'Tunisian', '??????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(226, 'Turkey', '??????????', '1', 'Turkish', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(227, 'Turkmenistan', '????????????????????', '1', 'Turkmen', '??????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(228, 'Turks and Caicos Islands', '?????? ?????????? ??????????????', '598', 'Turks and Caicos Islands', '?????? ?????????? ??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(229, 'Tuvalu', '????????????', '998', 'Tuvaluan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(230, 'Uganda', '????????????', '678', 'Ugandan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(231, 'Ukraine', '????????????????', '58', 'Ukrainian', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(232, 'United Arab Emirates', '???????????????? ?????????????? ??????????????', '84', 'Emirati', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(233, 'United Kingdom', '?????????????? ??????????????', '1284', 'British', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(234, 'United States', '???????????????? ??????????????', '1340', 'American', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(235, 'US Minor Outlying Islands', '?????????? ???????????????? ???????????????? ??????????????????', '681', 'US Minor Outlying Islander', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(236, 'Uruguay', '??????????????', '212', 'Uruguayan', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(237, 'Uzbekistan', '????????????????????', '967', 'Uzbek', '??????????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(238, 'Vanuatu', '??????????????', '260', 'Vanuatuan', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(239, 'Venezuela', '??????????????', '263', 'Venezuelan', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(240, 'Vietnam', '????????????', NULL, 'Vietnamese', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(241, 'Virgin Islands (U.S.)', '?????????? ?????????????? ????????????????', NULL, 'American Virgin Islander', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(242, 'Vatican City', '??????????????', NULL, 'Vatican', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(243, 'Wallis and Futuna Islands', '???????? ??????????????', NULL, 'Wallisian/Futunan', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(244, 'Western Sahara', '?????????????? ??????????????', NULL, 'Sahrawian', '????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(245, 'Yemen', '??????????', NULL, 'Yemeni', '????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(246, 'Zambia', '????????????', NULL, 'Zambian', '????????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(247, 'Zimbabwe', '??????????????', NULL, 'Zimbabwean', '??????????????', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `info` varchar(191) DEFAULT NULL,
  `img_url` varchar(191) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=customer2=supplier',
  `rate` tinyint(4) NOT NULL DEFAULT 5,
  `is_blocked` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone`, `info`, `img_url`, `type`, `rate`, `is_blocked`, `created_at`, `updated_at`) VALUES
(1, '???????? ????????', 'www@ddd.com', 'qqqq', '04230.05122', 'sssswsw', NULL, 2, 5, 0, '2023-02-25 00:27:13', '2023-02-25 00:27:13'),
(2, '????????', NULL, '????????', '0101120', '????????????', NULL, 1, 5, 0, '2023-02-25 00:27:42', '2023-02-25 00:27:42'),
(3, 'zahra', NULL, NULL, '01550908130', NULL, NULL, 2, 5, 0, '2023-03-07 21:15:32', '2023-03-07 21:15:32'),
(4, 'Zahra', 'zahra@alaa.ess-jay.com', '12 ok', '01200050005', NULL, NULL, 2, 5, 0, '2023-03-07 21:18:01', '2023-03-07 21:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer_mstores`
--

CREATE TABLE `customer_mstores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `days_offs`
--

CREATE TABLE `days_offs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hour_prices`
--

CREATE TABLE `hour_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `des` text DEFAULT NULL,
  `last_change` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `locale` varchar(191) NOT NULL,
  `group` varchar(191) NOT NULL,
  `key` text NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_10_21_190000_create_settings_table', 1),
(4, '2018_08_06_175146_create_messages_table', 1),
(5, '2018_09_01_093253_add_receiver_id_field_to_messages_table', 1),
(6, '2018_11_18_082207_add_image_column_to_messages', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_10_10_092411_create_permission_tables', 1),
(9, '2020_10_11_105219_create_mstores_table', 1),
(10, '2020_10_11_151458_create_categories_table', 1),
(11, '2020_10_11_152014_create_mstore_categories_table', 1),
(12, '2020_10_12_090437_create_units_table', 1),
(13, '2020_10_12_090604_create_unit_categories_table', 1),
(14, '2020_10_12_110739_create_customers_table', 1),
(15, '2020_10_12_114246_create_customer_mstores_table', 1),
(16, '2020_10_13_124013_create_products_table', 1),
(17, '2020_10_13_124123_create_product_mstores_table', 1),
(18, '2020_10_13_124201_create_product_customers_table', 1),
(19, '2020_10_18_082040_create_user_stores_table', 1),
(20, '2020_10_19_160219_create_bill_types_table', 1),
(21, '2020_10_19_160246_create_bills_table', 1),
(22, '2020_10_19_160305_create_sales_table', 1),
(23, '2020_10_20_083453_create_balances_table', 2),
(24, '2020_10_20_083541_create_balance_detalies_table', 2),
(25, '2014_04_02_193005_create_translations_table', 3),
(26, '2020_12_12_000730_create_week_days_table', 3),
(27, '2020_12_12_001923_create_days_offs_table', 4),
(28, '2020_12_12_003008_create_work_days_table', 5),
(38, '2020_12_13_082615_create_hour_prices_table', 6),
(39, '2020_12_13_082820_create_salaries_table', 6),
(40, '2020_12_13_084113_create_attendances_table', 6),
(41, '2021_02_22_144536_create_mstore_week_days_table', 7),
(43, '2022_09_11_223107_create_barrens_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41);

-- --------------------------------------------------------

--
-- Table structure for table `mstores`
--

CREATE TABLE `mstores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstores`
--

INSERT INTO `mstores` (`id`, `title`, `address`, `phone`, `info`, `logo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '???????? ??????????', '??????????????', '010123565', NULL, NULL, 9, '2020-10-20 06:06:41', '2020-10-20 06:06:41'),
(2, '???????????? ????????????', '???????????? ????????????', '012365852200', NULL, NULL, 3, '2020-11-22 20:14:13', '2020-11-22 20:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `mstore_categories`
--

CREATE TABLE `mstore_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstore_categories`
--

INSERT INTO `mstore_categories` (`id`, `store_id`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, '2020-10-21 08:29:28', '2020-10-21 08:29:28'),
(8, 1, 3, '2020-10-21 08:30:31', '2020-10-21 08:30:31'),
(9, 1, 2, '2020-10-21 08:33:53', '2020-10-21 08:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `mstore_week_days`
--

CREATE TABLE `mstore_week_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_at` time DEFAULT NULL,
  `end_at` time DEFAULT NULL,
  `month` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `img_url` varchar(191) DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `buy_price` double NOT NULL DEFAULT 0,
  `max_price` double NOT NULL DEFAULT 0,
  `min_price` double NOT NULL DEFAULT 0,
  `info` longtext DEFAULT NULL,
  `produce_at` date DEFAULT NULL,
  `expired_at` date DEFAULT NULL,
  `expired_at_notify` tinyint(4) NOT NULL DEFAULT 7,
  `rate_selling` tinyint(4) NOT NULL DEFAULT 5,
  `rate_customers` tinyint(4) NOT NULL DEFAULT 5,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `rival` double DEFAULT 0,
  `addRival` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `img_url`, `total`, `buy_price`, `max_price`, `min_price`, `info`, `produce_at`, `expired_at`, `expired_at_notify`, `rate_selling`, `rate_customers`, `store_id`, `category_id`, `user_id`, `supplier_id`, `unit_id`, `slug`, `active`, `rival`, `addRival`, `created_at`, `updated_at`) VALUES
(9, '???????? ?????????????? ???????? ?????????? 1 ?????? ?? 6 ??????????', NULL, 669, 160, 170, 170, NULL, NULL, NULL, 7, 5, 5, NULL, 5, NULL, NULL, 3, '#001', 1, NULL, NULL, '2023-03-08 10:57:13', '2023-03-08 14:41:38'),
(10, '???????? ?????????????? ?????????? ???????????????? - 27 ?????????? 200 ????', NULL, 4104, 199, 220, 220, NULL, NULL, NULL, 7, 5, 5, NULL, 5, NULL, NULL, 5, '#002', 1, NULL, NULL, '2023-03-08 11:24:17', '2023-03-08 14:42:48'),
(12, '???????? ???????? ?????? ?????? ???? ?????????? ?????????? ???? 27 ???????? - 200 ????', NULL, 2625, 174, 180, 178, NULL, NULL, NULL, 7, 5, 5, NULL, 5, NULL, NULL, 5, '#003', 1, NULL, NULL, '2023-03-08 13:35:32', '2023-03-08 14:43:38'),
(13, '???????? ???????? ???????????? ???? ???????????? 1.5 ??????', NULL, 776, 98, 170, 170, NULL, NULL, NULL, 7, 5, 5, NULL, 5, NULL, NULL, 3, '#004', 1, NULL, NULL, '2023-03-08 14:07:40', '2023-03-08 14:43:59'),
(14, '???????? ?????????????? ???????????? - 16 ????????', NULL, 0, 86, 110, 110, NULL, NULL, NULL, 7, 5, 5, NULL, 5, NULL, NULL, 3, '#006', 1, NULL, NULL, '2023-03-08 14:48:07', '2023-03-08 14:48:07'),
(15, '???????? ?????????? ???????? 100 ???????? - ???????? ???? ???????? ??????????', NULL, 0, 48, 55, 55, NULL, NULL, NULL, 7, 5, 5, NULL, 5, NULL, NULL, 6, '#007', 1, NULL, NULL, '2023-03-08 14:51:05', '2023-03-08 14:51:05'),
(16, '?????? ???? ???????????? ?????? 450 ????/ ???????????? ???? 24 ????????', NULL, 0, 362, 370, 370, NULL, NULL, NULL, 7, 5, 5, NULL, 5, NULL, NULL, 3, '#008', 1, NULL, NULL, '2023-03-08 14:53:43', '2023-03-08 14:53:43'),
(17, '?????? ?????????? ???????? ?????????? ???? ???????? ?????? - 1 ??????', NULL, 0, 44, 50, 50, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 4, '#009', 1, NULL, NULL, '2023-03-08 14:56:38', '2023-03-08 14:56:38'),
(18, '?????????? ?????????? ???????????? 760 ????????', NULL, 0, 61, 66, 66, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 4, '#0010', 1, NULL, NULL, '2023-03-08 14:58:15', '2023-03-08 14:58:15'),
(19, '???? ???????? ???????? ???? ?????? ???????? 200 ????', NULL, 0, 42, 50, 50, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 6, '#0011', 1, NULL, NULL, '2023-03-08 14:59:59', '2023-03-08 14:59:59'),
(20, '?????????? ?????????????? ?????????? ???? ?????? ???????? - 75 ????????', NULL, 0, 24, 28, 28, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 6, '#0012', 1, NULL, NULL, '2023-03-08 15:03:41', '2023-03-08 15:03:41'),
(21, '???????????? ?????????? ???? ?????????????? 400 ????????', NULL, 0, 11, 16, 16, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 4, '#0013', 1, NULL, NULL, '2023-03-08 15:19:58', '2023-03-08 15:19:58'),
(22, '?????? ?????????? ???????? ?????????????? ???? ???????? ???????? ???????????? ???? ?????? ???????????? 8 ???????????? 25 ????', NULL, 0, 37, 44, 44, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 6, '#0014', 1, NULL, NULL, '2023-03-08 15:22:02', '2023-03-08 15:22:02'),
(23, '?????????? ???????????? ???? ?????? ?????? 70 ????????', NULL, 0, 13, 17, 17, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 6, '#0015', 1, NULL, NULL, '2023-03-08 18:03:22', '2023-03-08 18:03:22'),
(24, '?????? ?????????????? ?????????????? ???? ???????????? ????????- 250 ????????', NULL, 0, 47, 55, 55, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 5, '#0016', 1, NULL, NULL, '2023-03-08 18:05:00', '2023-03-08 18:05:00'),
(25, '?????????? ???????? ?????????? ???? ?????????? 900 ????', NULL, 0, 55, 60, 60, NULL, NULL, NULL, 7, 5, 5, NULL, 6, NULL, NULL, 6, '#0017', 1, NULL, NULL, '2023-03-08 18:09:07', '2023-03-08 18:09:07'),
(26, '?????? ???????????? ???????? 24 ???????? ???????? ?????? ???? ?????? ??????', NULL, 0, 735, 800, 800, NULL, '2023-03-14', '2029-05-14', 7, 5, 5, NULL, 7, NULL, NULL, 3, '#0018', 1, NULL, NULL, '2023-03-08 18:18:00', '2023-03-08 18:18:00'),
(27, '?????? ???????????? 2 ???????? 26 ???? ???? ??????????????', NULL, 0, 1510, 1550, 1550, NULL, NULL, NULL, 7, 5, 5, NULL, 7, NULL, NULL, 3, '#0019', 1, NULL, NULL, '2023-03-08 18:25:54', '2023-03-08 18:25:54'),
(28, '?????? ?????? ???????????? ????????', NULL, 0, 350, 370, 370, NULL, NULL, NULL, 7, 5, 5, NULL, 7, NULL, NULL, 3, '#0020', 1, NULL, NULL, '2023-03-08 18:29:14', '2023-03-08 18:29:14'),
(29, '???????????? ???????? ??????????', NULL, 0, 295, 330, 330, NULL, NULL, NULL, 7, 5, 5, NULL, 7, NULL, NULL, 3, '#0021', 1, NULL, NULL, '2023-03-08 18:36:04', '2023-03-08 18:36:04'),
(30, '?????? ???????? ?????????? ?????????????????????? - ??????????????', NULL, 0, 41, 47, 47, NULL, NULL, NULL, 7, 5, 5, NULL, 7, NULL, NULL, 3, '#0022', 1, NULL, NULL, '2023-03-08 18:41:16', '2023-03-08 18:41:16'),
(31, '?????? ?????????? ?????????????? ?????????? ??????????????', NULL, 0, 220, 235, 235, NULL, NULL, NULL, 7, 5, 5, NULL, 7, NULL, NULL, 3, '#0023', 1, NULL, NULL, '2023-03-08 18:43:33', '2023-03-08 18:43:33'),
(32, '???????? ???????? ???????? ?????????? ???????????? ?????????????? ???????? ?????????? ???? ???????????? ?????????? - 300 ????', NULL, 0, 113, 120, 120, NULL, '2023-03-20', '2026-03-18', 7, 5, 5, NULL, 8, NULL, NULL, 3, '#0024', 1, NULL, NULL, '2023-03-08 18:51:59', '2023-03-08 18:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_customers`
--

CREATE TABLE `product_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_mstores`
--

CREATE TABLE `product_mstores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_mstores`
--

INSERT INTO `product_mstores` (`id`, `amount`, `store_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 1, '2020-11-21 07:24:25', '2021-11-06 15:17:32'),
(2, 3, 2, 1, '2020-11-22 20:20:11', '2020-11-22 20:20:19'),
(3, 5, 1, 4, '2020-11-25 17:59:59', '2020-11-25 17:59:59'),
(4, 2, 2, 4, '2020-11-25 18:00:15', '2020-11-25 18:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `ar_name` varchar(190) DEFAULT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `ar_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '????????', 'web', '2020-10-20 06:01:03', '2020-10-20 06:01:03'),
(2, 'user', '????????', 'web', '2020-10-20 06:01:03', '2020-10-20 06:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `edit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `month` varchar(192) NOT NULL,
  `pons` double NOT NULL DEFAULT 0,
  `deductions` double NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `is_payed` tinyint(4) NOT NULL DEFAULT 0,
  `des` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_change` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `user_id`, `edit_id`, `month`, `pons`, `deductions`, `total`, `is_payed`, `des`, `date`, `last_change`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:18', '2021-02-28 03:16:18'),
(2, 3, NULL, '5', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:18', '2021-02-28 03:16:18'),
(3, 4, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:18', '2021-02-28 03:16:18'),
(4, 5, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(5, 6, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(6, 9, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(7, 10, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(8, 11, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(9, 19, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(10, 30, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(11, 31, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(12, 33, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(13, 35, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:19', '2021-02-28 03:16:19'),
(14, 36, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:20', '2021-02-28 03:16:20'),
(15, 39, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:16:20', '2021-02-28 03:16:20'),
(16, 3, NULL, '02', 0, 0, 0, 0, NULL, '2021-02-28', NULL, '2021-02-28 03:19:34', '2021-02-28 03:19:34'),
(17, 1, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(18, 3, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(19, 4, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(20, 5, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(21, 6, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(22, 9, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(23, 10, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(24, 11, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(25, 19, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(26, 30, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:51', '2021-03-03 08:57:51'),
(27, 31, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:52', '2021-03-03 08:57:52'),
(28, 33, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:52', '2021-03-03 08:57:52'),
(29, 35, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:52', '2021-03-03 08:57:52'),
(30, 36, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:52', '2021-03-03 08:57:52'),
(31, 39, NULL, '03', 0, 0, 0, 0, NULL, '2021-03-03', NULL, '2021-03-03 08:57:52', '2021-03-03 08:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 1,
  `total` double NOT NULL DEFAULT 0,
  `rival` double NOT NULL DEFAULT 0,
  `addRival` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `bill_id`, `product_id`, `amount`, `price`, `total`, `rival`, `addRival`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 73, 73, 0, 0, '2023-02-25 00:28:16', '2023-02-25 00:28:16'),
(2, 1, 1, 1, 73, 73, 0, 0, '2023-02-25 00:28:16', '2023-02-25 00:28:16'),
(3, 2, 5, 1, 10, 10, 0, 0, '2023-03-07 21:22:08', '2023-03-07 21:22:08'),
(4, 3, 8, 1722, 200, 344400, 0, 0, '2023-03-07 21:41:25', '2023-03-07 21:41:25'),
(5, 4, 8, 197, 150, 29550, 0, 0, '2023-03-07 21:48:23', '2023-03-07 21:48:23'),
(6, 5, 8, 514, 230, 118220, 0, 0, '2023-03-07 21:50:23', '2023-03-07 21:50:23'),
(7, 6, 8, 17, 230, 3910, 0, 0, '2023-03-07 21:53:21', '2023-03-07 21:53:21'),
(8, 7, 9, 669, 160, 107040, 0, 0, '2023-03-08 14:41:38', '2023-03-08 14:41:38'),
(9, 8, 10, 4104, 199, 816696, 0, 0, '2023-03-08 14:42:48', '2023-03-08 14:42:48'),
(10, 9, 12, 1098, 174, 191052, 0, 0, '2023-03-08 14:43:15', '2023-03-08 14:43:15'),
(11, 10, 12, 1527, 174, 265698, 0, 0, '2023-03-08 14:43:38', '2023-03-08 14:43:38'),
(12, 11, 13, 776, 98, 76048, 0, 0, '2023-03-08 14:43:59', '2023-03-08 14:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `login_banner` varchar(191) DEFAULT NULL,
  `image_slider` varchar(191) DEFAULT NULL,
  `en_title` varchar(191) DEFAULT NULL,
  `ar_title` varchar(191) DEFAULT NULL,
  `address1` varchar(191) DEFAULT NULL,
  `address2` varchar(191) DEFAULT NULL,
  `phone1` varchar(191) DEFAULT NULL,
  `phone2` varchar(191) DEFAULT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `android_app` varchar(191) DEFAULT NULL,
  `ios_app` varchar(191) DEFAULT NULL,
  `email1` varchar(191) DEFAULT NULL,
  `email2` varchar(191) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `ar_des` longtext DEFAULT NULL,
  `en_des` longtext DEFAULT NULL,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `sms_user_name` varchar(191) DEFAULT NULL,
  `sms_user_pass` varchar(191) DEFAULT NULL,
  `sms_sender` varchar(191) DEFAULT NULL,
  `publisher` varchar(191) DEFAULT NULL,
  `company_hot_line` varchar(191) DEFAULT NULL,
  `default_language` varchar(191) NOT NULL DEFAULT 'ar',
  `site_proportion` double NOT NULL DEFAULT 0,
  `shipping_price` double DEFAULT 0,
  `facebook_link` varchar(190) DEFAULT NULL,
  `gmail_link` varchar(190) DEFAULT NULL,
  `insta_link` varchar(190) DEFAULT NULL,
  `tewtter_link` varchar(190) DEFAULT NULL,
  `rss_link` varchar(190) DEFAULT NULL,
  `term` varchar(2000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `login_banner`, `image_slider`, `en_title`, `ar_title`, `address1`, `address2`, `phone1`, `phone2`, `fax`, `android_app`, `ios_app`, `email1`, `email2`, `link`, `ar_des`, `en_des`, `latitude`, `longitude`, `sms_user_name`, `sms_user_pass`, `sms_sender`, `publisher`, `company_hot_line`, `default_language`, `site_proportion`, `shipping_price`, `facebook_link`, `gmail_link`, `insta_link`, `tewtter_link`, `rss_link`, `term`, `created_at`, `updated_at`) VALUES
(1, 'setting/1678222855.png', NULL, NULL, 'aqusah', 'SMART MANAGEMENT', '???????????? ???????????? -???????? ??????', '????????????', '01013924210', '01013924210', NULL, 'https://play.google.com', 'https://www.apple.com/eg-ar/ios/app-store/', 'muhammad@muhamm.com', 'muhammad2@register.com', NULL, 'rrr', 'des', 28.623111, 43.626704, NULL, NULL, NULL, NULL, NULL, 'ar', 0, NULL, NULL, NULL, NULL, NULL, NULL, '?????????????? ???????? ??????', NULL, '2023-03-07 21:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `info` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `active`, `info`, `created_at`, `updated_at`) VALUES
(3, '????????', 1, NULL, '2023-03-07 21:28:01', '2023-03-07 21:28:22'),
(4, '???????? ????????', 1, NULL, '2023-03-07 21:28:49', '2023-03-07 21:28:49'),
(5, '????????????', 1, NULL, '2023-03-07 21:29:32', '2023-03-07 21:29:32'),
(6, '??????????', 1, NULL, '2023-03-08 10:50:15', '2023-03-08 10:50:15'),
(7, '??????', 1, NULL, '2023-03-08 10:50:22', '2023-03-08 10:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `unit_categories`
--

CREATE TABLE `unit_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `phone` varchar(190) DEFAULT NULL,
  `hour_price` double NOT NULL DEFAULT 1,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `phone`, `hour_price`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alaa', 'admin@admin.com', '1678222924.webp', NULL, 1, NULL, NULL, '$2y$10$t8QK.WsTYXaW4NkknulOu.Vk.B4rZN9X8SQqCgt5.r3MN7mboFIXu', NULL, '2020-10-20 05:54:51', '2023-03-07 21:02:04'),
(2, 'mmm', 'qq@qq.com', NULL, NULL, 1, NULL, NULL, '$2y$10$X6uQLnUiQyM2GKHBrxa9fO3LiLSrSFSCcgbDYzf.diSRYof9N80SO', NULL, '2023-02-25 00:03:08', '2023-02-25 00:03:08'),
(3, 'test@test1', 'dynaamr2@gmail.com', NULL, NULL, 1, NULL, NULL, '$2y$10$1iDnDyg903YNC8pJw0JW1ORyt34gxykYcULRkAr7hQsTxdpunxB4.', NULL, '2023-03-07 18:59:44', '2023-03-07 18:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_stores`
--

CREATE TABLE `user_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_stores`
--

INSERT INTO `user_stores` (`id`, `store_id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 1, 4, '2020-10-29 13:13:43', '2020-10-29 13:13:43'),
(13, 1, 4, '2020-10-29 13:13:53', '2020-10-29 13:13:53'),
(14, 1, 4, '2020-10-29 13:14:05', '2020-10-29 13:14:05'),
(15, 1, 39, '2020-11-25 18:18:34', '2020-11-25 18:18:34'),
(16, 1, 6, '2020-11-25 18:26:28', '2020-11-25 18:26:28'),
(17, 1, 6, '2020-11-25 18:26:29', '2020-11-25 18:26:29'),
(19, 1, 3, '2021-01-09 15:18:50', '2021-01-09 15:18:50'),
(20, 1, 3, '2021-01-09 15:18:56', '2021-01-09 15:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `week_days`
--

CREATE TABLE `week_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `ar_name` varchar(191) DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `week_days`
--

INSERT INTO `week_days` (`id`, `name`, `ar_name`, `order`, `created_at`, `updated_at`) VALUES
(1, '??????????', '??????????', 1, '2021-02-22 16:37:41', '2021-02-22 16:37:41'),
(2, '??????????', '??????????', 2, '2021-02-22 16:40:40', '2021-02-22 16:40:40'),
(3, '??????????????', '??????????????', 3, '2021-02-22 16:41:18', '2021-02-22 16:41:18'),
(4, '????????????????', '????????????????', 4, '2021-02-22 16:41:18', '2021-02-22 16:41:18'),
(5, '????????????????', '????????????????', 5, '2021-02-22 16:40:40', '2021-02-22 16:40:40'),
(6, '????????????', '????????????', 6, '2021-02-22 16:41:18', '2021-02-22 16:41:18'),
(7, '????????????', '????????????', 7, '2021-02-22 16:41:18', '2021-02-22 16:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `work_days`
--

CREATE TABLE `work_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_at` tinyint(4) NOT NULL DEFAULT 1,
  `end_at` tinyint(4) NOT NULL DEFAULT 7,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`),
  ADD KEY `attendances_store_id_foreign` (`store_id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balances_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `balance_detalies`
--
ALTER TABLE `balance_detalies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_detalies_bill_id_foreign` (`bill_id`),
  ADD KEY `balance_detalies_user_id_foreign` (`user_id`),
  ADD KEY `balance_detalies_balance_id_foreign` (`balance_id`);

--
-- Indexes for table `barrens`
--
ALTER TABLE `barrens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`),
  ADD KEY `bills_store_id_foreign` (`store_id`),
  ADD KEY `bills_customer_id_foreign` (`customer_id`),
  ADD KEY `bills_type_id_foreign` (`type_id`);

--
-- Indexes for table `bill_types`
--
ALTER TABLE `bill_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countr`
--
ALTER TABLE `countr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_mstores`
--
ALTER TABLE `customer_mstores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_mstores_store_id_foreign` (`store_id`),
  ADD KEY `customer_mstores_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `days_offs`
--
ALTER TABLE `days_offs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hour_prices`
--
ALTER TABLE `hour_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hour_prices_user_id_foreign` (`user_id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mstores`
--
ALTER TABLE `mstores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mstores_user_id_foreign` (`user_id`);

--
-- Indexes for table `mstore_categories`
--
ALTER TABLE `mstore_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mstore_categories_store_id_foreign` (`store_id`),
  ADD KEY `mstore_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `mstore_week_days`
--
ALTER TABLE `mstore_week_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mstore_week_days_store_id_foreign` (`store_id`),
  ADD KEY `mstore_week_days_day_id_foreign` (`day_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_store_id_foreign` (`store_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `product_customers`
--
ALTER TABLE `product_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_customers_customer_id_foreign` (`customer_id`),
  ADD KEY `product_customers_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_mstores`
--
ALTER TABLE `product_mstores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_mstores_store_id_foreign` (`store_id`),
  ADD KEY `product_mstores_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_user_id_foreign` (`user_id`),
  ADD KEY `salaries_edit_id_foreign` (`edit_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_bill_id_foreign` (`bill_id`),
  ADD KEY `sales_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_categories`
--
ALTER TABLE `unit_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_categories_unit_id_foreign` (`unit_id`),
  ADD KEY `unit_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_stores`
--
ALTER TABLE `user_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_stores_store_id_foreign` (`store_id`),
  ADD KEY `user_stores_user_id_foreign` (`user_id`);

--
-- Indexes for table `week_days`
--
ALTER TABLE `week_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_days`
--
ALTER TABLE `work_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_days_store_id_foreign` (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `balance_detalies`
--
ALTER TABLE `balance_detalies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barrens`
--
ALTER TABLE `barrens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bill_types`
--
ALTER TABLE `bill_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `countr`
--
ALTER TABLE `countr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_mstores`
--
ALTER TABLE `customer_mstores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days_offs`
--
ALTER TABLE `days_offs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hour_prices`
--
ALTER TABLE `hour_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
