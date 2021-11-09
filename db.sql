-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 01 2021 г., 15:14
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
  `system_word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `configuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bscs`
--

INSERT INTO `bscs` (`id`, `system_word`, `configuration`, `created_at`, `updated_at`) VALUES
(344, 'admin_email', 'programmers@hobbystudio.ge', NULL, NULL),
(481, 'a_password_field_lenght', '40', NULL, '2021-01-09 13:57:27'),
(482, 'a_redirection_fast_time', '1', NULL, NULL),
(483, 'a_redirection_slow_time', '5', NULL, NULL),
(484, 'a_username_field_lenght', '40', NULL, NULL),
(486, 'cms_version', '2.9.4', NULL, NULL),
(488, 'phone_number', '+995 000 00 00 00; +995 000 00 00 00', NULL, '2021-04-23 07:52:14'),
(493, 'get_default_lang_from_location', '0', NULL, NULL),
(495, 'module_pages_icons_folder_url', 'modules/modules/uploads/', NULL, NULL),
(496, 'redirection_fast_time', '10', NULL, NULL),
(497, 'redirection_slow_time', '30', NULL, NULL),
(529, 'year_of_site_creation', '2021', NULL, '2021-05-07 06:50:51'),
(629, 'a_field_normal_color', 'ffffff', NULL, NULL),
(630, 'a_field_warning_color', 'ffbfc0', NULL, NULL),
(633, 'sitemap_update_time', '01,13,57,01,06,2021', NULL, NULL),
(636, 'company_facebook_url', 'https://www.facebook.com/hobbystudio', NULL, NULL),
(637, 'feedback_email', 'no-replay@hobbystudio.ge', NULL, NULL),
(640, 'payment_day_close_time', '12,40,42,12,05,2019', NULL, NULL),
(641, 'currency', '2.887', NULL, NULL),
(642, 'css_update_time', '16,58,50,01,26,2020', NULL, NULL),
(643, 'js_update_time', '16,58,50,01,26,2020', NULL, NULL),
(644, 'minify_random_css', '925541568720', NULL, NULL),
(645, 'minify_random_js', '801787899575', NULL, NULL),
(646, 'styles_folder', 'modules/languages/styles/', NULL, NULL),
(647, 'step_2_blocks_number_on_page', '4', NULL, NULL),
(648, 'step_2_big_width', '200', NULL, NULL),
(649, 'step_2_big_height', '1200', NULL, NULL),
(650, 'step_2_image_width', '600', NULL, NULL),
(651, 'step_2_image_height', '400', NULL, NULL),
(653, 'image_width', '155', NULL, NULL),
(654, 'image_height', '55', NULL, NULL),
(655, 'images_folder', 'modules/languages/uploads/', NULL, NULL),
(656, 'image_width', '40', NULL, NULL),
(657, 'image_height', '30', NULL, NULL),
(658, 'password_field_lenght', '40', NULL, NULL),
(659, 'email_field_lenght', '40', NULL, NULL),
(660, 'map_coordinate_y', '44.7370823', NULL, NULL),
(661, 'map_coordinate_x', '41.724172', NULL, NULL),
(662, 'small_icon_width', '80', NULL, NULL),
(663, 'small_icon_height', '80', NULL, NULL),
(664, 'uploads_folder', 'modules/fonts/uploads/', NULL, NULL),
(665, 'a_image_height', '24', NULL, NULL),
(666, 'a_image_width', '30', NULL, NULL),
(667, 'admin_default_icon_bg_color', '868686', NULL, NULL),
(668, 'vertical_sub_buttons_position_1', '140', NULL, NULL),
(669, 'vertical_hide_speed', '300', NULL, NULL),
(670, 'vertical_stop_delay', '600', NULL, NULL),
(671, 'vertical_show_speed', '300', NULL, NULL),
(672, 'last_name_field_length', '50', NULL, NULL),
(673, 'map_zoom', '12', NULL, NULL),
(675, 'redirect_delay_time', '30', NULL, NULL),
(676, 'folders_url', 'uploads', NULL, NULL),
(677, 'preview_image_height', '80', NULL, NULL),
(678, 'preview_image_width', '105', NULL, NULL),
(679, 'redirect_delay_time', '5', NULL, NULL),
(680, 'a_folders_url', '../modules/file_manager/uploads', NULL, NULL),
(681, 'pages_number', '10', NULL, NULL),
(682, 'menus_max_number', '10', NULL, NULL),
(683, 'left_menu_big_icon_width', '100', NULL, NULL),
(684, 'left_menu_big_icon_height', '80', NULL, NULL),
(685, 'left_menu_small_icon_width', '50', NULL, NULL),
(686, 'left_menu_small_icon_height', '40', NULL, NULL),
(687, 'design_folder', 'modules/menu_buttons/images/', NULL, NULL),
(688, 'discount', '5', NULL, NULL),
(689, 'step_1_images_folder', 'modules/news/uploads/step_1/', NULL, NULL),
(690, 'email_field_length', '50', NULL, NULL),
(691, 'step_3_preview_width', '300', NULL, NULL),
(692, 'step_3_preview_height', '200', NULL, NULL),
(693, 'step_3_images_folder', 'modules/news/uploads/step_3/', NULL, NULL),
(694, 'phone_number_field_length', '50', NULL, NULL),
(695, 'step_2_images_folder', 'modules/news/uploads/step_2/', NULL, NULL),
(696, 'design_folder', 'modules/video_gallery/images/', NULL, NULL),
(697, 'vertical_sub_buttons_position_2', '170', NULL, NULL),
(698, 'first_name_field_length', '50', NULL, NULL),
(699, 'icons_folder', 'modules/modules/uploads/icons/', NULL, NULL),
(700, 'email', 'programmers@hobbystudio.ge', NULL, NULL),
(701, 'step_3_image_width', '2000', NULL, NULL),
(702, 'step_3_image_height', '1200', NULL, NULL),
(703, 'step_1_image_height', '300', NULL, NULL),
(704, 'step_1_image_width', '400', NULL, NULL),
(705, 'modified_at', 'ff', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `bsws`
--

CREATE TABLE `bsws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word_ge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bsws`
--

INSERT INTO `bsws` (`id`, `system_word`, `word_ge`, `word_en`, `word_ru`, `created_at`, `updated_at`) VALUES
(1, 'meta_title', 'მეტა სათაური', 'Meta Title', 'Мета Заголовок', NULL, NULL),
(2, 'a_information_will_be_soon', 'ინფორმაცია შესაცვლელად გამოიყენეთ მარცხენა მენიუ.', 'To manage the information use left menu buttons.', 'Для использования модуля, воспользуйтесь левым меню.', NULL, NULL),
(3, 'copyright', 'შ.პ.ს. \"ორგანიზაციის დასახელება\". ყველა უფლება დაცულია.', 'Ltd \"Company Title\". All rights reserved.', 'ООО \"Название Компании\". Все права защищены.', NULL, NULL),
(4, 'meta_description', 'მეტა აღწერა', 'Meta Description', 'Мета Описание', NULL, NULL),
(5, 'meta_keywords', 'მეტა სატყვები', 'Meta Keywords', 'Мета Слова', NULL, NULL),
(6, 'company_title', 'ორგანიზაციის დასახელება', 'Company Title', 'Название Компании', NULL, NULL),
(7, 'a_sure_to_remove', 'დარწმუნებული ხართ რომ გსურთ ამ მონაცემების წაშლა?', 'Are you sure you want to delete this data?', 'Вы уверены что хотите удалить эти данные?', NULL, NULL),
(8, 'a_edit_info', 'მონაცემების შეცვლა', 'Edit Information', 'Изменить Информацию', NULL, NULL),
(9, 'a_add_info', 'მონაცემების დამატება', 'Add date', 'Добавление данных', NULL, NULL),
(10, 'a_data_is_added', 'მონაცემები დამატებულია.', 'Data is added.', 'Данные добавлены.', NULL, NULL),
(11, 'a_data_not_added', 'მონაცემები დამატებული არ არის. გთხოვთ სცადოთ კიდევ ერთხელ.', 'No data is added. Please try again.', 'Данные не добавлены. Пожалуйста попробуйте еще раз.', NULL, NULL),
(12, 'a_data_is_deleted', 'მონაცემები წაშლილია.', 'Data is deleted.', 'Данные удалены.', NULL, NULL),
(13, 'a_data_not_deleted', 'მონაცემები წაშლილი არ არის. გთხოვთ სცადოთ კიდევ ერთხელ.', 'Data is not removed. Please try again.', 'Данные не удалены. Пожалуйста попробуйте еще раз.', NULL, NULL),
(14, 'a_data_has_changed', 'მონაცემები შეცვლილია.', 'Data is changed.', 'Данные изменены.', NULL, NULL),
(15, 'a_data_is_not_changed', 'მონაცემები შეცვლილი არ არის. გთხოვთ სცადოთ კიდევ ერთხელ', 'Data is not changed. Please try again.', 'Данные не изменены. Пожалуйста попробуйте еще раз.', NULL, NULL),
(16, 'a_save_the_ranges', 'რიგის დამახსოვრება', 'Save Rang', 'Сохранить Ряд', NULL, NULL),
(17, 'a_delete_info', 'მონაცემების წაშლა', 'Delete Data', 'Удалить Информацию', NULL, NULL),
(18, 'a_module_help', 'აქ შეგიძლიათ იხილოთ მოდულით სარგებლობის წესები:', 'Here you can see the rules for use of the module:', 'Здесь вы можете увидеть правила использования модуля:', NULL, NULL),
(19, 'a_data_not_found', 'მონაცემები შეტანილი არ არის', '', '', NULL, NULL),
(20, 'a_welcome', 'მოგესალმებით', 'Welcome', 'Добро Пожаловать', NULL, NULL),
(21, 'please_full_all_necessary_fields', 'გთხოვთ კორექტულად შეავსოთ ყველა აუცილებელი ველი.', 'Please fill all necessary fields.', 'Пожалуйста корректно заполните все объязательные поля.', NULL, NULL),
(22, 'a_edit', 'შეცვლა', 'Edit', 'Изменить', NULL, NULL),
(23, 'a_delete', 'წაშლა', 'Delete', 'Удалить', NULL, NULL),
(24, 'a_open_web_page', 'გადასვლა საიტზე', 'Open Web Page', 'Открыть Сайт', NULL, NULL),
(25, 'a_log_out', 'გასვლა', 'Log Out', 'Выход', NULL, NULL),
(26, 'a_meta_title', 'ადმინ პანელი', 'Admin Panel', 'Админ Панель', NULL, NULL),
(27, 'a_help', 'დახმარება', 'Help', 'Помощь', NULL, NULL),
(28, 'a_edit_text', 'ტექსტის<br>შეცვლა', 'Edit Text', 'Изменить Текст', NULL, NULL),
(29, 'a_left_menu_edit_module', 'მოდულის<br>შეცვლა', 'Edit<br>Module', 'Изменить<br>Модуль', NULL, NULL),
(30, 'a_edit_or_delete_system_configurations', 'კონფიგურაციების<br>შეცვლა / წაშლა', 'Edit or Delete<br>Configurations', 'Изменить / Удалить<br>Конфигурации', NULL, NULL),
(31, 'a_add_system_words', 'სის. სიტყვის<br>დამატება', 'Add<br>System Word', 'Добавить<br>Системное Слово', NULL, NULL),
(32, 'a_edit_or_delete_system_words', 'სის. სიტყვების<br>შეცვლა / წაშლა', 'Edit or Delete<br>System Word', 'Изменить / Удалить<br>Системное Слова', NULL, NULL),
(33, 'a_example', 'მაგალითად', 'For Example', 'Например', NULL, NULL),
(34, 'a_upload_file_sizes_needed', 'ფოტოს მაქსიმალური ზომა საიტზე იქნება (პიქსელებში):', 'Maximum sizes of photo on the site will be (in pixels):', 'Максимальный размер фотографии на сайте будет (в пискселях):', NULL, NULL),
(35, 'a_upload_file_pixels', 'პიქსელი, და', 'pixels, and', 'пикселей, и', NULL, NULL),
(36, 'a_upload_file_format', 'ფორმატში', 'format', 'формате', NULL, NULL),
(37, 'a_or', 'ან', 'or', 'или', NULL, NULL),
(38, 'a_rang', 'რიგი', 'Rang', 'Ряд', NULL, NULL),
(39, 'a_check_all', 'მოვნიშნოთ ყველა', 'Check All', 'Отметить Все', NULL, NULL),
(40, 'a_uncheck_all', 'მოვხსნათ მონიშვნა', 'Uncheck All', 'Снять Выделение', NULL, NULL),
(41, 'a_sure_to_remove_file', 'დარწმუნებული ხართ რომ გსურთ ამ ფაილის წაშლა?', 'Are you sure you want to delete this file?', 'Вы уверены что хотите удалить этот файл?', NULL, NULL),
(42, 'a_system_configuration', 'სის. კონფიგურაცია', 'sys. configuration', 'сис. конфигурацию', NULL, NULL),
(43, 'a_example_system_word', 'images_folder', 'images_folder', 'images_folder', NULL, NULL),
(44, 'a_example_system_configuration', 'modules/gallery/uploads/', 'modules/gallery/uploads/', 'modules/gallery/uploads/', NULL, NULL),
(45, 'a_enter_system_configuration', 'კონფიგურაცია', 'Configuration', 'Кофигурация', NULL, NULL),
(46, 'a_enter_system_word_description', 'აღწერა', 'Description', 'Описание', NULL, NULL),
(47, 'a_system_word', 'სის. სიტყვა', 'sys. word', 'сис. слово', NULL, NULL),
(48, 'a_add_system_configurations', 'კონფიგურაციის<br>დამატება', 'Add<br>Configuration', 'Добавить<br>Конфигурацию', NULL, NULL),
(49, 'a_enter_page_text_title', 'გვერდის ტექსტური სათაური', 'page text title', 'текстовое название страницы', NULL, NULL),
(50, 'a_enter_page_text', 'გვერდის სრული ტექსტი', 'page text', 'текст страницы', NULL, NULL),
(51, 'a_status_line_ok', 'მონაცემები შევსებულია კორექტულად', 'Data is correct', 'Данные заполнены корректно', NULL, NULL),
(52, 'data_not_found', 'მონაცემები ვერ მოიძებნა', 'Information is not found', 'Информация не найдена', NULL, NULL),
(53, 'a_enter_system_word', 'სისტემური სიტყვა', 'System word', 'Системное слово', NULL, NULL),
(54, 'a_left_menu_edit_or_delete_part', 'შევცვალოთ / წავშალოთ<br>', 'Edit / Delete<br>', 'Изменить / Удалить<br>', NULL, NULL),
(55, 'a_left_menu_add_part', 'დავამატოთ<br>', 'Add<br>', 'Добавить<br>', NULL, NULL),
(56, 'a_username', 'მომხმარებლის ელ. ფოსტა', 'User E-mail', 'Эл. Почта Пользователя', NULL, NULL),
(57, 'a_password', 'პაროლი', 'PassWord', 'Пароль', NULL, NULL),
(58, 'a_log_in', 'სისტემაში შესვლა', 'Log In', 'Войти в Систему', NULL, NULL),
(59, 'a_wrong_username', 'მომხმარებლის ელ. ფოსტა ან პაროლი არასწორია. გთხოვთ სცადოთ კიდევ ერთხელ.', 'User e-mail or password are incorrect. Please try again.', 'Эл. почта пользователя или пароль неверны. Пожалуйста попробуйте еще раз.', NULL, NULL),
(60, 'a_enter_alias', 'გვერდის სისტემური სათაური ინგლუსურ ენაზე (alias)', 'page system title in english (alias)', 'системное название страницы на английском языке (alias)', NULL, NULL),
(61, 'necessary_field', 'აუცილებელი ველი.', 'Necessary field.', 'Объязательное поле.', NULL, NULL),
(62, 'a_show_modules', 'გამოვაჩინოთ მოდულები', 'Show Modules', 'Показать Модули', NULL, NULL),
(63, 'a_hide_modules', 'გავაქროთ მოდულები', 'Hide Modules', 'Свернуть Модули', NULL, NULL),
(64, 'a_title_add_part', 'აქ შეგიძლიათ დაამატოთ ', 'Here you can add  ', 'Здесь вы можете добавить ', NULL, NULL),
(65, 'a_title_edit_or_delete_part', 'აქ შეგიძლიათ დაამატოთ, შეცვალოთ ან წაშალოთ ნებისმიერი ', 'Here you can add, change or delete any ', 'Здесь вы можете добавить, изменить или удалить ', NULL, NULL),
(66, 'a_title_edit_part', 'აქ შეგიძლიათ შეცვალოთ ', 'Here you can change ', 'Здесь вы можете изменить ', NULL, NULL),
(67, 'a_title_edit_design', 'აქ შეგიძლიათ შეცვალოთ მოდულის დიზაინი', 'Here you can edit module design', 'Здесь вы можете изменить дизайн модуля', NULL, NULL),
(68, 'a_upload_file_needed', 'სასურველია ფაილის ატვირთვა', 'It is advisable to upload the file in', 'Желательно загрузить файл в', NULL, NULL),
(69, 'a_upload_image', 'ატვირთეთ ფოტო', 'Upload image', 'Загрузите фото', NULL, NULL),
(70, 'a_left_menu_edit_design', 'დიზაინის<br>შეცვლა', 'Edit<br>Design', 'Изменение<br>Дизайна', NULL, NULL),
(71, 'contact_information', 'ყაზბეგის 70', 'Kazbegi Str.70', 'Казбеги, ул. 70', NULL, NULL),
(72, 'a_left_menu_edit_part', 'შევცვალოთ<br>', 'Edit<br>', 'Изменить<br>', NULL, NULL),
(73, 'a_left_menu_view_part', 'დავათვალიეროთ<br>', 'View<br>', 'Просмотреть<br>', NULL, NULL),
(74, 'a_left_menu_choose_part', 'აირჩიეთ', 'Choose', 'Выберите', NULL, NULL),
(75, 'a_module_information', 'მოდულის ინფორმაცია', 'Module Information', 'Информацию Модуля', NULL, NULL),
(76, 'a_text', 'აღწერა', 'Description', 'описание', NULL, NULL),
(77, 'a_file', 'ფაილი', 'file', 'файл', NULL, NULL),
(78, 'a_folder', 'ფოლდერი', 'folder', 'папку', NULL, NULL),
(79, 'a_hide', 'გავაქროთ', 'Hide', 'Скрыть', NULL, NULL),
(80, 'a_enter_photo_seo_alt', 'ფოტო გამოსახულების აღწერა (Seo)', 'description of the content of photos (Seo)', 'описание содержания фотографии (Seo)', NULL, NULL),
(81, 'a_title', 'სათაური', 'Title', 'Заголовок', NULL, NULL),
(82, 'a_text', 'აღწერა', 'Description', 'описание', NULL, NULL),
(83, 'a_enter_meta_keywords', 'გვერდის მეტა სიტყვები (Seo)', 'page meta keywords (Seo)', 'мета слова для страницы (Seo)', NULL, NULL),
(84, 'a_show', 'გამოვაჩინოთ', 'Show', 'Показать', NULL, NULL),
(85, 'a_enter_meta_description', 'გვერდის მეტა აღწერა (Seo)', 'page meta description (Seo)', 'мета описание для страницы (Seo)', NULL, NULL),
(86, 'a_enter_seo_data_text', 'ინფორმაცია საძიებო სისტემიბისთვის (Seo)', 'Information for search engines (Seo)', 'Информация для поисковых систем (Seo)', NULL, NULL),
(87, 'a_upload_file_format_needed', '<span style=\"color: #cb2b2b;\">აუცილებელია ფაილის ატვირთვა, ფორმატში:</span>', '<span style=\"color: #cb2b2b;\">Required file format for upload:</span>', '<span style=\"color: #cb2b2b;\">Обязательна загрузка файла в формате:</span>', NULL, NULL),
(88, 'a_example_alias', 'photo-and-video-gallery', 'photo-and-video-gallery', 'photo-and-video-gallery', NULL, NULL),
(89, 'a_enter_meta_title', 'გვერდის მეტა სათაური (Seo)', 'page meta title (Seo)', 'мета название страницы (Seo)', NULL, NULL),
(90, 'a_system_vars_for_export', 'სისტემური ცვლადები Sql იმპორტისთვის', 'System variables for Sql import', 'Системные переменные для Sql импорта', NULL, NULL),
(91, 'mail_sent_from', 'ეს წერილი გამოგზავნილია საიტიდან', 'This email was sent from site', 'Это письмо прислано с сайта', NULL, NULL),
(92, 'a_admin_panel_url', 'საადმინისტრაციო პანელის ბმული', 'Admin panel url', 'Ссылка на админ панель', NULL, NULL),
(93, 'a_user_email', 'მომხმარებლის ელ. ფოსტა', 'User email', 'Эл. почта пользователя', NULL, NULL),
(94, 'a_user_password', 'მომხმარებლის პაროლი', 'User password', 'Пароль пользователя', NULL, NULL),
(95, 'a_recovery_password', 'პაროლის აღდგენა', 'Recovery password', 'Востановить пароль', NULL, NULL),
(96, 'a_password_recovery_good_result', 'ადმინ პანელის მონაცემები გამოგზავნილია თქვენს ელ. ფოსტაზე.', 'Admin panel information is sent to your email.', 'Данные для входа в админ панель высланы на вашу эл. почту.', NULL, NULL),
(97, 'a_password_recovery_wrong_result', 'მომხმარებელი ესეთი ელ. ფოსტის მისამართით არ არსობობს.', 'User with this email address does not exist.', 'Пользователя с таким адресом эл. почты не существует.', NULL, NULL),
(98, 'a_next', 'შემდეგი', 'Next', 'Вперёд', NULL, NULL),
(99, 'a_prev', 'წინა', 'Prev', 'Назад', NULL, NULL),
(100, 'a_updating', 'განახლება...', 'Updating...', 'Обновление...', NULL, NULL),
(101, 'a_for_tags_is_empty', '-ცარიელია-', '-Empty-', '-Пусто-', NULL, NULL),
(102, 'admin_panel_information', 'ადმინ პანელის მონაცემები', 'Admin Panel Information', 'Данные Админ Панели', NULL, NULL),
(103, 'a_image_format', 'JPG / PNG / GIF', 'JPG / PNG / GIF', 'JPG / PNG / GIF', NULL, NULL),
(104, 'a_upload', 'ატვირთვა', 'Upload', 'Загрузить', NULL, NULL),
(105, 'a_choose_file', 'აირჩიეთ ფაილი', 'Choose file', 'Выберите файл', NULL, NULL),
(106, 'a_choose_file_correct_format', 'გთხოვთ ატვირთეთ ფაილი კორექტულ ფორმატში', 'Please upload file in correct format', 'Пожалуйста загрузите файл в корректном формате', NULL, NULL),
(107, 'a_status_line_fail', 'შეავსეთ ყველა აუცილებელი ველი', 'Fill all required fields', 'Заполните все обязательные поля', NULL, NULL),
(108, 'a_add', 'დაამატეთ', 'Add', 'Добавить', NULL, NULL),
(109, 'a_pages_edit_info', 'სათაურის და სხვა ინფორმაციის შეცვლა', 'Edit title and other information', 'Редактировать название и другую информацию', NULL, NULL),
(110, 'no_data_selected', 'მონაცემები არ არის არჩეული', 'No data selected', 'Данные не выбраны', NULL, NULL),
(111, 'a_one_step_back', 'ერთი ნაბიჯით უკან გასვლა', 'One step back', 'Вернуться на один шаг назад', NULL, NULL),
(112, 'a_add_image', 'დაამატეთ ფოტო', 'Add Image', 'Добавить фото', NULL, NULL),
(113, 'a_images', 'ფოტოები', 'Images', 'Фотографии', NULL, NULL),
(114, 'a_image', 'ფოტო', 'Image', 'Фото', NULL, NULL),
(115, 'a_image_size_changes_automaticaly', '(საიტი ავტომატურად ჩასვამს ფოტოს ზომაში)', '(The site will automatically put the photo in the correct size)', '(Сайт автоматически посадит фото в нужный размер)', NULL, NULL),
(116, 'a_alias_label', 'URL Alias', 'URL Alias', 'URL Alias', NULL, NULL),
(117, 'read_more', 'იხილეთ მეტი', 'Read More', 'Подробнее', NULL, NULL),
(118, 'a_select', 'აირჩიეთ', 'Select', 'Выберите', NULL, NULL),
(119, 'fill_all_fields', 'შეავსეთ ყველა აუცილებელი ველი', 'Fill all the required fields', 'Заполните все обязательные поля', NULL, NULL),
(120, 'go_to_home', 'მთავარზე გადასვლა', 'Go to home page', 'Перейти на главную', NULL, NULL),
(121, 'a_back', 'გასვლა', 'Back', 'Назад', NULL, NULL),
(122, 'under_construction', 'aვებ გვერდი მზადების პროცესშია', 'Web Page is under construction', 'Сайт находится в разработке', NULL, NULL),
(123, 'module_title', 'ანიმირებული ქუდი', 'Flash Header', '', NULL, NULL),
(124, 'condition_code_19', '', '', '', NULL, NULL),
(125, 'room_type_1', 'Single', 'Single', 'Single', NULL, NULL),
(126, 'room_type_3', 'Family', 'Family', 'Family', NULL, NULL),
(127, 'registration_form', 'რეგისტრაციის ფორმა', 'Registration Form', 'Форма Регистрации', NULL, NULL),
(128, 'mail_from', 'საიტიდან', 'From web page', 'С сайта', NULL, NULL),
(129, 'mail_is_send', 'თქვენი წერილი გაგზავნილია.', 'Mail is sent.', 'Письмо отправлено.', NULL, NULL),
(130, 'registration_is_not_successful', 'გაურკვეველი მიზეზების გამო, რეგისტრაციამ ჩაიარა წარუმატებლად. გთხოვთ სცადოთ კიდევ ერთხელ.', 'For unknown reasons, registration was unsuccessful. Please try again.', 'По неизвестным причинам, регистрация закончилась неудачно. Пожалуйста попробуйте еще раз.', NULL, NULL),
(131, 'enter_username', 'მომხმარებლის სახელი', 'Username', 'Имя Пользователя', NULL, NULL),
(132, 'registration_was_successful', 'თქვენ წარმატებით გაიარეთ რეგისტრაცია. გთხოვთ გააქტიუროთ ექაუნტი, ელ. ფოსტის საშუალებით.', 'You have successfully registered. Please activate you acount, from your email.', 'Регистрация успешно завершена. Пожалуйста активируйте свой экаунт из вышей электронной почты.', NULL, NULL),
(133, 'activation_is_not_successful', 'გაურკვეველი მიზეზების გამო, აქტივაციამ ჩაიარა წარუმატებლად. გთხოვთ სცადოთ კიდევ ერთხელ.', 'For unknown reasons, activation was unsuccessful. Please try again.', 'По неизвестным причинам, активация закончилась неудачно. Пожалуйста попробуйте еще раз.', NULL, NULL),
(134, 'cancel', 'გაუქმება', 'Cancel', 'Отменить', NULL, NULL),
(135, 'title', 'ღრუბელი', 'Tag Cloud', 'Облако Тегов', NULL, NULL),
(136, 'mail', 'წერილის ტექსტი', 'Mail Text', 'Текст Письма', NULL, NULL),
(137, 'mail_dont_send', 'გარკვეული შეფერხებების გამო, თქვენი წერილი ვერ გაიგზავნა. სცადეთ კიდევ ერთხელ.', 'Mail is not sent. Please try again.', 'Письмо не отправлено. Пожалуйста попробуйте еще раз', NULL, NULL),
(138, 'a_title_edit_email', 'აქ შეგიძლიათ შეცვალოთ მოდულის ინფორმაცია', 'Here you can change module information', 'Здесь вы можете изменить информацию модуля', NULL, NULL),
(139, 'email_address', 'ელ–ფოსტა', 'E-mail', 'Эл-адрес', NULL, NULL),
(140, 'first_name', 'სახელი', 'First Name', 'Имя', NULL, NULL),
(141, 'password', 'პაროლი', 'Password', 'Пароль', NULL, NULL),
(142, 'email', 'ელ. ფოსტა', 'E-mail', 'Эл-адрес', NULL, NULL),
(143, 'login', 'ავტორიზაცია', 'Login', 'Авторизация', NULL, NULL),
(144, 'forgot_password', 'დაგავიწყდათ პაროლი?', 'Forgot Password?', 'Забыли Пароль?', NULL, NULL),
(145, 'registration', 'რეგისტრაცია', 'Registration', 'Регистрация', NULL, NULL),
(146, 'logout', 'გასვლა', 'Logout', 'Выход', NULL, NULL),
(147, 'welcome', 'მოგესალმები', 'Welcome', 'Добро Пожаловать', NULL, NULL),
(148, 'bad_email_or_password', 'არასწორი ელ. ფოსტა ან პაროლი.', 'Invalid E-mail or Password.', 'Неверные эл-адрес или пароль.', NULL, NULL),
(149, 'room_type', 'ოთახის ტიპი', 'Room Type', 'Тип Комнаты', NULL, NULL),
(150, 'a_enter_admin_name', 'ადმინისტრატორის სახელი', 'name of administrator', 'имя администратора', NULL, NULL),
(151, 'a_example_admin_name', 'ნინო ნემსაძე', 'Nino Nemsadze', 'Нино Немсадзе', NULL, NULL),
(152, 'a_example_admin_password', 'nino_password', 'nino_password', 'nino_password', NULL, NULL),
(153, 'a_enter_admin_password', 'ადმინისტრატორის პაროლი', 'administrator password', 'пароль пользователя', NULL, NULL),
(154, 'a_enter_repeat_admin_password', 'გაიმეორეთ ადმინისტრატორის პაროლი', 'Confirm administrator password', 'Повторите пароль администратора', NULL, NULL),
(155, 'condition_code_0', '', '', '', NULL, NULL),
(156, 'condition_code_1', '', '', '', NULL, NULL),
(157, 'a_left_menu_edit_information', 'ინფორმაციის <br>შეცვლა', 'Edit <br>Information', 'Изменить <br>Информацию', NULL, NULL),
(158, 'your_name', 'თქვენი სახელი', 'Your Name	', 'Ваше имя', NULL, NULL),
(159, 'a_enter_map_title', 'მარკერის დასახელება', 'marker title', 'название маркера', NULL, NULL),
(160, 'condition_code_23', '', '', '', NULL, NULL),
(161, 'a_info', 'მონაცემები', 'information', 'информацию', NULL, NULL),
(162, 'a_example_company_phone', '+995 000 00 00 00; +995 000 00 00 00', '+995 000 00 00 00; +995 000 00 00 00', '+995 000 00 00 00; +995 000 00 00 00', NULL, NULL),
(163, 'a_example_company_facebook_url', 'https://www.facebook.com/hobbystudio', 'https://www.facebook.com/hobbystudio', 'https://www.facebook.com/hobbystudio', NULL, NULL),
(164, 'a_about_zero', '0 ნიშნავს უსასროლო რაოდენობას', '0 means infinite number', '0 означает бесконечное кол-во', NULL, '2021-10-25 12:06:09'),
(165, 'a_example_blocks_max_number', '5', '5', '5', NULL, NULL),
(166, 'a_blocks_max_number', 'ბლოკების მაქსიმალური რაოდენობა', 'Maximum number of blocks', 'Максимальное кол-во блоков', NULL, NULL),
(167, 'persons', 'მოზრდილები', 'Persons', 'Персон', NULL, NULL),
(168, 'make_reservation', 'რეზერვაცია', 'Make Reservation', 'Резервация', NULL, NULL),
(169, 'user_already_exists', 'მომხმარებელი ესეთი ელ. მისამართით უკვე არსებობს.', 'User with this email address already exists.', 'Пользователь с таким эл. адресом уже существует.', NULL, NULL),
(170, 'a_module', 'მოდული', 'module', 'модуль', NULL, NULL),
(171, 'a_enter_language_title', 'ენის დასახელება, ინგლისურ ენაზე', 'language title, in english', 'название языка, на английском', NULL, NULL),
(172, 'a_example_language_title', 'georgian', 'georgian', 'georgian', NULL, NULL),
(173, 'a_check_disable', 'გამოვრთოთ', 'Disable', 'Отключить', NULL, NULL),
(174, 'a_upload_language_for_site', 'დროშის ფოტო, საიტზე გამოსაჩენად', 'flag image for site', 'фото флага, для сайта', NULL, NULL),
(175, 'a_upload_language_for_admin_panel', 'დროშის ფოტო, ადმინ პანელში გამოსაჩენად', 'flag image for admin panel', 'фото флага, для админ панели', NULL, NULL),
(176, 'a_default', 'ძირითადი', 'Default', 'По Умолчанию', NULL, NULL),
(177, 'a_default_for_admin_panel', 'ადმინ პანელში', 'Admin Panel', 'Админ Панель', NULL, NULL),
(178, 'recover_was_successful', 'მონაცემების შეცვლილია.', 'Data has changed.', 'Данные изменены.', NULL, NULL),
(179, 'recover_is_not_successful', 'მონაცემები შეცვლილი არ არის. გთხოვთ სცადოთ კიდევ ერთხელ.', 'Data is not changed. Please try again.', 'Данные не изменены. Пожалуйста попробуйте еще раз.', NULL, NULL),
(180, 'a_enter_module_title', 'მოდულის დასახელება', 'module title', 'название модуля', NULL, NULL),
(181, 'a_enter_module_full_title', 'მოდულის სრული დასახელება', 'module full title', 'полное название модуля', NULL, NULL),
(182, 'upload_file', 'ფაილი', 'file', 'файл', NULL, NULL),
(183, 'a_example_module_title', 'photo_gallery', 'photo_gallery', 'photo_gallery', NULL, NULL),
(184, 'file', 'ფაილი', 'file', 'файл', NULL, NULL),
(185, 'folder', 'ფოლდერი', 'folder', 'папку', NULL, NULL),
(186, 'a_add_module_parameter_warning', 'გთხოვთ ჯერ დაამატოთ მოდულის გვერდის პარამეტრი ', 'Please, first add module page parameter', 'Пожалуйста, сначало добавьте параметр страницы модуля', NULL, NULL),
(187, 'a_link_module_with_page', 'მივამაგროთ მოდული რომელიმე გვერდს', 'Link module with some page', 'Прикрепить модуль к какой нибудь странице', NULL, NULL),
(188, 'a_system_module', 'სისტემური მოდული', 'System module', 'Системный модуль', NULL, NULL),
(189, 'a_show_for_admin', 'გამოვაჩინოთ ადმინისთვის', 'Show for administrator', 'Показать для администратора', NULL, NULL),
(190, 'a_hide_for_admin', 'გავაქროთ ადმინისთვის', 'Hide for administrator', 'Скрыть для администратора', NULL, NULL),
(191, 'a_select_page_for_link', 'გვერდი, რომელსაც მივამაგრებთ მოდულს', 'page to link with module', 'страницу, для присоединения модуля', NULL, NULL),
(192, 'a_enter_module_photo_bg_color', 'მოდულის სურათის ფონის ფერი', 'module icon background color', 'цвет фона для иконки модуля', NULL, NULL),
(193, 'a_example_module_photo_bg_color', '00eeee', '00eeee', '00eeee', NULL, NULL),
(194, 'a_upload_module_small_icon', 'მოდულის პატარა ფოტო', 'module small icon photo', 'файл маленькой  иконки', NULL, NULL),
(195, 'a_type_module', 'Module', 'Module', 'Module', NULL, NULL),
(196, 'a_hide_for_admin_text', 'არ ჩანს ადმინისთვის.', 'Hide for administrator.', 'Невидимый для администратора.', NULL, NULL),
(197, 'a_type_widget', 'Widget', 'Widget', 'Widget', NULL, NULL),
(198, 'a_type_system_module', 'System Module', 'System Module', 'System Module', NULL, NULL),
(199, 'check_in_date', 'შესვლის თარიღი', 'Check in Date', 'Дата Въезда', NULL, NULL),
(200, 'check_out_date', 'გამოსვლის თარიღი', 'Check out Date', 'Дата Выезда', NULL, NULL),
(201, 'a_left_menu_edit_address', 'ელ. ფოსტის <br>შეცვლა', 'Edit <br>E-mail', 'Изменить <br>Эл. Адрес', NULL, NULL),
(202, 'a_title_edit_address', 'აქ შეგიძლიათ შეცვალოთ ელ. ფოსტა, რომელზეც მოვა რეზერვაციის გვერდიდან გამოგზავნილი წერილები', 'Here you can change the e-mail, on witch you will receive mail, sent from reservation page ', 'Здесь вы можете изменить адрес эл. почты, на который будут приходить письма, посланные со страницы резервации.', NULL, NULL),
(203, 'mail_sent_from', 'ეს წერილი გამოგზავნილია საიტიდან', 'This mail is sent from web page', 'Это письмо отправлено с сайта', NULL, NULL),
(204, 'there_is_no_such_user', 'ესეთი მომხმარებელი ვერ მოიძებნა.', 'This user is not found.', 'Такой пользователь не найден.', NULL, NULL),
(205, 'rooms', 'ოთახები', 'Rooms', 'Комнат', NULL, NULL),
(206, 'recover_password_title', 'პაროლის აღდგენა', 'Password recover', 'Востановление пароля', NULL, NULL),
(207, 'link', 'ბმული', 'Link', 'Ссылка', NULL, NULL),
(208, 'a_step_1', 'სისტემური სიტყვა', 'system word', 'системное слово', NULL, NULL),
(209, 'a_step_1', 'სისტემური სიტყვა', 'system word', 'системное слово', NULL, NULL),
(210, 'a_step_1', 'ადმინისტრატორი', 'admin', 'администратора', NULL, NULL),
(211, 'forgot_password_mail_part_1', 'აქ შეგიძლიათ აირჩიოთ ახალი პაროლი.', 'Here you can choose a new password.', 'Тут вы можете выбрать для себя новый пароль.', NULL, NULL),
(212, 'a_step_1', 'სისტემური სიტყვა', 'system word', 'системное слово', NULL, NULL),
(213, 'room_type_4', 'Lux', 'Lux', 'Lux', NULL, NULL),
(214, 'room_type_5', 'VIP', 'VIP', 'VIP', NULL, NULL),
(215, 'confirm', 'დადასტურება', 'Confirm', 'Подтверждать', NULL, NULL),
(216, 'forgot_password_is_not_successful', 'გარკვეული მიზეზების გამო, ესეთი მომხმარებელი ვერ მოიძებნა. გთხოვთ სცადოთ კიდევ ერთხელ.', 'For undetermined reasons, this user is not found. Please try again.', 'По неопределенным причинам, такой пользователь не найден. Пожалуйста попробуйте еще раз.', NULL, NULL),
(217, 'forgot_password_was_successful', 'თქვენი მომხმარებლის მონაცემები გამოგზავნილია თქვენს ელ. ფოსტაზე.', 'Your user data sent to your email.', 'Данные вашего пользователя высланы на вашу эл. почту.', NULL, NULL),
(218, 'mail_dont_send', 'გარკვეული შეფერხებების გამო, დაჯავშნა ვერ განხორციელდა', 'Due to some delays, the booking can not be implemented', 'В связи с некоторыми задержками, бронирование не может быть реализован', NULL, NULL),
(219, 'a_step_title', 'ნაბიჯის დასახელება', 'Step title', 'Название шага', NULL, NULL),
(220, 'share', 'გაზაირება', 'Share', 'Поделиться', NULL, NULL),
(221, 'a_example_step_title', 'კატეგორია', 'category', 'категория', NULL, NULL),
(222, 'greet_user', 'მოგესალმებით', 'Hello', 'Здравствуйте', NULL, NULL),
(223, 'cabinet', 'პირადი კაბინეტი', 'Personal area', 'Личный кабинет', NULL, NULL),
(224, 'placeholder', 'ძიება', 'Search', 'Поиск', NULL, NULL),
(225, 'last_name', 'გვარი', 'Last Name', 'Фамилия', NULL, NULL),
(226, 'phone_number', 'ტელეფონის ნომერი', 'Phone Number', 'Номер Телефона', NULL, NULL),
(227, 'a_left_menu_add_tag', 'სიტყვის<br>დამატება', 'Add<br>Tag', 'Добавить<br>Тег', NULL, NULL),
(228, 'a_left_menu_edit_or_delete_tag', 'სიტყვის<br>შეცვლა / წაშლა', 'Edit / Delete<br>Tag', 'Изменить / Удалить<br>Тег', NULL, NULL),
(229, 'a_tag', 'სიტყვა ღრუბელში', 'tag in cloud', 'тег в облако', NULL, NULL),
(230, 'a_enter_tag', 'შეიყვანეთ სიტყვა', 'Enter tag', 'Ведите тег', NULL, NULL),
(231, 'a_choose_tag_size', 'აირჩიეთ სიტყვის ზომა', 'Choose tag size', 'Выберите размер тега', NULL, NULL),
(232, 'a_enter_url', 'შეიყვანეთ ბმული', 'Enter url', 'Введите ссылку', NULL, NULL),
(233, 'a_open_url_in_new_window', 'ბმული გაიხსნას ახალ ფანჯარაში', 'Open link in new window', 'Открыть ссылку в новом окне', NULL, NULL),
(234, 'additional_information', 'დამატებითი ინფომრაცია', 'Additional Information', 'Дополнительная Информация', NULL, NULL),
(235, 'mail_is_send', 'დაჯავშნა წარმატებით განხორციელდა', 'Booking successfully', 'Бронирование успешно', NULL, NULL),
(236, 'mail_from', 'საიტიდან', 'From Web Page', 'С Сайта', NULL, NULL),
(237, 'activation_was_successful', 'თქვენ წარმატებით გაიარეთ მომხმარებლის აქტივაცია.', 'You have successfully completed the activation.', 'Вы успешно прошли активацию.', NULL, NULL),
(238, 'a_enter_admin_default_page', 'მოდულის ადმინ პანელის ძირითადი გვერდის დასახელება', 'module admin panel default page title', 'название страницы по умолчания, для админ панели модуля', NULL, NULL),
(239, 'a_example_admin_default_page', 'edit_or_delete_page', 'edit_or_delete_page', 'edit_or_delete_page', NULL, NULL),
(240, 'choose', 'არჩევა', 'Choose', 'Выбрать', NULL, NULL),
(241, 'view', 'ხილვა', 'View', 'Просмотр', NULL, NULL),
(242, 'example_file_title', 'images', 'images', 'images', NULL, NULL),
(243, 'no_files_in_folder', 'ამ ფოლდერში ვერცერთი ფაილი ვერ მოიძებნა.', 'No files in this folder.', 'В этой папке файлов не найдено.', NULL, NULL),
(244, 'a_enter_full_language_title', 'ენის სრული დასახელება', 'language full title', 'полное название языка', NULL, NULL),
(245, 'a_example_full_language_title', 'ქართული', 'Georgian', 'Грузинский', NULL, NULL),
(246, 'a_check_pages_for_include', 'გვერდები მოდულის ჩართვისთვის', 'pages for module include', 'страницы для подключения модуля', NULL, NULL),
(247, 'enter_folder_title', 'ფოლდერის დასახელება', 'folder title', 'название папки', NULL, NULL),
(248, 'example_folder_title', 'images', 'images', 'images', NULL, NULL),
(249, 'enter_file_title', 'ფაილის ფოლდერი', 'file folder', 'папку для файла', NULL, NULL),
(250, 'search', 'ძიება', 'Search', 'Поиск', NULL, NULL),
(251, 'search_text', 'საძიებო სიტყვა', 'word', 'слово', NULL, NULL),
(252, 'enter_email', 'ელ. ფოსტა', 'E-mail', 'Эл. почту', NULL, NULL),
(253, 'enter_password', 'პაროლი', 'Password', 'Пароль', NULL, NULL),
(254, 'registration', 'რეგისტრაცია', 'Registration', 'Регистрация', NULL, NULL),
(255, 'user_not_found', 'ესეთი მომხმარებელი ვერ მოიძებნა.', 'User not found.', 'Такой пользователь не найден.', NULL, NULL),
(256, 'enter_second_password', 'გაიმეორეთ პაროლი', 'Repeat Password', 'Повторите Пароль', NULL, NULL),
(257, 'on_link', 'ბმულზე', 'on link', 'по ссылке', NULL, NULL),
(258, 'activation_mail_part_1', 'თქვენი ელ. ფოსტა იყო გამოყენებული, საიტზე დარეგისტრირებისას.', 'Your e-mail used to registration on the site.', 'Ваша эл. почта использована для регистрации на сайте.', NULL, NULL),
(259, 'activation_mail_part_2', 'იმისთვის რომ გააქტიუროთ თქვენი მომხმარებელის ექაუნთი, გადადით შემდეგ', 'For user activation, click on the following', 'Для того чтобы активировать вашего пользователя, перейдите по следующей', NULL, NULL),
(260, 'activation_mail_part_3', 'თუ თქვენ არ გაგივლიათ რეგისტრაცია ამ ვებ გვერდზე, არ მოახდინოთ რეაგირება ამ წერილზე.', 'If you are not registered on this site, please ignore this message.', 'Если вы не регистрировались на этом сайте, проигнорируйте это письмо.', NULL, NULL),
(261, 'forgot_password_title', 'აქ შეგიძლიათ აღადგინოთ თქვენი მომხმარებლის მონაცემები', 'Here you can recover your user information', 'Здесь вы можете востановить данные своего пользователя', NULL, NULL),
(262, 'recover', 'აღდგენა', 'Recover', 'Востановить', NULL, NULL),
(263, 'room_type_2', 'Double', 'Double', 'Double', NULL, NULL),
(264, 'a_admin', 'ადმინისტრატორი', 'administrator', 'администратора', NULL, NULL),
(265, 'a_choose_database_tables', 'მონაცემთა ბაზის ცხრილები, რომლებიც დაკავშირებულია ამ მოდულთან', 'database tables which are connected with this module', 'таблицы базы данных, которые связанны с этим модулем', NULL, NULL),
(266, 'a_mysql_columns', 'MySql ცხრილის სვეტი', 'MySql table column', 'Ячейку таблицы MySql ', NULL, NULL),
(267, 'file_edit_or_delete_part', 'ვნახოთ / წავშალოთ<br>', 'View / Delete<br>', 'Посмотреть / Удалить<br>', NULL, NULL),
(268, 'a_columns_number', 'სვეტების რაოდენობა', 'Columns number', 'Кол-во колон', NULL, NULL),
(269, 'a_select_table_title', 'მონაცემთა ბაზის ცხრილი, რომელსაც დაემატება სვეტი', 'database table, to add a new cell', 'таблицу, к которой прибавится ячейка', NULL, NULL),
(270, 'a_example_full_column_title', 'title_', 'title_', 'title_', NULL, NULL),
(271, 'a_enter_full_column_title', 'MySql ცხრილის სვეტის დასახელების ნაწილი', 'MySql table column title part', 'часть названия ячейки таблицы MySql ', NULL, NULL),
(272, 'a_select_column_type', 'სვეტის ტიპი', 'column type', 'тип ячейки', NULL, NULL),
(273, 'a_title_choose_table', 'MySql ცხრილი, სვეტის მონაცემების შესაცვლელად ან წასაშლელად', 'MySql table, for change or delete column information', 'MySql таблицу, для изменения или удаление ячеек', NULL, NULL),
(274, 'a_select_column_type_lenght', 'სვეტის სიგრძე', 'column lenght', 'длину ячейки', NULL, NULL),
(275, 'a_module_page', 'მოდულის გვერდი', 'Module Page', 'Страницу Модуля', NULL, NULL),
(276, 'a_module_page_parameter', 'მოდულის გვერდის პარამეტრი', 'Module Page Parameter', 'Параметр Страницы Модуля', NULL, NULL),
(277, 'a_mysql_table', 'MySql ცხრილი', 'MySql Table', 'MySql Таблицу', NULL, NULL),
(278, 'condition_code_16', '', '', '', NULL, NULL),
(279, 'your_mail', 'თქვენი წერილი', 'Your Mail', 'Ваше письмо', NULL, NULL),
(280, 'condition_code_2', '', '', '', NULL, NULL),
(281, 'condition_code_20', '', '', '', NULL, NULL),
(282, 'condition_code_21', '', '', '', NULL, NULL),
(283, 'condition_code_22', '', '', '', NULL, NULL),
(284, 'a_enter_company_phone', 'კომპანიის ტელეფონის ნომერი', 'company phone number', 'телефонный номер компании', NULL, NULL),
(285, 'send_mail', 'გაგზავნა', 'Send', 'Отправить', NULL, NULL),
(286, 'a_enter_company_info', 'კომპანიის საკონტაქტო ინფორმაცია', 'company contact infromation', 'контактную информацию компании', NULL, NULL),
(287, 'your_email', 'თქვენი ელ. ფოსტა', 'Your E-mail	', 'Ваш эл. адрес', NULL, NULL),
(288, 'a_example_admin_email', 'admin@gmail.com, info@gmail.com', 'admin@gmail.com, info@gmail.com', 'admin@gmail.com, info@gmail.com', NULL, NULL),
(289, 'a_title_edit_or_delete_page_step_1', 'მოდული, გვერდის შესაცვლელად ან წასაშლელად', 'module to edit or delete page', 'модуль для редактирования или удаление страницы', NULL, NULL),
(290, 'a_pages_number', 'გვერდების რაოდენობა', 'Pages Number', 'Кол-во Страниц', NULL, NULL),
(291, 'a_choose_module_for_page', 'მოდული რომელსაც მიეკუთვნება გვერდი', 'module that owns the page', 'модуль которому принадлежит страница', NULL, NULL),
(292, 'a_upload_module_page_button_icon', 'მოდულის გვერდის ღილაკის ფოტო', 'module page button image', 'фото кнопки страницы модуля', NULL, NULL),
(293, 'a_choose_page_type', 'გვერდის ტიპი', 'page type', 'тип страницы', NULL, NULL),
(294, 'a_enter_page_title_part_system_word', 'სისტემური სიტყვა გვერდის დასახელებისთვის', 'system variable for page title', 'системное слово для названия страницы', NULL, NULL),
(295, 'a_example_page_title_part_system_word', 'a_image', 'a_image', 'a_image', NULL, NULL),
(296, 'a_show_small_icon', 'გამოვაჩინოთ პატარა ფოტო?', 'Show small icon?', 'Показать маленькую иконку?', NULL, NULL),
(297, 'a_show_bg', 'გამოვაჩინოთ ღილაკის ქვეშ ფონი?', 'Show background under the button?', 'Показать фон под кнопкой?', NULL, NULL),
(298, 'a_enter_page_url', 'მოდულის გვერდის მისამართი', 'module page url', 'ссылку на страницу модуля', NULL, NULL),
(299, 'a_example_page_url', '../modules/photo_gallery/admin_panel/edit_or_delete_image', '../modules/photo_gallery/admin_panel/edit_or_delete_image', '../modules/photo_gallery/admin_panel/edit_or_delete_image', NULL, NULL),
(300, 'a_enter_module_page_parameter_title', 'მოდულის გვერდის პარამეტრის დასახელება', 'module page parameter title', 'название параметра страницы модуля', NULL, NULL),
(301, 'a_upload_module_page_parameter_icon', 'მოდულის გვერდის პარამეტრის ფოტო', 'module page parameter image', 'фото параметра страницы модуля', NULL, NULL),
(302, 'a_upload_module_page_parameter_small_icon', 'მოდულის გვერდის პარამეტრის პატარა ფოტო', 'module page parameter small image', 'маленькое фото параметра страницы модуля', NULL, NULL),
(303, 'a_add_data_base_table', 'გთხოვთ ჯერ დაამატოთ ცხრილი მონაცემთა ბაზაში', 'Please, at first add a table in data base', 'Пожалуйста сначала добавьте таблицу в базу данных', NULL, NULL),
(304, 'a_add_module_warning', 'გთხოვთ ჯერ დაამატოთ მოდული', 'Please, at first add a module', 'Пожалуйста сначала добавьте модуль', NULL, NULL),
(305, 'a_include_type_4_message', 'მოდული არ გამოჩნდება არცერთ გვერდზე', 'Module is not attached to any page', 'Отключить модуль на для всех страниц', NULL, NULL),
(306, 'a_include_type_4', 'არ მივაბათ მოდული არცერთ გვერდს', 'Do not connect module to any page', 'Не прикреплять модуль ни к одной странице', NULL, NULL),
(307, 'a_include_type_1_message', 'მოდული გამოჩნდება ყველა გვერდზე', 'Module will be visible on all pages', 'Включить модуль на всех страницах', NULL, NULL),
(308, 'a_include_type_2', 'გამოვაჩინოთ გვერდებზე', 'Show on pages', 'Показать на страницах', NULL, NULL),
(309, 'a_include_type_3', 'გამოვაჩინოთ ყველა გვერდზე, გარდა', 'Show on all pages, except', 'Показать на всех страницах, кроме', NULL, NULL),
(310, 'a_upload_active_language_for_site', 'აქტიური დროშის ფოტო, საიტზე გამოსაჩენად', 'active flag photo, for site', 'фото активного флага, для сайта', NULL, NULL),
(311, 'user_is_exsist', 'ესეთი მომხმარებელი უკვე არსებობს', 'This user already exists', 'Такой пользователь уже существует', NULL, NULL),
(312, 'sender_name', 'გამომგზავნის სახელი', 'Sender Name', 'Имя отправителя', NULL, NULL),
(313, 'a_enter_company_facebook_url', 'კომაპნიის FaceBook გვერდის მისამართი', 'company FaceBook page url', 'FaceBook страницу компании', NULL, NULL),
(314, 'a_map', 'განლაგება რუკაზე', 'Map location', 'Расположение на карте', NULL, NULL),
(315, 'a_enter_admin_email', 'ელ. ფოსტის მისამართი', 'Enter your email', 'адрес эл. почты', NULL, NULL),
(316, 'sender_email', 'გამომგზავნის ელ. ფოსტა', 'Sender E-mail', 'Эл. адрес отправителя', NULL, NULL),
(317, 'a_map_coordinate_x', 'მარკერის X კოორდინატა', 'marker X coordinate', 'X координату маркера', NULL, NULL),
(318, 'a_map_coordinate_y', 'მარკერის Y კოორდინატა', 'marker Y coordinate', 'Y координату маркера', NULL, NULL),
(319, 'a_map_zoom', 'რუკის მიახლოება', 'Map zoom', 'Приближение карты', NULL, NULL),
(320, 'contact_form', 'საკონტაქტო ფორმა', 'Contact Form', 'Контактная Форма', NULL, NULL),
(321, 'reservation_form', 'რეზერვაციის ფორმა', 'Reservation Form', 'Форма Резервации', NULL, NULL),
(322, 'condition_code_17', '', '', '', NULL, NULL),
(323, 'condition_code_18', '', '', '', NULL, NULL),
(324, 'condition_code_10', '', '', '', NULL, NULL),
(325, 'condition_code_11', '', '', '', NULL, NULL),
(326, 'condition_code_12', '', '', '', NULL, NULL),
(327, 'condition_code_13', '', '', '', NULL, NULL),
(328, 'condition_code_14', '', '', '', NULL, NULL),
(329, 'condition_code_15', '', '', '', NULL, NULL),
(330, 'a_enter_step_db_table', 'მონაცემთა ბაზის ცხრილი ნაბიჯისთვის', '', '', NULL, NULL),
(331, 'condition_code_24', '', '', '', NULL, NULL),
(332, 'condition_code_25', '', '', '', NULL, NULL),
(333, 'condition_code_26', '', '', '', NULL, NULL),
(334, 'condition_code_27', '', '', '', NULL, NULL),
(335, 'condition_code_28', '', '', '', NULL, NULL),
(336, 'condition_code_29', '', '', '', NULL, NULL),
(337, 'condition_code_3', '', '', '', NULL, NULL),
(338, 'condition_code_30', '', '', '', NULL, NULL),
(339, 'condition_code_31', '', '', '', NULL, NULL),
(340, 'condition_code_32', '', '', '', NULL, NULL),
(341, 'condition_code_3200', '', '', '', NULL, NULL),
(342, 'condition_code_33', '', '', '', NULL, NULL),
(343, 'condition_code_34', '', '', '', NULL, NULL),
(344, 'condition_code_35', '', '', '', NULL, NULL),
(345, 'condition_code_36', '', '', '', NULL, NULL),
(346, 'condition_code_37', '', '', '', NULL, NULL),
(347, 'condition_code_38', '', '', '', NULL, NULL),
(348, 'condition_code_39', '', '', '', NULL, NULL),
(349, 'condition_code_4', '', '', '', NULL, NULL),
(350, 'condition_code_40', '', '', '', NULL, NULL),
(351, 'condition_code_41', '', '', '', NULL, NULL),
(352, 'condition_code_42', '', '', '', NULL, NULL),
(353, 'condition_code_43', '', '', '', NULL, NULL),
(354, 'condition_code_44', '', '', '', NULL, NULL),
(355, 'condition_code_45', '', '', '', NULL, NULL),
(356, 'condition_code_46', '', '', '', NULL, NULL),
(357, 'condition_code_47', '', '', '', NULL, NULL),
(358, 'condition_code_5', '', '', '', NULL, NULL),
(359, 'condition_code_6', '', '', '', NULL, NULL),
(360, 'condition_code_7', '', '', '', NULL, NULL),
(361, 'condition_code_8', '', '', '', NULL, NULL),
(362, 'condition_code_9', '', '', '', NULL, NULL),
(363, 'temperature', '', '', '', NULL, NULL),
(364, 'a_configuration', 'სის. კონფიგურაცია', 'sys. configuration', 'сис. конфигурацию', NULL, NULL),
(365, 'a_word', 'სის. სიტყვა', 'sys. word', 'сис. слово', NULL, NULL),
(366, 'a_select_module', 'მოდული', 'module', 'модуль', NULL, NULL),
(367, 'a_select_link_page', 'მოდულის გვერდი', 'module page', 'страницу модуля', NULL, NULL),
(368, 'a_include_type_0', 'მივამაგროთ გვერდს', 'Attach to page', 'Прикрепить к странице', NULL, NULL),
(369, 'a_step_1', 'სისტემური კონფიგურაცია', 'system configuration', 'системную конфигурацию', NULL, NULL),
(370, 'a_example_db_table', 'news_step_0', 'news_step_0', 'news_step_0', NULL, NULL),
(371, 'a_include_type_1', 'გამოვაჩინოთ ყველა გვერდზე', 'Show on all pages', 'Показать на всех страницах', NULL, NULL),
(372, 'a_step_0', 'მოდული', 'module', 'модуль', NULL, NULL),
(373, 'a_step_1', 'ნაბიჯი', 'step', 'уровень', NULL, NULL),
(374, 'a_step_2', 'ბლოკი', 'block', 'блок', NULL, NULL),
(375, 'steps', 'ნაბიჯები', 'Steps', 'Шаги', NULL, NULL),
(376, 'a_enter_db_table', 'მონაცემთა ბაზის ცხრილის დასახელება', 'Database table title', 'Название таблицы базы данных', NULL, NULL),
(377, 'a_enter_admin_default_page_url', 'ადმინ პანელში გვერდის მისამართი', 'admin panel default page url', 'адрес страницы в админ панели', NULL, NULL),
(378, 'a_example_admin_default_page_url', '../modules/news/admin_panel/edit_or_delete_step_1', '../modules/news/admin_panel/edit_or_delete_step_1', '../modules/news/admin_panel/edit_or_delete_step_1', NULL, NULL),
(379, 'a_select_module', 'მოდული', 'module', 'модуль', NULL, NULL),
(380, 'include_in_all_pages', 'ჩავრთოთ ყველა გვერდზე', 'Include in all pages', 'Включить на всех страницах', NULL, NULL),
(381, 'a_step_0', 'მოდული', 'module', 'моду', NULL, NULL),
(382, 'a_step_0', 'ენა', 'language', 'Язык', NULL, NULL),
(383, 'a_for_tags_is_empty', '-Empty-', '-Empty-', '-Empty-', NULL, NULL),
(384, 'search', 'ძიება', 'Search', 'Поиск', NULL, NULL),
(385, 'result_found_count', 'მოიძებნა:  ', 'Found: ', 'Найденно: ', NULL, NULL),
(386, 'result_not_found', 'მონაცემები ვერ მოიძებნა', 'Result not found', 'Данные не найдены', NULL, NULL),
(387, 'user_lang', 'მომხმარებელმა გამოიყენა ვებ-გვერდის ', 'User was using website on', 'Пользователь использовал ', NULL, NULL),
(388, 'user_lang_1', 'ვერსია', '', 'язык', NULL, NULL),
(389, 'all_categories', 'ყველა კატეგორია', 'all categories', 'все категории', NULL, NULL),
(390, 'go_to_link', 'ბმულზე', 'link', 'ссылке', NULL, NULL),
(391, 'fail_email', 'არასწორი მეილი', 'Enter correct email!', 'Неправильный адрес эл-почты', NULL, NULL),
(392, 'succes_email', 'წერილი წარმატებით გაიგზავნა თქვენს ფოსტაზე', 'Email successfully sent', 'Письмо успешнно отправленно', NULL, NULL),
(393, 'from', 'დან', 'from', 'от', NULL, NULL),
(394, 'mail_is_send', 'თქვენ წარმატებით გაიარეთ რეგისტრაცია. შეამოწმეთ ელ-ფოსტა პროფილის აქტივაციისთვის', 'You are registered now. Check your E-mail to activate your account', 'Вы зарегистрированы. Провертье вашу Эл-почту для активации аккаунта', NULL, NULL),
(395, 'mail_dont_send', 'თქვენი წერილი ვერ გაიგზავნა', 'Your mail is not sent', 'Ваше письмо не отправлено', NULL, NULL),
(396, 'basket_is_empty', 'თქვენი კალათა ცარიელია', 'Your basket is empty', 'Ваша корзина пуста', NULL, NULL),
(397, 'discount', 'ფასდაკლებით', 'Discount', 'Скидкой', NULL, NULL),
(398, 'pay_now', 'ყიდვა', 'Buy', 'Купить ', NULL, NULL),
(399, 'delete', 'წაშლა', 'Delete', 'Удалить', NULL, NULL),
(400, 'name', 'სახელი და გვარი:', 'Name & Surname:', 'Имя и фамилия:', NULL, NULL),
(401, 'a_order', 'შეკვეთა', 'Order', 'Заказ', NULL, NULL),
(402, 'email', 'ელ-ფოსტა:', 'Email:', 'Эл. адрес:', NULL, NULL),
(403, 'choosed_product', 'არჩეული პროდუქტი', 'Selected product', 'Выбранный продукт', NULL, NULL),
(404, 'order', 'შეკვეთა', 'Order', 'Заказ', NULL, NULL),
(405, 'email', 'ელ.ფოსტა:', 'Email:', 'Эл. почта:', NULL, NULL),
(406, 'name', 'სახელი და გვარი:', 'Name & Surname:', 'Имя и фамилия:', NULL, NULL),
(407, 'price', 'ფასი:', 'Price:', 'Цена:', NULL, NULL),
(408, 'choosed_product', 'არჩეული პროდუქტი:', 'Selected Product', 'Выбранный продукт', NULL, NULL),
(409, 'type_of_payment', 'გადახდის ტიპი:', 'Type of payment:', 'Тип оплаты:', NULL, NULL),
(410, 'filters', 'ფილტრები:', 'Filters:', 'Фильтры:', NULL, NULL),
(411, 'type_of_status_1', 'ყველა', 'All', 'Все', NULL, NULL),
(412, 'total_orders', 'თქვენ სულ გაქვთ ', 'You all have', 'У вас всего ', NULL, NULL),
(413, 'type_of_status_5', 'გაუქმებული შეკვეთა', 'Canceled order', 'Отмененный заказ', NULL, NULL),
(414, 'type_of_status_2', 'თანხა ჩამოჭრილია', 'The amount has been cut', 'Сумма срезана со счёта', NULL, NULL),
(415, 'type_of_status_3', 'თანხა დაბლოკილია', 'The amount is locked', 'Сумма заблокирована', NULL, NULL),
(416, 'type_of_status_4', 'თანხა დაბრუნებულია', 'The amount has returned', 'Сумма возвращена', NULL, NULL),
(417, 'type_of_payment_1', 'ადგილზე გადახდა ნაღდი ანგარიშწორებით', 'Payment in cash', 'Оплата наличными', NULL, NULL),
(418, 'type_of_payment_2', 'Online გადახდა ბანკის მეშვეობით', 'Pay Online through the Bank', 'Оплата онлайн через банк', NULL, NULL),
(419, 'change_password', 'პაროლის შეცვლა', 'Change password', 'Сменить пароль', NULL, NULL),
(420, 'view_orders', 'შეკვეთების ნახვა', 'View orders', 'Посмотреть заказы', NULL, NULL),
(421, 'orders', 'შეკვეთა', 'orders', 'заказов', NULL, NULL),
(422, 'mail_is_not_correct', 'მომხმარებელი ასეთი  ელ-ფოსტით არ არსებობს', 'Mail is not correct', 'Пользователь с таким адресом электронной почты не найден', NULL, NULL),
(423, 'search_input_v0_placeholder', 'ძიება', 'Search', 'Поиск', NULL, NULL),
(424, 'a_language', 'ენა', 'language', 'язык', NULL, NULL),
(425, 'password_recovery_success', 'პაროლის აღდგენის ისტრუქცია გაგზავნილია თქვენს ელ. ფოსტაზე. ', 'Password recovery instructions have been sent to your email.', 'Инструкция по восстановлению пароля выслана на вашу эл. почту.', NULL, NULL),
(426, 'password_recovery_error', 'მომხმარებელი ესეთი მონაცემებით ვერ მოიძებნა. გთხოვთ სცადოთ კიდევ ერთხელ.', 'A user with such data was not found. Please try again.', 'Пользователь с такими данными не был найден. Пожалуйста попробуйте ещё раз.', NULL, NULL),
(427, 'registration_error', 'რეგისტრაცია დასრულდა წარუმატებლად. შესაძლოა მომხმარებელი ესეთი ელ. ფოსტით უკვე არსებობს', 'Registration was unsuccessful. Perhaps a user with this email already exists', 'Регистрация прошла неудачно. Возможно пользователь с таким эл. адресом уже существует', NULL, NULL),
(428, 'registration_success', 'თქვენ წარმატებით გაიარეთ რეგისტრაცია. გაიარეთ მომხმარებლის აქტივაცია თქვენი ელ. ფოსტის საშუალებით. იხილეთ წერილი.', 'You have successfully registered. For user activation, follow the link sent on your e-mail.', 'Вы успешно прошли регистрацию. Активируйте вашего пользователя с помощью письма которое отправлено на ваш эл. адрес. ', NULL, NULL),
(429, 'phone_number', '555454123', '555454123', '555454123', '2021-05-25 04:02:06', '2021-05-25 04:02:16');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable` int(11) NOT NULL DEFAULT '0',
  `like_default` int(11) NOT NULL DEFAULT '0',
  `like_default_for_admin` int(11) NOT NULL DEFAULT '0',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `title`, `full_title`, `disable`, `like_default`, `like_default_for_admin`, `rang`, `created_at`, `updated_at`, `published`) VALUES
