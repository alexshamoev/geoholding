-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 22 2022 г., 10:14
-- Версия сервера: 5.7.34
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_template`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bscs`
--

CREATE TABLE `bscs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `configuration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bscs`
--

INSERT INTO `bscs` (`id`, `system_word`, `configuration`, `created_at`, `updated_at`) VALUES
(1, 'admin_email', 'programmers@hobbystudio.ge', '2022-03-17 09:12:14', '2022-03-17 09:12:24'),
(2, 'facebook_link', 'https://facebook.com', '2022-03-17 09:12:33', '2022-03-17 09:12:50'),
(3, 'instagram_link', 'https://instagram.com\'', '2022-03-17 09:12:59', '2022-03-17 09:13:20'),
(4, 'twitter_link', 'https://twitter.com', '2022-03-17 09:13:28', '2022-03-17 09:13:46'),
(5, 'phone_number', '+995 000 00 00 00; +995 000 00 00 00', '2022-03-17 09:13:57', '2022-03-17 09:14:19'),
(6, 'cordinate_x', '41.74353604308457', '2022-03-17 09:14:38', '2022-03-17 09:15:18'),
(7, 'cordinate_y', '44.73493873215938', '2022-03-17 09:15:19', '2022-03-17 09:15:29'),
(8, 'map_number', '17', '2022-03-17 09:15:31', '2022-03-17 09:16:15');

-- --------------------------------------------------------

--
-- Структура таблицы `bsws`
--

CREATE TABLE `bsws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `word_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `word_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `word_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bsws`
--

INSERT INTO `bsws` (`id`, `system_word`, `word_ge`, `word_en`, `word_ru`, `created_at`, `updated_at`) VALUES
(1, 'address', 'თბილისი', 'Tbilisi', 'Тбилиси', '2022-03-17 09:53:39', '2022-03-17 09:53:52');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `full_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `disable` int(11) NOT NULL DEFAULT '0',
  `like_default` int(11) NOT NULL DEFAULT '0',
  `like_default_for_admin` int(11) NOT NULL DEFAULT '0',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `title`, `full_title`, `disable`, `like_default`, `like_default_for_admin`, `rang`, `created_at`, `updated_at`) VALUES
(97, 'ru', 'Ру', 0, 0, 0, 0, NULL, '2022-03-18 10:57:40'),
(99, 'ge', 'ქა', 0, 1, 1, 10, NULL, '2022-03-18 10:57:40'),
(104, 'en', 'En', 0, 0, 0, 5, '2021-01-15 14:23:35', '2022-03-18 10:57:40');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_buttons_link_types`
--

CREATE TABLE `menu_buttons_link_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_buttons_link_types`
--

