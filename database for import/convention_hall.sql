-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 09:04 PM
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
-- Database: `convention_hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Dhaka is formerly known as Dacca is the capital and largest city of Bangladesh, as well as the world\'s largest Bengali-speaking city. It is the eighth largest and sixth most densely populated city in the world with a population of 8.9 million residents as of 2011, and a population of over 21.7 million residents in the Greater Dhaka Area.', 1, '2022-06-14 23:22:19', '2022-11-04 09:36:59'),
(2, 'Chattogram', 'Chittagong, officially called Chattogram, city that is the chief Indian Ocean port of Bangladesh. It lies about 12 miles (19 km) north of the mouth of the Karnaphuli River, in the southeastern arm of the country. Chittagong is the second largest city in Bangladesh, after Dhaka. Pop. (2001) city, 2,023,489; metro. area, 3,265,451; (2011) city, 2,592,439; metro. area, 4,009,423.', 1, '2022-06-14 23:22:57', '2022-06-14 23:22:57'),
(3, 'Khulna', 'Khulna is the third largest city in Bangladesh after Dhaka and Chittagong. It is the administrative territory of Khulna District and Khulna Division. The economy of Khulna is the third largest in the People\'s Republic of Bangladesh, contributing $53 billion in nominal gross state product, and $95 billion in purchasing power parity (PPP) terms as of 2020. In the 2011 census, the city had a population of 663,342.', 1, '2022-06-14 23:23:39', '2022-06-14 23:23:39'),
(4, 'Barishal', 'Barishal Division is one of the eight administrative divisions of Bangladesh. Located in the south-central part of the country, it has an area of 13,644.85 km2 (5,268.31 sq mi), and a population of 8,325,666 at the 2011 Census. It is the least populous Division within the entirety of Bangladesh. It is bounded by Dhaka Division on the north, the Bay of Bengal on the south, Chittagong Division on the east and Khulna Division on the west. The administrative capital, Barisal city, lies in the Padma River delta on an offshoot of the Arial Khan River. Barisal division is criss-crossed by numerous rivers that earned it the nickname Dhan-Nodi-Khal, Ei tin-e Borishal (rice, river and canal built Barishal).', 1, '2022-06-14 23:24:25', '2022-06-14 23:24:25'),
(5, 'Sylhet', 'Sylhet is a metropolitan city in northeastern Bangladesh. It is the administrative seat of the Sylhet Division. Located on the north bank of the Surma River at the eastern tip of Bengal, Sylhet has a subtropical climate and lush highland terrain. The city has a population of more than half a million and is one of the largest cities in Bangladesh after Khulna, Chittagong and Dhaka. Sylhet is one of Bangladesh\'s most important spiritual and cultural centres. Furthermore, it is one of the most economically important cities after Dhaka and Chittagong. The city produces the highest amount of tea and natural gas.', 1, '2022-06-14 23:25:05', '2022-06-14 23:25:05'),
(6, 'Rajshahi', 'Rajshahi is a metropolitan city and a major urban, commercial and educational centre of Bangladesh. It is also the administrative seat of the eponymous division and district. Located on the north bank of the Padma River, near the Bangladesh-India border, the city has a population of over 1630966 residents.', 1, '2022-06-14 23:25:29', '2022-06-14 23:25:29'),
(7, 'Rangpur', 'Rangpur is a district in Northern Bangladesh. It is a part of the Rangpur Division. Under the Rangpur Division (one of eight divisions) composed of eight districts of northern Bangladesh, the District of Rangpur is bordered on the north by Nilphamari District, on the south by Gaibandha District, on the east by Kurigram, and on the west by Dinajpur district. Rangpur town is the divisional headquarter.', 1, '2022-06-14 23:26:04', '2022-06-14 23:26:04'),
(8, 'Mymensingh', 'Mymensingh is a major city and the capital of Mymensingh Division, Bangladesh. Located on the bank of Brahmaputra River, about 120 km (75 mi) north from Dhaka, it is a major financial center and educational hub of north-central Bangladesh. The city was constituted on 1 May,1787 by the British East India Company.', 1, '2022-06-15 00:35:36', '2022-06-15 00:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `customer_image` text DEFAULT NULL,
  `confirmation_code` smallint(6) DEFAULT NULL,
  `active_status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `phone_number`, `address`, `customer_image`, `confirmation_code`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Bijli', 'Akter', 'bijliakter47@gmail.com', '$2y$10$k5gPNyfiJI61RLidBE/4sux9lh6g5CEFuRHk/lGzPMftqMJXofp2W', '$2y$10$BQw.81RpPmtn3DTGvYpHJ.7BxjNxFwNSK23BgUESdBBvzdjYhwXz.', '01406069547', 'Fatikchori, Chattogram.', 'customer-images/Bijli Akter.jpg', NULL, 1, '2022-06-15 00:47:37', '2023-04-05 19:08:26'),
