-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2020 at 06:48 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15457855_grocerystore`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddCustomer` (IN `I_Phone_Number` INT, IN `I_Name` VARCHAR(255), IN `I_Email` VARCHAR(255))  BEGIN 
	INSERT INTO Customer 
    VALUES (I_Phone_Number, I_Name, I_Email);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddCustomerProfile` (IN `I_Phone_Number` INT, IN `I_CName` VARCHAR(255), IN `I_Address` VARCHAR(255), IN `I_Card_Num` INT)  MODIFIES SQL DATA
BEGIN 
	INSERT INTO Customer_Profile
    VALUES (I_Phone_Number, I_CName, I_Address, I_Card_Num);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddCustomerPurchase` (IN `I_Phone_Number` INT, IN `I_Name` VARCHAR(255), IN `I_PurchaseId` INT)  MODIFIES SQL DATA
BEGIN
	INSERT INTO Customer_Purchase(Phone_Number, Name, PurchaseId)
    VALUES (I_Phone_Number, I_Name, I_PurchaseId);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddItem` (IN `I_Id` INT, IN `I_Price` INT, IN `I_NameItem` VARCHAR(255))  MODIFIES SQL DATA
BEGIN 
	INSERT INTO Item
    VALUES (I_Id, I_Price, I_NameItem);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddNetIncome` (IN `I_Years` INT, IN `I_Months` INT, IN `I_Monthly_Cost` INT)  MODIFIES SQL DATA
BEGIN
	INSERT INTO NetIncome
    VALUES (I_Years,I_Months, I_Monthly_Cost);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddStoreOwner` (IN `I_Store_Location` VARCHAR(255), IN `I_Name` VARCHAR(255), IN `I_Address` VARCHAR(255), IN `I_Phone_Number` VARCHAR(255))  MODIFIES SQL DATA
Begin 
	Insert Into Store_Owner 
    VALUES(I_Store_Location, I_Name, I_Address, I_Phone_Number);
End$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddSupplier` (IN `I_NameSup` VARCHAR(255), IN `I_Address` VARCHAR(255))  MODIFIES SQL DATA
BEGIN 
	INSERT INTO Supplier
    VALUES(I_NameSup, I_Address);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddSupplierCatalogue` (IN `I_NameSup` VARCHAR(255), IN `I_ItemID` INT, IN `I_CatID` INT, IN `I_Price` INT, IN `I_NumAv` INT, IN `I_NameItem` VARCHAR(255))  MODIFIES SQL DATA
BEGIN 
	INSERT INTO Supplier_Catalogue
    VALUES(I_NameSup, I_ItemID, I_CatID, I_Price, I_NumAv,I_NameItem);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddSupplierPurchase` (IN `I_Store_Location` VARCHAR(255), IN `I_InvoiceNum` INT, IN `I_TimePurchase` DATE)  MODIFIES SQL DATA
BEGIN 
	INSERT INTO Supplier_Purchase
    VALUES (I_Store_Location, I_InvoiceNum, I_TimePurchase);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `AddToCart` (IN `I_Cust_Phone` INT, IN `I_Cust_Name` VARCHAR(255), IN `I_ItemID` INT)  MODIFIES SQL DATA
BEGIN 
	INSERT INTO In_Cart	
    VALUES (I_Cust_Phone, I_Cust_Name, I_ItemID);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `CaculateMoneyEarned` (IN `Years` INT, IN `Months` INT)  READS SQL DATA
BEGIN
	SELECT SUM(I.Price)
    From I as Item, Cp as Customer_Purchase, Cb as Customer_Buys
   	Where Cp.PurchaseId = Cb.PurchaseId and Cb.ItemId = I.ItemID and Years=YEAR(Cp.TimeofPurchase) and Months = MONTH(Cp.TimeofPurchase) ;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `CaculateMoneySpent` (IN `Years` INT, IN `Months` INT)  READS SQL DATA
BEGIN
	SELECT SUM(I.Price)
    From I as Item, Sp as Supplier_Purchase, Stor as Store_Owner_Purchase
   	Where Sp.InvoiceNum = Stor.InvoiceNum and Stor.ItemId = I.ItemID and Years=YEAR(Sp.Time_of_Purchase) and Months = MONTH(Sp.Time_of_Purchase) ;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetCartItems` (IN `phone` INT, IN `name` VARCHAR(255))  BEGIN
	Select ItemID From In_Cart Where Cust_Phone_Number = phone and Cust_Name = name;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetCustomerProfiles` ()  BEGIN
	Select * from Customer_Profile;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetCustomerPurchases` ()  READS SQL DATA
BEGIN
	Select * from Customer_Purchase;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetCustomers` ()  READS SQL DATA
