<?php
function getLatestProducts($conn, $limit = 12) {
    $sql = "SELECT p.*, c.name as category_name FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            ORDER BY p.created_at DESC LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$limit]);
    return $stmt->fetchAll();
}

function getProductById($conn, $id) {
    $sql = "SELECT p.*, c.name as category_name FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}
?>
