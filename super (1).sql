-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 04:08 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `comment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 2, 1, 1, 2, NULL, 146, 0, 146, 0, 1, NULL, NULL, 0, '2023-02-25 00:28:16', '2023-02-25 00:28:16', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_types`
--

CREATE TABLE `bill_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=sale2=buy3=expiredorother',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_types`
--

INSERT INTO `bill_types` (`id`, `title`, `info`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'فاتورة بيع', NULL, 1, '2021-11-01 04:00:43', '2021-11-10 04:00:43'),
(2, 'فاتورة وارد', NULL, 2, '2021-11-01 04:00:43', '2021-11-01 04:00:43'),
(3, 'فاتورة مرتجع', NULL, 3, '2021-11-01 04:00:43', '2021-11-10 04:00:43'),
(4, 'فاتورة اعاده لمورد', NULL, 4, '2021-11-01 04:00:43', '2021-11-01 04:00:43'),
(5, 'فاتورة هوالك', NULL, 5, '2021-11-01 04:00:43', '2021-11-01 04:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'علوم', NULL, 1, 'fgb', 0, 0, 1, '2022-08-24 14:30:06', '2022-09-09 23:31:12'),
(2, 'العاب نارية', NULL, 0, NULL, 0, 0, 3, '2022-08-27 23:28:50', '2022-08-27 23:29:09'),
(3, 'لغه انجلزية', NULL, 1, NULL, 0, 0, 1, '2022-09-09 23:33:36', '2022-09-09 23:33:36'),
(4, 'الامتحان', NULL, 1, NULL, 0, 0, 1, '2022-09-14 16:50:29', '2022-09-14 16:50:29');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `en_title`, `ar_title`, `phone_code`, `country_enNationality`, `country_arNationality`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'أفغانستان', '263', 'Afghan', 'أفغانستاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(2, 'Albania', 'ألبانيا', '355', 'Albanian', 'ألباني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(3, 'Aland Islands', 'جزر آلاند', '213', 'Aland Islander', 'آلاندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(4, 'Algeria', 'الجزائر', '1684', 'Algerian', 'جزائري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(5, 'American Samoa', 'ساموا-الأمريكي', '376', 'American Samoan', 'أمريكي سامواني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(6, 'Andorra', 'أندورا', '244', 'Andorran', 'أندوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(7, 'Angola', 'أنغولا', '1264', 'Angolan', 'أنقولي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(8, 'Anguilla', 'أنغويلا', '0', 'Anguillan', 'أنغويلي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(9, 'Antarctica', 'أنتاركتيكا', '1268', 'Antarctican', 'أنتاركتيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(10, 'Antigua and Barbuda', 'أنتيغوا وبربودا', '54', 'Antiguan', 'بربودي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(11, 'Argentina', 'الأرجنتين', '374', 'Argentinian', 'أرجنتيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(12, 'Armenia', 'أرمينيا', '297', 'Armenian', 'أرميني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(13, 'Aruba', 'أروبه', '61', 'Aruban', 'أوروبهيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(14, 'Australia', 'أستراليا', '43', 'Australian', 'أسترالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(15, 'Austria', 'النمسا', '994', 'Austrian', 'نمساوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(16, 'Azerbaijan', 'أذربيجان', '1242', 'Azerbaijani', 'أذربيجاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(17, 'Bahamas', 'الباهاماس', '973', 'Bahamian', 'باهاميسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(18, 'Bahrain', 'البحرين', '880', 'Bahraini', 'بحريني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(19, 'Bangladesh', 'بنغلاديش', '1246', 'Bangladeshi', 'بنغلاديشي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(20, 'Barbados', 'بربادوس', '375', 'Barbadian', 'بربادوسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(21, 'Belarus', 'روسيا البيضاء', '32', 'Belarusian', 'روسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(22, 'Belgium', 'بلجيكا', '501', 'Belgian', 'بلجيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(23, 'Belize', 'بيليز', '229', 'Belizean', 'بيليزي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(24, 'Benin', 'بنين', '1441', 'Beninese', 'بنيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(25, 'Saint Barthelemy', 'سان بارتيلمي', '975', 'Saint Barthelmian', 'سان بارتيلمي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(26, 'Bermuda', 'جزر برمودا', '591', 'Bermudan', 'برمودي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(27, 'Bhutan', 'بوتان', '387', 'Bhutanese', 'بوتاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(28, 'Bolivia', 'بوليفيا', '267', 'Bolivian', 'بوليفي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(29, 'Bosnia and Herzegovina', 'البوسنة و الهرسك', '0', 'Bosnian / Herzegovinian', 'بوسني/هرسكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(30, 'Botswana', 'بوتسوانا', '55', 'Botswanan', 'بوتسواني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(31, 'Bouvet Island', 'جزيرة بوفيه', '246', 'Bouvetian', 'بوفيهي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(32, 'Brazil', 'البرازيل', '673', 'Brazilian', 'برازيلي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(33, 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني', '359', 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(34, 'Brunei Darussalam', 'بروني', '226', 'Bruneian', 'بروني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(35, 'Bulgaria', 'بلغاريا', '257', 'Bulgarian', 'بلغاري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(36, 'Burkina Faso', 'بوركينا فاسو', '855', 'Burkinabe', 'بوركيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(37, 'Burundi', 'بوروندي', '237', 'Burundian', 'بورونيدي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(38, 'Cambodia', 'كمبوديا', '1', 'Cambodian', 'كمبودي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(39, 'Cameroon', 'كاميرون', '238', 'Cameroonian', 'كاميروني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(40, 'Canada', 'كندا', '1345', 'Canadian', 'كندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(41, 'Cape Verde', 'الرأس الأخضر', '236', 'Cape Verdean', 'الرأس الأخضر', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(42, 'Cayman Islands', 'جزر كايمان', '235', 'Caymanian', 'كايماني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(43, 'Central African Republic', 'جمهورية أفريقيا الوسطى', '56', 'Central African', 'أفريقي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(44, 'Chad', 'تشاد', '86', 'Chadian', 'تشادي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(45, 'Chile', 'شيلي', '61', 'Chilean', 'شيلي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(46, 'China', 'الصين', '672', 'Chinese', 'صيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(47, 'Christmas Island', 'جزيرة عيد الميلاد', '57', 'Christmas Islander', 'جزيرة عيد الميلاد', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(48, 'Cocos (Keeling) Islands', 'جزر كوكوس', '269', 'Cocos Islander', 'جزر كوكوس', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(49, 'Colombia', 'كولومبيا', '242', 'Colombian', 'كولومبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(50, 'Comoros', 'جزر القمر', '242', 'Comorian', 'جزر القمر', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(51, 'Congo', 'الكونغو', '682', 'Congolese', 'كونغي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(52, 'Cook Islands', 'جزر كوك', '506', 'Cook Islander', 'جزر كوك', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(53, 'Costa Rica', 'كوستاريكا', '225', 'Costa Rican', 'كوستاريكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(54, 'Croatia', 'كرواتيا', '385', 'Croatian', 'كوراتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(55, 'Cuba', 'كوبا', '53', 'Cuban', 'كوبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(56, 'Cyprus', 'قبرص', '357', 'Cypriot', 'قبرصي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(57, 'Curaçao', 'كوراساو', '420', 'Curacian', 'كوراساوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(58, 'Czech Republic', 'الجمهورية التشيكية', '45', 'Czech', 'تشيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(59, 'Denmark', 'الدانمارك', '253', 'Danish', 'دنماركي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(60, 'Djibouti', 'جيبوتي', '1767', 'Djiboutian', 'جيبوتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(61, 'Dominica', 'دومينيكا', '1809', 'Dominican', 'دومينيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(62, 'Dominican Republic', 'الجمهورية الدومينيكية', '593', 'Dominican', 'دومينيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(63, 'Ecuador', 'إكوادور', '20', 'Ecuadorian', 'إكوادوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(64, 'Egypt', 'مصر', '503', 'Egyptian', 'مصري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(65, 'El Salvador', 'إلسلفادور', '240', 'Salvadoran', 'سلفادوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(66, 'Equatorial Guinea', 'غينيا الاستوائي', '291', 'Equatorial Guinean', 'غيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(67, 'Eritrea', 'إريتريا', '372', 'Eritrean', 'إريتيري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(68, 'Estonia', 'استونيا', '251', 'Estonian', 'استوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(69, 'Ethiopia', 'أثيوبيا', '500', 'Ethiopian', 'أثيوبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(70, 'Falkland Islands (Malvinas)', 'جزر فوكلاند', '298', 'Falkland Islander', 'فوكلاندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(71, 'Faroe Islands', 'جزر فارو', '679', 'Faroese', 'جزر فارو', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(72, 'Fiji', 'فيجي', '358', 'Fijian', 'فيجي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(73, 'Finland', 'فنلندا', '33', 'Finnish', 'فنلندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(74, 'France', 'فرنسا', '594', 'French', 'فرنسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(75, 'French Guiana', 'غويانا الفرنسية', '689', 'French Guianese', 'غويانا الفرنسية', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(76, 'French Polynesia', 'بولينيزيا الفرنسية', '0', 'French Polynesian', 'بولينيزيي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(77, 'French Southern and Antarctic Lands', 'أراض فرنسية جنوبية وأنتارتيكية', '241', 'French', 'أراض فرنسية جنوبية وأنتارتيكية', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(78, 'Gabon', 'الغابون', '220', 'Gabonese', 'غابوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(79, 'Gambia', 'غامبيا', '995', 'Gambian', 'غامبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(80, 'Georgia', 'جيورجيا', '49', 'Georgian', 'جيورجي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(81, 'Germany', 'ألمانيا', '233', 'German', 'ألماني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(82, 'Ghana', 'غانا', '350', 'Ghanaian', 'غاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(83, 'Gibraltar', 'جبل طارق', '30', 'Gibraltar', 'جبل طارق', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(84, 'Guernsey', 'غيرنزي', '299', 'Guernsian', 'غيرنزي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(85, 'Greece', 'اليونان', '1473', 'Greek', 'يوناني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(86, 'Greenland', 'جرينلاند', '590', 'Greenlandic', 'جرينلاندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(87, 'Grenada', 'غرينادا', '1671', 'Grenadian', 'غرينادي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(88, 'Guadeloupe', 'جزر جوادلوب', '502', 'Guadeloupe', 'جزر جوادلوب', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(89, 'Guam', 'جوام', '224', 'Guamanian', 'جوامي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(90, 'Guatemala', 'غواتيمال', '245', 'Guatemalan', 'غواتيمالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(91, 'Guinea', 'غينيا', '592', 'Guinean', 'غيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(92, 'Guinea-Bissau', 'غينيا-بيساو', '509', 'Guinea-Bissauan', 'غيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(93, 'Guyana', 'غيانا', '0', 'Guyanese', 'غياني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(94, 'Haiti', 'هايتي', '39', 'Haitian', 'هايتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(95, 'Heard and Mc Donald Islands', 'جزيرة هيرد وجزر ماكدونالد', '504', 'Heard and Mc Donald Islanders', 'جزيرة هيرد وجزر ماكدونالد', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(96, 'Honduras', 'هندوراس', '852', 'Honduran', 'هندوراسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(97, 'Hong Kong', 'هونغ كونغ', '36', 'Hongkongese', 'هونغ كونغي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(98, 'Hungary', 'المجر', '354', 'Hungarian', 'مجري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(99, 'Iceland', 'آيسلندا', '91', 'Icelandic', 'آيسلندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(100, 'India', 'الهند', '62', 'Indian', 'هندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(101, 'Isle of Man', 'جزيرة مان', '98', 'Manx', 'ماني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(102, 'Indonesia', 'أندونيسيا', '964', 'Indonesian', 'أندونيسيي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(103, 'Iran', 'إيران', '353', 'Iranian', 'إيراني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(104, 'Iraq', 'العراق', '972', 'Iraqi', 'عراقي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(105, 'Ireland', 'إيرلندا', '39', 'Irish', 'إيرلندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(106, 'Israel', 'إسرائيل', '1876', 'Israeli', 'إسرائيلي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(107, 'Italy', 'إيطاليا', '81', 'Italian', 'إيطالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(108, 'Ivory Coast', 'ساحل العاج', '962', 'Ivory Coastian', 'ساحل العاج', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(109, 'Jersey', 'جيرزي', '7', 'Jersian', 'جيرزي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(110, 'Jamaica', 'جمايكا', '254', 'Jamaican', 'جمايكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(111, 'Japan', 'اليابان', '686', 'Japanese', 'ياباني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(112, 'Jordan', 'الأردن', '850', 'Jordanian', 'أردني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(113, 'Kazakhstan', 'كازاخستان', '82', 'Kazakh', 'كازاخستاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(114, 'Kenya', 'كينيا', '965', 'Kenyan', 'كيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(115, 'Kiribati', 'كيريباتي', '996', 'I-Kiribati', 'كيريباتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(116, 'Korea(North Korea)', 'كوريا الشمالية', '856', 'North Korean', 'كوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(117, 'Korea(South Korea)', 'كوريا الجنوبية', '371', 'South Korean', 'كوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(118, 'Kosovo', 'كوسوفو', '961', 'Kosovar', 'كوسيفي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(119, 'Kuwait', 'الكويت', '266', 'Kuwaiti', 'كويتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(120, 'Kyrgyzstan', 'قيرغيزستان', '231', 'Kyrgyzstani', 'قيرغيزستاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(121, 'Lao PDR', 'لاوس', '218', 'Laotian', 'لاوسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(122, 'Latvia', 'لاتفيا', '423', 'Latvian', 'لاتيفي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(123, 'Lebanon', 'لبنان', '370', 'Lebanese', 'لبناني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(124, 'Lesotho', 'ليسوتو', '352', 'Basotho', 'ليوسيتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(125, 'Liberia', 'ليبيريا', '853', 'Liberian', 'ليبيري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(126, 'Libya', 'ليبيا', '389', 'Libyan', 'ليبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(127, 'Liechtenstein', 'ليختنشتين', '261', 'Liechtenstein', 'ليختنشتيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(128, 'Lithuania', 'لتوانيا', '265', 'Lithuanian', 'لتوانيي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(129, 'Luxembourg', 'لوكسمبورغ', '60', 'Luxembourger', 'لوكسمبورغي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(130, 'Sri Lanka', 'سريلانكا', '960', 'Sri Lankian', 'سريلانكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(131, 'Macau', 'ماكاو', '223', 'Macanese', 'ماكاوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(132, 'Macedonia', 'مقدونيا', '356', 'Macedonian', 'مقدوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(133, 'Madagascar', 'مدغشقر', '692', 'Malagasy', 'مدغشقري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(134, 'Malawi', 'مالاوي', '596', 'Malawian', 'مالاوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(135, 'Malaysia', 'ماليزيا', '222', 'Malaysian', 'ماليزي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(136, 'Maldives', 'المالديف', '230', 'Maldivian', 'مالديفي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(137, 'Mali', 'مالي', '269', 'Malian', 'مالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(138, 'Malta', 'مالطا', '52', 'Maltese', 'مالطي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(139, 'Marshall Islands', 'جزر مارشال', '691', 'Marshallese', 'مارشالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(140, 'Martinique', 'مارتينيك', '373', 'Martiniquais', 'مارتينيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(141, 'Mauritania', 'موريتانيا', '377', 'Mauritanian', 'موريتانيي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(142, 'Mauritius', 'موريشيوس', '976', 'Mauritian', 'موريشيوسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(143, 'Mayotte', 'مايوت', '1664', 'Mahoran', 'مايوتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(144, 'Mexico', 'المكسيك', '212', 'Mexican', 'مكسيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(145, 'Micronesia', 'مايكرونيزيا', '258', 'Micronesian', 'مايكرونيزيي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(146, 'Moldova', 'مولدافيا', '95', 'Moldovan', 'مولديفي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(147, 'Monaco', 'موناكو', '264', 'Monacan', 'مونيكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(148, 'Mongolia', 'منغوليا', '674', 'Mongolian', 'منغولي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(149, 'Montenegro', 'الجبل الأسود', '977', 'Montenegrin', 'الجبل الأسود', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(150, 'Montserrat', 'مونتسيرات', '31', 'Montserratian', 'مونتسيراتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(151, 'Morocco', 'المغرب', '599', 'Moroccan', 'مغربي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(152, 'Mozambique', 'موزمبيق', '687', 'Mozambican', 'موزمبيقي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(153, 'Myanmar', 'ميانمار', '64', 'Myanmarian', 'ميانماري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(154, 'Namibia', 'ناميبيا', '505', 'Namibian', 'ناميبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(155, 'Nauru', 'نورو', '227', 'Nauruan', 'نوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(156, 'Nepal', 'نيبال', '234', 'Nepalese', 'نيبالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(157, 'Netherlands', 'هولندا', '683', 'Dutch', 'هولندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(158, 'Netherlands Antilles', 'جزر الأنتيل الهولندي', '672', 'Dutch Antilier', 'هولندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(159, 'New Caledonia', 'كاليدونيا الجديدة', '1670', 'New Caledonian', 'كاليدوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(160, 'New Zealand', 'نيوزيلندا', '47', 'New Zealander', 'نيوزيلندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(161, 'Nicaragua', 'نيكاراجوا', '968', 'Nicaraguan', 'نيكاراجوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(162, 'Niger', 'النيجر', '92', 'Nigerien', 'نيجيري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(163, 'Nigeria', 'نيجيريا', '680', 'Nigerian', 'نيجيري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(164, 'Niue', 'ني', '970', 'Niuean', 'ني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(165, 'Norfolk Island', 'جزيرة نورفولك', '507', 'Norfolk Islander', 'نورفوليكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(166, 'Northern Mariana Islands', 'جزر ماريانا الشمالية', '675', 'Northern Marianan', 'ماريني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(167, 'Norway', 'النرويج', '595', 'Norwegian', 'نرويجي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(168, 'Oman', 'عمان', '51', 'Omani', 'عماني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(169, 'Pakistan', 'باكستان', '63', 'Pakistani', 'باكستاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(170, 'Palau', 'بالاو', '0', 'Palauan', 'بالاوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(171, 'Palestine', 'فلسطين', '48', 'Palestinian', 'فلسطيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(172, 'Panama', 'بنما', '351', 'Panamanian', 'بنمي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(173, 'Papua New Guinea', 'بابوا غينيا الجديدة', '1787', 'Papua New Guinean', 'بابوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(174, 'Paraguay', 'باراغواي', '974', 'Paraguayan', 'بارغاوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(175, 'Peru', 'بيرو', '262', 'Peruvian', 'بيري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(176, 'Philippines', 'الفليبين', '40', 'Filipino', 'فلبيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(177, 'Pitcairn', 'بيتكيرن', '70', 'Pitcairn Islander', 'بيتكيرني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(178, 'Poland', 'بولونيا', '250', 'Polish', 'بوليني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(179, 'Portugal', 'البرتغال', '290', 'Portuguese', 'برتغالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(180, 'Puerto Rico', 'بورتو ريكو', '1869', 'Puerto Rican', 'بورتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(181, 'Qatar', 'قطر', '1758', 'Qatari', 'قطري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(182, 'Reunion Island', 'ريونيون', '508', 'Reunionese', 'ريونيوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(183, 'Romania', 'رومانيا', '1784', 'Romanian', 'روماني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(184, 'Russian', 'روسيا', '684', 'Russian', 'روسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(185, 'Rwanda', 'رواندا', '378', 'Rwandan', 'رواندا', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(186, 'Saint Kitts and Nevis', 'سانت كيتس ونيفس,', '239', 'Kittitian/Nevisian', 'سانت كيتس ونيفس', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(187, 'Saint Martin (French part)', 'ساينت مارتن فرنسي', '966', 'St. Martian(French)', 'ساينت مارتني فرنسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(188, 'Sint Maarten (Dutch part)', 'ساينت مارتن هولندي', '221', 'St. Martian(Dutch)', 'ساينت مارتني هولندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(189, 'Saint Pierre and Miquelon', 'سان بيير وميكلون', '381', 'St. Pierre and Miquelon', 'سان بيير وميكلوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(190, 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', '248', 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(191, 'Samoa', 'ساموا', '232', 'Samoan', 'ساموي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(192, 'San Marino', 'سان مارينو', '65', 'Sammarinese', 'ماريني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(193, 'Sao Tome and Principe', 'ساو تومي وبرينسيبي', '421', 'Sao Tomean', 'ساو تومي وبرينسيبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(194, 'Saudi Arabia', 'المملكة العربية السعودية', '386', 'Saudi Arabian', 'سعودي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(195, 'Senegal', 'السنغال', '677', 'Senegalese', 'سنغالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(196, 'Serbia', 'صربيا', '252', 'Serbian', 'صربي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(197, 'Seychelles', 'سيشيل', '27', 'Seychellois', 'سيشيلي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(198, 'Sierra Leone', 'سيراليون', '0', 'Sierra Leonean', 'سيراليوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(199, 'Singapore', 'سنغافورة', '34', 'Singaporean', 'سنغافوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(200, 'Slovakia', 'سلوفاكيا', '94', 'Slovak', 'سولفاكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(201, 'Slovenia', 'سلوفينيا', '249', 'Slovenian', 'سولفيني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(202, 'Solomon Islands', 'جزر سليمان', '597', 'Solomon Island', 'جزر سليمان', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(203, 'Somalia', 'الصومال', '47', 'Somali', 'صومالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(204, 'South Africa', 'جنوب أفريقيا', '268', 'South African', 'أفريقي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(205, 'South Georgia and the South Sandwich', 'المنطقة القطبية الجنوبية', '46', 'South Georgia and the South Sandwich', 'لمنطقة القطبية الجنوبية', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(206, 'South Sudan', 'السودان الجنوبي', '41', 'South Sudanese', 'سوادني جنوبي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(207, 'Spain', 'إسبانيا', '963', 'Spanish', 'إسباني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(208, 'Saint Helena', 'سانت هيلانة', '886', 'St. Helenian', 'هيلاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(209, 'Sudan', 'السودان', '992', 'Sudanese', 'سوداني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(210, 'Suriname', 'سورينام', '255', 'Surinamese', 'سورينامي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(211, 'Svalbard and Jan Mayen', 'سفالبارد ويان ماين', '66', 'Svalbardian/Jan Mayenian', 'سفالبارد ويان ماين', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(212, 'Swaziland', 'سوازيلند', '670', 'Swazi', 'سوازيلندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(213, 'Sweden', 'السويد', '228', 'Swedish', 'سويدي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(214, 'Switzerland', 'سويسرا', '690', 'Swiss', 'سويسري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(215, 'Syria', 'سوريا', '676', 'Syrian', 'سوري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(216, 'Taiwan', 'تايوان', '1868', 'Taiwanese', 'تايواني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(217, 'Tajikistan', 'طاجيكستان', '216', 'Tajikistani', 'طاجيكستاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(218, 'Tanzania', 'تنزانيا', '90', 'Tanzanian', 'تنزانيي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(219, 'Thailand', 'تايلندا', '7370', 'Thai', 'تايلندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(220, 'Timor-Leste', 'تيمور الشرقية', '1649', 'Timor-Lestian', 'تيموري', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(221, 'Togo', 'توغو', '688', 'Togolese', 'توغي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(222, 'Tokelau', 'توكيلاو', '256', 'Tokelaian', 'توكيلاوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(223, 'Tonga', 'تونغا', '380', 'Tongan', 'تونغي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(224, 'Trinidad and Tobago', 'ترينيداد وتوباغو', '971', 'Trinidadian/Tobagonian', 'ترينيداد وتوباغو', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(225, 'Tunisia', 'تونس', '44', 'Tunisian', 'تونسي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(226, 'Turkey', 'تركيا', '1', 'Turkish', 'تركي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(227, 'Turkmenistan', 'تركمانستان', '1', 'Turkmen', 'تركمانستاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(228, 'Turks and Caicos Islands', 'جزر توركس وكايكوس', '598', 'Turks and Caicos Islands', 'جزر توركس وكايكوس', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(229, 'Tuvalu', 'توفالو', '998', 'Tuvaluan', 'توفالي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(230, 'Uganda', 'أوغندا', '678', 'Ugandan', 'أوغندي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(231, 'Ukraine', 'أوكرانيا', '58', 'Ukrainian', 'أوكراني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(232, 'United Arab Emirates', 'الإمارات العربية المتحدة', '84', 'Emirati', 'إماراتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(233, 'United Kingdom', 'المملكة المتحدة', '1284', 'British', 'بريطاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(234, 'United States', 'الولايات المتحدة', '1340', 'American', 'أمريكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(235, 'US Minor Outlying Islands', 'قائمة الولايات والمناطق الأمريكية', '681', 'US Minor Outlying Islander', 'أمريكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(236, 'Uruguay', 'أورغواي', '212', 'Uruguayan', 'أورغواي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(237, 'Uzbekistan', 'أوزباكستان', '967', 'Uzbek', 'أوزباكستاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(238, 'Vanuatu', 'فانواتو', '260', 'Vanuatuan', 'فانواتي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(239, 'Venezuela', 'فنزويلا', '263', 'Venezuelan', 'فنزويلي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(240, 'Vietnam', 'فيتنام', NULL, 'Vietnamese', 'فيتنامي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(241, 'Virgin Islands (U.S.)', 'الجزر العذراء الأمريكي', NULL, 'American Virgin Islander', 'أمريكي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(242, 'Vatican City', 'فنزويلا', NULL, 'Vatican', 'فاتيكاني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(243, 'Wallis and Futuna Islands', 'والس وفوتونا', NULL, 'Wallisian/Futunan', 'فوتوني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(244, 'Western Sahara', 'الصحراء الغربية', NULL, 'Sahrawian', 'صحراوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(245, 'Yemen', 'اليمن', NULL, 'Yemeni', 'يمني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(246, 'Zambia', 'زامبيا', NULL, 'Zambian', 'زامبياني', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43'),
(247, 'Zimbabwe', 'زمبابوي', NULL, 'Zimbabwean', 'زمبابوي', NULL, '2021-02-10 15:02:43', '2021-02-10 15:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'مورد واحد', 'www@ddd.com', 'qqqq', '04230.05122', 'sssswsw', NULL, 2, 5, 0, '2023-02-25 00:27:13', '2023-02-25 00:27:13'),
(2, 'عميل', NULL, 'ثثثث', '0101120', 'ثصقثقث', NULL, 1, 5, 0, '2023-02-25 00:27:42', '2023-02-25 00:27:42');

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
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `locale` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin DEFAULT NULL,
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
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41);

-- --------------------------------------------------------

--
-- Table structure for table `mstores`
--

CREATE TABLE `mstores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstores`
--

INSERT INTO `mstores` (`id`, `title`, `address`, `phone`, `info`, `logo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'مخزن الحمد', 'العنوان', '010123565', NULL, NULL, 9, '2020-10-20 06:06:41', '2020-10-20 06:06:41'),
(2, 'المحلة الكبري', 'المحلة الكبري', '012365852200', NULL, NULL, 3, '2020-11-22 20:14:13', '2020-11-22 20:14:13');

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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `buy_price` double NOT NULL DEFAULT 0,
  `max_price` double NOT NULL DEFAULT 0,
  `min_price` double NOT NULL DEFAULT 0,
  `info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `rival` double NOT NULL DEFAULT 0,
  `addRival` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `img_url`, `total`, `buy_price`, `max_price`, `min_price`, `info`, `produce_at`, `expired_at`, `expired_at_notify`, `rate_selling`, `rate_customers`, `store_id`, `category_id`, `user_id`, `supplier_id`, `unit_id`, `slug`, `active`, `rival`, `addRival`, `created_at`, `updated_at`) VALUES
(1, 'سلاح التلميذ عربي 5ب', NULL, 37, 73, 73, 56.8, NULL, NULL, NULL, 7, 5, 5, NULL, 1, NULL, NULL, 1, '1234', 1, 20, 0, '2022-09-09 23:32:14', '2023-02-25 00:28:16'),
(2, 'الاضواء تانية اعدادي', NULL, 14, 45, 89, 89, NULL, NULL, NULL, 7, 5, 5, NULL, 1, NULL, NULL, 2, '234', 1, 34, 11, '2022-09-09 23:33:17', '2022-09-12 21:51:06'),
(3, 'gymتانيه اعدادي', NULL, 0, 120, 1345, 1345, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>ق</td>\r\n			<td>ربلابرلا</td>\r\n		</tr>\r\n		<tr>\r\n			<td>قلب</td>\r\n			<td>بلبل</td>\r\n		</tr>\r\n		<tr>\r\n			<td>يي</td>\r\n			<td>بقثق</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 7, 5, 5, NULL, 3, NULL, NULL, 2, '2436', 1, 11, 11, '2022-09-09 23:35:05', '2022-09-09 23:35:05'),
(4, 'الامتحان كمياء 2ث علمي', NULL, 2, 79, 79, 64.78, NULL, NULL, NULL, 7, 5, 5, NULL, 1, NULL, NULL, 1, '0011', 1, 18, 0, '2022-09-14 17:07:54', '2022-09-14 17:14:10'),
(5, 'قطر الندي 5ب علوم ورياضة', NULL, 0, 89, 89, 73, NULL, NULL, NULL, 7, 5, 5, NULL, 1, NULL, NULL, 1, '0012', 1, 18, 0, '2022-09-14 18:16:44', '2022-09-14 18:16:44'),
(6, 'قطر الندي عربي ومواد 5ب', NULL, 0, 98, 98, 80.36, NULL, NULL, NULL, 7, 5, 5, NULL, 1, NULL, NULL, 1, '0013', 1, 18, 0, '2022-09-14 18:18:16', '2022-09-14 18:18:39'),
(7, 'قطر دين 5ب', NULL, 0, 27, 27, 21.6, NULL, NULL, NULL, 7, 5, 5, NULL, 1, NULL, NULL, 1, '0014', 1, 20, 0, '2022-09-14 18:20:08', '2022-09-14 18:20:08');

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `ar_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'موظف', 'web', '2020-10-20 06:01:03', '2020-10-20 06:01:03'),
(2, 'user', 'موظف', 'web', '2020-10-20 06:01:03', '2020-10-20 06:01:03');

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
  `month` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pons` double NOT NULL DEFAULT 0,
  `deductions` double NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `is_payed` tinyint(4) NOT NULL DEFAULT 0,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(2, 1, 1, 1, 73, 73, 0, 0, '2023-02-25 00:28:16', '2023-02-25 00:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_slider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android_app` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios_app` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `sms_user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_user_pass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_sender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_hot_line` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `site_proportion` double NOT NULL DEFAULT 0,
  `shipping_price` double DEFAULT 0,
  `facebook_link` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_link` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tewtter_link` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rss_link` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `login_banner`, `image_slider`, `en_title`, `ar_title`, `address1`, `address2`, `phone1`, `phone2`, `fax`, `android_app`, `ios_app`, `email1`, `email2`, `link`, `ar_des`, `en_des`, `latitude`, `longitude`, `sms_user_name`, `sms_user_pass`, `sms_sender`, `publisher`, `company_hot_line`, `default_language`, `site_proportion`, `shipping_price`, `facebook_link`, `gmail_link`, `insta_link`, `tewtter_link`, `rss_link`, `term`, `created_at`, `updated_at`) VALUES
(1, 'setting/1677271920.jpeg', NULL, NULL, 'aqusah', 'سوبر ماركت', 'المحلة الكبري -محلة حسن', 'الكويت', '01013924210', '01013924210', NULL, 'https://play.google.com', 'https://www.apple.com/eg-ar/ios/app-store/', 'muhammad@muhamm.com', 'muhammad2@register.com', NULL, 'rrr', 'des', 28.623111, 43.626704, NULL, NULL, NULL, NULL, NULL, 'ar', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'المرتجع خلال شهر', NULL, '2023-02-24 20:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `active`, `info`, `created_at`, `updated_at`) VALUES
(1, 'دستة', 1, 'وحده', '2021-11-25 03:18:57', '2021-11-30 07:16:55'),
(2, 'بالوحده', 1, NULL, '2021-11-30 07:17:22', '2021-11-30 07:17:22');

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour_price` double NOT NULL DEFAULT 1,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `phone`, `hour_price`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمود', 'admin@admin.com', '1603343443.jpg', NULL, 1, NULL, NULL, '$2y$10$t8QK.WsTYXaW4NkknulOu.Vk.B4rZN9X8SQqCgt5.r3MN7mboFIXu', NULL, '2020-10-20 05:54:51', '2022-09-11 01:14:00'),
(2, 'mmm', 'qq@qq.com', NULL, NULL, 1, NULL, NULL, '$2y$10$X6uQLnUiQyM2GKHBrxa9fO3LiLSrSFSCcgbDYzf.diSRYof9N80SO', NULL, '2023-02-25 00:03:08', '2023-02-25 00:03:08');

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `week_days`
--

INSERT INTO `week_days` (`id`, `name`, `ar_name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'السبت', 'السبت', 1, '2021-02-22 16:37:41', '2021-02-22 16:37:41'),
(2, 'الأحد', 'الأحد', 2, '2021-02-22 16:40:40', '2021-02-22 16:40:40'),
(3, 'الإثنين', 'الإثنين', 3, '2021-02-22 16:41:18', '2021-02-22 16:41:18'),
(4, 'الثلاثاء', 'الثلاثاء', 4, '2021-02-22 16:41:18', '2021-02-22 16:41:18'),
(5, 'الاربعاء', 'الاربعاء', 5, '2021-02-22 16:40:40', '2021-02-22 16:40:40'),
(6, 'الخميس', 'الخميس', 6, '2021-02-22 16:41:18', '2021-02-22 16:41:18'),
(7, 'الجمعه', 'الجمعه', 7, '2021-02-22 16:41:18', '2021-02-22 16:41:18');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_types`
--
ALTER TABLE `bill_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