(2, 'habib', 'ullah', 'habibullah@gmail.com', '$2y$10$aJs.I5JjJaUwH6ktS5XavOVmrOK11hL8sAACY/v0aOn9UIHkyNS1e', '$2y$10$UmXTaPBxAtDWMHSQjd7BlegkYmL2Vho5uGJxc0YiKc305nNwBj.Su', '01867622211', 'bandar chittagong', 'customer-images/habib ullah.png', NULL, 1, '2022-11-04 08:54:33', '2022-11-14 01:33:43'),
(3, 'chinmoy', 'das gupta', 'snimogmw@karenkey.com', '$2y$10$dsbzsxMJ7NJUmJ4Bg80yIuD0wlwsgJNLon1LyWZiyBeZnXs/KFH6W', '$2y$10$R6CVe47u3h1jqZVf/BqO8.0EusTq4SH.i8w8YTuZkVhCrwJp80sEK', '0125121516', 'sa das sa asfas fasf f af af a fs asf s afa', NULL, NULL, 1, '2022-12-02 08:26:57', '2022-12-02 08:27:22'),
(4, 'halim', 'uddin', 'halimuddin960@gmail.com', '$2y$10$XEMWZ78z9muJ.PK4Xk9NLuPkMXITSlpfJWWLNIg.8cKAoXn8hN/fa', '$2y$10$O.datRVc52AyxYT5ZTrC9e.CvwGxI.Q2EnqepsiTbtlF2AsmUrs3a', '01830482410', 'fatickcharr,azim nagar', NULL, NULL, 1, '2023-04-05 19:24:50', '2023-04-05 19:25:19');

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
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_description` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `hall_id` int(11) NOT NULL,
  `food_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food_name`, `food_description`, `updated_at`, `created_at`, `hall_id`, `food_image`) VALUES
(1, 'Biriani', 'biriani descriptisons', '2022-12-02 10:05:29', '2022-11-14 00:49:33', 1, 'food-images/biriani.jpg'),
(3, 'polaw', 'used fresh stemmed rice', '2022-11-27 01:23:43', '2022-11-14 00:49:33', 1, 'food-images/polaw.jpg'),
(5, 'korma', 'made with fresh beep', '2022-11-27 01:23:26', '2022-11-14 01:28:39', 2, 'food-images/korma.jpg'),
(6, 'vegetable', 'different types of veg', '2022-12-02 08:30:28', '2022-12-02 08:30:28', 2, 'food-images/vegetable.jpeg'),
(8, 'Salad', 'made with cucumber, chili etc.', '2022-12-02 09:47:24', '2022-12-02 09:47:24', 1, 'food-images/Salad.jpg'),
(9, 'Sweets', 'sweets', '2022-12-02 10:14:31', '2022-12-02 10:12:42', 1, 'food-images/Sweets.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `hall_booking_price` double(10,2) NOT NULL,
  `hall_location` varchar(255) NOT NULL,
  `hall_description` text NOT NULL,
  `hall_image` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hall_capacity` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `category_id`, `hall_name`, `hall_booking_price`, `hall_location`, `hall_description`, `hall_image`, `publication_status`, `created_at`, `updated_at`, `hall_capacity`) VALUES
