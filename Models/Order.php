<?php

class Order
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Hàm lấy danh sách đơn hàng với phân trang và tìm kiếm
     * @param int $page Trang hiện tại
     * @param int $limit Số đơn hàng trên mỗi trang
     * @param string $keyword Từ khóa tìm kiếm
     * @param int|null $active Trạng thái kích hoạt của đơn hàng
     * @param string $sortDate Sắp xếp theo ngày 'asc' hoặc 'desc'
     * @return array Danh sách đơn hàng
     */

    public function getAllOrders($page = 1, $limit = 10, $keyword = '', $active = null, $sortDate = 'desc')
    {
        $offset = ($page - 1) * $limit;
        $search = '';

        if (trim($keyword !== '')) {
            $search = "WHERE `name` LIKE '%$keyword%' OR `order_id ` LIKE '%$keyword%' OR `phone` = '%$keyword%' OR `email` LIKE '%$keyword%'";
        } else {
            $search = 'WHERE 1';
        }

        if ($active !== null) {
            $search .= " AND `order_status` = :active ";
        }

        if ($sortDate === 'asc' || $sortDate === 'desc') {
            $search .= " ORDER BY `created_at` $sortDate ";
        }

        $query = "SELECT * FROM `orders` $search LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($query);
        if ($active !== null) {
            $stmt->bindValue(':active', $active, PDO::PARAM_STR);
        }
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return [];
        }
        return $result;
    }

    /**
     * Hàm lấy thông tin chi tiết của một đơn hàng theo ID, Active có thể là null thì dùng client
     * Luôn luôn truyền active vào là số 1 để không bán đơn hàng deactive
     * @param int $id ID của đơn hàng
     * @param int|null $active Trạng thái kích hoạt của đơn hàng
     * @return array Thông tin đơn hàng
     */

    public function getOneOrder(int $id, $active = null)
    {
        $query = "SELECT * FROM `orders` JOIN `order_details` ON `orders`.`order_id` = `order_details`.`order_id` JOIN `products` ON `products`.`product_id` = `order_details`.`product_id` WHERE `orders`.`order_id` = :id;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            return [];
        }
        return $result;
    }
}

