-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2021 lúc 01:41 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydonhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `idOrder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` float NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `idOrder`, `pic`, `name`, `type`, `receipt`, `status`) VALUES
(1, 'TT14444', 'https://f12.photo.talk.zdn.vn/1149577597646075379/35025ed9ddec16b24ffd.jpg', 'Áo Hoodie đen ', 'Thời trang', 600000, 'Hoàn thành'),
(2, 'MP22399', 'https://f8.photo.talk.zdn.vn/7990626042301250186/f1f7908a11bfdae183ae.jpg', 'Kem Chống Nắng La Roche la la', 'Mỹ phẩm', 199000, 'Hoàn thành'),
(4, 'TT14444', 'https://f4.photo.talk.zdn.vn/4007933317297269012/c9d670a1f1943aca6385.jpg', 'Đèn bàn bảo vệ thị lực Rạng Đông', 'Gia dụng', 710000, 'Đang giao'),
(5, 'DT09234', 'https://f4.photo.talk.zdn.vn/902798532016277104/64463e35bf00745e2d11.jpg', 'Máy ảnh Fujifilm X-A7', 'Điện tử', 12000000, 'Đang giao'),
(6, 'TT14489', 'https://f22-zpc.zdn.vn/682347951849946322/bd1f096e885b43051a4a.jpg', 'Mũ Lưỡi Trai LINJW Vải Cotton', 'Thời trang', 60000, 'Đã bị hủy'),
(8, 'GD09240', 'https://f9.photo.talk.zdn.vn/7788508936912167932/31067a74fb41301f6950.jpg', 'Ghế nhựa chân gỗ  EAMES', 'Gia dụng', 29000, 'Đang giao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'nguyen thi mai', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
