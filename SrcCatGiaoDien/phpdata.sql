

DROP DATABASE IF EXISTS phpdata;
CREATE DATABASE phpdata CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE phpdata;

CREATE TABLE Brands (brand_id INT PRIMARY KEY AUTO_INCREMENT, brand_name VARCHAR(100) NOT NULL, logo VARCHAR(255)) ENGINE=InnoDB;
CREATE TABLE Categories (category_id INT PRIMARY KEY AUTO_INCREMENT, category_name VARCHAR(100) NOT NULL, is_active TINYINT(1) DEFAULT 1) ENGINE=InnoDB;
CREATE TABLE Users (user_id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) UNIQUE NOT NULL, email VARCHAR(255) UNIQUE NOT NULL, password VARCHAR(255) NOT NULL, full_name VARCHAR(255), phone VARCHAR(20), address TEXT, role ENUM('admin','customer') DEFAULT 'customer', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB;
CREATE TABLE Products (product_id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255) NOT NULL, slug VARCHAR(255) UNIQUE NOT NULL, description TEXT, price DECIMAL(15,2) NOT NULL, stock_quantity INT DEFAULT 0, brand_id INT, category_id INT, is_active TINYINT(1) DEFAULT 1, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (brand_id) REFERENCES Brands(brand_id) ON DELETE SET NULL, FOREIGN KEY (category_id) REFERENCES Categories(category_id) ON DELETE SET NULL) ENGINE=InnoDB;
CREATE TABLE Product_Images (image_id INT PRIMARY KEY AUTO_INCREMENT, product_id INT NOT NULL, image_url VARCHAR(500) NOT NULL, is_main TINYINT(1) DEFAULT 0, FOREIGN KEY (product_id) REFERENCES Products(product_id) ON DELETE CASCADE) ENGINE=InnoDB;
CREATE TABLE Cart_Items (cart_id INT PRIMARY KEY AUTO_INCREMENT, user_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL DEFAULT 1, FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE, FOREIGN KEY (product_id) REFERENCES Products(product_id) ON DELETE CASCADE, UNIQUE KEY unique_user_product (user_id, product_id)) ENGINE=InnoDB;
CREATE TABLE Orders (order_id INT PRIMARY KEY AUTO_INCREMENT, user_id INT NOT NULL, customer_name VARCHAR(255) NOT NULL, phone VARCHAR(20) NOT NULL, address TEXT NOT NULL, total_amount DECIMAL(15,2) NOT NULL, status ENUM('pending','processing','shipped','delivered','cancelled') DEFAULT 'pending', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE) ENGINE=InnoDB;
CREATE TABLE Order_Items (order_item_id INT PRIMARY KEY AUTO_INCREMENT, order_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, price_at_purchase DECIMAL(15,2) NOT NULL, FOREIGN KEY (order_id) REFERENCES Orders(order_id) ON DELETE CASCADE, FOREIGN KEY (product_id) REFERENCES Products(product_id) ON DELETE CASCADE) ENGINE=InnoDB;
CREATE TABLE Payments (payment_id INT PRIMARY KEY AUTO_INCREMENT, order_id INT NOT NULL, method VARCHAR(50) NOT NULL, amount DECIMAL(15,2) NOT NULL, status ENUM('pending','completed','failed') DEFAULT 'pending', paid_at TIMESTAMP NULL, FOREIGN KEY (order_id) REFERENCES Orders(order_id) ON DELETE CASCADE, UNIQUE(order_id)) ENGINE=InnoDB;



INSERT INTO Brands (brand_name) VALUES 
('Nike'),('Adidas'),('Converse'),('Vans'),('Bitis Hunter'),('Puma'),('New Balance'),('Gucci'),('MLB'),('Jordan');

INSERT INTO Categories (category_name) VALUES 
('Giày thể thao'),('Giày sneaker'),('Giày sandal'),('Dép lê'),('Giày cao gót'),('Giày lười - loafer');

INSERT INTO Users (username,email,password,full_name,phone,address,role) VALUES
('admin','admin@shopgiay.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Quản Trị Viên','0901234567','FPT Polytechnic','admin'),
('khach1','khach1@gmail.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Nguyễn Văn Khách','0901112223','Quận 1, HCM','customer'),
('khach2','khach2@gmail.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Trần Thị B','0912345678','Quận 7, HCM','customer');

INSERT INTO Products (name,slug,description,price,stock_quantity,brand_id,category_id,is_active) VALUES
('Nike Air Force 1 White','nike-air-force-1-white','Classic trắng full size 36-43',1350000,50,1,1,1),
('Adidas Ultraboost 23','adidas-ultraboost-23','Đế boost cực êm',4200000,30,2,1,1),
('Converse Chuck 70 High Black','converse-chuck-70-high','Huyền thoại cổ cao',1650000,80,3,2,1),
('Vans Old Skool Black','vans-old-skool-black','Best seller mọi thời đại',1450000,100,4,2,1),
('Bitis Hunter X Đỏ','bitis-hunter-x-do','Giày quốc dân Việt Nam',750000,200,5,1,1),
('Dép Nike Benassi','dep-nike-benassi','Dép quai ngang êm ái',650000,150,1,4,1),
('Gucci Ace Sneaker Bee','gucci-ace-bee','Hàng hiệu ong vàng',18500000,5,8,2,1),
('MLB Chunky Liner New York','mlb-chunky-ny','Giày độn đế hot trend',2850000,40,9,2,1),
('Jordan 1 Retro High OG','jordan-1-high-og','Siêu phẩm bóng rổ',8500000,15,10,1,1),
('Adidas Stan Smith White Green','adidas-stan-smith','Classic trắng sọc xanh',2150000,60,2,2,1);

INSERT INTO Product_Images (product_id,image_url,is_main) VALUES
(1,'giay/af1-white-1.jpg',1),(1,'giay/af1-white-2.jpg',0),
(2,'giay/ultraboost-1.jpg',1),
(3,'giay/chuck70-black-1.jpg',1),
(4,'giay/vans-oldskool-1.jpg',1),
(5,'giay/bitis-hunter-do-1.jpg',1),
(9,'giay/jordan1-1.jpg',1);

INSERT INTO Cart_Items (user_id,product_id,quantity) VALUES (2,1,2),(2,4,1);

INSERT INTO Orders (user_id,customer_name,phone,address,total_amount,status) VALUES
(2,'Trần Thị B','0912345678','123 Lê Lợi, Quận 1, TP.HCM',4150000,'processing');

INSERT INTO Order_Items (order_id,product_id,quantity,price_at_purchase) VALUES
(1,1,2,1350000),(1,4,1,1450000);

INSERT INTO Payments (order_id,method,amount,status,paid_at) VALUES
(1,'momo',4150000,'completed',NOW());

SELECT 'XONG 100%! Shop giày dép đã sẵn sàng demo thầy cô, đẹp lung linh luôn ạ!' AS HoanThanh;