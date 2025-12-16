<?php

class Category
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Hàm lấy danh sách phân loại sản phẩm với phân trang và tìm kiếm
     * @param int $page Trang hiện tại
     * @param int $limit Số phân loại sản phẩm trên mỗi trang
     * @param string $keyword Từ khóa tìm kiếm
     * @param int|null $active Trạng thái kích hoạt của phân loại sản phẩm
     * @param string $sortDate Sắp xếp theo ngày 'asc' hoặc 'desc'
     * @return array Danh sách phân loại sản phẩm
     */

    public function getAllCategories($page = 1, $limit = 10, $keyword = '', $active = null, $sortDate = 'desc')
    {
        $offset = ($page - 1) * $limit;
        $where = "WHERE deleted_at IS NULL";

        if (trim($keyword) !== '') {
            $where .= " AND name LIKE :keyword";
        }

        if ($active !== null) {
            $where .= " AND status = :active";
        }

        if ($sortDate === 'asc' || $sortDate === 'desc') {
            $where .= " ORDER BY created_at $sortDate";
        }

        // Lấy danh sách
        $sql = "SELECT * FROM categories $where LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($sql);

        if (trim($keyword) !== '') {
            $stmt->bindValue(':keyword', "%$keyword%");
        }

        if ($active !== null) {
            $stmt->bindValue(':active', $active, PDO::PARAM_INT);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Đếm tổng
        $countSql = "SELECT COUNT(*) FROM categories $where";
        $countStmt = $this->connection->prepare($countSql);

        if (trim($keyword) !== '') {
            $countStmt->bindValue(':keyword', "%$keyword%");
        }

        if ($active !== null) {
            $countStmt->bindValue(':active', $active, PDO::PARAM_INT);
        }

        $countStmt->execute();
        $total = $countStmt->fetchColumn();

        return [
            'total' => $total,
            'data' => $data
        ];
    }


    /**
     * Hàm lấy thông tin chi tiết của một phân loại sản phẩm theo ID, Active có thể là null thì dùng client
     * Luôn luôn truyền active vào là số 1 để không bán phân loại sản phẩm deactive
     * @param int $id ID của phân loại sản phẩm
     * @param int|null $active Trạng thái kích hoạt của phân loại sản phẩm
     * @return array Thông tin phân loại sản phẩm
     */

    public function getOneCategory(int $id, $active = null)
    {
        $sql = "SELECT * FROM categories WHERE category_id = :id";

        if ($active !== null) {
            $sql .= " AND status = :active";
        }

        $sql .= " LIMIT 1";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($active !== null) {
            $stmt->bindValue(':active', $active, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * Thêm mới danh mục
     * @param array $data
     */
    // Kiểm tra danh mục có sản phẩm hay không
    public function hasProducts($category_id)
    {
        $sql = "SELECT COUNT(*) FROM products WHERE category_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $category_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    // Thêm danh mục
    public function createCategory($data)
    {
        $sql = "INSERT INTO categories (name, slug, status, created_at)
            VALUES (:name, :slug, :status, NOW())";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':name' => $data['name'],
            ':slug' => $data['slug'],
            ':status' => $data['status'],
        ]);
    }

    // Cập nhật danh mục
    public function updateCategory($data)
    {
        $sql = "UPDATE categories SET
                name = :name,
                slug = :slug,
                status = :status,
                updated_at = NOW()
            WHERE category_id = :id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':id' => $data['id'],
            ':name' => $data['name'],
            ':slug' => $data['slug'],
            ':status' => $data['status'],
        ]);
    }

    // XÓA CỨNG danh mục
    public function hardDeleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE category_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Lấy danh mục cho CLIENT (header, menu)
     * Chỉ lấy danh mục đang hiển thị
     */
    public function getCategoriesClient()
    {
        $sql = "SELECT category_id, name, slug
            FROM categories
            WHERE status = 1
            AND deleted_at IS NULL
            ORDER BY created_at DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

