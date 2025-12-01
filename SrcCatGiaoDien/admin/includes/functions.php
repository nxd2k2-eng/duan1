<?php
// Functions để lấy dữ liệu từ database phpdata

// Lấy thống kê tổng quan
function getStats($conn) {
    $stats = [];
    
    try {
        // Tổng đơn hàng
        $stmt = $conn->query("SELECT COUNT(*) as total FROM Orders");
        $stats['total_orders'] = $stmt->fetch()['total'];
        
        // Tính % tăng trưởng đơn hàng (so với tuần trước)
        $stmt = $conn->query("
            SELECT 
                COUNT(*) as current_week,
                (SELECT COUNT(*) FROM Orders 
                 WHERE created_at BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY) 
                 AND DATE_SUB(NOW(), INTERVAL 7 DAY)) as last_week
            FROM Orders 
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        ");
        $growth = $stmt->fetch();
        $stats['orders_growth'] = $growth['last_week'] > 0 
            ? round((($growth['current_week'] - $growth['last_week']) / $growth['last_week']) * 100) 
            : 0;
        
        // Sản phẩm bán ra
        $stmt = $conn->query("SELECT COALESCE(SUM(quantity), 0) as total FROM Order_Items");
        $stats['total_products_sold'] = $stmt->fetch()['total'];
        
        // Doanh thu
        $stmt = $conn->query("
            SELECT COALESCE(SUM(total_amount), 0) as revenue 
            FROM Orders 
            WHERE status IN ('delivered', 'shipped', 'processing')
        ");
        $stats['revenue'] = $stmt->fetch()['revenue'];
        
        // Tính % tăng trưởng doanh thu
        $stmt = $conn->query("
            SELECT 
                COALESCE(SUM(total_amount), 0) as current_week
            FROM Orders 
            WHERE status IN ('delivered', 'shipped', 'processing')
            AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        ");
        $currentRevenue = $stmt->fetch()['current_week'];
        
        $stmt = $conn->query("
            SELECT 
                COALESCE(SUM(total_amount), 0) as last_week
            FROM Orders 
            WHERE status IN ('delivered', 'shipped', 'processing')
            AND created_at BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY) 
            AND DATE_SUB(NOW(), INTERVAL 7 DAY)
        ");
        $lastRevenue = $stmt->fetch()['last_week'];
        
        $stats['revenue_growth'] = $lastRevenue > 0 
            ? round((($currentRevenue - $lastRevenue) / $lastRevenue) * 100) 
            : 0;
        
        // Khách hàng
        $stmt = $conn->query("
            SELECT COUNT(*) as total 
            FROM Users 
            WHERE role = 'customer'
        ");
        $stats['total_customers'] = $stmt->fetch()['total'];
        
        // Tính % tăng trưởng khách hàng
        $stmt = $conn->query("
            SELECT 
                COUNT(*) as current_week,
                (SELECT COUNT(*) FROM Users 
                 WHERE role = 'customer' 
                 AND created_at BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY) 
                 AND DATE_SUB(NOW(), INTERVAL 7 DAY)) as last_week
            FROM Users 
            WHERE role = 'customer' 
            AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        ");
        $growth = $stmt->fetch();
        $stats['customers_growth'] = $growth['last_week'] > 0 
            ? round((($growth['current_week'] - $growth['last_week']) / $growth['last_week']) * 100) 
            : 0;
        
        // Tổng sản phẩm trong kho
        $stmt = $conn->query("SELECT COUNT(*) as total FROM Products WHERE is_active = 1");
        $stats['total_products'] = $stmt->fetch()['total'];
        
        // Giá trị tồn kho
        $stmt = $conn->query("
            SELECT COALESCE(SUM(price * stock_quantity), 0) as inventory_value 
            FROM Products 
            WHERE is_active = 1
        ");
        $stats['inventory_value'] = $stmt->fetch()['inventory_value'];
        
        // Đơn hàng chờ xử lý
        $stmt = $conn->query("SELECT COUNT(*) as total FROM Orders WHERE status = 'pending'");
        $stats['pending_orders'] = $stmt->fetch()['total'];
        
        // Trung bình giá trị đơn hàng
        $stmt = $conn->query("
            SELECT COALESCE(AVG(total_amount), 0) as avg_order 
            FROM Orders 
            WHERE status IN ('delivered', 'shipped', 'processing')
        ");
        $stats['avg_order_value'] = $stmt->fetch()['avg_order'];
        
    } catch(PDOException $e) {
        // Nếu có lỗi, trả về giá trị mặc định
        $stats = [
            'total_orders' => 0,
            'orders_growth' => 0,
            'total_products_sold' => 0,
            'revenue' => 0,
            'revenue_growth' => 0,
            'total_customers' => 0,
            'customers_growth' => 0,
            'total_products' => 0,
            'inventory_value' => 0,
            'pending_orders' => 0,
            'avg_order_value' => 0
        ];
    }
    
    return $stats;
}

// Lấy dữ liệu biểu đồ doanh số 7 ngày
function getSalesChartData($conn) {
    try {
        $sql = "SELECT 
                    DATE_FORMAT(created_at, '%a') as day_name,
                    DATE_FORMAT(created_at, '%Y-%m-%d') as day_date,
                    COALESCE(SUM(total_amount), 0) as total,
                    COUNT(*) as order_count
                FROM Orders 
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                AND status IN ('delivered', 'shipped', 'processing', 'pending')
                GROUP BY day_date, day_name
                ORDER BY day_date";
        
        $stmt = $conn->query($sql);
        $data = $stmt->fetchAll();
        
        // Nếu không có dữ liệu, tạo data mẫu cho 7 ngày
        if(empty($data)) {
            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            $data = [];
            foreach($days as $day) {
                $data[] = [
                    'day_name' => $day,
                    'total' => 0,
                    'order_count' => 0
                ];
            }
        }
        
        return $data;
        
    } catch(PDOException $e) {
        return [];
    }
}

// Lấy top 4 sản phẩm bán chạy
function getTopProducts($conn, $limit = 4) {
    try {
        $sql = "SELECT 
                    p.product_id,
                    p.name,
                    p.price,
                    COALESCE(SUM(oi.quantity), 0) as total_sold,
                    COALESCE(SUM(oi.quantity * oi.price_at_purchase), 0) as revenue
                FROM Products p
                LEFT JOIN Order_Items oi ON p.product_id = oi.product_id
                LEFT JOIN Orders o ON oi.order_id = o.order_id
                WHERE (o.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) OR o.order_id IS NULL)
                AND p.is_active = 1
                GROUP BY p.product_id, p.name, p.price
                ORDER BY total_sold DESC
                LIMIT ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([$limit]);
        $products = $stmt->fetchAll();
        
        // Nếu không đủ sản phẩm, lấy thêm từ Products
        if(count($products) < $limit) {
            $sql = "SELECT 
                        product_id,
                        name,
                        price,
                        0 as total_sold,
                        0 as revenue
                    FROM Products
                    WHERE is_active = 1
                    ORDER BY created_at DESC
                    LIMIT ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$limit]);
            $products = $stmt->fetchAll();
        }
        
        // Tính growth giả định
        foreach($products as &$product) {
            $product['growth'] = rand(10, 80);
        }
        
        return $products;
        
    } catch(PDOException $e) {
        return [];
    }
}

// Lấy đơn hàng gần đây
function getRecentOrders($conn, $limit = 5) {
    try {
        $sql = "SELECT 
                    o.order_id,
                    o.customer_name,
                    o.total_amount,
                    o.status,
                    o.created_at,
                    COUNT(oi.order_item_id) as item_count
                FROM Orders o
                LEFT JOIN Order_Items oi ON o.order_id = oi.order_id
                GROUP BY o.order_id
                ORDER BY o.created_at DESC
                LIMIT ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
        
    } catch(PDOException $e) {
        return [];
    }
}

// Lấy thống kê theo thương hiệu
function getBrandStats($conn) {
    try {
        $sql = "SELECT 
                    b.brand_name,
                    COUNT(p.product_id) as product_count,
                    COALESCE(SUM(oi.quantity), 0) as total_sold,
                    COALESCE(SUM(oi.quantity * oi.price_at_purchase), 0) as revenue
                FROM Brands b
                LEFT JOIN Products p ON b.brand_id = p.brand_id
                LEFT JOIN Order_Items oi ON p.product_id = oi.product_id
                GROUP BY b.brand_id, b.brand_name
                ORDER BY revenue DESC
                LIMIT 5";
        
        $stmt = $conn->query($sql);
        return $stmt->fetchAll();
        
    } catch(PDOException $e) {
        return [];
    }
}

// Lấy thống kê theo danh mục
function getCategoryStats($conn) {
    try {
        $sql = "SELECT 
                    c.category_name,
                    COUNT(p.product_id) as product_count,
                    COALESCE(SUM(oi.quantity), 0) as total_sold
                FROM Categories c
                LEFT JOIN Products p ON c.category_id = p.category_id
                LEFT JOIN Order_Items oi ON p.product_id = oi.product_id
                GROUP BY c.category_id, c.category_name
                ORDER BY total_sold DESC";
        
        $stmt = $conn->query($sql);
        return $stmt->fetchAll();
        
    } catch(PDOException $e) {
        return [];
    }
}

// Lấy trạng thái đơn hàng
function getOrderStatusStats($conn) {
    try {
        $sql = "SELECT 
                    status,
                    COUNT(*) as count,
                    SUM(total_amount) as total
                FROM Orders
                GROUP BY status
                ORDER BY count DESC";
        
        $stmt = $conn->query($sql);
        return $stmt->fetchAll();
        
    } catch(PDOException $e) {
        return [];
    }
}

// Format số tiền
function formatMoney($amount) {
    return number_format($amount, 0, ',', '.') . ' đ';
}

// Format số lượng
function formatNumber($number) {
    return number_format($number, 0, ',', '.');
}

// Format trạng thái đơn hàng
function getStatusBadge($status) {
    $badges = [
        'pending' => '<span class="status-badge pending">Chờ xử lý</span>',
        'processing' => '<span class="status-badge processing">Đang xử lý</span>',
        'shipped' => '<span class="status-badge shipped">Đang giao</span>',
        'delivered' => '<span class="status-badge delivered">Đã giao</span>',
        'cancelled' => '<span class="status-badge cancelled">Đã hủy</span>'
    ];
    return $badges[$status] ?? $status;
}
?>