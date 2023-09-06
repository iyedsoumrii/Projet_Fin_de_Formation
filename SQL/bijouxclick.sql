
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `createdBy`) VALUES
(12, 'Montres Homme', '-Acier\r\n-Cuir\r\n-Plastique\r\n-Céramique\r\n-Gomme\r\n-Tissu', '2023-07-11 18:24:09', '2023-07-11 18:24:57', 2),
(13, 'Montres Femme', '-Acier\r\n-Cuir\r\n-Plastique\r\n-Céramique\r\n-Gomme\r\n-Tissu\r\n-Argent', '2023-07-11 18:26:05', NULL, 2),
(14, 'Montres Enfant', '-Gomme\r\n-Plastique\r\n-Tissu', '2023-07-11 18:28:36', NULL, 2),
(15, 'Bijoux Femme', '-Série\r\n-Bague\r\n-Solitaire\r\n-Alliance\r\n-Pendentif\r\n-Bracelet\r\n-Gourmette\r\n-Chaine\r\n-Boucles D\'Oreilles\r\n-Broche', '2023-07-11 18:30:20', '2023-07-11 18:43:28', 2),
(16, 'Chichkhan', '-Série\r\n-Bague\r\n-Pendentif\r\n-Bracelet\r\n-Gourmette\r\n-Chaine\r\n-Boucle\r\n-Broche', '2023-07-11 18:31:12', NULL, 2),
(17, 'Diamant', '-Séries Diamant\r\n-Bague\r\n-Chaînes', '2023-07-11 18:31:45', NULL, 2),
(18, 'Bijoux Homme', '-Chaine\r\n-Bague\r\n-Gourmette\r\n-Accessoire', '2023-07-11 18:32:20', NULL, 2),
(19, 'Bijoux Enfant', '-Bague\r\n-Bracelet\r\n-Gourmette\r\n-Pendentif\r\n-Boucle', '2023-07-11 18:32:51', NULL, 2);


CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `PId` varchar(255) DEFAULT NULL,
  `IsOrderPlaced` int(5) DEFAULT NULL,
  `OrderNumber` int(5) DEFAULT NULL,
  `PaymentMethod` varchar(200) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productweight` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `addedBy` int(11) DEFAULT NULL,
  `lastUpdatedBy` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productweight`, `productPrice`, `gender`, `productDescription`, `productImage1`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`, `addedBy`, `lastUpdatedBy`) VALUES
(1, 12, 34, 'SWATCH YCS 592G', '230', 677, 'Male', '-Étanchéité : 3 ATM\r\n-Revendeur officiel\r\n-Garantie : 2 ans', '2f2518d5d027dc40f6a10957b5408cfc.jpg', 0, 'In Stock', '2023-07-13 18:58:59', NULL, 2, NULL),
(2, 12, 34, 'SWATCH YVS 507G', '230', 616, 'Male', '-Étanchéité : 3 ATM\r\n-Revendeur agréé\r\n-Garantie : 2 ans', 'd16cff81affc3ed8da9a34e14b9b5ed6.jpg', 0, 'In Stock', '2023-07-13 19:00:26', NULL, 2, NULL),
(3, 12, 34, 'ENZO EC 200SSS GRIS', '185', 260, 'Male', 'Découvrez toutes nos montres connectées. Elles sont compatibles avec votre iPhone  ou smartphone Android afin de ne manquer aucune notification et de profiter de toutes les fonctionnalités : cardiofréquencemètre, moniteur d’activité et bien d’autres !\r\n\r\nEquipez-vous d’une montre connectée afin de suivre vos performances lors de votre activité sportive et découvrez également notre gamme bien-être connecté.', '04ad952944ba519e0ab182acf3054c1a.jpg', 7, 'In Stock', '2023-07-13 19:07:20', NULL, 2, NULL),
(4, 12, 34, 'POLO BP3212X.350', '215', 444, 'Male', '- Étanchéité : 5 bar (50 m)\r\n- Revendeur officiel\r\n- Garantie : 2 ans', 'd16764bf2b15db8ec9026cb9b6295d9b.jpg', 0, 'In Stock', '2023-07-13 19:10:05', NULL, 2, NULL),
(5, 12, 35, 'ENZO EC 2258C-C4', '200', 236, 'Male', '- Garantie : 2 ans\r\n- Livré avec coffret d\'origine Enzo Collection\r\n- Revendeur officiel', 'bee3c8674aae8d45420d4ca8929823a7.jpg', 7, 'In Stock', '2023-07-13 19:12:55', NULL, 2, NULL),
(6, 12, 36, 'SWATCH YVB 413', '326', 646, 'Male', 'Livré dans son écrin original SWATCH', '21a8d058567c886ed2707395e3388073.jpg', 0, 'In Stock', '2023-07-13 19:15:24', NULL, 2, NULL),
(7, 12, 38, 'LEE COOPER LC 06180.442-MA', '216', 200, 'Male', 'Fabricant: Lee Cooper', 'fbc24fea9f0f17464478ae7809ba98d3.jpg', 7, 'In Stock', '2023-07-13 19:19:20', NULL, 2, NULL),
(8, 12, 39, 'TISSOT T 1166173704100', '157', 655, 'Male', 'Livré dans son écrin original Tissot', 'cc13dddae3cc5682a3e447a244398f7f.jpg', 0, 'In Stock', '2023-07-13 19:21:07', NULL, 2, NULL),
(9, 13, 40, 'GC Z12003L1MF', '218', 1550, 'Female', 'Mouvement de fabrication suisse\r\nVerre minéral recouvert de saphir\r\nAcier inoxydable 316L', '39885896b36193c5d33ee7b2ac6f0fe8.jpg', 0, 'In Stock', '2023-07-13 19:27:22', NULL, 2, NULL),
(10, 13, 41, 'GUESS GW0529L1', '214', 470, 'Female', 'Fabricant: GUESS', '79e3eb2da652448a6be9f46e84648302.jpg', 0, 'In Stock', '2023-07-13 19:29:03', NULL, 2, NULL),
(11, 13, 42, 'SWATCH SO28N 704', '180', 221, 'Femme', 'Livré dans son écrin original SWATCH', 'b75bd0c2e148552b1fdcb202ab43ede9.jpg', 7, 'En rupture de stock', '2023-07-13 19:32:27', '2023-07-13 19:34:58', 2, 2),
(12, 13, 43, 'FESTINA F 16397/2', '214', 358, 'Femme', 'Fabricant: Festina', 'af434790389a8d8fbf98df7941252a17.jpg', 0, 'In Stock', '2023-07-13 19:37:12', NULL, 2, NULL),
(13, 13, 44, 'PREMIUM RD 1771/M', '175', 75, 'Femme', 'Fabricant: Raymond Daniel', '3f64d0f79d9cb3c1731a0aaa31d091aa.jpg', 7, 'In Stock', '2023-07-13 19:39:07', NULL, 2, NULL),
(14, 14, 48, 'Q&Q VS49J013Y', '89', 69, 'Enfant', 'Livré dans son écrin original Q&Q', '1935b50481352b6eab86a7e6949c6190.jpg', 7, 'In Stock', '2023-07-13 19:43:40', NULL, 2, NULL),
(15, 15, 50, 'SERIE 169465', '14.82', 3660, 'Femme', 'SERIE 169465', '311b370e5e32cf5fd251fd4e4a466a06.jpg', 0, 'In Stock', '2023-07-13 19:47:20', NULL, 2, NULL),
(16, 15, 51, 'BAGUE 168084', '6.91', 2840, 'Femme', '18 Carat', 'c604de1f4b8112d3994299c04fa157d6.jpg', 0, 'In Stock', '2023-07-13 19:52:26', NULL, 2, NULL),
(17, 13, 42, 'SWATCH SO28N 115', '149', 221, 'Femme', 'Cette montre ludique dotée d\'un motif à pois possède un boîtier biosourcé et un verre biosourcé bleus ainsi qu’un bracelet bleu imprimé assorti.', '1bf2f5f99c69ad7eb7bb89a0f63ccd8f.jpg', 7, 'Out of Stock', '2023-07-13 19:55:03', NULL, 2, NULL),
(18, 15, 53, 'SOLITAIRE ALLIANCE 167543', '9.69', 318, 'Unisexe', 'Alliance : 5.23 G, Solitaire : 4.46 G', '7ecb6ae0e0ce3b731bea3296815522dc.jpg', 0, 'In Stock', '2023-07-13 20:05:29', NULL, 2, NULL),
(19, 15, 55, 'PENDENTIF 166096', '6.72', 810, 'Femme', 'Poids Pendentif : 6.72 G\r\nPoids Chaine:	5.61 G\r\nCarat Or :	18 Carats', '1ff952d2de91ddd9ae429fa05253b7db.jpg', 0, 'In Stock', '2023-07-13 20:10:20', NULL, 2, NULL),
(20, 15, 56, 'BRACELET 168282', '5.92', 1850, 'Femme', '18 Carats', '0f474f5f3ca72814e0e5c64a2e63a687.jpg', 0, 'In Stock', '2023-07-14 23:52:49', NULL, 2, NULL),
(21, 15, 57, 'GOURMETTE 168677', '6.89', 2420, 'Femme', '18 Carats', 'a17d24e4067a6887ab617d3c788c7cd5.jpg', 0, 'In Stock', '2023-07-14 23:59:00', NULL, 2, NULL),
(22, 15, 58, 'CHAINE 168274', '4.82', 2650, 'Femme', '18 Carats', 'ffc0803a43d578f3f271d426ab3b375d.jpg', 0, 'In Stock', '2023-07-15 00:05:42', NULL, 2, NULL),
(23, 15, 59, 'BOUCLE 166382', '2.73', 2400, 'Femme', '18 Carats', 'fef148ca5f403d85004b75c86ccd0e25.jpg', 0, 'In Stock', '2023-07-15 16:23:20', NULL, 2, NULL),
(24, 17, 70, 'BAGUE 159218', '6.95', 3800, 'Femme', 'Carat :	132P 0.69C\r\nCarat Or :	18 Carat', '7ecd892379552419c001db7be9320159.jpg', 0, 'In Stock', '2023-07-15 16:26:46', NULL, 2, NULL),
(25, 13, 40, 'TISSOT T 9312074133600', '265', 1500, 'Femme', 'TISSOT PRX 35MM POWERMATIC 80 STEEL & 18K GOLD BEZEL\r\nT931.207.41.336.00\r\nLa Tissot PRX se rapproche de son design iconique des années 1970. Avec un diamètre de 35mm, le boitier acier satiné et son bracelet intégré épouseront parfaitement le poignet de chacun. La lunette en or rose 18 carats apporte caractère et élégance à ce garde-temps.', '8a3faccfb21738345a2edab2151d6dd8.jpg', 0, 'In Stock', '2023-07-15 16:31:06', NULL, 2, NULL);


CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategoryName` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `subcategory` (`id`, `categoryid`, `subcategoryName`, `creationDate`, `updationDate`, `createdBy`) VALUES
(25, 10, 'Montres Homme', '2023-07-08 14:18:20', NULL, 2),
(26, 10, 'Montres Femme', '2023-07-08 14:18:43', NULL, 2),
(27, 10, 'Montres Enfant', '2023-07-08 14:19:28', NULL, 2),
(28, 11, 'Bijoux Femme', '2023-07-08 14:20:19', NULL, 2),
(29, 11, 'Chichkhan', '2023-07-08 14:20:41', NULL, 2),
(31, 11, 'Diamant', '2023-07-08 14:21:19', NULL, 2),
(32, 11, 'Bijoux Homme', '2023-07-08 14:21:35', NULL, 2),
(33, 11, 'Bijoux Enfant', '2023-07-08 14:21:47', NULL, 2),
(34, 12, 'Acier', '2023-07-11 18:34:46', NULL, 2),
(35, 12, 'Cuir', '2023-07-11 18:35:01', NULL, 2),
(36, 12, 'Plastique', '2023-07-11 18:36:17', NULL, 2),
(37, 12, 'Céramique', '2023-07-11 18:36:30', NULL, 2),
(38, 12, 'Gomme', '2023-07-11 18:36:50', NULL, 2),
(39, 12, 'Tissu', '2023-07-11 18:37:01', NULL, 2),
(40, 13, 'Acier', '2023-07-11 18:38:10', NULL, 2),
(41, 13, 'Cuir', '2023-07-11 18:38:26', NULL, 2),
(42, 13, 'Plastique', '2023-07-11 18:38:44', NULL, 2),
(43, 13, 'Céramique', '2023-07-11 18:38:54', NULL, 2),
(44, 13, 'Gomme', '2023-07-11 18:39:07', NULL, 2),
(45, 13, 'Tissu', '2023-07-11 18:39:16', NULL, 2),
(46, 13, 'Argent', '2023-07-11 18:39:48', NULL, 2),
(47, 14, 'Gomme', '2023-07-11 18:40:19', NULL, 2),
(48, 14, 'Plastique', '2023-07-11 18:40:35', NULL, 2),
(49, 14, 'Tissu', '2023-07-11 18:40:50', NULL, 2),
(50, 15, 'Série', '2023-07-11 18:42:04', NULL, 2),
(51, 15, 'Bague', '2023-07-11 18:42:37', NULL, 2),
(53, 15, 'Solitaire', '2023-07-11 18:44:47', NULL, 2),
(54, 15, 'Alliance', '2023-07-11 18:45:25', NULL, 2),
(55, 15, 'Pendentif', '2023-07-11 18:45:59', NULL, 2),
(56, 15, 'Bracelet', '2023-07-11 18:46:19', NULL, 2),
(57, 15, 'Gourmette', '2023-07-11 18:47:30', NULL, 2),
(58, 15, 'Chaine', '2023-07-11 18:48:02', NULL, 2),
(59, 15, 'Boucles D\'Oreilles', '2023-07-11 18:48:47', NULL, 2),
(60, 15, 'Broche', '2023-07-11 18:49:07', NULL, 2),
(61, 16, 'Série', '2023-07-11 18:49:39', NULL, 2),
(62, 16, 'Bague', '2023-07-11 18:49:50', NULL, 2),
(63, 16, 'Pendentif', '2023-07-11 18:50:25', NULL, 2),
(64, 16, 'Bracelet', '2023-07-11 18:50:44', NULL, 2),
(65, 16, 'Gourmette', '2023-07-11 18:51:02', NULL, 2),
(66, 16, 'Chaine', '2023-07-11 18:51:19', NULL, 2),
(67, 16, 'Boucle', '2023-07-11 18:51:36', NULL, 2),
(68, 16, 'Broche', '2023-07-11 18:51:53', NULL, 2),
(69, 17, 'Séries Diamant', '2023-07-11 18:52:46', NULL, 2),
(70, 17, 'Bague', '2023-07-11 18:53:06', NULL, 2),
(71, 17, 'Chaînes', '2023-07-11 18:53:44', NULL, 2),
(72, 18, 'Chaine', '2023-07-11 18:54:23', NULL, 2),
(73, 18, 'Bague', '2023-07-11 18:55:14', NULL, 2),
(74, 18, 'Gourmette', '2023-07-11 18:56:14', NULL, 2),
(75, 18, 'Gourmette', '2023-07-11 18:56:14', NULL, 2),
(76, 18, 'Accessoire', '2023-07-11 18:56:38', NULL, 2),
(77, 19, 'Bague', '2023-07-11 18:58:13', NULL, 2),
(78, 19, 'Bracelet', '2023-07-11 18:58:34', NULL, 2),
(79, 19, 'Gourmette', '2023-07-11 18:58:47', NULL, 2),
(80, 19, 'Pendentif', '2023-07-11 18:59:04', NULL, 2),
(81, 19, 'Boucle', '2023-07-11 18:59:24', NULL, 2);


CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 12345678, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2023-03-01 05:00:00'),
(2, 'Iyed', 'iyed_soumri', 53929964, 'iyed.soumri@gmail.com', '64ff582504d43206aaaa25544cb96002', '2023-03-01 06:00:00');


CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `tblorderaddresses` (
  `ID` int(10) NOT NULL,
  `UserId` int(5) DEFAULT NULL,
  `Ordernumber` int(10) DEFAULT NULL,
  `Flatnobuldngno` varchar(200) DEFAULT NULL,
  `StreetName` varchar(200) DEFAULT NULL,
  `Area` varchar(200) DEFAULT NULL,
  `Landmark` varchar(200) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Zipcode` int(10) DEFAULT NULL,
  `Phone` bigint(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `PaymentMethod` varchar(200) DEFAULT NULL,
  `OrderTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'À propos', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>Travail précis, méticuleux et exigeant une grande expertise, il met un point du honneur à choisir lui même les diamants et pierres précieuses qui seront utilisés lors de la confection des bijoux de notre bijouterie en ligne.</b></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Pour plus d\'information :', '07 Rue 2 Mars 1934, Bizerte 7000', 'iyed.soumri@gmail.com', 53929964, NULL, '08:30 am - 10:00 pm');


CREATE TABLE `tblreview` (
  `ID` int(10) NOT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `ReviewTitle` varchar(200) DEFAULT NULL,
  `Review` mediumtext DEFAULT NULL,
  `UserId` int(5) DEFAULT NULL,
  `DateofReview` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `tblsubscriber` (
  `ID` int(5) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `DateofSub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `tbltracking` (
  `ID` int(10) NOT NULL,
  `OrderId` char(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Password`, `regDate`) VALUES
(9, 'Iyed', 'Soumri', 'Iyed.soumri@gmail.com', 53929964, '66c388218fd64e59b1cb92fdc067c6e2', '2023-08-16 16:24:57'),
(10, 'client', '1', 'client@bijouxclick.com', 12345678, '62608e08adc29a8d6dbc9754e659f125', '2023-09-02 14:14:28');


CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltracking`
--
ALTER TABLE `tbltracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbltracking`
--
ALTER TABLE `tbltracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
