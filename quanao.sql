-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2024 lúc 02:01 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idchitiet` int(11) NOT NULL,
  `idhoadon` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `kichthuocsp` text NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idchitiet`, `idhoadon`, `idsp`, `kichthuocsp`, `soluong`, `thanhtien`) VALUES
(11, 11, 2, 'L', 2, 8000),
(12, 11, 16, 'S', 4, 8000),
(20, 19, 10, 'M', 1, 4600),
(23, 22, 53, 'M', 2, 8000),
(24, 22, 51, 'S', 2, 11800),
(27, 29, 19, 'S', 1, 6500),
(28, 29, 31, 'S', 1, 4156),
(29, 30, 3, 'L', 1, 3000),
(30, 30, 6, 'M', 1, 8700);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` int(11) NOT NULL,
  `idnguoidung` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `tonggia` int(11) NOT NULL,
  `ngaylap` datetime NOT NULL,
  `pttt` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`idhoadon`, `idnguoidung`, `diachi`, `sdt`, `tonggia`, `ngaylap`, `pttt`, `trangthai`) VALUES
(11, 2, '123 Lê Đức Thọ P5 Gò Vấp', 382034043, 16000, '2024-06-28 19:34:44', 'Thanh toán khi nhận hàng', 'Giao hàng thành công'),
(19, 2, ' 123 Zuffen quận Zuffenhausen, thành phố Stuttgart, phía nam nước Đức', 382034043, 4600, '2024-06-29 05:55:38', 'Thanh toán khi nhận hàng', 'Giao hàng thành công'),
(22, 34, 'Số 1 đường Cheong Wa Dae, Jongno, Seoul', 382034043, 19800, '2024-06-29 08:12:52', 'Thanh toán khi nhận hàng', 'Chuẩn bị hàng'),
(29, 33, '2-3-1 Nagatachō Chiyoda-ku 100-8968', 382034043, 10656, '2024-06-29 08:43:58', 'Thanh toán chuyển khoản', 'Đang gửi hàng'),
(30, 2, '2-3-1 Nagatachō Chiyoda-ku 100-8968', 382034043, 11700, '2024-06-29 10:07:58', 'Thanh toán chuyển khoản', 'Chuẩn bị hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `idnguoidung` int(11) NOT NULL,
  `tennguoidung` varchar(255) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `phanquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`idnguoidung`, `tennguoidung`, `hovaten`, `matkhau`, `phanquyen`) VALUES
(1, 'quantri', 'Quản trị viên', '202cb962ac59075b964b07152d234b70', 1),
(2, 'khachhang', 'Khách hàng', '202cb962ac59075b964b07152d234b70', 2),
(9, 'anhkhoa', 'Lý Anh Khoa', '202cb962ac59075b964b07152d234b70', 2),
(17, 'moimoi1', 'khoa lý', '202cb962ac59075b964b07152d234b70', 2),
(33, 'moimoi2', 'Lý Văn Khoa', '202cb962ac59075b964b07152d234b70', 2),
(34, 'moimoi3', 'Lý Vỹ Khoa', '202cb962ac59075b964b07152d234b70', 2),
(35, 'nhanvien', 'Lương Ngọc Thật', '202cb962ac59075b964b07152d234b70', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `phanquyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`idrole`, `phanquyen`) VALUES
(1, 'Quản Trị viên'),
(2, 'Khách Hàng'),
(3, 'Nhân Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `giagoc` int(11) NOT NULL,
  `giaban` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `idth` int(11) NOT NULL,
  `kichthuoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `giagoc`, `giaban`, `hinhanh`, `idth`, `kichthuoc`) VALUES