(97, 'ru', 'Ру', 0, 0, 0, 0, NULL, '2021-07-08 16:27:36', 1),
(99, 'ge', 'ქა', 0, 1, 1, 10, NULL, '2021-07-08 16:27:36', 1),
(104, 'en', 'En', 0, 0, 0, 5, '2021-01-15 14:23:35', '2021-07-08 16:27:36', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_buttons`
--

CREATE TABLE `menu_buttons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `page` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published` int(11) NOT NULL DEFAULT '0',
  `rang` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_buttons`
--

INSERT INTO `menu_buttons` (`id`, `title_ge`, `title_en`, `title_ru`, `page`, `created_at`, `updated_at`, `published`, `rang`) VALUES
(1, 'ჩვენს შესახებ', 'About Us', 'О Нас', 1, NULL, NULL, 1, 10),
(2, 'კონტაქტი', 'Contact', 'Контакты', 2, NULL, NULL, 1, 0),
(3, 'მთავარი', 'Home', 'Главная', 3, NULL, NULL, 1, 20),
(4, 'სიახლეები', 'News', 'Новости', 4, NULL, NULL, 1, 15),
(5, 'ფოტო გალერეა', 'Photo Gallery', 'Фото Галерея', 7, NULL, NULL, 1, 5);

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
(40, '2021_10_14_182741_add_fit_position_to_module_blocks', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `include_type` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` int(11) NOT NULL DEFAULT '0',
  `hide_for_admin` int(11) NOT NULL DEFAULT '0',
  `icon_bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rang` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`id`, `include_type`, `alias`, `title`, `page`, `hide_for_admin`, `icon_bg_color`, `rang`, `created_at`, `updated_at`) VALUES
(1, 2, 'news', 'სიახლეები', 4, 0, '#aabbaa', 5, NULL, '2021-06-04 09:37:40'),
(7, 0, 'photo_gallery', 'ფოტო გალერეა', 7, 0, '#9929bd', 15, '2021-01-02 15:39:38', '2021-05-07 08:04:57'),
(14, 2, 'partners', 'პარტნიორები', 0, 1, '#d39d00', 10, '2021-01-17 16:57:15', '2021-05-24 10:22:14'),
(15, 4, 'pages', 'გვერდები', 0, 0, '#669d34', 20, '2021-04-16 09:14:00', '2021-05-07 08:04:42'),
(16, 1, 'menu_buttons', 'ღილაკების მენიუ', 0, 0, '#e32400', 0, '2021-05-03 07:13:02', '2021-05-07 08:05:05'),
(17, 1, 'header', 'ქუდი', 0, 1, '#4d22b4', 5, '2021-06-09 11:00:03', '2021-06-09 11:07:01'),
(18, 1, 'footer', 'სარდაფი', 0, 1, '#c4bc00', 0, '2021-06-09 11:06:05', '2021-06-09 11:06:50');

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
  `check_in_delete_empty` int(11) NOT NULL DEFAULT '0',
  `top_level` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `a_use_for_sort` int(11) NOT NULL DEFAULT '0',
  `sort_by_desc` int(11) NOT NULL DEFAULT '0',
  `a_use_for_tags` int(11) NOT NULL DEFAULT '0',
  `file_possibility_to_delete` int(11) NOT NULL DEFAULT '0',
  `image_width` int(11) NOT NULL DEFAULT '0',
  `image_height` int(11) NOT NULL DEFAULT '0',
  `image_cover` int(11) NOT NULL DEFAULT '0',
  `image_fill` int(11) NOT NULL DEFAULT '0',
  `image_width_1` int(11) NOT NULL DEFAULT '0',
  `image_height_1` int(11) NOT NULL DEFAULT '0',
  `image_cover_1` int(11) NOT NULL DEFAULT '0',
  `image_fill_1` int(11) NOT NULL DEFAULT '0',
  `image_width_2` int(11) NOT NULL DEFAULT '0',
  `image_height_2` int(11) NOT NULL DEFAULT '0',
  `image_cover_2` int(11) NOT NULL DEFAULT '0',
  `image_fill_2` int(11) NOT NULL DEFAULT '0',
  `image_width_3` int(11) NOT NULL DEFAULT '0',
  `image_height_3` int(11) NOT NULL DEFAULT '0',
  `image_cover_3` int(11) NOT NULL DEFAULT '0',
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
  `fit_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `module_blocks`
--

INSERT INTO `module_blocks` (`id`, `check_in_delete_empty`, `top_level`, `type`, `a_use_for_sort`, `sort_by_desc`, `a_use_for_tags`, `file_possibility_to_delete`, `image_width`, `image_height`, `image_cover`, `image_fill`, `image_width_1`, `image_height_1`, `image_cover_1`, `image_fill_1`, `image_width_2`, `image_height_2`, `image_cover_2`, `image_fill_2`, `image_width_3`, `image_height_3`, `image_cover_3`, `image_fill_3`, `hide`, `rang`, `min_range`, `max_range`, `range_step`, `range_value`, `db_column`, `label`, `example`, `select_table`, `select_condition`, `select_sort_by`, `select_search_column`, `select_option_text`, `select_optgroup_table`, `select_optgroup_sort_by`, `select_optgroup_text`, `select_option_2_text`, `select_optgroup_2_table`, `select_optgroup_2_sort_by`, `select_optgroup_2_text`, `select_active_option`, `select_first_option_value`, `select_first_option_text`, `label_for_ajax_select`, `file_folder`, `file_title`, `file_format`, `file_name_index_1`, `file_name_index_2`, `file_name_index_3`, `radio_value`, `radio_class`, `sql_select_with_checkboxes_table`, `sql_select_with_checkboxes_sort_by`, `sql_select_with_checkboxes_option_text`, `sql_select_with_checkboxes_table_inside`, `sql_select_with_checkboxes_sort_by_inside`, `sql_select_with_checkboxes_option_text_inside`, `params_values_table`, `div_id`, `created_at`, `updated_at`, `select_sort_by_text`, `validation`, `fit_position`) VALUES
(9, 0, 28, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 'alias', 'Alias GE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-01-22 11:32:25', '2021-09-17 13:30:37', 'desc', '', ''),
(12, 0, 10, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'asdfsыыыы 222', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-01-22 11:37:17', '2021-01-22 12:29:04', 'desc', '', ''),
(13, 0, 28, 'input_with_languages', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'title', 'Title', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-02-08 12:47:57', '2021-09-17 13:30:54', 'desc', '', ''),
(16, 1, 31, 'input_with_languages', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 'title', 'დასახელება', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-03-19 03:59:48', '2021-10-14 13:04:05', 'desc', '', ''),
(19, 0, 31, 'rang', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'rang', 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-03-19 04:01:13', '2021-04-18 22:36:56', 'desc', '', ''),
(20, 0, 31, 'published', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'published', 'published', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-03-19 04:01:39', '2021-04-18 22:36:47', 'desc', '', ''),
(21, 1, 31, 'input', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'link', 'ბმული', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-03-19 04:02:06', '2021-10-14 13:04:56', 'desc', '', ''),
(22, 0, 8, 'published', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'published', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:02:51', '2021-05-07 03:03:11', 'desc', '', ''),
(23, 1, 8, 'editor_with_languages', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 'text', 'ტექსტი ქართული', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:03:27', '2021-09-17 14:51:59', 'desc', '', ''),
(26, 1, 8, 'alias', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 'alias', 'Alias ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:06:40', '2021-09-17 14:51:30', 'desc', '', ''),
(29, 1, 8, 'input_with_languages', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 'title', 'სათაური ქართული', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:07:50', '2021-09-17 14:52:13', 'desc', '', ''),
(32, 0, 32, 'published', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'published', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:37:15', '2021-05-07 03:37:44', 'desc', '', ''),
(33, 0, 32, 'select', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'page', 'გვერდი', '', 'pages_step_0', '', 'alias_ge', '', 'alias_ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:37:53', '2021-06-10 04:02:29', 'desc', '', ''),
(34, 1, 32, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 'title_ge', 'დასახელება ქართულად', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:38:30', '2021-05-07 03:41:48', 'desc', '', ''),
(35, 1, 32, 'input', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'title_en', 'დასახელება ინგლისურად', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:38:51', '2021-05-07 03:39:13', 'desc', '', ''),
(36, 1, 32, 'input', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 'title_ru', 'დასახელება რუსულად', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 03:39:15', '2021-05-07 03:39:31', 'desc', '', ''),
(37, 0, 2, 'rang', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 04:02:45', '2021-09-22 14:43:30', 'desc', '', ''),
(38, 0, 2, 'published', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 'published', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 04:03:07', '2021-05-07 04:03:16', 'desc', '', ''),
(41, 0, 2, 'input_with_languages', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'title', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-07 04:03:57', '2021-09-22 14:34:44', 'desc', '', ''),
(42, 0, 28, 'rang', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'rang', 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-24 05:57:43', '2021-06-01 06:07:10', 'desc', '', ''),
(43, 0, 32, 'rang', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'rang', 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-24 06:08:40', '2021-05-24 06:13:18', 'desc', '', ''),
(45, 0, 8, 'select_with_optgroup', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'category', 'კატეგორია', '', 'news', '', 'rang', '', 'alias_ge', 'news_step_0', 'title_ge', 'title_ge', '', 'news_step_1', 'title_ge', 'title_ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 00:55:46', '2021-06-10 01:59:05', 'desc', '', ''),
(46, 0, 29, 'published', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'published', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:14:41', '2021-05-25 06:15:26', 'desc', '', ''),
(47, 0, 29, 'rang', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:15:30', '2021-05-25 06:15:40', 'desc', '', ''),
(48, 0, 29, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'title_ru', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:15:47', '2021-05-25 06:26:23', 'desc', '', ''),
(49, 0, 29, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 'title_en', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:16:27', '2021-05-25 06:26:28', 'desc', '', ''),
(50, 0, 29, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 'title_ge', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:24:00', '2021-05-25 06:26:32', 'desc', '', ''),
(51, 0, 29, 'editor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 'text_ge', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:24:28', '2021-05-25 06:24:59', 'desc', '', ''),
(52, 0, 29, 'editor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'text_en', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:25:01', '2021-05-25 06:26:11', 'desc', '', ''),
(53, 0, 29, 'editor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 'text_ru', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:25:12', '2021-05-25 06:27:22', 'desc', '', ''),
(54, 0, 29, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 'alias_ge', 'Alias Ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:25:40', '2021-05-27 06:10:28', 'desc', '', ''),
(55, 0, 29, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 'alias_en', 'Alias En', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:27:35', '2021-05-27 06:10:33', 'desc', '', ''),
(56, 0, 29, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 'alias_ru', 'Alias Ru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 06:27:47', '2021-05-27 06:11:43', 'desc', '', ''),
(57, 0, 30, 'published', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'published', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:14:10', '2021-05-28 00:14:32', 'desc', '', ''),
(58, 0, 30, 'rang', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:14:35', '2021-05-28 00:14:53', 'desc', '', ''),
(59, 0, 30, 'editor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 'text_ge', 'აღწერა Ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:14:55', '2021-05-28 00:15:20', 'desc', '', ''),
(60, 0, 30, 'editor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'text_en', 'აღწერა En', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:15:22', '2021-05-28 00:15:34', 'desc', '', ''),
(61, 0, 30, 'editor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 'text_ru', 'აღწერა Ru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:15:36', '2021-05-28 00:15:46', 'desc', '', ''),
(62, 0, 30, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 'title_ge', 'სათაური Ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:15:47', '2021-05-28 00:16:01', 'desc', '', ''),
(63, 0, 30, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 'title_en', 'სათაური En', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:16:03', '2021-05-28 00:16:13', 'desc', '', ''),
(64, 0, 30, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'title_ru', 'სათაური Ru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:16:16', '2021-05-28 00:16:27', 'desc', '', ''),
(65, 0, 30, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 'alias_ge', 'Alias Ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:16:29', '2021-05-28 00:16:45', 'desc', '', ''),
(66, 0, 30, 'input', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 'alias_en', 'Alias En', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:16:47', '2021-05-28 00:16:57', 'desc', '', ''),
(67, 0, 30, 'input', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 'alias_ru', 'Alias Ru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 00:16:59', '2021-05-28 00:17:08', 'desc', '', ''),
(68, 0, 33, 'published', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'published', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:42:52', '2021-05-28 05:43:00', 'desc', '', ''),
(69, 0, 33, 'rang', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'rang', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:43:02', '2021-05-28 05:43:10', 'desc', '', ''),
(70, 0, 33, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 'title_ge', 'სათაური Ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:43:12', '2021-05-28 05:43:58', 'desc', '', ''),
(71, 0, 33, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'title_en', 'სათაური En', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:44:01', '2021-05-28 05:44:12', 'desc', '', ''),
(72, 0, 33, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 'title_ru', 'სათაური Ru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:44:14', '2021-05-28 05:44:27', 'desc', '', ''),
(73, 0, 33, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 'alias_ge', 'Alias Ge', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:44:39', '2021-05-28 05:44:54', 'desc', '', ''),
(74, 0, 33, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 'alias_en', 'Alias En', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:44:55', '2021-05-28 05:45:05', 'desc', '', ''),
(75, 0, 33, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 'alias_ru', 'Alias Ru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 05:45:07', '2021-05-28 05:45:16', 'desc', '', ''),
(77, 0, 34, 'input', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'title_ge', 'სათაური', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-30 23:30:33', '2021-05-30 23:30:53', 'desc', '', ''),
(78, 0, 28, 'checkbox', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 'checkbox', 'Checkbox', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-06-01 04:02:50', '2021-06-01 05:59:51', 'desc', '', ''),
(79, 0, 28, 'calendar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 'calendar', 'calendar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-06-01 06:09:34', '2021-06-01 06:38:35', 'desc', '', ''),
(80, 0, 28, 'image', 0, 0, 0, 1, 600, 400, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'multiply_checkbox_catg', 'photo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'news_step_0', 'rang', 'title_ge', 'news_step_1', 'rang', 'title_ge', '', '', '2021-06-03 01:28:20', '2021-06-06 23:09:22', 'desc', '', ''),
(81, 0, 31, 'image', 0, 0, 0, 0, 700, 400, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, '', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-17 13:25:38', '2021-10-14 13:05:31', 'desc', '', ''),
(82, 0, 2, 'image', 0, 0, 0, 0, 500, 350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'ფოტო', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-17 15:39:12', '2021-10-14 14:39:42', 'desc', '', 'center'),
(83, 1, 2, 'alias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 'alias', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-19 15:31:50', '2021-09-19 15:31:57', 'desc', '', ''),
(84, 0, 28, 'editor_with_languages', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 'text', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-20 15:36:48', '2021-09-20 15:37:02', 'desc', '', ''),
(85, 1, 2, 'editor_with_languages', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'text', 'აღწერა', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-09-20 15:40:12', '2021-09-20 15:40:27', 'desc', '', '');

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
(2, 7, 'კატეგორია', 'photo_gallery_step_0', 1, 1, 1, 1, 1, 0, 0, 0, '2021-01-02 16:48:50', '2021-05-07 08:05:48'),
(3, 8, 'temp', '', 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-06 17:35:57', '2021-01-06 17:35:57'),
(4, 8, 'temp', '', 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-06 17:35:58', '2021-01-06 17:35:58'),
(5, 8, 'temp', '', 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-06 17:35:59', '2021-01-06 17:35:59'),
(8, 15, 'გვერდი', 'pages_step_0', 0, 1, 1, 1, 1, 0, 0, 0, '2021-01-17 16:59:38', '2021-06-04 09:44:54'),
(28, 1, 'კატეგორია', 'news_step_0', 1, 1, 1, 1, 1, 0, 0, 10, '2021-01-22 15:29:52', '2021-10-12 05:28:25'),
(29, 1, 'ქვე-კატეგორია', 'news_step_1', 0, 1, 1, 1, 1, 0, 0, 5, '2021-01-22 16:29:15', '2021-05-27 04:14:08'),
(30, 1, 'სიახლე', 'news_step_2', 0, 1, 1, 1, 1, 0, 0, 0, '2021-01-22 16:29:37', '2021-05-28 04:10:58'),
(31, 14, 'პარტნიორი', 'partners_step_0', 1, 1, 1, 1, 1, 0, 0, 0, '2021-03-19 07:59:03', '2021-10-14 12:59:35'),
(32, 16, 'მენიუს ღილაკი', 'menu_buttons', 0, 0, 0, 0, 0, 0, 0, 0, '2021-05-07 07:36:36', '2021-05-07 07:37:13'),
(33, 1, 'ფოტო', 'news_step_3', 0, 1, 1, 1, 1, 0, 0, 0, '2021-05-28 09:32:18', '2021-05-28 09:41:14');

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
  `text_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rang` int(11) NOT NULL DEFAULT '0',
  `published` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checkbox` int(11) NOT NULL DEFAULT '0',
  `calendar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `multiply_checkbox_catg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_0`
--

INSERT INTO `news_step_0` (`id`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `published`, `created_at`, `updated_at`, `checkbox`, `calendar`, `multiply_checkbox_catg`) VALUES
(7, 'მესამე-კატეგორია', 'მესამე-კატეგორია', 'andმესამე-კატეგორია', 'მესამე-კატეგორია', 'მესამე-კატეგორია', 'მესამე-კატეგორია', '', '', '', 0, 1, NULL, NULL, 0, '', ''),
(9, 'პირველი-კატეგორია', 'პირველი-კატეგორია', 'პირველი-კატეგორია', 'პირველი კატეგორია', 'პირველი კატეგორია', 'პირველი კატეგორია', '<p>333</p>', '<p>222</p>', '<p>111</p>', 5, 1, NULL, NULL, 0, '2021/06/01', '');

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
  `published` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_1`
--

INSERT INTO `news_step_1` (`id`, `parent`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `published`, `created_at`, `updated_at`) VALUES
(3, 7, 'მესამე-ქვე-კატეგორია412', 'მესამე-ქვე-კატეგორია412', 'მესამე-ქვე-კატეგორია65', 'მესამე ქვე-კატეგორია', 'მესამე ქვე-კატეგორია', 'მესამე ქვე-კატეგორია', 'მესამე ქვე-კატეგორია', 'მესამე ქვე-კატეგორია', 'მესამე ქვე-კატეგორია312', 0, 1, NULL, NULL),
(19, 9, 'პირველი-ქვე-კატეგორია-9', 'პირველი-ქვე-კატეგორია-9', 'პირველი-ქვე-კატეგორია-9', 'პირველი-ქვე-კატეგორია-9', 'პირველი-ქვე-კატეგორია-9', 'პირველი-ქვე-კატეგორია-9', 'პირველი-ქვე-კატეგორია-9 fff', 'პირველი-ქვე-კატეგორია-9', 'პირველი-ქვე-კატეგორია-9', 0, 1, NULL, NULL),
(24, 7, 'პირველი-ქვე-კატეგორია', 'პირველი-ქვე-კატეგორია', 'პირველი-ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 'პირველი ქვე-კატეგორია', 0, 1, NULL, NULL);

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
  `published` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_2`
--

INSERT INTO `news_step_2` (`id`, `parent`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `published`, `created_at`, `updated_at`) VALUES
(1, 3, 'პირველი-სიახლე', 'პირველი სიახლე324234', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე12344', 'პირველი სიახლე123', 0, 1, NULL, NULL),
(29, 24, 'პირველი-სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლე', 'პირველი სიახლეპირველი სიახლე', 'პირველი სიახლე', 0, 1, NULL, NULL),
(30, 24, '', '', '', '', '', '', NULL, NULL, NULL, 0, 1, NULL, NULL);

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
  `published` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_step_3`
--

INSERT INTO `news_step_3` (`id`, `parent`, `alias_ge`, `alias_en`, `alias_ru`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`, `rang`, `published`, `created_at`, `updated_at`) VALUES
(1, 3, '', '', '', '', '', '', NULL, NULL, NULL, 0, 1, NULL, NULL),
(2, 3, '', '', '', '', '', '', NULL, NULL, NULL, 0, 1, NULL, NULL),
(3, 3, '', '', '', '', '', '', NULL, NULL, NULL, 0, 1, NULL, NULL),
(6, 29, '', '', '', '', '', '', NULL, NULL, NULL, 0, 1, NULL, NULL),
(11, 1, 'პირველი-ფოტო', 'პირველი-ფოტო', 'პირველი-ფოტო', 'პირველი ფოტო', 'პირველი ფოტო', 'პირველი ფოტო', NULL, NULL, NULL, 0, 1, NULL, NULL);

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
  `published` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages_step_0`
--

INSERT INTO `pages_step_0` (`id`, `alias_ge`, `title_ge`, `text_ge`, `alias_en`, `title_en`, `text_en`, `alias_ru`, `title_ru`, `text_ru`, `created_at`, `updated_at`, `like_default`, `published`, `slug`, `category`) VALUES
(1, 'ჩვენს-შესახებ', 'ჩვენს შესახებ სათაური', 'ჩვენს შესახებ ტექსტი', 'about-us', 'About Us Title', 'About Us Text', 'о-нас', 'О Нас Название', 'О Нас Текст', NULL, NULL, 0, 1, 'about-us', 0),
(2, 'კონტაქტი', 'კონტაქტი სათაური', 'კონტაქტი ტექსტი', 'contact', 'Contact Title', 'Contact Text', 'контакты', 'Контакты Название', 'Контакты Текст', NULL, NULL, 0, 1, 'contact', 0),
(3, 'მთავარი', 'მთავარი გვერდი', 'მთავარის ტექსტური აღწერა', 'home', 'Home Page', 'Home page text', 'главная', 'Главная', 'Текст главной страницы', NULL, NULL, 1, 1, 'home', 0),
(4, 'სიახლეები', 'ჩვენი სიახლეები', 'სიახლეების საერთო ტექსტი.', 'news', 'News Title', 'News text', 'новости', 'Новости', 'Текст новостей', NULL, NULL, 0, 1, 'news', 0),
(5, 'რეგისტრაცია', 'რეგისტრაცია', 'რეგისტრაციის ტექსტი', 'registration', 'Registration', 'Registration Text', 'регистрация', 'Регистрация', 'Текст регистрации', NULL, NULL, 0, 1, 'registration', 0),
(6, 'ავტორიზაცია', 'ავტორიზაცია', '<p>ავტორიზაციის ტექსტი</p>', 'authorization', 'Authorization', '<p>Authorization text</p>', 'увквати', 'Авторизация', '<p>Текст автоизации</p>', NULL, NULL, 0, 1, 'authorization', 24),
(7, 'ფოტო-გალერეა', 'ფოტო გალერეა', '.', 'photo-gallery', 'Photo Gallery', '..', 'фото-галерея', 'Фото Галерея', '...', NULL, NULL, 0, 1, 'photo-gallery', 0);

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
  `published` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partners_step_0`
--

INSERT INTO `partners_step_0` (`id`, `title_ge`, `title_en`, `title_ru`, `link`, `rang`, `published`, `created_at`, `updated_at`) VALUES
(1, 'temp', '', '', '', 0, 1, NULL, NULL),
(2, 'ჰობი სტუდიო', 'HobbyStudio', 'HobbyStudio', 'http://hobbystudio.ge', 5, 1, NULL, NULL);

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
  `published` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias_ge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alias_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `text_ge` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `photo_gallery_step_0`
--

INSERT INTO `photo_gallery_step_0` (`id`, `title_ge`, `title_en`, `title_ru`, `rang`, `published`, `created_at`, `updated_at`, `alias_ge`, `alias_en`, `alias_ru`, `text_ge`, `text_en`, `text_ru`) VALUES
(1, 'სატესტო', 'Test', 'Тест', 0, 1, NULL, NULL, 'sdf', 'pdf', 'were', '<p>eee</p>', '<p>wwww</p>', '<p>dddd</p>'),
(2, 'პირველი', 'First', 'Первая', 5, 1, NULL, NULL, 'ggg', 'eee', 'sss', '<p>555</p>', '<p>444</p>', '<p>777</p>');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'ალექსი', 'alexshamoev@gmail.com', NULL, '$2y$10$fWuti7iDSZDxqUxHRtWDAuT7bO6ItX0gMIy/bpX3kUHZqptaSIcxu', NULL, '2021-06-16 10:21:55', '2021-07-05 11:40:35'),
(9, 'test', 'test@gmail.com', NULL, '$2y$10$weYGA0s4ax6AWefDG9UGUuDRc/3iDcOBz0GMaHEwnHIb3oPYidFRm', NULL, '2021-06-25 10:41:57', '2021-07-08 16:07:15'),
(10, 'ტესტ', 'hello@gmail.com', NULL, '$2y$10$G.SJY8.7dXUhq/zr9fkskeLLnsu6SFW8FNaRqmovDjSoafCPxMvuO', NULL, '2021-07-08 16:07:42', '2021-07-08 16:08:02');

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
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_buttons`
--
ALTER TABLE `menu_buttons`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT для таблицы `bsws`
--
ALTER TABLE `bsws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `menu_buttons`
--
ALTER TABLE `menu_buttons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT для таблицы `module_steps`
--
ALTER TABLE `module_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `news_step_0`
--
ALTER TABLE `news_step_0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `news_step_1`
--
ALTER TABLE `news_step_1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `news_step_2`
--
ALTER TABLE `news_step_2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `news_step_3`
--
ALTER TABLE `news_step_3`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `pages_step_0`
--
ALTER TABLE `pages_step_0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
