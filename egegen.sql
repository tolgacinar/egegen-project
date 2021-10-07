-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Eki 2021, 11:01:20
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `egegen`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contents`
--

CREATE TABLE `contents` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_text` text NOT NULL,
  `content_image` varchar(255) NOT NULL,
  `content_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contents`
--

INSERT INTO `contents` (`content_id`, `content_title`, `content_text`, `content_image`, `content_status`) VALUES
(1, 'İzmir Hakkında', '<p><b>İzmir hakkında</b> texti buraya gelecek</p>', 'uploads/contents/izmir-hakkinda.jpg', 1),
(3, 'qsdqsdqsdqsd', 'azazazaz', 'uploads/contents/okul-toren-bayraklari-8.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(50) NOT NULL,
  `menu_href` varchar(100) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_title`, `menu_href`, `menu_parent`, `menu_status`) VALUES
(1, 'Anasayfa', '/', 0, 1),
(2, 'Yazılar', 'yazilar', 0, 1),
(3, 'Yazı 1', 'yazilar/yazi-1', 2, 1),
(4, 'Yazı 2', 'yazilar/yazi-2', 2, 1),
(5, 'Gezilecek Yerler', 'gezilecek-yerler', 0, 1),
(6, 'Galeri', 'galeri', 0, 1),
(7, 'Galeri Alt 1', 'galeri/galeri-alt-1', 6, 1),
(8, 'Galeri Alt 2', 'galeri/galeri-alt-2', 6, 1),
(9, 'İletişim', 'iletisim', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_content`, `news_image`, `news_status`) VALUES
(1, 'Deneme Haber 1', 'Deneme Haber 1 Texti Buraya Gelecek', 'uploads/news/news-1.jpg', 1),
(2, 'Deneme Haber 2', 'Deneme Haber 2 Texti Buraya Gelecek', 'uploads/news/news-2.jpg', 1),
(3, 'Deneme Haber 3', 'Deneme Haber 3 Texti Buraya Gelecek', 'uploads/news/news-3.jpg', 1),
(4, 'Deneme Haber 4', 'Deneme Haber 4 Texti Buraya Gelecek', 'uploads/news/news-4.jpg', 1),
(5, 'Deneme Haber 5', 'Deneme Haber 5 Texti Buraya Gelecek', 'uploads/news/news-5.jpg', 1),
(6, 'Deneme Haber 6', 'Deneme Haber 6 Texti Buraya Gelecek', 'uploads/news/news-6.jpg', 1),
(7, 'Deneme Haber 7', 'Deneme Haber 7 Texti Buraya Gelecek', 'uploads/news/news-7.jpg', 1),
(8, 'Deneme Haber 8', 'Deneme Haber 8 Texti Buraya Gelecek', 'uploads/news/news-8.jpg', 1),
(9, 'Deneme Haber 9', 'Deneme Haber 9 Texti Buraya Gelecek', 'uploads/news/news-9.jpg', 1),
(10, 'Deneme Haber 10', 'Deneme Haber 10 Texti Buraya Gelecek', 'uploads/news/news-10.jpg', 1),
(14, 'test', 'test', 'uploads/news/ataturk-bayraklari-duvar.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seo_url`
--

CREATE TABLE `seo_url` (
  `s_id` int(11) NOT NULL,
  `s_type` varchar(255) NOT NULL,
  `s_target` int(11) NOT NULL,
  `s_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `seo_url`
--

INSERT INTO `seo_url` (`s_id`, `s_type`, `s_target`, `s_url`) VALUES
(1, 'content', 1, 'content/izmir-hakkinda'),
(2, 'news', 1, 'news/news-1'),
(3, 'news', 2, 'news/news-2'),
(4, 'news', 3, 'news/news-3'),
(5, 'news', 4, 'news/news-4'),
(6, 'news', 5, 'news/news-5'),
(7, 'news', 6, 'news/news-6'),
(8, 'news', 7, 'news/news-7'),
(9, 'news', 8, 'news/news-8'),
(10, 'news', 9, 'news/news-9'),
(11, 'news', 10, 'news/news-10'),
(12, 'news', 12, 'haber-testi'),
(15, 'content', 3, 'content/qsdqsdqsdqsd'),
(16, 'news', 14, 'news/test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `set_key` varchar(255) NOT NULL,
  `set_val` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `set_key`, `set_val`) VALUES
(1, 'menu', '[{\"text\":\"Anasayfa\",\"href\":\"http://localhost\",\"icon\":\"\",\"target\":\"_self\",\"title\":\"\"},{\"text\":\"Yazılar\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"children\":[{\"text\":\"Yazı 1\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\"},{\"text\":\"Yazı 2\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\"}]},{\"text\":\"Gezilecek Yerler\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\"},{\"text\":\"Galeri\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"children\":[{\"text\":\"Galeri 1\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\"},{\"text\":\"Galeri 2\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\"}]},{\"text\":\"İletişim\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\"}]');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_image` varchar(255) NOT NULL,
  `slide_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`, `slide_status`) VALUES
(1, 'Slide 1', 'uploads/slides/slide-1.jpg', 1),
(2, 'Slide 2', 'uploads/slides/slide-2.jpg', 1),
(3, 'Slide 3', 'uploads/slides/slide-3.jpg', 1),
(9, 'test', 'uploads/slides/ataturk-bayraklari-duvar-5.jpg', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Tablo için indeksler `seo_url`
--
ALTER TABLE `seo_url`
  ADD PRIMARY KEY (`s_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `seo_url`
--
ALTER TABLE `seo_url`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
