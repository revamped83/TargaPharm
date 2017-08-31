--
-- Database: 'TargaPharm'
--
CREATE DATABASE IF NOT EXISTS TargaPharm;
USE TargaPharm;

-- --------------------------------------------------------

--
-- Table structure for table 'item'
--

CREATE TABLE Item (
  ItID          int         NOT NULL AUTO_INCREMENT,
  ItName        varchar(50) DEFAULT NULL,
  ItCat         varchar(20) DEFAULT NULL,
  ItStockLevel  int         DEFAULT NULL,
  PRIMARY KEY     (ItID)
); 

--
-- Table structure for table 'restock'
--

CREATE TABLE StockPurchase (
  ItID            int         NOT NULL,
  TimeDate        datetime    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  ItQuantity      int         DEFAULT NULL,
  WholesalePrice  Decimal     DEFAULT NULL,
  PRIMARY KEY (ItID, TimeDate),
  FOREIGN KEY (ItID) REFERENCES Item (ItID)
); 

--
-- Table structure for table 'sale'
--

CREATE TABLE CustomerSale (
  ItID          int           NOT NULL,
  TimeDate      datetime      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  ItQuantity    int           DEFAULT NULL,
  RetailPrice   Decimal       DEFAULT NULL,
  PRIMARY KEY (ItID, TimeDate),
  FOREIGN KEY (ItID) REFERENCES Item (ItID)
  );


--
-- Dumping data for table 'item'
--

INSERT INTO Item (ItID, ItName, ItCat, ItStockLevel) VALUES
(1, 'Colgate Minty Toothpaste', 'Dental Hygiene', 20),
(2, 'Colgate Dental Tape', 'Dental Hygiene', 30),
(3, 'Band-aids - Standard', 'Wound Dressings', 20),
(4, 'Panadeine Capsules - 30 Box', 'Analgesic', 20),
(5, 'Rexona Sport - Women - Roll-on', 'Personal Hygiene', 20),
(6, 'Aspro-Clear Effervescent Tablets - 30 Box', 'Analgesic', 20);

-- --------------------------------------------------------


--
-- Insert data for table 'StockPurchase'
--

INSERT INTO StockPurchase (ItID, ItQuantity, WholesalePrice) VALUES
(1, 20, 1.50),
(2, 20, 1.12),
(3, 20, 3.50),
(4, 20, 2.24),
(5, 20, 2.80),
(6, 20, 2.44);

-- --------------------------------------------------------


--
-- Dumping data for table 'sale'
--

INSERT INTO CustomerSale (ItID, ItQuantity, RetailPrice) VALUES
(1, 1, 3),
(2, 1, 2.24),
(3, 2, 7),
(4, 1, 4.48),
(5, 1, 5.6),
(6, 2, 4.88);