INSERT INTO `menu_buttons_link_types` (`id`, `title_ge`, `title_en`, `title_ru`, `option_value`, `rang`, `created_at`, `updated_at`) VALUES
(1, 'მივაბათ გვერდი', 'Attach page', 'Прикрепить страницу', 'page', 20, NULL, NULL),
(2, 'თავისუფალი ბმული', 'Free link', 'Свободная ссылка', 'free_link', 15, NULL, NULL),
(3, 'ბმულის გარეშე', 'Without link', 'Без ссылки', 'without_link', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_buttons_step_0`
--

CREATE TABLE `menu_buttons_step_0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rang` int(11) NOT NULL DEFAULT '0',
  `free_link_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `free_link_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `free_link_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `module_step` int(11) NOT NULL DEFAULT '0',
  `open_in_new_tab` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_buttons_step_0`
--

INSERT INTO `menu_buttons_step_0` (`id`, `title_ge`, `title_en`, `title_ru`, `page_id`, `created_at`, `updated_at`, `rang`, `free_link_ge`, `free_link_en`, `free_link_ru`, `link_type`, `module_step`, `open_in_new_tab`) VALUES
(1, 'ჩვენს შესახებ', 'About Us', 'О Нас', 1, NULL, NULL, 15, '', '', '', 'page', 0, 0),
(2, 'კონტაქტი', 'Contact', 'Контакты', 2, NULL, NULL, 0, '', '', '', 'page', 0, 0),
(3, 'მთავარი', 'Home', 'Главная', 3, NULL, NULL, 20, '', '', '', 'page', 0, 0),
(4, 'სიახლეები', 'News', 'Новости', 4, NULL, NULL, 10, '', '', '', 'page', 0, 0),
(5, 'ფოტო გალერეა', 'Photo Gallery', 'Фото Галерея', 7, NULL, NULL, 5, '', '', '', 'page', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_buttons_step_1`
--

CREATE TABLE `menu_buttons_step_1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `free_link_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `free_link_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `free_link_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `module_step` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `open_in_new_tab` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_buttons_step_1`
--

INSERT INTO `menu_buttons_step_1` (`id`, `title_ge`, `title_en`, `title_ru`, `free_link_ge`, `free_link_en`, `free_link_ru`, `link_type`, `module_step`, `page_id`, `open_in_new_tab`, `parent`, `rang`, `created_at`, `updated_at`) VALUES
(2, 'ჩვენს შესახებ', 'About Us', 'О Нас', '', '', '', 'page', 0, 1, 0, 3, 0, NULL, NULL),
(3, 'რეგისტრაცია', 'Registration', 'Регистрация', '', '', '', 'page', 0, 5, 0, 3, 0, NULL, NULL),
(4, 'ფოტო გალერეა', 'Photo Gallery', 'Фото Галерея', '', '', '', 'page', 0, 7, 0, 4, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_09_04_195202_create_contacts_table', 1),
(4, '2020_12_20_072555_create_pages_table', 1),
(5, '2020_12_20_211931_create_menu_buttons_table', 1),
(6, '2020_12_23_212227_create_languages_table', 1),
(7, '2020_12_24_193312_add_like_default_to_pages_table', 1),
(8, '2020_12_26_212637_add_published_to_languages_table', 1),
(9, '2020_12_26_212753_add_published_to_menu_buttons_table', 1),
(10, '2020_12_26_212844_add_published_to_pages_table', 1),
(11, '2020_12_27_165614_create_news_table', 1),
(12, '2020_12_27_174936_create_modules_table', 1),
(13, '2021_01_02_201253_create_module_steps_table', 1),
(14, '2021_01_02_201348_create_module_blocks_table', 1),
(15, '2021_01_08_204800_change_hide_for_admin_column_type_in_modules_table', 1),
(16, '2021_01_09_091808_create_bscs_table', 1),
(17, '2021_01_13_200046_create_bsws_table', 1),
(18, '2021_02_20_183026_create_modules_includes_values', 1),
(19, '2021_02_20_183214_create_modules_not_includes_values', 1),
(20, '2021_02_27_204732_pages_add_slug_column', 1),
(21, '2021_03_01_201603_module_blocks_remove_columns', 1),
(22, '2021_03_19_115340_create_partners_step_0', 1),
(23, '2021_03_27_194935_modules_delete_columns', 1),
(24, '2021_03_27_195323_modules_add_title_column', 1),
(25, '2021_05_07_115511_create_photo_gallery_step_0', 1),
(26, '2021_05_24_141441_add_menu_buttons_step_0', 1),
(27, '2021_05_25_085144_add_temp_category_in_pages', 1),
(28, '2021_05_25_111857_add_sort_by_in_module_blocks', 1),
(29, '2021_05_25_140928_create_news_step_1', 1),
(30, '2021_05_28_081155_create_news_step_2', 1),
(31, '2021_05_28_134143_create_news_step_3', 1),
(32, '2021_06_01_115200_add_checkbox_in_news_step_0', 1),
(33, '2021_06_03_092703_add_multi_checkbox_cat_in_news', 1),
(34, '2021_06_04_133530_rename_news_to_news_step_0', 1),
(35, '2021_06_04_134227_rename_page_to_pages_step_0', 1),
(36, '2021_07_26_165704_add_validation_in_module_blocks', 1),
(37, '2021_08_03_101005_remove_reqiured_from_module_blocks', 1),
(38, '2021_09_19_192803_add_alias_to_photo_gallery_step_0', 2),
(39, '2021_09_20_194213_add_text_to_photo_gallery_step_0', 3),
(40, '2021_10_14_182741_add_fit_position_to_module_blocks', 4),
(41, '2021_11_15_132211_rename_cover_and_fill', 5),
(42, '2021_11_15_144617_change_fit_type_delete_resize', 5),
(43, '2021_11_16_125634_add_columns', 6),
(44, '2021_11_17_084541_create_photo_gallery_step_1', 6),
(45, '2021_11_19_105228_add_prefix_in_module_blocks', 7),
(46, '2021_11_22_142514_change_texts_columns_types', 8),
(47, '2021_11_24_165548_remove_category_from_pages', 9),
(48, '2021_11_24_142922_change_text_columns_photo_gallery_step_0', 10),
(50, '2021_12_13_200636_create_menu_buttons_step_1', 11),
(52, '2021_12_14_095630_create_menu_buttons_link_types', 12),
(53, '2021_12_14_145617_rename_menu_buttons_to_menu_buttons_step_0', 13),
(54, '2021_12_14_151025_add_columns_in_menu_buttons_step_0', 14),
(55, '2022_01_11_101226_page_meta_title_desc', 15),
(56, '2022_01_11_143814_photo_gallery_step_0_meta_info', 15),
(57, '2022_01_11_143852_photo_gallery_step_1_meta_info', 15),
(58, '2022_01_12_072838_news_step_0_meta_info', 16),
(59, '2022_01_12_082904_news_step_1_meta_info', 16),
(60, '2022_01_12_083608_news_step_2_meta_info', 16),
(61, '2022_01_12_083647_news_step_3_meta_info', 16),
(62, '2022_01_24_115629_users_add_super_administrator', 17),
(67, '2022_01_27_140337_bsw_change_nullable_values', 18),
(68, '2022_01_27_142434_bsc_change_nullable_values', 18),
(69, '2022_01_27_153237_languages_change_nullable_values', 19),
(70, '2022_01_27_163902_modules_change_nullable_values', 20),
(71, '2022_01_27_164420_drop_published_column_from_partners', 21),
(72, '2022_01_27_133645_add_columns_in_contacts_step_0', 22),
(73, '2022_01_27_143622_remove_published_from_languages', 22),
(74, '2022_01_28_113801_drop_published_column_from_menu_buttons_link_types', 23),
(75, '2022_01_28_114059_drop_published_column_from_menu_buttons_step_0', 24),
(76, '2022_01_28_114154_drop_published_column_from_menu_buttons_step_1', 25),
(77, '2022_01_28_114446_drop_published_column_from_news_step_0', 26),
(78, '2022_01_28_114539_drop_published_column_from_news_step_1', 27),
(79, '2022_01_28_114625_drop_published_column_from_news_step_2', 28),
(80, '2022_01_28_114810_drop_published_column_from_news_step_3', 29),
(81, '2022_01_28_115028_drop_published_column_from_pages_step_0', 30),
(82, '2022_01_28_115118_drop_published_column_from_photo_gallery_step_0', 31),
(83, '2022_01_28_115152_drop_published_column_from_photo_gallery_step_1', 32),
(84, '2022_01_31_112416_drop_published_column_from_news_step_3', 33),
(85, '2022_01_31_134312_remove_check_in_delete_empty_from_module_blocks', 34),
(86, '2022_03_01_161319_rename_page_column_in_menu_buttons_step_0', 35),
(87, '2022_03_01_174929_rename_page_column_in_menu_buttons_step_1', 36),
(88, '2022_03_03_091609_remove_contacts_table', 37),
(89, '2022_03_10_161211_rename_page_in_modules', 38);

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `include_type` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `page_id` int(11) NOT NULL DEFAULT '0',
  `hide_for_admin` int(11) NOT NULL DEFAULT '0',
  `icon_bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`id`, `include_type`, `alias`, `title`, `page_id`, `hide_for_admin`, `icon_bg_color`, `rang`, `created_at`, `updated_at`) VALUES
