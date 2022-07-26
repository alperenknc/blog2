-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Tem 2022, 07:13:53
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begeniler`
--

CREATE TABLE `begeniler` (
  `id` int(11) NOT NULL,
  `konu_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `durum` int(2) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `begeniler`
--

INSERT INTO `begeniler` (`id`, `konu_id`, `user_id`, `user_ip`, `durum`, `created_at`, `updated_at`) VALUES
(385, 3, 1, '127.0.0.1', 1, '2022-07-24 08:47:27', '2022-07-24 08:47:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etiketler`
--

CREATE TABLE `etiketler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `etiketler`
--

INSERT INTO `etiketler` (`id`, `baslik`, `created_at`, `updated_at`) VALUES
(1, 'Temiz', '2022-07-20 17:38:22', '2022-07-20 17:38:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

CREATE TABLE `konular` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `kategori` int(11) NOT NULL DEFAULT 0,
  `yazi` text DEFAULT NULL,
  `durum` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `konular`
--

INSERT INTO `konular` (`id`, `baslik`, `resim`, `kategori`, `yazi`, `durum`, `created_at`, `updated_at`) VALUES
(1, 'deneme konu baslik', 'https://picsum.photos/450/450', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galle', 1, '2022-07-19 20:15:16', '2022-07-13 19:32:25'),
(2, 'deneme konu 2 baslik', 'https://picsum.photos/450/450', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galle', 1, '2022-07-19 20:15:16', '2022-07-13 19:32:25'),
(3, 'deneme konu 2 baslik', 'https://picsum.photos/450/450', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galle', 1, '2022-07-19 20:15:16', '2022-07-13 19:32:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konu_kategori`
--

CREATE TABLE `konu_kategori` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `konu_kategori`
--

INSERT INTO `konu_kategori` (`id`, `baslik`, `created_at`, `updated_at`) VALUES
(1, 'Kategori', '2022-07-19 20:02:12', '2022-07-19 20:02:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) NOT NULL,
  `role` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_ip`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Alperen Kanca', '1', '$2a$12$X7abSyxXa2CYdeGQRNl1OedRb9bZkime8uK5F3k3SVUChgNRmfN3K', '127.0.0.1', 1, '2022-07-20 18:13:15', '2022-07-20 18:13:15'),
(2, 'Alperen Kanca 2', '2', '$2a$12$X7abSyxXa2CYdeGQRNl1OedRb9bZkime8uK5F3k3SVUChgNRmfN3K', '127.0.0.1', 0, '2022-07-20 18:13:15', '2022-07-20 18:13:15');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `begeniler`
--
ALTER TABLE `begeniler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `etiketler`
--
ALTER TABLE `etiketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `konular`
--
ALTER TABLE `konular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `konu_kategori`
--
ALTER TABLE `konu_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `begeniler`
--
ALTER TABLE `begeniler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- Tablo için AUTO_INCREMENT değeri `etiketler`
--
ALTER TABLE `etiketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `konular`
--
ALTER TABLE `konular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `konu_kategori`
--
ALTER TABLE `konu_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
