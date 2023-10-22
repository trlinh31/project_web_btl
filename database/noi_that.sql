-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 07:31 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

CREATE DATABASE IF NOT EXISTS noi_that;
USE noi_that;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `noi_that`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Sofa'),
(2, 'Ghế Ăn'),
(3, 'Giường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `phone`, `email`, `subject`, `content`) VALUES
(1, 'Linh Trần', '0979349098', 'nguyentranlinh31@gma', 'Hỗ trợ về cửa hàng', 'Cho mình xin địa chỉ của shop'),
(2, 'Nguyen Van N', '0979349098', 'nguyentranlinh31@gma', 'Hỗ trợ về cửa hàng', 'aaaaa'),
(3, 'Nguyen Van D', '0979349098', 'abc@gmail.com', 'Hỗ trợ về cửa hàng', 'xxx');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `discount`, `image`, `category_id`, `description`) VALUES
(1, 'Sofa Coastal 2 chỗ xanh', 5, 32900000, 0, 'pro_1.png', 1, 'Sofa Coastal gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic – gần gũi với thiên nhiên mà vẫn hiện đại, thoải mái. Điểm đặc biệt của BST lần này nằm ở sự tỉ mỉ của những người thợ thủ công lành nghề, họ đã hoàn thành những đường may uốn lượn không tì vết, mang đến một thiết kế chỉn chu, \"cân\" mọi góc nhìn. Cảm giác êm ái và thư thái sẽ là những tính từ đầu tiên được nhắc đến khi trải nghiệm sofa Coastal.'),
(2, 'Sofa Bridge 3 chỗ hiện đại da cognac', 4, 109970000, 10, 'pro_2.png', 1, 'Sofa Bridge 3 chỗ với phần khung ghế được làm từ gỗ sồi tự nhiên nhập khẩu từ Mỹ mang đến một thiết kế chắc chắn và bền bỉ. Điểm nhấn là phần tay vịn được gọt dũa tinh xảo với các đường vân gỗ cách điệu độc đáo. Những xúc chạm tinh tế sẽ được khơi nguồn khi bạn chạm nhẹ lên bề mặt sản phẩm, vì chất liệu da tự nhiên cao cấp sẽ đem lại cảm giác mềm mại và chân thực. Sản phẩm có đa dạng lựa chọn với 3 màu sắc khác nhau: màu beige, màu cognac và màu đen. Sofa Bridge 3 chỗ là sản phẩm phù hợp với không gian phòng khách sang trọng và tao nhã.'),
(3, 'Sofa Bolero 3 chỗ + Đôn vải xanh', 10, 24550000, 0, 'pro_3.png', 1, 'Sofa Bolero 3 chỗ và Đôn vải xanh 18 sở hữu phần chân kim loại được sơn đen và phần nệm được bọc vải cao cấp màu xanh dương. Kiểu dáng thiết kế của sofa Bolero tuy đơn giản nhưng lại mang đến sự tinh tế cho không gian phòng khách còn là sản phẩm sofa đáng sở hữu bởi thiết kế và trải nghiệm sử dụng.'),
(4, 'Sofa 3 chỗ Osaka', 7, 28380000, 0, 'pro_4.png', 1, 'Sofa 3 chỗ từ bộ sưu tập Osaka mang nét hiện đại và thơ mộng của Nhật Bản, tạo nên một không gian sống độc đáo đầy sang trọng. Sản phẩm có phần chân bằng inox màu gold chắc chắn, phần nệm được bọc vải và có thể tháo rời được. Sofa 3 chỗ Osaka mẫu 1 vải 29 không chỉ mang đến thiết kế tinh tế, sang trọng mà còn tạo cho người ngồi cảm giác thoải mái, dễ chịu.'),
(5, 'Sofa Jazz 3 chỗ hiện đại da cognac', 0, 59900000, 0, 'pro_5.png', 1, 'Sofa Jazz 3 chỗ được bao bọc bởi lớp da bò cao cấp đem lại cảm giác mềm mại, êm ái, thư giãn tuyệt vời. Thiết kế hiện đại mang nét đẹp độc đáo từ hình khối thanh lịch, đường nét tinh tế là điểm cộng lớn nhất của sofa Jazz.'),
(6, 'Sofa Cabo 3 chỗ', 1, 35200000, 20, 'pro_6.png', 1, 'Sofa Cabo được thiết kế kiểu dáng ba chỗ ngồi. Phần chân sofa sử dụng kim loại chắc chắn được sơn kết hợp 2 màu đen và gold tạo nên sự sang trọng, khung ghế được làm từ gỗ bọc vải cao cấp. Ghế sofa là lựa chọn thích hợp cho không gian phòng khách bởi kiểu dáng hiện đại và mềm mại.'),
(7, 'Sofa 3 chỗ PENNY – vải màu cam', 5, 54000000, 10, 'pro_7.png', 1, 'Sự đơn giản, tinh tế, sang trọng và không kém phần nổi bật của chiếc Sofa mang dòng máu bất diệt Scandivian này với lần lượt các phiên bản màu từ tối tới sáng bật Pastel sẽ mang lại các sắc màu không thể lẫn vào đâu và đa dạng cho từng không gian sống nhà bạn. Thiết kế vuông vức, thanh mảnh nhẹ nhàng là sự pha trộn giữa vững chãi và nhẹ nhàng là tất cả những yếu tố thiết yếu hội tụ ở chiếc sofa này.'),
(8, 'Sofa Combo 3 chỗ da Bali', 4, 59900000, 12, 'pro_8.png', 1, 'Sofa Combo 3 chỗ da Bali 520 màu nâu trầm là sự lựa chọn sáng suốt nhất của bạn cho không gian phòng khách thêm ấm áp và êm ái. Đây là mẫu sofa da với phần khung gỗ beech cùng đệm siêu đàn hồi, chân kim loại sơn đen và gold, bọc da tự nhiên rất sang trọng và bền đẹp, phù hợp với không gian tiếp khách sang trọng.'),
(9, 'Sofa Jazz 3 chỗ hiện đại da nâu', 2, 59900000, 0, 'pro_9.png', 1, 'Sofa Jazz 3 chỗ được bao bọc bởi lớp da bò cao cấp đem lại cảm giác mềm mại, êm ái, thư giãn tuyệt vời. Thiết kế hiện đại mang nét đẹp độc đáo từ hình khối thanh lịch, đường nét tinh tế là điểm cộng lớn nhất của sofa Jazz.'),
(10, 'Sofa Jazz 2.5 chỗ hiện đại da cognac', 8, 56400000, 20, 'pro_10.png', 1, 'Sofa Jazz 2.5 chổ được bao bọc bởi lớp da bò cao cấp đem lại cảm giác mềm mại, êm ái, thư giãn tuyệt vời. Thiết kế hiện đại mang nét đẹp độc đáo từ hình khối thanh lịch, đường nét tinh tế là điểm cộng lớn nhất của sofa Jazz.'),
(11, 'Ghế ăn Coastal', 5, 5100000, 0, 'pro_11.png', 2, 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Ghế ăn Coastal với bốn chân gỗ chắc chắn, được bọc vải êm ái cùng thiết kế phù hợp với thể trạng người Việt. Tất cả những phần tiếp xúc với cơ thể đều mềm mại, thanh thoát. Ngôn ngữ thiết kế của Coastal kết hợp đường nét uyển chuyển và tự nhiên, chất vải xanh tươi mát mang màu sắc của biển cùng nét vững chãi, tông gỗ ấm áp tạo nên sự tương phản hài hòa tựa như biển rộng bí ẩn và đất liền thân thuộc.'),
(12, 'Ghế ăn Coastal vàng', 10, 5100000, 10, 'pro_12.png', 2, 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Ghế ăn Coastal với bốn chân gỗ chắc chắn, được bọc vải êm ái cùng thiết kế phù hợp với thể trạng người Việt. Tất cả những phần tiếp xúc với cơ thể đều mềm mại, thanh thoát. Ngôn ngữ thiết kế của Coastal kết hợp đường nét uyển chuyển và tự nhiên, chất vải xanh tươi mát mang màu sắc của biển cùng nét vững chãi, tông gỗ ấm áp tạo nên sự tương phản hài hòa tựa như biển rộng bí ẩn và đất liền thân thuộc.'),
(13, 'Ghế ăn Coastal xanh', 4, 5100000, 15, 'pro_13.png', 2, 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Ghế ăn Coastal với bốn chân gỗ chắc chắn, được bọc vải êm ái cùng thiết kế phù hợp với thể trạng người Việt. Tất cả những phần tiếp xúc với cơ thể đều mềm mại, thanh thoát. Ngôn ngữ thiết kế của Coastal kết hợp đường nét uyển chuyển và tự nhiên, chất vải xanh tươi mát mang màu sắc của biển cùng nét vững chãi, tông gỗ ấm áp tạo nên sự tương phản hài hòa tựa như biển rộng bí ẩn và đất liền thân thuộc.'),
(14, 'Ghế ăn Peak vải cam', 0, 4820000, 0, 'pro_14.png', 2, 'Ghế ăn Peak là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc cam rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen sang trọng được xem là sự kết hợp hoàn hảo của thiết kế nắm bắt xu hướng, sở thích giới trẻ hiện nay.'),
(15, 'Ghế ăn Peak vải xanh', 2, 4820000, 20, 'pro_15.png', 2, 'Ghế ăn Peak là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(16, 'Ghế ăn Rusty', 10, 12670000, 0, 'pro_16.png', 2, 'Ghế ăn Rusty là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(17, 'Ghế ăn xoay Albert Kuip Taupe', 7, 13650000, 0, 'pro_17.png', 2, 'Ghế ăn Albert Kuip Taupe là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(18, 'Ghế Gerda đen trắng', 0, 5333000, 0, 'pro_18.png', 2, 'Ghế ăn Gerda là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(19, 'Ghế ăn không tay Elegance màu tự nhiên', 1, 16400000, 12, 'pro_19.png', 2, 'Ghế Elegance được làm từ gỗ Tần bì Mỹ. Bề mặt ngồi được thiết kế tỉ mỉ với sự đan xen của những sợi dây thừng cao cấp nhập khẩu từ Đức. Với đặc điểm chống nước tốt cùng khả năng đàn hồi cao, sản phẩm hứa hẹn sẽ đem lại trải nghiệm thú vị cho người dùng. Phần lưng tựa uốn cong nhẹ nhàng cho người dùng một tư thế ngồi thoải mái. Ghế Elegance với thiết kế tối giản sẽ mang đến không gian ấm cúng và trang nhã.'),
(20, 'Ghế ăn không tay Elegance màu đen', 5, 16400000, 10, 'pro_20.png', 2, 'Ghế Elegance được làm từ gỗ Tần bì Mỹ. Bề mặt ngồi được thiết kế tỉ mỉ với sự đan xen của những sợi dây thừng cao cấp nhập khẩu từ Đức. Với đặc điểm chống nước tốt cùng khả năng đàn hồi cao, sản phẩm hứa hẹn sẽ đem lại trải nghiệm thú vị cho người dùng. Phần lưng tựa uốn cong nhẹ nhàng cho người dùng một tư thế ngồi thoải mái. Ghế Elegance với thiết kế tối giản sẽ mang đến không gian ấm cúng và trang nhã.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE IF NOT EXISTS `product_comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `customer_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `customer_name`, `customer_phone`, `customer_comment`) VALUES
(1, 1, 'Chiến thần săn sale', NULL, 'Quá toẹt vời ! Yêu sản phẩm này quá đi.'),
(2, 1, 'ádasd', 'ádasd', 'ádasdasd'),
(3, 1, 'Linh Trần', 'Linh Trần', 'Nuột'),
(4, 2, 'Linh Trần', 'Linh Trần', 'Sản phẩm chất lượng.'),
(5, 2, 'ádas', 'ádas', 'asdasd'),
(6, 2, 'Linh Trần', 'Linh Trần', 'Đức Lương ăn cức'),
(7, 11, 'Linh Trần', 'Linh Trần', 'Sản phẩm chất lượng'),
(8, 11, 'Linh Trần', 'Linh Trần', 'Đc'),
(9, 11, 'Linh Trần', 'Linh Trần', 'đâsdasdas'),
(10, 1, 'Linh Trần', 'Linh Trần', 'abc'),
(11, 1, 'Linh Trần', 'Linh Trần', 'xyz'),
(12, 2, 'Linh Trần', 'Linh Trần', 'ádasdasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `email`, `phone`, `address`) VALUES
(6, 'Linh Trần', 'trlinh31', '12345', 'trlinh31.clone@gmail.com', '0979349098', 'Hà Nội');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
