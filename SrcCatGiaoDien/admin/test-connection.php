<?php
// Test kết nối database
require_once "config/database.php";

echo "<h2>🔌 Test Kết Nối Database</h2>";

try {
    // Kiểm tra kết nối
    echo "✅ Kết nối database thành công!<br><br>";
    
    // Lấy danh sách bảng
    $stmt = $conn->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<h3>📋 Danh sách bảng trong database 'duan1':</h3>";
    echo "<ul>";
    foreach($tables as $table) {
        echo "<li>✓ " . $table . "</li>";
    }
    echo "</ul>";
    
    // Đếm số dòng trong mỗi bảng
    echo "<h3>📊 Số lượng dữ liệu:</h3>";
    echo "<ul>";
    foreach($tables as $table) {
        $stmt = $conn->query("SELECT COUNT(*) as total FROM `$table`");
        $count = $stmt->fetch()['total'];
        echo "<li>$table: <strong>$count</strong> dòng</li>";
    }
    echo "</ul>";
    
} catch(PDOException $e) {
    echo "❌ Lỗi: " . $e->getMessage();
}
?>

<style>
body {
    font-family: Arial, sans-serif;
    padding: 40px;
    background: #f5f5f5;
}
h2 {
    color: #2563eb;
}
h3 {
    color: #1e293b;
    margin-top: 20px;
}
ul {
    background: white;
    padding: 20px 40px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
li {
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
}
li:last-child {
    border-bottom: none;
}
</style>