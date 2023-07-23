-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Tem 2023, 20:51:23
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `patika.dev_tweet_app`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(180) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `content`, `created_at`) VALUES
(7, 1, 'first tweet!', '2023-07-22 22:07:14'),
(8, 4, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae veritatis ducimus atque dolore ex voluptates itaque commodi earum amet nemo unde autem possimus mollitia repellat.', '2023-07-22 23:22:36'),
(9, 5, 'And soon we shall bid adieu to the twitter brand and, gradually, all the birds', '2023-07-23 11:37:53'),
(10, 6, 'If you\'re cremated after you die, you can be put into an hourglass and continue to participate in family game night.', '2023-07-23 16:05:49'),
(11, 7, 'Why, anxiety? I\'m just sitting here.', '2023-07-23 16:08:47'),
(12, 8, 'waiter, there\'s a reflection of a sad and lonely man in my soup', '2023-07-23 16:10:34'),
(13, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing.', '2023-07-23 17:42:11'),
(14, 10, 'just setting up my twttr', '2023-07-23 18:48:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `profile_picture_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profile_picture_url`, `created_at`, `updated_at`) VALUES
(1, 'firstuser', '$2y$10$aJhwB0BuoIPNpV0kOh.ZzO3e1onKxD4mZClVUcYl3fD7QdAT2EKhC', '', '2023-07-20 23:01:48', '2023-07-20 23:01:48'),
(2, 'test', '$2y$10$lIlUHqUJPtxMoIYsR2UQaOxnmLNkbeIPxjEsNgJBDpI7Xo9hJm7wS', '', '2023-07-21 20:21:48', '2023-07-21 20:21:48'),
(4, 'john_doe', '$2y$10$PWJ3FUaTgfajJ9.i2bECjeO/wlcGvRK67K7j0Zh4Gwpgyfx6IAh9C', '', '2023-07-22 23:22:09', '2023-07-22 23:22:09'),
(5, 'JacksonPot', '$2y$10$kngGp/NpaHt9aQxoqoDbNeb8gzbYLdyxCEPoGlSw.J3cLaFcWHK.K', '', '2023-07-23 11:33:13', '2023-07-23 11:33:13'),
(6, 'ChaplainMondover', '$2y$10$.kUi8Ik3AVagKnHluA1DteE4ag2g88ZL5jU/v96/fb7z3r/vgu.qm', '', '2023-07-23 16:05:36', '2023-07-23 16:05:36'),
(7, 'HilaryOuse', '$2y$10$sHRUtoWwR91YkCzO.a78Bu6AhyIyqGO6ccOkJ.sIo4a/YSYGUZa4m', '', '2023-07-23 16:08:42', '2023-07-23 16:08:42'),
(8, 'HansonDeck', '$2y$10$elTqyHJEU.cdh2Pl4yvfuu5cpTu68./FUfeczjnbk1eEprFoD00z.', '', '2023-07-23 16:10:28', '2023-07-23 16:10:28'),
(9, 'WillBarrow', '$2y$10$ZSWAC.rO6tUdQFvxXozwLexjiWxy367kOSqzLihopKmDKDyOdQx7.', '', '2023-07-23 17:41:56', '2023-07-23 17:41:56'),
(10, 'jack', '$2y$10$R0sp5VLbAxpNk1p3/ZVZUeJM9Q9TX73dRH0Aq0NuoubWaOITrZzHy', '', '2023-07-23 18:48:25', '2023-07-23 18:48:25');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