BEGIN
	Select * from Customer;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetItems` ()  READS SQL DATA
BEGIN
	Select * from Item;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetMonthlyCost` (IN `Years` INT, IN `Months` INT)  NO SQL
BEGIN 
	SELECT NI.Monthly_Operating_Cost
    FROM NI as NetIncome
    WHERE NI.Year = Years and NI.Month = Months;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetNetIncomes` ()  READS SQL DATA
BEGIN
	Select * from NetIncome;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetStoreOwner` ()  READS SQL DATA
BEGIN
	Select * from Store_Owner;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetSupplierCatalogues` ()  READS SQL DATA
BEGIN
	Select * from Supplier_Catalogue;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetSupplierPurchases` ()  READS SQL DATA
BEGIN
	Select * from Supplier_Purchase;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `GetSuppliers` ()  READS SQL DATA
BEGIN
	Select * from Supplier;
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `MakeCustomerPurchase` (IN `Cust_N` VARCHAR(255), IN `Cust_P` INT, IN `PurchaseId` INT)  MODIFIES SQL DATA
BEGIN
	-- Keep track of last and first rows
    DECLARE lastRows INT DEFAULT 0;
    DECLARE startRows INT DEFAULT 0;
    
    -- Find how many items in cart
    SELECT COUNT(*) FROM In_Cart INTO lastRows;
    
    SET startRows=0;
    
    -- Make customerpurchase
   	Call AddCustomerPurchase(Cust_P, Cust_N, PurchaseId);
    
    WHILE startRows < lastRows DO
        IF (Cust_N = (SELECT Cust_Name FROM In_Cart LIMIT
		startRows ,1) 
    	and Cust_P =(SELECT Cust_Phone_Number FROM In_Cart LIMIT
		startRows ,1)) THEN
            INSERT INTO Customer_Buys
    		VALUES (Cust_P, Cust_N, PurchaseId,(SELECT ItemId FROM 						In_Cart LIMIT startRows ,1));
         END IF;
        SET startRows= startRows+1;
    END WHILE;
    
    -- Remove from cart
    Call RemoveFromCart(Cust_P, Cust_N);
END$$

CREATE DEFINER=`id15457855_cpscfinal`@`%` PROCEDURE `RemoveFromCart` (IN `Cust_P` INT, IN `Cust_N` VARCHAR(255))  NO SQL
BEGIN 
	DELETE FROM In_Cart WHERE Cust_Phone_Number = Cust_P and Cust_Name = Cust_N;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `Phone_Number` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Phone_Number`, `Name`, `Email`) VALUES
(1, 'k', 'works'),
(113, 'testproj', 'Hue@temp'),
(214, 'garth', 'api'),
(31231, 'asdf', 'something'),
(31231, 'gartest', 'pine'),
(31231, 'testing include', 'testing_include'),
(90323, 'ds', 'api'),
(123456, 'store_test', 'store@test.ca');

-- --------------------------------------------------------

--
-- Table structure for table `Customer_Buys`
--

CREATE TABLE `Customer_Buys` (
  `PhoneNum` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PurchaseId` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Customer_Buys`
--

INSERT INTO `Customer_Buys` (`PhoneNum`, `Name`, `PurchaseId`, `ItemID`) VALUES
(1, 'k', 5, 1),
(1, 'k', 32, 3),
(31231, 'asdf', 1, 1),
(31231, 'asdf', 1, 2),
(31231, 'asdf', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Customer_Profile`
--

