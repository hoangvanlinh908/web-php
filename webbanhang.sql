-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2020 lúc 09:09 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` int(11) DEFAULT 1,
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'hoang van linh', 'xom3', 'van@gmail.com', '1', '1', 1, 2, NULL, NULL, NULL),
(2, 'hoang', 'xom', 'van', '81dc9bdb52d04dc20036dbd8313ed055', '123', 1, 1, NULL, NULL, NULL),
(5, 'linh', '1', 'van@gmail.com', '1', '1', 1, 1, NULL, NULL, NULL),
(6, 'linh', '1', 'van@gmail.com', '1', '1', 1, 1, NULL, NULL, NULL),
(7, 'nhan', '1', 'nhan@gmail.com', '1', '1', 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(81, 'QUAN', 'quan', NULL, NULL, 1, 1, '2020-11-11 07:11:12', '2020-11-11 07:11:12'),
(82, 'AO', 'ao', NULL, NULL, 1, 1, '2020-11-11 07:11:21', '2020-11-11 07:11:21'),
(83, 'TUI', 'tui', NULL, NULL, 1, 1, '2020-11-11 07:11:26', '2020-11-11 07:11:26'),
(84, 'GIAY', 'giay', NULL, NULL, 1, 1, '2020-11-11 07:11:34', '2020-11-11 07:11:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT 0,
  `price` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 2, 10000000, NULL, NULL),
(2, 1, 11, 1, 2651616, NULL, NULL),
(3, 1, 14, 1, 1232131, NULL, NULL),
(4, 1, 12, 1, 1000000, NULL, NULL),
(5, 2, 10, 1, 10000000, NULL, NULL),
(6, 3, 10, 1, 10000000, NULL, NULL),
(7, 4, 12, 1, 1000000, NULL, NULL),
(8, 4, 10, 1, 10000000, NULL, NULL),
(9, 5, 13, 1, 1, NULL, NULL),
(10, 6, 10, 1, 10000000, NULL, NULL),
(11, 7, 10, 1, 10000000, NULL, NULL),
(12, 8, 10, 1, 10000000, NULL, NULL),
(13, 8, 11, 1, 2651616, NULL, NULL),
(14, 9, 10, 2, 10000000, NULL, NULL),
(15, 9, 11, 1, 2651616, NULL, NULL),
(16, 10, 10, 1, 10000000, NULL, NULL),
(17, 11, 10, 1, 10000000, NULL, NULL),
(18, 12, 10, 1, 10000000, NULL, NULL),
(19, 12, 11, 1, 2651616, NULL, NULL),
(20, 12, 16, 1, 23333, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT 0,
  `sale` tinyint(4) DEFAULT 0,
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `head` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `created_ad` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `number`, `sale`, `thunbar`, `category_id`, `content`, `head`, `view`, `hot`, `pay`, `created_ad`, `updated_at`) VALUES
(10, 'QUẦN 1', 'quan-1', 10000000, 4, 0, 'q1.PNG', 81, 'a', 0, 0, 0, 3, NULL, '2020-12-07 13:17:33'),
(11, 'QUẦN 2', 'quan-2', 2651616, 1, 0, 'q2.PNG', 81, 's', 0, 0, 0, 0, NULL, '2020-11-28 16:16:20'),
(12, 'ÁO 1', 'ao-1', 1000000, 1, 0, 'A1.PNG', 82, 's', 0, 0, 0, 0, NULL, '2020-11-28 16:18:25'),
(13, 'ÁO 2', 'ao-2', 1, 2, 0, 'A2.PNG', 82, 's', 0, 0, 0, 0, NULL, '2020-11-28 16:18:44'),
(14, 'QUẦN 3', 'quan-3', 1232131, 11, 0, 'q3.PNG', 81, 's', 0, 0, 0, 0, NULL, '2020-11-28 16:16:41'),
(15, 'QUẦN 4 ', 'quan-4', 213, 12, 0, 'q4.PNG', 81, '1', 0, 0, 0, 0, NULL, '2020-11-28 16:16:58'),
(16, 'AO 3', 'ao-3', 23333, 12, 0, 'a3.PNG', 82, 'S', 0, 0, 0, 0, NULL, NULL),
(17, 'ÁO 4', 'ao-4', 123213, 22, 0, 'a4.PNG', 82, 'S', 0, 0, 0, 0, NULL, NULL),
(18, 'TÚI 1', 'tui-1', 213, 123, 0, 't1.PNG', 83, '123', 0, 0, 0, 0, NULL, NULL),
(19, 'GIÀY 1', 'giay-1', 123, 123, 0, 'g2.PNG', 84, '132', 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT 0,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 27372122, 20, 1, 'aaaaa', NULL, '2020-11-16 17:43:57'),
(2, 11000000, 20, 1, '', NULL, '2020-11-16 17:52:10'),
(3, 11000000, 20, 1, '', NULL, '2020-11-16 17:16:54'),
(4, 12100000, 20, 1, 'giao hang tận giường', NULL, '2020-11-16 17:16:51'),
(5, 1, 20, 1, '', NULL, '2020-11-16 17:16:44'),
(6, 11000000, 20, 0, 'a', NULL, NULL),
(7, 11000000, 20, 0, '', NULL, NULL),
(8, 13916778, 20, 0, '', NULL, NULL),
(9, 24916778, 20, 0, 'NHAN ', NULL, NULL),
(10, 11000000, 20, 1, 'ABC', NULL, '2020-11-29 16:21:35'),
(11, 11000000, 20, 1, 'text', NULL, '2020-12-07 13:17:33'),
(12, 13942444, 20, 0, 'xexxxx', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `tonken` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `tonken`, `created_at`, `updated_at`) VALUES
(11, 'linh', 'linh@gmail.com', '123', '1234', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL),
(12, 'linh', 'linh@gmail.com', '123', '1234', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL),
(14, 'huyen1', 'huyen@gmail.com', '123', '123', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, 1, NULL, NULL, NULL),
(20, 'linh', 'linh1@gmail.com', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
