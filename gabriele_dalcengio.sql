-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 08:34 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gabriele_dalcengio`
--
CREATE DATABASE IF NOT EXISTS `gabriele_dalcengio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gabriele_dalcengio`;

-- --------------------------------------------------------

--
-- Table structure for table `hasreview`
--

DROP TABLE IF EXISTS `hasreview`;
CREATE TABLE IF NOT EXISTS `hasreview` (
  `id` int(7) NOT NULL,
  `rid` tinyint(7) NOT NULL,
  PRIMARY KEY (`id`,`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hasreview`
--

INSERT INTO `hasreview` (`id`, `rid`) VALUES
(8, 1),
(8, 34);

-- --------------------------------------------------------

--
-- Table structure for table `reviewed`
--

DROP TABLE IF EXISTS `reviewed`;
CREATE TABLE IF NOT EXISTS `reviewed` (
  `username` varchar(20) NOT NULL,
  `rid` int(7) NOT NULL,
  PRIMARY KEY (`username`,`rid`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewed`
--

INSERT INTO `reviewed` (`username`, `rid`) VALUES
('d', 33),
('d', 34),
('eagle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `rid` int(7) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `stars` int(1) NOT NULL DEFAULT 5,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rid`, `text`, `stars`, `date`) VALUES
(1, 'Their fish tacos are fantastic, I can\'t get enough of it. I love the atmosphere as well.', 5, '0000-00-00'),
(12, 'test', 1, '2019-11-12'),
(13, 'test', 1, '2019-11-12'),
(21, 'fdsdgfhtythrew', 1, '2019-11-12'),
(22, 'ewrwer', 1, '2019-11-12'),
(23, 'ewrwer', 1, '2019-11-12'),
(24, 'ewrwer', 1, '2019-11-12'),
(25, 'ewrwer', 1, '2019-11-12'),
(26, 'ewrwer', 1, '2019-11-12'),
(27, 'ewrwer', 1, '2019-11-12'),
(28, 'ewrwer', 1, '2019-11-12'),
(29, 'ewrwer', 1, '2019-11-12'),
(30, 'ewrwer', 1, '2019-11-12'),
(31, 'ewrwer', 1, '2019-11-12'),
(32, 'fish', 4, '2019-11-12'),
(33, 'fish', 4, '2019-11-12'),
(34, 'final review test', 4, '2019-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `e_pref` text NOT NULL COMMENT 'ethnic preference of food',
  `f_pref` text NOT NULL COMMENT 'type of food preference',
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table containing all user information';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `fullname`, `email`, `e_pref`, `f_pref`) VALUES
('bop', 'eatmyshortsillhashth', 'tingle', 'tie@menswear.ca', 'european', 'cultural cuisine'),
('d', '3c363836cf4e16666669a25da280a1865c2d2874', 'this is an updated row', 'chungus@gmail.com', 'western', 'soups'),
('eagle', '577edc67ce8a594bf0d56a00096c827c29c828ac', 'name', 'email@test.com', 'middle eastern', 'meats'),
('g', '4a8a9fc31dc15a4b87bb', 'gabe', 'test@tet.com', 'fusion', 'cultural cuisine'),
('testboi', 'fshdgkserjger', 'testing', 'test@test.com', 'fusion', 'cultural cuisine'),
('user', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Gabriele Dal Cengio', 'gdalceng@sfu.ca', 'fusion', 'cultural cuisine');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `origin` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `rating` int(1) NOT NULL DEFAULT 5,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `origin`, `type`, `location`, `address`, `description`, `rating`) VALUES
(1, 'Ali\'s Hot Dogs', 'western', 'hot dogs', 'west end', 'North Side of 1000 Robson St', 'A small hot dog stand', 0),
(2, 'Dog Meister', 'western', 'hot dogs', 'mount pleasant', 'West Side of 2900 Main St - 20 Metres North of E 14th Ave', 'Dog Meister offers blends of German and Canadian Tastes with a sprinkle of magic.\r\n', 0),
(3, 'Mr. Camaron', 'western', 'drinks', 'downtown', 'North Side of W Georgia St - 10 Metres West of Homer St', 'A drink and smoothie stand', 0),
(4, 'Mr. Shawarma', 'middle eastern', 'sandwiches', 'downtown', 'East Side of 600 Granville St - 80 Metres North of W Georgia St', 'A vendor selling delicious shawarma', 0),
(5, 'Mr. Tube Steak', 'western', 'hot dogs', 'downtown', 'East Side of 600 Beatty St - 6 Metres North of West Georgia St', 'Mr. Tube Steak is an established mobile BBQ cart company in operation for over 30 years. With that much experience you can be sure Mr. Tube Steak is a guaranteed great choice for your next event.', 0),
(6, 'Roaming Dragon', 'asian', 'cultural cuisine', 'downtown', 'West Side of 700 Granville St - 5 metres South of W Georgia St', 'Roaming Dragon, Winner of Vancouver Magazine\'s Best Street Food Award, is bringing gourmet\r\nPan-Asian street food to Vancouver', 0),
(7, 'Super Thai', 'asian', 'cultural cuisine', 'downtown', 'Authorised Parking Meter North Side of 1000 W Georgia St', 'Amazing Thai food to awaken your taste buds! Pad Thai, Chicken Cashew Nut, Pad Ka Pow, Red or Green Thai curry, and Tom Ka Soup. Vegetarian options available.', 0),
(8, 'Tacofino', 'south american', 'cultural cuisine', 'downtown', 'Authorised Parking Meter West Side of 700 Howe St', 'From the back of a surf shop parking lot in Tofino, British Columbia emerged a concept to infuse the experiences of our travels with our West Coast roots, and bring them to life in our beachside surf town and beyond.', 4),
(9, 'The Juice Truck', 'western', 'drinks', 'downtown', 'South Side of 900 Robson - 6 Metres East of Burrard St', 'COLD PRESSED JUICE Made in Vancouver. Raw, Gluten Free, Unpasteurized.', 0),
(10, 'The Juice Truck', 'western', 'drinks', 'downtown', 'Authorised Parking Meter West Side of 300 Cambie St', 'COLD PRESSED JUICE Made in Vancouver. Raw, Gluten Free, Unpasteurized.', 0),
(11, 'Cheesey Does It', 'western', 'sandwiches', 'downtown', 'South Side of 900 Robson St - 16 Metres West of Hornby St', 'Grilled cheese food truck, not for the faint of heart. This isn\'t your parents grilled cheese!', 0),
(12, 'Feastro - The Rolling Bistro', 'south american', 'meats', 'downtown', 'Authorised Parking Meter - Thurlow St at W Cordova St', 'A quick stop for good mexican inspired local meats and seafood', 0),
(13, 'Japadog', 'asian', 'hot dogs', 'west end', 'West Side of 800 Burrard St - 2.5 Metres North of Smithe St', 'A japanese inspired fusion hot dog stand', 0),
(14, 'Lemon Sea', 'western', 'drinks', 'west end', 'South Side of 2000 Beach Av - 30 metres West of Chilco St', 'A seaside stand specializing in handcrafted lemonade and crepes', 0),
(15, 'Meet to Eat', 'middle eastern', 'cultural cuisine', 'downtown', 'Authorised Parking Meter South Side of 1000 Dunsmuir St', 'Meet2Eat is a new food truck servicing modern Mediterranean grill food. We serve organic chicken wraps, lamb and beef kebobs, fish and chips, organic falafel and hot dogs. We mainly use local produce and spices from overseas to achieve the authentic taste of Middle East.', 0),
(16, 'Potato Tornado', 'western', 'fried', 'downtown', 'West Side of 800 Granville St - 6 Metres South of Robson St', 'We sell deep fried spiral potato, zucchini, & yam with your favourite seasoning. We are gluten free, dairy free, nut free, vegetarian and vegan.', 0),
(17, 'San Juan Family Farm', 'south american', 'cultural cuisine', 'west end', 'West Side of 700 Granville St - 5 metres South of W Georgia St', 'San Juan Family Farm is a small family run business that brings you home made sauces, Bolivian food and smoothies all made from organic products.', 0),
(18, 'BBKB Kaboom Box', 'western', 'meats', 'downtown', 'West Side of 700 Granville St - South of W Georgia St', 'Serving the Best of BC! Home of the world-famous Hot-smoked Salmon Sandwich, Gulf-Island Oyster Po\'Boy and other amazing, sustainable, BC treats.', 0),
(19, 'Bandidas', 'south american', 'vegan', 'downtown', 'Authorised Parking Meter - North Side of 1000 W Georgia St', 'HANDMADE / MEXICAN-INSPIRED / VEGETARIAN FOOD IN THE HEART OF EAST VAN.', 0),
(20, 'Brasilian Roots', 'south american', 'cultural cuisine', 'downtown', 'West Side of 700 Granville St - 5 metres South of W Georgia St', 'Authorised Parking Meter - East Side of 600 Seymour St', 0),
(21, 'Crab Park Chowdery', 'western', 'soups', 'downtown', 'East Side of 600 Granville St - 30 Metres North of W Georgia St', 'Inspired by childhood trips to San Francisco, it is our aim to bring you a delicious chowder that is locally made with the freshest ingredients possible. Our recipes were deliciously developed by our very own grandmother! Come see what all the fuss is about, your stomach will thank you.', 0),
(22, 'Eat Chicken Wraps', 'asian', 'sandwiches', 'downtown', 'West Side of 800 Howe St - 5 Metres South of Robson St', 'Eat Chicken Wraps is serving the best wraps in town, from Kung Pao to Al Pastor! The ingredients are always fresh, the food always delicious, and the service always splendid. If you find yourself hungry for a tasty bite on the streets of Vancouver, stop by Eat Chicken Wraps today!', 0),
(23, 'Fat Duck Mobile Eatery', 'asian', 'sandwiches', 'downtown', 'Authorised Parking Meter - North Side of 800 W Cordova St', 'Urban country cooking. Conceptually familiar, uniquely interpreted with a focus on slow food fast.', 0),
(24, 'Holy Smokes', 'western', 'meats', 'fairview', 'South Side 1500 West Broadway - 6 Metres West of Granville St', 'Available smoked meats for menu items include Pulled Pork, Pulled Chicken & Texas style Brisket.', 0),
(25, 'La Bomba Taqueria', 'south american', 'cultural cuisine', 'kensington-cedar cottage', 'South Side of 1700 E Broadway', 'La Bomba Taqueria - the bomb tacos', 0),
(26, 'Mac BBQ', 'western', 'sandwiches', 'west end', 'South Side of 1800 Beach Av - East of Davie St', 'it is no frills, just premium meats and ingredients cooked the old fashioned way over hickory and pecan wood using our homemade rub. our award winning house sauce is made fresh weekly and is our own family recipe. it has become a staple part of the mac’s tradition and taste.', 0),
(27, 'Marimba', 'middle eastern', 'hot dogs', 'downtown', 'South Side of 800 W Georgia St - 30 Metres West of Howe St', 'Marimba specializes in bringing authentic Mexican food to Vancouver. Using sustainable local ingredients, we aim to support other local vendors in Vancouver while creating a unique experience.', 0),
(28, 'Master Chef\'s Kebab House', 'middle eastern', 'cultural cuisine', 'downtown', 'East Side of 500 Granville St - 10 Metres North of Dunsmuir St', 'Kebab food truck', 0),
(29, 'Meet to Eat', 'middle eastern', 'cultural cuisine', 'downtown', 'West Side of 1100 Burrard St - 10 Metres North of Davie St', 'Meet2Eat is a new food truck servicing modern Mediterranean grill food. We serve organic chicken wraps, lamb and beef kebobs, fish and chips, organic falafel and hot dogs. We mainly use local produce and spices from overseas to achieve the authentic taste of Middle East.', 0),
(30, 'Mr. Shawarma', 'middle eastern', 'cultural cuisine', 'downtown', 'Authorised Parking Meter - North Side of 1000 Melville St', 'A vendor selling delicious shawarma', 0),
(31, 'Mum\'s Grilled Cheese Truck', 'western', 'sandwiches', 'downtown', 'South Side of 800 Robson St -30 Metres West of Howe St', 'Serving classic home style gourmet grilled cheese, soups and other comfort foods', 0),
(32, 'Roaming Dragon', 'asian', 'cultural cuisine', 'downtown', 'Authorised Parking Meter East Side of 800 Burrard St', 'Roaming Dragon, Winner of Vancouver Magazine\'s Best Street Food Award, is bringing gourmet\r\nPan-Asian street food to Vancouver', 0),
(33, 'Tacofino White Lightning', 'south american', 'cultural cuisine', 'downtown', 'Authorised Parking Meter West Side 500 Burrard St', 'From the back of a surf shop parking lot in Tofino, British Columbia emerged a concept – to infuse the experiences of our travels with our West Coast roots, and bring them to life in our beachside surf town … and beyond.', 0),
(34, 'The Frying Pan', 'fusion', 'fried', 'downtown', 'Authorised Parking Meter West Side of 500 Burrard St', 'We are a Vancouver based food truck with a downtown permit on the corner of W Pender st and Burrard st. We are known for our Nashville X Korean style hot chicken sandwiches and our Korean style rice bowls.', 0),
(35, 'The Praguery', 'european', 'dessert', 'downtown', 'Authorised Parking Meter - 1000 W Hastings St', 'We turned the traditional East European treat into something so good it should be banned. Really. You can get addicted to this stuff. We are really passionate about the taste (as much as we can if we want to stay within legal limits) and we spent a lot of time perfectioning it to real, er, perfection. Try it. Really.', 0),
(36, 'The Reef', 'south american', 'cultural cuisine', 'downtown', 'Authorised Parking Meter - East Side of Thurlow St - North of W Hastings St', 'Uncover the edible treasure of the tropics with our eclectic Caribbean fare and drinks. The Reef’s menus sparkle with the potential of lunch, brunch and dinner plates inspired by the styles and tastes of the Caribbean.', 0),
(37, 'Arturo\'s Mexico To Go', 'south american', 'cultural cuisine', 'downtown', 'North Side of 700 W Cordova St - 14 metres East of Howe St', 'To prepare his menu fresh everyday, Arturo hand picks Vancouver\'s finest ingredients. Delicious hormone free meats are lovingly flavoured to perfection. Quality peppers and fresh herbs blend daily into salsas that make your palate sing. Fresh avocados are used to make from scratch Arturo’s signature guacamole. The menu is simple and streamlined to assure you the highest quality and fastest service.', 0),
(38, 'Aussie Pie Guy', 'australian', 'meats', 'downtown', 'Authorised Parking Meter - 1000 W Pender St', 'Aussie Pie Guy is Vancouver\'s one and only Aussie pie food truck. We make authentic Australian meat (and veggie!) pies and desserts that we sell from our food truck in and around Vancouver, BC. Aussie Pie Guy began with a craving - a craving for a delicious Aussie pie.', 0),
(39, 'Cazba Express', 'middle eastern', 'cultural cuisine', 'downtown', 'North Side of 700 Robson St - 50 Metres West of Granville St', 'Most of Iranian dishes are prepared with herbs, vegetable and rice along with meat, lamb, chicken or fish. The frequent use of fresh green herbs and vegetables in Iranian food made them a healthy choice for most people. The Persian cuisine refers to a style of cooking related to Persia or modern day Iran. Iran has a long history of agriculture, and use of fresh herbs and vegetables in Persian recipes is very common.', 0),
(40, 'Chickpea', 'middle eastern', 'vegan', 'downtown', 'Authorised Parking Meter - North Side of W Cordova St', 'Delicious plant based comfort food with a mediterranean twist', 0),
(41, 'Chou Chou Crepes', 'european', 'crepes', 'downtown', 'North Side of 100 Water St - 10 Metres West of Abbott St', 'authentic French gourmet street cuisine in Vancouver,  specializing exclusively in Traditional Brittany Crepes. ', 0),
(42, 'Come Arepa', 'south american', 'cultural cuisine', 'downtown', 'Authorised Parking Meter - 1000 W Hastings St', 'Come Arepa is a food truck dedicated to serving the Arepa and some other tasty Venezuelan food. The Arepa is one of the most important dishes in Venezuela, a gluten-free cornbread sandwich that is stuffed with a variety of meats, cheeses, veggies, and salsas.', 0),
(43, 'Didi\'s Greek', 'european', 'cultural cuisine', 'west end', 'South Side of 1700 Robson St - 10 Metres East of Denman St', 'Didi\'s Greek is a family operated business, which strives in bringing authentic Greek food to your home, special events and to the streets of Vancouver and all of British Columbia. What began with only a food cart has now expanded to Catering.', 0),
(44, 'Mr. Arancino', 'european', 'fried', 'downtown', 'West Side of Granville St - 75 Metres North of Robson St', 'Mr. Arancino’s deliciously gooey risotto balls are an innovative take on a traditional Sicilian recipe. Called ‘arancini’, these savory morsels are a quick, healthier alternative to a burger, wrap, poutine or pizza. For home or for an event, they are sure to appeal to a more discerning, and health savvy population that appreciates good food with a hip new twist.', 0),
(45, 'Russett Shack', 'fusion', 'fried', 'west end', 'West Side of 1100 Burrard St - 10 Metres North of Davie St', 'The first only baked potato takeout restaurant in Vancouver, serving you healthy  and delicious potatoes made to order.', 0),
(46, 'Tandoori Tikka Dog', 'asian', 'hot dogs', 'downtown', 'North Side of 500 W Cordova St - 59 Metres West of Richards St', 'Pork-free hot dogs and kosher smokies. Tandoori Tikka dogs are flame broiled with tandoori masala and served with butter sauteed tandoori flavour onions.', 0),
(47, 'The Loving Hut', 'fusion', 'vegan', 'downtown', 'East Side of 1200 Pacific Boulevard - 10 Metres South of Davie St', 'Vegan comfort food for everyone!', 0),
(48, 'V Dub Dogs', 'western', 'hot dogs', 'downtown', 'Foot of Davie St - 2 Metres South of Marinaside Cres.', 'Grilling Groovy Hotdogs in a flower power VW bus', 0),
(49, 'Vij\'s Railway Express', 'asian', 'cultural cuisine', 'downtown', 'Authorised Parking Meter North Side of 1000 W Georgia St', 'Vij\'s Railway Express is Vancouver\'s most award-winning food truck and has evolved into a full-service catering company.', 0),
(50, 'Wakwak Burger', 'asian', 'burgers', 'downtown', 'Authorised Parking Meter North Side of 1000 W Georgia St', '2.85 burger ($2.85)＆Japanese-style burgers teriyaki sauce (Teriyaki or Teriyaki Cheese)！.', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviewed`
--
ALTER TABLE `reviewed`
  ADD CONSTRAINT `reviewed_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `reviewed_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `reviews` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
