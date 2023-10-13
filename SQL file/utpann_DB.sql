
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`id`, `admin_id`, `Fullname`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, '20057', 'Avinash Singh', 'admin', '11', '2017-01-24 16:21:18', '21-06-2018 08:27:55 PM');


CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(8, 'Gram Seeds', 'Gram Seeds', '2022-09-06 14:11:26', NULL),
(9, 'Grocerry', 'Mustard Oil', '2022-09-11 15:12:59', NULL);



CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `order_id` varchar(50) NOT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `orders` (`id`, `userId`, `order_id`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(45, 9, '#758133', '1', 1, '2022-09-14 02:20:34', 'COD', NULL),
(46, 9, '#758133', '2', 1, '2022-09-14 02:20:34', 'COD', NULL),
(47, 9, '#538484', '1', 1, '2022-09-14 02:25:48', 'COD', 'in Process'),
(48, 9, '#538484', '2', 1, '2022-09-14 02:25:48', 'COD', 'Delivered');


CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 3, 'in Process', 'Order has been Shipped.', '2017-03-10 19:36:45'),
(2, 1, 'Delivered', 'Order Has been delivered', '2017-03-10 19:37:31'),
(3, 3, 'Delivered', 'Product delivered successfully', '2017-03-10 19:43:04'),
(4, 4, 'in Process', 'Product ready for Shipping', '2017-03-10 19:50:36'),
(5, 7, 'in Process', 'In Process', '2022-09-06 03:21:30'),
(6, 12, 'Delivered', 'fsdfsd', '2022-09-09 13:32:04'),
(7, 15, 'Delivered', 'Deliverd', '2022-09-12 03:41:59'),
(8, 16, 'in Process', 'pl', '2022-09-12 03:46:37'),
(9, 14, 'Delivered', 'del', '2022-09-12 03:46:58'),
(10, 18, 'Delivered', 'Deli', '2022-09-12 04:18:42'),
(11, 33, 'Delivered', 'de', '2022-09-12 07:02:05'),
(12, 35, 'in Process', 'In Process', '2022-09-12 12:03:18'),
(13, 37, 'in Process', 'In Process', '2022-09-13 14:40:34'),
(14, 38, 'in Process', 'In Process', '2022-09-13 14:42:02'),
(15, 48, 'Delivered', 'Delivered', '2022-09-15 05:57:49'),
(16, 47, 'in Process', 'in', '2022-09-15 13:40:24');


CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 20:43:57'),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:52:46'),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:59:19'),
(5, 1, 5, 4, 4, 'Avinash Singh ', 'Good', 'Good Product', '2022-09-06 15:52:31'),
(6, 1, 5, 4, 4, 'Avinash Singh ', 'Good', 'Good Product', '2022-09-06 15:53:13'),
(7, 1, 3, 2, 4, 'Rani Devi', 'Good seeds', 'Received good quality seeds.', '2022-09-10 05:42:03'),
(8, 1, 3, 2, 4, 'Rani Devi', 'Good seeds', 'Received good quality seeds.', '2022-09-10 05:42:52'),
(9, 1, 3, 2, 4, 'Rani Devi', 'Good seeds', 'Received good quality seeds.', '2022-09-10 05:43:19'),
(10, 1, 3, 2, 4, 'Rani Devi', 'Good seeds', 'Received good quality seeds.', '2022-09-10 05:43:43');


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productWeight` varchar(30) NOT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `gst_range` int(11) NOT NULL,
  `gst_charge` int(11) NOT NULL,
  `productDiscount` int(11) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `pr_sellingPrice` int(11) NOT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productWeight`, `productCompany`, `productPrice`, `gst_range`, `gst_charge`, `productDiscount`, `shippingCharge`, `pr_sellingPrice`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 8, 16, 'Mustard Seeds', '75', 'Utpann Seeds And Beyond', 45, 5, 159, 6, 40, 3331, '   ', 'Screenshot (144).png', 'Screenshot (144).png', 'Screenshot (144).png', 'In Stock', '2022-09-14 08:04:54', NULL),
(2, 8, 15, 'Wheat Seeds', '55', 'Utpann Seeds And Beyond', 35, 5, 90, 7, 40, 1920, '    ', 'Screenshot (139).png', 'Screenshot (139).png', 'Screenshot (139).png', 'In Stock', '2022-09-15 05:41:17', NULL);


CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Led Television', '2017-01-26 16:24:52', '26-01-2017 11:03:40 PM'),
(3, 4, 'Television', '2017-01-26 16:29:09', ''),
(4, 4, 'Mobiles', '2017-01-30 16:55:48', ''),
(5, 4, 'Mobile Accessories', '2017-02-04 04:12:40', ''),
(6, 4, 'Laptops', '2017-02-04 04:13:00', ''),
(7, 4, 'Computers', '2017-02-04 04:13:27', ''),
(8, 3, 'Comics', '2017-02-04 04:13:54', ''),
(9, 5, 'Beds', '2017-02-04 04:36:45', ''),
(10, 5, 'Sofas', '2017-02-04 04:37:02', ''),
(11, 5, 'Dining Tables', '2017-02-04 04:37:51', ''),
(12, 6, 'Men Footwears', '2017-03-10 20:12:59', ''),
(13, 7, 'Oil', '2022-09-06 03:26:59', NULL),
(14, 7, 'Dry Fruits', '2022-09-06 03:27:07', NULL),
(15, 8, 'Seeds', '2022-09-06 14:12:16', NULL),
(16, 8, 'Wheat Seeds', '2022-09-11 14:47:48', NULL),
(17, 8, 'Dry Fruits', '2022-09-15 13:40:58', NULL);



CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, 'aman@digihand.co.in', 0x3a3a3100000000000000000000000000, '2021-03-14 07:26:52', NULL, 1),
(25, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-06 02:53:21', '06-09-2022 08:32:50 AM', 1),
(26, '', 0x3a3a3100000000000000000000000000, '2022-09-06 03:03:14', NULL, 0),
(27, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-07 16:15:06', '07-09-2022 09:45:33 PM', 1),
(28, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 04:34:55', '08-09-2022 10:10:59 AM', 1),
(29, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 04:41:35', NULL, 1),
(30, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 05:10:15', NULL, 1),
(31, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 05:33:56', NULL, 1),
(32, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 05:43:55', NULL, 1),
(33, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 07:08:18', NULL, 1),
(34, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 07:15:24', NULL, 1),
(35, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 07:17:10', NULL, 1),
(36, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 11:33:21', NULL, 1),
(37, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 11:57:12', NULL, 1),
(38, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-08 15:16:20', NULL, 1),
(39, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 02:31:33', NULL, 1),
(40, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 02:36:26', NULL, 1),
(41, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 02:55:50', NULL, 1),
(42, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 05:10:43', NULL, 1),
(43, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 08:50:22', NULL, 1),
(44, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 09:19:04', NULL, 1),
(45, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 13:47:17', NULL, 0),
(46, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-09 13:47:20', NULL, 1),
(47, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-10 05:44:02', NULL, 1),
(48, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-10 07:06:17', NULL, 1),
(49, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-10 07:33:42', NULL, 1),
(50, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 03:47:51', '12-09-2022 09:55:30 AM', 1),
(51, 'ram@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 04:26:07', '12-09-2022 11:45:19 AM', 1),
(52, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 06:15:41', NULL, 0),
(53, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 06:18:29', '12-09-2022 11:51:30 AM', 1),
(54, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 06:22:20', '12-09-2022 12:04:33 PM', 1),
(55, 'ram@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 06:34:53', NULL, 1),
(56, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 12:01:40', NULL, 1),
(57, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-12 12:32:34', NULL, 1),
(58, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-13 08:03:21', NULL, 1),
(59, 'ram@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-13 14:41:26', NULL, 1),
(60, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-14 15:54:41', NULL, 1),
(61, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-15 05:29:46', NULL, 1),
(62, 'avi@gmail.com', 0x3a3a3100000000000000000000000000, '2022-09-15 13:35:17', NULL, 1);


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `userId`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(8, '', 'Avinash Singh ', 'avi@gmail.com', 9696746283, '11', 'fasdf', 'fasdf', 'fasdf', 277001, 'fasdf', 'fasdf', 'fasd', 288586, '2022-09-12 06:22:15', NULL),
(9, '', 'Ramesh Verma', 'ram@gmail.com', 9696857485, '11', 'Kashipur New Colony, Near Kadam Chauraha', 'Uttar Pradesh', 'Ballia', 277001, 'Kashipur New Colony, Near Kadam Chauraha', 'Uttar Pradesh', 'Ballia', 277001, '2022-09-12 06:34:44', NULL);


CREATE TABLE `user_feedback` (
  `id` int(11) NOT NULL,
  `feedback_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `feedback_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `user_feedback` (`id`, `feedback_id`, `fname`, `email`, `phone`, `message`, `feedback_Date`) VALUES
(6, 'FD-443675', 'asdf', 'avi@gmail.com', '9450473559', ' afdsf', '15-09-2022'),
(17, 'FD-879703', 'fasfasd', 'avi@gmail.com', 'fasdf', ' afsdfasd', '15-09-2022'),
(18, 'FD-420552', 'szzxcv', 'avi@gmail.com', '9450473559', ' sadfsd', '15-09-2022');



CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(1, 1, 0, '2017-02-27 18:53:17');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;


ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;


ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `user_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;


ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

