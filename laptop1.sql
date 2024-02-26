-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 03:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `qty` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `brand`, `img`) VALUES
(64, 'Acer', '65c22268df0f76.07753223.png'),
(65, 'ASUS', '65c222768fec41.66411222.jpg'),
(66, 'Apple', '65c81e73b9b6d5.64994258.png'),
(67, 'Dell', '65c22294c36419.38445390.png'),
(69, 'HP', '65c222c6abcc39.79385473.png'),
(70, 'Lenovo', '65c222dc706072.54369105.png'),
(71, 'LG', '65c81e51d4e559.53507855.png'),
(72, 'SAMSUNG', '65c2233964df74.19314070.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commentbox`
--

CREATE TABLE `commentbox` (
  `id` bigint(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `note` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentbox`
--

INSERT INTO `commentbox` (`id`, `email`, `note`, `created_at`) VALUES
(33, 'ppa@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipiscing elit, faucibus fames semper feugiat risus interdum ultricies viverra, consequat est sed habitasse aenean quisque. Dis felis ultricies etiam praesent magnis magna platea urna ad penatibus, mi montes a vivamus cubilia facilisi fermentum ornare orci et quis, mattis malesuada mus natoque proin eget nascetur fusce euismod. Quam tristique augue conubia torquent curabitur phasellus cubilia purus molestie non sagittis, pharetra velit hendrerit pretium pulvinar aptent iaculis morbi vulputate. Sociis rhoncus congue inceptos luctus hac ornare imperdiet pharetra torquent dictumst, netus sem vitae leo scelerisque senectus dignissim lectus molestie, vestibulum mi cras tincidunt commodo ut mollis urna duis. Facilisis eu vitae consequat mi eget duis pretium eleifend, venenatis et vulputate rhoncus himenaeos potenti interdum proin, molestie inceptos integer id egestas mus donec.', '2024-01-27 08:39:32'),
(34, 'love@gmail.com', 'Sending Love', '2024-01-27 08:39:45'),
(35, 'neymar@gmail.com', 'Habitasse vulputate magnis taciti purus dapibus lacinia eros urna duis egestas, pretium curabitur hendrerit mi mollis luctus at curae sociis netus, laoreet proin aliquet porta fames vivamus elementum cubilia facilisi. Montes interdum non diam risus platea consequat, rutrum elementum suscipit aenean sagittis at, conubia id morbi neque primis.', '2024-01-27 08:41:39'),
(36, 'SumailKing@gmail.com', 'King, Sumail, from Gate Nigma', '2024-01-27 08:42:40'),
(37, 'ppa@gmail.com', 'orci varius ridiculus sem dui malesuada vestibulum. Fringilla volutpat parturient eu pellentesque tempor iaculis hac vivamus laoreet condimentum aliquam, sociosqu magnis arcu ante nullam montes torquent malesuada justo sagittis. Aptent euismod lectus conubia tincidunt quam primis placerat, leo vehicula metus aliquam ad parturient phasellus, id penatibus vitae pulvinar viverra sem. Vivamus lacinia dui semper tempus dis, ligula facilisi scelerisque nascetur, fermentum nullam praesent velit. Sociis etiam enim pellentesque habitant cursus mi nisl nibh, dis auctor semper tincidunt euismod nostra feugiat aliquam condimentum, ultricies tellus curae vehicula ullamcorper litora scelerisque. Odio per et tempus auctor quam venenatis natoque quis, mollis vestibulum fames metus torquent pretium. Semper justo torquent curae cras rutrum orci nostra, consequat duis venenatis rhoncus lacus cum volutpat elementum, integer fusce netus ultrices sapien pulvinar.', '2024-01-27 08:50:39'),
(38, 'thazin@gmail.com', 'Home services', '2024-02-03 03:46:30'),
(39, 'thazin@gmail.com', 'thank you', '2024-02-03 13:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `hot_sale`
--

CREATE TABLE `hot_sale` (
  `id` int(20) NOT NULL,
  `carousel_name` varchar(225) NOT NULL,
  `carousel_description` longtext NOT NULL,
  `carousel_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hot_sale`
--

INSERT INTO `hot_sale` (`id`, `carousel_name`, `carousel_description`, `carousel_image`, `created_at`) VALUES
(15, 'Pay Day Sale Hot Items', 'Pay Day Sale Hot Items', '65d899d4031765.50702407.jpg', '2024-02-06 14:44:26'),
(16, 'New Arrival Acer Laptop with Some Specification', 'New Arrival Acer Laptop with Some Specification', '65d899be3bc047.94909864.jpg', '2024-02-07 08:32:45'),
(17, 'Cash Back Sale', 'Cash Back Sale', '65d8999eeb48a2.01652864.png', '2024-02-07 08:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `orderlists`
--

CREATE TABLE `orderlists` (
  `orderid` int(50) NOT NULL,
  `product_id` int(15) NOT NULL,
  `quantity` int(30) NOT NULL,
  `total_amount` int(30) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderlists`
--

INSERT INTO `orderlists` (`orderid`, `product_id`, `quantity`, `total_amount`, `created_at`, `updated_at`) VALUES
(0, 35, 1, 3146, '2024-01-24 08:26:40.127779', '2024-01-24 08:26:40.127779'),
(0, 34, 1, 1300, '2024-01-24 08:26:40.128872', '2024-01-24 08:26:40.128872'),
(0, 36, 1, 1300, '2024-01-24 12:50:52.357873', '2024-01-24 12:50:52.357873'),
(0, 35, 1, 3146, '2024-01-24 12:50:52.362751', '2024-01-24 12:50:52.362751'),
(0, 34, 2, 2600, '2024-01-24 13:20:12.665238', '2024-01-24 13:20:12.665238'),
(0, 36, 2, 2600, '2024-01-24 13:20:12.668859', '2024-01-24 13:20:12.668859'),
(0, 34, 1, 1300, '2024-01-24 13:46:21.263041', '2024-01-24 13:46:21.263041'),
(0, 36, 2, 2600, '2024-01-24 13:47:44.854481', '2024-01-24 13:47:44.854481'),
(0, 35, 1, 3146, '2024-01-24 13:47:44.858381', '2024-01-24 13:47:44.858381'),
(25, 35, 2, 6292, '2024-01-24 14:01:33.480686', '2024-01-24 14:01:33.480686'),
(26, 35, 4, 12584, '2024-01-24 15:55:36.575083', '2024-01-24 15:55:36.575083'),
(26, 34, 1, 1300, '2024-01-24 15:55:36.578498', '2024-01-24 15:55:36.578498'),
(26, 36, 1, 1300, '2024-01-24 15:55:36.580389', '2024-01-24 15:55:36.580389'),
(26, 37, 1, 3146, '2024-01-24 15:55:36.583395', '2024-01-24 15:55:36.583395'),
(27, 36, 1, 1300, '2024-01-26 04:07:11.425919', '2024-01-26 04:07:11.425919'),
(27, 38, 1, 2312, '2024-01-26 04:07:11.427199', '2024-01-26 04:07:11.427199'),
(28, 34, 1, 1300, '2024-01-26 04:54:04.738046', '2024-01-26 04:54:04.738046'),
(28, 35, 3, 9438, '2024-01-26 04:54:04.742958', '2024-01-26 04:54:04.742958'),
(28, 36, 2, 2600, '2024-01-26 04:54:04.744583', '2024-01-26 04:54:04.744583'),
(29, 34, 1, 1300, '2024-01-26 04:59:24.281918', '2024-01-26 04:59:24.281918'),
(29, 35, 1, 3146, '2024-01-26 04:59:24.283791', '2024-01-26 04:59:24.283791'),
(30, 39, 1, 100, '2024-01-26 05:03:53.651290', '2024-01-26 05:03:53.651290'),
(31, 35, 1, 3146, '2024-01-26 05:20:34.365700', '2024-01-26 05:20:34.365700'),
(31, 36, 1, 1300, '2024-01-26 05:20:34.372138', '2024-01-26 05:20:34.372138'),
(31, 37, 1, 3146, '2024-01-26 05:20:34.373413', '2024-01-26 05:20:34.373413'),
(32, 35, 1, 3146, '2024-01-26 16:09:26.040893', '2024-01-26 16:09:26.040893'),
(32, 34, 1, 1300, '2024-01-26 16:09:26.043817', '2024-01-26 16:09:26.043817'),
(33, 35, 1, 3146, '2024-01-27 05:13:37.215732', '2024-01-27 05:13:37.215732'),
(34, 34, 2, 2600, '2024-02-03 04:04:54.733782', '2024-02-03 04:04:54.733782'),
(34, 35, 2, 6292, '2024-02-03 04:04:54.736102', '2024-02-03 04:04:54.736102'),
(35, 34, 1, 2, '2024-02-03 04:48:22.809937', '2024-02-03 04:48:22.809937'),
(35, 35, 1, 6, '2024-02-03 04:48:22.814185', '2024-02-03 04:48:22.814185'),
(36, 34, 2, 5444400, '2024-02-03 04:59:44.668044', '2024-02-03 04:59:44.668044'),
(37, 35, 3, 19763172, '2024-02-03 06:07:36.923303', '2024-02-03 06:07:36.923303'),
(38, 35, 2, 13175448, '2024-02-03 13:16:56.060271', '2024-02-03 13:16:56.060271'),
(38, 34, 1, 2722200, '2024-02-03 13:16:56.070136', '2024-02-03 13:16:56.070136'),
(38, 36, 1, 2722200, '2024-02-03 13:16:56.074542', '2024-02-03 13:16:56.074542'),
(38, 38, 1, 4841328, '2024-02-03 13:16:56.078436', '2024-02-03 13:16:56.078436'),
(39, 34, 2, 5444400, '2024-02-03 13:35:40.774279', '2024-02-03 13:35:40.774279'),
(39, 35, 1, 6587724, '2024-02-03 13:35:40.776343', '2024-02-03 13:35:40.776343'),
(39, 36, 1, 2722200, '2024-02-03 13:35:40.778413', '2024-02-03 13:35:40.778413'),
(40, 35, 1, 6587724, '2024-02-04 06:22:37.563952', '2024-02-04 06:22:37.563952'),
(41, 34, 1, 2722200, '2024-02-04 08:10:12.888404', '2024-02-04 08:10:12.888404'),
(42, 34, 1, 2722200, '2024-02-04 08:13:01.274770', '2024-02-04 08:13:01.274770'),
(43, 34, 3, 8166600, '2024-02-04 08:19:20.709590', '2024-02-04 08:19:20.709590'),
(43, 35, 1, 6587724, '2024-02-04 08:19:20.711857', '2024-02-04 08:19:20.711857'),
(43, 36, 1, 2722200, '2024-02-04 08:19:20.718490', '2024-02-04 08:19:20.718490'),
(43, 37, 1, 6545844, '2024-02-04 08:19:20.719864', '2024-02-04 08:19:20.719864'),
(44, 35, 1, 6587724, '2024-02-04 09:24:01.624201', '2024-02-04 09:24:01.624201'),
(44, 34, 1, 2722200, '2024-02-04 09:24:01.625707', '2024-02-04 09:24:01.625707'),
(45, 2, 1, 0, '2024-02-06 06:40:13.030160', '2024-02-06 06:40:13.030160'),
(45, 34, 2, 5444400, '2024-02-06 06:40:13.032374', '2024-02-06 06:40:13.032374'),
(45, 40, 2, 13175448, '2024-02-06 06:40:13.034148', '2024-02-06 06:40:13.034148'),
(46, 39, 1, 209400, '2024-02-06 06:42:55.652256', '2024-02-06 06:42:55.652256'),
(47, 39, 1, 209400, '2024-02-06 06:47:53.855606', '2024-02-06 06:47:53.855606'),
(48, 39, 1, 209400, '2024-02-06 07:11:19.426371', '2024-02-06 07:11:19.426371'),
(54, 49, 1, 2091906, '2024-02-06 14:17:22.738678', '2024-02-06 14:17:22.738678'),
(61, 49, 1, 2091906, '2024-02-08 12:54:31.440050', '2024-02-08 12:54:31.440050'),
(62, 49, 1, 2091906, '2024-02-08 13:04:02.803342', '2024-02-08 13:04:02.803342'),
(63, 49, 1, 2091906, '2024-02-08 13:24:10.819361', '2024-02-08 13:24:10.819361'),
(64, 43, 1, 4585470, '2024-02-08 13:31:34.741627', '2024-02-08 13:31:34.741627'),
(65, 49, 1, 2091906, '2024-02-08 13:33:26.092592', '2024-02-08 13:33:26.092592'),
(66, 48, 1, 1852122, '2024-02-08 13:33:48.112297', '2024-02-08 13:33:48.112297'),
(66, 47, 1, 795699, '2024-02-08 13:33:48.115290', '2024-02-08 13:33:48.115290'),
(67, 49, 1, 2091906, '2024-02-08 14:12:22.820815', '2024-02-08 14:12:22.820815'),
(67, 48, 1, 1852122, '2024-02-08 14:12:22.823578', '2024-02-08 14:12:22.823578'),
(68, 49, 1, 2091906, '2024-02-10 08:47:43.595350', '2024-02-10 08:47:43.595350'),
(69, 49, 1, 2091906, '2024-02-11 01:14:53.375034', '2024-02-11 01:14:53.375034'),
(69, 47, 1, 795699, '2024-02-11 01:14:53.383738', '2024-02-11 01:14:53.383738');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deli_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_number` varchar(255) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `status` int(20) NOT NULL,
  `sendDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `user_id`, `deli_name`, `phone`, `address`, `payment_type`, `payment_number`, `orderDate`, `status`, `sendDate`) VALUES
(54, 69, 'ppa', '09778965412', 'Yangon, Myanmar', 'Kpay', '09123456780', '2024-02-06', 1, '2024-02-07'),
(62, 69, 'ppa', '09250058931', 'gg', 'Kpay', '8521479630', '2024-02-08', 0, '0000-00-00'),
(63, 69, 'ppa', '09250058931', 'heaven', 'WavePay', '09123456780', '2024-02-08', 0, '0000-00-00'),
(64, 73, 'PhoePyae', '09456987231', 'Heaven ', 'Kpay', '09548621793', '2024-02-08', 0, '0000-00-00'),
(65, 73, 'PhoePyae', '09456987231', 'GG', 'Kpay', '0912345678', '2024-02-08', 0, '0000-00-00'),
(66, 73, 'PhoePyae', '09456987231', 'Hello', 'Kpay', '09548621793', '2024-02-08', 0, '0000-00-00'),
(67, 73, 'PhoePyae', '09456987231', 'Yangon, Myanmar', 'Kpay', '09548621793', '2024-02-08', 1, '2024-02-10'),
(68, 69, 'ppa', '09250058931', 'Yangon, Myanmar', 'WavePay', '09123456780', '2024-02-10', 0, '0000-00-00'),
(69, 73, 'PhoePyae', '09456987231', 'Putao, MyintKyiNa, Kachin State', 'WavePay', '09123456780', '2024-02-11', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `promo` varchar(255) DEFAULT NULL,
  `processor` varchar(255) NOT NULL,
  `memory` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `graphics` varchar(255) NOT NULL,
  `price` int(30) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `promo`, `processor`, `memory`, `storage`, `graphics`, `price`, `description`, `image`, `created_at`) VALUES
(42, '64', 'Aspire 5G Intel', 'New Arrival', 'Intel Core i7-1255U ', '8 GB', '512 GB', '2GB VRAM', 3244070, 'CPU: Intel® Core i7-1255U Processor (12MB Cache, 2.0 GHz up to 4.7 GHz)\r\nGraphic: NVIDIA® Geforce® MX550 with 2GB VRAM\r\nMemory: 8GB DDR4 Memory 3200 MHz (One slot free up to 16GB)\r\nStorage: 512GB PCle NVMe SSD (One slot free PCIe SSD)\r\nDisplay: 15.6\" display with FHD Acer ComfyView\r\nWebcam: 720P HD Video at 30Fps\r\nWireless and Networking: HDMI, GBLAN, USB 3.0 x 1, 3.2 x 2, WiFi6E + BT\r\nBattery: 50Wh 3-cell Li-ion battery\r\nColor: Steel Gray\r\nWeight: 1.8kg (3.9Lbs)\r\n', '65c225c172bfe3.66856482.png', '2024-02-06 12:27:45'),
(43, '65', 'Asus Zenbook Pro 16X OLED ', NULL, 'Intel® Core™ i7-12700H ', '16GB LPDDR5 ', '1TB', '6GB GDDR6', 4585470, 'Asus ( Asus Zenbook Pro 16X OLED (UX7602ZM-ME022W) i7-12700H Laptop )\r\nCPU / Processor: Intel® Core™ i7-12700H Processor 2.3 GHz (24M Cache, up to 4.7 GHz) ,\r\nMemory: 16GB LPDDR5 on board\r\nStorage: 1TB M.2 NVMe™ PCIe® 4.0 Performance SSD\r\nDisplay Screen: 16.0-inch, 4K (3840 x 2400) OLED \r\nGraphic Card: NVIDIA® GeForce® RTX™ 3060 Laptop GPU,  6GB GDDR6\r\nOperation System: Windows 11 Home\r\nSoftware Preload Microsoft office Home & Student 2021\r\nKeyboard / Touchpad\r\nBacklit Chiclet Keyboard Per-Key RGBW with N-key Rllover, 1.4mm Key-travel, Support NumberPad\r\nCamera720p HD camera\r\nAudioSmart Amp Technology ,\r\nBuilt-in 4-way stereo speakers ,\r\nBuilt-in array microphone ,\r\nharman/kardon (Premium) ,\r\nwith Cortana and Alexa voice-recognition support\r\nNetwork / Connectivity  \r\nWi-Fi 6(802.11ax)+Bluetooth 5.0 (Dual band) 2*2Fingerprint\r\nYesInterface\r\n1x USB 3.2 Gen 2 Type-A ,\r\n2x Thunderbolt™ 4 supports display / power delivery ,\r\n1x HDMI 2.1 ,\r\n1x 3.5mm Combo Audio Jack ,\r\n1x DC-in ,\r\nSD Express 7.0 card reader\r\nBattery96WHrs, 3S2P, 6-cell Li-ion\r\nDimensions\r\n35.50 x 25.10 x 1.69 ~ 1.78 cm (WxDxH)Weight\r\n2.40kg\r\n', '65c22d2d3398d4.45008413.jpg', '2024-02-06 12:50:22'),
(44, '64', 'Acer Extensa 15G Ex 215-33-36L0', NULL, 'Intel Core i3 N 305', '8 GB', '256 GB SSD', '8 GB', 1620270, 'Acer Extensa 15G Ex215-33-36L0 (Intel Core i3 N305 Processor) Silver Laptop, Microsoft Office 365 Webcam,', '65c23025a51912.84908148.jpg', '2024-02-06 13:12:05'),
(45, '70', 'ThinkBook 14 G5 IRL', NULL, 'Intel® CoreTM i5-1335U', '8 GB', '512 GB', 'Integrated Intel® Iris Xe Graphics', 2502770, 'Model: ThinkBook 14 G5 IRL\r\nMTM: 21JC0010646\r\nSKU: NB0010646\r\nProcessor: Intel® CoreTM i5-1335U, \r\nMemory: 8GB Soldered DDR4-3200 + 1 Slot (up to 16GB)\r\nStorage: 512GB SSD M.2 2280 PCIe® 4.0x4 NVMe®\r\nOS: None\r\nDisplay: 14\" FHD (1920x1080) IPS 300nits Anti-glare, 45% NTSC\r\nCamera: HD 720p with Privacy Shutter\r\nOthers: Backlit KB Fingerprint\r\nGraphic Card: Integrated Intel® Iris Xe Graphics\r\nWireless Card: Wi-Fi® 6, 11ax 2x2 + BT5.1\r\nStandard Ports: 1x Card reader, 1x Ethernet (RJ-45) 1x HDMI® 2.1, up to 4K/60Hz 1x Headphone/microphone combo jack (3.5mm)1x ThunderboltTM 4/ USB4® 40Gbps 1xUSB 3.2 Gen 1, 1x USB 3.2 Gen 1 (Always On), 1x USB-C 3.2 Gen 2\r\nBattery: 3Cell 45WH\r\nColor: Mineral Grey', '65c2342cc4dd85.11641771.jpg', '2024-02-06 13:17:53'),
(46, '69', 'HP 15s-fq5072TU', 'Cash Back', 'Intel Core i7-1255U ', '8 GB', '512 GB ', 'Integrated Intel® Iris Xe Graphics', 2686860, 'HP 15s-fq5072TU\r\nWindows 11 Home\r\nIntel Core i7-1255U Processor\r\n8 GB DDR4-3200MHz Ram\r\n512 GB PCIe® NVMe™ M.2 SSD\r\nIntel Iris Xe Graphics\r\n15.6\" FHD (1920 x 1080), IPS\r\n3-cell, 41 Whr Battery\r\n3208770 Kyats', '65c23351bdd434.14253998.jpg', '2024-02-06 13:25:37'),
(47, '67', 'Inspiron 15 ', '', '12th Gen Intel® Core™ i3-1215U', '8 GB DDR4', '512 GB SSD', 'Intel® UHD ', 795699, 'Inspiron 15 \r\n12th Gen Intel® Core™ i3-1215U\r\nWindows 11 Home\r\nIntel® UHD Graphics\r\n8 GB DDR4\r\n512 GB SSD\r\n15.6-in. display Full HD (1920X1080)\r\nStarting at 3.63 lbs \r\n15.6-inch laptop made for everyday essential computing. Featuring a stylish design and up to 12th Gen Intel® Core™ processors.', '65c23571648d18.47104799.jpg', '2024-02-06 13:34:41'),
(48, '71', '15Z90Q-P.AAS7U1', NULL, 'Intel 12th Gen Core i7 ', '16 GB', '512GB SSD', 'Integrated Intel® Iris Xe', 1852122, 'LG gram (2022) Laptop 15Z90Q \r\nIntel 12th Gen Core i7, \r\n16GB RAM, \r\n512GB SSD, \r\nWindows 11, Gray', '65c2369c93fb52.96922847.jpg', '2024-02-06 13:39:40'),
(49, '66', 'MacBook Air 13”', '', 'M1 chip', '16GB', '2TB', '7-core GPU  4K', 2091906, 'MacBook Air\r\n13”\r\nM1 chip\r\n13.3-inch Retina display5\r\nApple M1 chip\r\n8GB or 16GB unified memory\r\n256GB to 2TB storage3\r\nUp to 18 hours battery life1\r\nTouch ID', '65c2399a315153.94310790.jpg', '2024-02-06 13:52:26'),
(50, '66', 'Macbook Pro 16', 'Hot Item', 'M3 max', '48 GB', '5 TB SSD', 'Retina display', 8400000, 'Macbook Pro\r\nM3 max processor\r\nMemory 48 GB\r\nStorage 5 TB\r\nLiquid Retina XDR Display', '65d8a03042bd99.13452178.jpg', '2024-02-23 06:13:52'),
(51, '70', 'Legion Gaming Laptop', 'Hot Item', 'Ryzen-5', '8 GB', '512 GB', 'NVIDIA GeForce RTX 3050 Ti', 2050000, 'The best laptop for gaming we have tested in the cheap category is the Lenovo IdeaPad Gaming 3 (2021). Though entirely plastic, this 15.6-inch model feels surprisingly sturdy, especially for a model in its price range. For a little over $800 USD, you can get a configuration with an AMD Ryzen 5 5600H CPU, an NVIDIA GeForce RTX 3050 Ti GPU, 8GB of RAM, and 512GB of storage. This CPU and GPU combination can deliver a solid 60 fps gaming experience at 1080p with most titles. 8GB of RAM is not ideal for gaming, and you will quickly run out of space with only 512GB of storage. Thankfully, you can upgrade these components yourself later on.', '65d89f7939cb34.87853257.jpg', '2024-02-23 13:31:14'),
(52, '64', 'Aspire 3 15.6', 'Hot Item', 'Core i3', '8 GB', '512 GB', 'Intel UHD Graphic', 1350000, 'Core i3 15.6”\r\n8 GB 512 GB\r\nIntel UHD Graphic\r\nBluetooth, Web Camera\r\nWireless LAN(AX), HDMI, USB 3.2, Type C\r\n3 Cells 40Wh Li-Po Battery\r\nWeight 1.7 Kg', '65d8a7b39879c7.97282854.jpg', '2024-02-23 14:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `town` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `town`, `img`, `role`, `created_at`) VALUES
(68, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '09250058931', 'Sanchaung', '65c73babd20a5-Array', 'Admin', '2024-01-28 06:07:08'),
(69, 'ppa', 'ppa@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '09250058931', 'Latha', '65b7ab985735f-Array', 'User', '2024-01-29 13:43:03'),
(70, 'Thazin', 'thazin15@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '09420141608', 'Lanmadaw', '65d6095ba2aff-Array', 'User', '2024-02-03 03:26:43'),
(73, 'PhoePyae', 'pyae@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '09456987231', 'Sanchaung', NULL, 'User', '2024-02-07 08:30:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentbox`
--
ALTER TABLE `commentbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hot_sale`
--
ALTER TABLE `hot_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `commentbox`
--
ALTER TABLE `commentbox`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `hot_sale`
--
ALTER TABLE `hot_sale`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
