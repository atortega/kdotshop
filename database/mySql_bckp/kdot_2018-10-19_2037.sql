-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 02:37 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdot`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`) VALUES
(2, 'Accessories', 'Any brand of accessories'),
(3, 'Apparel', 'This is an apparel category'),
(4, 'Shoes', 'Any brand of shoes'),
(5, 'Bags', 'Any brand of bags and backpacks'),
(6, 'Jump Short', 'Any jump short');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(3) NOT NULL,
  `color` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color`, `description`) VALUES
(1, 'White', 'White'),
(3, 'Red', 'Red'),
(4, 'Blue', 'Blue'),
(5, 'BLACK', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(2, 'AX', 'Ã…land Islands', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(3, 'AL', 'Albania', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(4, 'DZ', 'Algeria', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(5, 'AS', 'American Samoa', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(6, 'AD', 'Andorra', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(7, 'AO', 'Angola', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(8, 'AI', 'Anguilla', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(9, 'AQ', 'Antarctica', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(10, 'AG', 'Antigua and Barbuda', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(11, 'AR', 'Argentina', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(12, 'AM', 'Armenia', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(13, 'AW', 'Aruba', '2018-10-16 02:00:09', '2018-10-16 02:00:09'),
(14, 'AU', 'Australia', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(15, 'AT', 'Austria', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(16, 'AZ', 'Azerbaijan', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(17, 'BS', 'Bahamas', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(18, 'BH', 'Bahrain', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(19, 'BD', 'Bangladesh', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(20, 'BB', 'Barbados', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(21, 'BY', 'Belarus', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(22, 'BE', 'Belgium', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(23, 'BZ', 'Belize', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(24, 'BJ', 'Benin', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(25, 'BM', 'Bermuda', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(26, 'BT', 'Bhutan', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(27, 'BO', 'Bolivia, Plurinational State of', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(29, 'BA', 'Bosnia and Herzegovina', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(30, 'BW', 'Botswana', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(31, 'BV', 'Bouvet Island', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(32, 'BR', 'Brazil', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(33, 'IO', 'British Indian Ocean Territory', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(34, 'BN', 'Brunei Darussalam', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(35, 'BG', 'Bulgaria', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(36, 'BF', 'Burkina Faso', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(37, 'BI', 'Burundi', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(38, 'KH', 'Cambodia', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(39, 'CM', 'Cameroon', '2018-10-16 02:00:10', '2018-10-16 02:00:10'),
(40, 'CA', 'Canada', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(41, 'CV', 'Cape Verde', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(42, 'KY', 'Cayman Islands', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(43, 'CF', 'Central African Republic', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(44, 'TD', 'Chad', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(45, 'CL', 'Chile', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(46, 'CN', 'China', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(47, 'CX', 'Christmas Island', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(48, 'CC', 'Cocos (Keeling) Islands', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(49, 'CO', 'Colombia', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(50, 'KM', 'Comoros', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(51, 'CG', 'Congo', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(52, 'CD', 'Congo, the Democratic Republic of the', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(53, 'CK', 'Cook Islands', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(54, 'CR', 'Costa Rica', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(55, 'CI', 'CÃ´te d\'Ivoire', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(56, 'HR', 'Croatia', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(57, 'CU', 'Cuba', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(58, 'CW', 'CuraÃ§ao', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(59, 'CY', 'Cyprus', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(60, 'CZ', 'Czech Republic', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(61, 'DK', 'Denmark', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(62, 'DJ', 'Djibouti', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(63, 'DM', 'Dominica', '2018-10-16 02:00:11', '2018-10-16 02:00:11'),
(64, 'DO', 'Dominican Republic', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(65, 'EC', 'Ecuador', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(66, 'EG', 'Egypt', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(67, 'SV', 'El Salvador', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(68, 'GQ', 'Equatorial Guinea', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(69, 'ER', 'Eritrea', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(70, 'EE', 'Estonia', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(71, 'ET', 'Ethiopia', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(72, 'FK', 'Falkland Islands (Malvinas)', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(73, 'FO', 'Faroe Islands', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(74, 'FJ', 'Fiji', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(75, 'FI', 'Finland', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(76, 'FR', 'France', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(77, 'GF', 'French Guiana', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(78, 'PF', 'French Polynesia', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(79, 'TF', 'French Southern Territories', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(80, 'GA', 'Gabon', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(81, 'GM', 'Gambia', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(82, 'GE', 'Georgia', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(83, 'DE', 'Germany', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(84, 'GH', 'Ghana', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(85, 'GI', 'Gibraltar', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(86, 'GR', 'Greece', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(87, 'GL', 'Greenland', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(88, 'GD', 'Grenada', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(89, 'GP', 'Guadeloupe', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(90, 'GU', 'Guam', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(91, 'GT', 'Guatemala', '2018-10-16 02:00:12', '2018-10-16 02:00:12'),
(92, 'GG', 'Guernsey', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(93, 'GN', 'Guinea', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(94, 'GW', 'Guinea-Bissau', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(95, 'GY', 'Guyana', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(96, 'HT', 'Haiti', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(97, 'HM', 'Heard Island and McDonald Islands', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(98, 'VA', 'Holy See (Vatican City State)', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(99, 'HN', 'Honduras', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(100, 'HK', 'Hong Kong', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(101, 'HU', 'Hungary', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(102, 'IS', 'Iceland', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(103, 'IN', 'India', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(104, 'ID', 'Indonesia', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(105, 'IR', 'Iran, Islamic Republic of', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(106, 'IQ', 'Iraq', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(107, 'IE', 'Ireland', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(108, 'IM', 'Isle of Man', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(109, 'IL', 'Israel', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(110, 'IT', 'Italy', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(111, 'JM', 'Jamaica', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(112, 'JP', 'Japan', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(113, 'JE', 'Jersey', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(114, 'JO', 'Jordan', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(115, 'KZ', 'Kazakhstan', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(116, 'KE', 'Kenya', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(117, 'KI', 'Kiribati', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(118, 'KP', 'Korea, Democratic People\'s Republic of', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(119, 'KR', 'Korea, Republic of', '2018-10-16 02:00:13', '2018-10-16 02:00:13'),
(120, 'KW', 'Kuwait', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(121, 'KG', 'Kyrgyzstan', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(122, 'LA', 'Lao People\'s Democratic Republic', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(123, 'LV', 'Latvia', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(124, 'LB', 'Lebanon', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(125, 'LS', 'Lesotho', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(126, 'LR', 'Liberia', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(127, 'LY', 'Libya', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(128, 'LI', 'Liechtenstein', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(129, 'LT', 'Lithuania', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(130, 'LU', 'Luxembourg', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(131, 'MO', 'Macao', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(132, 'MK', 'Macedonia, the Former Yugoslav Republic of', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(133, 'MG', 'Madagascar', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(134, 'MW', 'Malawi', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(135, 'MY', 'Malaysia', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(136, 'MV', 'Maldives', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(137, 'ML', 'Mali', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(138, 'MT', 'Malta', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(139, 'MH', 'Marshall Islands', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(140, 'MQ', 'Martinique', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(141, 'MR', 'Mauritania', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(142, 'MU', 'Mauritius', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(143, 'YT', 'Mayotte', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(144, 'MX', 'Mexico', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(145, 'FM', 'Micronesia, Federated States of', '2018-10-16 02:00:14', '2018-10-16 02:00:14'),
(146, 'MD', 'Moldova, Republic of', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(147, 'MC', 'Monaco', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(148, 'MN', 'Mongolia', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(149, 'ME', 'Montenegro', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(150, 'MS', 'Montserrat', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(151, 'MA', 'Morocco', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(152, 'MZ', 'Mozambique', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(153, 'MM', 'Myanmar', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(154, 'NA', 'Namibia', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(155, 'NR', 'Nauru', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(156, 'NP', 'Nepal', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(157, 'NL', 'Netherlands', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(158, 'NC', 'New Caledonia', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(159, 'NZ', 'New Zealand', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(160, 'NI', 'Nicaragua', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(161, 'NE', 'Niger', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(162, 'NG', 'Nigeria', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(163, 'NU', 'Niue', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(164, 'NF', 'Norfolk Island', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(165, 'MP', 'Northern Mariana Islands', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(166, 'NO', 'Norway', '2018-10-16 02:00:15', '2018-10-16 02:00:15'),
(167, 'OM', 'Oman', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(168, 'PK', 'Pakistan', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(169, 'PW', 'Palau', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(170, 'PS', 'Palestine, State of', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(171, 'PA', 'Panama', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(172, 'PG', 'Papua New Guinea', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(173, 'PY', 'Paraguay', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(174, 'PE', 'Peru', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(175, 'PH', 'Philippines', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(176, 'PN', 'Pitcairn', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(177, 'PL', 'Poland', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(178, 'PT', 'Portugal', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(179, 'PR', 'Puerto Rico', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(180, 'QA', 'Qatar', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(181, 'RE', 'RÃ©union', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(182, 'RO', 'Romania', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(183, 'RU', 'Russian Federation', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(184, 'RW', 'Rwanda', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(185, 'BL', 'Saint BarthÃ©lemy', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(186, 'SH', 'Saint Helena, Ascension and Tristan da Cunha', '2018-10-16 02:00:16', '2018-10-16 02:00:16'),
(187, 'KN', 'Saint Kitts and Nevis', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(188, 'LC', 'Saint Lucia', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(189, 'MF', 'Saint Martin (French part)', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(190, 'PM', 'Saint Pierre and Miquelon', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(191, 'VC', 'Saint Vincent and the Grenadines', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(192, 'WS', 'Samoa', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(193, 'SM', 'San Marino', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(194, 'ST', 'Sao Tome and Principe', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(195, 'SA', 'Saudi Arabia', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(196, 'SN', 'Senegal', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(197, 'RS', 'Serbia', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(198, 'SC', 'Seychelles', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(199, 'SL', 'Sierra Leone', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(200, 'SG', 'Singapore', '2018-10-16 02:00:17', '2018-10-16 02:00:17'),
(201, 'SX', 'Sint Maarten (Dutch part)', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(202, 'SK', 'Slovakia', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(203, 'SI', 'Slovenia', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(204, 'SB', 'Solomon Islands', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(205, 'SO', 'Somalia', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(206, 'ZA', 'South Africa', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(207, 'GS', 'South Georgia and the South Sandwich Islands', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(208, 'SS', 'South Sudan', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(209, 'ES', 'Spain', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(210, 'LK', 'Sri Lanka', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(211, 'SD', 'Sudan', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(212, 'SR', 'Suriname', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(213, 'SJ', 'Svalbard and Jan Mayen', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(214, 'SZ', 'Swaziland', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(215, 'SE', 'Sweden', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(216, 'CH', 'Switzerland', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(217, 'SY', 'Syrian Arab Republic', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(218, 'TW', 'Taiwan, Province of China', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(219, 'TJ', 'Tajikistan', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(220, 'TZ', 'Tanzania, United Republic of', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(221, 'TH', 'Thailand', '2018-10-16 02:00:18', '2018-10-16 02:00:18'),
(222, 'TL', 'Timor-Leste', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(223, 'TG', 'Togo', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(224, 'TK', 'Tokelau', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(225, 'TO', 'Tonga', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(226, 'TT', 'Trinidad and Tobago', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(227, 'TN', 'Tunisia', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(228, 'TR', 'Turkey', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(229, 'TM', 'Turkmenistan', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(230, 'TC', 'Turks and Caicos Islands', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(231, 'TV', 'Tuvalu', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(232, 'UG', 'Uganda', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(233, 'UA', 'Ukraine', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(234, 'AE', 'United Arab Emirates', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(235, 'GB', 'United Kingdom', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(236, 'US', 'United States', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(237, 'UM', 'United States Minor Outlying Islands', '2018-10-16 02:00:19', '2018-10-16 02:00:19'),
(238, 'UY', 'Uruguay', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(239, 'UZ', 'Uzbekistan', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(240, 'VU', 'Vanuatu', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(241, 'VE', 'Venezuela, Bolivarian Republic of', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(242, 'VN', 'Viet Nam', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(243, 'VG', 'Virgin Islands, British', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(244, 'VI', 'Virgin Islands, U.S.', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(245, 'WF', 'Wallis and Futuna', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(246, 'EH', 'Western Sahara', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(247, 'YE', 'Yemen', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(248, 'ZM', 'Zambia', '2018-10-16 02:00:20', '2018-10-16 02:00:20'),
(249, 'ZW', 'Zimbabwe', '2018-10-16 02:00:20', '2018-10-16 02:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(255) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `middle_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'customer',
  `birthdate` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar_original` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `provider_id` varchar(100) DEFAULT NULL,
  `provider` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `middle_name`, `type`, `birthdate`, `gender`, `address`, `phone_number`, `email`, `password`, `avatar_original`, `avatar`, `provider_id`, `provider`, `remember_token`, `created_at`) VALUES
(1, 'gesshchamix', NULL, NULL, 'customer', NULL, NULL, 'canduman mandaue city', '45623', 'gesshchamix23@gmail.com', 'kdBKKRWCE26t6', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(2, 'mildred', NULL, NULL, 'customer', NULL, NULL, 'canduman mandaue city', '45623', 'chayers@gmail.com', 'kd7gq0mw.d/Ao', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(3, 'Joshua', 'Ligad', 'Robledo', 'customer', '1997-01-06', 'M', 'talamban cebu city', '09225885013', 'joshua.r.ligad@gmail.com', '$2y$10$iv1HLwBCVvvqW6QvpXlrIudXVmdpFPCoQtma1qhtnISMgUgwvAj.y', NULL, NULL, NULL, NULL, '6s2NerRD8MyaoVHsUP0FrrSD50yiqEIokAe4Z2MLVuxlZvUXk6RG37rCXSyZ', '2018-10-19 08:33:33'),
(4, 'chamix', NULL, NULL, 'customer', NULL, NULL, 'asfagag', '12346861', 'chamix23@gmail.com', 'kdGGSSGAkHqd.', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(5, 'chamix', NULL, NULL, 'customer', NULL, NULL, 'Riverside Canduman Mandaue City', '09424392952', 'cham@gmail.com', 'kdXrw/NBs.0V2', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(8, 'gesshchamix', NULL, NULL, 'customer', NULL, NULL, 'asdmin', '09424392952', 'bela01@gmail.com', 'kdH9hC2M5rv6Q', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(9, 'chloe', NULL, NULL, 'customer', NULL, NULL, 'canduman mandaue city', '0', '', 'kdeGhQ6GlAtzc', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(10, 'jake kharl', NULL, NULL, 'customer', NULL, NULL, 'canduman mandaue city', '09183455800', 'jake@gmail.com', 'kdUvfbWkFzYn6', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(11, 'Gleza Mae Tudtud', NULL, NULL, 'customer', NULL, NULL, 'canduman', '09424392952', 'glezamae@gmail.com', 'kd6GUkWlv1A/E', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(12, 'chai', NULL, NULL, 'customer', NULL, NULL, 'basdiot', '0906 878 0639', 'chai@gmail.com', 'kdWpaI7wqmw1Y', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(13, 'Pete Adre', NULL, NULL, 'customer', NULL, NULL, 'Moalboal', '12345679', 'pete@yahoo.com', '$2y$10$v2CLTy5eHquU99M9UDmRVedrTHpn7e6Vi9EdmBvy6tMunFzl3bHZC', NULL, NULL, NULL, NULL, '', '2018-10-03 07:58:42'),
(14, 'CHAILAB', NULL, NULL, 'customer', NULL, NULL, 'diris amoa', '0906 878 0435', 'chailab@gmail.com', 'chailab', NULL, NULL, NULL, NULL, '', '2018-10-03 07:01:30'),
(15, 'Aner Ortega', NULL, NULL, 'customer', NULL, NULL, NULL, NULL, 'aner@yahoo.com', '$2y$10$CH4ifn2uWuO6QiC.RytTweSbnl/LEkB6S2eqvcV03i30p6.4TzPcm', NULL, NULL, NULL, NULL, NULL, '2018-10-03 03:02:28'),
(16, NULL, NULL, NULL, 'customer', NULL, NULL, NULL, NULL, 'atortega@yahoo.com', '$2y$10$Q15TwTOBPmL.76Bot/Uiie1WIUje7RgPkIwLlnn/2bNq5lhKvkJG2', NULL, NULL, NULL, NULL, 'J4NffPevEwCOoVjCTOWD90IPVPvttO8VgRnodssYrwTTvXSjKaIDzeBjUj9h', '2018-10-04 08:05:07'),
(17, 'Aner', 'Ortega', 'Tapales', 'admin', '2014-09-22', 'M', NULL, NULL, 'atortega3@yahoo.com', '$2y$10$akKv6gFqt3ssOFAe7fAVPenexwZdEgc7mcW9FAiQ3jU9xmNOwV.Iu', NULL, NULL, NULL, NULL, 'xVVIiPZgiDHdUluStXxQAdqya9AyoNgg391LZZ3J1zHwhsO1ibQTuEr93BRf', '2018-10-19 08:01:01'),
(18, 'Cherie', 'Ortega', 'Sebastian', 'customer', '2018-10-16', 'M', NULL, NULL, 'cherie@yahoo.com', '$2y$10$bzwljOG/l1v8Yoy6Ey2nXOb/2DJVSc/IiQrU/9SblOIE9GqhSFL3q', NULL, NULL, NULL, NULL, 'P00RzF6xYbo6NXzqR4bgKI32fHcC2z6SSowXRa5KCht7jK2hzteiDqzs7chZ', '2018-10-04 08:12:07'),
(19, 'mama', 'ortega', 's', 'customer', '1986-04-03', 'F', NULL, '09068780632', 'fafa@gmail.com', '$2y$10$5VQcy5nvBNgtwIOZaxc1T.fwdYT/5PNqg8ffL8oItCNxS.Rvmev3i', NULL, NULL, NULL, NULL, 'Dw88uc6AFcAh1tkOLeCZMKU1jEFBOeQfXB7lLJh64HAZTJiIk4PAbo0RZw4m', '2018-10-11 07:06:25'),
(20, 'Gessh', 'Chamix', 'M,', 'customer', '1995-10-23', 'M', NULL, NULL, 'chamix@gmail.com', '$2y$10$iihuUPyqKvxQfhRF8dOcMuuBsa1Qzw2crQBNX/GjUIwS1sT5xbp3O', NULL, NULL, NULL, NULL, 'C6AlZUN9PECrWjtedysmsMnvoZc1UOJOQPgiUgmMo04oOBrrKKToWpQtxtWt', '2018-10-05 06:41:28'),
(21, 'chacha', 'ortega', 'Lincaro', 'customer', '2000-09-03', 'F', NULL, NULL, 'chacha@gmail.com', '$2y$10$x4./TaMx0invvBfMgBVuTuwRmNXath6j.zmE4yY.qdH5AdG1TZZYG', NULL, NULL, NULL, NULL, 'hmOiN4p7gzS54VPw7eZUPQzSWdeTd6YOaBjFuOc1r1kI3JbHHUqZwOjUpnul', '2018-10-10 05:23:31'),
(22, 'Chloe', 'Ravina', 'Lincaro', 'customer', '2011-10-07', 'F', NULL, NULL, 'ravina@gmail.com', '$2y$10$nLUu5oyUO8D/f5YiqxQTBes0N7V8vJAGcX7iTlIPQ0VuaCy2tGuhq', NULL, NULL, NULL, NULL, 'HUWdOTOjuKWcwdSAew3ynVutv9JeRIv1qQOrzazKQ9mspC7SqYhNLuxwvoHp', '2018-10-10 06:07:11'),
(23, 'dfgdd', 'mvjguj', 'hjdfhd', 'customer', '2018-10-02', 'M', NULL, NULL, 'gaga@gmail.com', '$2y$10$hubSI180IskPQdMVpg5QY.SnvnJ2PfNhefEYTfo9b8NiZAa/PTaVy', NULL, NULL, NULL, NULL, 'eJoAxKKEtuUdTjRn6O59AsYnX9Legi0CLazvaKwXBPdJWW7KSjSOtdKAfedX', '2018-10-10 07:12:45'),
(24, 'Jerry', 'Ligad', 'Diaz', 'customer', '2018-10-12', 'M', NULL, '09832747512', 'jerry.ligad@yahoo.com', '$2y$10$iv1HLwBCVvvqW6QvpXlrIudXVmdpFPCoQtma1qhtnISMgUgwvAj.y', NULL, NULL, NULL, NULL, 'bdRxszBpQkt1XFeJvJKZMi1sQaM9EwCN64mwlGmT3lucRvsWICURWZhawO7K', '2018-10-17 10:49:09'),
(25, 'KDot Shop', 'KDot Shop', NULL, 'customer', NULL, NULL, NULL, NULL, 'kdotshop2k18@gmail.com', NULL, 'https://lh4.googleusercontent.com/-Qm9Uu9ikM_k/AAAAAAAAAAI/AAAAAAAAAAk/O7FTg5qLiGs/photo.jpg', 'https://lh4.googleusercontent.com/-Qm9Uu9ikM_k/AAAAAAAAAAI/AAAAAAAAAAk/O7FTg5qLiGs/photo.jpg?sz=50', '109139515253704692407', 'google', '7V9moRKt6ZLeDPZjwtPPLSh9ZTt372FArdWrHLAuKRfi0bAgRTBvvII5BR71', '2018-10-19 08:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers_address`
--