(1, 2, 'news', 'სიახლეები', 4, 0, '#aabbaa', 5, NULL, '2021-06-04 09:37:40'),
(7, 0, 'photo_gallery', 'ფოტო გალერეა', 7, 0, '#9929bd', 15, '2021-01-02 15:39:38', '2022-03-11 07:11:17'),
(14, 2, 'partners', 'პარტნიორები', 0, 1, '#d39d00', 10, '2021-01-17 16:57:15', '2021-05-24 10:22:14'),
(15, 4, 'pages', 'გვერდები', 0, 0, '#669d34', 20, '2021-04-16 09:14:00', '2022-03-03 15:09:25'),
(16, 1, 'menu_buttons', 'ღილაკების მენიუ', 0, 0, '#e32400', 0, '2021-05-03 07:13:02', '2021-05-07 08:05:05'),
(17, 1, 'header', 'Header', 0, 1, '#4d22b4', 5, '2021-06-09 11:00:03', '2022-01-14 06:02:20'),
(18, 1, 'footer', 'Footer', 0, 1, '#c4bc00', 0, '2021-06-09 11:06:05', '2022-01-14 06:02:11'),
(19, 0, 'contacts', 'კონტაქტი', 2, 0, '#5e30eb', 0, '2022-01-14 05:20:51', '2022-03-11 07:19:04'),
(20, 4, 'admins', 'ადმინები', 0, 0, '#d58400', 0, '2022-01-21 08:37:41', '2022-01-21 08:38:21'),
(21, 4, 'users', 'რეგისტრირებული მომხმარებლები', 0, 0, '#fec700', 0, '2022-01-25 10:46:39', '2022-01-25 10:47:03'),
(22, 0, 'home', 'მთავარი', 3, 1, '#ffa57d', 0, '2022-03-11 12:27:45', '2022-03-11 12:47:24');

-- --------------------------------------------------------

--
-- Структура таблицы `modules_includes_values`
--

CREATE TABLE `modules_includes_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` int(11) NOT NULL DEFAULT '0',
  `include_in` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `modules_includes_values`
--

INSERT INTO `modules_includes_values` (`id`, `module`, `include_in`, `created_at`, `updated_at`) VALUES
(26, 14, 1, '2021-05-24 10:22:14', '2021-05-24 10:22:14'),
(27, 14, 3, '2021-05-24 10:22:14', '2021-05-24 10:22:14'),
(30, 1, 1, '2021-06-04 09:37:40', '2021-06-04 09:37:40'),
(31, 1, 2, '2021-06-04 09:37:40', '2021-06-04 09:37:40');

-- --------------------------------------------------------

--
-- Структура таблицы `modules_not_includes_values`
--

CREATE TABLE `modules_not_includes_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` int(11) NOT NULL DEFAULT '0',
  `include_in` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `module_blocks`
--

