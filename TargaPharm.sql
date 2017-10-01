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
(7, 'Fishermans Friend Cough Drops', 'Throat Lozenge', 2.95, 20);

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