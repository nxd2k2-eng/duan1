<?php
require_once __DIR__ . '/BaseModel.php';

class Order extends BaseModel
{
    protected $table = 'Orders';

    public function getAllWithDetails()
    {
        $sql = "SELECT o.*, u.full_name, u.email
                FROM Orders o
                LEFT JOIN Users u ON o.user_id = u.user_id
                ORDER BY o.order_id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderItems($order_id)
    {
        $sql = "SELECT oi.*, p.name, p.image
                FROM Order_Items oi
                JOIN Products p ON oi.product_id = p.product_id
                WHERE oi.order_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>