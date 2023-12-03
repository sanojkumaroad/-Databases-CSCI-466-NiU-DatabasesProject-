-- CSCI 466-2 | Databases
-- Group Name: VRAMS
-- Project Name: Online Shoe Store 

--> Wipes the data and delete all the tables at once.
--> DROP TABLE IF EXISTS Order_Tracking, Customer_Billing, Order_Discount, Order_Info, Promo_Code, Order_Status, Products, User_Employee, User_Customer;

--> Creating Entity Tables
CREATE TABLE User_Customer(CustomerID INT AUTO_INCREMENT PRIMARY KEY, Address VARCHAR(300), Password VARCHAR(35), Email VARCHAR(75), PhoneNumber VARCHAR(15), FirstName VARCHAR(50), LastName VARCHAR(50));
CREATE TABLE User_Employee(EmployeeID INT AUTO_INCREMENT PRIMARY KEY, Address VARCHAR(300), Password VARCHAR(10), Email VARCHAR(75), PhoneNumber VARCHAR(15), FirstName VARCHAR(50), LastName VARCHAR(50));
CREATE TABLE Products(ProductID INT AUTO_INCREMENT PRIMARY KEY, ProductName VARCHAR(50), ProductDescription VARCHAR(200), Qty INT, ProductPrice FLOAT);
CREATE TABLE Orders(OrderID INT AUTO_INCREMENT PRIMARY KEY, CustomerID INT, OrderDate DATETIME, OrderTotal FLOAT, OrderStatus VARCHAR(50), FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID));
CREATE TABLE Order_Item(OrderItemID INT AUTO_INCREMENT PRIMARY KEY, OrderID INT, ProductID INT, ItemQty INT, SUBTOTAL FLOAT, FOREIGN KEY (OrderID) REFERENCES Orders(OrderID), FOREIGN KEY (ProductID) REFERENCES Products(ProductID));
CREATE TABLE Promo_Code(PromoCodeID INT AUTO_INCREMENT PRIMARY KEY, DiscountPercent INT, ExpiryDate VARCHAR(10));

--> Creating 1-1 Relationship Tables
CREATE TABLE Order_Tracking(TrackingID VARCHAR(11) PRIMARY KEY, OrderID INT, TrackingStatus VARCHAR(50), LastUpdateDate DATETIME, FOREIGN KEY (OrderID) REFERENCES Orders(OrderID));
CREATE TABLE Customer_Billing(OrderID INT PRIMARY KEY, CustomerID INT, CardName VARCHAR(50), CardNumber INT NOT NULL, CardExpiration VARCHAR(5), CVV VARCHAR(3), BillingAddress VARCHAR(300), FOREIGN KEY(CustomerID) REFERENCES User_Customer(CustomerID), FOREIGN KEY(OrderID) REFERENCES Order_Info(OrderID));
CREATE TABLE Order_Discount(OrderID INT, PromoCodeID INT, PRIMARY KEY (OrderID, PromoCodeID), FOREIGN KEY(OrderID) REFERENCES Order_Info(OrderID), FOREIGN KEY(PromoCodeID) REFERENCES Promo_Code(PromoCodeID));

--> Inserting 5 Customers
-- (CustomerID, Address, Password, Email, PhoneNumber, FirstName, LastName);
INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) VALUES ('245 S Lasalle Dr. Foolio, IL 69484', 'Thisasecret12!', 'sonnen@outlook.com', '412-338-1314', 'Lola', 'Ugfuglio Skumpy');
INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) VALUES ('6533 N Lizard St. Gerbert, FL 65674', 'DontLook1!', 'dowdy@comcast.net', '864-715-8919', 'Andrew', 'Glouberman');
INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) VALUES ('27 Chapel St. Freeport, NY 11520', 'TacoTuesday4!!', 'sonstupid@gmail.com', '13124351359', 'Byron', 'Yoluk');
INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) VALUES ('911 Elvis Blvd. Las Vegas, NV 56473', 'Password12345$!', 'mremailhaving@gmail.com', '15126541345', 'Maury', 'Beverly');
INSERT INTO User_Customer(Address, Password, Email, PhoneNumber, FirstName, LastName) VALUES ('137 Poopy Ave. Seattle, WA', 'DonthinkaboutIT3?', 'wubbalubbadubdub@space.net', '13416543675', 'Rick', 'Sanchez');

--> Inserting 20 Products
-- Products(ProductID, ProductName, ProductDescription, Qty, ProductPrice);
--1 Inserting Classic Sneakers
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Classic Sneakers', 'Timeless white sneakers with a comfortable and stylish design', 100, 50.00);

--2 Inserting Running Pro 3000
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Running Pro 3000', 'High-performance running shoes with advanced cushioning', 75, 80.00);

--3 Inserting Elegant Loafers
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Elegant Loafers', 'Black leather loafers suitable for formal and casual wear', 50, 60.00);

--4 Inserting Trailblazer Hiking
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Trailblazer Hiking', 'Durable hiking boots designed for rough terrains', 40, 90.00);

--5 Inserting Retro Basketball
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Retro Basketball', 'Vintage-style basketball shoes for a classic look', 60, 75.00);

--6 Inserting Yoga Flex Sandals
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Yoga Flex Sandals', 'Flexible sandals ideal for yoga and other low-impact exercises', 120, 40.00);

--7 Inserting Urban Street Boots
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Urban Street Boots', 'Trendy ankle boots perfect for urban street fashion', 80, 70.00);

--8 Inserting Tech Runner
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Tech Runner', 'Technologically advanced running shoes for serious athletes', 90, 100.00);

--9 Inserting Ballet Flats
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Ballet Flats', 'Comfortable and stylish flats for a touch of elegance', 110, 45.00);

--10 Inserting Soccer Pro Elite
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Soccer Pro Elite', 'Professional-grade soccer cleats for optimal performance', 30, 120.00);

--11 Inserting Slip-on Comfort
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Slip-on Comfort', 'Casual slip-on shoes with memory foam insoles for comfort', 70, 55.00);

--12 Inserting Snow Explorer Boots
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Snow Explorer Boots', 'Insulated boots designed for winter weather exploration', 35, 110.00);

--13 Inserting Summer Breeze Sandals
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Summer Breeze Sandals', 'Breathable sandals perfect for hot summer days', 95, 30.00);

--14 Inserting High-Fashion Heels
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('High-Fashion Heels', 'Stylish high heels for a glamorous night out', 55, 85.00);

--15 Inserting CrossFit Trainer
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('CrossFit Trainer', 'Versatile training shoes suitable for various workouts', 65, 75.00);

--16 Inserting Canvas Slip-ons
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Canvas Slip-ons', 'Lightweight and breathable slip-on shoes for casual wear', 85, 35.00);

--17 Inserting Skateboard Pro
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Skateboard Pro', 'Sturdy skateboard shoes with reinforced soles', 45, 65.00);

--18 Inserting Weekend Explorer
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Weekend Explorer', 'Comfortable and rugged shoes for weekend outdoor adventures', 25, 95.00);

--19 Inserting Business Casual Oxfords
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('Business Casual Oxfords', 'Classy oxfords suitable for business casual occasions', 50, 80.00);

--20 Inserting All-Terrain Sandals
INSERT INTO Products(ProductName, ProductDescription, Qty, ProductPrice)
VALUES ('All-Terrain Sandals', 'Sandals with grippy soles for all-terrain use', 60, 50.00);
