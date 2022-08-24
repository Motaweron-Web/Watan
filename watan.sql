-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 04:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'احمد يحيي', 'admin@admin.com', '$2y$10$.JU9IVY4Tf5LvpN2UFxh3upmuTgpzWSX7Ddoqtx.k78jD5nKeWLNC', 'assets/uploads/admins/66161658316929.webp', NULL, '2022-07-20 11:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name_ar`, `name_en`, `image`, `about`, `phone`, `phone_code`, `whatsapp`, `user_id`, `company_id`, `created_at`, `updated_at`) VALUES
(5, 'أحمد طارق عباس يحيي', 'Ahmed Tariq Abbas Yahya', NULL, 'مهندس اول استشاري بدرجة امتياز مع مرتبة الشرف', '1054778789987', '+20', '+201098380656', 1, 3, '2022-08-24 13:38:42', '2022-08-24 13:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'بغداد', 'Baghdad', 'assets/uploads/area/35041661158340.webp', '2022-08-21 07:44:37', '2022-08-22 08:52:20'),
(6, 'البصرة', 'Basra', 'assets/uploads/area/47011661158443.webp', '2022-08-22 08:54:03', '2022-08-22 08:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name_ar`, `name_en`, `image`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(3, 'توصيل فوري', 'Fast Delivery', 'assets/uploads/blogs/61181661266380.png', '<p><strong>النقاط هو&nbsp;</strong></p>', '<p><em><strong>Hello World</strong></em></p>', '2022-08-22 12:19:54', '2022-08-23 14:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(2, 'فلل', 'velal', '2022-08-21 15:10:47', '2022-08-23 14:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `about_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name_ar`, `name_en`, `image`, `number`, `whatsapp`, `facebook`, `instagram`, `twitter`, `latitude`, `longitude`, `about_ar`, `about_en`, `user_id`, `created_at`, `updated_at`) VALUES
(3, ' هوم تاون للاسكان والتعمير', 'Home Town Housing and Development Company', NULL, '01098888545', '+2001098888500', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 33.20554858, 30.20554858, 'شركة هوم تاون من كبرى الشركات العاملة في قطاع العقارات، وبرزت hometown developments من بين مئات الشركات الأخرى بفضل مشروعاتها العصرية التي تراعي رغبات ومتطلبات عملائها، وتضمن توفير أقصى درجات الراحة والمتعة لهم، لذلك من الطبيعي أن تحتل مركز رائد في القطاع العقاري.', 'Hometown is one of the largest companies operating in the real estate sector, and hometown developments has emerged among hundreds of other companies thanks to its modern projects that take into account the desires and requirements of its customers, and ensure the utmost comfort and pleasure for them, so it is natural to occupy a leading position in the real estate sector.', 1, '2022-08-24 13:34:29', '2022-08-24 13:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `files_of_projects_and_posts`
--

CREATE TABLE `files_of_projects_and_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('image','video','file') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files_of_projects_and_posts`
--

INSERT INTO `files_of_projects_and_posts` (`id`, `project_id`, `post_id`, `attachment`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'assets/uploads/projects/1.png', 'image', NULL, NULL),
(2, 2, NULL, 'assets/uploads/projects/2.png', 'image', NULL, NULL),
(3, 2, NULL, 'assets/uploads/projects/3.png', 'image', NULL, NULL),
(4, 2, NULL, 'assets/uploads/projects/4.png', 'image', NULL, NULL),
(5, 2, NULL, 'assets/uploads/projects/5.png', 'file', NULL, NULL),
(6, 2, NULL, 'assets/uploads/projects/6.png', 'image', NULL, NULL),
(7, 2, NULL, 'assets/uploads/projects/99.mp4', 'video', NULL, NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_20_123415_create_admins_table', 1),
(4, '2022_03_20_134518_create_settings_table', 1),
(5, '2022_08_18_144158_create_sliders_table', 2),
(6, '2022_08_18_162530_create_areas_table', 3),
(7, '2022_08_18_162552_create_sub_areas_table', 3),
(8, '2022_08_21_164212_create_categories_table', 4),
(9, '2022_08_22_095635_create_sub_categories_table', 5),
(11, '2022_07_21_143846_create_users_table', 6),
(12, '2022_08_22_111452_create_companies_table', 6),
(13, '2022_08_02_160430_create_agents_table', 7),
(14, '2022_08_22_110612_create_services_table', 7),
(15, '2022_08_22_131435_create_blogs_table', 7),
(16, '2022_08_23_123108_create_projects_table', 8);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `min_price` double DEFAULT NULL,
  `max_price` double DEFAULT NULL,
  `project_status` enum('new','ongoing','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `area_range` double DEFAULT NULL,
  `min_price_of_meter` double DEFAULT NULL,
  `max_price_of_meter` double DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_invested` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `company_id`, `agent_id`, `user_id`, `category_id`, `sub_category_id`, `latitude`, `longitude`, `min_price`, `max_price`, `project_status`, `area_range`, `min_price_of_meter`, `max_price_of_meter`, `desc`, `payment_terms`, `payment_details`, `is_invested`, `created_at`, `updated_at`) VALUES
(2, 'مشروع العاصمة الادارية', 3, 5, NULL, 2, 2, 30.71541029954, 29.21541910954, 110000, 175000, 'ongoing', 270, 2200, 5500, 'وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع وصف المشورع', 'شروط الدفع شروط الدفع شروط الدفع شروط الدفعشروط الدفع شروط الدفع شروط الدفع شروط الدفع شروط الدفع شروط الدفعشروط الدفع شروط الدفع شروط الدفعشروط الدفع شروط الدفعشروط الدفع شروط الدفع شروط الدفع شروط الدفع شروط الدفع شروط الدفع', 'تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع تفاصيل الدفع ', '0', '2022-08-23 14:24:33', '2022-08-23 14:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_ar`, `name_en`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'تنظيف', 'clean', 'assets/uploads/service/images/19821661162251.webp', 'assets/uploads/service/icons/66431661330498.png', '2022-08-22 09:57:31', '2022-08-24 08:41:38'),
(2, 'اثاث', 'fignature', 'assets/uploads/service/images/18761661162522.webp', 'assets/uploads/service/icons/11661661330458.png', '2022-08-22 10:02:02', '2022-08-24 08:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_chat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `about_us`, `terms`, `privacy`, `facebook`, `insta`, `twitter`, `snap_chat`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'تطبيق وطن', NULL, 'مرحبا ', 'أن يكون المستخدم ذا أهلية قانونية كاملة للتعاقد والتعامل. اذا كان المستخدم عمره يقل عن 18 عاما يستوجب عليه ان يقوم بالحصول على موافقة والديه أو وصيه للقيام بذلك. ان يقر ويتعهد المستخدم بانه يتمتع بالحق والقدرة القانونية على استخدام موقع وتطبيق معاك حسب ما هو منصوص عليه في هذه الشروط والأحكام.', 'نحن سعداء بكونكم احد عملائنا ، الأمر الذي يستدعي قبولكم الضمني لسياسه الخصوصية الخاصة بتطبيق الفلتر.\n\nهذا الإشعار بالإضافة إلى سياسه الخصوصية الخاصّين بتطبيق الفلتر، يُحددان نوع المعلومات اللازم جمعها عن مستخدمين التطبيق من اجل تقديم الخدمة وتنفيذ طلبات عملائنا بالشكل المناسب .\n\nتنظم هذه الوثيقة مُعالجه بيانات العملاء من نواحي الجمع ، و التخزين ، والولوج ، والاستخدام ، و أخيراً الإهلاك ، بجانب أي صوره اخرى مستلزمة لتقديم الخدمة.\n\nالغرض من جمع أي معلومات عن العميل هو إدارة العمل اليومي بقطاعاتنا من أجل تقديم الخدمة ، بالإضافة إلى تحسين تجربة المستخدمين  ،  ، فضلاً عن الإدارة السليمة للحجم الهائل من المعلومات الشخصية. نحن مستمرون في تعزيز ثقة المستخدم في طريقة تعاملنا مع المعلومات الشخصية الخاصة بهم وتقديم الخدمات بشكل متميز.\n\nمتى نقوم بجمع معلومات الشخصيه ؟\nعلى سبيل المثال، نجمع معلوماتك الشخصية عند:\n\nشراء أو استخدام أي من منتجاتنا وخدماتنا.\n\nالاتصال بنا من خلال قنوات الاتصال المختلفة، أو طلب معلومات حول منتج أو خدمة ما.\n\nما هي المعلومات التي نجمعها عنك ؟\n\n\nعند الضرورة، قد نجمع:\n\nاسمك وعنوانك و / أو رقم هاتفك و / أو رقم هاتفك المحمول وعنوان بريدك الإلكتروني \n\nبيانات الاتصال الخاصة بك. وهي البيانات التي نتعرض لها كمتطلب من متطلبات اتمام عملية الشراء', NULL, NULL, NULL, NULL, '+201098877778', '2022-07-12 14:16:58', '2022-07-12 14:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'assets/uploads/sliders/10261661266155.png', 'https://www.youtube.com/watch?v=SOYAoXef4dY&list=RDHMKZWqkVy6s&index=17', '2022-08-18 13:10:07', '2022-08-23 14:49:15'),
(2, 'assets/uploads/sliders/54411661266276.jpg', 'https://www.facebook.com/', '2022-08-23 14:51:16', '2022-08-23 14:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_areas`
--

CREATE TABLE `sub_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_areas`
--

INSERT INTO `sub_areas` (`id`, `name_ar`, `name_en`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', 'elryad', 1, '2022-05-21 07:00:39', '2022-05-21 07:00:39'),
(3, 'Meghan Travisyyyy', 'EricaRowlandyyyyy', 1, '2022-08-21 14:21:17', '2022-08-21 14:40:31'),
(4, 'جدة', 'ثبثب', 1, '2022-08-22 08:15:39', '2022-08-22 08:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name_ar`, `name_en`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'فيلات بحمامات سباحة', 'With Bools', 'assets/uploads/subCategories/69151661264626.jpg', 2, '2022-05-21 07:00:39', '2022-08-23 14:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 is blocked , 1 is not blocked',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `whatsapp`, `phone`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمد خالد', 'mo@gmail.com', '+2001010154407', '+2001010448889', '%^&%^$%^#$%#$%ERDSFSDFSDF@#$@#$@#$%$%RT', '1.png', '1', NULL, '2022-08-22 11:36:02', '2022-08-22 11:46:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agents_user_id_foreign` (`user_id`),
  ADD KEY `agents_company_id_foreign` (`company_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files_of_projects_and_posts`
--
ALTER TABLE `files_of_projects_and_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_of_projects_and_posts_projects_id_foreign` (`project_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_agent_id_foreign` (`agent_id`),
  ADD KEY `projects_category_id_foreign` (`category_id`),
  ADD KEY `projects_company_id_foreign` (`company_id`),
  ADD KEY `projects_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_areas`
--
ALTER TABLE `sub_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_areas_area_id_foreign` (`area_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `files_of_projects_and_posts`
--
ALTER TABLE `files_of_projects_and_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_areas`
--
ALTER TABLE `sub_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files_of_projects_and_posts`
--
ALTER TABLE `files_of_projects_and_posts`
  ADD CONSTRAINT `files_of_projects_and_posts_projects_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sub_areas`
--
ALTER TABLE `sub_areas`
  ADD CONSTRAINT `sub_areas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
