//Vanessa Cortez-Ocon
//Section2
//GROUP PROJECT 


SHOW CREATE DATABASE VRAMS;

//entities tables
CREATE TABLE UserCustomer(CustomerID INT AUTO_INCREMENT PRIMARY KEY, Address VARCHAR(300), Password VARCHAR(10), Email VARCHAR(75), Phone_num INT(11), FirstName VARCHAR(50), LastName VARCHAR(50));
CREATE TABLE UseEmployee(EmployeeID INT AUTO_INCREMENT PRIMARY KEY, Address VARCHAR(300), Password VARCHAR(10), Email VARCHAR(75), Phone_num INT(11), FirstName VARCHAR(50), LastName VARCHAR(50));

CREATE TABLE Product(ProductID INT AUTO_INCREMENT PRIMARY KEY, ProductName VARCHAR(50), Description VARCHAR(200), Price FLOAT, stockQuantity INT);

CREATE TABLE Order(OrderID INT AUTO_INCREMENT PRIMARY KEY, CustomerID INT, ProductID INT, OrderDate VARCHAR(10), Status VARCHAR(20), TotalAmount FLOAT, FOREIGN KEY(CustomerID) REFERENCES UserCustomer(CustomerID), FOREIGN KEY(ProductID) REFERENCES Product(ProductID));

CREATE TABLE PromoCode(PromocodeID INT AUTO_INCREMENT PRIMARY KEY, code VARCHAR(5), discountpercent INT, ExpiryDate VARCHAR(10));

CREATE TABLE OrderStatus(OrderStatID INT AUTO_INCREMENT PRIMARY KEY, ShippingPrice FLOAT, Carrier VARCHAR(20), TrackingID INT)

//one-to-one relationship tables

CREATE TABLE OrderTracking(OrderID INT PRIMARY KEY,  OrderStatID INT PRIMARY KEY, ConfirmNumber INT NOT NULL UNIQUE, FOREIGN KEY(OrderID) REFERENCES Orderinfo(OrderID), FOREIGN KEY(OrderStatID) REFERENCES OrderStatus(OrderStatID));

CREATE TABLE CustumerBilling(OrderID INT PRIMARY KEY, CustomerID INT, CardName VARCHAR(50), CardNumber INT NOT NULL, CardExpiration VARCHAR(5), CVV VARCHAR(3), BillingAddress VARCHAR(300) FOREIGN KEY(CustomerID) REFERENCES UserCustomer(CustomerID), FOREIGN KEY(OrderID) REFERENCES Order(OrderID));

CREATE TABLE OrderDiscount(OrderID INT PRIMARY KEY, PromocodeID INT PRIMARY KEY, FOREIGN KEY(OrderID) REFERENCES Order(OrderID), FOREIGN KEY(PromocodeID) REFERENCES PromoCode(PromocodeID) )
