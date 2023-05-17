-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2023 lúc 12:05 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `maBL` int(10) NOT NULL,
  `noiDung` varchar(255) NOT NULL,
  `maSP` int(10) NOT NULL,
  `maKH` int(10) NOT NULL,
  `ngayBL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `maCTDH` int(11) NOT NULL,
  `maSP` int(10) NOT NULL,
  `maDH` int(10) NOT NULL,
  `donGia` float NOT NULL,
  `soLuongMua` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maCTDH`, `maSP`, `maDH`, `donGia`, `soLuongMua`) VALUES
(3, 80, 1, 16942500, 1),
(4, 70, 2, 10799100, 1),
(5, 68, 5, 100000, 1),
(6, 69, 6, 70000, 1),
(7, 71, 8, 150000, 5),
(8, 74, 0, 149900, 7),
(9, 71, 0, 150000, 3),
(11, 83, 17, 50000, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `maDM` int(10) NOT NULL,
  `tenDM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`maDM`, `tenDM`) VALUES
(9, 'Đồ nam'),
(10, 'Đồ nữ'),
(11, 'Đồ trẻ em'),
(12, 'Tất cả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDH` int(10) NOT NULL,
  `maKH` int(10) NOT NULL,
  `maTT` int(10) NOT NULL,
  `tenKH` varchar(50) NOT NULL,
  `hinhAnh` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `SDT` int(10) NOT NULL,
  `ghiChu` varchar(255) NOT NULL,
  `trangThai` tinyint(4) NOT NULL DEFAULT 0,
  `ngayDH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDH`, `maKH`, `maTT`, `tenKH`, `hinhAnh`, `diaChi`, `SDT`, `ghiChu`, `trangThai`, `ngayDH`) VALUES
