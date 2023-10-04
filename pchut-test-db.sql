-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 08:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pchut`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_size`
--

CREATE TABLE `case_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_size`
--

INSERT INTO `case_size` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Veliko', NULL, NULL),
(2, 'Srednje', NULL, NULL),
(3, 'Mini', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productable_id` bigint(20) UNSIGNED NOT NULL,
  `productable_type` varchar(255) NOT NULL,
  `product_type_cro` varchar(255) NOT NULL,
  `model` varchar(45) NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `description` text NOT NULL,
  `manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `productable_id`, `productable_type`, `product_type_cro`, `model`, `price`, `discount`, `description`, `manufacturer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Keyboard', 'Tipkovnica', 'BlackWidow V4 Pro', 200.00, 250.00, 'Empower your play with a centerpiece that elevates your entire setup. Enter the next phase of battlestation evolution with the ultimate mechanical gaming keyboard. Take full command with a set of features designed for advanced control, and enhance your immersion with full-blown Razer Chroma RGB. ', 29, '2023-09-25 12:32:36', '2023-09-25 12:32:36'),
(2, 1, 'App\\Models\\GPU', 'Grafička kartica', 'GeForce RTX4090', 2300.99, NULL, 'Graphics Processing GeForce RTX 4090\nCUDA Cores 16384\nMemory Clock 21 Gbps\nMemory Size 24 GB\nMemory Type GDDR6X\nMemory Bus 384 bit\nCard Bus PCI-E 4.0\nDigital max resolution 7680x4320\nMulti-view 4\nDirectX 12 Ultimate\nOpenGL 4.6\nRecommended PSU 1000W\nPower Connectors 16 pin x1\nOutput\nDisplayPort 1.4 x3\nHDMI 2.1 x1', 6, '2023-09-26 05:32:06', '2023-09-26 05:32:06'),
(3, 2, 'App\\Models\\GPU', 'Grafička kartica', 'GeForce RTX4090', 2300.99, NULL, 'Graphics Processing GeForce RTX 4090\nCUDA Cores 16384\nMemory Clock 21 Gbps\nMemory Size 24 GB\nMemory Type GDDR6X\nMemory Bus 384 bit\nCard Bus PCI-E 4.0\nDigital max resolution 7680x4320\nMulti-view 4\nDirectX 12 Ultimate\nOpenGL 4.6\nRecommended PSU 1000W\nPower Connectors 16 pin x1\nOutput\nDisplayPort 1.4 x3\nHDMI 2.1 x1', 6, '2023-09-26 05:48:32', '2023-09-26 05:48:32'),
(4, 3, 'App\\Models\\GPU', 'Grafička kartica', 'GeForce RTX4090', 1799.00, NULL, 'Graphics Processing GeForce RTX 4090\nCUDA Cores 16384\nMemory Clock 21 Gbps\nMemory Size 24 GB\nMemory Type GDDR6X\nMemory Bus 384 bit\nCard Bus PCI-E 4.0\nDigital max resolution 7680x4320\nMulti-view 4\nDirectX 12 Ultimate\nOpenGL 4.6\nRecommended PSU 1000W\nPower Connectors 16 pin x1\nOutput\nDisplayPort 1.4 x3\nHDMI 2.1 x1', 5, '2023-09-26 05:48:35', '2023-09-26 05:48:35'),
(5, 4, 'App\\Models\\GPU', 'Grafička kartica', 'GeForce RTX4080', 2300.99, NULL, 'Graphics Processing GeForce RTX 4090\nCUDA Cores 16384\nMemory Clock 21 Gbps\nMemory Size 24 GB\nMemory Type GDDR6X\nMemory Bus 384 bit\nCard Bus PCI-E 4.0\nDigital max resolution 7680x4320\nMulti-view 4\nDirectX 12 Ultimate\nOpenGL 4.6\nRecommended PSU 1000W\nPower Connectors 16 pin x1\nOutput\nDisplayPort 1.4 x3\nHDMI 2.1 x1', 5, '2023-09-26 05:48:37', '2023-09-26 05:48:37'),
(6, 2, 'App\\Models\\Keyboard', 'Tipkovnica', 'RunnerFast X3', 250.99, NULL, 'nekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisno nekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisno', 1, '2023-09-27 12:07:37', '2023-09-27 12:07:37'),
(7, 2, 'App\\Models\\Motherboard', 'Matična ploča', 'ROG Maximus Z790 Hero DDR5', 850.00, NULL, 'wsuper kul maticna ploca nije skupo ide gas', 5, '2023-09-28 05:49:35', '2023-09-28 05:49:35'),
(8, 1, 'App\\Models\\CPU', 'Procesor', 'Ryzen 9', 900.00, NULL, 'procesor opis', 3, '2023-09-28 05:50:05', '2023-09-28 05:50:05'),
(9, 2, 'App\\Models\\CPU', 'Procesor', 'Ryzen 7', 799.90, NULL, 'Ultra-Responsive\r\nGet a PC with the performance you need with up to 8 cores fueled by the world’s most advanced 7nm processor core technology. With these processors delivering a generational leap in performance over the previous gen, the AMD Ryzen 5000 G-Series Desktop Processors with Radeon Graphics deliver ultra-fast responsiveness and multi-threaded performance for mainstream PCs.', 3, '2023-09-28 05:50:51', '2023-09-28 05:50:51'),
(10, 3, 'App\\Models\\CPU', 'Procesor', 'Core i9', 530.99, NULL, 'Power up your productivity, gaming, and content creation experiences by installing the Intel Core i9-11900K 3.5 GHz Eight-Core LGA 1200 Processor into your computer system. Built using a 14nm process, this 11th generation desktop processor features a base clock frequency of 3.5 GHz and a 5.2 GHz Turbo Boost Max 3.0 frequency with 16MB of cache, eight cores, and sixteen threads for fast and reliable performance. The Core i9-11900K also includes support for PCI Express 4.0 and dual-channel DDR4 memory at 3200 MHz to help run and multitask a variety of demanding applications and games using technologies such as built-in AI acceleration. Performance can be further enhanced with overclocking and by installing Intel Optane memory to cache frequently accessed data. The i9-11900K features integrated Intel UHD 750 Graphics driven by the powerful Xe architecture.', 1, '2023-09-28 05:50:52', '2023-09-28 05:50:52'),
(12, 5, 'App\\Models\\CPU', 'Procesor', 'Core i7', 370.99, NULL, 'Built for the Next Generation of Gaming. Game and multitask without compromise powered by Intel’s performance hybrid architecture on an unlocked processor.\r\nDiscrete graphics required. Compatible with Intel 600 series and 700 series chipset-based motherboards. Intel Core i7 3.60 GHz processor offers more cache space and the hyper-threading architecture delivers high performance for demanding applications with better onboard graphics and faster turbo boost. The Socket LGA-1700 socket allows processor to be placed on the PCB without soldering. 11 MB L2 and 25 MB L3 cache offers supreme performance for computation intensive apps. Intel 7 Architecture enables improved performance per watt and micro architecture makes it power-efficient\r\n', 1, '2023-09-28 05:50:54', '2023-09-28 05:50:54'),
(13, 3, 'App\\Models\\Motherboard', 'Matična ploča', 'Z790 Gaming X AX DDR5', 349.99, NULL, 'wsuper kul maticna ploca nije skupo ide gas', 6, '2023-09-28 05:50:56', '2023-09-28 05:50:56'),
(14, 4, 'App\\Models\\Motherboard', 'Matična ploča', 'Prime B550-Plus', 200.00, NULL, 'wsuper kul maticna ploca nije skupo ide gas', 5, '2023-09-28 05:50:57', '2023-09-28 05:50:57'),
(15, 5, 'App\\Models\\Motherboard', 'Matična ploča', 'B650M PG Riptide', 199.90, NULL, 'DDR5 Memory with Protection Circuit\r\nDue to the unique electrical architecture of DDR5 DIMM, there’s a high risk of damaging the memory module if AC power isn’t disconnected properly during removal or installation. To prevent this, ASRock has implemented a trouble free protection circuit on every DDR5 motherboard, lowers the risk of damaging your memory module.Polychrome RGB.\r\nIn addition to the built-in RGB illumination, it also features onboard RGB headers and an addressable RGB header that allow motherboard to be connected to compatible LED devices such as strip, CPU fans, coolers, chassis and so on. Users may also synchronize RGB LED devices across the Polychrome RGB Sync-certified accessories to create their own unique lighting effects.', 4, '2023-09-28 05:50:58', '2023-09-28 05:50:58'),
(16, 3, 'App\\Models\\Storage', 'Pohrana', 'X10 Pro Portable', 320.00, NULL, 'Crucial X10 Pro Portable SSD Elevate your video editing experience with the Crucial X10 Pro SSD: the portable drive that packs a palm-sized punch. Blaze through workload without dropping frames and even edit, trim and render directly from the drive.', 20, '2023-09-28 05:51:28', '2023-09-28 05:51:28'),
(17, 4, 'App\\Models\\Storage', 'Pohrana', 'T7 Shield', 179.00, NULL, 'jako dobro spremanje za tvoj komp', 23, '2023-09-28 05:51:31', '2023-09-28 05:51:31'),
(18, 3, 'App\\Models\\Keyboard', 'Tipkovnica', 'RunnerFast X3', 250.99, NULL, 'nekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisno nekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisnonekaj opisno', 1, '2023-10-03 14:59:23', '2023-10-03 14:59:23'),
(19, 6, 'App\\Models\\Motherboard', 'Matična ploča', 'B650 PG Lightning', 330.99, NULL, 'DDR5 Memory with Protection Circuit. Due to the unique electrical architecture of DDR5 DIMM, there’s a high risk of damaging the memory module if AC power isn’t disconnected properly during removal or installation. To prevent this, ASRock has implemented a trouble free protection circuit on every DDR5 motherboard, lowers the risk of damaging your memory module.', 4, '2023-10-03 15:01:10', '2023-10-03 15:01:10'),
(20, 7, 'App\\Models\\Motherboard', 'Matična ploča', 'H470M H', 99.00, NULL, 'DDR5 Memory with Protection Circuit. Due to the unique electrical architecture of DDR5 DIMM, there’s a high risk of damaging the memory module if AC power isn’t disconnected properly during removal or installation. To prevent this, ASRock has implemented a trouble free protection circuit on every DDR5 motherboard, lowers the risk of damaging your memory module.', 6, '2023-10-03 15:01:28', '2023-10-03 15:01:28'),
(21, 8, 'App\\Models\\Motherboard', 'Matična ploča', 'Strix Z690-G Gaming ', 359.99, NULL, 'ROG Strix Z690-G Gaming WiFi provides up-rated power delivery and optimized cooling to push any gaming build to its limits. Intelligent controls enable easy management of overclocking, cooling and networking settings, while Two-Way AI Noise Cancelation ensures crystal-clear in-game communication. ROG Strix Z690-G Gaming WiFi is armed with all the essentials required to create a gaming PC with top-tier performance.', 5, '2023-10-03 15:01:29', '2023-10-03 15:01:29'),
(22, 1, 'App\\Models\\Motherboard', 'Matična ploča', 'Z790 Aorus Elite AX', 399.90, NULL, 'With the fast-moving technology changes, GIGABYTE always follows the latest trends and provides customers with advanced features and latest technologies. GIGABYTE motherboards are equipped with upgraded power solution, latest storage standards and outstanding connectivity to enable optimized performance for gaming. GIGABYTE Motherboards\' unparalleled performance is guaranteed by innovative and optimized thermal design to ensure the best CPU, Chipset, SSD stability and low temperatures under full load application and gaming performance. GIGABYTE Ultra Durable design provides product durability and high-quality manufacturing process. GIGABYTE motherboards use the best components and reinforce every slots to make each of them solid and durable.\r\n', 6, '2023-10-03 15:01:31', '2023-10-03 15:01:31'),
(23, 1, 'App\\Models\\RAM', 'RAM memorija', 'Vengeance RGB Pro, 64GB', 250.00, NULL, 'ovo je veliki ram', 14, '2023-10-03 15:46:17', '2023-10-03 15:46:17'),
(24, 2, 'App\\Models\\RAM', 'RAM memorija', 'Fury Beast, 64GB', 279.99, NULL, 'ovo je veliki ram', 21, '2023-10-03 15:49:52', '2023-10-03 15:49:52'),
(25, 3, 'App\\Models\\RAM', 'RAM memorija', 'Fury Beast, 32GB', 279.99, NULL, 'ovo je veliki ram', 21, '2023-10-03 15:49:55', '2023-10-03 15:49:55'),
(26, 4, 'App\\Models\\RAM', 'RAM memorija', 'CT16G48C40S5, 16GB', 50.00, NULL, 'ovo je osrednji ram', 20, '2023-10-03 15:49:56', '2023-10-03 15:49:56'),
(28, 1, 'App\\Models\\Mouse', 'Miš', 'Basilisk V3 Pro', 170.00, 190.00, 'OUR MOST ADVANCED GAMING MOUSE YET The king returns to raise the game. Enter the Razer Basilisk V3 Pro—our most advanced gaming mouse yet. Armed to the teeth with industry-leading technology, unlock your maximum potential with a weapon', 29, '2023-10-03 16:06:12', '2023-10-03 16:06:12'),
(29, 2, 'App\\Models\\Mouse', 'Miš', 'G502 Lightspeed', 170.00, 200.00, 'LIGHTSPEED WIRELESS G502 is an icon, topping the charts through every generation, and the mouse of choice for serious gamers. Now, G502 joins the ranks of the world’s most advanced wireless gaming mice with the release of G502 LIGHTSPEED', 28, '2023-10-03 16:08:03', '2023-10-03 16:08:03'),
(30, 3, 'App\\Models\\Mouse', 'Miš', 'Basilisk V3 Pro', 190.00, 250.00, 'OUR MOST ADVANCED GAMING MOUSE YET The king returns to raise the game. Enter the Razer Basilisk V3 Pro—our most advanced gaming mouse yet. Armed to the teeth with industry-leading technology, unlock your maximum potential with a weapon', 29, '2023-10-03 16:20:10', '2023-10-03 16:20:10'),
(31, 1, 'App\\Models\\PSU', 'Napajanje', 'SF850L', 230.00, NULL, 'jako napajanje za tebe', 14, '2023-10-03 16:57:31', '2023-10-03 16:57:31'),
(32, 2, 'App\\Models\\PSU', 'Napajanje', 'Straight Power 12', 220.00, NULL, 'jako napajanje za tebe opet', 13, '2023-10-03 16:57:59', '2023-10-03 16:57:59'),
(33, 3, 'App\\Models\\PSU', 'Napajanje', 'Dark Power 12', 239.90, NULL, 'jos jedno jako napajanje za tebe', 13, '2023-10-03 16:58:23', '2023-10-03 16:58:23'),
(34, 4, 'App\\Models\\PSU', 'Napajanje', 'ROG Strix Aura Edition', 309.00, NULL, 'jos jedno najjace napajanje za tebe', 5, '2023-10-03 16:58:53', '2023-10-03 16:58:53'),
(35, 1, 'App\\Models\\PcCase', 'Kućište', 'ROG Strix Helios GX601', 320.00, NULL, 'Case Size Mid Tower', 3, '2023-10-03 17:02:23', '2023-10-03 17:02:23'),
(36, 2, 'App\\Models\\PcCase', 'Kućište', 'Tomahawk ATX', 240.00, NULL, 'Case Size Mid Tower', 29, '2023-10-03 17:02:55', '2023-10-03 17:02:55'),
(37, 3, 'App\\Models\\PcCase', 'Kućište', 'Shadow Base 800DX', 199.00, NULL, 'Case Size Mid Tower', 13, '2023-10-03 17:03:50', '2023-10-03 17:03:50'),
(38, 4, 'App\\Models\\PcCase', 'Kućište', 'North', 199.00, NULL, 'Case Size Mid Tower', 15, '2023-10-03 17:04:15', '2023-10-03 17:04:15'),
(39, 5, 'App\\Models\\PcCase', 'Kućište', 'Tomahawk', 210.00, NULL, 'Case Size Mini Tower, kaljeno staklo, bez napajanja, crno, RGB', 29, '2023-10-03 17:05:08', '2023-10-03 17:05:08'),
(40, 5, 'App\\Models\\Storage', 'Pohrana', 'T700', 520.00, NULL, 'Introducing the fastest Gen5 SSD on the planet', 20, '2023-10-03 17:10:34', '2023-10-03 17:10:34'),
(41, 1, 'App\\Models\\Storage', 'Pohrana', 'IronWolf NAS', 115.00, NULL, 'The Power of Agility for home, SOHO and SMB NAS enclosures. IronWolf is designed for everything NAS. Get used to tough, ready and scalable 24/7 performance that can handle multi-drive environments with a wide range of capacities.', 24, '2023-10-03 17:11:58', '2023-10-03 17:11:58'),
(42, 1, 'App\\Models\\Monitor', 'Monitor', 'Extragood', 300.00, NULL, 'nekaj opisno za monitor cool je', 1, '2023-10-03 17:45:56', '2023-10-03 17:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `component_images`
--

CREATE TABLE `component_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_images`
--

INSERT INTO `component_images` (`id`, `url`, `component_id`, `created_at`, `updated_at`) VALUES
(1, 'https://www.gigahertz.com.ph/cdn/shop/products/razer_blackwidow_v4_pro_mechanical_gaming_keyboard_green_switches_ac60741_26992_1024x.jpg', 1, '2023-09-25 12:32:57', '2023-09-25 12:32:57'),
(2, 'https://www.gigahertz.com.ph/cdn/shop/products/razer_blackwidow_v4_pro_mechanical_gaming_keyboard_green_switches_ac60741_26992_1024x.jpg', 1, '2023-09-25 12:34:23', '2023-09-25 12:34:23'),
(6, 'https://megabajt.hr/wp-content/uploads/2020/11/amd-ryzen-9-5900x-procesor.jpg', 8, NULL, NULL),
(7, 'https://www.links.hr/content/images/thumbs/009/0093072_procesor-amd-ryzen-7-5800x-box-s-am4-38ghz-36mb-cache-8-core-bez-hladnjaka.jpg', 9, NULL, NULL),
(8, 'https://m.media-amazon.com/images/I/51AqEkc2BuL._AC_UF894,1000_QL80_.jpg', 12, NULL, NULL),
(9, 'https://i0.wp.com/www.workstation.ma/wp-content/uploads/2021/04/Intel-Core-i9-11900K-box-workstation-maroc-2.jpg', 10, NULL, NULL),
(16, 'https://www.instar-informatika.hr/slike/velike/GIGVG-RTX_4090_1_1.jpg', 2, NULL, NULL),
(17, 'https://www.instar-informatika.hr/slike/velike/graficka-asus-geforce-rtx4090-rog-strix-oc-24gb-gddr6x-66473-0001285043_1.jpg', 4, NULL, NULL),
(18, 'https://www.instar-informatika.hr/slike/velike/ASUVG-RTX_4080_1.jpg', 5, NULL, NULL),
(19, 'https://www.instar-informatika.hr/slike/velike/maticna-ploca-asus-rog-maximus-z790-hero-ddr5-intel-lga1700--69199-0001286783_222374.jpg', 7, NULL, NULL),
(20, 'https://www.instar-informatika.hr/slike/velike/GIGMB-Z790_GAMXAX_1.jpg', 13, NULL, NULL),
(21, 'https://www.instar-informatika.hr/slike/velike/maticna-ploca-asus-prime-b550-plus-am4-a-0001221293_1.jpg', 14, NULL, NULL),
(22, 'https://www.instar-informatika.hr/slike/velike/maticna-ploca-asrock-b650m-pg-riptide-amd-am5-micro-atx-477-46140538_1.jpg', 15, NULL, NULL),
(23, 'https://www.instar-informatika.hr/slike/velike/maticna-ploca-asrock-x670e-pg-lightning-amd-am5-atx-16609-asr-x670epglightn_1.jpg', 19, NULL, NULL),
(24, 'https://www.instar-informatika.hr/slike/velike/GIGMB-H470M_H_1.jpg', 20, NULL, NULL),
(25, 'https://www.instar-informatika.hr/slike/velike/maticna-ploca-asus-rog-strix-z690-g-gaming-wifi-ddr5-intel-l-21928-0001236887-ms_1.jpg', 21, NULL, NULL),
(26, 'https://www.instar-informatika.hr/slike/velike/GIGMB-Z790_AORUSEAX1_1.jpg', 22, NULL, NULL),
(27, 'https://www.instar-informatika.hr/slike/velike/GIGMB-Z790_AORUSEAX1_2.jpg', 22, NULL, NULL),
(28, 'https://www.instar-informatika.hr/slike/velike/GIGMB-Z790_AORUSEAX1_4.jpg', 22, NULL, NULL),
(29, 'https://www.instar-informatika.hr/slike/velike/GIGMB-Z790_AORUSEAX1_3.jpg', 22, NULL, NULL),
(30, 'https://www.nabava.net/slike/products/36/95/39449536/thumb290_corsair-vengeance-rgb-pro-64gb-ddr5-6000mhz-2x32gb_fba53a29.jpeg', 23, NULL, NULL),
(31, 'https://www.nabava.net/slike/products/19/16/39321619/thumb290_kingston-fury-beast-kf560c40bbak2-64-64gb-ddr5-6000mhz-2x32gb_e3beaa2.jpeg', 24, NULL, NULL),
(32, 'https://www.nabava.net/slike/products/04/44/23384404/thumb290_kingston-kf560c36bbek2-32-32gb-ddr5-6000mhz_260025d0.jpeg', 25, NULL, NULL),
(33, 'https://www.nabava.net/slike/products/34/98/20029834/thumb290_crucial-ct16g48c40s5-16gb-ddr5-4800mhz_d8cbf5c.webp', 26, NULL, NULL),
(34, 'https://www.instar-informatika.hr/slike/velike/mis-razer-basilisk-v3-pro-bezicni-gaming-mouraz096_1.jpg', 28, NULL, NULL),
(35, 'https://www.instar-informatika.hr/slike/velike/mis-razer-basilisk-v3-pro-bezicni-gaming-mouraz096_2.jpg', 28, NULL, NULL),
(36, 'https://www.instar-informatika.hr/slike/velike/mis-logitech-g502-lightspeed-bezicni-log-g502-wl_2.jpg', 29, NULL, NULL),
(37, 'https://www.instar-informatika.hr/slike/velike/napajanje-corsair-sf850l-850w-80-gold-modularno-sfx-l-78680-cor-cp-9020245-eu_231165.jpg', 31, NULL, NULL),
(38, 'https://www.instar-informatika.hr/slike/velike/napajanje-be-quiet-straight-power-12-850w-80-platinum-modula-62869-46431024_239876.jpg', 32, NULL, NULL),
(39, 'https://www.instar-informatika.hr/slike/velike/napajanje-be-quiet-dark-power-12-750w-80-titanium-modularno--58120-4138197_1.jpg', 33, NULL, NULL),
(40, 'https://www.instar-informatika.hr/slike/velike/napajanje-asus-rog-strix-aura-edition-850w-80-gold-modularno-82763-46164647_1.jpg', 34, NULL, NULL),
(41, 'https://www.instar-informatika.hr/slike/velike/kuciste-asus-rog-strix-helios-gx601-mid-tower-kaljeno-staklo-79347-3781231_1.jpg', 35, NULL, NULL),
(42, 'https://www.instar-informatika.hr/slike/velike/kuciste-razer-tomahawk-atx-mid-tower-kaljeno-staklo-bez-napa-54553-casraz001_111178.jpg', 36, NULL, NULL),
(43, 'https://www.instar-informatika.hr/slike/velike/kuciste-be-quiet-shadow-base-800dx-midi-tower-kaljeno-staklo-79873-46335668_243561.jpg', 37, NULL, NULL),
(44, 'https://www.instar-informatika.hr/slike/velike/kucisce-fractal-north-midi-tower-mesh-bez-napajanja-atx-crno-30810-frac-north-black_1.jpg', 38, NULL, NULL),
(45, 'https://www.instar-informatika.hr/slike/velike/kuciste-razer-tomahawk-mini-tower-kaljeno-staklo-bez-napajan-22628-casraz002_111177.jpg', 39, NULL, NULL),
(46, 'https://www.instar-informatika.hr/slike/velike/crucial-x10-pro-2tb-portable-ssd-ean-649528938428-82322-ct2000x10prossd9_1.jpg', 16, NULL, NULL),
(47, 'https://www.instar-informatika.hr/slike/velike/eksterni-ssd-samsung-t7-shield-2tb-usb-3-4505879_1.jpg', 17, NULL, NULL),
(48, 'https://www.instar-informatika.hr/slike/velike/crucial-t700-2tb-pcie-gen5-nvme-m2-ssd-ean-649528935663-5140-ct2000t700ssd3_1.jpg', 40, NULL, NULL),
(49, 'https://www.instar-informatika.hr/slike/velike/hard-disk-seagate-ironwolf-nas-35-4tb-sa-4484861_1.jpg', 41, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `component_order`
--

CREATE TABLE `component_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_order`
--

INSERT INTO `component_order` (`id`, `quantity`, `order_id`, `component_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, NULL, NULL),
(2, 1, 2, 3, NULL, NULL),
(3, 1, 3, 4, NULL, NULL),
(4, 1, 4, 4, NULL, NULL),
(5, 1, 4, 5, NULL, NULL),
(6, 4, 5, 4, NULL, NULL),
(7, 1, 6, 4, NULL, NULL),
(8, 1, 7, 4, NULL, NULL),
(9, 2, 8, 22, NULL, NULL),
(10, 1, 8, 5, NULL, NULL),
(11, 3, 9, 22, NULL, NULL),
(12, 2, 9, 7, NULL, NULL),
(13, 3, 10, 22, NULL, NULL),
(14, 1, 10, 4, NULL, NULL),
(15, 1, 10, 5, NULL, NULL),
(16, 3, 11, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cooling`
--

CREATE TABLE `cooling` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cooling_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cooling_type`
--

CREATE TABLE `cooling_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socket_id` bigint(20) UNSIGNED NOT NULL,
  `cores` int(11) NOT NULL,
  `speed` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `socket_id`, `cores`, `speed`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 100.00, '2023-09-28 05:50:05', '2023-09-28 05:50:05'),
