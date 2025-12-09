<?php

class Product {
    private $connection;

    public function __construct($dbConnection) {
        $this->connection = $dbConnection;
    }


    /**
     * Hàm lấy tất cả sản phẩm với phân trang và tìm kiếm
     * @param int $page Số trang hiện tại
     * @param int $limit Số sản phẩm trên mỗi trang
     * @param string $keyword Từ khóa tìm kiếm
     * @return array Danh sách sản phẩm
     */
    public function getAllProducts($page = 1, $limit = 10, $keyword = '', $active = null, $softDate = 'DESC') {
        $offset = ($page - 1) * $limit;
        $search = '';
        if ($active !== null) {
            $search .= " WHERE `active` = :active ";
        }
        if ($keyword !== '') {
            $search = "AND `name` LIKE  '%$keyword%' or `description` LIKE '%$keyword%' ";
        }
        
        if ($softDate !== null) {
            $search .= " ORDER BY `created_at` $softDate ";
        }
        $query = "SELECT * FROM `products` $search  LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneProduct($id, $active = null) {
        if ($active !== null) {
            $search = " AND `active` = :active ";
        } else {
            $search = '';
        }

        $query = "SELECT * FROM `products` WHERE `product_id` = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}