-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.epizy.com
-- Generation Time: Jan 07, 2023 at 04:42 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33295365_nhom14`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Sony'),
(2, 'Sennheiser'),
(3, 'Apple'),
(4, 'MSI'),
(5, 'Logitech');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `total` double NOT NULL DEFAULT 0,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `addressid`, `email`, `telephone`, `note`, `total`, `time`) VALUES
('#811355', 68, 'a b', 'thôn 15, Hòa Đông,  Krông Pắc, Đắk Lắk thủ đức vietnam', 'yaongw@gmail.com', '54545345', '', 3656200, '02/01/2023 15:44:11'),
('#735053', 68, 'dat b', 'thôn 15, Hòa Đông,  Krông Pắc, Đắk Lắk thủ đức vietnam', 'locthon15@gmail.com', '54545345', '', 92600000, '02/01/2023 16:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `amount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `price`, `quantity`, `discount`, `amount`) VALUES
('#811355', 25, 2249000, 1, 0, 2249000),
('#811355', 24, 1759000, 1, 20, 1407200),
('#735053', 4, 76900000, 1, 0, 76900000),
('#735053', 3, 15700000, 1, 0, 15700000),
('#983939', 4, 76900000, 1, 0, 76900000),
('#983939', 3, 15700000, 1, 0, 15700000),
('#983939', 2, 33900000, 1, 20, 27120000),
('#983939', 6, 250000, 1, 20, 200000),
('#214314', 2, 33900000, 1, 20, 27120000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_view` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`, `product_view`) VALUES
(2, 'OLED Tivi 4K Sony 55 inch 55A80J Google TV', 1, 1, 33900000, 'tivi-2.jpg', 'TV trí tuệ nhân tạo AI nhận thức đầu tiên trên thế giới\r\nHình ảnh OLED mang tính cách mạng, theo cảm nhận của mắt người\r\nBiến mọi âm thanh thành trải nghiệm thực sự đắm chìm\r\nGiải trí rảnh tay với sự trợ giúp từ trợ lý ảo Google', 1, '2022-10-28 11:59:15', 3),
(3, 'Smart Tivi 4K Sony KD-43X75 43 inch 4K HDR Android TV', 1, 1, 15700000, 'tivi-3.jpg', 'Hình ảnh 4K sắc nét từ Bộ xử lý 4K X1™ cùng công nghệ X-Reality™ PRO\r\nTái tạo dải màu rộng hơn, chính xác hơn với công nghệ Live Colour™\r\nHỗ trợ định dạng âm thanh Dolby Audio\r\nTìm kiếm bằng giọng nói, HĐH Android tích hợp trợ lý ảo Google Assistant', 0, '2022-10-28 11:59:15', 2),
(4, 'Smart Tivi 4K Sony KD-85X86J 85 inch Google TV', 1, 1, 76900000, 'tivi-4.jpg', 'TV trí tuệ nhân tạo AI nhận thức đầu tiên trên thế giới\r\nBộ xử lý X1™ nâng cấp lên hình ảnh 4K với độ phân giải gấp 4 lần Full HD\r\nChuyển động mượt Motionflow XR 800\r\nĐộ tương phản chân thực nhờ 4K Triluminos Pro™\r\nMàu sắc và độ tương phản trung thực hơn nữa\r\nÂm thanh, hình ảnh hài hòa, loa gắn vào khung viền, âm thanh phát ra từ đúng vị trí trong cảnh', 0, '2022-10-28 11:59:15', 0),
(5, 'Tivi Sony 32 inch 32R300E, HD Ready, MXR 100Hz', 1, 1, 6300000, 'tivi-5.jpg', 'Độ phân giải màn hình HD hình ảnh sắc nét, màu sắc rực rỡ.\r\nCông nghệ Clear Resolution Enhancer cho hình ảnh mượt mà, sắc nét.\r\nBộ 4 bảo vệ X-Protection PRO bảo vệ tivi tránh hư hỏng do các yếu tố bên ngoài.\r\nHỗ trợ các kết nối USB , kết nối HDMI, Tích hợp bộ thu DVB-T2', 0, '2022-10-28 11:59:15', 0),
(6, 'Tai nghe Sennheiser MX 400 II (đen, trắng, xám)', 2, 2, 250000, 'tai-nghe-1.jpg', 'Nếu bạn đang tìm kiếm một dòng tai nghe giá rẻ, đáp ứng nhu cầu âm thanh mà một dòng tai nghe thông thường có thể làm được thì Sennheiser MX 400 II chính là sản phẩm hữu dụng mà bạn đang tìm kiếm. Tai nghe nhạc MX 400 II trang bị cho mình dải tần trải dài 55Hz - 15000Hz, đáp ứng chi tiết âm thanh vượt trội nhất. Tuy với mức giá \"hạt dẻ\" nhưng MX400 II cao cấp co chế độ bảo hành lên tới 2 năm đáp ứng nhu cầu sử dụng người dùng. Dây dài 1,2m giúp bạn nghe nhạc thoải mái hơn. Chỉ cần cắm Jack cắm 3,5m vào điện thoại là bạn đã có thể vô tư nghe nhạc, và bạn cũng có thể cho điện thoại vào túi xách, túi quần rất tiện dụng.', 1, '2022-10-28 11:59:15', 4),
(7, 'Tai nghe Sennheiser IE 800', 2, 2, 23780000, 'tai-nghe-2.jpg', 'Tai nghe Sennheiser IE 800 là 1 trong những sản phẩm tai nghe công nghệ hot và đắt nhất trên thị trường hiện nay. Tuy đắt nhưng sản phẩm này lại được rất nhiều anh em săn đón. Tại sao lại như vậy? Chắc hẳn chiếc tai nghe nhạc này không phải dạng vừa. Hãy cùng META đi tìm hiểu chi tiết sản phẩm trong bài viết này nhé!', 1, '2022-10-28 11:59:15', 3),
(8, 'Tai nghe EPOS Sennheiser PC 7 USB', 2, 2, 1200000, 'tai-nghe-3.jpg', 'Kết nối với máy tính qua cổng USB, cắm là chạy, thật đơn giản\r\nÂm thanh khi nghe và nói rất rõ ràng với giả cả phải chăng.\r\nMicrophone hạn chế , giảm thiểu tiếng ồn xung quanh\r\nTai nghe khá nhẹ và thoải mái', 0, '2022-10-28 11:59:15', 0),
(9, 'Tai nghe Sennheiser HDR165', 2, 2, 3630000, 'tai-nghe-4.jpg', 'Tai nghe không dây Sennheiser HDR 165 có kiểu dáng đẹp mắt với tông màu đen sang trọng, kích thước nhỏ gọn, trọng lượng nhẹ khoảng 300g giúp bạn dễ dàng mang theo tới bất kỳ đâu để thỏa mãn niềm đam mê âm nhạc của mình. Tai nghe Sennheiser HDR165 truyền tín hiệu digital rất tốt và ổn định với khoảng cách lên đến tối đa 30m.', 1, '2022-10-28 11:59:15', 0),
(10, 'Tai nghe Sennheiser MX 375', 2, 2, 529000, 'tai-nghe-5.jpg', 'Tai nghe Sennheiser MX 375 với âm bass mạnh mẽ, chất lượng âm thanh trong sáng, trung thực, rõ ràng, đem đến cho người dùng những trải nghiệm âm thanh hoàn hảo, đáp ứng dải tần 20Hz - 22kHz cho âm thanh trầm bổng theo từng nốt nhạc.', 1, '2022-10-28 14:31:07', 2),
(11, 'Apple iphone 11 128GB', 3, 3, 899000, 'smartphone1.jpg', 'LCD cỡ 6,1 inch, tốc độ làm mới 60Hz\r\nFace ID góc rộng\r\nApple A13 Bionic 6 lõi, tốc độ 2,66 Ghz; Quy trình công nghệ 7nm thế hệ thứ 2 của TSMC\r\nNgâm dưới nước ở độ sâu 2m trong 30 phút\r\n128GB', 1, '2022-10-28 11:59:15', 0),
(12, 'iPhone SE 2022 64GB', 3, 3, 12990000, 'smartphone2.jpg', 'Màn hình: Kích thước 4.7 inch, độ sáng 625 nit\r\nHệ điều hành: iOS 15.\r\nCamera sau: Độ phân giải 12 MP.\r\nCamera trước: Độ phân giải 7 MP.\r\nChip: Apple A15 Bionic.', 0, '2022-10-28 11:59:15', 0),
(13, 'Apple Iphone 14 Pro 512GB Space Black', 3, 3, 36990000, 'smartphone3.jpg', 'Công nghệ màn hình LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\nCamera chính 48MP + Phụ 12MP + 12MP, camera selfie 12MP ở mặt trước\r\nVi xử lý Apple A16 Bionic 4nm với Apple GPU (5-core graphics)\r\nPin Li-Ion 3200mAh, Sạc không dây MagSafe', 0, '2022-10-28 11:59:15', 0),
(14, 'Apple Iphone 13 Pro 128G Silver', 3, 3, 23990000, 'smartphone4.jpg', 'Công nghệ màn hình OLED Super Retina\r\nCamera 12MP + 12MP + 12MP, camera selfie 12MP ở mặt trước\r\nVi xử lý Apple A15 5nm với RAM 6GB\r\nSử dụng cả ngày, hỗ trợ sạc nhanh 20W\r\n128GB', 1, '2022-10-28 11:59:15', 1),
(15, 'APPLE iPhone 12 64G Green', 3, 3, 14990000, 'smartphone5.jpg', 'Công nghệ màn hình OLED Super Retina\r\nCamera kép 12MP + 12MP, camera selfie 12MP ở mặt trước\r\nVi xử lý Apple A14 5nm với RAM 4GB\r\nSử dụng cả ngày, hỗ trợ sạc nhanh 20W', 1, '2022-10-28 11:59:15', 2),
(16, 'Laptop MSI Modern 14 B5M R5 5500U/8GB/512GB/Túi/Chuột/Win11 (203VN) ', 4, 4, 13690000, 'laptop-1.jpg', 'Laptop MSI Modern 14 B5M R5 5500U (203VN) sở hữu kiểu dáng thanh lịch với thiết kế màn hình viền mỏng cùng cấu hình ổn định, sẵn sàng đồng hành cùng bạn trong mọi tác vụ xử lý công việc hay giải trí.', 0, '2022-10-28 11:59:15', 0),
(17, 'Laptop MSI Modern 14 i7-1195G7/8GB/512GB/Win11 B11MOU-1065VN', 4, 4, 20590000, 'laptop-2.jpg', 'Thiết kế thời thượng, kiểu dáng nhỏ gọn với trọng lượng chỉ 1.3kg\r\nHiệu suất mạnh mẽ, xử lý mượt mà mọi tác vụ nhờ CPU i7-1195G7\r\nRAM 8GB đa nhiệm có thể làm việc với nhiều Tab mà không giật, lag\r\nỔ cứng 512GB cho không gian lưu trữ lớn, mở các ứng dụng nhanh chóng\r\nCó đủ các cổng kết nối hiện đại, thông dụng giúp nhận và truyền dữ liệu\r\nMàn hình Full HD, độ phân giải 1920x1080 hiển thị hình ảnh sắc nét', 1, '2022-10-28 11:59:15', 0),
(18, 'Laptop MSI GF66 i7-12650H/8GB/512GB/Win11 12UCK-804VN', 4, 4, 26990000, 'laptop-3.jpg', 'Ngoại hình mạnh mẽ, phong cách thiết kế chuẩn Gaming với bàn phím tuyệt đẹp\r\nVi xử lý Intel Core i7-12650H Gen 12 cho hiệu năng mạnh mẽ chạy mượt mọi tựa game\r\nTrang bị Card đồ họa NVIDIA GeForce RTX đem lại đồ họa ray-tracing siêu chân thực\r\nRAM DDR4 8GB đa nhiệm cho phép Laptop làm việc với nhiều Tab mà không giật, lag\r\nỔ cứng 512GB lưu trữ được nhiều dữ liệu, khởi động máy và các ứng dụng nhanh hơn\r\nMàn hình 144Hz cho hình ảnh ấn tượng và mượt mà để bạn luôn bắt kịp mọi chuyển động\r\nBàn phím gaming RGB có thể cài đặt màu theo sở thích người dùng: đỏ, xanh, vàng,...\r\nCụm tản nhiệt cho CPU và GPU đảm bảo hiệu năng tối đa ngay cả khi chơi các game nặng', 1, '2022-10-28 11:59:15', 0),
(19, 'Laptop MSI Modern 15 A5M R7-5700U/8GB/512GB/Win11 (239VN)', 4, 4, 45990000, 'laptop-4.jpg', 'Trải nghiệm hình ảnh rõ nét, chân thực trên màn hình 15.6 inch FHD\r\nCPU AMD Ryzen™ 7 5700U mạnh mẽ giải quyết công việc nhanh chóng\r\nRAM 8GB DDR4 giúp laptop đa nhiệm mượt mà, ổn định hạn chế giật lag\r\nỔ cứng SSD 512GB giúp khởi động máy nhanh, không gian lưu trữ tốt\r\nÂm thanh Hi-res Audio cho trải nghiệm âm thanh giải trí cực sống động\r\nThời lượng pin lên đến 10 giờ đáp ứng tốt nhu cầu học tập, làm việc\r\nĐèn nền bàn phím hỗ trợ người dùng khi làm việc ở môi trường thiếu sáng', 0, '2022-10-28 11:59:15', 0),
(20, 'Laptop MSI Crosshair 15 B12UEZ-460VN', 4, 4, 36990000, 'laptop-5.jpg', 'Laptop MSI Crosshair 15 B12UEZ 460VN chạy trên con chip xử lý Intel Core H-series thế hệ thứ 12 mới nhất. Chip 14 nhân, 24 luồng đảm bảo hiệu suất phát huy tối đa trong quá trình chơi game. Dung lượng RAM 16GB cùng ổ cứng SSD 1TB PCle cho khả năng lưu trữ lớn, không bị giật lag trong quá trình sử dụng.', 1, '2022-10-28 11:59:15', 0),
(21, 'Chuột Gaming không dây Logitech G304', 5, 5, 890000, 'chuot-1.jpg', 'Đem đến sự lựa chọn có giá thành phù hợp dành cho các game thủ, chuột Logitech G304 được nâng cấp toàn diện so với các thế hệ trước nhờ sở hữu thiết kế đột phá, cảm biến HERO 12.000 mức DPI, hệ thống 6 nút lập trình để tùy chỉnh tính năng và công nghệ tương tác không dây vượt trội LIGHTSPEED.', 1, '2022-10-28 11:59:15', 0),
(22, 'Chuột Bluetooth Logitech M650', 5, 5, 849000, 'chuot-2.jpg', 'Với thiết kế tập trung vào người dùng, chuột không dây Logitech Signature M650 sẽ hứa hẹn cung cấp những trải nghiệm sử dụng thoải mái nhất. Sản phẩm nổi bật với tính năng cuộn SmartWheel, kết nối không dây liền mạch, nút bấm yên tĩnh và nút bên có thể tùy chỉnh.', 0, '2022-10-28 11:59:15', 0),
(23, 'Chuột có dây Logitech M90', 5, 5, 119000, 'chuot-3.jpg', 'Chuột Logitech M90 là giải pháp bền bỉ, đơn giản và hiệu quả để dùng cho văn phòng, góc làm việc hoặc góc học tập. Thiết bị được thiết kế theo phong cách nhẹ nhàng với hai tone màu xám – đen. Chiều dài dây 1,8 mét linh hoạt kết hợp cùng độ nhạy 1000 DPI chắc chắn sẽ giúp M90 phục vụ bạn một cách hiệu quả.', 1, '2022-10-28 11:59:15', 0),
(24, 'Chuột Gaming Logitech G502 Hero High Performance', 5, 5, 1759000, 'chuot-5.jpg', 'Với thiết kế đậm chất gaming và những nét cắt xẻ cực cá tính, chuột Logitech G502 HERO High Performance sẽ là trợ thủ đắc lực để game thủ có điều kiện phô diễn kỹ năng thượng thừa trong từng pha giao tranh gay cấn. Mọi chi tiết của sản phẩm như cảm biến quang học, hệ thống nút bấm, trọng lượng và đèn RGB đều được tối ưu hợp lý nhằm tạo điều kiện tốt nhất khi chơi game.', 1, '2022-10-28 13:39:35', 0),
(25, 'Chuột không dây Logitech MX Master 3', 5, 5, 2249000, 'chuot-4.jpg', 'Chuột không dây Logitech MX Master 3 được thiết kế với kiểu dáng hỗ trợ cử động cổ tay và bàn tay thoải mái nhất, có thể vận hành mượt mà trên nhiều bề mặt nhờ độ phân giải cảm biến lên tới 4000 DPI và hỗ trợ công nghệ Logitech Flow giúp duy trì tương tác với ba máy tính hoặc laptop riêng biệt.', 0, '2023-01-07 10:29:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_user`
--

CREATE TABLE `products_user` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_user`
--

INSERT INTO `products_user` (`product_id`, `user_id`) VALUES
(7, 52),
(9, 52),
(10, 52),
(11, 52),
(24, 52),
(25, 52);

-- --------------------------------------------------------

--
-- Table structure for table `product_user_cart`
--

CREATE TABLE `product_user_cart` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `protypes`
--

CREATE TABLE `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Tivi'),
(2, 'Tai nghe'),
(3, 'Smartphone'),
(4, 'LapTop'),
(5, 'Chuột');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `telephone`, `address`, `role_id`) VALUES
(52, 'tri', 'd2cfe69af2d64330670e08efb2c86df7', 'Tri2003bt@gmail.com', 0, NULL, 0),
(53, 'phuongtri', '202cb962ac59075b964b07152d234b70', 'Tri2003bt@gmail.com', 0, NULL, 1),
(51, 'alo', '514f1b439f404f86f77090fa9edc96ce', 'rrr', 0, NULL, 1),
(54, 'loc123', '827ccb0eea8a706c4c34a16891f84e7b', 'yaongw@gmail.com', 0, NULL, 1),
(67, 'gg', '202cb962ac59075b964b07152d234b70', 'yaongw@gmail.com', 123, 'thôn 15, Hòa Đông,  Krông Pắc, Đắk Lắk', 0),
(68, 'aa', '202cb962ac59075b964b07152d234b70', 'yaongw@gmail.com', 12312, 'thôn 15, Hòa Đông,  Krông Pắc, Đắk Lắk', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_user`
--
ALTER TABLE `products_user`
  ADD PRIMARY KEY (`product_id`,`user_id`);

--
-- Indexes for table `product_user_cart`
--
ALTER TABLE `product_user_cart`
  ADD PRIMARY KEY (`product_id`,`user_id`);

--
-- Indexes for table `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