(2, 1, 16, 100.00, '2023-09-28 05:50:51', '2023-09-28 05:50:51'),
(3, 3, 8, 100.00, '2023-09-28 05:50:52', '2023-09-28 05:50:52'),
(5, 4, 32, 100.00, '2023-09-28 05:50:54', '2023-09-28 05:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `memory` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`id`, `memory`, `created_at`, `updated_at`) VALUES
(1, 24, '2023-09-26 05:32:06', '2023-09-26 05:32:06'),
(2, 24, '2023-09-26 05:48:32', '2023-09-26 05:48:32'),
(3, 24, '2023-09-26 05:48:35', '2023-09-26 05:48:35'),
(4, 24, '2023-09-26 05:48:37', '2023-09-26 05:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `keyboard`
--

CREATE TABLE `keyboard` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `switch_type_id` bigint(20) UNSIGNED NOT NULL,
  `rgb` tinyint(4) NOT NULL,
  `wired` tinyint(4) NOT NULL,
  `type` varchar(15) NOT NULL,
  `connector` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keyboard`
--

INSERT INTO `keyboard` (`id`, `switch_type_id`, `rgb`, `wired`, `type`, `connector`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'mehanička', 'USB', '2023-09-25 12:32:36', '2023-09-25 12:32:36'),
(2, 1, 1, 1, 'mehanicka', 'USB', '2023-09-27 12:07:37', '2023-09-27 12:07:37'),
(3, 1, 1, 1, 'mehanicka', 'USB', '2023-10-03 14:59:23', '2023-10-03 14:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `logo_url`, `created_at`, `updated_at`) VALUES
(1, 'Intel', 'https://www.thoughtco.com/thmb/xA0zo7FUyCKKiuR39yl56V2y5so=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/intel-logo-56a6fa195f9b58b7d0e5ce3a.png', '2023-09-25 12:13:44', '2023-09-25 12:13:44'),
(3, 'AMD', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/AMD_Logo.svg/2560px-AMD_Logo.svg.png', '2023-09-25 12:14:15', '2023-09-25 12:14:15'),
(4, 'ASRock', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/ASRock_Logo.svg/1280px-ASRock_Logo.svg.png', '2023-09-25 12:14:39', '2023-09-25 12:14:39'),
(5, 'ASUS', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/AsusTek-black-logo.png/1200px-AsusTek-black-logo.png', '2023-09-25 12:14:53', '2023-09-25 12:14:53'),
(6, 'Gigabyte', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Gigabyte_Technology_logo_20080107.svg/2560px-Gigabyte_Technology_logo_20080107.svg.png', '2023-09-25 12:15:14', '2023-09-25 12:15:14'),
(7, 'Inno3D', 'https://m.media-amazon.com/images/S/aplus-media/vc/05d65e4c-bee4-473f-8985-3f41f750e623.__CR0,0,600,180_PT0_SX600_V1___.png', '2023-09-25 12:15:35', '2023-09-25 12:15:35'),
(8, 'MSI', 'https://logodownload.org/wp-content/uploads/2014/09/msi-logo-1.png', '2023-09-25 12:15:51', '2023-09-25 12:15:51'),
(9, 'NVIDIA', 'https://zeevector.com/wp-content/uploads/Nvidia-Logo-Transparent-PNG.png', '2023-09-25 12:16:37', '2023-09-25 12:16:37'),
(10, 'Sapphire', 'https://www.amd.com/system/files/24937-sapphire-logo-1260x709.png', '2023-09-25 12:17:04', '2023-09-25 12:17:04'),
(11, 'NZTX', 'https://crystalpng.com/wp-content/uploads/2022/06/nzxt-logo-png.png', '2023-09-25 12:17:42', '2023-09-25 12:17:42'),
(12, 'Arctic', 'https://upload.wikimedia.org/wikipedia/commons/8/8d/ARCTIC_%28computer_cooling%29_logo.png', '2023-09-25 12:19:09', '2023-09-25 12:19:09'),
(13, 'Be Quiet!', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Be_Quiet%21_Logo.png/1200px-Be_Quiet%21_Logo.png', '2023-09-25 12:19:26', '2023-09-25 12:19:26'),
(14, 'Corsair', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Corsair.svg/2560px-Corsair.svg.png', '2023-09-25 12:19:41', '2023-09-25 12:19:41'),
(15, 'Fractal', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Fractal_Design_logo_2019.svg/2560px-Fractal_Design_logo_2019.svg.png', '2023-09-25 12:19:56', '2023-09-25 12:19:56'),
(16, 'Lian Li', 'https://m.media-amazon.com/images/S/stores-image-uploads-eu-prod/b/AmazonStores/A21TJRUUN4KGV/4fdbf4e27024b2d1dcabd29da401a2f2.w2069.h527.png', '2023-09-25 12:20:10', '2023-09-25 12:20:10'),
(17, 'MS', 'https://www.msan.hr/wp-content/uploads/2020/06/MS-1-2.png', '2023-09-25 12:22:06', '2023-09-25 12:22:06'),
(18, 'Zalman', 'https://logo-logos.com/2016/11/Zalman_logo.png', '2023-09-25 12:22:26', '2023-09-25 12:22:26'),
(19, 'Adata', 'https://logodownload.org/wp-content/uploads/2019/05/adata-logo.png', '2023-09-25 12:22:42', '2023-09-25 12:22:42'),
(20, 'Crucial', 'https://cdn.worldvectorlogo.com/logos/crucial.svg', '2023-09-25 12:22:54', '2023-09-25 12:22:54'),
(21, 'Kingston', 'https://brandslogos.com/wp-content/uploads/images/kingston-logo-vector.svg', '2023-09-25 12:23:28', '2023-09-25 12:23:28'),
(22, 'Orico', 'https://www.futura-it.hr/manufacture/orico.jpg', '2023-09-25 12:23:59', '2023-09-25 12:23:59'),
(23, 'Samsung', 'https://upload.wikimedia.org/wikipedia/commons/f/f1/Samsung_logo_blue.png', '2023-09-25 12:24:19', '2023-09-25 12:24:19'),
(24, 'Seagate', 'https://1000logos.net/wp-content/uploads/2021/05/Seagate-logo.png', '2023-09-25 12:24:45', '2023-09-25 12:24:45'),
(25, 'Silicon Power', 'https://upload.wikimedia.org/wikipedia/commons/0/0f/2011-10-03_Silicon_Power_logo.png', '2023-09-25 12:24:58', '2023-09-25 12:24:58'),
(26, 'Western Digital', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Western_Digital_logo_2004.svg/800px-Western_Digital_logo_2004.svg.png', '2023-09-25 12:25:14', '2023-09-25 12:25:14'),
(27, 'Ducky', 'https://eu.vaxee.co/data/editor/images/products/Keyboard/DUCKY_LOGO.png', '2023-09-25 12:25:46', '2023-09-25 12:25:46'),
(28, 'Logitech', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/Logitech_logo.svg/2560px-Logitech_logo.svg.png', '2023-09-25 12:26:01', '2023-09-25 12:26:01'),
(29, 'Razer', 'https://www.laser-flash.com/wp-content/uploads/2020/10/Razer-logo-1.png', '2023-09-25 12:26:50', '2023-09-25 12:26:50'),
(30, 'Redragon', 'https://tehno-mag.hr/upload/catalog/manufacturer/redragon-logo-2_5f367883941ca.png', '2023-09-25 12:27:02', '2023-09-25 12:27:02'),
(31, 'Steelseries', 'https://1000logos.net/wp-content/uploads/2020/09/Steelseries-logo.png', '2023-09-25 12:27:16', '2023-09-25 12:27:16'),
(32, 'Whiteshark', 'https://www.rebootinfogamer.hr/wp-content/uploads/2019/10/White-Shark-logo-1-365x240.png', '2023-09-25 12:27:30', '2023-09-25 12:27:30'),
(33, 'Acer', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Acer_2011.svg/2560px-Acer_2011.svg.png', '2023-09-25 12:29:06', '2023-09-25 12:29:06'),
(34, 'AOC', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Aoc_international_logo.svg/2560px-Aoc_international_logo.svg.png', '2023-09-25 12:29:17', '2023-09-25 12:29:17'),
(35, 'DELL', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Dell_logo.svg/2560px-Dell_logo.svg.png', '2023-09-25 12:29:28', '2023-09-25 12:29:28'),
(36, 'Lenovo', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Lenovo_logo_2015.svg/2560px-Lenovo_logo_2015.svg.png', '2023-09-25 12:29:39', '2023-09-25 12:29:39'),
(37, 'LG', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/LG_logo_%282015%29.svg/2560px-LG_logo_%282015%29.svg.png', '2023-09-25 12:29:49', '2023-09-25 12:29:49'),
(38, 'Philips', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Philips_logo_new.svg/1200px-Philips_logo_new.svg.png', '2023-09-25 12:30:01', '2023-09-25 12:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2021_08_17_125608_create_manufacturer_table', 1),
(6, '2022_08_17_132544_create_pc_table', 1),
(7, '2022_08_19_114148_create_socket_table', 1),
(8, '2022_08_25_090947_create_component_table', 1),
(9, '2023_08_17_125321_create_storage_type_table', 1),
(10, '2023_08_17_125412_create_cooling_type_table', 1),
(11, '2023_08_17_125648_create_cpu_table', 1),
(12, '2023_08_17_130657_create_ram_type_table', 1),
(13, '2023_08_17_130801_create_case_size_table', 1),
(14, '2023_08_17_131151_create_switch_type_table', 1),
(15, '2023_08_17_131746_create_mouse_table', 1),
(16, '2023_08_17_132049_create_monitor_table', 1),
(17, '2023_08_17_132308_create_keyboard_table', 1),
(18, '2023_08_17_132501_create_gpu_table', 1),
(19, '2023_08_17_135350_create_motherboard_table', 1),
(20, '2023_08_17_135700_create_user_table', 1),
(21, '2023_08_17_135805_create_order_table', 1),
(22, '2023_08_17_140310_create_psu_table', 1),
(23, '2023_08_17_140650_create_storage_table', 1),
(24, '2023_08_26_145733_create_component_images_table', 1),
(25, '2023_08_28_133549_create_ram_table', 1),
(26, '2023_08_30_082205_create_pc_case_table', 1),
(27, '2023_08_31_160410_create_component_order_table', 1),
(28, '2023_09_21_082913_create_cooling_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` double(8,2) NOT NULL,
  `curved` tinyint(4) NOT NULL,
  `refresh_rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`id`, `size`, `curved`, `refresh_rate`, `created_at`, `updated_at`) VALUES
(1, 27.00, 0, 120, '2023-10-03 17:45:56', '2023-10-03 17:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socket_id` bigint(20) UNSIGNED NOT NULL,
  `ram_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`id`, `socket_id`, `ram_type_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2023-10-03 17:50:38', '2023-10-03 17:50:38'),
(2, 4, 2, '2023-09-28 05:49:35', '2023-09-28 05:49:35'),
(3, 4, 2, '2023-09-28 05:50:56', '2023-09-28 05:50:56'),
(4, 1, 3, '2023-09-28 05:50:57', '2023-09-28 05:50:57'),
(5, 2, 2, '2023-09-28 05:50:58', '2023-09-28 05:50:58'),
(6, 3, 3, '2023-10-03 15:01:10', '2023-10-03 15:01:10'),
(7, 3, 3, '2023-10-03 15:01:28', '2023-10-03 15:01:28'),
(8, 4, 2, '2023-10-03 15:01:29', '2023-10-03 15:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `mouse`
--

CREATE TABLE `mouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dpi` int(11) NOT NULL,
  `rgb` tinyint(4) NOT NULL,
  `wired` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mouse`
--

INSERT INTO `mouse` (`id`, `dpi`, `rgb`, `wired`, `created_at`, `updated_at`) VALUES
(1, 30000, 1, 1, '2023-10-03 16:06:12', '2023-10-03 16:06:12'),
(2, 30000, 1, 1, '2023-10-03 16:08:03', '2023-10-03 16:08:03'),
(3, 30000, 1, 1, '2023-10-03 16:20:10', '2023-10-03 16:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `order_address` varchar(70) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment` bigint(20) UNSIGNED NOT NULL,
  `delivery_status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_name`, `order_address`, `user_id`, `payment`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 'Ana Bananic', 'ulica 15, 10000 Orlovac', 1, 0, 0, '2023-09-25 12:38:02', '2023-09-25 12:38:02'),
(2, 'Ana Bananic', 'ulica 15, 10000 Orlovac', 1, 0, 0, '2023-09-26 09:29:55', '2023-09-26 09:29:55'),
(3, 'PRazni User', 'ulica 12, 10010 Zagreb', 3, 0, 0, '2023-09-26 09:31:13', '2023-09-26 09:31:13'),
(4, 'Ana Bananic', 'ulica 15, 10000 Orlovac', 1, 0, 0, '2023-09-26 09:56:04', '2023-09-26 09:56:04'),
(5, 'Ana Bananic', 'ulica 15, 10000 Orlovac', 1, 1, 0, '2023-09-26 09:58:41', '2023-09-26 09:58:41'),
(6, 'Ana Bananic', 'ulica 15, 10000 Orlovac', 1, 0, 0, '2023-09-26 10:01:21', '2023-09-26 10:01:21'),
(7, 'Ana Bananic', 'ulica 15, 10000 Orlovac', 1, 1, 0, '2023-09-27 06:03:42', '2023-09-27 06:03:42'),
(8, 'Marko Slovarkovski', 'Nekoga Mi 23a, 10000 Zagreb', 4, 1, 0, '2023-10-03 17:48:31', '2023-10-03 17:48:31'),
(9, 'Lovro Lovakovic', 'Ulica Mirka 21a, 10000 Zagreb', 5, 1, 0, '2023-10-03 18:15:32', '2023-10-03 18:15:32'),
(10, 'Zlatko Netkovic', 'Ulica Mirka 12a, 10000 Zagreb', 7, 1, 0, '2023-10-03 18:25:29', '2023-10-03 18:25:29'),
(11, 'Robert Robovic', 'Ulica Nikole 23a, 10000 Zagreb', 8, 1, 0, '2023-10-04 04:33:23', '2023-10-04 04:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc_case`
--

CREATE TABLE `pc_case` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pc_case`
--

INSERT INTO `pc_case` (`id`, `case_size_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-10-03 17:02:23', '2023-10-03 17:02:23'),
(2, 2, '2023-10-03 17:02:55', '2023-10-03 17:02:55'),
(3, 2, '2023-10-03 17:03:50', '2023-10-03 17:03:50'),
(4, 2, '2023-10-03 17:04:15', '2023-10-03 17:04:15'),
(5, 3, '2023-10-03 17:05:08', '2023-10-03 17:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'main', '03c8698251c35b6345072a5adfc9b9aae7079da8cea90f3421153272f4278d9d', '[\"*\"]', NULL, NULL, '2023-09-25 12:08:49', '2023-09-25 12:08:49'),
(2, 'App\\Models\\User', 1, 'main', '6be3f022f1f67393b74d6cf2b61ccc67cdbfa8f05e07b081cb67f87030c87462', '[\"*\"]', '2023-09-25 12:37:57', NULL, '2023-09-25 12:37:50', '2023-09-25 12:37:57'),
(3, 'App\\Models\\User', 1, 'main', '1820500161528cabfe3a211e567338b54ac551c43c5be4adf87ce9380037e290', '[\"*\"]', NULL, NULL, '2023-09-25 12:53:53', '2023-09-25 12:53:53'),
(4, 'App\\Models\\User', 1, 'main', '9293750cb1a1e3ebcfb6e1d8ca4ae617a7dcc190bbe8061d835ef3a0f28cc83a', '[\"*\"]', NULL, NULL, '2023-09-25 13:02:36', '2023-09-25 13:02:36'),
(5, 'App\\Models\\User', 1, 'main', '40f8d87cf839d4979d7ac74b822f2b1fb3b7014e34125ba9e7a997201d1b1dc1', '[\"*\"]', NULL, NULL, '2023-09-25 13:10:07', '2023-09-25 13:10:07'),
(6, 'App\\Models\\User', 1, 'main', 'bfcf2983f9d9a814c2732844b1f9b1903d36c31ab58cc83387aa995a424c29a4', '[\"*\"]', NULL, NULL, '2023-09-26 05:35:32', '2023-09-26 05:35:32'),
(7, 'App\\Models\\User', 1, 'main', '56a2c09278fc09c2cd8826ba79453f0e893d2c227742d88c60830ed657650d52', '[\"*\"]', NULL, NULL, '2023-09-26 06:44:05', '2023-09-26 06:44:05'),
(8, 'App\\Models\\User', 1, 'main', '3dbfd25956315bdf04de24a9d28f2c76c36741050bc30192d4e06b54ac04b05f', '[\"*\"]', NULL, NULL, '2023-09-26 06:44:06', '2023-09-26 06:44:06'),
(9, 'App\\Models\\User', 1, 'main', 'ebdd45d879352f34cdeb2b5ff671908bd7e28450149f0c0fe361e7a092250e5d', '[\"*\"]', NULL, NULL, '2023-09-26 06:44:07', '2023-09-26 06:44:07'),
(10, 'App\\Models\\User', 1, 'main', '4c607b46a888251e69a688a835011dca77536822fc328c1d6fa76ee23c421742', '[\"*\"]', NULL, NULL, '2023-09-26 06:47:50', '2023-09-26 06:47:50'),
(11, 'App\\Models\\User', 1, 'main', '0b6814bee4f1c38d3fb928f518f09b61bd12d0ade55a5adfec76b41fe7ac737b', '[\"*\"]', NULL, NULL, '2023-09-26 09:00:03', '2023-09-26 09:00:03'),
(12, 'App\\Models\\User', 1, 'main', '3ab651d37c871d8e25f5a93942060ff106e663218f5a0fd334c446ae4fa87138', '[\"*\"]', NULL, NULL, '2023-09-26 09:00:04', '2023-09-26 09:00:04'),
(14, 'App\\Models\\User', 3, 'main', '45a5b08274558fa979db5e22903de1d990ac5aa54c5c52d79665d24ef5b427ed', '[\"*\"]', NULL, NULL, '2023-09-26 09:21:50', '2023-09-26 09:21:50'),
(15, 'App\\Models\\User', 3, 'main', 'd41112d0baa8ce94b6b7f58fe13a6c00a0d63ec9f55afee4f4d3522159e21680', '[\"*\"]', NULL, NULL, '2023-09-26 09:25:57', '2023-09-26 09:25:57'),
(16, 'App\\Models\\User', 3, 'main', 'c7881fdbf1a784cc2488812c24c7ad6b1a84e3aac7b464a0c07fa7c9304642f1', '[\"*\"]', NULL, NULL, '2023-09-26 09:27:12', '2023-09-26 09:27:12'),
(18, 'App\\Models\\User', 3, 'main', '724f243d514013912f5190292b104de2bd20afb67f8e9f45a53ba4db46128228', '[\"*\"]', NULL, NULL, '2023-09-26 09:28:21', '2023-09-26 09:28:21'),
(20, 'App\\Models\\User', 3, 'main', 'beb4261dd25d2de40ee27ef79872f82b88c38fc5d922e35b23e48630d8c457ad', '[\"*\"]', NULL, NULL, '2023-09-26 09:30:14', '2023-09-26 09:30:14'),
(21, 'App\\Models\\User', 3, 'main', 'dd7b9c6d91d20ace4481379ab4282936ea69a91ffb102e7b41d489890065bebe', '[\"*\"]', '2023-09-26 09:31:10', NULL, '2023-09-26 09:31:06', '2023-09-26 09:31:10'),
(22, 'App\\Models\\User', 1, 'main', '33a8d960b12d94a21e7b00b48c5264f67cc628deb6798e2140e5034be4109627', '[\"*\"]', NULL, NULL, '2023-09-26 09:40:48', '2023-09-26 09:40:48'),
(23, 'App\\Models\\User', 1, 'main', '46e7c2f7e390d30231316371fa167e721926f5519bbd75d67f76b65bcb8da55c', '[\"*\"]', NULL, NULL, '2023-09-26 09:47:11', '2023-09-26 09:47:11'),
(24, 'App\\Models\\User', 1, 'main', '6035fe3f2fe16e07d1b73f934517e981441252461ae8a57bdd67e7fbe6ba9f06', '[\"*\"]', NULL, NULL, '2023-09-26 09:49:51', '2023-09-26 09:49:51'),
(25, 'App\\Models\\User', 1, 'main', '9f7e739daf4e6c213f371f07a366d49e03fd2a4591721b6337113c4890528ab0', '[\"*\"]', NULL, NULL, '2023-09-26 09:50:44', '2023-09-26 09:50:44'),
(26, 'App\\Models\\User', 1, 'main', '6d43a0df01a9ec5ca31deca781919346ff421dee9488fbcfc83a905bb1e0bdf1', '[\"*\"]', NULL, NULL, '2023-09-26 09:55:18', '2023-09-26 09:55:18'),
(27, 'App\\Models\\User', 1, 'main', 'eec489babbb3532741b24a110dd6d878e2841a308d702a2a2be6e3dc9cd1dd85', '[\"*\"]', '2023-09-26 09:55:59', NULL, '2023-09-26 09:55:52', '2023-09-26 09:55:59'),
(28, 'App\\Models\\User', 1, 'main', '142cd5ec1d7864d9356a5e67b0ce76a9c515fa15f93c67916a629cc99d6c0238', '[\"*\"]', '2023-09-26 10:01:18', NULL, '2023-09-26 09:58:08', '2023-09-26 10:01:18'),
(29, 'App\\Models\\User', 1, 'main', '8dafdc13674c8a4e10aee6f08a26a3e0de28e40b33c505b34d77abe81ebe0dfa', '[\"*\"]', NULL, NULL, '2023-09-26 10:11:01', '2023-09-26 10:11:01'),
(30, 'App\\Models\\User', 1, 'main', 'c0268cf33abc013eae592b42277d45e55e4b94ed010e1c2d7e54e2592f23f81a', '[\"*\"]', NULL, NULL, '2023-09-26 10:11:23', '2023-09-26 10:11:23'),
(31, 'App\\Models\\User', 1, 'main', 'c9252fa50d8742a0c0d065253f7b25ac60ac0ee4353d058829ca1e4160f68f15', '[\"*\"]', NULL, NULL, '2023-09-26 10:38:16', '2023-09-26 10:38:16'),
(32, 'App\\Models\\User', 1, 'main', 'de7836a0f88279fbbd5ceddf016c611ad15bf926ac4f8d86aa26bc5317187cda', '[\"*\"]', NULL, NULL, '2023-09-27 05:30:47', '2023-09-27 05:30:47'),
(34, 'App\\Models\\User', 3, 'main', '023eefed688f79c68646e0efe6fd651831491f498794a2c45104dd1b6f679ceb', '[\"*\"]', NULL, NULL, '2023-09-27 05:53:58', '2023-09-27 05:53:58'),
(36, 'App\\Models\\User', 3, 'main', '018c7d6fd6c71b67c7749b244b99294090e7eb523f62138cf4abd128d86a303f', '[\"*\"]', NULL, NULL, '2023-09-27 05:55:06', '2023-09-27 05:55:06'),
(38, 'App\\Models\\User', 3, 'main', '64a56347bd1d76858d3df78872cb9bc6b2855d331b4e7b225462477bf4094797', '[\"*\"]', NULL, NULL, '2023-09-27 05:59:13', '2023-09-27 05:59:13'),
(43, 'App\\Models\\User', 1, 'main', '58df2aa53799c633dbc0b8ede32a28e21f98c9a86b0786e2970afdc2f907a446', '[\"*\"]', '2023-09-27 06:03:20', NULL, '2023-09-27 06:02:18', '2023-09-27 06:03:20'),
(44, 'App\\Models\\User', 4, 'main', '2a9b86bdf4641678b3c848347e0031dcefa7abbf49bc3705ab02a4a3887b5546', '[\"*\"]', '2023-10-03 17:48:06', NULL, '2023-10-03 17:47:24', '2023-10-03 17:48:06'),
(45, 'App\\Models\\User', 5, 'main', '0112135aea79edb8bb6c57864598efd83fe4de42d85e5bd36fcb487fb2018e49', '[\"*\"]', '2023-10-03 18:14:50', NULL, '2023-10-03 18:14:18', '2023-10-03 18:14:50'),
(46, 'App\\Models\\User', 6, 'main', '139e06865dd107f1257c49f98049dc176c28e40e149a3c2ce15f1e5351e5cea2', '[\"*\"]', NULL, NULL, '2023-10-03 18:20:04', '2023-10-03 18:20:04'),
(48, 'App\\Models\\User', 8, 'main', '3ec765cfaa5e3b689659dd233dd20180245220eb5fb236e5b9e57111e11ac0c3', '[\"*\"]', '2023-10-04 04:33:04', NULL, '2023-10-04 04:32:30', '2023-10-04 04:33:04'),
(49, 'App\\Models\\User', 8, 'main', '130268b58078b58a746687b4ed9c1919143158e6d1a21f66678fd56b8d014016', '[\"*\"]', NULL, NULL, '2023-10-04 04:34:19', '2023-10-04 04:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `psu`
--

CREATE TABLE `psu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `power` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psu`
--

INSERT INTO `psu` (`id`, `power`, `created_at`, `updated_at`) VALUES
(1, 850.00, '2023-10-03 16:57:31', '2023-10-03 16:57:31'),
(2, 850.00, '2023-10-03 16:57:59', '2023-10-03 16:57:59'),
(3, 750.00, '2023-10-03 16:58:23', '2023-10-03 16:58:23'),
(4, 850.00, '2023-10-03 16:58:53', '2023-10-03 16:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speed` int(11) NOT NULL,
  `ram_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `speed`, `ram_type_id`, `created_at`, `updated_at`) VALUES
(1, 6000, 3, '2023-10-03 15:46:17', '2023-10-03 15:46:17'),
(2, 6000, 2, '2023-10-03 15:49:52', '2023-10-03 15:49:52'),
(3, 6000, 2, '2023-10-03 15:49:55', '2023-10-03 15:49:55'),
(4, 4800, 2, '2023-10-03 15:49:56', '2023-10-03 15:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `ram_type`
--

CREATE TABLE `ram_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ram_type`
--

INSERT INTO `ram_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Proba', NULL, NULL),
(2, 'DDR5', NULL, NULL),
(3, 'DDR4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socket`
--

CREATE TABLE `socket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socket`
--

INSERT INTO `socket` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AMD AM4', '2023-09-25 12:11:45', '2023-09-25 12:11:45'),
(2, 'AMD AM5', '2023-09-25 12:11:49', '2023-09-25 12:11:49'),
(3, 'Intel LGA1200', '2023-09-25 12:12:00', '2023-09-25 12:12:00'),
(4, 'Intel LGA1700', '2023-09-25 12:12:11', '2023-09-25 12:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `storage_type_id` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `storage_type_id`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2023-10-03 17:11:58', '2023-10-03 17:11:58'),
(3, 3, 2, '2023-09-28 05:51:28', '2023-09-28 05:51:28'),
(4, 1, 2, '2023-09-28 05:51:31', '2023-09-28 05:51:31'),
(5, 2, 2, '2023-10-03 17:10:34', '2023-10-03 17:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `storage_type`
--

CREATE TABLE `storage_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_type`
--

INSERT INTO `storage_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PC disk', NULL, NULL),
(2, 'SSD disk', NULL, NULL),
(3, 'Eksterni disk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `switch_type`
--

CREATE TABLE `switch_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `switch_type`
--

INSERT INTO `switch_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'crveni', '2023-09-25 12:12:48', '2023-09-25 12:12:48'),
(2, 'plavi', '2023-09-25 12:12:51', '2023-09-25 12:12:51'),
(3, 'zeleni', '2023-09-25 12:12:54', '2023-09-25 12:12:54'),
(4, 'žuti', '2023-09-25 12:13:00', '2023-09-25 12:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `postal` varchar(30) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `address`, `city`, `postal`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Ana', 'Bananic', 'ulica 15', 'Orlovac', '10000', '$2y$10$QdnXznf2Oc7LYX0pSWLBi./bHb7SokaEYQfO2pOo8cReJDEKK2Qr2', 'a@gmail.com', '2023-09-25 12:08:49', '2023-09-25 12:09:06'),
(2, 'Ana', NULL, NULL, NULL, NULL, '$2y$10$.ELzvuG6KKMsi4d.miBoUuJM/hx21dC/FuMhNxZ5VuR2PqoB.3UKu', 'ana@gmail.com', '2023-09-25 12:10:46', '2023-09-25 12:10:46'),
(3, 'PRazni', 'User', 'ulica 12', 'Zagreb', '10010', '$2y$10$.xoRNb3XF6/Bx5i11rSjAeOmkh4bgGYxAhliV6t3aVEXMwPHzvkjC', 'prazni@gmail.com', '2023-09-26 09:21:50', '2023-09-26 09:21:50'),
(4, 'Marko', 'Slovarkovski', 'Nekoga Mi 23a', 'Zagreb', '10000', '$2y$10$lGpODtkp38HdDWyXPAFgYOW2Gbl835kN2tHugc0we5et.ywEZ0yom', 'm@gmail.com', '2023-10-03 17:47:24', '2023-10-03 17:47:57'),
(5, 'Lovro', 'Lovakovic', 'Ulica Mirka 21a', 'Zagreb', '10000', '$2y$10$6vM7JvP9v796JCIO7TwQLerNPSZtduyVmBkRvW.2Ab/phMttZxrVm', 'mirko@gmail.com', '2023-10-03 18:14:18', '2023-10-03 18:14:37'),
(6, 'Nikola', 'Klasinic', 'Ulica Tomislava 240', 'Zagreb', '10000', '$2y$10$6iaJzwvNf3smGst32/VlKeqQnT43OEVQ9QmGSQ8P/4DyFEVtdSrGC', 't@gmail.com', '2023-10-03 18:20:04', '2023-10-03 18:20:36'),
(7, 'Zlatko', 'Netkovic', 'Ulica Mirka 12a', 'Zagreb', '10000', '$2y$10$3TuSrR7v2C94rv5uu6FJJ.KAX39HUTRaIRb3USA5v/C2f6.2qLLAK', 'z@gmail.com', '2023-10-03 18:24:17', '2023-10-03 18:24:55'),
(8, 'Robert', 'Robovic', 'Ulica Nikole 23a', 'Zagreb', '10000', '$2y$10$UESGzYJutDY4glVw0cbGmee19IRm3r/5ppEr42KhGuEMFab0Geu46', 'r@gmail.com', '2023-10-04 04:32:30', '2023-10-04 04:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_size`
--
ALTER TABLE `case_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`),
  ADD KEY `component_manufacturer_id_foreign` (`manufacturer_id`);

--
-- Indexes for table `component_images`
--
ALTER TABLE `component_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `component_images_component_id_foreign` (`component_id`);

--
-- Indexes for table `component_order`
--
ALTER TABLE `component_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `component_order_order_id_foreign` (`order_id`),
  ADD KEY `component_order_component_id_foreign` (`component_id`);

--
-- Indexes for table `cooling`
--
ALTER TABLE `cooling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cooling_cooling_type_id_foreign` (`cooling_type_id`);

--
-- Indexes for table `cooling_type`
--
ALTER TABLE `cooling_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpu_socket_id_foreign` (`socket_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyboard`
--
ALTER TABLE `keyboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyboard_switch_type_id_foreign` (`switch_type_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motherboard_socket_id_foreign` (`socket_id`),
  ADD KEY `motherboard_ram_type_id_foreign` (`ram_type_id`);

--
-- Indexes for table `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc_case`
--
ALTER TABLE `pc_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pc_case_case_size_id_foreign` (`case_size_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `psu`
--
ALTER TABLE `psu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ram_ram_type_id_foreign` (`ram_type_id`);

--
-- Indexes for table `ram_type`
--
ALTER TABLE `ram_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socket`
--
ALTER TABLE `socket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storage_storage_type_id_foreign` (`storage_type_id`);

--
-- Indexes for table `storage_type`
--
ALTER TABLE `storage_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `switch_type`
--
ALTER TABLE `switch_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_size`
--
ALTER TABLE `case_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `component_images`
--
ALTER TABLE `component_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `component_order`
--
ALTER TABLE `component_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cooling`
--
ALTER TABLE `cooling`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cooling_type`
--
ALTER TABLE `cooling_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keyboard`
--
ALTER TABLE `keyboard`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mouse`
--
ALTER TABLE `mouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc_case`
--
ALTER TABLE `pc_case`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `psu`
--
ALTER TABLE `psu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ram_type`
--
ALTER TABLE `ram_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socket`
--
ALTER TABLE `socket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `storage_type`
--
ALTER TABLE `storage_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `switch_type`
--
ALTER TABLE `switch_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `component`
--
ALTER TABLE `component`
  ADD CONSTRAINT `component_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`);

--
-- Constraints for table `component_images`
--
ALTER TABLE `component_images`
  ADD CONSTRAINT `component_images_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `component` (`id`);

--
-- Constraints for table `component_order`
--
ALTER TABLE `component_order`
  ADD CONSTRAINT `component_order_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `component` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `component_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cooling`
--
ALTER TABLE `cooling`
  ADD CONSTRAINT `cooling_cooling_type_id_foreign` FOREIGN KEY (`cooling_type_id`) REFERENCES `cooling_type` (`id`);

--
-- Constraints for table `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `cpu_socket_id_foreign` FOREIGN KEY (`socket_id`) REFERENCES `socket` (`id`);

--
-- Constraints for table `keyboard`
--
ALTER TABLE `keyboard`
  ADD CONSTRAINT `keyboard_switch_type_id_foreign` FOREIGN KEY (`switch_type_id`) REFERENCES `switch_type` (`id`);

--
-- Constraints for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `motherboard_ram_type_id_foreign` FOREIGN KEY (`ram_type_id`) REFERENCES `ram_type` (`id`),
  ADD CONSTRAINT `motherboard_socket_id_foreign` FOREIGN KEY (`socket_id`) REFERENCES `socket` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `pc_case`
--
ALTER TABLE `pc_case`
  ADD CONSTRAINT `pc_case_case_size_id_foreign` FOREIGN KEY (`case_size_id`) REFERENCES `case_size` (`id`);

--
-- Constraints for table `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `ram_ram_type_id_foreign` FOREIGN KEY (`ram_type_id`) REFERENCES `ram_type` (`id`);

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_storage_type_id_foreign` FOREIGN KEY (`storage_type_id`) REFERENCES `storage_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
