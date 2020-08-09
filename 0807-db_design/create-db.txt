-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-08-09 12:04:29
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫： `esther/cy-order-food_system`
--
CREATE DATABASE IF NOT EXISTS `esther/cy-order-food_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `esther/cy-order-food_system`;

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--
-- 建立時間： 2020-08-09 05:59:52
-- 最後更新： 2020-08-09 07:52:01
--

CREATE TABLE `category` (
  `categoryID` int(3) NOT NULL,
  `categoryName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `category`:
--

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, '飯類'),
(2, '麵食'),
(3, '輕食'),
(4, '素食'),
(5, '其他');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--
-- 建立時間： 2020-08-09 07:30:58
-- 最後更新： 2020-08-09 07:49:53
--

CREATE TABLE `employee` (
  `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的關聯 `employee`:
--

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`employeeID`, `lastName`, `firstName`, `gender`, `phone`, `email`, `password`) VALUES
(2009080063, 'Chou', 'Kaylee', 'F', '0909523845', 'Kaylee_Chou@mail.cy.net', '123456'),
(2010120012, 'Lin', 'Edward', 'M', '0981452321', 'Edward_Lin@mail.cy.net', '123456'),
(2010961327, 'Xi', 'Morgan', 'M', '0928546325', 'Morgan_Xi@mail.cy.net', '123456'),
(2011261183, 'Chen', 'Cody', 'M', '0910251203', 'Cody_Chen@mail.cy.net', '123456'),
(2011561040, 'Hong', 'Nadia', 'F', '0989654852', 'Nadia_Hong@mail.cy.net', '123456'),
(2011860897, 'Lee', 'Alyssa', 'F', '0954252125', 'Alyssa_Lee@mail.cy.net', '123456'),
(2012020154, 'Chen', 'Lucas', 'M', '0965231425', 'Lucas_Chen@mail.cy.net', '123456'),
(2012160753, 'Lin', 'Leila', 'F', '0936523582', 'Leila_Lin@mail.cy.net', '123456'),
(2015040023, 'Wang', 'Rick ', 'M', '0909123654', 'Rick_Wang@mail.cy.net', '123456'),
(2019041365, 'Gates', 'Alvin', 'M', '0985654741', 'Alvin_Gates@mail.cy.net', '123456');

-- --------------------------------------------------------

--
-- 資料表結構 `favorites`
--
-- 建立時間： 2020-08-09 05:59:26
-- 最後更新： 2020-08-09 10:02:46
--

CREATE TABLE `favorites` (
  `favoritesID` int(5) NOT NULL,
  `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `itemID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `favorites`:
--   `employeeID`
--       `employee` -> `employeeID`
--   `itemID`
--       `item` -> `itemID`
--

--
-- 傾印資料表的資料 `favorites`
--

INSERT INTO `favorites` (`favoritesID`, `employeeID`, `itemID`) VALUES
(1, 2012020154, 7),
(2, 2010120012, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--
-- 建立時間： 2020-08-09 05:48:04
--

CREATE TABLE `item` (
  `itemID` int(10) NOT NULL,
  `supplierID` int(5) NOT NULL,
  `categoryID` int(3) NOT NULL,
  `itemName` varchar(20) NOT NULL,
  `itemDesc` varchar(300) DEFAULT NULL,
  `itemImg` varchar(300) DEFAULT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `item`:
--   `categoryID`
--       `category` -> `categoryID`
--   `supplierID`
--       `supplier` -> `supplierID`
--

--
-- 傾印資料表的資料 `item`
--

INSERT INTO `item` (`itemID`, `supplierID`, `categoryID`, `itemName`, `itemDesc`, `itemImg`, `price`) VALUES
(1, 1, 1, '牛五花丼飯', '牛五花丼飯的商品描述', 'url/img001', 120),
(2, 1, 1, '親子丼飯', '親子丼飯的商品描述', 'url/img002', 110),
(3, 2, 1, '嫩雞胸便當', '嫩雞胸便當的商品描述', 'url/img003', 100),
(4, 2, 1, '里肌豬便當', '里肌豬便當的商品描述', 'url/img004', 95),
(5, 3, 4, '牛蒡飯捲', '牛蒡飯捲的商品描述', 'url/img005', 50),
(6, 3, 4, '筍乾飯捲', '筍乾飯捲的商品描述', 'url/img006', 55),
(7, 4, 1, '招牌飯', '招牌飯的商品描述', 'url/img007', 80),
(8, 4, 1, '燒肉飯', '燒肉飯的商品描述', 'url/img008', 80),
(9, 5, 2, '紅燒牛肉麵', '紅燒牛肉麵的商品描述', 'url/img009', 85),
(10, 5, 2, '清燉牛肉麵', '清燉牛肉麵的商品描述', 'url/img010', 85),
(11, 6, 3, '鮪魚總匯吐司', '鮪魚總匯吐司的商品描述', 'url/img011', 100),
(12, 6, 3, '青醬雞肉三明治', '青醬雞肉三明治的商品描述', 'url/img012', 120);

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--
-- 建立時間： 2020-08-09 05:58:30
-- 最後更新： 2020-08-09 08:53:51
--

CREATE TABLE `location` (
  `locationID` int(5) NOT NULL,
  `building` enum('BHW','industry_building') NOT NULL,
  `office` varchar(5) NOT NULL,
  `floor` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `location`:
--

--
-- 傾印資料表的資料 `location`
--

INSERT INTO `location` (`locationID`, `building`, `office`, `floor`) VALUES
(1, 'BHW', 'A01', 25),
(2, 'BHW', 'A02', 25),
(3, 'BHW', 'B1', 26),
(4, 'industry_building', 'D03', 12);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--
-- 建立時間： 2020-08-09 09:12:31
-- 最後更新： 2020-08-09 09:52:10
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `locationID` int(5) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `orders`:
--   `employeeID`
--       `employee` -> `employeeID`
--   `employeeID`
--       `employee` -> `employeeID`
--   `locationID`
--       `location` -> `locationID`
--

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`orderID`, `employeeID`, `locationID`, `orderDate`) VALUES
(1, 2012020154, 3, '2020-08-09 09:49:03'),
(2, 2011561040, 3, '2020-08-09 09:49:34'),
(3, 2009080063, 2, '2020-07-08 09:49:50'),
(4, 2010961327, 1, '2020-08-04 09:50:07'),
(5, 2015040023, 4, '2020-08-09 09:51:05');

-- --------------------------------------------------------

--
-- 資料表結構 `order_detail`
--
-- 建立時間： 2020-08-09 10:01:29
-- 最後更新： 2020-08-09 09:59:47
--

CREATE TABLE `order_detail` (
  `order_detailID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `itemID` int(10) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `order_detail`:
--   `itemID`
--       `item` -> `itemID`
--

--
-- 傾印資料表的資料 `order_detail`
--

INSERT INTO `order_detail` (`order_detailID`, `orderID`, `itemID`, `quantity`) VALUES
(1, 1, 4, 1),
(2, 2, 5, 2),
(3, 2, 3, 2),
(4, 3, 8, 1),
(5, 4, 10, 2),
(6, 5, 12, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `supplier`
--
-- 建立時間： 2020-08-09 08:06:03
-- 最後更新： 2020-08-09 08:39:36
--

CREATE TABLE `supplier` (
  `supplierID` int(5) NOT NULL,
  `supplierName` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `region` varchar(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `website` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `supplier`:
--

--
-- 傾印資料表的資料 `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`, `phone`, `region`, `address`, `website`) VALUES
(1, '信兵衛手作丼飯壽司', '0987292354', '北區', '成功路478號', NULL),
(2, '生態便當', '972858208', '西屯區', '至善路78號', 'https://bentos.club/'),
(3, '思凡多海苔飯捲', '427073070', '西屯區', '上安路76號', 'http://szuzy.com/riceroll/'),
(4, '甲味燒肉飯', '423139060', '西屯區', '漢口路二段92號', ''),
(5, '洄味牛肉麵', '988234735', '西屯區', '西屯路二段260-8號', 'https://www.facebook.com/2086785194937443/posts/2099477103668252/'),
(6, '日初饌輕食工坊', '423122268', '西屯區', '漢口路二段257號', 'https://www.facebook.com/sunriceat/');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- 資料表索引 `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favoritesID`),
  ADD KEY `fk_employee_favorites` (`employeeID`),
  ADD KEY `fk_item_favorites` (`itemID`);

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `fk_supplier_item` (`supplierID`),
  ADD KEY `fk_category_item` (`categoryID`);

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `fk_employee_orders` (`employeeID`),
  ADD KEY `fk_location_orders` (`locationID`);

--
-- 資料表索引 `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detailID`),
  ADD KEY `fk_item_orderdetail` (`itemID`);

--
-- 資料表索引 `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favoritesID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_employee_favorites` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_favorites` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_category_item` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplier_item` FOREIGN KEY (`supplierID`) REFERENCES `supplier` (`supplierID`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_emplo_orders` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`),
  ADD CONSTRAINT `fk_employee_orders` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_location_orders` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_item_orderdetail` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON UPDATE CASCADE;
COMMIT;