CREATE TABLE `customers_address` (
  `customers_address_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `billing_address1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_barangay` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_province` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zipcode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_same_as_billing_address` tinyint(1) NOT NULL DEFAULT '0',
  `shipping_address1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_barangay` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_province` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_zipcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers_address`
--

INSERT INTO `customers_address` (`customers_address_id`, `customer_id`, `billing_address1`, `billing_barangay`, `billing_city`, `billing_province`, `billing_zipcode`, `billing_country`, `shipping_same_as_billing_address`, `shipping_address1`, `shipping_barangay`, `shipping_city`, `shipping_province`, `shipping_zipcode`, `shipping_country`, `created_at`, `updated_at`) VALUES
(1, 3, 'Blk 4 Lot 5, Villa Alessandra, Ylaya', 'Talamban', 'Cebu City', 'Cebu', '6000', 'PH', 0, NULL, NULL, NULL, NULL, NULL, 'AD', '2018-10-17 20:56:49', '2018-10-17 20:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` varchar(1) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_methods`
--

CREATE TABLE `delivery_methods` (
  `delivery_method_id` int(11) NOT NULL,
  `delivery_method_name` varchar(50) NOT NULL,
  `delivery_method_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_number` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_13_003040_create_shoppingcart_table', 2),
(4, '2018_10_15_002930_create_customers_address_table', 2),
(5, '2018_10_15_022414_alter_customer_table', 2),
(6, '2018_10_16_061946_create_countries_table', 3),
(7, '2018_10_17_075456_alter_customers_address_table', 4),
(8, '2018_10_17_171110_alter_customer_table', 5),
(9, '2018_10_18_061323_alter_customer_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `body_of_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sku` int(11) NOT NULL,
  `delivery_method_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `date_updated` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `total_amount` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date_paid` date NOT NULL,
  `reference_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL,
  `payment_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(5) NOT NULL,
  `sub_category_id` int(11) NOT NULL DEFAULT '0',
  `thumb` varchar(50) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `originalfilename` varchar(255) DEFAULT NULL,
  `filesize` int(16) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `sub_category_id`, `thumb`, `product_image`, `originalfilename`, `filesize`, `product_name`, `product_desc`) VALUES
(12, 2, 0, NULL, 'products/images/u44szTVbnUl1Tqm69qY4vU0UPDtFgvppRvKsk7S3.jpeg', 'couple watch2.jpg', 110324, 'Couple Watch', 'A watch for couples.'),
(13, 2, 1, NULL, 'products/images/WaRaLntveSilqjyjTFE0n2VFoI7yhthT8lfPAH56.jpeg', 'handy mini fan1.jpg', 73692, 'Handy Mini Fan', 'A fan you can carry anywhere at all.'),
(14, 3, 0, NULL, 'products/images/bxhtrLHw8osD1rMuHUOgOxkZOgwIWJxLXJyzYk8j.jpeg', '2in1 Set (Dress+Blazer).jpg', 64281, 'Dress+Blazier', '2 in 1 Dress plus Blazer.'),
(15, 3, 0, NULL, 'products/images/Jt2BWJFSYjdEcllGhg4EsRFeJtyd3NZ0W7SWCHPL.jpeg', '_45730c5e73f3a311ede8d434bc97b371.png', 82758, 'Red Shirt Lives Matter', 'A statement for red shirts.'),
(16, 5, 0, NULL, 'products/images/OzNbNelQkKEY1rG2moAY8B41RnZlKLGMpOT3DNW9.jpeg', '5in1 Set2.jpg', 100879, 'Backpack', '5in1 set backpack.'),
(17, 2, 1, NULL, 'products/images/3tKbmSQ44P1auWNrDmBeINGaCzwwtSW5SpXrwApI.jpeg', 'couple watch2.jpg', 110324, 'Bad Girl Jacket', 'Jacket for girls with hoodie.');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(3) NOT NULL,
  `size` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`, `description`) VALUES
