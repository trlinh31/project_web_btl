-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2023 lúc 04:49 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

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
CREATE DATABASE IF NOT EXISTS `noi_that` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `noi_that`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
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

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `phone`, `email`, `title`, `content`) VALUES
(3, 'Nguyen Van D', '0979349098', 'abc@gmail.com', 'Hỗ trợ về cửa hàng', 'xxx'),
(7, 'Linh Trần', '0979349098', 'loli@gmail.com', 'Hỗ trợ về cửa hàng', '123'),
(8, 'Linh Trần', '0979349098', 'trlinh31.clone@gmail.com', 'test123', 'test123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `user_id`, `total`) VALUES
(2, 6, 114000000),
(3, 10, 64000000),
(4, 10, 166000000),
(5, 10, 28000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 2, 2, 1),
(2, 2, 3, 1),
(3, 3, 29, 1),
(4, 3, 28, 2),
(5, 4, 29, 1),
(6, 4, 30, 4),
(7, 5, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount`, `image`, `category_id`, `description`) VALUES
(1, 'Sofa Coastal 2 chỗ xanh', 33000000, 0, 'pro_1.png', 1, 'Sofa Coastal gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic – gần gũi với thiên nhiên mà vẫn hiện đại, thoải mái. Điểm đặc biệt của BST lần này nằm ở sự tỉ mỉ của những người thợ thủ công lành nghề, họ đã hoàn thành những đường may uốn lượn không tì vết, mang đến một thiết kế chỉn chu, \"cân\" mọi góc nhìn. Cảm giác êm ái và thư thái sẽ là những tính từ đầu tiên được nhắc đến khi trải nghiệm sofa Coastal.'),
(2, 'Sofa Bridge 3 chỗ hiện đại da cognac', 100000000, 10, 'pro_2.png', 1, 'Sofa Bridge 3 chỗ với phần khung ghế được làm từ gỗ sồi tự nhiên nhập khẩu từ Mỹ mang đến một thiết kế chắc chắn và bền bỉ. Điểm nhấn là phần tay vịn được gọt dũa tinh xảo với các đường vân gỗ cách điệu độc đáo. Những xúc chạm tinh tế sẽ được khơi nguồn khi bạn chạm nhẹ lên bề mặt sản phẩm, vì chất liệu da tự nhiên cao cấp sẽ đem lại cảm giác mềm mại và chân thực. Sản phẩm có đa dạng lựa chọn với 3 màu sắc khác nhau: màu beige, màu cognac và màu đen. Sofa Bridge 3 chỗ là sản phẩm phù hợp với không gian phòng khách sang trọng và tao nhã.'),
(3, 'Sofa Bolero 3 chỗ + Đôn vải xanh', 24000000, 0, 'pro_3.png', 1, 'Sofa Bolero 3 chỗ và Đôn vải xanh 18 sở hữu phần chân kim loại được sơn đen và phần nệm được bọc vải cao cấp màu xanh dương. Kiểu dáng thiết kế của sofa Bolero tuy đơn giản nhưng lại mang đến sự tinh tế cho không gian phòng khách còn là sản phẩm sofa đáng sở hữu bởi thiết kế và trải nghiệm sử dụng.'),
(4, 'Sofa 3 chỗ Osaka', 28000000, 0, 'pro_4.png', 1, 'Sofa 3 chỗ từ bộ sưu tập Osaka mang nét hiện đại và thơ mộng của Nhật Bản, tạo nên một không gian sống độc đáo đầy sang trọng. Sản phẩm có phần chân bằng inox màu gold chắc chắn, phần nệm được bọc vải và có thể tháo rời được. Sofa 3 chỗ Osaka mẫu 1 vải 29 không chỉ mang đến thiết kế tinh tế, sang trọng mà còn tạo cho người ngồi cảm giác thoải mái, dễ chịu.'),
(5, 'Sofa Jazz 3 chỗ hiện đại da cognac', 60000000, 0, 'pro_5.png', 1, 'Sofa Jazz 3 chỗ được bao bọc bởi lớp da bò cao cấp đem lại cảm giác mềm mại, êm ái, thư giãn tuyệt vời. Thiết kế hiện đại mang nét đẹp độc đáo từ hình khối thanh lịch, đường nét tinh tế là điểm cộng lớn nhất của sofa Jazz.'),
(6, 'Sofa Cabo 3 chỗ', 35000000, 20, 'pro_6.png', 1, 'Sofa Cabo được thiết kế kiểu dáng ba chỗ ngồi. Phần chân sofa sử dụng kim loại chắc chắn được sơn kết hợp 2 màu đen và gold tạo nên sự sang trọng, khung ghế được làm từ gỗ bọc vải cao cấp. Ghế sofa là lựa chọn thích hợp cho không gian phòng khách bởi kiểu dáng hiện đại và mềm mại.'),
(7, 'Sofa 3 chỗ PENNY – vải màu cam', 54000000, 10, 'pro_7.png', 1, 'Sự đơn giản, tinh tế, sang trọng và không kém phần nổi bật của chiếc Sofa mang dòng máu bất diệt Scandivian này với lần lượt các phiên bản màu từ tối tới sáng bật Pastel sẽ mang lại các sắc màu không thể lẫn vào đâu và đa dạng cho từng không gian sống nhà bạn. Thiết kế vuông vức, thanh mảnh nhẹ nhàng là sự pha trộn giữa vững chãi và nhẹ nhàng là tất cả những yếu tố thiết yếu hội tụ ở chiếc sofa này.'),
(8, 'Sofa Combo 3 chỗ da Bali', 60000000, 10, 'pro_8.png', 1, 'Sofa Combo 3 chỗ da Bali 520 màu nâu trầm là sự lựa chọn sáng suốt nhất của bạn cho không gian phòng khách thêm ấm áp và êm ái. Đây là mẫu sofa da với phần khung gỗ beech cùng đệm siêu đàn hồi, chân kim loại sơn đen và gold, bọc da tự nhiên rất sang trọng và bền đẹp, phù hợp với không gian tiếp khách sang trọng.'),
(9, 'Sofa Jazz 3 chỗ hiện đại da nâu', 60000000, 0, 'pro_9.png', 1, 'Sofa Jazz 3 chỗ được bao bọc bởi lớp da bò cao cấp đem lại cảm giác mềm mại, êm ái, thư giãn tuyệt vời. Thiết kế hiện đại mang nét đẹp độc đáo từ hình khối thanh lịch, đường nét tinh tế là điểm cộng lớn nhất của sofa Jazz.'),
(10, 'Sofa Jazz 2.5 chỗ hiện đại da cognac', 56000000, 20, 'pro_10.png', 1, 'Sofa Jazz 2.5 chổ được bao bọc bởi lớp da bò cao cấp đem lại cảm giác mềm mại, êm ái, thư giãn tuyệt vời. Thiết kế hiện đại mang nét đẹp độc đáo từ hình khối thanh lịch, đường nét tinh tế là điểm cộng lớn nhất của sofa Jazz.'),
(11, 'Ghế ăn Coastal', 5100000, 0, 'pro_11.png', 2, 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Ghế ăn Coastal với bốn chân gỗ chắc chắn, được bọc vải êm ái cùng thiết kế phù hợp với thể trạng người Việt. Tất cả những phần tiếp xúc với cơ thể đều mềm mại, thanh thoát. Ngôn ngữ thiết kế của Coastal kết hợp đường nét uyển chuyển và tự nhiên, chất vải xanh tươi mát mang màu sắc của biển cùng nét vững chãi, tông gỗ ấm áp tạo nên sự tương phản hài hòa tựa như biển rộng bí ẩn và đất liền thân thuộc.'),
(12, 'Ghế ăn Coastal vàng', 5100000, 10, 'pro_12.png', 2, 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Ghế ăn Coastal với bốn chân gỗ chắc chắn, được bọc vải êm ái cùng thiết kế phù hợp với thể trạng người Việt. Tất cả những phần tiếp xúc với cơ thể đều mềm mại, thanh thoát. Ngôn ngữ thiết kế của Coastal kết hợp đường nét uyển chuyển và tự nhiên, chất vải xanh tươi mát mang màu sắc của biển cùng nét vững chãi, tông gỗ ấm áp tạo nên sự tương phản hài hòa tựa như biển rộng bí ẩn và đất liền thân thuộc.'),
(13, 'Ghế ăn Coastal xanh', 5100000, 15, 'pro_13.png', 2, 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Ghế ăn Coastal với bốn chân gỗ chắc chắn, được bọc vải êm ái cùng thiết kế phù hợp với thể trạng người Việt. Tất cả những phần tiếp xúc với cơ thể đều mềm mại, thanh thoát. Ngôn ngữ thiết kế của Coastal kết hợp đường nét uyển chuyển và tự nhiên, chất vải xanh tươi mát mang màu sắc của biển cùng nét vững chãi, tông gỗ ấm áp tạo nên sự tương phản hài hòa tựa như biển rộng bí ẩn và đất liền thân thuộc.'),
(14, 'Ghế ăn Peak vải cam', 4800000, 0, 'pro_14.png', 2, 'Ghế ăn Peak là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc cam rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen sang trọng được xem là sự kết hợp hoàn hảo của thiết kế nắm bắt xu hướng, sở thích giới trẻ hiện nay.'),
(15, 'Ghế ăn Peak vải xanh', 4800000, 20, 'pro_15.png', 2, 'Ghế ăn Peak là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(16, 'Ghế ăn Rusty', 12000000, 0, 'pro_16.png', 2, 'Ghế ăn Rusty là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(17, 'Ghế ăn xoay Albert Kuip Taupe', 13000000, 0, 'pro_17.png', 2, 'Ghế ăn Albert Kuip Taupe là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(18, 'Ghế Gerda đen trắng', 5400000, 0, 'pro_18.png', 2, 'Ghế ăn Gerda là tâm điểm nội thất đáng chú ý bởi nó bao phủ xung quanh bằng lớp vải mang sắc xanh dương rực rỡ, nổi bật. Chân ghế sử dụng sắt sơn tĩnh điện màu đen thời thượng được xem là sự kết hợp hoàn hảo, một thiết kế nắm bắt xu hướng hiện nay.'),
(19, 'Ghế ăn không tay Elegance màu tự nhiên', 16000000, 10, 'pro_19.png', 2, 'Ghế Elegance được làm từ gỗ Tần bì Mỹ. Bề mặt ngồi được thiết kế tỉ mỉ với sự đan xen của những sợi dây thừng cao cấp nhập khẩu từ Đức. Với đặc điểm chống nước tốt cùng khả năng đàn hồi cao, sản phẩm hứa hẹn sẽ đem lại trải nghiệm thú vị cho người dùng. Phần lưng tựa uốn cong nhẹ nhàng cho người dùng một tư thế ngồi thoải mái. Ghế Elegance với thiết kế tối giản sẽ mang đến không gian ấm cúng và trang nhã.'),
(20, 'Ghế ăn không tay Elegance màu đen', 16000000, 10, 'pro_20.png', 2, 'Ghế Elegance được làm từ gỗ Tần bì Mỹ. Bề mặt ngồi được thiết kế tỉ mỉ với sự đan xen của những sợi dây thừng cao cấp nhập khẩu từ Đức. Với đặc điểm chống nước tốt cùng khả năng đàn hồi cao, sản phẩm hứa hẹn sẽ đem lại trải nghiệm thú vị cho người dùng. Phần lưng tựa uốn cong nhẹ nhàng cho người dùng một tư thế ngồi thoải mái. Ghế Elegance với thiết kế tối giản sẽ mang đến không gian ấm cúng và trang nhã.'),
(21, 'Giường Coastal KD1058-18 1m6', 29000000, 0, 'pro_21.png', 3, 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.'),
(22, 'Giường Coastal KD1058-18 1m8', 32000000, 0, 'pro_22.png', 3, 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.'),
(23, 'Giường Coastal vàng 1m6', 29000000, 0, 'pro_23.png', 3, 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.'),
(24, 'Giường Coastal vàng 1m8', 32000000, 0, 'pro_24.png', 3, 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.'),
(25, 'Giường Coastal xanh 1m6', 28900000, 0, 'pro_25.png', 3, 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.'),
(26, 'Giường Coastal xanh 1m8', 32000000, 0, 'pro_26.png', 3, 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.'),
(27, 'Giường Hộc Kéo Iris 1M6 Vải Belfast 41', 15000000, 10, 'pro_27.png', 3, 'Giường Hộc Kéo Iris 1M6 Vải Belfast 41 với tông màu xám trang nhã giúp không gian phòng ngủ thêm phần sang trọng và hiện đại. Khung gỗ MFC mang lại cảm giác chắc chắn cùng lớp vải bọc êm ái, cho người dùng trải nghiệm thư thái nhất. Với thiết kế 4 hộc kéo xung quanh giường, vừa tiết kiệm diện tích, lại vừa tiện dụng trong việc cất giữ đồ đạc. Nhờ vậy, không gian sống sẽ thông thoáng và gọn gàng hơn với thiết kế thông minh này.'),
(28, 'Giường Hộc Kéo Iris 1M8 Vải Belfast 41', 15000000, 0, 'pro_28.png', 3, 'Giường Hộc Kéo Iris 1M6 Vải Belfast 41 với tông màu xám trang nhã giúp không gian phòng ngủ thêm phần sang trọng và hiện đại. Khung gỗ MFC mang lại cảm giác chắc chắn cùng lớp vải bọc êm ái, cho người dùng trải nghiệm thư thái nhất. Với thiết kế 4 hộc kéo xung quanh giường, vừa tiết kiệm diện tích, lại vừa tiện dụng trong việc cất giữ đồ đạc. Nhờ vậy, không gian sống sẽ thông thoáng và gọn gàng hơn với thiết kế thông minh này.'),
(29, 'Giường Leman 1m8 vải VACT4328', 34000000, 0, 'pro_29.png', 3, 'Giường Leman với tông màu xám trang nhã giúp không gian phòng ngủ thêm phần sang trọng và hiện đại. Khung gỗ MFC mang lại cảm giác chắc chắn cùng lớp vải bọc êm ái, cho người dùng trải nghiệm thư thái nhất. Với thiết kế 4 hộc kéo xung quanh giường, vừa tiết kiệm diện tích, lại vừa tiện dụng trong việc cất giữ đồ đạc. Nhờ vậy, không gian sống sẽ thông thoáng và gọn gàng hơn với thiết kế thông minh này.'),
(30, 'Giường Leman 1m8 vải VACT7464', 33000000, 0, 'pro_30.png', 3, 'Giường Leman với tông màu xám trang nhã giúp không gian phòng ngủ thêm phần sang trọng và hiện đại. Khung gỗ MFC mang lại cảm giác chắc chắn cùng lớp vải bọc êm ái, cho người dùng trải nghiệm thư thái nhất. Với thiết kế 4 hộc kéo xung quanh giường, vừa tiết kiệm diện tích, lại vừa tiện dụng trong việc cất giữ đồ đạc. Nhờ vậy, không gian sống sẽ thông thoáng và gọn gàng hơn với thiết kế thông minh này.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
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
(12, 2, 'Linh Trần', 'Linh Trần', 'ádasdasd'),
(13, 20, 'Linh Trần', 'Linh Trần', 'ads'),
(14, 20, 'Linh Trần', 'Linh Trần', 'đc'),
(15, 20, 'Linh Trần', 'Linh Trần', 'a'),
(16, 20, 'Linh Trần', 'Linh Trần', 'ok'),
(17, 20, 'Linh Trần', 'Linh Trần', 'asd'),
(18, 20, 'Linh Trần', 'Linh Trần', 'asdasd'),
(19, 2, 'ád', 'ád', 'ád'),
(20, 19, 'Linh Trần', 'Linh Trần', 'tuyệt'),
(21, 19, 'Linh Trần', 'Linh Trần', 'ád');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
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
(6, 'Linh Trần', 'trlinh31', '12345', 'trlinh31.clone@gmail.com', '0979349098', 'Hà Nội'),
(8, 'sadsad', 'asdasd', '12345', 'asd@gmail.com', '0979349098', 'asdasd'),
(9, 'Nguyen Van E', 'lolicon', '123', 'loli@gmail.com', '0979349098', 'Hà Nội'),
(10, 'Linh', 'admin', '123', 'nguyentranlinh31@gmail.com', '0979349098', 'Hà Nội');

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
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders_detail` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
