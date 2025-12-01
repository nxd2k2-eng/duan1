<?php
// Thông tin kết nối database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'mysql');
define('DB_NAME', 'phpdata');  // ✅ ĐỔI TÊN DATABASE MỚI

// Kết nối database bằng PDO
global $conn;

try {
    $conn = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
    
    // Thông báo kết nối thành công (có thể comment lại sau)
    // echo "Kết nối database thành công!";
    
} catch(PDOException $e) {
    die("Lỗi kết nối database: " . $e->getMessage());
}

?>