(1, 2, 1, 'kan', 'iphone_13_mini.jpg', 'Sài Gòn', 123465789, '', 0, '08:00:08am 06/12/2021'),
(2, 2, 1, 'kan', 'iPhone_SE_(2020).jpg', 'Sài Gòn', 123465789, '', 2, '04:19:20pm 06/12/2021'),
(5, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-13 22:42:42'),
(6, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-13 22:49:40'),
(7, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-13 22:55:21'),
(8, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 3, '2023-04-13 22:57:33'),
(9, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-14 09:05:19'),
(10, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-14 09:07:17'),
(11, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-14 09:11:25'),
(12, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-14 09:11:49'),
(13, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-14 09:13:11'),
(14, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-14 09:14:44'),
(15, 4, 1, 'khach1', '#', 'Dako', 2147483647, '', 1, '2023-04-14 09:14:44'),
(17, 10, 1, 'khach3', '#', 'Dako', 2147483647, '', 3, '2023-04-16 13:34:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(10) NOT NULL,
  `tenDN` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `tenKH` varchar(50) NOT NULL,
  `hinhAnh` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `trangThai` int(2) DEFAULT NULL,
  `vaiTro` int(11) DEFAULT NULL,
  `SDT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenDN`, `matKhau`, `tenKH`, `hinhAnh`, `email`, `diaChi`, `trangThai`, `vaiTro`, `SDT`) VALUES
(2, 'admin', '123456', 'kan', '#', 'phungdang.khoan@gmail.com', 'Sài Gòn', 0, 1, 123465789),
(4, 'khach1', '123', 'khach1', '#', 'khach', 'Dk', 0, 0, 111942323),
(10, 'khach3', '123', 'khach3', '#', 'nguyenvana@example.com', 'DK', 1, 0, 123456789);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(10) NOT NULL,
  `tenSP` varchar(50) NOT NULL,
  `hinhAnh` varchar(50) NOT NULL,
  `donGia` float NOT NULL,
  `giamGia` int(10) NOT NULL,
  `maDM` int(10) NOT NULL,
  `ngayNhap` datetime NOT NULL,
  `soLuong` int(10) NOT NULL,
  `moTa` varchar(500) NOT NULL,
  `luotXem` int(11) NOT NULL DEFAULT 0,
  `trangThai` bit(2) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `hinhAnh`, `donGia`, `giamGia`, `maDM`, `ngayNhap`, `soLuong`, `moTa`, `luotXem`, `trangThai`) VALUES
(68, 'Áo poco trắng 3', '1681318013_7d0984be70e9afaa1476bbfc8b6f02e3.jpg', 100000, 1, 9, '0000-00-00 00:00:00', 121, '♥️ Chất liệu: Bộ quần áo nam vải 100% từ thiên nhiên , chất vải HOTTREND 2022, lên dáng chuẩn form ,chất xốp nhẹ , không bám dính mồ hôi nên người dùng sẽ cảm thấy rất thoải mái !!! \r\n♥️ Size Bộ thể thao nam : M (45-54kg), L (55-61kg), XL (62-69kg),2XL (70-76kg)\r\n♥️ Đồ Bộ Nam là phụ kiện thời trang đơn giản nhưng không thể thiếu cho mùa hè. Các anh có thể mặc đồ bộ nam ờ nhà, hay dùng làm đồ thể thao, tập gym rất mát mẻ và thoải mái\r\n  Mẹo Nhỏ Giúp Bạn Bảo Quản Quần áo nam : \r\n-  Đối với sản phẩ', 0, b'00'),
(69, 'Áo thung', '1681318945_88b67ce27a7de5e31480d1ce4e5cffd3.jpg', 70000, 1, 9, '0000-00-00 00:00:00', 100, '  Mẹo Nhỏ Giúp Bạn Bảo Quản Quần áo nam : \r\n-  Đối với sản phẩm quần áo mới mua về, nên giặt tay lần đâu tiên để tránh phai màu sang quần áo khác\r\n-  Khi giặt nên lộn mặt trái ra để đảm bảo độ bền \r\n-  Sản phẩm phù hợp cho giặt máy/giặt tay\r\n - Không giặt chung đồ Trắng và đồ Tối màu\r\n KIÊN TRANG CAM KẾT\r\nSản phẩm 100% giống mô tả. Kiểu dáng hoàn toàn giống ảnh mẫu\r\nÁo được kiểm tra kĩ càng, cẩn thận và tư vấn nhiệt tình trước khi gói hàng giao cho Quý Khách\r\nHàng có sẵn, giao hàng ngay khi nhận', 0, b'00'),
(70, 'Đồ bộ nam', '1681319090_e5b3c94e09759f490cecfcf0c87139aa_tn.jpg', 80000, 5, 9, '0000-00-00 00:00:00', 50, '???? AHSTORE CAM KẾT\r\n\r\nSản phẩm 100% giống mô tả. Kiểu dáng hoàn toàn giống ảnh mẫu\r\n\r\nÁo được kiểm tra kĩ càng, cẩn thận và tư vấn nhiệt tình trước khi gói hàng giao cho Quý Khách\r\n\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn \r\n\r\nHoàn tiền nếu sản phẩm không giống với mô tả\r\n\r\nChấp nhận đổi hàng khi size không vừa\r\n\r\nGiao hàng trên toàn quốc, nhận hàng trả tiền \r\n\r\nDo màn hình và điều kiện ánh sáng khác nhau, màu sắc thực tế chút xíu xíu\r\n\r\n', 0, b'00'),
(71, 'Váy trắng TK', '1681319280_e227d1bcfa4b312568864516e1d95876.jpg', 150000, 10, 10, '0000-00-00 00:00:00', 70, 'Mua 1 được 2 ạ. Cả set siêu xinh tiểu thưa mà có thể tách rời mix sp khác đều được nh\r\n\r\nÁo có điểm nhấn lạ mặc được 2 kiểu khoá sườn chiết eo hoặc bỏ suông đều xinh lắm ạ. 1 Set mà được nhiều kiểu mà hạt rẻ dễ mặc lắm nha. Hot hit 2023 lắm luôn ạ\r\n\r\nQuần cạp chun nên co dãn thoải mái eo < 75 nha mn\r\n\r\nDài áo : 72cm\r\n\r\nRộng áo: 60 cm ( khi không đóng khuy )\r\n\r\nVai áo : 54 cm', 0, b'00'),
(72, 'Đồ nữ thể thao Ak', '1681319324_sg-11134201-23020-w90ov4zq23mvbc_tn.jpg', 130000, 20, 10, '0000-00-00 00:00:00', 121, 'Mua 1 được 2 ạ. Cả set siêu xinh tiểu thưa mà có thể tách rời mix sp khác đều được nh\r\n\r\nÁo có điểm nhấn lạ mặc được 2 kiểu khoá sườn chiết eo hoặc bỏ suông đều xinh lắm ạ. 1 Set mà được nhiều kiểu mà hạt rẻ dễ mặc lắm nha. Hot hit 2023 lắm luôn ạ\r\n\r\nQuần cạp chun nên co dãn thoải mái eo < 75 nha mn\r\n\r\n', 0, b'00'),
(73, 'Váy xinh THK', '1681319378_vn-11134201-7qukw-lev2r0xqawk720_tn.jpg', 200000, 40, 10, '0000-00-00 00:00:00', 50, ' Khách cần là hơi phẳng trước khi giao ib shop trước nha.\r\n\r\n\r\n\r\n^^ Nhà mk chỉ bán hàng LOẠI 1, KHÔNG bán hàng lởm hàng chợ nên các bạn cực kì yêm tâm nha\r\n\r\n\r\n\r\n** Mỗi đơn hàng bên shop đều kiểm tra kĩ trước khi đóng giao cho khách, đóng gói cẩn thận, tránh sai sót. \r\n\r\n\r\n\r\n** ĐỔI TRẢ THOẢI MÁI NẾU SẢN PHẨM BỊ LỖI \r\n\r\n\r\n\r\n** KHÁCH CẦN TƯ VẤN IB SHOP NHA', 0, b'00'),
(74, 'Đồ bộ NaKy', '1681319443_vn-11134207-7qukw-lf6muj47k5my6f.jpg', 149900, 1, 10, '0000-00-00 00:00:00', 40, ' chất liệu sản phẩm: áo sơ mi sọc cotton kèm quần kaki nhung mềm \r\n⚡️ phụ kiện đi kèm: áo dây tặng\r\n⚡️ size sản phẩm: s m l xl \r\n???? nếu có bất kỳ thắc mắc nào hãy nhắn tin với bên e để được giải đáp nhanh nhất nhé', 0, b'00'),
(78, 'Bộ 2 váy công sở ', '1681319635_vn-11134211-23030-swdln7tz9fov6e.jpg', 200000, 1, 10, '0000-00-00 00:00:00', 60, '???? bên e cam kết luôn xử lý đến cùng nếu sản phẩm có bất kỳ vấn đề gì ạ! \r\n???? đặc biệt quý khách được đổi trả nếu sản phẩm không như mô tả thông qua shopee và thời gian đổi trả là 3 ngày ????\r\n???? Với các sản phẩm đổi trả do sản phẩm có vấn đề xin lưu ý giúp shop em: sản phẩm chưa qua giặt ủi, sản phẩm chưa qua sử dụng, sp còn nguyên vẹn như lúc nhận hàng ạ ', 0, b'00'),
(79, 'Bé gái thôn dân', '1681319865_bdb3b46b627268ad4d16cf352fd632d9.jpg', 55000, 2, 11, '0000-00-00 00:00:00', 70, '▪️Chiếc Áo Bà Ba luôn mang vẻ đẹp bình dị , gần gũi,  thuần khiết mộc mạc,  mang nét đẹp tự nhiên trong trẻo cho bé\r\nNhìn một lần là nhớ mặc một lần là yêu \r\nBộ bà ba phù hợp cả bé trai và bé gái mặc đều xinh ạ\r\n????????????  Lưu ý . Bộ bà ba kg kèm khăn,  khăn shop bán riêng 23k nhé \r\n ', 0, b'00'),
(80, 'Đồ bộ bé trai', '1681319909_88301cee200023040ac63701f6aa7e1e.jpg', 48000, 2, 11, '0000-00-00 00:00:00', 10, '\r\n- Sản Phẩm Chất Lượng\r\n- Giá tốt nhất thị trường \r\n- Ưu tiên chất liệu thân thiện da bé \r\n- Cam kết giao hàng đúng mẫu Mẫu Mới Cập Nhật Liên Tục \r\n- Tư Vấn Khách Hàng Nhiệt Tình - Chu Đáo\r\n- Ship Hàng Toàn Quốc Nhanh Chóng\r\n\r\n ---------------Cam kết--------------- ', 0, b'00'),
(81, 'Đồ nhỏ màu đen', '1681319957_88b67ce27a7de5e31480d1ce4e5cffd3.jpg', 50000, 1, 11, '0000-00-00 00:00:00', 70, '- Hoàn tiền 200% nếu hàng không giống hình \r\n- Đổi trả miễn phí nếu lỗi do nhà sản xuất', 0, b'00'),
(83, 'Váy hồng nữ', '1681320530_vn-11134201-7qukw-lev2r0xqawk720_tn.jpg', 50000, 10, 10, '0000-00-00 00:00:00', 75, 'Váy dạo phố dự tiệt', 0, b'00'),
(84, 'Đồ nam 5', '1681627020_88b67ce27a7de5e31480d1ce4e5cffd3.jpg', 10002, 1, 9, '0000-00-00 00:00:00', 180, 'Đồ', 0, b'00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`maBL`),
  ADD KEY `fk_maSP1` (`maSP`),
  ADD KEY `fk_maKH` (`maKH`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`maCTDH`),
  ADD KEY `fk_maSP2` (`maSP`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`maDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDH`),
  ADD KEY `fk_maKH1` (`maKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `fk_maDM` (`maDM`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `maBL` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `maCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `maDM` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_maKH` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_maSP1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_maKH1` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_maDM` FOREIGN KEY (`maDM`) REFERENCES `danhmuc` (`maDM`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