(1, 'Áo khoác chanel có logo', 5600, 0, 'chanel1.jpg', 2, 'S,M,L'),
(2, 'Áo khoác chanel đen và trắng', 7500, 4000, 'chanel2.jpg', 2, 'S,M,L'),
(3, 'Áo khoác chanel kim tuyến', 6000, 3000, 'chanel3.jpg', 2, 'S,M,L'),
(4, 'Áo thun chanel có logo', 3000, 2700, 'chanel4.jpg', 2, 'S,M,L'),
(5, 'Áo khoác chanel sọc trắng', 8000, 0, 'chanel5.jpg', 2, 'S,M,L'),
(6, 'Áo ngủ hoạ tiết phong cảnh', 9000, 8700, 'd1.jpg', 1, 'S,M,L'),
(7, 'Áo khoác caro', 6000, 5900, 'd2.jpg', 1, 'S,M,L'),
(8, 'Áo khoác long thú', 12000, 0, 'd3.jpg', 1, 'S,M,L'),
(9, 'Áo sơ mi trắng boxi ', 8000, 6700, 'd4.jpg', 1, 'S,M,L'),
(10, 'Áo sơ mi tay dài có logo', 5000, 4600, 'd5.jpg', 1, 'S,M,L'),
(11, 'Áo ngủ hoạ tiết phong cảnh', 9000, 0, 'd1.jpg', 1, 'S,M,L'),
(12, 'Áo len đỏ', 5500, 5000, 'g1.jpg', 5, 'S,M,L'),
(13, 'Áo len lông thú', 9500, 0, 'g2.jpg', 5, 'S,M,L'),
(14, 'Áo sơ mi tay lửng', 7500, 0, 'g3.jpg', 5, 'S,M,L'),
(15, 'Áo khoác gió ', 25500, 21400, 'g4.jpg', 5, 'S,M,L'),
(16, 'Áo thun đen có logo ', 2000, 0, 'g5.jpg', 5, 'S,M,L'),
(17, 'Áo len boxi đen', 3000, 2140, 'hm1.jpg', 4, 'S,M,L'),
(18, 'Áo len boxi xanh', 5000, 4440, 'hm2.jpg', 4, 'S,M,L'),
(19, 'Áo len boxi hồng', 6500, 0, 'hm3.jpg', 4, 'S,M,L'),
(20, 'Áo hoodie hình người nữ', 7600, 6200, 'hm4.jpg', 4, 'S,M,L'),
(21, 'Áo khoác len hoa hồng', 11000, 10440, 'hm5.jpg', 4, 'S,M,L'),
(22, 'Áo thun ba lổ', 6500, 0, 'lx1.jpg', 3, 'S,M,L'),
(23, 'Áo tay dài đen', 7700, 6000, 'lx2.jpg', 3, 'S,M,L'),
(24, 'Áo khoác boxi sọc caro', 15000, 14500, 'lx3.jpg', 3, 'S,M,L'),
(25, 'Áo sơ mi tay dài trắng logo', 3200, 2250, 'lx4.jpg', 3, 'S,M,L'),
(26, 'Áo khoác boxi long thú mềm', 9800, 9600, 'lx5.jpg', 3, 'S,M,L'),
(27, 'Đồ Chanel phiên bản mùa xuân', 3000, 2550, 'cn1.jpg', 2, 'S,M,L'),
(30, 'Áo Chanel phiên bản mùa xuân đông', 4000, 3050, 'cn2.jpg', 2, 'S,M,L'),
(31, 'Áo Chanel  mùa hè', 4500, 4156, 'cn3.jpg', 2, ''),
(32, 'Áo Chanel mùa đông', 4500, 3550, 'cn5.jpg', 2, 'S,M,L'),
(33, 'Áo Chanel phiên bảng giới hạn', 5000, 4556, 'cn5.jpg', 2, 'S,M,L'),
(34, 'Áo Dior Étoile Elegance', 4500, 3550, 'dior1.jpg', 1, 'S,M,L'),
(35, 'Áo Dior Jardin de Luxe', 5500, 4006, 'dior2.jpg', 1, 'S,M,L'),
(36, 'Áo Dior Classique Chic', 5900, 4806, 'dior3.jpg', 1, 'S,M,L'),
(37, 'Áo Dior Nouvelle Mode', 5700, 4806, 'dior4.jpg', 1, 'S,M,L'),
(38, 'Áo Dior Haute Couture Charm', 6500, 4906, 'dior5.jpg', 1, 'S,M,L'),
(39, 'Áo Gucci Hoàng Gia', 5000, 3850, 'gc1.jpg', 5, 'S,L,M'),
(40, 'Áo Gucci Tinh Hoa', 4900, 3900, 'gc2.jpg', 5, 'S,L,M'),
(41, 'Áo Gucci Đẳng Cấp', 6000, 3950, 'gc3.jpg', 5, 'S,L,M'),
(42, 'Áo Gucci Thời Thượng', 4900, 3900, 'gc4.jpg', 5, 'S,L,M'),
(43, 'Áo Gucci Quyến Rũ', 4900, 3900, 'gc5.jpg', 5, 'S,L,M'),
(44, 'Áo Phong Cách H&M', 5500, 3900, 'hm1.jpg', 4, 'S,M,L'),
(45, 'Áo Thời Trang H&M', 4500, 3500, 'hm2.jpg', 4, 'S,M,L'),
(46, 'Áo Basic H&M', 5500, 3990, 'hm3.jpg', 4, 'S,M,L'),
(47, 'Áo Dạo Phố H&M', 4500, 3550, 'hm4.jpg', 4, 'S,M,L'),
(48, 'Áo Tiện Dụng H&M', 4500, 3580, 'hm5.jpg', 4, 'S,M,L'),
(49, 'Áo Louis Sang Trọng', 6500, 5900, 'lv1.jpg', 3, 'S,M,L'),
(50, 'Áo Phong Cách Louis', 4800, 4000, 'lv2.jpg', 3, 'S,M,L'),
(51, 'Áo Louis Đẳng Cấp', 6500, 5900, 'lv3.jpg', 3, 'S,M,L'),
(52, 'Áo Louis Thời Thượng', 4800, 4000, 'lv4.jpg', 3, 'S,M,L'),
(53, 'Áo Louis Cổ Điển', 4800, 4000, 'lv5.jpg', 3, 'S,M,L'),
(56, 'airpod', 20000000, 1, 'airpod.png', 1, 'S,L');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `idth` int(11) NOT NULL,
  `tenth` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`idth`, `tenth`, `diachi`) VALUES
(1, 'Dior', '30 Đại lộ Montaigne, Paris, France'),
(2, 'Chanel', 'Neuilly-sur-Seine, France'),
(3, 'Louis Vuitton', '2 Rue du Pont Neuf, 75001 Paris, France'),
(4, 'H&M', 'Stockholm, Sweden'),
(5, 'Gucci', 'Florence, Italia');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idchitiet`),
  ADD KEY `fk_sp_cthd` (`idsp`),
  ADD KEY `fk_hd_cthd` (`idhoadon`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`),
  ADD KEY `idnguoidung` (`idnguoidung`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`idnguoidung`),
  ADD UNIQUE KEY `tennguoidung` (`tennguoidung`),
  ADD KEY `phanquyen` (`phanquyen`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `idth` (`idth`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`idth`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `idchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idhoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `idnguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `idth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_hd_cthd` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`idhoadon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sp_cthd` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_idnguoidung` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`idnguoidung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`phanquyen`) REFERENCES `role` (`idrole`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_th` FOREIGN KEY (`idth`) REFERENCES `thuonghieu` (`idth`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
