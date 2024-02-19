-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2022 lúc 04:33 PM
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
-- Cơ sở dữ liệu: `shop_phone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `admin_name`) VALUES
(1, 'admin', '25b3ba6ee9a3215d8d2d854ac7f1f8a8', 'Xuân Lộc'),
(2, 'admin2', '25b3ba6ee9a3215d8d2d854ac7f1f8a8', 'Minh Tâm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_price` varchar(100) NOT NULL,
  `cart_image` varchar(100) NOT NULL,
  `cart_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_name`, `product_id`, `cart_price`, `cart_image`, `cart_quantity`) VALUES
(82, 'Asus Gaming ROG Flow Z13', 26, '46990000', 'asus-gaming-rog.jpg', 2),
(83, 'iPhone 11 128 GB', 24, '12990000', 'iphone-11.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(1, 'Apple'),
(2, 'Android'),
(3, 'Tablet'),
(4, 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_delivery` varchar(11) NOT NULL,
  `customer_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_address`, `customer_delivery`, `customer_note`) VALUES
(27, 'Xuân Lộc', '0915210719', 'txl.2601.ld@gmail.com', '25b3ba6ee9a3215d8d2d854ac7f1f8a8', 'Nguyen huu canh quan binh thanh', 'ATM', '2'),
(36, 'Thanh Thúy', '0945112267', 'thanhthuy1234@gmail.com', 'c808b5b2475f5475fe090733cad1ee10', 'Lâm Tuyền 2 Đơn Dương Lâm Đồng', 'Home', 'Gửi hàng sau 2 ngày nữa'),
(37, 'Minh Tú', 'Nguyendact', 'tunguyen@gmail.com', '44a44f44dee10dbf5855bd92a678fab5', '123', 'Home', '12312'),
(38, 'Minh Tâm', '0349522556', 'minhtam49@gmail.com', '25b3ba6ee9a3215d8d2d854ac7f1f8a8', 'Thành phố Đà Lạt', 'ATM', 'Gói hàng tặng sinh nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_newsfeed`
--

CREATE TABLE `tbl_newsfeed` (
  `newsfeed_id` int(11) NOT NULL,
  `newsfeed_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_newsfeed`
--

INSERT INTO `tbl_newsfeed` (`newsfeed_id`, `newsfeed_name`) VALUES
(11, 'Khuyến mãi'),
(14, 'Tin công nghệ'),
(15, 'Thị trường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(11) NOT NULL,
  `order_cancle` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `product_id`, `customer_id`, `order_quantity`, `order_code`, `order_date`, `order_status`, `order_cancle`) VALUES
(22, 5, 27, 2, '5555', '2022-06-06 15:48:26', 1, 0),
(25, 3, 30, 2, '9892', '2022-06-06 17:43:32', 1, 0),
(26, 6, 31, 2, '5244', '2022-06-07 03:51:14', 0, 0),
(27, 5, 32, 1, '7715', '2022-06-07 04:02:37', 0, 0),
(28, 3, 33, 1, '4388', '2022-06-07 04:45:24', 0, 0),
(29, 8, 33, 1, '4388', '2022-06-07 04:45:24', 0, 0),
(30, 4, 34, 1, '8641', '2022-06-07 05:03:08', 0, 0),
(31, 5, 34, 1, '8641', '2022-06-07 05:03:08', 0, 0),
(32, 8, 34, 1, '8641', '2022-06-07 05:03:08', 0, 0),
(33, 4, 35, 2, '6650', '2022-06-07 08:17:33', 0, 0),
(34, 1, 35, 1, '6650', '2022-06-07 08:17:33', 0, 0),
(35, 8, 35, 2, '6650', '2022-06-07 08:17:33', 0, 0),
(36, 5, 36, 1, '2749', '2022-06-07 08:19:49', 0, 0),
(37, 8, 36, 1, '2749', '2022-06-07 08:19:49', 0, 0),
(38, 4, 37, 6, '3109', '2022-06-24 17:22:24', 1, 0),
(39, 1, 37, 1, '3109', '2022-06-24 17:22:24', 1, 0),
(40, 4, 38, 1, '6323', '2022-06-24 20:45:19', 1, 2),
(41, 23, 38, 1, '9030', '2022-06-28 15:41:37', 1, 2),
(42, 6, 38, 2, '2406', '2022-06-24 20:51:34', 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_image` varchar(50) NOT NULL,
  `post_image_detail` varchar(50) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `post_summary` text NOT NULL,
  `post_content` text NOT NULL,
  `newsfeed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_image`, `post_image_detail`, `post_name`, `post_summary`, `post_content`, `newsfeed_id`) VALUES
(3, 'new3.jpg', 'new4.jpg', 'Flash Sale Xả Kho ngày 18/6: MacBook, iPhone và Apple Watch đang giảm giá “cực gắt”, đừng bỏ lỡ!!!', '', 'Mức giá Flash sale: 390,000đ</br>\r\nCowin Ky02 là một trong những mẫu tai nghe true wireless giá rẻ chất lượng, đáng để người dùng quan tâm. Sản phẩm này có thiết kế nhỏ gọn, đi kèm 3 mút silicone dẻo nhờ đó có thể sử dụng phù hợp cho nhiều kích cỡ tai khác nhau. Hơn nữa mút silicone mềm này không chỉ giúp người dùng thoải mái khi sử dụng tai nghe trong thời gian dài mà còn giúp cố định tai nghe không bị xê dịch trong quá trình sử dụng.>>>', 7),
(4, 'new3.jpg', 'new4.jpg', 'Flash Sale Xả Kho ngày 18/6: MacBook, iPhone và Apple Watch đang giảm giá “cực gắt”, đừng bỏ lỡ!!!', 'Nếu đang có ý định “tậu” cho mình một món đồ công nghệ thì đây là cơ hội để bạn “chốt” đơn với giá rẻ bất ngờ. Theo đó, Mito Store đang có đợt flash sale xả kho giảm giá “cực gắt” nhiều sản phẩm mà bạn không nên bỏ qua.', 'Tai nghe không dây Cowin Ky02\r\nTai nghe không dây Xiaomi Earphones 2 Basic\r\nMacBook Pro 13 inch M1 256GB\r\niPhone 12 64GB\r\niPhone 13 Pro Max 128GB\r\nApple Watch SE 40 mm (GPS)', 9),
(5, '', '', '', '', '', 8),
(6, 'new3.jpg', 'new4.jpg', 'Flash Sale Xả Kho ngày 18/6: MacBook, iPhone và Apple Watch đang giảm giá “cực gắt”, đừng bỏ lỡ!!!', 'Nếu đang có ý định “tậu” cho mình một món đồ công nghệ thì đây là cơ hội để bạn “chốt” đơn với giá rẻ bất ngờ. Theo đó, CellphoneS đang có đợt flash sale xả kho giảm giá “cực gắt” nhiều sản phẩm mà bạn không nên bỏ qua.', 'Cowin Ky02 là một trong những mẫu tai nghe true wireless giá rẻ chất lượng, đáng để người dùng quan tâm. Sản phẩm này có thiết kế nhỏ gọn, đi kèm 3 mút silicone dẻo nhờ đó có thể sử dụng phù hợp cho nhiều kích cỡ tai khác nhau. Hơn nữa mút silicone mềm này không chỉ giúp người dùng thoải mái khi sử dụng tai nghe trong thời gian dài mà còn giúp cố định tai nghe không bị xê dịch trong quá trình sử dụng.', 10),
(7, 'new3.jpg', 'new4.jpg', 'Flash Sale Xả Kho ngày 18/6: MacBook, iPhone và Apple Watch đang giảm giá “cực gắt”, đừng bỏ lỡ!!!', 'Nếu đang có ý định “tậu” cho mình một món đồ công nghệ thì đây là cơ hội để bạn “chốt” đơn với giá rẻ bất ngờ. Theo đó, Store đang có đợt flash sale xả kho giảm giá “cực gắt” nhiều sản phẩm mà bạn không nên bỏ qua.', 'Nếu bạn đang tìm kiếm một chiếc laptop để làm việc cũng như giải trí thì MacBook Pro 13 inch M1 là một lựa chọn tuyệt vời dành cho bạn. Máy tính xách tay này sở hữu thiết kế nhôm nguyên khối tương tự với người tiền nhiệm, quen thuộc với logo Táo khuyết ở giữa mặt lưng. Máy có độ hoàn thiện cao với những đường nét được cắt tinh xảo, giúp mang đến vẻ đẹp cao cấp, sang trọng.\r\n\r\nMacBook Pro 13 inch M1 còn sở hữu màn hình Retina, tích hợp công nghệ True Tone cân bằng trắng tự động, mang đến chất lượng hình ảnh hiển thị trên màn hình chân thật, rõ nét và sống động. Bên trong, máy sử dụng bộ vi xử lý M1 mạnh mẽ do Apple tự thiết kế mang lại khả năng xử lý đa tác vụ và đồ họa mạnh mẽ, mượt mà. Ngoài ra, hệ điều hành macOS cũng giúp tối ưu hóa và đơn giản hóa giao diện người dùng, đem đến trải nghiệm tuyệt vời hơn so với các thế hệ tiền nhiệm.', 11),
(8, 'galaxy-z-fold-gia-re-face.jpeg', 'galaxy-z-fold-gia-re-face.jpeg', 'Samsung có thể ra mắt điện thoại màn hình gập giá dưới 800 USD vào năm 2024', 'Ở thời điểm hiện tại, Samsung đang dẫn đầu phân khúc smartphone màn hình gập với bộ đôi Galaxy Z Fold3 và Z Fold3 cực kỳ chất lượng.', 'Hiện tại, các báo cáo xuất hiện thời gian qua cho thấy công ty Hàn Quốc này đang làm việc để chuẩn bị ra mắt Galaxy Z Fold4 và Z Flip4 vào tháng 8 tới. Ngoài ra, có vẻ như Samsung cũng sẽ sớm phát hành một chiếc smartphone màn hình gập giá rẻ trong thời gian tới. </br>\r\nĐiện thoại màn hình gập giá rẻ nhất của Samsung hiện tại cũng có giá lên tới 999 USD. Đây là mức giá mà hầu hết người dùng phổ thông không thể tiếp cận được. Chính vì vậy mà một báo cáo mới cho biết công ty Hàn Quốc này đang phát triển thiết bị màn hình gập có giá dưới 800 USD để dễ tiếp cận với người dùng hơn. Tuy nhiên, sản phẩm này sẽ chỉ xuất hiện vào năm 2024. </br>\r\n\r\nTheo trang Sammobiles, có vẻ như sản phẩm mới này sẽ thuộc dòng Galaxy A tầm trung của hãng. Chúng ta đã đã nghe về điều này trước đây. Cụ thể, một tin đồn vào đầu tuần này đã dự đoán rằng một chiếc điện thoại thông minh Galaxy A có thể gập lại có thể ra mắt vào năm 2025. </br>', 1),
(9, 'galaxy-z-fold-gia-re-face.jpeg', 'galaxy-z-fold-gia-re-face.jpeg', 'Samsung có thể ra mắt điện thoại màn hình gập giá dưới 800 USD vào năm 2024', 'Ở thời điểm hiện tại, Samsung đang dẫn đầu phân khúc smartphone màn hình gập với bộ đôi Galaxy Z Fold3 và Z Fold3 cực kỳ chất lượng.', 'Hiện tại, các báo cáo xuất hiện thời gian qua cho thấy công ty Hàn Quốc này đang làm việc để chuẩn bị ra mắt Galaxy Z Fold4 và Z Flip4 vào tháng 8 tới. Ngoài ra, có vẻ như Samsung cũng sẽ sớm phát hành một chiếc smartphone màn hình gập giá rẻ trong thời gian tới. </br>\r\nĐiện thoại màn hình gập giá rẻ nhất của Samsung hiện tại cũng có giá lên tới 999 USD. Đây là mức giá mà hầu hết người dùng phổ thông không thể tiếp cận được. Chính vì vậy mà một báo cáo mới cho biết công ty Hàn Quốc này đang phát triển thiết bị màn hình gập có giá dưới 800 USD để dễ tiếp cận với người dùng hơn. Tuy nhiên, sản phẩm này sẽ chỉ xuất hiện vào năm 2024. </br>\r\n\r\nTheo trang Sammobiles, có vẻ như sản phẩm mới này sẽ thuộc dòng Galaxy A tầm trung của hãng. Chúng ta đã đã nghe về điều này trước đây. Cụ thể, một tin đồn vào đầu tuần này đã dự đoán rằng một chiếc điện thoại thông minh Galaxy A có thể gập lại có thể ra mắt vào năm 2025. </br>', 1),
(10, 'iphone-13-mini.jpg', 'galaxy-z-fold-gia-re-face.jpeg', 'Samsung có thể ra mắt điện thoại màn hình gập giá dưới 800 USD vào năm 2024', 'Ở thời điểm hiện tại, Samsung đang dẫn đầu phân khúc smartphone màn hình gập với bộ đôi Galaxy Z Fold3 và Z Fold3 cực kỳ chất lượng.', 'Hiện tại, các báo cáo xuất hiện thời gian qua cho thấy công ty Hàn Quốc này đang làm việc để chuẩn bị ra mắt Galaxy Z Fold4 và Z Flip4 vào tháng 8 tới. Ngoài ra, có vẻ như Samsung cũng sẽ sớm phát hành một chiếc smartphone màn hình gập giá rẻ trong thời gian tới. </br>\r\nĐiện thoại màn hình gập giá rẻ nhất của Samsung hiện tại cũng có giá lên tới 999 USD. Đây là mức giá mà hầu hết người dùng phổ thông không thể tiếp cận được. Chính vì vậy mà một báo cáo mới cho biết công ty Hàn Quốc này đang phát triển thiết bị màn hình gập có giá dưới 800 USD để dễ tiếp cận với người dùng hơn. Tuy nhiên, sản phẩm này sẽ chỉ xuất hiện vào năm 2024. </br>\r\n\r\nTheo trang Sammobiles, có vẻ như sản phẩm mới này sẽ thuộc dòng Galaxy A tầm trung của hãng. Chúng ta đã đã nghe về điều này trước đây. Cụ thể, một tin đồn vào đầu tuần này đã dự đoán rằng một chiếc điện thoại thông minh Galaxy A có thể gập lại có thể ra mắt vào năm 2025.', 12),
(11, 'thitruong1.jpeg', 'new1.jpg', 'Apple sẽ ra mắt iPhone 14 Plus vào tháng 9 năm nay', 'Không phải iPhone 14 Max, phiên bản iPhone 14 “giá rẻ” với màn hình 6.7 inch sẽ được Apple ra mắt dưới tên gọi iPhone 14 Plus.', 'Apple được cho là sẽ khai thử phiên bản Mini trong dòng sản phẩm iPhone 14 ra mắt vào tháng 9 năm nay. Thay vào đó, công ty sẽ trình làng một phiên bản iPhone mới với màn hình 6.7 inch tương tự như iPhone 14 Pro Max, nhưng đi kèm mức giá hấp dẫn hơn nhờ việc cắt giảm một vài tính năng như màn hình 120Hz. </br>\r\nApple đã không còn sử dụng hậu tố “Plus” kể từ khi ra mắt iPhone 8 Plus vào 5 năm trước. Với việc đặt tên cho sản phẩm là iPhone 14 Plus, người dùng có thể dễ dàng hiểu rằng đây chỉ đơn giản là một chiếc iPhone 14 với màn hình lớn hơn. Trong khi đó, hậu tố “Max” có thể khiến nhiều người nhầm lẫn với dòng iPhone 14 Pro cao cấp. </br>\r\n\r\nNăm nay, Apple được cho là sẽ tạo ra sự khác biệt rõ rệt giữa dòng iPhone thường với dòng “Pro” không chỉ ở màn hình và camera tốt hơn, mà còn ở bộ xử lý mạnh mẽ hơn. Do đó, việc đặt tên để dễ dàng phân biệt giữa iPhone 14 (6.1 inch) và iPhone 14 Plus (6.7 inch) với hai model cao cấp hơn là iPhone 14 Pro (6.1 inch) và iPhone 14 Pro Max (6.7 inch) thực sự rất cần thiết.', 2),
(12, 'Apple-Watch-low-power-face.jpeg', '', 'Apple Watch Series 8 được đồn đại sẽ có chế độ nguồn điện thấp mới', 'Trước thềm sự kiện WWDC 2022, nhà báo Mark Gurman của Bloomberg đã từng báo cáo dựa trên các nguồn tin của riêng mình rằng, Apple đang làm việc trên chế độ nguồn điện thấp mới cho watchOS 9.', 'Trong bản tin Power On mới nhất của mình, Gurman tiết lộ rằng anh ấy vẫn mong đợi một chế độ nguồn điện thấp mới sẽ được Apple ra mắt vào cuối năm nay. Tuy nhiên, thay vì là một tính năng của watchOS 9, nó dự kiến ​​sẽ được công bố như một trong những tính năng mới của Apple Watch Series 8 – có thể sẽ được giới thiệu vào cuối năm nay.</br>\r\n\r\nCác mẫu Apple Watch hiện tại đã có một tính năng gọi là “Chế độ dự trữ năng lượng”. Tuy nhiên, khi kích hoạt chế độ này thì nó tắt khá nhiều tính năng của Apple Watch. Mặc dù điều này khá hữu ích trong các trường hợp khẩn cấp, nhưng người dùng được yêu cầu khởi động lại Apple Watch để truy cập các ứng dụng và các chức năng khác. </br>\r\n\r\nTheo báo cáo ban đầu của Gurman, chế độ nguồn điện thấp mới sẽ cho phép người dùng tiếp tục sử dụng các ứng dụng và tính năng của Apple Watch mà không tiêu hao quá nhiều năng lượng. Nó sẽ hoạt động tương tự như chế độ nguồn điện thấp đã có trong iOS và macOS, về cơ bản sẽ tạm dừng các hoạt động nền và giảm hiệu suất thiết bị để tiết kiệm pin.', 13),
(13, 'Apple-Watch-low-power-face.jpeg', 'Apple-Watch-low-power-face.jpeg', 'Apple Watch Series 8 được đồn đại sẽ có chế độ nguồn điện thấp mới', 'Trước thềm sự kiện WWDC 2022, nhà báo Mark Gurman của Bloomberg đã từng báo cáo dựa trên các nguồn tin của riêng mình rằng, Apple đang làm việc trên chế độ nguồn điện thấp mới cho watchOS 9.', 'Trong bản tin Power On mới nhất của mình, Gurman tiết lộ rằng anh ấy vẫn mong đợi một chế độ nguồn điện thấp mới sẽ được Apple ra mắt vào cuối năm nay. Tuy nhiên, thay vì là một tính năng của watchOS 9, nó dự kiến ​​sẽ được công bố như một trong những tính năng mới của Apple Watch Series 8 – có thể sẽ được giới thiệu vào cuối năm nay.</br>\r\n\r\nCác mẫu Apple Watch hiện tại đã có một tính năng gọi là “Chế độ dự trữ năng lượng”. Tuy nhiên, khi kích hoạt chế độ này thì nó tắt khá nhiều tính năng của Apple Watch. Mặc dù điều này khá hữu ích trong các trường hợp khẩn cấp, nhưng người dùng được yêu cầu khởi động lại Apple Watch để truy cập các ứng dụng và các chức năng khác. </br>\r\n\r\nTheo báo cáo ban đầu của Gurman, chế độ nguồn điện thấp mới sẽ cho phép người dùng tiếp tục sử dụng các ứng dụng và tính năng của Apple Watch mà không tiêu hao quá nhiều năng lượng. Nó sẽ hoạt động tương tự như chế độ nguồn điện thấp đã có trong iOS và macOS, về cơ bản sẽ tạm dừng các hoạt động nền và giảm hiệu suất thiết bị để tiết kiệm pin.', 14),
(14, 'galaxy-z-fold-gia-re-face.jpeg', 'galaxy-z-fold-gia-re-face.jpeg', 'Samsung có thể ra mắt điện thoại màn hình gập giá dưới 800 USD vào năm 2024', 'Ở thời điểm hiện tại, Samsung đang dẫn đầu phân khúc smartphone màn hình gập với bộ đôi Galaxy Z Fold3 và Z Fold3 cực kỳ chất lượng.', 'Hiện tại, các báo cáo xuất hiện thời gian qua cho thấy công ty Hàn Quốc này đang làm việc để chuẩn bị ra mắt Galaxy Z Fold4 và Z Flip4 vào tháng 8 tới. Ngoài ra, có vẻ như Samsung cũng sẽ sớm phát hành một chiếc smartphone màn hình gập giá rẻ trong thời gian tới.</br>\r\nĐiện thoại màn hình gập giá rẻ nhất của Samsung hiện tại cũng có giá lên tới 999 USD. Đây là mức giá mà hầu hết người dùng phổ thông không thể tiếp cận được. Chính vì vậy mà một báo cáo mới cho biết công ty Hàn Quốc này đang phát triển thiết bị màn hình gập có giá dưới 800 USD để dễ tiếp cận với người dùng hơn. Tuy nhiên, sản phẩm này sẽ chỉ xuất hiện vào năm 2024.</br>\r\nTheo trang Sammobiles, có vẻ như sản phẩm mới này sẽ thuộc dòng Galaxy A tầm trung của hãng. Chúng ta đã đã nghe về điều này trước đây. Cụ thể, một tin đồn vào đầu tuần này đã dự đoán rằng một chiếc điện thoại thông minh Galaxy A có thể gập lại có thể ra mắt vào năm 2025.', 14),
(16, 'con-chip-dimensity-9000-cua-mediatek-2.png', 'con-chip-dimensity-9000-cua-mediatek-2.png', 'MediaTek đã tìm ra công thức vượt mặt Qualcomm với con chip mới, sẵn sàng “đánh bật gốc” đối thủ Snapdragon 8+ Gen 1', 'MediaTek tự tin rằng con chip mới của mình đủ mạnh mẽ để hạ gục đối thủ Snapdragon 8 Gen 1 “xưng vương” bấy lâu nay.', 'Mới đây, thương hiệu sản xuất chip đến từ Đài Loan – MediaTek đã giới thiệu con chip mới dành cho các điện thoại thông minh đầu bản có tên gọi Dimensity 9000+. Đây là một bản nâng cấp so với con chip flagship Dimensity 9000 trước đó được ra mắt vào tháng 11 năm ngoái. Tương tự như con chip trên, Dimensity 9000+ chỉ dành cho các dòng điện thoại cao cấp của các hãng. </br>\r\nMột trong những thay đổi quan trọng nhất là nâng cấp lên lõi chính Cortex-X2 của CPU chạy với tốc độ 3.2 GHz trong Dimensity 9000 Pro, tăng từ 3.05 GHz trong Dimensity 9000 trước đó. Mặc dù bảy lõi CPU còn lại không nhận được sự thay đổi so với trước nhưng vẫn mang đến hiệu suất tổng thể được cải thiện tăng lên khoảng 5%. </br>\r\n\r\nTrên thực tế, con chip mới của MediaTek được nâng cấp vẫn sử dụng chip Mali-G710 nhưng hãng này cho biết họ đã thực hiện các tinh chỉnh sâu bên trong để tăng hiệu suất đồ họa lên tới 10% so với trước đó. </br>\r\n\r\n\r\n\r\nMặc dù những thông tin trên nghe có vẻ không quá ấn tượng về sức mạnh nhưng chúng đủ sức giúp Dimensity 9000+ cạnh tranh trực tiếp với Snapdragon 8+ Gen 1 của đối thủ “truyền kiếp” đến từ nhà Qualcomm được công bố chính thức cách đây khoảng một tháng. Con chip Snapdragon 8+ Gen 1 cũng được nâng cấp lên tốc độ xung nhịp 3.2 GHz trên chính lõi CPU của nó, điều đó giúp tăng GPU lên thêm 10% cùng với một số cải thiến về hiệu suất của con chip này. </br>\r\n\r\nVẫn là câu hỏi cũ được đặt ra như mọi khi, con chip Dimensity 9000+ liệu sẽ được cung cấp cho các hãng điện thoại nào trong khi trước đó, Qualcomm đã công bố Snapdragon 8+ Gen 1 của mình sẽ có mặt trên các mẫu điện thoại cao cấp của Asus, OnePlus, Xiaomi,… Thông thường, MediaTek sẽ đợi thêm một vài tuần để công bố các đối tác OEM, vì vậy có thể chưa hãng điện thoại hoặc nhà sản xuất nào xác nhận mặc dù thương hiệu này rất “mạnh miệng” tuyên bố con chip trên sẽ có mặt trên các thiết bị cầm tay vào quý 3 năm 2022 (khoảng thời gian từ tháng 7 đến tháng 9 năm 2022).', 2),
(17, 'con-chip-dimensity-9000-cua-mediatek-2.png', 'con-chip-dimensity-9000-cua-mediatek-2.png', 'MediaTek đã tìm ra công thức vượt mặt Qualcomm với con chip mới, sẵn sàng “đánh bật gốc” đối thủ Snapdragon 8+ Gen 1', 'MediaTek tự tin rằng con chip mới của mình đủ mạnh mẽ để hạ gục đối thủ Snapdragon 8 Gen 1 “xưng vương” bấy lâu nay.', 'Một trong những thay đổi quan trọng nhất là nâng cấp lên lõi chính Cortex-X2 của CPU chạy với tốc độ 3.2 GHz trong Dimensity 9000 Pro, tăng từ 3.05 GHz trong Dimensity 9000 trước đó. Mặc dù bảy lõi CPU còn lại không nhận được sự thay đổi so với trước nhưng vẫn mang đến hiệu suất tổng thể được cải thiện tăng lên khoảng 5%. </br>\r\n\r\nTrên thực tế, con chip mới của MediaTek được nâng cấp vẫn sử dụng chip Mali-G710 nhưng hãng này cho biết họ đã thực hiện các tinh chỉnh sâu bên trong để tăng hiệu suất đồ họa lên tới 10% so với trước đó. </br>\r\n\r\n\r\n\r\nMặc dù những thông tin trên nghe có vẻ không quá ấn tượng về sức mạnh nhưng chúng đủ sức giúp Dimensity 9000+ cạnh tranh trực tiếp với Snapdragon 8+ Gen 1 của đối thủ “truyền kiếp” đến từ nhà Qualcomm được công bố chính thức cách đây khoảng một tháng. Con chip Snapdragon 8+ Gen 1 cũng được nâng cấp lên tốc độ xung nhịp 3.2 GHz trên chính lõi CPU của nó, điều đó giúp tăng GPU lên thêm 10% cùng với một số cải thiến về hiệu suất của con chip này. </br>\r\n\r\nVẫn là câu hỏi cũ được đặt ra như mọi khi, con chip Dimensity 9000+ liệu sẽ được cung cấp cho các hãng điện thoại nào trong khi trước đó, Qualcomm đã công bố Snapdragon 8+ Gen 1 của mình sẽ có mặt trên các mẫu điện thoại cao cấp của Asus, OnePlus, Xiaomi,… Thông thường, MediaTek sẽ đợi thêm một vài tuần để công bố các đối tác OEM, vì vậy có thể chưa hãng điện thoại hoặc nhà sản xuất nào xác nhận mặc dù thương hiệu này rất “mạnh miệng” tuyên bố con chip trên sẽ có mặt trên các thiết bị cầm tay vào quý 3 năm 2022 (khoảng thời gian từ tháng 7 đến tháng 9 năm 2022).', 15),
(19, 'ipad-la-con-roi-cua-apple-2.png', 'ipad-la-con-roi-cua-apple-4.png', 'Chẳng giống iPhone và Macbook, iPad vẫn không phải là “đứa con cưng” của Apple hiện nay', 'iPad đôi khi vẫn là sự cân nhắc trong chiến lược kinh doanh của Apple hiện tại và kể cả trong tương lai.', 'Mặc dù có những ưu điểm vượt bậc hơn so với iPhone nhưng dường như Apple không biết cách làm cho iPad khác biệt ngoại trừ việc cung cấp nhiều không gian hiển thị hơn. Chính vì vậy, từ thuở sơ khai Apple gần như “biến” iPad thành một thiết bị đọc sách điện tử thông thường. </br>\r\n\r\nSự phát triển của iPad chưa thực sự được chú tâm và vượt trội khi các yêu cầu của khách hàng được đáp ứng một cách chậm chạp. Chẳng hạn như đa nhiệm cửa sổ chỉ mới được ra mắt vào năm 2015 hoặc hỗ trợ chuột và bàn phím vào năm 2020. Tương tự như Widget của iPhone đã xuất hiện từ iOS 13 vào năm 2019 nhưng tận iPadOS 14 ra mắt năm 2020 vẫn chưa có những tính năng này. </br>\r\n\r\n<b>Nhiều vấn đề phát sinh từ người dùng </b></br>\r\nTheo chính sách truyền thông của Apple, “ông trùm” công nghệ này luôn giới thiệu iPad như một sự lựa chọn thay thế cho laptop và luôn nâng cao, đẩy mạnh về hiệu suất của dòng máy này. Vào năm 2017, Apple đã từng có một quảng cáo để so sánh iPad với các dòng máy tính Window với câu “What’s a computer?”. Tuy nhiên sau đó, vì một số lý do mà Apple đã gỡ đoạn video trên. </br>\r\n\r\nRõ ràng, điều mà Apple còn thiếu là iPad không bao giờ có thể thay thế được một chiếc máy tính xách tay hoàn toàn cho đến khi nó có thể làm được những thứ như một chiếc máy tính xách tay có thể làm. Điều đó đồng nghĩa với việc các lập trình viên có thể viết và biên dịch mã hoàn toàn trên iPad mà không cần chuyển sang các dịch vụ đám mây như hiện nay.', 15),
(21, 'demo2.jpg', 'demo1.png', 'Mở đặt trước Macbook Pro M2 2022 với nhiều ưu đãi khủng, trợ giá thêm 1 triệu khi lên đời', 'Tin vui cho các iFans nhà táo khuyết khi MitoStore đã có chương trình mở đặt hàng cho dòng sản phẩm Macbook Pro M2 2022 trong thời gian tới với nhiều chương trình ưu đãi vô cùng hấp dẫn!!!', 'Từ ngày 18/06 – 15/07/2022, MitoStore  mở đặt trước Macbook Pro M2 2022 với nhiều khuyến mãi giảm giá 10-20% và trợ giá lên đời cho sản phẩm cũ lên đến 1 triệu đồng dành cho khách hàng đăng ký đặt trước loạt sản phẩm. </br>\r\nNhững chiếc laptop đến từ nhà Táo khuyết từ lâu đã trở thành tiêu chuẩn cho sự tinh tế, sang trọng trong thiết kế, cùng với hiệu năng cực khủng và không ngừng được nâng cấp.\r\nMới đây, tại sự kiện WWDC 22, Apple lại một lần nữa làm người hâm mộ nức lòng khi cho ra mắt hai dòng laptop sử dụng vi xử lý thế hệ M2 mới là Macbook Air M2 và Macbook Pro M2. </br>\r\nSử dụng công nghệ chip M2 là sự cải tiến tuyệt vời về mọi mặt so với M1 nhờ 8 nhân CPU cộng với 10 nhân GPU. Qua các bài test ứng dụng chỉnh sửa ảnh và video chuyên nghiệp chứng minh Macbook Pro M2 có khả năng xử lý nhanh hơn 40% so với thế hệ trước. Các tựa game nặng như Baldur’s Gate 3 hay Ghost of Tsushima cũng không hề làm khó được con chip M2. </br>\r\n<b> Thời gian đặt hàng: </b> Từ ngày 18/06 – 15/07/2022</br>\r\n<b> Giá chính thức: </b ></br>\r\n<i>\r\nMacbook Pro 13 M2 8GB 256GB 2022: 35,990,000đ</br>\r\nMacbook Pro 13 M2 8GB 512GB 2022: 41,990,000đ</br>\r\nMacbook Pro 13 M2 16GB 256GB 2022: 41,990,000đ</br>\r\nMacbook Pro 13 M2 16GB 512GB 2022: 46,990,000đ</br>\r\n</i>\r\n<b> Ưu đãi dành cho khách hàng đặt trước: </b></br>\r\n<i>\r\nGiảm thẳng 2,000,000 đồng</br>\r\nTrợ giá thêm 1,000,000đ khi tham gia thu cũ đổi mới</br>\r\nƯu đãi thanh toán online/ngân hàng lên đến 2,000,000 đồng</br>\r\n</i>\r\n', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_detail` text NOT NULL,
  `product_decribe` text NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_sales` varchar(100) NOT NULL,
  `product_active` int(11) NOT NULL,
  `product_hot` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cartegory_id`, `product_name`, `product_detail`, `product_decribe`, `product_price`, `product_sales`, `product_active`, `product_hot`, `product_amount`, `product_image`) VALUES
(1, 1, 'iPhone 13 Pro Max', 'Màn hình:  OLED 6.7\"Super Retina XDR </br>\r\nHệ điều hành:  iOS 15 </br>\r\nCamera sau:  3 camera 12 MP </br>\r\nCamera trước:  12 MP </br>\r\nChip:  Apple A15 Bionic </br>\r\nRAM:  6 GB </br>\r\nBộ nhớ trong:  128 GB </br>\r\nSIM:  1 Nano SIM & 1 eSIM Hỗ trợ 5G </br>\r\nPin, Sạc:  4352 mAh20 W\r\n', 'Điện thoại<b> iPhone 13 Pro Max 128 GB - </b>siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.', '33990000', '29990000', 1, 0, 10, 'iPhone13PRM.jpg'),
(2, 2, 'Samsung Z Flip3', 'Màn hình: Dynamic AMOLED 2XChính 6.7\" & Phụ 1.9\"Full HD+</br>\r\nHệ điều hành: Android 11</br>\r\nCamera sau: 2 camera 12 MP</br>\r\nCamera trước: 10 MP</br>\r\nChip: Snapdragon 888</br>\r\nRAM: 8 GB</br>\r\nBộ nhớ trong: 128 GB</br>\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G</br>\r\nPin, Sạc: 3300 mAh15 W\r\n\r\n', '<b>Samsung Galaxy Z Flip3 5G 128GB Flex Your Way </b>- được cho ra mắt với một ngoại hình cuốn hút về kiểu thiết kế màn hình gập và một bộ cấu hình mạnh mẽ, hứa hẹn mang đến những thói quen sử dụng điện thoại mới mẻ hơn cho người dùng hay xử lý các công việc hàng ngày một cách nhanh chóng.', '24990000', '19990000', 1, 0, 10, 'samsung-galaxy-z-flip-3-black.jpg'),
(3, 4, 'Acer Nitro 5 AN515', 'CPU: i511400H2.7GHz</br>\r\nRAM: 8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz</br>\r\nỔ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1TB)</br>\r\nMàn hình: 15.6\"Full HD (1920 x 1080)144Hz</br>\r\nCard màn hình: Card rời RTX 3060 6GB</br>\r\nCổng kết nối: 3 x USB 3.2 HDMI Jack tai nghe 3.5 mmLAN (RJ45) USB Type-C</br>\r\nĐặc biệt: Có đèn bàn phím</br>\r\nHệ điều hành: Windows 10 Home SL</br>\r\nThiết kế: Vỏ nhựa</br>\r\nKích thước, trọng lượng: Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg', 'Laptop <b> Acer Nitro 5 Gaming AN515 57 5831 i5 (NH.QDGSV.003)</b> là thế hệ laptop gaming mới của nhà Acer có nhiều thay đổi trong thiết kế. Hiệu năng vẫn giữ vững phong độ, tự tin mang đến cho game thủ trải nghiệm chơi game cực đã.', '32990000', '28990000', 1, 1, 10, 'acer-nitro-5-gaming-an515-57-5831-i5.jpg'),
(4, 1, 'iPhone 12 Mini', '- Màn hình: OLED 5.4\"Super Retina XDR </br>\r\n- Hệ điều hành: iOS 15 </br>\r\n- Camera sau: 2 camera 12 MP </br>\r\n- Camera trước: 12 MP </br>\r\n- Chip: Apple A14 Bionic </br>\r\n- RAM: 4 GB </br>\r\n- Bộ nhớ trong: 128 GB </br>\r\n- SIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G </br>\r\n- Pin, Sạc: 2227 mAh20 W.', 'Tại sự kiện mới đây, Apple vừa công bố sản phẩm <b> iPhone 12 mini Tím 128 GB </b>. Smartphone trở nên đặc biệt trong sắc màu vô cùng hot, màu tím khoai môn nhẹ nhàng và tinh tế có thể làm bạn xao xuyến ngay từ những ảnh nhìn đầu tiên.', '24990000', '21990000', 1, 0, 10, 'iphone-12-mini-mau-tim-3.jpg'),
(5, 2, 'Oppo Find X5', 'Màn hình: AMOLED6.7\"Quad HD+ (2K+)</br>\r\nHệ điều hành: Android 12</br>\r\nCamera sau: Chính 50 MP & Phụ 50 MP, 13 MP</br>\r\nCamera trước: 32 MP</br>\r\nChip: Snapdragon 8 Gen 1 8 nhân</br>\r\nRAM: 12 GB</br>\r\nBộ nhớ trong: 256 GB</br>\r\nSIM: 2 Nano SIM hoặc 1 Nano SIM + 1 eSIM Hỗ trợ 5G</br>\r\nPin, Sạc: 5000 mAh, 80 W\r\n', '<b>OPPO Find X5 Pro 5G </b>có lẽ là cái tên sáng giá được xướng tên trong danh sách điện thoại có thiết kế ấn tượng trong năm 2022, khi máy được hãng cho ra mắt với một diện mạo độc lạ chưa từng có, cùng với đó là những nâng cấp về chất lượng ở camera nhờ sự hợp tác với nhà sản xuất máy ảnh Hasselblad. ', '32990000', '30990000', 1, 1, 10, 'oppo-find-x5-pro-den-thumb.jpg'),
(6, 4, 'Macbook Air M1 2020', 'CPU: Apple M1</br>\r\nRAM: 16 GB</br>\r\nỔ cứng: 512 GB SSD</br>\r\nMàn hình: 13.3\"Retina (2560 x 1600)</br>\r\nCard màn hình: Card tích hợp8 nhân GPU</br>\r\nCổng kết nối: 2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm</br>\r\nĐặc biệt: Có đèn bàn phím</br>\r\nHệ điều hành: Mac OS</br>\r\nThiết kế: Vỏ kim loại nguyên khối</br>\r\nKích thước, trọng lượng: Dài 304.1 mm - Rộng 212.4 mm - Dày 4.1 mm đến 16.1 mm - Nặng 1.29 kg\r\n', '<b>Apple MacBook Air M1 2020 </b> với vẻ ngoài hiện đại cùng cấu hình mạnh mẽ vượt trội đến từ con chip M1 được sản xuất trên quy trình tân tiến, là người bạn đồng hành lý tưởng cho bất kỳ ai trong cả những công việc văn phòng hay thiết kế đồ họa.', '39990000', '35990000', 1, 0, 10, 'macbook-air-m1-2020-gray-600x600.jpg'),
(7, 3, 'Samsung Tab A7', 'Màn hình: 8.7\"TFT LCD</br>\r\nHệ điều hành: Android 11</br>\r\nChip: MediaTek MT8768T 8 nhân</br>\r\nRAM: 3 GB</br>\r\nBộ nhớ trong: 32 GB</br>\r\nKết nối: Hỗ trợ 4G Có nghe gọi</br>\r\nSIM: 1 Nano SIM</br>\r\nCamera sau: 8 MP</br>\r\nCamera trước: 2 MP</br>\r\nPin, Sạc: 5100 mAh, 15 W\r\n', '<b>Galaxy Tab A7 Lite </b>là phiên bản rút gọn của dòng máy tính bảng \"ăn khách\" Galaxy Tab A7 thuộc thương hiệu Samsung, đáp ứng nhu cầu giải trí của khách hàng thuộc phân khúc bình dân với màn hình lớn nhưng vẫn gọn nhẹ hợp túi tiền.', '4990000', '4290000', 1, 1, 10, 'samsung-galaxy-tab-a7-lite-gray-600x600.jpg'),
(8, 3, 'iPad Pro 2021', 'Màn hình: 11\"Liquid Retina</br>\r\nHệ điều hành: iPadOS 15</br>\r\nChip: Apple M1 8 nhân</br>\r\nRAM: 8 GB</br>\r\nBộ nhớ trong: 512 GB</br>\r\nKết nối: Nghe gọi qua FaceTime</br>\r\nCamera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR</br>\r\nCamera trước: 12 MPv\r\nPin, Sạc: 28.65 Wh (~ 7538 mAh)20 W\r\n', '<b>iPad Pro M1 11 inch WiFi 512GB (2021) -</b> được Apple cho ra mắt với nhiều điểm nổi bật như hiệu năng cực khủng, thiết kế sang trọng và đẳng cấp, những điều này tạo nên một cơn sốt trên thị trường sản phẩm di động khi người dùng cực kỳ hưởng ứng và săn đón series iPad Pro mới của Apple lần này.', '31990000', '27290000', 1, 1, 10, 'ipad-pro-2021-11-inch-silver-600x600.jpg'),
(23, 2, 'Samsung Z Fold 3 5G', 'Màn hình: Dynamic AMOLED 2X Chính 7.6\" & Phụ 6.2\"Full HD+ </br>\r\nHệ điều hành: Android 11 </br>\r\nCamera sau: 3 camera 12 MP </br>\r\nCamera trước: 10 MP & 4 MP </br>\r\nChip: Snapdragon 888</br>\r\nRAM: 12 GB</br>\r\nBộ nhớ trong: 512 GB</br>\r\nSIM: 2 Nano SIM + 1 eSIM Hỗ trợ 5G</br>\r\nPin, Sạc: 4400 mAh, 25 W', 'Galaxy Z Fold3 5G đánh dấu bước tiến mới của Samsung trong phân khúc điện thoại gập cao cấp khi được cải tiến về độ bền cùng những nâng cấp đáng giá về cấu hình hiệu năng, hứa hẹn sẽ mang đến trải nghiệm sử dụng đột phá cho người dùng.', '44990000', '39990000', 0, 0, 20, 'samsung-galaxy-z-fold-3-.jpg'),
(24, 1, 'iPhone 11 128 GB', 'Màn hình:  OLED 6.7\"Super Retina XDR </br>\r\nHệ điều hành:  iOS 15 </br>\r\nCamera sau:  3 camera 12 MP </br>\r\nCamera trước:  12 MP </br>\r\nChip:  Apple A15 Bionic </br>\r\nRAM:  6 GB </br>\r\nBộ nhớ trong:  128 GB </br>\r\nSIM:  1 Nano SIM & 1 eSIM Hỗ trợ 5G </br>\r\nPin, Sạc:  4352 mAh20 W\r\n', 'Được xem là một trong những phiên bản iPhone \"giá rẻ\" của bộ 3 iPhone 11 series nhưng iPhone 11 128GB vẫn sở hữu cho mình rất nhiều ưu điểm mà hiếm có một chiếc smartphone nào khác sở hữu.', '15990000', '12990000', 1, 0, 10, 'iphone-11.jpg'),
(25, 3, 'iPad Air 5', 'Màn hình: 10.9\" , Retina IPS LCD </br>\r\nHệ điều hành: iPadOS 15</br>\r\nChip: Apple M1 8 nhân</br>\r\nRAM: 8 GB</br>\r\nBộ nhớ trong: 64 GB</br>\r\nKết nối: Nghe gọi qua FaceTime</br>\r\nCamera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR</br>\r\nCamera trước: 12 MPv\r\nPin, Sạc: 28.65 Wh (~ 7538 mAh) 20 W\r\n', 'iPad Air 5 M1 Wifi 64 GB đã được công bố tại sự kiện Peek Performace diễn ra hôm 9/3 (theo giờ Việt Nam). Năm nay Apple đã có những thay đổi lớn về cả hiệu năng và bổ sung màu sắc mới cho thiết bị.', '16990000', '16290000', 1, 1, 10, 'ipad-air-5.jpg'),
(26, 4, 'Asus Gaming ROG Flow Z13', 'CPU: i7,12700H, 2.30 GHz </br>\r\nRAM: 16 GB , LPDDR5 (8GB On board + 8GB On board)</br>\r\nỔ cứng: 512 GB SSD</br>\r\nMàn hình: 13.4\", WUXGA (1920 x 1200), 120Hz</br>\r\nCard màn hình: Card rời, RTX 3050 4GB</br>\r\nCổng kết nối: 1x ROG XG Mobile Interface, 1x USB 3.2 Gen, 2 Type-C support, DisplayPort / power delivery / G-SYNC, Jack tai nghe 3.5 mm, Thunderbolt 4 USB-CUSB 2.0</br>\r\nĐặc biệt: Có màn hình cảm ứng, Có đèn bàn phím </br>\r\nHệ điều hành: Windows 11 Home SL</br>\r\nThiết kế: Vỏ nhựa - nắp lưng bằng kim loại</br>\r\nKích thước, trọng lượng: Dài 302 mm - Rộng 204 mm - Dày 12 mm - Nặng 1.18 kg', 'Laptop Asus Gaming ROG Flow Z13 GZ301Z i7 (LD110W) là một trong những siêu phẩm đáng mua trong tầm giá bởi nó là sự kết hợp hoàn hảo giữa chiếc laptop gaming mỏng nhẹ, di động nhất và tablet Windows mạnh mẽ nhất.', '49990000', '46990000', 1, 0, 10, '_0000_64501_laptop_asus_gaming_zephyru.jpg'),
(39, 1, 'iPhone 12  Pro Max 128 GB', 'Màn hình: OLED 6.7\" Super Retina XDR </br>\r\nHệ điều hành: iOS 15 </br>\r\nCamera sau: 3 camera 12 MP </br>\r\nCamera trước: 12 MP </br>\r\nChip: Apple A14 Bionic </br>\r\nRAM: 6 GB </br>\r\nBộ nhớ trong: 128 GB </br>\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G </br>\r\nPin, Sạc: 3687 mAh20 W', '<b>iPhone 12 Pro Max 128 GB</b> một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng.', '24990000', '21690000', 0, 0, 11, 'iphone-12-pro-xam.jpg'),
(41, 1, 'iPhone 13 128 GB', 'Màn hình: OLED 6.1\" Super Retina XDR </br>\r\nHệ điều hành: iOS 15 </br>\r\nCamera sau: 2 camera 12 MP </br>\r\nCamera trước: 12 MP </br>\r\nChip: Apple A15 Bionic </br>\r\nRAM: 4 GB </br>\r\nBộ nhớ trong: 128 GB </br>\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G </br>\r\nPin, Sạc: 3240 mAh20 W', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', '24990000', '22590000', 0, 0, 10, 'iphone-13.jpg'),
(42, 1, 'iPhone 13 Mini 256 GB', 'Màn hình: OLED 6.1\" Super Retina XDR </br>\r\nHệ điều hành: iOS 15 </br>\r\nCamera sau: 2 camera 12 MP </br>\r\nCamera trước: 12 MP </br>\r\nChip: Apple A15 Bionic </br>\r\nRAM: 4 GB </br>\r\nBộ nhớ trong: 256 GB </br>\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G </br>\r\nPin, Sạc: 2438 mAh 20 W\r\n', 'Apple đã chính thức giới thiệu đến người dùng cũng như iFan chiếc điện thoại với hàng loạt tính năng thông minh, từ con chip Apple A15 Bionic hiệu năng đầy mạnh mẽ đến thiết kế vô cùng sang trọng có tên là iPhone 13 mini.', '22000000', '19990000', 0, 0, 10, 'iphone-13-02.webp'),
(43, 2, 'OPPO Reno7 Z 5G', 'Màn hình: AMOLED 6.43\" Full HD+</br>\r\nHệ điều hành: Android 11 </br>\r\nCamera sau: Chính 64 MP & Phụ 2 MP, 2 MP </br>\r\nCamera trước: 16 MP </br>\r\nChip: Snapdragon 695 5G 8 nhân</br>\r\nRAM: 8 GB </br>\r\nBộ nhớ trong: 128 GB </br>\r\nSIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G</br>\r\nPin, Sạc: 4500 mAh, 33 W\r\n', 'OPPO đã trình làng mẫu Reno7 Z 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.', '11990000', '10490000', 0, 0, 20, '7z_1_1.jpg'),
(44, 2, 'Samsung Galaxy S22+ Ultra', 'Màn hình: Dynamic AMOLED 2X, 6.6\", Full HD+ </br>\r\nHệ điều hành: Android 12 </br>\r\nCamera sau: Chính 50 MP & Phụ 12 MP, 10 MP </br>\r\nCamera trước: 10 MP </br>\r\nChip: Snapdragon 8 Gen 1 8 nhân </br>\r\nRAM: 8 GB </br>\r\nBộ nhớ trong: 128 GB </br>\r\nSIM: 2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G </br>\r\nPin, Sạc: 4500 mAh, 45 W', 'Samsung Galaxy S22+ 5G 128GB được Samsung cho ra mắt với với ngoại hình không có quá nhiều thay đổi nhưng được nâng cấp đáng kể về thông số cấu hình bên trong và thời gian sử dụng, chắc hẳn sẽ mang lại những trải nghiệm thú vị dành cho bạn.', '28990000', '24590000', 0, 0, 30, 'sm-s22.webp'),
(45, 3, 'Samsung Galaxy Tab S8', 'Màn hình: 11\", LTPS </br>\r\nHệ điều hành: Android 12 </br>\r\nChip: Snapdragon 8 Gen 1 8 nhân </br>\r\nRAM: 8 GB </br>\r\nBộ nhớ trong: 128 GB </br>\r\nKết nối: 5G Có nghe gọi </br>\r\nSIM: 1 Nano SIM </br>\r\nCamera sau: Chính 13 MP & Phụ 6 MP </br>\r\nCamera trước: 12 MP </br>\r\nPin, Sạc: 8000 mAh, 45 W', 'Samsung Galaxy Tab S8 ra mắt và vẫn giữ được đặc trưng của dòng máy tính bảng Galaxy Tab S với cấu hình mạnh mẽ, màn hình hiển thị ổn cùng khả năng hỗ trợ bút S Pen hỗ trợ học tập làm việc tốt hơn.', '21990000', '20190000', 0, 0, 10, 'tab_s8.webp'),
(46, 3, 'Lenovo Tab P11 Pro', 'Màn hình: 11\", IPS LCD </br>\r\nHệ điều hành: Android 11 </br>\r\nChip: MediaTek Helio G90T </br>\r\nRAM: 4 GB </br>\r\nBộ nhớ trong: 128 GB </br>\r\nKết nối: Hỗ trợ 4G, Có nghe gọi </br>\r\nSIM: 1 Nano SIM </br>\r\nCamera sau: 8 MP </br>\r\nCamera trước: 8 MP </br>\r\nPin, Sạc: 7500 mAh, 20 W', 'Tablet Lenovo mang đến cho người dùng mẫu máy tính bảng mới với tên gọi Yoga Tab 11 cùng nhiều ưu điểm vượt trội như bộ vi xử lý chuyên game của MediaTek, màn hình kích thước lớn, âm thanh nổi sống động và các chế độ tiện ích đa dạng khác mà không thua kém gì các tablet cao cấp khác.', '10990000', '9590000', 0, 0, 40, 'lenovo-tab-p11-pro.jpg'),
(47, 4, 'Lenovo IdeaPad Gaming 3', 'CPU: i5, 11300H, 3.1GHz </br>\r\nRAM: 8 GB, DDR4 2 khe (1 khe 4GB + 1 khe 4GB), 3200 MHz </br>\r\nỔ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB (2280) / 512GB (2242)), Hỗ trợ thêm 1 khe cắm HDD SATA (nâng cấp tối đa 1TB)</br>\r\nMàn hình: 15.6\", Full HD (1920 x 1080), 120Hz </br>\r\nCard màn hình: Card rời GTX 1650 4GB\r\nCổng kết nối: 2 x USB 3.2HDMI, Jack tai nghe 3.5 mm, LAN (RJ45, USB Type-C </br>\r\nĐặc biệt: Có đèn bàn phím </br>\r\nHệ điều hành: Windows 11 Home SL </br>\r\nThiết kế: Vỏ nhựa </br>\r\nKích thước, trọng lượng: Dài 359.6 mm - Rộng 251.9 mm - Dày 24.2 mm - Nặng 2.25 kg', 'Gam màu đen huyền bí cùng những chi tiết góc cạnh hầm hố làm nên chiếc laptop Lenovo IdeaPad Gaming 3 15IHU6 i5 (82K10178VN) chuẩn laptop gaming với cấu hình mạnh mẽ của chip Intel Gen 11 và card NVIDIA GTX sẽ làm hài lòng nhu cầu chơi game giải trí cho bạn.', '22000000', '19450000', 0, 0, 5, '_0004_lenovo-ideapad-gaming-3-15ihu6-8_1__1.jpg'),
(48, 4, 'MacBook Air M2 2022', 'CPU: Apple M2, 100GB/s memory bandwidth </br>\r\nRAM: 8 GB </br>\r\nỔ cứng: 256 GB SSD </br>\r\nMàn hình: 13.6\", Liquid Retina (2560 x 1664) </br>\r\nCard màn hình: Card tích hợp, 8 nhân GPU </br>\r\nCổng kết nối: 2 x Thunderbolt 3, Jack tai nghe 3.5 mm, MagSafe 3 </br>\r\nĐặc biệt: Có đèn bàn phím </br>\r\nHệ điều hành: Mac OS </br>\r\nThiết kế: Vỏ kim loại</br>\r\nKích thước, trọng lượng: Dài 304.1 mm - Rộng 215 mm - Dày 11.3 mm - Nặng 1.24 kg', 'Siêu phẩm MacBook Air M2 được trình làng vào giữa năm 2022 một lần nữa đã khẳng định vị thế của Apple trong phân khúc laptop cao cấp - sang trọng, đánh bật mọi rào cản với con chip Apple M2 đầy mạnh mẽ cùng lối thiết kế lịch lãm, thời thượng đặc trưng. ', '32590000', '32000000', 0, 0, 200, 'macbook_air_m2_4.jpg'),
(49, 4, 'MacBook Pro 14 M1 Max 2021', 'CPU: Apple M1 Max, 400GB/s memory bandwidth </br>\r\nRAM: 32 GB </br>\r\nỔ cứng: 512 GB SSD </br>\r\nMàn hình: 14.2\", Liquid Retina XDR display (3024 x 1964)120Hz </br>\r\nCard màn hình: Card tích hợp, 24 nhân GPU </br>\r\nCổng kết nối: 3 x Thunderbolt 4,  USB-C, HDMI ,Jack tai nghe 3.5 mm</br>\r\nĐặc biệt: Có đèn bàn phím </br>\r\nHệ điều hành: Mac OS </br>\r\nThiết kế: Vỏ kim loại nguyên khối </br>\r\nKích thước, trọng lượng: Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - Nặng 1.6 kg', 'Khoác lên mình vẻ ngoài mới lạ so với các dòng Mac trước đó, thiết kế màn hình tai thỏ ấn tượng, bắt mắt cùng bộ hiệu năng đỉnh cao M1 Max mạnh mẽ, MacBook Pro 14 inch M1 Max 2021 xứng tầm là chiếc laptop cao cấp chuyên dụng dành cho dân kỹ thuật - đồ họa, sáng tạo nội dung.', '77990000', '70990000', 0, 0, 200, 'macbook-pro-14-inch-2021-32gb-1tb-2_3.jpg'),
(50, 1, 'iPhone 12 256GB', 'Màn hình: OLED 6.1\" Super Retina XDR </br>\r\nHệ điều hành: iOS 15 </br>\r\nCamera sau: 2 camera 12 MP </br>\r\nCamera trước: 12 MP </br>\r\nChip: Apple A14 Bionic </br>\r\nRAM: 4 GB </br>\r\nBộ nhớ trong: 256 GB </br>\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G </br>\r\nPin, Sạc: 2815 mAh, 20 W\r\n', 'Smartphone iPhone 12 256 GB được Apple cho ra mắt đã đem đến làn sóng mạnh mẽ đối với những ai yêu công nghệ nói chung và “fan hâm mộ” trung thành của điện thoại iPhone nói riêng, với con chip mạnh, dung lượng lưu trữ lớn cùng thiết kế toàn diện và khả năng hiển thị hình ảnh xuất sắc.', '23890000', '21450000', 0, 0, 10, 'iphone-12-do.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_caption` text NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_caption`, `slider_active`) VALUES
(1, 'slider1.png', 'Slider sales', 1),
(2, 'slider2.png', 'Sales 50%', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_located` int(11) NOT NULL DEFAULT 0,
  `transaction_cancle` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `customer_id`, `product_id`, `order_quantity`, `transaction_code`, `transaction_date`, `transaction_located`, `transaction_cancle`) VALUES
(2, 32, 5, 1, '7715', '2022-06-07 04:02:37', 0, 0),
(3, 33, 3, 1, '4388', '2022-06-07 04:45:24', 0, 0),
(4, 33, 8, 1, '4388', '2022-06-07 04:45:24', 0, 0),
(5, 34, 4, 1, '8641', '2022-06-07 05:03:08', 0, 0),
(6, 34, 5, 1, '8641', '2022-06-07 05:03:08', 0, 0),
(7, 34, 8, 1, '8641', '2022-06-07 05:03:08', 0, 0),
(8, 35, 4, 2, '6650', '2022-06-07 08:17:33', 0, 0),
(9, 35, 1, 1, '6650', '2022-06-07 08:17:33', 0, 0),
(10, 35, 8, 2, '6650', '2022-06-07 08:17:33', 0, 0),
(11, 36, 5, 1, '2749', '2022-06-07 08:19:49', 0, 0),
(12, 36, 8, 1, '2749', '2022-06-07 08:19:49', 0, 0),
(13, 37, 4, 6, '3109', '2022-06-24 17:22:43', 1, 0),
(14, 37, 1, 1, '3109', '2022-06-24 17:22:43', 1, 0),
(15, 38, 4, 1, '6323', '2022-06-24 20:45:19', 1, 2),
(16, 38, 23, 1, '9030', '2022-06-28 15:41:37', 1, 2),
(17, 38, 6, 2, '2406', '2022-06-28 15:39:27', 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_newsfeed`
--
ALTER TABLE `tbl_newsfeed`
  ADD PRIMARY KEY (`newsfeed_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_newsfeed`
--
ALTER TABLE `tbl_newsfeed`
  MODIFY `newsfeed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