(1, 'S', 'Small'),
(2, 'M', 'Medium'),
(3, 'L', 'Large'),
(4, 'XL', 'Extra Large'),
(5, 'XLL', 'Extrrra Large');

-- --------------------------------------------------------

--
-- Table structure for table `sku`
--

CREATE TABLE `sku` (
  `id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL DEFAULT '0',
  `size_id` int(11) NOT NULL DEFAULT '0',
  `number_of_items` int(11) NOT NULL,
  `unit_price` decimal(16,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sku`
--

INSERT INTO `sku` (`id`, `sku`, `product_id`, `color_id`, `size_id`, `number_of_items`, `unit_price`) VALUES
(1, '22320000000012', 12, 3, 2, 24, '234.00'),
(2, '21500000000013', 13, 5, 0, 26, '156.00'),
(3, '30430000000014', 14, 4, 3, 25, '300.00'),
(4, '30340000000015', 15, 3, 4, 25, '400.00'),
(5, '50300000000016', 16, 3, 0, 5, '250.00'),
(6, '21420000000017', 17, 4, 2, 30, '280.00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `sub_category_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_desc`) VALUES
(1, 2, 'Sub Cat for Accessories', 'adasdfadfsdaf'),
(2, 2, 'Another Sub Cat for Accessories', 'sdfasdfasddf'),
(3, 5, 'Sub Cat for Bag', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE `user_categories` (
  `user_category_id` int(11) NOT NULL,
  `user_category_name` varchar(50) NOT NULL,
  `user_category_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customers_address`
--
ALTER TABLE `customers_address`
  ADD PRIMARY KEY (`customers_address_id`),
  ADD UNIQUE KEY `customers_address_customer_id_unique` (`customer_id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  ADD PRIMARY KEY (`delivery_method_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`user_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customers_address`
--
ALTER TABLE `customers_address`
  MODIFY `customers_address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  MODIFY `delivery_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sku`
--
ALTER TABLE `sku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `user_category_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
