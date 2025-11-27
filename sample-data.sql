-- ========================================
-- DỮ LIỆU MẪU CHO SHOP GIÀY
-- Database: duan1
-- ========================================

-- Xóa dữ liệu cũ (nếu có)
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE order_items;
TRUNCATE TABLE orders;
TRUNCATE TABLE products;
TRUNCATE TABLE users;
SET FOREIGN_KEY_CHECKS = 1;

-- ========================================
-- TABLE: users
-- ========================================
INSERT INTO users (id, name, email, role, created_at) VALUES
(1, 'Admin User', 'admin@shopgiay.com', 'admin', DATE_SUB(NOW(), INTERVAL 90 DAY)),
(2, 'Nguyễn Văn An', 'nguyenvanan@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 25 DAY)),
(3, 'Trần Thị Bình', 'tranthibinh@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 20 DAY)),
(4, 'Lê Văn Cường', 'levancuong@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 18 DAY)),
(5, 'Phạm Thị Dung', 'phamthidung@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 15 DAY)),
(6, 'Hoàng Văn Em', 'hoangvanem@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 12 DAY)),
(7, 'Vũ Thị Phương', 'vuthiphuong@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 10 DAY)),
(8, 'Đỗ Văn Giang', 'dovangiang@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 8 DAY)),
(9, 'Bùi Thị Hà', 'buithiha@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 6 DAY)),
(10, 'Ngô Văn Inh', 'ngovaninh@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 4 DAY)),
(11, 'Đinh Thị Khánh', 'dinhthikhanh@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 2 DAY)),
(12, 'Trương Văn Long', 'truongvanlong@gmail.com', 'customer', DATE_SUB(NOW(), INTERVAL 1 DAY));

-- ========================================
-- TABLE: products
-- ========================================
INSERT INTO products (id, name, price, image, created_at) VALUES
(1, 'Nike Air Max 270', 3500000, 'nike-air-max-270.jpg', DATE_SUB(NOW(), INTERVAL 120 DAY)),
(2, 'Adidas Ultraboost 21', 4200000, 'adidas-ultraboost.jpg', DATE_SUB(NOW(), INTERVAL 115 DAY)),
(3, 'Puma Suede Classic', 2800000, 'puma-suede.jpg', DATE_SUB(NOW(), INTERVAL 110 DAY)),
(4, 'Vans Old Skool', 1800000, 'vans-oldskool.jpg', DATE_SUB(NOW(), INTERVAL 105 DAY)),
(5, 'Converse Chuck Taylor', 1500000, 'converse-chuck.jpg', DATE_SUB(NOW(), INTERVAL 100 DAY)),
(6, 'New Balance 574', 3200000, 'newbalance-574.jpg', DATE_SUB(NOW(), INTERVAL 95 DAY)),
(7, 'Reebok Classic Leather', 2500000, 'reebok-classic.jpg', DATE_SUB(NOW(), INTERVAL 90 DAY)),
(8, 'ASICS Gel-Kayano 28', 4500000, 'asics-gel.jpg', DATE_SUB(NOW(), INTERVAL 85 DAY)),
(9, 'Nike Air Force 1', 3000000, 'nike-airforce.jpg', DATE_SUB(NOW(), INTERVAL 80 DAY)),
(10, 'Adidas Stan Smith', 2600000, 'adidas-stansmith.jpg', DATE_SUB(NOW(), INTERVAL 75 DAY)),
(11, 'Puma RS-X', 3300000, 'puma-rsx.jpg', DATE_SUB(NOW(), INTERVAL 70 DAY)),
(12, 'Jordan 1 Retro High', 5500000, 'jordan-1.jpg', DATE_SUB(NOW(), INTERVAL 65 DAY)),
(13, 'Nike React Infinity', 3800000, 'nike-react.jpg', DATE_SUB(NOW(), INTERVAL 60 DAY)),
(14, 'Adidas NMD R1', 3900000, 'adidas-nmd.jpg', DATE_SUB(NOW(), INTERVAL 55 DAY)),
(15, 'New Balance 990v5', 5000000, 'newbalance-990.jpg', DATE_SUB(NOW(), INTERVAL 50 DAY)),
(16, 'Nike Pegasus 38', 3600000, 'nike-pegasus.jpg', DATE_SUB(NOW(), INTERVAL 45 DAY)),
(17, 'Adidas Superstar', 2400000, 'adidas-superstar.jpg', DATE_SUB(NOW(), INTERVAL 40 DAY)),
(18, 'Puma Cali Sport', 2900000, 'puma-cali.jpg', DATE_SUB(NOW(), INTERVAL 35 DAY)),
(19, 'Vans Sk8-Hi', 2100000, 'vans-sk8hi.jpg', DATE_SUB(NOW(), INTERVAL 30 DAY)),
(20, 'Nike Blazer Mid', 3100000, 'nike-blazer.jpg', DATE_SUB(NOW(), INTERVAL 25 DAY));

-- ========================================
-- TABLE: orders
-- ========================================

-- Đơn hàng 30 ngày trước
INSERT INTO orders (user_id, total_amount, status, created_at) VALUES
(2, 3500000, 'completed', DATE_SUB(NOW(), INTERVAL 30 DAY)),
(3, 7200000, 'completed', DATE_SUB(NOW(), INTERVAL 30 DAY)),
(4, 2800000, 'completed', DATE_SUB(NOW(), INTERVAL 29 DAY));

-- Đơn hàng 25-28 ngày trước
INSERT INTO orders (user_id, total_amount, status, created_at) VALUES
(5, 4500000, 'completed', DATE_SUB(NOW(), INTERVAL 28 DAY)),
(6, 5100000, 'completed', DATE_SUB(NOW(), INTERVAL 27 DAY)),
(7, 3200000, 'completed', DATE_SUB(NOW(), INTERVAL 26 DAY)),
(8, 6800000, 'completed', DATE_SUB(NOW(), INTERVAL 25 DAY));

-- Đơn hàng 20-24 ngày trước
INSERT INTO orders (user_id, total_amount, status, created_at) VALUES
(2, 2600000, 'completed', DATE_SUB(NOW(), INTERVAL 24 DAY)),
(3, 8900000, 'completed', DATE_SUB(NOW(), INTERVAL 23 DAY)),
(4, 3800000, 'completed', DATE_SUB(NOW(), INTERVAL 22 DAY)),
(9, 4200000, 'completed', DATE_SUB(NOW(), INTERVAL 21 DAY)),
(10, 5500000, 'cancelled', DATE_SUB(NOW(), INTERVAL 20 DAY));

-- Đơn hàng 15-19 ngày trước
INSERT INTO orders (user_id, total_amount, status, created_at) VALUES
(5, 7100000, 'completed', DATE_SUB(NOW(), INTERVAL 19 DAY)),
(6, 3900000, 'completed', DATE_SUB(NOW(), INTERVAL 18 DAY)),
(7, 5800000, 'completed', DATE_SUB(NOW(), INTERVAL 17 DAY)),
(8, 4300000, 'completed', DATE_SUB(NOW(), INTERVAL 16 DAY)),
(11, 6200000, 'completed', DATE_SUB(NOW(), INTERVAL 15 DAY));

-- Đơn hàng 10-14 ngày trước
INSERT INTO orders (user_id, total_amount, status, created_at) VALUES
(2, 3100000, 'completed', DATE_SUB(NOW(), INTERVAL 14 DAY)),
(3, 4700000, 'completed', DATE_SUB(NOW(), INTERVAL 13 DAY)),
(4, 8500000, 'completed', DATE_SUB(NOW(), INTERVAL 12 DAY)),
(9, 2900000, 'completed', DATE_SUB(NOW(), INTERVAL 11 DAY)),
(10, 5300000, 'completed', DATE_SUB(NOW(), INTERVAL 10 DAY));

-- Đơn hàng 7-9 ngày trước (tuần trước)
INSERT INTO orders (user_id, total_amount, status, created_at) VALUES
(5, 3600000, 'completed', DATE_SUB(NOW(), INTERVAL 9 DAY)),
(6, 7400000, 'completed', DATE_SUB(NOW(), INTERVAL 8 DAY)),
(7, 4100000, 'completed', DATE_SUB(NOW(), INTERVAL 8 DAY)),
(8, 5900000, 'completed', DATE_SUB(NOW(), INTERVAL 7 DAY)),
(12, 3300000, 'completed', DATE_SUB(NOW(), INTERVAL 7 DAY));

-- Đơn hàng tuần này (0-6 ngày trước) - NHIỀU ĐƠN ĐỂ TĂNG TRƯỞNG
INSERT INTO orders (user_id, total_amount, status, created_at) VALUES
-- 6 ngày trước
(2, 4200000, 'completed', DATE_SUB(NOW(), INTERVAL 6 DAY)),
(3, 6800000, 'completed', DATE_SUB(NOW(), INTERVAL 6 DAY)),
(4, 3500000, 'completed', DATE_SUB(NOW(), INTERVAL 6 DAY)),
(11, 5100000, 'completed', DATE_SUB(NOW(), INTERVAL 6 DAY)),
-- 5 ngày trước
(5, 7200000, 'completed', DATE_SUB(NOW(), INTERVAL 5 DAY)),
(6, 3900000, 'completed', DATE_SUB(NOW(), INTERVAL 5 DAY)),
(7, 5500000, 'completed', DATE_SUB(NOW(), INTERVAL 5 DAY)),
(9, 4600000, 'completed', DATE_SUB(NOW(), INTERVAL 5 DAY)),
-- 4 ngày trước
(8, 8100000, 'completed', DATE_SUB(NOW(), INTERVAL 4 DAY)),
(10, 3300000, 'completed', DATE_SUB(NOW(), INTERVAL 4 DAY)),
(12, 6500000, 'completed', DATE_SUB(NOW(), INTERVAL 4 DAY)),
(2, 4700000, 'completed', DATE_SUB(NOW(), INTERVAL 4 DAY)),
-- 3 ngày trước
(3, 5800000, 'completed', DATE_SUB(NOW(), INTERVAL 3 DAY)),
(4, 7300000, 'completed', DATE_SUB(NOW(), INTERVAL 3 DAY)),
(5, 3200000, 'completed', DATE_SUB(NOW(), INTERVAL 3 DAY)),
(11, 4900000, 'completed', DATE_SUB(NOW(), INTERVAL 3 DAY)),
-- 2 ngày trước
(6, 6200000, 'completed', DATE_SUB(NOW(), INTERVAL 2 DAY)),
(7, 3700000, 'completed', DATE_SUB(NOW(), INTERVAL 2 DAY)),
(8, 5400000, 'completed', DATE_SUB(NOW(), INTERVAL 2 DAY)),
(9, 8700000, 'completed', DATE_SUB(NOW(), INTERVAL 2 DAY)),
-- 1 ngày trước
(10, 4100000, 'completed', DATE_SUB(NOW(), INTERVAL 1 DAY)),
(12, 6900000, 'completed', DATE_SUB(NOW(), INTERVAL 1 DAY)),
(2, 3400000, 'completed', DATE_SUB(NOW(), INTERVAL 1 DAY)),
(3, 5600000, 'pending', DATE_SUB(NOW(), INTERVAL 1 DAY)),
-- Hôm nay
(4, 7800000, 'pending', NOW()),
(5, 4300000, 'pending', NOW()),
(6, 5200000, 'completed', NOW());

-- ========================================
-- TABLE: order_items
-- ========================================

-- Order 1: 1 sản phẩm
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(1, 1, 1, 3500000, DATE_SUB(NOW(), INTERVAL 30 DAY));

-- Order 2: 2 sản phẩm
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(2, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 30 DAY)),
(2, 9, 1, 3000000, DATE_SUB(NOW(), INTERVAL 30 DAY));

-- Order 3: 1 sản phẩm
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(3, 3, 1, 2800000, DATE_SUB(NOW(), INTERVAL 29 DAY));

-- Order 4: 1 sản phẩm
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(4, 8, 1, 4500000, DATE_SUB(NOW(), INTERVAL 28 DAY));

-- Order 5-10
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(5, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 27 DAY)),
(6, 6, 1, 3200000, DATE_SUB(NOW(), INTERVAL 26 DAY)),
(7, 1, 1, 3500000, DATE_SUB(NOW(), INTERVAL 25 DAY)),
(7, 3, 1, 2800000, DATE_SUB(NOW(), INTERVAL 25 DAY)),
(8, 10, 1, 2600000, DATE_SUB(NOW(), INTERVAL 24 DAY)),
(9, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 23 DAY)),
(9, 8, 1, 4500000, DATE_SUB(NOW(), INTERVAL 23 DAY));

-- Order 11-20
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(10, 13, 1, 3800000, DATE_SUB(NOW(), INTERVAL 22 DAY)),
(11, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 21 DAY)),
(12, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 20 DAY)),
(13, 1, 2, 7000000, DATE_SUB(NOW(), INTERVAL 19 DAY)),
(14, 14, 1, 3900000, DATE_SUB(NOW(), INTERVAL 18 DAY)),
(15, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 17 DAY)),
(16, 8, 1, 4500000, DATE_SUB(NOW(), INTERVAL 16 DAY)),
(17, 1, 1, 3500000, DATE_SUB(NOW(), INTERVAL 15 DAY)),
(17, 3, 1, 2800000, DATE_SUB(NOW(), INTERVAL 15 DAY));

-- Order 21-30
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(18, 9, 1, 3000000, DATE_SUB(NOW(), INTERVAL 14 DAY)),
(19, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 13 DAY)),
(20, 1, 2, 7000000, DATE_SUB(NOW(), INTERVAL 12 DAY)),
(21, 3, 1, 2800000, DATE_SUB(NOW(), INTERVAL 11 DAY)),
(22, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 10 DAY));

-- Order 23-27 (tuần trước)
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
(23, 13, 1, 3800000, DATE_SUB(NOW(), INTERVAL 9 DAY)),
(24, 1, 2, 7000000, DATE_SUB(NOW(), INTERVAL 8 DAY)),
(25, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 8 DAY)),
(26, 15, 1, 5000000, DATE_SUB(NOW(), INTERVAL 7 DAY)),
(27, 6, 1, 3200000, DATE_SUB(NOW(), INTERVAL 7 DAY));

-- Order 28-60 (tuần này - NHIỀU ĐƠN)
INSERT INTO order_items (order_id, product_id, quantity, price, created_at) VALUES
-- 6 ngày trước
(28, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 6 DAY)),
(29, 1, 1, 3500000, DATE_SUB(NOW(), INTERVAL 6 DAY)),
(29, 9, 1, 3000000, DATE_SUB(NOW(), INTERVAL 6 DAY)),
(30, 3, 1, 2800000, DATE_SUB(NOW(), INTERVAL 6 DAY)),
(31, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 6 DAY)),
-- 5 ngày trước
(32, 1, 2, 7000000, DATE_SUB(NOW(), INTERVAL 5 DAY)),
(33, 14, 1, 3900000, DATE_SUB(NOW(), INTERVAL 5 DAY)),
(34, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 5 DAY)),
(35, 8, 1, 4500000, DATE_SUB(NOW(), INTERVAL 5 DAY)),
-- 4 ngày trước
(36, 1, 2, 7000000, DATE_SUB(NOW(), INTERVAL 4 DAY)),
(37, 6, 1, 3200000, DATE_SUB(NOW(), INTERVAL 4 DAY)),
(38, 1, 1, 3500000, DATE_SUB(NOW(), INTERVAL 4 DAY)),
(38, 9, 1, 3000000, DATE_SUB(NOW(), INTERVAL 4 DAY)),
(39, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 4 DAY)),
-- 3 ngày trước
(40, 15, 1, 5000000, DATE_SUB(NOW(), INTERVAL 3 DAY)),
(41, 1, 2, 7000000, DATE_SUB(NOW(), INTERVAL 3 DAY)),
(42, 6, 1, 3200000, DATE_SUB(NOW(), INTERVAL 3 DAY)),
(43, 8, 1, 4500000, DATE_SUB(NOW(), INTERVAL 3 DAY)),
-- 2 ngày trước
(44, 1, 1, 3500000, DATE_SUB(NOW(), INTERVAL 2 DAY)),
(44, 3, 1, 2800000, DATE_SUB(NOW(), INTERVAL 2 DAY)),
(45, 13, 1, 3800000, DATE_SUB(NOW(), INTERVAL 2 DAY)),
(46, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 2 DAY)),
(47, 1, 2, 7000000, DATE_SUB(NOW(), INTERVAL 2 DAY)),
(47, 4, 1, 1800000, DATE_SUB(NOW(), INTERVAL 2 DAY)),
-- 1 ngày trước
(48, 2, 1, 4200000, DATE_SUB(NOW(), INTERVAL 1 DAY)),
(49, 1, 1, 3500000, DATE_SUB(NOW(), INTERVAL 1 DAY)),
(49, 9, 1, 3000000, DATE_SUB(NOW(), INTERVAL 1 DAY)),
(50, 6, 1, 3200000, DATE_SUB(NOW(), INTERVAL 1 DAY)),
(51, 12, 1, 5500000, DATE_SUB(NOW(), INTERVAL 1 DAY)),
-- Hôm nay
(52, 1, 2, 7000000, NOW()),
(53, 8, 1, 4500000, NOW()),
(54, 15, 1, 5000000, NOW());

-- ========================================
-- HOÀN THÀNH!
-- ========================================