CREATE TABLE `module_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_level` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `a_use_for_sort` int(11) NOT NULL DEFAULT '0',
  `sort_by_desc` int(11) NOT NULL DEFAULT '0',
  `a_use_for_tags` int(11) NOT NULL DEFAULT '0',
  `file_possibility_to_delete` int(11) NOT NULL DEFAULT '0',
  `image_width` int(11) NOT NULL DEFAULT '0',
  `image_height` int(11) NOT NULL DEFAULT '0',
  `fit_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image_fill` int(11) NOT NULL DEFAULT '0',
  `image_width_1` int(11) NOT NULL DEFAULT '0',
  `image_height_1` int(11) NOT NULL DEFAULT '0',
  `fit_type_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image_fill_1` int(11) NOT NULL DEFAULT '0',
  `image_width_2` int(11) NOT NULL DEFAULT '0',
  `image_height_2` int(11) NOT NULL DEFAULT '0',
  `fit_type_2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image_fill_2` int(11) NOT NULL DEFAULT '0',
  `image_width_3` int(11) NOT NULL DEFAULT '0',
  `image_height_3` int(11) NOT NULL DEFAULT '0',
  `fit_type_3` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image_fill_3` int(11) NOT NULL DEFAULT '0',
  `hide` int(11) NOT NULL DEFAULT '0',
  `rang` int(11) NOT NULL DEFAULT '0',
  `min_range` int(11) NOT NULL DEFAULT '0',
  `max_range` int(11) NOT NULL DEFAULT '0',
  `range_step` int(11) NOT NULL DEFAULT '0',
  `range_value` int(11) NOT NULL DEFAULT '0',
  `db_column` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `example` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_sort_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_search_column` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_option_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_optgroup_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_optgroup_sort_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_optgroup_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_option_2_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_optgroup_2_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_optgroup_2_sort_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_optgroup_2_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_active_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_first_option_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `select_first_option_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `label_for_ajax_select` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_name_index_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_name_index_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_name_index_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `radio_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `radio_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sql_select_with_checkboxes_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sql_select_with_checkboxes_sort_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sql_select_with_checkboxes_option_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sql_select_with_checkboxes_table_inside` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sql_select_with_checkboxes_sort_by_inside` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sql_select_with_checkboxes_option_text_inside` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `params_values_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `div_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `select_sort_by_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'desc',
  `validation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fit_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prefix_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prefix_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prefix_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prefix` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `module_blocks`
--

INSERT INTO `module_blocks` (`id`, `top_level`, `type`, `a_use_for_sort`, `sort_by_desc`, `a_use_for_tags`, `file_possibility_to_delete`, `image_width`, `image_height`, `fit_type`, `image_fill`, `image_width_1`, `image_height_1`, `fit_type_1`, `image_fill_1`, `image_width_2`, `image_height_2`, `fit_type_2`, `image_fill_2`, `image_width_3`, `image_height_3`, `fit_type_3`, `image_fill_3`, `hide`, `rang`, `min_range`, `max_range`, `range_step`, `range_value`, `db_column`, `label`, `example`, `select_table`, `select_condition`, `select_sort_by`, `select_search_column`, `select_option_text`, `select_optgroup_table`, `select_optgroup_sort_by`, `select_optgroup_text`, `select_option_2_text`, `select_optgroup_2_table`, `select_optgroup_2_sort_by`, `select_optgroup_2_text`, `select_active_option`, `select_first_option_value`, `select_first_option_text`, `label_for_ajax_select`, `file_folder`, `file_title`, `file_format`, `file_name_index_1`, `file_name_index_2`, `file_name_index_3`, `radio_value`, `radio_class`, `sql_select_with_checkboxes_table`, `sql_select_with_checkboxes_sort_by`, `sql_select_with_checkboxes_option_text`, `sql_select_with_checkboxes_table_inside`, `sql_select_with_checkboxes_sort_by_inside`, `sql_select_with_checkboxes_option_text_inside`, `params_values_table`, `div_id`, `created_at`, `updated_at`, `select_sort_by_text`, `validation`, `fit_position`, `prefix_1`, `prefix_2`, `prefix_3`, `prefix`) VALUES
(9, 28, 'alias', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 30, 0, 0, 0, 0, 'alias', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-01-22 11:32:25', '2022-02-04 06:42:14', 'desc', 'required', 'top-left', '', '', '', ''),
(12, 10, '0', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 'asdfsыыыы 222', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-01-22 11:37:17', '2021-01-22 12:29:04', 'desc', '', '', '', '', '', ''),
(13, 28, 'input_with_languages', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 25, 0, 0, 0, 0, 'title', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-02-08 12:47:57', '2022-02-04 06:42:30', 'desc', '', 'top-left', '', '', '', ''),
(16, 31, 'input_with_languages', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 30, 0, 0, 0, 0, 'title', 'დასახელება', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-03-19 03:59:48', '2021-10-14 13:04:05', 'desc', '', '', '', '', '', ''),
(19, 31, 'rang', 1, 1, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 5, 0, 0, 0, 0, 'rang', 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-03-19 04:01:13', '2021-04-18 22:36:56', 'desc', '', '', '', '', '', ''),
(21, 31, 'input', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 15, 0, 0, 0, 0, 'link', 'ბმული', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-03-19 04:02:06', '2021-10-14 13:04:56', 'desc', '', '', '', '', '', ''),
(23, 8, 'editor_with_languages', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 20, 0, 0, 0, 0, 'text', 'ტექსტი', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:03:27', '2022-03-08 10:09:04', 'desc', 'required', 'top-left', '', '', '', ''),
(26, 8, 'alias', 1, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 50, 0, 0, 0, 0, 'alias', 'Alias', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:06:40', '2022-03-11 07:33:16', 'desc', 'required', 'top-left', '', '', '', ''),
(29, 8, 'input_with_languages', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 35, 0, 0, 0, 0, 'title', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:07:50', '2022-03-08 10:08:28', 'desc', 'required', 'top-left', '', '', '', ''),
(33, 32, 'select', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 20, 0, 0, 0, 0, 'page_id', 'გვერდი', '', 'pages_step_0', '', 'alias_ge', 'id', 'alias_ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:37:53', '2022-03-01 13:57:25', 'asc', '', 'top-left', '', '', '', ''),
(34, 32, 'input_with_languages', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 30, 0, 0, 0, 0, 'title', 'დასახელება', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:38:30', '2021-12-17 15:00:04', 'desc', 'required', 'top-left', '', '', '', ''),
(37, 2, 'rang', 1, 1, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 15, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 04:02:45', '2021-09-22 14:43:30', 'desc', '', '', '', '', '', ''),
(41, 2, 'input_with_languages', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 30, 0, 0, 0, 0, 'title', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 04:03:57', '2022-03-03 06:23:06', 'desc', '', 'top-left', '', '', '', ''),
(42, 28, 'rang', 1, 1, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 'rang', 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-24 05:57:43', '2021-06-01 06:07:10', 'desc', '', '', '', '', '', ''),
(43, 32, 'rang', 1, 1, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 5, 0, 0, 0, 0, 'rang', 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-24 06:08:40', '2021-05-24 06:13:18', 'desc', '', '', '', '', '', ''),
(47, 29, 'rang', 1, 1, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:15:30', '2021-05-25 06:15:40', 'desc', '', '', '', '', '', ''),
(50, 29, 'input_with_languages', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 20, 0, 0, 0, 0, 'title', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:24:00', '2021-11-17 05:48:36', 'desc', '', 'top-left', '', '', '', ''),
(53, 29, 'editor_with_languages', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 15, 0, 0, 0, 0, 'text', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:25:12', '2021-11-17 05:49:02', 'desc', '', 'top-left', '', '', '', ''),
(56, 29, 'alias', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 25, 0, 0, 0, 0, 'alias', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:27:47', '2021-12-20 11:05:44', 'desc', 'required', 'top-left', '', '', '', ''),
(58, 30, 'rang', 1, 1, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:14:35', '2021-05-28 00:14:53', 'desc', '', '', '', '', '', ''),
(59, 30, 'editor_with_languages', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 15, 0, 0, 0, 0, 'text', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:14:55', '2021-11-23 08:40:36', 'desc', '', 'top-left', '', '', '', ''),
(62, 30, 'input_with_languages', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 20, 0, 0, 0, 0, 'title', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:15:47', '2021-12-07 14:00:42', 'desc', '', 'top-left', '', '', '', ''),
(65, 30, 'alias', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 25, 0, 0, 0, 0, 'alias', 'sss', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:16:29', '2021-12-20 12:12:04', 'desc', 'required', 'top-left', '', '', '', ''),
(69, 33, 'rang', 1, 1, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:43:02', '2021-05-28 05:43:10', 'desc', '', '', '', '', '', ''),
(70, 33, 'input_with_languages', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 20, 0, 0, 0, 0, 'title', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:43:12', '2021-11-23 10:11:30', 'desc', '', 'top-left', '', '', '', ''),
(73, 33, 'alias', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 25, 0, 0, 0, 0, 'alias', 'Alias Ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:44:39', '2021-11-23 10:11:08', 'desc', '', 'top-left', '', '', '', ''),
(78, 28, 'checkbox', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 10, 0, 0, 0, 0, 'checkbox', 'Checkbox', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-06-01 04:02:50', '2021-06-01 05:59:51', 'desc', '', '', '', '', '', ''),
(79, 28, 'calendar', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 5, 0, 0, 0, 0, 'calendar', 'calendar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-06-01 06:09:34', '2021-06-01 06:38:35', 'desc', '', '', '', '', '', ''),
(80, 28, 'image', 0, 0, 0, 1, 600, 400, 'fit', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 15, 0, 0, 0, 0, 'image', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', 'news_step_0', 'rang', 'title_ge', 'news_step_1', 'rang', 'title_ge', '', '', '2021-06-03 01:28:20', '2022-01-19 04:18:22', 'desc', '', 'top-left', '', '', '', ''),
(81, 31, 'image', 0, 0, 0, 0, 400, 400, 'fit', 1, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 10, 0, 0, 0, 0, 'image', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'png', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-17 13:25:38', '2021-12-22 06:14:18', 'desc', '', 'center', '', '', '', ''),
(82, 2, 'image', 0, 0, 0, 0, 500, 300, 'fit', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 25, 0, 0, 0, 0, 'image', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-17 15:39:12', '2021-11-26 07:16:32', 'desc', '', 'center', '', '', '', ''),
(83, 2, 'alias', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 35, 0, 0, 0, 0, 'alias', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-19 15:31:50', '2022-01-20 06:07:26', 'desc', 'required', 'top-left', '', '', '', ''),
(84, 28, 'editor_with_languages', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 20, 0, 0, 0, 0, 'text', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-20 15:36:48', '2021-09-20 15:37:02', 'desc', '', '', '', '', '', ''),
(85, 2, 'editor_with_languages', 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, '0', 0, 0, 20, 0, 0, 0, 0, 'text', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-20 15:40:12', '2021-09-20 15:40:27', 'desc', '', '', '', '', '', ''),
(86, 29, 'image', 0, 0, 0, 0, 700, 400, 'fit', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 10, 0, 0, 0, 0, 'image', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-11-17 05:49:30', '2021-11-27 13:50:13', 'desc', '', 'center', '', '', '', ''),
(88, 34, 'input_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 15, 0, 0, 0, 0, 'title', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-11-17 10:32:56', '2021-11-18 11:32:06', 'desc', '', 'top-left', '', '', '', ''),
(89, 34, 'rang', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-11-18 11:12:01', '2021-11-18 11:12:15', 'desc', '', 'top-left', '', '', '', ''),
(91, 34, 'image', 0, 0, 0, 0, 2000, 1200, 'fit', 0, 300, 300, 'fit', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 10, 0, 0, 0, 0, 'image', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-11-19 05:25:57', '2021-12-22 04:54:53', 'desc', '', 'top-left', 'preview', '', '', ''),
(92, 30, 'image', 0, 0, 0, 0, 600, 400, 'fit', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 10, 0, 0, 0, 0, 'image', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-07 14:03:13', '2021-12-07 14:03:42', 'desc', '', 'center', '', '', '', ''),
(93, 33, 'image', 0, 0, 0, 0, 1000, 700, 'fit', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 10, 0, 0, 0, 0, 'image', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-08 11:52:00', '2021-12-08 11:57:46', 'desc', '', 'top', '', '', '', ''),
(94, 33, 'editor_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 15, 0, 0, 0, 0, 'text', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-08 12:48:22', '2021-12-08 12:48:37', 'desc', '', 'top-left', '', '', '', ''),
(95, 35, 'input_with_languages', 0, 0, 1, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 30, 0, 0, 0, 0, 'title', 'დასახელება', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-13 16:02:52', '2021-12-13 16:03:38', 'desc', '', 'top-left', '', '', '', ''),
(96, 35, 'rang', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-13 16:03:39', '2021-12-13 16:03:55', 'desc', '', 'top-left', '', '', '', ''),
(98, 35, 'select', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 35, 0, 0, 0, 0, 'parent', 'მენიუს ღილაკი', '', 'menu_buttons_step_0', '', 'rang', 'id', 'title_ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-13 16:04:07', '2021-12-14 11:14:18', 'desc', '', 'top-left', '', '', '', ''),
(99, 35, 'input_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 15, 0, 0, 0, 0, 'free_link', 'თავისუფალი ბმული', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-14 05:52:06', '2021-12-14 05:52:43', 'desc', '', 'top-left', '', '', '', ''),
(100, 35, 'select', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 25, 0, 0, 0, 0, 'link_type', 'ბმულის ტიპი', '', 'menu_buttons_link_types', '', 'rang', 'option_value', 'title_ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-14 05:55:05', '2021-12-14 06:03:44', 'desc', '', 'top-left', '', '', '', ''),
(101, 35, 'select', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 20, 0, 0, 0, 0, 'page_id', 'გვერდი', '', 'pages_step_0', '', 'alias_ge', 'id', 'alias_ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-14 07:14:22', '2022-03-01 13:57:35', 'asc', '', 'top-left', '', '', '', ''),
(102, 32, 'select', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 25, 0, 0, 0, 0, 'link_type', 'ბმულის ტიპი', '', 'menu_buttons_link_types', '', 'rang', 'option_value', 'title_ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-14 11:05:54', '2021-12-14 11:06:36', 'desc', '', 'top-left', '', '', '', ''),
(103, 32, 'input_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 15, 0, 0, 0, 0, 'free_link', 'თავისუფალი ბმული', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-14 11:17:53', '2021-12-14 11:18:05', 'desc', '', 'top-left', '', '', '', ''),
(104, 32, 'checkbox', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 10, 0, 0, 0, 0, 'open_in_new_tab', 'გავხსნათ ბმული ახალ ფანჯარაში', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-14 13:26:24', '2021-12-14 13:27:01', 'desc', '', 'top-left', '', '', '', ''),
(105, 35, 'checkbox', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 10, 0, 0, 0, 0, 'open_in_new_tab', 'გავხსნათ ბმული ახალ ფანჯარაში', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-12-14 13:28:23', '2021-12-14 13:28:38', 'desc', '', 'top-left', '', '', '', ''),
(106, 2, 'input_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 10, 0, 0, 0, 0, 'meta_title', 'მეტა სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-12 03:37:32', '2022-01-12 03:37:53', 'desc', '', 'top-left', '', '', '', ''),
(107, 2, 'input_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 5, 0, 0, 0, 0, 'meta_description', 'მეტა აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-12 03:38:24', '2022-01-12 03:39:07', 'desc', '', 'top-left', '', '', '', ''),
(108, 2, 'image', 0, 0, 0, 0, 400, 400, 'fit', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 'meta_image', 'მეტა ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-12 03:43:21', '2022-03-11 07:13:09', 'desc', '', 'center', '', '', '', 'meta'),
(109, 8, 'input_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 'meta_title', 'მეტა სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-12 03:57:04', '2022-01-12 03:57:30', 'desc', '', 'top-left', '', '', '', ''),
(110, 8, 'input_with_languages', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 'meta_description', 'მეტა აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-12 03:58:12', '2022-01-12 03:58:31', 'desc', '', 'top-left', '', '', '', ''),
(111, 8, 'image', 0, 0, 0, 0, 400, 400, 'fit', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 'meta_image', 'მეტა ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-12 03:58:51', '2022-01-12 03:59:27', 'desc', '', 'center', '', '', '', 'meta');

-- --------------------------------------------------------

--
-- Структура таблицы `module_steps`
--

CREATE TABLE `module_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_level` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `images` int(11) NOT NULL DEFAULT '0',
  `possibility_to_add` int(11) NOT NULL DEFAULT '0',
  `possibility_to_delete` int(11) NOT NULL DEFAULT '0',
  `possibility_to_rang` int(11) NOT NULL DEFAULT '0',
  `possibility_to_edit` int(11) NOT NULL DEFAULT '0',
  `use_existing_step` int(11) NOT NULL DEFAULT '0',
  `blocks_max_number` int(11) NOT NULL DEFAULT '0',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `module_steps`
--

INSERT INTO `module_steps` (`id`, `top_level`, `title`, `db_table`, `images`, `possibility_to_add`, `possibility_to_delete`, `possibility_to_rang`, `possibility_to_edit`, `use_existing_step`, `blocks_max_number`, `rang`, `created_at`, `updated_at`) VALUES
(2, 7, 'კატეგორია', 'photo_gallery_step_0', 1, 1, 1, 1, 1, 0, 1, 5, '2021-01-02 16:48:50', '2022-03-11 12:53:32'),
(8, 15, 'გვერდი', 'pages_step_0', 0, 1, 1, 1, 1, 0, 0, 0, '2021-01-17 16:59:38', '2022-03-08 09:02:01'),
(28, 1, 'კატეგორია', 'news_step_0', 1, 1, 1, 1, 1, 0, 0, 10, '2021-01-22 15:29:52', '2021-12-27 14:37:46'),
(29, 1, 'ქვე-კატეგორია', 'news_step_1', 1, 1, 1, 1, 1, 0, 0, 5, '2021-01-22 16:29:15', '2021-12-27 14:37:12'),
(30, 1, 'სიახლე', 'news_step_2', 1, 1, 1, 1, 1, 0, 0, 0, '2021-01-22 16:29:37', '2021-12-27 14:36:23'),
(31, 14, 'პარტნიორი', 'partners_step_0', 1, 1, 1, 1, 1, 0, 0, 0, '2021-03-19 07:59:03', '2021-10-14 12:59:35'),
(32, 16, 'მენიუს ღილაკი', 'menu_buttons_step_0', 0, 0, 0, 0, 0, 0, 0, 0, '2021-05-07 07:36:36', '2021-12-14 11:14:33'),
(33, 1, 'ფოტო', 'news_step_3', 1, 1, 1, 1, 1, 0, 0, 0, '2021-05-28 09:32:18', '2021-12-27 14:35:45'),
(34, 7, 'ფოტო', 'photo_gallery_step_1', 1, 0, 0, 0, 0, 0, 0, 0, '2021-11-17 10:30:01', '2021-11-17 10:30:19'),
(35, 16, 'ქვე-მენიუს ღილაკი', 'menu_buttons_step_1', 0, 1, 1, 1, 1, 0, 0, 0, '2021-12-13 16:02:11', '2021-12-13 16:02:51');

-- --------------------------------------------------------

--
-- Структура таблицы `news_step_0`
--

CREATE TABLE `news_step_0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ge` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checkbox` int(11) NOT NULL DEFAULT '0',
  `calendar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `multiply_checkbox_catg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_0`
--

INSERT INTO `news_step_0` (`id`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `created_at`, `updated_at`, `checkbox`, `calendar`, `multiply_checkbox_catg`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`) VALUES
(7, 'მესამე-კატეგორია', 'third-category', 'третья', 'მესამე-კატეგორია', 'Third category', 'Третья', '', '', '', 0, NULL, NULL, 0, '', '', '', '', '', '', '', ''),
(9, 'პირველი-კატეგორია', 'first-category', 'первая-категория', 'პირველი კატეგორია პირველი კატეგორია პირველი კატეგორია პირველი კატეგორია პირველი კატეგორია პირველი კატეგორია', 'First Category', 'Первая Категория', '<p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p>', '<p>Text on english.</p>', '<p>Текст на русском.</p>', 5, NULL, NULL, 0, '2021/06/01', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `news_step_1`
--

CREATE TABLE `news_step_1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `alias_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ge` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_1`
--

INSERT INTO `news_step_1` (`id`, `parent`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `created_at`, `updated_at`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`) VALUES
(19, 9, 'პირველი-ქვე-კატეგორია-9-22ee', 'პირველი-ქვე-კატეგორია-9-33www', 'პირველი-ქვე-კატეგორია', 'პირველი-ქვე-კატეგორია-9 66vvvv', 'პირველი-ქვე-კატეგორია-9 77fff', 'პირველი-ქვე-კატეგორია-9 44 qqqq', '<p>fffეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p>', '<p>პირველი-ქვე-კატეგორია-9ewew www</p>', '<p>asdf პირველი-ქვე-კატეგორია-9www</p>', 0, NULL, NULL, '', '', '', '', '', ''),
(24, 7, 'პირველი-ქვე-კატეგორია', 'პირველი-ქვე-კატეგორია', 'პირველი-ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', '<p>პირველი ქვე-კატეგორია</p>', '<p>პირველი ქვე-კატეგორია</p>', '<p>პირველი ქვე-კატეგორია</p>', 0, NULL, NULL, '', '', '', '', '', ''),
(25, 9, 'adf', 'sвап', 'цук', 'asdf', 'qwerty', 'wer', '<p>ee</p>', '<p>ggg</p>', '<p>asdf</p>', 5, NULL, NULL, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `news_step_2`
--

CREATE TABLE `news_step_2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `alias_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ge` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_2`
--

INSERT INTO `news_step_2` (`id`, `parent`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `created_at`, `updated_at`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`) VALUES
(29, 24, 'პირველი-სიახლე', 'პირველი-სიახლე', 'პირველი-სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', '<p>პირველი სიახლე</p>', '<p>პირველი სიახლეპირველი სიახლე</p>', '<p>პირველი სიახლე</p>', 0, NULL, NULL, '', '', '', '', '', ''),
(31, 19, 'ასდფqwe', 'სდფasdf', 'სიახლე', 'ასდფწწწ', 'ეეე სდფგ', 'წერ ეეე', '<p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p>', '<p>ააა</p>', '<p>დდდ</p>', 0, NULL, NULL, '', '', '', '', '', ''),
(33, 19, 'სიახლე-41', 'სიახლე-5', 'სიახლე-გირჩი', 'სიახლე 41', 'სიახლე 5', 'სიახლე 333', '<p>ასდფ</p>', '<p>წერ</p>', '<p>სდფგსდფ</p>', 0, NULL, NULL, '', '', '', '', '', ''),
(40, 25, 'asdf', 'wer', 'wer', '', '', '', '', '', '', 0, NULL, NULL, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `news_step_3`
--

CREATE TABLE `news_step_3` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `alias_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ge` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_3`
--

INSERT INTO `news_step_3` (`id`, `parent`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `created_at`, `updated_at`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`) VALUES
(1, 3, '', '', '', '', '', '', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', '', '', ''),
(2, 3, '', '', '', '', '', '', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', '', '', ''),
(3, 3, '', '', '', '', '', '', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', '', '', ''),
(6, 1, '', '', '', 'ууу', 'ккк', '444', '', '', '', 0, NULL, NULL, '', '', '', '', '', ''),
(11, 1, 'პირველი-ფოტო', 'პირველი-ფოტო', 'პირველი-ფოტო', 'პირველი ფოტო', 'პირველი ფოტო', 'პირველი ფოტო', '', '', '', 5, NULL, NULL, '', '', '', '', '', ''),
(12, 31, 'სდფგ-dddddd-qqq', 'წერ-pdfsss-www', 'ასდფ-wwwsss-rrr', 'სდფგ 11 wwe', 'წერ 2222 www', 'ასდფ qweqwe w', '<p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. .</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p>', '', '', 5, NULL, NULL, '', '', '', '', '', ''),
(13, 31, 'ეეე', 'ასდფ', 'სდფგ', 'ქწერ', '', '', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', '', '', ''),
(14, 33, '', '', '', '', '', '', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', '', '', ''),
(16, 29, 'წერ', 'ასდფ', 'ასდფ', 'ქწე', 'ასდფ', 'სდფგ', '', '', '', 0, NULL, NULL, '', '', '', '', '', ''),
(17, 36, '', '', '', '', '', '', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pages_step_0`
--

CREATE TABLE `pages_step_0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ge` text COLLATE utf8mb4_unicode_ci,
  `alias_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `alias_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `like_default` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages_step_0`
--

INSERT INTO `pages_step_0` (`id`, `alias_ge`, `title_ge`, `text_ge`, `alias_en`, `title_en`, `text_en`, `alias_ru`, `title_ru`, `text_ru`, `created_at`, `updated_at`, `like_default`, `slug`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`) VALUES
(1, 'ჩვენს-შესახებ', 'ჩვენს შესახებ სათაური', '<p>ჩვენს შესახებ ტექსტი</p>', 'about-us', 'About Us Title', '<p>About Us Text</p>', 'о-нас', 'О Нас Название', '<p>О Нас Текст</p>', NULL, NULL, 0, 'about-us', '', '', '', '', '', ''),
(2, 'კონტაქტი', 'კონტაქტი სათაური', 'კონტაქტი ტექსტი', 'contact', 'Contact Title', 'Contact Text', 'контакты', 'Контакты Название', 'Контакты Текст', NULL, NULL, 0, 'contact', '', '', '', '', '', ''),
(3, 'მთავარი', 'მთავარი გვერდი', '<p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p><p>&nbsp;</p><p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.&nbsp;</p>', 'home', 'Home Page', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'главная', 'Главная', '<p>Текст главной страницы</p>', NULL, NULL, 0, 'home', '', '', '', '', '', ''),
(4, 'სიახლეები', 'ჩვენი სიახლეები', 'სიახლეების საერთო ტექსტი.', 'news', 'News Title', 'News text', 'новости', 'Новости', 'Текст новостей', NULL, NULL, 1, 'news', '', '', '', '', '', ''),
(5, 'რეგისტრაცია', 'რეგისტრაცია', 'რეგისტრაციის ტექსტი', 'registration', 'Registration', 'Registration Text', 'регистрация', 'Регистрация', 'Текст регистрации', NULL, NULL, 0, 'registration', '', '', '', '', '', ''),
(7, 'ფოტო-გალერეა', 'ფოტო გალერეა', '<p>.არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p>', 'photo-gallery', 'Photo Gallery', '<p>..</p>', 'фото-галерея', 'Фото Галерея', '<p>...</p>', NULL, NULL, 0, 'photo-gallery', '', '', '', '', '', ''),
(8, 'ავტორიზაცია', 'ავტორიზაცია', '<p>ავტორიზაცია ავტორიზაცია</p>', 'authorization', 'Authorization', '<p>Authorization</p>', 'авторизация', 'Авторизация', '<p>Авторизация</p>', NULL, NULL, 0, 'authorization', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `partners_step_0`
--

CREATE TABLE `partners_step_0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partners_step_0`
--

INSERT INTO `partners_step_0` (`id`, `title_ge`, `title_en`, `title_ru`, `link`, `rang`, `created_at`, `updated_at`) VALUES
(1, 'temp', '', '', '', 0, NULL, NULL),
(2, 'ჰობი სტუდიო', 'HobbyStudio', 'HobbyStudio', 'http://hobbystudio.ge', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `photo_gallery_step_0`
--

CREATE TABLE `photo_gallery_step_0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ge` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `meta_title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `photo_gallery_step_0`
--

INSERT INTO `photo_gallery_step_0` (`id`, `title_ge`, `title_en`, `title_ru`, `rang`, `created_at`, `updated_at`, `alias_ge`, `alias_en`, `alias_ru`, `text_ge`, `text_en`, `text_ru`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`) VALUES
(1, 'სატესტო', 'Test', 'Тест', 5, NULL, NULL, 'sdf', 'pdf', 'were', '<p>ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p>', '<p>wwww</p>', '<p>dddd</p>', '', '', '', '', '', ''),
(2, 'პირველი', 'First', 'Первая', 0, NULL, NULL, 'ggg', 'eee', 'sss', '<p>..არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890. ეს არის საცდელი ინფორმაცია ამ ვებ გვერდზე. ეს არის დროებითი ტექსტი რომელიც შეიცვლება რეალური მონაცემებით. იგი გამოიყენება სამაგალითოდ, ვებ გვერდის გამოსაცდელად. სამაგალითო ციფრები: 1234567890.</p>', '<p>444</p>', '<p>777</p>', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `photo_gallery_step_1`
--

CREATE TABLE `photo_gallery_step_1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `photo_gallery_step_1`
--

INSERT INTO `photo_gallery_step_1` (`id`, `parent`, `title_ge`, `title_en`, `title_ru`, `rang`, `created_at`, `updated_at`, `meta_title_ge`, `meta_title_en`, `meta_title_ru`, `meta_description_ge`, `meta_description_en`, `meta_description_ru`) VALUES
(1, 1, '222 ee', 'asdf www', 'asd 11 ss', 0, NULL, NULL, '', '', '', '', '', ''),
(2, 1, 'wer', '', 'asdf', 0, NULL, NULL, '', '', '', '', '', ''),
(3, 2, 'wer', 'sdf', 'sdfg', 0, NULL, NULL, '', '', '', '', '', ''),
(4, 2, 'sdfg', 'wer', 'asdf', 0, NULL, NULL, '', '', '', '', '', ''),
(5, 1, 'вап', 'кккк', 'asdf', 0, NULL, NULL, '', '', '', '', '', ''),
(6, 1, 'წერ', 'ასდფ', 'ასდფ', 0, NULL, NULL, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `super_administrator` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `super_administrator`, `admin`) VALUES
(8, 'ალექსი', 'alexshamoev@gmail.com', NULL, '$2y$10$.r.Bs/ig27H1W9C7aEc/9u5fFy8Gl2k68813zxQpiD1jk.n3sS.JG', NULL, '2021-06-16 10:21:55', '2022-03-17 08:02:24', 0, 1),
(11, 'asdasdf', 'werwerwe@asdf.ge', NULL, '$2y$10$faDSfwO8j/yh9fzpnIA7sO/JKMNCI0JaMRiuhPaZ69Jq9fMUCsfg6', NULL, '2022-01-24 09:56:49', '2022-01-24 09:56:49', 0, 0),
(12, 'sandra', 'sandratbilisi@gmail.com', NULL, '$2y$10$2uV4GPDX5/9owWbmEe2y9.ti5gf8cUulGc32yok6XFQNSCpQsTiRS', NULL, '2022-01-24 10:05:00', '2022-01-24 10:05:00', 0, 0),
(13, '', '', NULL, '$2y$10$ZKWT/5hTXQlwPadPT69imeScxkT0ZIAOZJsGqPsj27cIXZeenXiGe', NULL, '2022-03-17 08:02:59', '2022-03-17 08:02:59', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bscs`
--
ALTER TABLE `bscs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bsws`
--
ALTER TABLE `bsws`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_buttons_link_types`
--
ALTER TABLE `menu_buttons_link_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_buttons_step_0`
--
ALTER TABLE `menu_buttons_step_0`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_buttons_step_1`
--
ALTER TABLE `menu_buttons_step_1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modules_includes_values`
--
ALTER TABLE `modules_includes_values`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modules_not_includes_values`
--
ALTER TABLE `modules_not_includes_values`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `module_blocks`
--
ALTER TABLE `module_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `module_steps`
--
ALTER TABLE `module_steps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_step_0`
--
ALTER TABLE `news_step_0`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_step_1`
--
ALTER TABLE `news_step_1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_step_2`
--
ALTER TABLE `news_step_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_step_3`
--
ALTER TABLE `news_step_3`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages_step_0`
--
ALTER TABLE `pages_step_0`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners_step_0`
--
ALTER TABLE `partners_step_0`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `photo_gallery_step_0`
--
ALTER TABLE `photo_gallery_step_0`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo_gallery_step_1`
--
ALTER TABLE `photo_gallery_step_1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bscs`
--
ALTER TABLE `bscs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `bsws`
--
ALTER TABLE `bsws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `menu_buttons_link_types`
--
ALTER TABLE `menu_buttons_link_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `menu_buttons_step_0`
--
ALTER TABLE `menu_buttons_step_0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu_buttons_step_1`
--
ALTER TABLE `menu_buttons_step_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `modules_includes_values`
--
ALTER TABLE `modules_includes_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `modules_not_includes_values`
--
ALTER TABLE `modules_not_includes_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `module_blocks`
--
ALTER TABLE `module_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT для таблицы `module_steps`
--
ALTER TABLE `module_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `news_step_0`
--
ALTER TABLE `news_step_0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `news_step_1`
--
ALTER TABLE `news_step_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `news_step_2`
--
ALTER TABLE `news_step_2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `news_step_3`
--
ALTER TABLE `news_step_3`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `pages_step_0`
--
ALTER TABLE `pages_step_0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `partners_step_0`
--
ALTER TABLE `partners_step_0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `photo_gallery_step_0`
--
ALTER TABLE `photo_gallery_step_0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `photo_gallery_step_1`
--
ALTER TABLE `photo_gallery_step_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
