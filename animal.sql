-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-03-24 18:44:09
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `animal`
--

-- --------------------------------------------------------

--
-- 資料表結構 `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `animals`
--

INSERT INTO `animals` (`id`, `title`, `tel`, `fax`, `email`, `address`) VALUES
(1, 'ＯＯＯ貓狗寵物水族館', '07-7654321', '07-1234567', 'xiaomawei520@gmail.com', '高雄市前鎮區一心一路101項102弄103號104樓之105');

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` tinytext NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_31_090517_create_animals_table', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_time` date DEFAULT NULL,
  `news_content` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`news_id`, `type_id`, `news_title`, `news_time`, `news_content`, `deleted_at`) VALUES
(1, NULL, '會員日折扣', '2022-03-23', '3/1~3/31，寵物飼料85折、零食滿500現折30', NULL),
(2, NULL, '年末促銷', '2022-03-22', '水族用品69折、寵物飼料85折', NULL),
(3, NULL, '春節休假日', '2022-03-16', '農曆初一~初五店休農曆初一~初五店休農曆初一~初五店休', NULL),
(4, NULL, '水族特賣限時三天', '2022-03-02', '高級孔雀魚6尾$99、極火蝦10尾$39', NULL),
(5, NULL, '全館買一送一', '2022-03-15', '1/15~1/31魚、蝦飼料買一送一', NULL),
(6, NULL, '春節第三波特價', '2022-03-09', '貓、狗用品滿千折百', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
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
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL COMMENT '分類',
  `product_title` varchar(255) DEFAULT NULL COMMENT '名稱',
  `product_intro` tinytext DEFAULT NULL COMMENT '簡述(口味)',
  `product_ingredients` tinytext DEFAULT NULL COMMENT '成分',
  `product_weight` int(11) DEFAULT NULL COMMENT '重量',
  `product_content` text DEFAULT NULL COMMENT '說明',
  `product_price` int(11) DEFAULT NULL COMMENT '商品售價',
  `discount_price` int(11) DEFAULT NULL COMMENT '特價商品價格',
  `on_sale` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '特價品開關',
  `product_image` tinytext DEFAULT NULL COMMENT '圖片',
  `hits` int(11) NOT NULL DEFAULT 0 COMMENT '點擊次數',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `type_id`, `product_title`, `product_intro`, `product_ingredients`, `product_weight`, `product_content`, `product_price`, `discount_price`, `on_sale`, `product_image`, `hits`, `deleted_at`) VALUES
(1, 1, '低脂成犬乾糧', '雞肉口味', '雞肉、果膠、維他命E、鈣粉、卵磷脂2', 680, '適用於大型成犬', 1580, 1299, 'Y', 'upload/product/MMoUVJTlWC2juJDgkedHQnhIjnwgRFOU5Ud3ODeo.jpg', 6, NULL),
(2, 1, '高肉量無穀飼料', '牛肉口味', '牛肉、果膠、維他命E、鈣粉、卵磷脂', 1200, '高含量肉類蛋白、無穀無麩質食材 遠離過敏源', 2500, NULL, 'N', NULL, 1, NULL),
(3, 2, '草本無穀火雞肉', '雞肉口味', '亞麻籽、薑黃素、蔓越莓、芹菜種子', 540, '不含穀類與兼具低升醣平衡的天然食材調配', 1288, 1099, 'Y', NULL, 0, NULL),
(4, 3, '錦鯉魚飼料', '牛肉口味', '牛肉、果膠、維他命E、鈣粉、卵磷脂', 300, '紅色大顆粒、增彩配方、浮水性', 285, NULL, 'N', NULL, 0, NULL),
(5, 2, '幼貓無穀雞肉飼料', '雞肉口味', '雞肉、益生菌', 2000, '適用於2歲內幼貓', 2880, NULL, 'N', NULL, 0, NULL),
(6, 4, '水晶蝦飼料', '牛肉口味', '蝦全麥、小麥蛋白、棕櫚油', 50, '動物性葷食配方，超過天然浮游生物的營養價值', 160, NULL, 'N', NULL, 0, NULL),
(7, 1, '測試標題', '牛肉口味', '測試成分', 100, '測試說明', 200, 100, 'Y', 'upload/product/g5sXG0hqMvtkNkRaQf85YOOflqM6cNpzi0zYud1d.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `producttypes`
--

CREATE TABLE `producttypes` (
  `type_id` int(11) NOT NULL,
  `type_name` tinytext NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `producttypes`
--

INSERT INTO `producttypes` (`type_id`, `type_name`, `deleted_at`) VALUES
(1, '狗飼料', NULL),
(2, '貓飼料', NULL),
(3, '魚飼料', NULL),
(4, '蝦飼料', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 資料表索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `producttypes`
--
ALTER TABLE `producttypes`
  ADD PRIMARY KEY (`type_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
