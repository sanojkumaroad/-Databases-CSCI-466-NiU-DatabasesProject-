--VRAMS
--Section2
--GROUP PROJECT 


-- SHOW CREATE DATABASE VRAMS;

--entities tables
CREATE TABLE User_Customer(CustomerID INT AUTO_INCREMENT PRIMARY KEY, Address VARCHAR(300), Password VARCHAR(35), Email VARCHAR(75), Phone_num VARCHAR(15), FirstName VARCHAR(50), LastName VARCHAR(50));
CREATE TABLE User_Employee(EmployeeID INT AUTO_INCREMENT PRIMARY KEY, Address VARCHAR(300), Password VARCHAR(10), Email VARCHAR(75), Phone_num INT(11), FirstName VARCHAR(50), LastName VARCHAR(50));

CREATE TABLE Products(ProductID INT AUTO_INCREMENT PRIMARY KEY, product_name VARCHAR(50), product_description VARCHAR(200), quantity INT, product_price FLOAT);

--         NOT WORKING
CREATE TABLE Order_Info(OrderID INT AUTO_INCREMENT PRIMARY KEY, CustomerID INT, ProductID INT, OrderDate VARCHAR(10), Status VARCHAR(20), TotalAmount FLOAT, FOREIGN KEY(CustomerID) REFERENCES User_Customer(CustomerID), FOREIGN KEY(ProductID) REFERENCES Products(ProductID));

--CREATE TABLE Order_Info(OrderID INT AUTO_INCREMENT, CustomerID INT, ProductID INT, OrderDate VARCHAR(10), Status VARCHAR(20), TotalAmount FLOAT, PRIMARY KEY (OrderID), FOREIGN KEY(CustomerID) REFERENCES UserCustomer(CustomerID), FOREIGN KEY(ProductID) REFERENCES product(ProductID));



CREATE TABLE Promo_Code(PromocodeID INT AUTO_INCREMENT PRIMARY KEY, discountpercent INT, ExpiryDate VARCHAR(10));

CREATE TABLE Order_Status(OrderStatID INT AUTO_INCREMENT PRIMARY KEY, ShippingPrice FLOAT, Carrier VARCHAR(20));

-- one-to-one relationship tables
-- HAVE NOT DONE YET
CREATE TABLE Order_Tracking(OrderID INT,  OrderStatID INT, ConfirmNumber INT NOT NULL UNIQUE, PRIMARY KEY (OrderID, OrderStatID), FOREIGN KEY(OrderID) REFERENCES Order_Info(OrderID), FOREIGN KEY(OrderStatID) REFERENCES Order_Status(OrderStatID));

CREATE TABLE Customer_Billing(OrderID INT PRIMARY KEY, CustomerID INT, CardName VARCHAR(50), CardNumber INT NOT NULL, CardExpiration VARCHAR(5), CVV VARCHAR(3), BillingAddress VARCHAR(300), FOREIGN KEY(CustomerID) REFERENCES User_Customer(CustomerID), FOREIGN KEY(OrderID) REFERENCES Order_Info(OrderID));

CREATE TABLE Order_Discount(OrderID INT, PromocodeID INT, PRIMARY KEY (OrderID, PromocodeID), FOREIGN KEY(OrderID) REFERENCES Order_Info(OrderID), FOREIGN KEY(PromocodeID) REFERENCES Promo_Code(PromocodeID));



-- Inserting 5 Customers


INSERT INTO User_Customer(Address, Password, Email, Phone_num, FirstName, LastName) VALUES ('245 S Lasalle Dr. Foolio, IL 69484', 'Thisasecret12!', 'sonnen@outlook.com', '412-338-1314', 'Lola', 'Ugfuglio Skumpy');
INSERT INTO User_Customer(Address, Password, Email, Phone_num, FirstName, LastName) VALUES ('6533 N Lizard St. Gerbert, FL 65674', 'DontLook1!', 'dowdy@comcast.net', '864-715-8919', 'Andrew', 'Glouberman');
INSERT INTO User_Customer(Address, Password, Email, Phone_num, FirstName, LastName) VALUES ('27 Chapel St. Freeport, NY 11520', 'TacoTuesday4!!', 'sonstupid@gmail.com', '13124351359', 'Byron', 'Yoluk');
INSERT INTO User_Customer(Address, Password, Email, Phone_num, FirstName, LastName) VALUES ('911 Elvis Blvd. Las Vegas, NV 56473', 'Password12345$!', 'mremailhaving@gmail.com', '15126541345', 'Maury', 'Beverly');
INSERT INTO User_Customer(Address, Password, Email, Phone_num, FirstName, LastName) VALUES ('137 Poopy Ave. Seattle, WA', 'DonthinkaboutIT3?', 'wubbalubbadubdub@space.net', '13416543675', 'Rick', 'Sanchez');
