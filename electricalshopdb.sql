CREATE DATABASE electricalshopdb;
USE electricalshopdb;

CREATE TABLE customer (
  `Customer_ID` int NOT NULL AUTO_INCREMENT,
  `Customer_Name` varchar(100) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`),
  UNIQUE KEY `Phone` (`Phone`)
) 
;


INSERT INTO customer
 VALUES
 (1,'Kusi Prince','0543333333','Kumasi'),
 (2,'Andoh M. Benjamin','0544444444','Accra')
 ;



CREATE TABLE inventory_book (
  `Inventory_ID` int NOT NULL AUTO_INCREMENT,
  `Product_ID` int NOT NULL,
  `Staff_ID` int NOT NULL,
  `Quantity` int NOT NULL,
  `Transaction_Date` datetime NOT NULL,
  PRIMARY KEY (`Inventory_ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `Staff_ID` (`Staff_ID`),
  CONSTRAINT `inventory_book_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`),
  CONSTRAINT `inventory_book_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`)
) 
;



INSERT INTO inventory_book
 VALUES 
 (2,2,1,80,'2026-07-12 00:00:00'),
 (3,3,1,100,'2026-07-12 00:00:00')
 ;


CREATE TABLE invoice (
  `Invoice_ID` int NOT NULL AUTO_INCREMENT,
  `Sale_ID` int NOT NULL,
  `Total_Amount` decimal(10,2) NOT NULL,
  `Invoice_Date` datetime NOT NULL,
  PRIMARY KEY (`Invoice_ID`),
  UNIQUE KEY `Sale_ID` (`Sale_ID`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`Sale_ID`) REFERENCES `sale` (`Sale_ID`)
) 
;



INSERT INTO invoice
 VALUES
 (1,1,4640.00,'2025-06-22 14:35:00'),
 (2,2,380.00,'2025-06-23 10:20:00');


CREATE TABLE payment (
  `Payment_ID` int NOT NULL AUTO_INCREMENT,
  `Invoice_ID` int NOT NULL,
  `Payment_Date` datetime NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Payment_Method` varchar(30) DEFAULT NULL,
  `Reference_No` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Payment_ID`),
  KEY `Invoice_ID` (`Invoice_ID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Invoice_ID`) REFERENCES `invoice` (`Invoice_ID`)
)
;


INSERT INTO payment 
VALUES 
(1,1,'2026-07-13 01:44:00',234.00,'Cash','PAY002'),
(3,2,'2025-06-23 10:30:00',380.00,'Cash','PAY003')
;

CREATE TABLE product (
  `Product_ID` int NOT NULL AUTO_INCREMENT,
  `Supplier_ID` int NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Unit_Price` decimal(10,2) NOT NULL,
  `Stock_Qty` int DEFAULT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `Supplier_ID` (`Supplier_ID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`)
) ;



INSERT INTO product 
VALUES 
(1,1,'HP Laptop',4500.00,12),
(2,1,'Wireless Mouse',120.00,70),
(3,2,'USB Flash Drive 32GB',80.00,100)
;


CREATE TABLE sale (
  `Sale_ID` int NOT NULL AUTO_INCREMENT,
  `Customer_ID` int NOT NULL,
  `Staff_ID` int NOT NULL,
  `Sale_Date` datetime NOT NULL,
  PRIMARY KEY (`Sale_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  KEY `Staff_ID` (`Staff_ID`),
  CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`)
) ;


INSERT INTO sale 
VALUES 
(1,1,2,'2025-06-22 14:30:00'),
(2,2,2,'2026-07-23 10:15:00')
;



CREATE TABLE sale_detail (
  `Sale_ID` int NOT NULL,
  `Product_ID` int NOT NULL,
  `Quantity` int NOT NULL,
  `Unit_Price` decimal(10,2) NOT NULL,
  `Discount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Sale_ID`,`Product_ID`),
  KEY `Product_ID` (`Product_ID`),
  CONSTRAINT `sale_detail_ibfk_1` FOREIGN KEY (`Sale_ID`) REFERENCES `sale` (`Sale_ID`),
  CONSTRAINT `sale_detail_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`)
) 
;


INSERT INTO sale_detail
 VALUES
 (1,1,1,4500.00,100.00),
 (1,2,2,120.00,0.00),
 (2,3,5,80.00,20.00)
 ;


CREATE TABLE staff (
  `Staff_ID` int NOT NULL AUTO_INCREMENT,
  `Staff_Name` varchar(100) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Staff_ID`),
  UNIQUE KEY `Phone` (`Phone`)
);



INSERT INTO staff
 VALUES 
(1,'Isaac Siaw','0551111111','Manager'),
(2,'Kusi Kwarteng','0552222266','Sales Officer')
;

CREATE TABLE supplier (
  `Supplier_ID` int NOT NULL AUTO_INCREMENT,
  `Supplier_Name` varchar(100) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Registration_Date` date DEFAULT NULL,
  PRIMARY KEY (`Supplier_ID`),
  UNIQUE KEY `Phone` (`Phone`)
)
;

INSERT INTO supplier
VALUES
 (1,'ABC Wholesale Ltd','0241234567','Kumasi','2025-01-10'),
 (2,'Bohyeba Electricals','0209876543','Accra','2025-02-15')
 ;