(1, 2, 'A K Convention Hall', 120000.00, 'Badurtola, Arakan Road, Chattogram.', 'A special event is more spectacular when it´s happening on a beautiful convention hall. Our team has  a vast amount of local knowledge to create fabulous events and destination weddings. We provide you with a day and an experience that you´ll never forget.', 'hall-images/A K Convention Hall.jpg', 1, '2022-06-14 23:33:03', '2022-11-05 23:11:56', 2101.00),
(2, 2, 'K B Convention Hall', 150000.00, 'Kalamia Bazar, Chattogram.', 'It has a huge field which is able to provide full parking facilities. Its beauty is like a queen so it can be called as the queen of Chittagong.', 'hall-images/K B Convention Hall.jpg', 1, '2022-06-14 23:34:11', '2022-06-14 23:34:11', 1100.00),
(3, 2, 'International Convention Centre', 180000.00, 'Chatteswari Road, Chattogram.', 'A convention center is a large building that is designed to hold a convention, where individuals and groups gather to promote and share common interests.', 'hall-images/International Convention Centre.jpg', 1, '2022-06-14 23:35:12', '2022-11-05 23:11:44', 3100.00),
(4, 2, 'Hall 7 Eleven', 140000.00, 'Nowab Sirajuddowla Road, Dewan Bazar, Chattogram.', 'Hall 7 Eleven Convention Center is one of the popular Community Center located in Nowab Sirajuddowla Road, Dewan Bazar ,Chittagong listed under Community Center in Chittagong.', 'hall-images/Hall 7 Eleven.jpg', 1, '2022-06-14 23:36:22', '2022-06-14 23:36:22', 1400.00),
(5, 1, 'DSS Convention Center', 90000.00, 'Mirpur, Dhaka, Bangladesh', 'DSS Convention Center is one of the most famous venue in Mirpur, Dhaka, Bangladesh. It\'s situated in 1st floor, 586/1, Shewrapara, Rokeya Shoroni ,Dhaka-1216, Bangladesh .  DSS Convention Center arranges all kinds of social events like as Engagement, Turmeric Ceremony (Gaye Holud), Wedding, Birthday Party & other Anniversary Party, Iftar Party, Occassional Party and more social events. You also rent this venue to make  Corporate Meetings, Seminar, Annual General Meeting (AGM), Exhibition (Fair & Expo) and many more events.', 'hall-images/DSS Convention Center.jpg', 1, '2022-06-14 23:37:44', '2022-06-14 23:37:44', 1500.00),
(6, 1, 'Emmanuelle\'s Banquet Hall', 150000.00, 'Gulshan-1, Dhaka, Bangladesh.', 'Emmanuelle\'s Banquet Hall is one of the most famous venue in Gulshan-1, Dhaka, Bangladesh. It\'s situated in House# 04, Road# 134, Gulshan-1, Dhaka 1212,Bangladesh. Emmanuelle\'s Banquet Hall arranges all kinds of social events like as Engagement, Turmeric Ceremony (Gaye Holud), Wedding, Birthday Party & other Anniversary Party, Iftar Party, Occassional Party and more social events. You also rent this venue to make Corporate Meetings, Seminar, Annual General Meeting (AGM), Exhibition (Fair & Expo) and many more events.', 'hall-images/Emmanuelle\'s Banquet Hall.jpg', 1, '2022-06-14 23:39:01', '2022-06-14 23:39:01', 3200.00),
(7, 1, 'White Hall Convention Center', 70000.00, 'House# 262 Road# 27 Dhanmondi, 1209 Dhaka, Dhaka Division, Bangladesh.', 'WHITE HALL CONVENTION CENTER is a unique establishment and can be described as a charming catering firm that specializes in event/menu planning and design .The experience with WHCC is like no other .May it be for your wedding ceremony/reception, birthday, corporate events, anniversaries etc .It will serve as a medium for your expression and will become an extension of you. The implication of personalizing events are profound .Not only does it add vibrancy and flare but can also afford you with an indelible moment in your life.', 'hall-images/White Hall Convention Center.jpg', 1, '2022-06-14 23:40:16', '2022-06-14 23:40:16', 2200.00),
(8, 1, 'Marriott Convention Hall', 160000.00, '1215 Dhaka Dhaka City, Dhaka', 'Marriott Convention Hall serving you with the best pillar-less venue for 1400 people, a tasteful interior, quality catering, and a parking space of 200 cars for all the big events of your lives since 2008. Let us help you plan your dream events.', 'hall-images/Marriott Convention Hall.jpg', 1, '2022-06-14 23:42:04', '2022-06-14 23:42:04', 400.00),
(9, 3, 'Khulna Convention Center', 85000.00, 'RG7Q+C9Q, Sonadanga Bypass Rd, Khulna.', 'Well decorated place with much space. There are two Convention centre. One in ground floor & the other one in 1st floor. You can rent the place.', 'hall-images/Khulna Convention Center.jpg', 1, '2022-06-14 23:43:18', '2022-06-14 23:43:18', 300.00),
(10, 3, 'CSS AVA Convention Centre', 100000.00, '82 Rupsha Stand Road Khulna, 9100 Bangladesh.', 'CSS AVA Convention Centre serving you with the best pillar-less venue for 1400 people, a tasteful interior, quality catering, and a parking space of 200 cars for all the big events of your lives since 2008. Let us help you plan your dream events.', 'hall-images/CSS AVA Convention Centre.jpg', 1, '2022-06-14 23:44:33', '2022-06-14 23:44:33', 1311.00),
(11, 3, 'Fairway Multipurpose Hall', 125000.00, 'Khalishpur, Khulna, Bangladesh.', 'This is one of the beautiful convention centre located at Khalishpur, Khulna, Bangladesh. The place is under the control of Bangladesh Navy. The place is sufficiently spacious, neat and clean. Earlier, this space was given to the common people on daily rental basis to organize various problem. But currently rental service for common people is closed which is perhaps for security reason. This compound is under the Naval base of Bangladesh Navy. The place is in general beautiful.', 'hall-images/Fairway Multipurpose Hall.jpg', 1, '2022-06-14 23:45:44', '2022-06-14 23:45:44', 1212.00),
(12, 3, 'ILACS Convention Center', 95000.00, '5/1 KARPARA ROAD, TUTPARA, KHULNA, BANGLADESH, Khulna.', 'ILACS Convention Center is a great place for you to create unforgettable memories with your family, friends and loved ones.', 'hall-images/ILACS Convention Center.jpg', 1, '2022-06-14 23:47:12', '2022-06-14 23:47:12', 1200.00);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_14_115933_create_categories_table', 1),
(6, '2022_05_15_091713_create_halls_table', 1),
(7, '2022_05_21_144323_create_customers_table', 1),
(8, '2022_05_24_162157_create_shippings_table', 1),
(9, '2022_05_27_102655_create_payments_table', 1),
(10, '2022_05_27_102958_create_orders_table', 1),
(11, '2022_05_27_103056_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` double(10,2) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 587100.00, 'Cancelled', '2022-06-16 01:07:56', '2022-06-16 01:11:50'),
(3, 1, 2, 587100.00, 'Pending', '2022-06-16 01:08:05', '2022-06-16 01:08:05'),
(4, 1, 2, 154500.00, 'Completed', '2022-06-16 01:09:06', '2022-06-16 01:11:18'),
(5, 2, 4, 154501.00, 'Pending', '2022-11-04 08:57:22', '2022-11-04 08:57:22'),
(6, 2, 4, 154502.00, 'Pending', '2022-11-04 08:57:58', '2022-11-04 08:57:58'),
(7, 2, 4, 154503.00, 'Pending', '2022-11-04 08:59:04', '2022-11-04 08:59:04'),
(8, 2, 5, 123600.00, 'Pending', '2022-11-05 23:18:13', '2022-11-05 23:18:13'),
(9, 2, 6, 247200.00, 'Pending', '2022-11-24 13:56:42', '2022-11-24 13:56:42'),
(10, 3, 7, 247200.00, 'Pending', '2022-12-02 08:28:19', '2022-12-02 08:28:19'),
(11, 3, 8, 741600.00, 'Pending', '2022-12-08 09:41:59', '2022-12-08 09:41:59'),
(12, 2, 9, 247200.00, 'Pending', '2022-12-07 19:50:09', '2022-12-07 19:50:09'),
(13, 4, 10, 123600.00, 'Cancelled', '2023-04-05 19:29:06', '2023-04-05 19:33:17'),
(14, 4, 10, 123600.00, 'Pending', '2023-04-05 19:29:13', '2023-04-05 19:29:13'),
(15, 4, 10, 123600.00, 'Pending', '2023-04-05 19:31:03', '2023-04-05 19:31:03'),
(16, 4, 10, 309000.00, 'Pending', '2023-04-05 19:48:59', '2023-04-05 19:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `hall_image` text NOT NULL,
  `hall_price` double(10,2) NOT NULL,
  `booking_days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `total_people` int(11) DEFAULT NULL,
  `food_list` varchar(250) DEFAULT NULL,
  `seat_type` varchar(255) DEFAULT NULL,
  `hall_shift` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `hall_id`, `hall_name`, `hall_image`, `hall_price`, `booking_days`, `created_at`, `updated_at`, `order_date`, `total_people`, `food_list`, `seat_type`, `hall_shift`) VALUES
(3, 2, 2, 'K B Convention Hall', 'hall-images/K B Convention Hall.jpg', 150000.00, 3, '2022-11-07 01:09:06', '2022-06-16 01:07:57', '2022-11-07 01:09:06', 1000, 'korma', '4 rounded', 'day'),
(4, 2, 1, 'A K Convention Hall', 'hall-images/A K Convention Hall.jpg', 120000.00, 1, '2022-06-16 01:07:57', '2022-06-16 01:07:57', '2022-06-16 01:07:57', 1000, 'Biriani,demo', '10 bigger', 'day'),
(5, 4, 2, 'K B Convention Hall', 'hall-images/K B Convention Hall.jpg', 150000.00, 1, '2022-11-04 01:09:06', '2022-06-16 01:09:06', '2022-11-04 01:09:06', 1000, 'korma', '4 rounded', 'day'),
(6, 6, 2, 'K B Convention Hall', 'hall-images/K B Convention Hall.jpg', 150000.00, 1, '2022-11-04 08:57:58', '2022-11-04 08:57:58', '2022-11-04 08:57:58', 1000, 'korma', '4 rounded', 'day'),
(8, 8, 1, 'A K Convention Hall', 'hall-images/A K Convention Hall.jpg', 120000.00, 1, '2022-11-05 23:18:13', '2022-11-05 23:18:13', '2022-11-05 23:18:13', 1000, 'Biriani,demo', '10 bigger', 'day'),
(9, 9, 1, 'A K Convention Hall', 'hall-images/A K Convention Hall.jpg', 120000.00, 2, '2022-11-24 13:56:42', '2022-11-24 13:56:42', '2022-11-25 18:00:00', 2100, 'Biriani,demo', '10 bigger', 'day'),
(10, 10, 1, 'A K Convention Hall', 'hall-images/A K Convention Hall.jpg', 120000.00, 2, '2022-12-02 08:28:19', '2022-12-02 08:28:19', '2022-12-09 18:00:00', 1500, 'Biriani', '10 bigger', 'day'),
(11, 11, 1, 'A K Convention Hall', 'hall-images/A K Convention Hall.jpg', 120000.00, 6, '2022-12-08 09:41:59', '2022-12-08 09:41:59', '2022-12-27 18:00:00', 23, 'polaw', '4 square', 'day'),
(12, 12, 1, 'A K Convention Hall', 'hall-images/A K Convention Hall.jpg', 120000.00, 2, '2022-12-07 19:50:10', '2022-12-07 19:50:10', '2022-12-23 03:00:00', 100, 'Biriani,polaw', '10 bigger', 'night'),
(13, 13, 1, 'A K Convention Hall', 'hall-images/A K Convention Hall.jpg', 120000.00, 1, '2023-04-05 19:29:07', '2023-04-05 19:29:07', '2023-04-10 03:00:00', 1011, 'Biriani,Salad', '10 bigger', 'day'),
(14, 16, 2, 'K B Convention Hall', 'hall-images/K B Convention Hall.jpg', 150000.00, 2, '2023-04-05 19:48:59', '2023-04-05 19:48:59', '2023-04-07 03:00:00', 1, 'korma', '4 rounded', 'day');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 2, 'cash', 'Pending', '2022-06-16 01:07:57', '2022-06-16 01:07:57'),
(3, 3, 'cash', 'Pending', '2022-06-16 01:08:05', '2022-06-16 01:08:05'),
(4, 4, 'cash', 'Completed', '2022-06-16 01:09:06', '2022-06-16 01:11:03'),
(5, 5, 'cash', 'Completed', '2022-11-04 08:57:22', '2022-11-24 15:28:34'),
(6, 6, 'cash', 'Completed', '2022-11-04 08:57:58', '2022-11-24 15:28:46'),
(7, 7, 'cash', 'Pending', '2022-11-04 08:59:04', '2022-11-04 08:59:04'),
(8, 8, 'cash', 'Pending', '2022-11-05 23:18:13', '2022-11-05 23:18:13'),
(9, 9, 'cash', 'Pending', '2022-11-24 13:56:42', '2022-11-24 13:56:42'),
(10, 10, 'cash', 'Pending', '2022-12-02 08:28:19', '2022-12-02 08:28:19'),
(11, 11, 'cash', 'Pending', '2022-12-08 09:41:59', '2022-12-08 09:41:59'),
(12, 12, 'cash', 'Pending', '2022-12-07 19:50:09', '2022-12-07 19:50:09'),
(13, 13, 'cash', 'Pending', '2023-04-05 19:29:07', '2023-04-05 19:29:07'),
(14, 14, 'cash', 'Pending', '2023-04-05 19:29:13', '2023-04-05 19:29:13'),
(15, 15, 'cash', 'Pending', '2023-04-05 19:31:04', '2023-04-05 19:31:04'),
(16, 16, 'cash', 'Pending', '2023-04-05 19:48:59', '2023-04-05 19:48:59');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `seat_name` varchar(255) NOT NULL,
  `seat_description` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `hall_id` int(11) NOT NULL,
  `seat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat_name`, `seat_description`, `updated_at`, `created_at`, `hall_id`, `seat_image`) VALUES
(1, '4 rounded', 'round table for 4 people', '2022-12-02 11:18:38', '2022-11-15 01:21:39', 2, 'seat-images/4 rounded.jpg'),
(2, '10 bigger', '10 people can sit', '2022-11-20 13:56:34', '2022-11-20 13:56:34', 1, 'seat-images/table 5.jpg'),
(3, '6 rec', 'for 6 people', '2022-11-20 13:56:47', '2022-11-20 13:56:47', 2, 'seat-images/table 4.jpg'),
(4, '4 square', '4 people can site in front face', '2022-12-02 08:31:29', '2022-12-02 08:31:29', 1, 'seat-images/table 3.jpg'),
(5, 'elegant', 'elegant des', '2022-12-02 10:39:07', '2022-12-02 10:37:20', 1, 'seat-images/elegant.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `full_name`, `email`, `phone_number`, `city`, `post_code`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Bijli Akter', 'bijliakter47@gmail.com', '01406069547', 'Chattogram', '4300', 'Fatikchori, Chattogram.', '2022-06-15 00:50:31', '2022-06-15 00:50:31'),
(2, 'Bijli Akter', 'bijliakter47@gmail.com', '01406069547', 'Chattogram', '4300', 'Fatikchori, Chattogram.', '2022-06-16 01:07:48', '2022-06-16 01:07:48'),
(3, 'Md Sayem Hossain', 'snimogmw@karenkey.com', '01867622030', 'Chittagong', '4215', 'ascas as  ascascascascascascasc', '2022-11-04 08:55:45', '2022-11-04 08:55:45'),
(4, 'Md Sayem Hossain', 'snimogmw@karenkey.com', '01867622030', 'Chittagong', '4215', 'ascas as  ascascascascascascasc', '2022-11-04 08:57:03', '2022-11-04 08:57:03'),
(5, 'dasdasd asdasdasd', 'snimogmw@karenkey.com', '01867622030', 'v', 'v', 'ascas as  ascascascascascascasc', '2022-11-05 23:18:09', '2022-11-05 23:18:09'),
(6, 'habib ullah', 'habibullah@gmail.com', '01867622211', 'Chittagong', '4215', 'bandar chittagong', '2022-11-24 13:56:38', '2022-11-24 13:56:38'),
(7, 'chinmoy das gupta', 'snimogmw@karenkey.com', '0125121516', 'Chittagong', '4215', 'sa das sa asfas fasf f af af a fs asf s afa', '2022-12-02 08:28:15', '2022-12-02 08:28:15'),
(8, 'chinmoy das gupta', 'snimogmw@karenkey.com', '0125121516', 'sa', 'as', 'sa das sa asfas fasf f af af a fs asf s afa', '2022-12-08 09:41:55', '2022-12-08 09:41:55'),
(9, 'habib ullah', 'habibullah@gmail.com', '01867622211', 'Chattogram', '4565', 'bandar chittagong', '2022-12-07 19:50:04', '2022-12-07 19:50:04'),
(10, 'halim uddin', 'halimuddin960@gmail.com', '01830482410', 'Chattogram', '4532', 'fatickcharr,azim nagar', '2023-04-05 19:26:26', '2023-04-05 19:26:26');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hafsa Akther', 'hafsaakter@gmail.com', NULL, '$2y$10$aJs.I5JjJaUwH6ktS5XavOVmrOK11hL8sAACY/v0aOn9UIHkyNS1e', NULL, '2022-06-14 23:21:17', '2022-06-14 23:21:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
