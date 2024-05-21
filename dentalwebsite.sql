-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Kas 2021, 10:59:31
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dentalwebsite`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `cookie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `cookie`) VALUES
(1, 'admin2', '123456', 'I2lJQP9igkNGwdstgYWQ746nt9xwNLfp'),
(2, 'admin', '123456', 'RiTPHL6Cghii4aLTPc2sH3QKtdig3R15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `clinicphoto`
--

CREATE TABLE `clinicphoto` (
  `id` int(11) NOT NULL,
  `filename` varchar(140) NOT NULL,
  `path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `clinicphoto`
--

INSERT INTO `clinicphoto` (`id`, `filename`, `path`) VALUES
(20, '01.jpg', '../../../assets/img/klinik/01.jpg'),
(21, '02.jpg', '../../../assets/img/klinik/02.jpg'),
(22, '03.jpg', '../../../assets/img/klinik/03.jpg'),
(23, '04.jpg', '../../../assets/img/klinik/04.jpg'),
(24, '05.jpg', '../../../assets/img/klinik/05.jpg'),
(25, '06.jpg', '../../../assets/img/klinik/06.jpg'),
(26, '07.jpg', '../../../assets/img/klinik/07.jpg'),
(27, '08.jpg', '../../../assets/img/klinik/08.jpg'),
(28, '10.jpg', '../../../assets/img/klinik/10.jpg'),
(29, '11.jpg', '../../../assets/img/klinik/11.jpg'),
(30, '12.jpg', '../../../assets/img/klinik/12.jpg'),
(31, '13.jpg', '../../../assets/img/klinik/13.jpg'),
(32, '14.jpg', '../../../assets/img/klinik/14.jpg'),
(33, '15.jpg', '../../../assets/img/klinik/15.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` varchar(900) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `date`) VALUES
(398, 'Test', 'testmail@gmail.com', 'Test number', 'Test Message', '2021-11-06 09:46:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contactinfo`
--

CREATE TABLE `contactinfo` (
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `homepagedescription` varchar(800) NOT NULL,
  `address` varchar(300) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `youtube` varchar(150) NOT NULL,
  `aboutdescription` varchar(800) NOT NULL,
  `logopath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contactinfo`
--

INSERT INTO `contactinfo` (`email`, `phonenumber`, `homepagedescription`, `address`, `facebook`, `instagram`, `twitter`, `youtube`, `aboutdescription`, `logopath`) VALUES
('youremail@gmail.com', '555444333', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin cursus accumsan. Nullam sit amet ligula vitae eros fermentum venenatis. Cras eget tempor velit. Aenean luctus, odio at luctus facilisis, mi dolor sodales lectus, eget feugiat leo tellus ac lectus. Nulla vitae nulla tortor. Vivamus nunc quam, semper vel malesuada vel, convallis a libero. Nullam bibendum venenatis scelerisque. (Your Homepage Description)', 'Your work address', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.twitter.com', 'https://www.youtube.com', 'About Page Description.', '../../../assets/img/logo.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `name`, `path`) VALUES
(1, 'image1', '../../../assets/img/spot/01.jpg'),
(2, 'image2', '../../../assets/img/spot/02.jpg'),
(3, 'image3', '../../../assets/img/spot/03.jpg'),
(4, 'image4', '../../../assets/img/spot/04.jpg'),
(5, 'image5', '../../../assets/img/spot/05.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staffinfo`
--

CREATE TABLE `staffinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `description` varchar(900) NOT NULL,
  `photopath` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `staffinfo`
--

INSERT INTO `staffinfo` (`id`, `name`, `description`, `photopath`) VALUES
(1, 'William Dorfman', 'Lorem ipsum dolor sit amet(Your Description)', '../../assets/img/dis-hekimlerimiz/dentist1.jpg'),
(2, 'Doc Holliday', 'Lorem ipsum dolor sit amet(Your Description)', '../../assets/img/dis-hekimlerimiz/dentist2.jpg'),
(5, 'Lucy Hobbs Taylor', 'Lorem ipsum dolor sit amet(Your Description)', '../../assets/img/dis-hekimlerimiz/dentist3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `treatments`
--

CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `photopath` varchar(90) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `photopath`, `description`) VALUES
(1, 'Implant Treatment', '../../assets/img/hizmetlerimiz/02.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(2, 'Oral, Dental And Maxillofacial Surgery', '../../assets/img/hizmetlerimiz/09.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(3, 'Advanced Maxillofacial Surgery', '../../assets/img/hizmetlerimiz/07.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(4, 'Cosmetic Dentistry', '../../assets/img/hizmetlerimiz/19.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(5, 'Zirconium Veneers & Leaf Porcelain (Laminate)', '../../assets/img/hizmetlerimiz/01.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(6, 'Prosthetic Dental Treatments', '../../assets/img/hizmetlerimiz/08.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(7, 'Root Canal Treatments Endodontics', '../../assets/img/hizmetlerimiz/10.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(8, 'Teeth Whitening', '../../assets/img/hizmetlerimiz/06.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(9, 'Temporomandibular Joınt (Tmj) Treatment', '../../assets/img/hizmetlerimiz/15.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(10, 'Bruxism', '../../assets/img/hizmetlerimiz/16.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(11, 'Laser Applications', '../../assets/img/hizmetlerimiz/12.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(12, 'Maxillofacial Prosthesis', '../../assets/img/hizmetlerimiz/18.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(13, 'Orthodontics', '../../assets/img/hizmetlerimiz/05.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(14, 'Orthognathic Surgery', '../../assets/img/hizmetlerimiz/17.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(15, 'Paediatric Dentistry (Pedodontics)', '../../assets/img/hizmetlerimiz/03.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(16, 'Oral And Maxillofacial Radiology', '../../assets/img/hizmetlerimiz/11.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(17, 'Dental Tomography', '../../assets/img/hizmetlerimiz/13.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)'),
(18, 'Gum Diseases (Periodontology)', '../../assets/img/hizmetlerimiz/04.jpg', 'Lorem ipsum dolor sit amet (Treatment Description)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `visitor`
--

CREATE TABLE `visitor` (
  `ip` varchar(15) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `day` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `visitor`
--

INSERT INTO `visitor` (`ip`, `year`, `month`, `day`) VALUES
('127.0.0.1', '2021', '11', '06'),
('192.168.1.31', '2021', '11', '06');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`,`username`);

--
-- Tablo için indeksler `clinicphoto`
--
ALTER TABLE `clinicphoto`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `clinicphoto`
--
ALTER TABLE `clinicphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `staffinfo`
--
ALTER TABLE `staffinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