CREATE TABLE `Customer_Profile` (
  `Phone_Number` int(11) NOT NULL,
  `CName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Card_Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Customer_Profile`
--

INSERT INTO `Customer_Profile` (`Phone_Number`, `CName`, `Address`, `Card_Num`) VALUES
(1, 'k', 'dsad', 23),
(214, 'garth', 'my house', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Customer_Purchase`
--

CREATE TABLE `Customer_Purchase` (
  `Phone_Number` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PurchaseId` int(11) NOT NULL,
  `TimeofPurchase` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Customer_Purchase`
--

INSERT INTO `Customer_Purchase` (`Phone_Number`, `Name`, `PurchaseId`, `TimeofPurchase`) VALUES
(1, 'k', 5, '2020-12-07'),
(1, 'k', 32, '2020-12-08'),
(31231, 'asdf', 1, '2020-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `In_Cart`
--

CREATE TABLE `In_Cart` (
  `Cust_Phone_Number` int(11) NOT NULL,
  `Cust_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ItemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `ItemID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Name_of_Item` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`ItemID`, `Price`, `Name_of_Item`) VALUES
(1, 20, 'milk'),
(2, 20, 'soy milk'),
(3, 15, 'almond milk'),
(4, 15, 'water'),
(23, 11, 'chips'),
(78, 11, 'plum pudding'),
(231, 20, 'dead sheep');

-- --------------------------------------------------------

--
-- Table structure for table `NetIncome`
--

CREATE TABLE `NetIncome` (
  `Year` int(11) NOT NULL,
  `Month` int(11) NOT NULL,
  `Monthly_Operating_Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `NetIncome`
--

INSERT INTO `NetIncome` (`Year`, `Month`, `Monthly_Operating_Cost`) VALUES
(2020, 11, 12),
(2020, 12, 30);

-- --------------------------------------------------------

--
-- Table structure for table `Order_From_Sup`
--

CREATE TABLE `Order_From_Sup` (
  `Store_Location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name_of_Supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Person` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Contact_Number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Order_From_Sup`
--

INSERT INTO `Order_From_Sup` (`Store_Location`, `Name_of_Supplier`, `Contact_Person`, `Contact_Number`) VALUES
('calgary', 'bob', 'joe', '403 123 45676');

-- --------------------------------------------------------

--
-- Table structure for table `Recieves_Cat`
--

CREATE TABLE `Recieves_Cat` (
  `Store_Location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name_of_Supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ItemID` int(11) NOT NULL,
  `CatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Recieves_Cat`
--

INSERT INTO `Recieves_Cat` (`Store_Location`, `Name_of_Supplier`, `ItemID`, `CatID`) VALUES
('calgary', 'bob', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Store_Owner`
--

CREATE TABLE `Store_Owner` (
  `Store_Location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone_Number` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Store_Owner`
--

INSERT INTO `Store_Owner` (`Store_Location`, `Name`, `Address`, `Phone_Number`) VALUES
('calgary', 'fred', 'house', '11'),
('london', 'jack', 'palace', '999');

-- --------------------------------------------------------

--
-- Table structure for table `Store_Owner_Purchase`
--

CREATE TABLE `Store_Owner_Purchase` (
  `Store_Location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `InvoiceNum` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `NameSup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sup_ItemID` int(11) NOT NULL,
  `CatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Store_Owner_Purchase`
--

INSERT INTO `Store_Owner_Purchase` (`Store_Location`, `InvoiceNum`, `ItemId`, `NameSup`, `Sup_ItemID`, `CatID`) VALUES
('calgary', 1, 1, 'bob', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE `Supplier` (
  `Name_of_Supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`Name_of_Supplier`, `Address`) VALUES
('bob', 'house'),
('coca cola', 'everywhere');

-- --------------------------------------------------------

--
-- Table structure for table `Supplier_Catalogue`
--

CREATE TABLE `Supplier_Catalogue` (
  `NameSupplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ItemID` int(11) NOT NULL,
  `CatID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `NumAvailable` int(11) DEFAULT NULL,
  `Name_of_item` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Supplier_Catalogue`
--

INSERT INTO `Supplier_Catalogue` (`NameSupplier`, `ItemID`, `CatID`, `Price`, `NumAvailable`, `Name_of_item`) VALUES
('bob', 1, 1, 20, 5, 'milk'),
('bob', 2, 1, 3, 12, 'worse milk'),
('bob', 3, 1, 1, 12, 'worser milk');

-- --------------------------------------------------------

--
-- Table structure for table `Supplier_Purchase`
--

CREATE TABLE `Supplier_Purchase` (
  `Store_Location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `InvoiceNum` int(11) NOT NULL,
  `Time_of_Purchase` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Supplier_Purchase`
--

INSERT INTO `Supplier_Purchase` (`Store_Location`, `InvoiceNum`, `Time_of_Purchase`) VALUES
('calgary', 1, '2020-12-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Phone_Number`,`Name`),
  ADD UNIQUE KEY `Name_2` (`Name`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `Customer_Buys`
--
ALTER TABLE `Customer_Buys`
  ADD PRIMARY KEY (`PhoneNum`,`Name`,`PurchaseId`,`ItemID`),
  ADD KEY `Name` (`Name`),
  ADD KEY `PurchaseId` (`PurchaseId`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `Customer_Profile`
--
ALTER TABLE `Customer_Profile`
  ADD PRIMARY KEY (`Phone_Number`,`CName`),
  ADD KEY `work` (`CName`);

--
-- Indexes for table `Customer_Purchase`
--
ALTER TABLE `Customer_Purchase`
  ADD PRIMARY KEY (`Phone_Number`,`Name`,`PurchaseId`),
  ADD KEY `Name` (`Name`),
  ADD KEY `PurchaseId` (`PurchaseId`);

--
-- Indexes for table `In_Cart`
--
ALTER TABLE `In_Cart`
  ADD PRIMARY KEY (`Cust_Phone_Number`,`Cust_Name`,`ItemID`),
  ADD KEY `Cust_Name` (`Cust_Name`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `NetIncome`
--
ALTER TABLE `NetIncome`
  ADD PRIMARY KEY (`Year`,`Month`),
  ADD KEY `Year` (`Year`),
  ADD KEY `Month` (`Month`);

--
-- Indexes for table `Order_From_Sup`
--
ALTER TABLE `Order_From_Sup`
  ADD PRIMARY KEY (`Store_Location`,`Name_of_Supplier`),
  ADD KEY `Name_of_Supplier` (`Name_of_Supplier`);

--
-- Indexes for table `Recieves_Cat`
--
ALTER TABLE `Recieves_Cat`
  ADD PRIMARY KEY (`Store_Location`,`Name_of_Supplier`,`ItemID`,`CatID`),
  ADD KEY `Name_of_Supplier` (`Name_of_Supplier`),
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `CatID` (`CatID`);

--
-- Indexes for table `Store_Owner`
--
ALTER TABLE `Store_Owner`
  ADD PRIMARY KEY (`Store_Location`),
  ADD KEY `Store_Location` (`Store_Location`);

--
-- Indexes for table `Store_Owner_Purchase`
--
ALTER TABLE `Store_Owner_Purchase`
  ADD PRIMARY KEY (`Store_Location`,`InvoiceNum`,`ItemId`,`NameSup`,`Sup_ItemID`,`CatID`),
  ADD KEY `ItemId` (`ItemId`),
  ADD KEY `NameSup` (`NameSup`),
  ADD KEY `Sup_ItemID` (`Sup_ItemID`),
  ADD KEY `CatID` (`CatID`),
  ADD KEY `wo0rks` (`InvoiceNum`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`Name_of_Supplier`),
  ADD KEY `Name_of_Supplier` (`Name_of_Supplier`);

--
-- Indexes for table `Supplier_Catalogue`
--
ALTER TABLE `Supplier_Catalogue`
  ADD PRIMARY KEY (`NameSupplier`,`ItemID`,`CatID`),
  ADD KEY `CatID` (`CatID`),
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `NameSupplier` (`NameSupplier`);

--
-- Indexes for table `Supplier_Purchase`
--
ALTER TABLE `Supplier_Purchase`
  ADD PRIMARY KEY (`Store_Location`,`InvoiceNum`),
  ADD KEY `InvoiceNum` (`InvoiceNum`),
  ADD KEY `Store_Location` (`Store_Location`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Customer_Buys`
--
ALTER TABLE `Customer_Buys`
  ADD CONSTRAINT `Customer_Buys_ibfk_1` FOREIGN KEY (`PhoneNum`) REFERENCES `Customer` (`Phone_Number`),
  ADD CONSTRAINT `Customer_Buys_ibfk_2` FOREIGN KEY (`Name`) REFERENCES `Customer` (`Name`),
  ADD CONSTRAINT `Customer_Buys_ibfk_3` FOREIGN KEY (`PurchaseId`) REFERENCES `Customer_Purchase` (`PurchaseId`),
  ADD CONSTRAINT `Customer_Buys_ibfk_4` FOREIGN KEY (`ItemID`) REFERENCES `Item` (`ItemID`);

--
-- Constraints for table `Customer_Profile`
--
ALTER TABLE `Customer_Profile`
  ADD CONSTRAINT `Customer_Profile_ibfk_1` FOREIGN KEY (`Phone_Number`) REFERENCES `Customer` (`Phone_Number`),
  ADD CONSTRAINT `work` FOREIGN KEY (`CName`) REFERENCES `Customer` (`Name`);

--
-- Constraints for table `Customer_Purchase`
--
ALTER TABLE `Customer_Purchase`
  ADD CONSTRAINT `Customer_Purchase_ibfk_1` FOREIGN KEY (`Phone_Number`) REFERENCES `Customer` (`Phone_Number`),
  ADD CONSTRAINT `Customer_Purchase_ibfk_2` FOREIGN KEY (`Name`) REFERENCES `Customer` (`Name`);

--
-- Constraints for table `In_Cart`
--
ALTER TABLE `In_Cart`
  ADD CONSTRAINT `In_Cart_ibfk_1` FOREIGN KEY (`Cust_Phone_Number`) REFERENCES `Customer` (`Phone_Number`),
  ADD CONSTRAINT `In_Cart_ibfk_2` FOREIGN KEY (`Cust_Name`) REFERENCES `Customer` (`Name`),
  ADD CONSTRAINT `In_Cart_ibfk_3` FOREIGN KEY (`ItemID`) REFERENCES `Item` (`ItemID`);

--
-- Constraints for table `Order_From_Sup`
--
ALTER TABLE `Order_From_Sup`
  ADD CONSTRAINT `Order_From_Sup_ibfk_1` FOREIGN KEY (`Store_Location`) REFERENCES `Store_Owner` (`Store_Location`),
  ADD CONSTRAINT `Order_From_Sup_ibfk_2` FOREIGN KEY (`Name_of_Supplier`) REFERENCES `Supplier` (`Name_of_Supplier`);

--
-- Constraints for table `Recieves_Cat`
--
ALTER TABLE `Recieves_Cat`
  ADD CONSTRAINT `Recieves_Cat_ibfk_1` FOREIGN KEY (`Store_Location`) REFERENCES `Store_Owner` (`Store_Location`),
  ADD CONSTRAINT `Recieves_Cat_ibfk_2` FOREIGN KEY (`Name_of_Supplier`) REFERENCES `Supplier` (`Name_of_Supplier`),
  ADD CONSTRAINT `Recieves_Cat_ibfk_3` FOREIGN KEY (`ItemID`) REFERENCES `Item` (`ItemID`),
  ADD CONSTRAINT `Recieves_Cat_ibfk_4` FOREIGN KEY (`CatID`) REFERENCES `Supplier_Catalogue` (`CatID`);

--
-- Constraints for table `Store_Owner_Purchase`
--
ALTER TABLE `Store_Owner_Purchase`
  ADD CONSTRAINT `Store_Owner_Purchase_ibfk_1` FOREIGN KEY (`Store_Location`) REFERENCES `Store_Owner` (`Store_Location`),
  ADD CONSTRAINT `Store_Owner_Purchase_ibfk_2` FOREIGN KEY (`ItemId`) REFERENCES `Item` (`ItemID`),
  ADD CONSTRAINT `Store_Owner_Purchase_ibfk_3` FOREIGN KEY (`NameSup`) REFERENCES `Supplier` (`Name_of_Supplier`),
  ADD CONSTRAINT `Store_Owner_Purchase_ibfk_4` FOREIGN KEY (`Sup_ItemID`) REFERENCES `Supplier_Catalogue` (`ItemID`),
  ADD CONSTRAINT `Store_Owner_Purchase_ibfk_5` FOREIGN KEY (`CatID`) REFERENCES `Supplier_Catalogue` (`CatID`),
  ADD CONSTRAINT `wo0rks` FOREIGN KEY (`InvoiceNum`) REFERENCES `Supplier_Purchase` (`InvoiceNum`);

--
-- Constraints for table `Supplier_Catalogue`
--
ALTER TABLE `Supplier_Catalogue`
  ADD CONSTRAINT `Supplier_Catalogue_ibfk_1` FOREIGN KEY (`NameSupplier`) REFERENCES `Supplier` (`Name_of_Supplier`);

--
-- Constraints for table `Supplier_Purchase`
--
ALTER TABLE `Supplier_Purchase`
  ADD CONSTRAINT `Supplier_Purchase_ibfk_1` FOREIGN KEY (`Store_Location`) REFERENCES `Store_Owner` (`Store_Location`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
