<?php

class Cart
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Hàm lấy danh sách giỏ hàng với phân trang và tìm kiếm
     * @param int $page Trang hiện tại
     * @param int $limit Số giỏ hàng trên mỗi trang
     * @param int $user_id ID người dùng
     * 
     * @return array Danh sách giỏ hàng
     */

    public function getAllCarts(int $user_id, int $page = 1, int $limit = 10)
    {
        $offset = ($page - 1) * $limit;

        $query = "SELECT 
                carts.*, 
                products.title, 
                products.price, 
                products.image 
            FROM carts
            JOIN products ON products.product_id = carts.product_id
            WHERE carts.user_id = :user_id
            LIMIT :limit OFFSET :offset";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Hàm lấy thông tin chi tiết của một giỏ hàng theo ID, Active có thể là null thì dùng client
     * Luôn luôn truyền active vào là số 1 để không bán giỏ hàng deactive
     * @param int $id ID của giỏ hàng
     * @param int|null $active Trạng thái kích hoạt của giỏ hàng
     * @return array Thông tin giỏ hàng
     */
}

