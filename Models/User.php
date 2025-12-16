<?php

class User
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Hàm lấy danh sách người dùng với phân trang và tìm kiếm
     * @param int $page Trang hiện tại
     * @param int $limit Số người dùng trên mỗi trang
     * @param string $keyword Từ khóa tìm kiếm
     * @param int|null $active Trạng thái kích hoạt của người dùng
     * @param string $sortDate Sắp xếp theo ngày 'asc' hoặc 'desc'
     * @return array Danh sách người dùng
     */

    public function getAllUsers($page = 1, $limit = 10, $keyword = '', $active = null, $sortDate = 'desc')
    {
        $offset = ($page - 1) * $limit;
        $search = '';

        if (trim($keyword !== '')) {
            $search = "WHERE `full_name` LIKE '%$keyword%' OR `phone` = '%$keyword%' OR `email` LIKE '%$keyword%'";
        } else {
            $search = 'WHERE 1';
        }

        if ($active !== null) {
            $search .= " AND `status` = :active ";
        }

        if ($sortDate === 'asc' || $sortDate === 'desc') {
            $search .= " ORDER BY `created_at` $sortDate ";
        }

        $query = "SELECT * FROM `users` $search LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($query);
        if ($active !== null) {
            $stmt->bindValue(':active', $active, PDO::PARAM_INT);
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
     * Hàm lấy thông tin chi tiết của một người dùng theo ID, Active có thể là null thì dùng client
     * Luôn luôn truyền active vào là số 1 để không bán người dùng deactive
     * @param int $id ID của người dùng
     * @param int|null $active Trạng thái kích hoạt của người dùng
     * @return array Thông tin người dùng
     */

    public function getOneUsers(int|string $id, $active = null)
    {
        if ($active !== null) {
            $search = " AND `status` = :active ";
        } else {
            $search = '';
        }

        if (is_int($id)) {
            $query = "SELECT * FROM `users` WHERE `user_id` = :id $search LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        } else {
            $query = "SELECT * FROM `users` WHERE `email` = :id $search LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        }

        if ($active !== null) {
            $stmt->bindValue(':active', $active, PDO::PARAM_INT);
        }
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return [];
        }
        return $result;
    }
    public function createUsers($full_name, $password, $email, $phone, $address, $role)
    {
        $query = "INSERT INTO users (`full_name`, `password`, `email`, `phone`, `address`, `role`, `status`, `created_at`) 
                 VALUES (:full_name, :password, :email, :phone, :address, :role, 1, NOW())";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':full_name', $full_name, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_INT);

        return $stmt->execute();
    }
    public function getByPhone($phone)
    {
        $sql = "SELECT user_id FROM users WHERE phone = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$phone]);
        return $stmt->fetch();
    }
}
