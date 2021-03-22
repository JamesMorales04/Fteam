-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-03-2021 a las 20:04:11
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credit_cards`
--

DROP TABLE IF EXISTS `credit_cards`;
CREATE TABLE IF NOT EXISTS `credit_cards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cardName` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expirationYear` int NOT NULL,
  `expirationMonth` int NOT NULL,
  `securityCode` int NOT NULL,
  `cardNumber` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `credit_cards_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `cardName`, `expirationYear`, `expirationMonth`, `securityCode`, `cardNumber`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'user1', 2014, 1, 456, '1234567891234567', 11, '2021-03-23 00:28:20', '2021-03-23 00:28:20'),
(2, 'user1', 2021, 3, 765, '0987654321123456', 11, '2021-03-23 00:28:43', '2021-03-23 00:28:43'),
(3, 'user3', 2023, 1, 654, '0987654321098765', 12, '2021-03-23 00:32:01', '2021-03-23 00:32:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `recipe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Volcado de datos para la tabla `food`
--

INSERT INTO `food` (`id`, `name`, `description`, `availability`, `recipe`, `price`, `ingredients`, `created_at`, `updated_at`) VALUES
(1, 'Cheese Dog', 'A cheese dog is a hot dog served with cheese or processed cheese on it or stuffed within it, as a filling', 1, 'Place a bun buttered-side down in skillet and top with 1/2 cup of cheddar cheese, a hot dog, a little more cheddar cheese, and 1/4 of green onions. Cover and cook over medium heat until cheese melts, then use a spatula to close the bun. Repeat with remaining ingredients to make 4 cheese dogs tota', 22.43, '[2,6,10]', '2021-03-23 00:01:51', '2021-03-23 00:09:02'),
(2, 'Veggie Sandwich', 'Taking the meat out of these vegetarian sandwiches leaves room for a whole lot of sensational fillings and toppings. These sandwiches are bursting with flavor and are a hearty and satisfying addition to any meatless meal. With flavor this good, you won\'t miss the meat!', 0, 'This umami-rich burger is unabashedly attempting to imitate a beef burger in flavor, texture, and appearance. Mushrooms and grains form the bulk of the burger--the mushrooms are tender, and the grains stay firm to give the impression of protein which has been cooked. The fat helps coat the separate elements so that it holds together nicely and isn\'t piecey like most veggie burgers. The patty absorbs lots of grill flavor to deliver a charred, smokey patty just like a traditional beefy backyard burger.', 12.44, '[4,7,9]', '2021-03-23 00:01:51', '2021-03-23 00:10:43'),
(3, 'Cheeseburger', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. Cheeseburgers can include variations in structure, ingredients and composition.', 1, 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. Cheeseburgers can include variations in structure, ingredients and composition.', 23.64, '[4,6,8]', '2021-03-23 00:01:51', '2021-03-23 00:12:35'),
(4, 'Bacon Cheeseburger', 'If you’re worried about your burgers cooking up into a ball, all you have to do is make a small indentation in the center of the raw patty with your fingertip. This ensures that the burgers grill up flat. Also, form the burgers a bit wider than you need them to be, to accommodate for any shrinkage.', 1, 'Ingredients. 6 tablespoons mayonnaise. 1 tablespoon ketchup. 1 tablespoon spicy brown mustard or dijon mustard. 2 tablespoons sweet pickle relish. Salt and freshly ground black pepper. 12 slices thick-cut bacon cooked,', 14.21, '[4,5,7]', '2021-03-23 00:01:51', '2021-03-23 00:14:32'),
(6, 'Little Bacon Cheeseburger', 'Like many people, when bacon enters the picture, I usually go big or go home. This bacon cheeseburger is no different, because I pile bacon onto the patty, sneak it into the sauce, and even toast the bun with it. In this recipe, I go big and go home, because the absolute best bacon cheeseburger I\'ve ever tasted is always the one I make myself.', 1, 'Form ground beef into 4 patties, about 6 ounces each, slightly wider than the buns. Press the center of each patty to make a slight indentation with your fingertips. Season liberally with salt and pepper on all sides. Set aside.\r\nBrush hamburger rolls on inside surfaces with rendered bacon fat and set aside.\r\nHeat 12-inch skillet over high heat. Add remaining rendered bacon fat to skillet. Add burger patties and cook, turning occasionally, until crusted. The center of each burger should register at least 120 degrees on an instant-read thermometer. \r\nTop with cheese and continue cooking until cheese is melted and burgers register 135 degrees for medium or 145 degrees for medium well. Transfer to a large plate.\r\nWipe out skillet and heat over medium-high heat. Add burger buns and toast until golden, about 3 to 5 minutes.\r\nSpread burger sauce on both sides of burger buns. Place patties on each bottom bun. Top with bacon, lettuce, tomato, and bun tops.', 40.64, '[1,2,7,8,9]', '2021-03-23 00:01:51', '2021-03-23 00:17:25'),
(8, 'Grilled Cheese', 'Bread, butter and Cheddar cheese - here\'s a way to make this classic sandwich in a nonstick pan.', 0, 'Preheat skillet over medium heat. Generously butter one side of a slice of bread. Place bread butter-side-down onto skillet bottom and add 1 slice of cheese. Butter a second slice of bread on one side and place butter-side-up on top of sandwich. Grill until lightly browned and flip over; continue grilling until cheese is melted. Repeat with remaining 2 slices of bread, butter and slice of cheese.', 10.21, '[1,3,5,7,8,9]', '2021-03-23 00:01:51', '2021-03-23 00:18:40'),
(10, 'Bacon Cheese Dog', 'Hot dogs stuffed with cheese and wrapped with bacon. A simple, fun idea to dress up a hot dog with the flavors of a bacon cheeseburger. These Bacon Wrapped Cheese Hot Dogs are sure to be a hit this summer, or any time of year.', 0, 'I was having a craving for hot dogs and I started trying to think of delicious ways to dress up a hot dog for a fun weeknight dinner with my boys. A bacon cheeseburger came to mind and I thought why not incorporate those flavors into a hot dog.\r\n\r\nWe were out of propane for the BBQ, the day I first made these, so I baked the hot dogs in the oven, but since I posted the recipe, I’ve also made these on the grill and the smoker too. Any way you cook them, everyone loves them.', 44.45, '[1,2,3,4,5,6,8,9,10]', '2021-03-23 00:01:51', '2021-03-23 00:19:36'),
(11, 'Roast beef', 'Recipes with beef accompanied by various ingredients', 1, 'Cook the meat and then make the potatoes', 20.50, '[5,14]', '2021-03-23 00:54:40', '2021-03-23 00:54:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `price` int NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `amount`, `price`, `availability`) VALUES
(1, 'Yam', 98, 83, 0),
(2, 'Chili', 38, 13, 0),
(3, 'Avocado', 89, 34, 0),
(4, 'Rosemary', 30, 73, 0),
(5, 'Potato', 45, 32, 0),
(6, 'Pumpkin', 18, 16, 0),
(7, 'Parsley', 70, 68, 0),
(8, 'Celery', 93, 34, 0),
(9, 'Tomato', 20, 82, 0),
(10, 'Spinach', 59, 87, 0),
(11, 'Cherry Tomato', 50, 2, 0),
(12, 'Apple', 100, 5, 0),
(13, 'Pork', 50, 7, 0),
(14, 'Beef', 1000, 12, 0),
(15, 'Pineapple', 200, 2, 0),
(16, 'Mushroom', 2000, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(73, '2014_10_12_100000_create_password_resets_table', 1),
(74, '2019_08_19_000000_create_failed_jobs_table', 1),
(75, '2021_02_20_000000_create_food_table', 1),
(76, '2021_03_10_172455_create_ingredients_table', 1),
(77, '2021_03_12_000000_create_users_table', 1),
(78, '2021_03_12_000001_create_credit_card_table', 1),
(79, '2021_03_12_000001_create_order_table', 1),
(80, '2021_03_12_000001_create_ordered_food_table', 1),
(81, '2021_03_13_214626_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordered_food`
--

DROP TABLE IF EXISTS `ordered_food`;
CREATE TABLE IF NOT EXISTS `ordered_food` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` int NOT NULL,
  `subTotal` double(8,2) NOT NULL,
  `onlyIngredients` tinyint(1) NOT NULL,
  `foodName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordered_food_food_id_foreign` (`food_id`),
  KEY `ordered_food_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ordered_food`
--

INSERT INTO `ordered_food` (`id`, `amount`, `subTotal`, `onlyIngredients`, `foodName`, `food_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 22.43, 1, 'Cheese Dog', 1, 1, '2021-03-23 00:26:20', '2021-03-23 00:26:20'),
(2, 3, 37.32, 0, 'Veggie Sandwich', 2, 2, '2021-03-23 00:26:35', '2021-03-23 00:26:35'),
(3, 3, 70.92, 0, 'Cheeseburger', 3, 2, '2021-03-23 00:26:35', '2021-03-23 00:26:35'),
(4, 2, 20.42, 0, 'Grilled Cheese', 8, 3, '2021-03-23 00:26:54', '2021-03-23 00:26:54'),
(5, 4, 177.80, 0, 'Bacon Cheese Dog', 10, 3, '2021-03-23 00:26:54', '2021-03-23 00:26:54'),
(6, 4, 94.56, 0, 'Cheeseburger', 3, 4, '2021-03-23 00:27:08', '2021-03-23 00:27:08'),
(7, 5, 71.05, 1, 'Bacon Cheeseburger', 4, 5, '2021-03-23 00:27:24', '2021-03-23 00:27:24'),
(8, 2, 28.42, 0, 'Bacon Cheeseburger', 4, 6, '2021-03-23 00:27:40', '2021-03-23 00:27:40'),
(9, 4, 89.72, 0, 'Cheese Dog', 1, 7, '2021-03-23 00:30:45', '2021-03-23 00:30:45'),
(10, 4, 162.56, 0, 'Little Bacon Cheeseburger', 6, 7, '2021-03-23 00:30:45', '2021-03-23 00:30:45'),
(11, 1, 23.64, 1, 'Cheeseburger', 3, 7, '2021-03-23 00:30:45', '2021-03-23 00:30:45'),
(12, 3, 42.63, 0, 'Bacon Cheeseburger', 4, 8, '2021-03-23 00:31:09', '2021-03-23 00:31:09'),
(13, 3, 42.63, 1, 'Bacon Cheeseburger', 4, 8, '2021-03-23 00:31:09', '2021-03-23 00:31:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `total` double(8,2) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 22.43, 11, '2021-03-23 00:26:20', '2021-03-23 00:26:20'),
(2, 182.88, 11, '2021-03-23 00:26:35', '2021-03-23 00:26:35'),
(3, 259.48, 11, '2021-03-23 00:26:54', '2021-03-23 00:26:54'),
(4, 94.56, 11, '2021-03-23 00:27:08', '2021-03-23 00:27:08'),
(5, 71.05, 11, '2021-03-23 00:27:24', '2021-03-23 00:27:24'),
(6, 28.42, 11, '2021-03-23 00:27:40', '2021-03-23 00:27:40'),
(7, 545.08, 13, '2021-03-23 00:30:45', '2021-03-23 00:30:45'),
(8, 170.52, 13, '2021-03-23 00:31:09', '2021-03-23 00:31:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `food_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_food_id_foreign` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comments`, `status`, `user_id`, `food_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'Very good', 1, 11, 1, '2021-03-23 00:22:12', '2021-03-23 00:22:53'),
(2, 2, 'I didn\'t like', 1, 11, 1, '2021-03-23 00:22:27', '2021-03-23 00:23:03'),
(3, 4, 'It\'s ok', 1, 11, 1, '2021-03-23 00:22:36', '2021-03-23 00:23:11'),
(4, 5, 'Great food', 1, 11, 2, '2021-03-23 00:25:03', '2021-03-23 00:25:44'),
(5, 3, 'Good food', 1, 11, 2, '2021-03-23 00:25:14', '2021-03-23 00:25:51'),
(6, 5, 'I loved this food', 1, 11, 2, '2021-03-23 00:25:25', '2021-03-23 00:25:59'),
(7, 4, 'I liked it', 0, 12, 6, '2021-03-23 00:29:46', '2021-03-23 00:29:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Morgan Oberbrunner', 'schiller.opal@example.net', '9516 Bins Pine\nJenniferchester, NY 78561-2842', 'aUWMRHGnTf', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BwCcGkHz4w', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(2, 'Zelda Berge', 'pcorwin@example.net', '5434 Pfannerstill Plaza\nSheachester, AK 76793-5828', 'WycAq3sC8X', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rffjFvcWbkDPvYczbsHDo20uyrW9gKX61JeCeH6e4b08zlmnLDnaafouuzvv', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(3, 'Prof. Kennedy Nolan I', 'elvis51@example.org', '672 Adrian Ramp Apt. 368\nNorth Jerad, KS 72799-0437', 'tAkgXQEeff', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LYW3Ua9TuP', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(4, 'Alivia Johns', 'reva.bergstrom@example.com', '387 Graham Fall Suite 000\nSouth Heatherbury, NM 04588-2765', 'ujI2Y5ehVu', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vKgSrwfIOd', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(5, 'Virginia Dare', 'reyes.russel@example.org', '2046 Deckow Throughway\nPort Nicolette, AR 37559', 'iaWbIVpKNB', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8WLz6Z40KK', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(6, 'Mr. Nils Sipes III', 'williamson.ole@example.net', '58104 Paucek Trail\nEast Sedrickhaven, IN 70405-6626', 'mAhoetVmk9', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pKxQdyfm9y', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(7, 'Mr. Brice Runolfsson IV', 'garnet92@example.net', '17271 Meagan Mountain\nLeschland, KY 67986-1340', 'XjKxgwz2Dx', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PQzpQVIk9i', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(8, 'Prof. Rafael Emard Sr.', 'gparker@example.org', '7431 Florida Corners\nSouth Kareembury, AL 81684', 'nPFznju1nS', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ds56lz8AZA', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(9, 'Alexandra Pagac', 'meaghan.trantow@example.net', '5832 Mario Green Suite 991\nWestfort, CA 53709', 'Nqz8os5ss1', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nIHDiKi87Y', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(10, 'Alvah Flatley', 'amie10@example.com', '86335 Halvorson Unions Apt. 424\nWillmsfurt, AL 58555', 'sGfs6gp5Jk', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mZcQuC78Eb', '2021-03-23 00:01:52', '2021-03-23 00:01:52'),
(11, 'user1', 'user1@gmail.com', 'cll1', 'Administrador', NULL, '$2y$10$sLC4zU38iWuxnBGiDOdBRe82es47spxZccyrLkPfaLt/TqJ.Re5JK', NULL, '2021-03-23 00:05:31', '2021-03-23 00:05:31'),
(12, 'user2', 'user2@gmail.com', 'cll2', 'Usuario', NULL, '$2y$10$WriBln7WWN.t/y0m7O5.yezIYnpQt.bzx3FYlIFJjvdmthPe.sUE2', NULL, '2021-03-23 00:29:20', '2021-03-23 00:29:20'),
(13, 'user3', 'user3@gmail.com', 'cll3', 'Usuario', NULL, '$2y$10$uawmbTQKdADTj8JyDaLRiOPWIlapUh9v/luWf6OueXU8IeeuAYkjS', NULL, '2021-03-23 00:30:19', '2021-03-23 00:30:19'),
(14, 'nico rai', 'Nicolas@raigosa.co', 'Calle 74 Sur #46b 70', 'Administrador', NULL, '$2y$10$vbh9FojXG0ll3d5GnNGm.OuNA64pZrr1QcfZDp9ds/RYxgjB7.8qm', NULL, '2021-03-23 00:45:04', '2021-03-23 00:45:04');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD CONSTRAINT `credit_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `ordered_food`
--
ALTER TABLE `ordered_food`
  ADD CONSTRAINT `ordered_food_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `ordered_food_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
