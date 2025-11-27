<?php
// Functions để lấy dữ liệu

// Lấy thống kê tổng quan
function getStats($conn) {
    $stats = [];
    
    try {
        // Tổng đơn hàng
        $stmt = $conn->query("SELECT COUNT(*) as total FROM orders");
        $stats['total_orders'] = $stmt->fetch()['total'];
        
        // Tính % tăng trưởng đơn hàng (so với tuần trước)
        $stmt = $conn->query("
            SELECT 
                COUNT(*) as current_week,
                (SELECT COUNT(*) FROM orders 
                 WHERE created_at BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY) 
                 AND DATE_SUB(NOW(), INTERVAL 7 DAY)) as last_week
            FROM orders 
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        ");
        $growth = $stmt->fetch();
        $stats['orders_growth'] = $growth['last_week'] > 0 
            ? round((($growth['current_week'] - $growth['last_week']) / $growth['last_week']) * 100) 
            : 0;
        
        // Sản phẩm bán ra
        $stmt = $conn->query("SELECT COALESCE(SUM(quantity), 0) as total FROM order_items");
        $stats['total_products_sold'] = $stmt->fetch()['total'];
        
        // Doanh thu
        $stmt = $conn->query("
            SELECT COALESCE(SUM(total_amount), 0) as revenue 
            FROM orders 
            WHERE status = 'completed'
        ");
        $stats['revenue'] = $stmt->fetch()['revenue'];
        
        // Tính % tăng trưởng doanh thu
        $stmt = $conn->query("
            SELECT 
                COALESCE(SUM(total_amount), 0) as current_week
            FROM orders 
            WHERE status = 'completed' 
            AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        ");
        $currentRevenue = $stmt->fetch()['current_week'];
        
        $stmt = $conn->query("
            SELECT 
                COALESCE(SUM(total_amount), 0) as last_week
            FROM orders 
            WHERE status = 'completed' 
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
            FROM users 
            WHERE role = 'customer'
        ");
        $stats['total_customers'] = $stmt->fetch()['total'];
        
        // Tính % tăng trưởng khách hàng
        $stmt = $conn->query("
            SELECT 
                COUNT(*) as current_week,
                (SELECT COUNT(*) FROM users 
                 WHERE role = 'customer' 
                 AND created_at BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY) 
                 AND DATE_SUB(NOW(), INTERVAL 7 DAY)) as last_week
            FROM users 
            WHERE role = 'customer' 
            AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        ");
        $growth = $stmt->fetch();
        $stats['customers_growth'] = $growth['last_week'] > 0 
            ? round((($growth['current_week'] - $growth['last_week']) / $growth['last_week']) * 100) 
            : 0;
        
    } catch(PDOException $e) {
        // Nếu có lỗi, trả về giá trị mặc định
        $stats = [
            'total_orders' => 0,
            'orders_growth' => 0,
            'total_products_sold' => 0,
            'revenue' => 0,
            'revenue_growth' => 0,
            'total_customers' => 0,
            'customers_growth' => 0
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
                    COALESCE(SUM(total_amount), 0) as total
                FROM orders 
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                AND status IN ('completed', 'pending')
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
                    'total' => 0
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
                    p.id,
                    p.name,
                    p.image,
                    COALESCE(SUM(oi.quantity), 0) as total_sold
                FROM products p
                LEFT JOIN order_items oi ON p.id = oi.product_id
                GROUP BY p.id, p.name, p.image
                ORDER BY total_sold DESC
                LIMIT ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([$limit]);
        $products = $stmt->fetchAll();
        
        // Tính growth giả định (có thể cải thiện sau)
        foreach($products as &$product) {
            $product['growth'] = rand(10, 80);
        }
        
        return $products;
        
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
?>