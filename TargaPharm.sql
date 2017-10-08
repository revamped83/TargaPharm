--
-- Database: 'TargaPharm'
--
CREATE DATABASE IF NOT EXISTS TargaPharm;
USE TargaPharm;

-- --------------------------------------------------------

--
-- Table structure for table 'Item'
-- Represents all items in inventory

CREATE TABLE Item (
  ItemID          int         NOT NULL AUTO_INCREMENT,
  ItName        varchar(50) DEFAULT NULL,
  ItCat         varchar(20) DEFAULT NULL,
  UnitPrice     Decimal(10,2)       NOT NULL,
  ItStockLevel  int         DEFAULT NULL,
  PRIMARY KEY     (ItemID)
); 

--
-- Table structure for table 'ItemPurchase'
-- Represents purchases from the wholesaler to restock inventory

CREATE TABLE ItemPurchase (
  ItemID            int         NOT NULL,
  TimeDate        datetime    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  ItQuantity      int         NOT NULL,
  WholesalePrice  Decimal(10,2)     NOT NULL,
  PRIMARY KEY (ItemID, TimeDate),
  FOREIGN KEY (ItemID) REFERENCES Item (ItemID)
); 

--
-- Table structure for table 'CustomerSale'
-- Keeps a record of each customer purchase, its date/time and receipt subtotal

CREATE TABLE CustomerSale (
  SaleID        int           NOT NULL,
  TimeDate      datetime      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  SubTotal      Decimal(10,2)       NOT NULL,
  PRIMARY KEY (SaleID)
  );


--
-- Table structure for table 'ItemSale'
-- Keeps a record of all the items in each sale to customer, their quantities and the retail price per unit

CREATE TABLE ItemSale (
  SaleID        int           NOT NULL,
  ItemID        int           NOT NULL,
  Quantity      int           DEFAULT NULL,
  PRIMARY KEY (ItemID, SaleID),
  FOREIGN KEY (SaleID) REFERENCES CustomerSale (SaleID),
  FOREIGN KEY (ItemID) REFERENCES Item (ItemID)
  );

--
-- Dumping data for table 'item'
--

INSERT INTO Item (ItemID, ItName, ItCat, UnitPrice, ItStockLevel) VALUES
(1, 'Colgate Minty Toothpaste', 'Dental Hygiene', 4.50, 20),
(2, 'Colgate Dental Tape', 'Dental Hygiene', 3.50, 30),
(3, 'Band-aids - Standard', 'Wound Dressings', 3.50, 20),
(4, 'Panadeine Capsules - 30 Box', 'Analgesic', 6.00, 20),
(5, 'Rexona Sport - Women - Roll-on', 'Personal Hygiene', 5.00, 20),
(6, 'Aspro-Clear Effervescent Tablets - 30 Box', 'Analgesic', 6.50, 20),
(7, 'Fishermans Friend Cough Drops', 'Throat Lozenge', 2.95, 20)
(8, 'Blackmores Vitamin E Cream 50G', 'Vitamins', 6.99, 5),
(9, 'Healthy Care Propolis 2000mg 200 Capsules', 'Vitamins', 19.99, 6),
(10, 'Healthy Care Grape Seed Extract 12000 Gold Jar 300 Capsules', 'Vitamins', 29.99, 20),
(11, 'Lucas Papaw Ointment 25g', 'Skin Care', 5.99, 8),
(12, 'Swisse Manuka Honey Detoxifying Facial Mask 70g', 'Skin Care', 9.00, 20),
(13, 'Ego QV Gentle Wash 1.25 Kg', 'Skin Care', 16.99, 20),
(14, 'Travel Minis For Men 4 Piece', 'Medicines', 9.99, 8),
(15, 'Panamax 500mg 100 Tablets', 'Medicines', 1.99, 20),
(16, 'Panadol Osteo 96 Caplets', 'Medicines', 4.99, 4),
(17, 'Healthy Care Fish Oil 1000mg 400 Capsules', 'Krill and Fish Oil', 12.99, 7),
(18, 'Blackmores Omega Triple Concentration Fish Oil 150 Capsules', 'Krill and Fish Oil', 25.99, 6),
(19, 'Swisse Ultiboost Deep Sea Krill Oil 500mg 60 Capsules', 'Krill and Fish Oil', 16.99, 20),
(20, 'Musashi Carnitine 500mg 60 Capsules', 'Sports Nutrition', 34.99, 8),
(21, 'Musashi P High Protein 900g Chocolate', 'Sports Nutrition', 44.99, 20),
(22, 'INC BCAA 120 Capsules', 'Sports Nutrition', 20.99, 4);

-- --------------------------------------------------------


--
-- Insert data for table 'ItemPurchase'
--

INSERT INTO ItemPurchase (ItemID, ItQuantity, WholesalePrice) VALUES
(1, 20, 1.50),
(2, 20, 1.12),
(3, 20, 3.50),
(4, 20, 2.24),
(5, 20, 2.80),
(6, 20, 2.44);

-- --------------------------------------------------------


--
-- Dumping data for table 'CustomerSale'
--

INSERT INTO CustomerSale (SaleID, SubTotal) VALUES
(1, 12.50),
(2, 5.00),
(3, 7.00),
(4, 2.95),
(5, 12.50),
(6, 45.00);

--
-- Dumping data for table 'ItemSale'
--

INSERT INTO ItemSale (SaleID, ItemID, Quantity) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 5, 1),
(3, 3, 2),
(4, 7, 1),
(5, 6, 1),
(5, 4, 1),
(6, 1, 10);

--
-- Dumping data for login
--

CREATE TABLE admin(
accName VARCHAR(30) PRIMARY KEY,
accPw VARCHAR(30) NOT NULL
);
CREATE TABLE staff(
accName VARCHAR(30) PRIMARY KEY,
accPw VARCHAR(30) NOT NULL
);
INSERT INTO admin (accName, accPw) VALUES ('root1','zaqwsx');
INSERT INTO staff (accName, accPw) VALUES ('staff2','123456');

CREATE TABLE accesslog(
accName VARCHAR(30),
time datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
accesslv varchar(5)
);