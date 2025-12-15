<?php
class ProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Lấy danh sách + phân trang + lọc
    public function getAll($params = []) {
        $limit = $params['limit'] ?? 10;
        $offset = $params['offset'] ?? 0;
        $search = $params['search'] ?? '';
        $category = $params['category'] ?? '';
        $brand = $params['brand'] ?? '';

        $where = ["p.is_active IN (0, 1)"];
        $bind = [];

        if ($search) {
            $where[] = "(p.name LIKE ? OR p.slug LIKE ?)";
            $bind[] = "%$search%";
            $bind[] = "%$search%";
        }
        if ($category) {
            $where[] = "p.category_id = ?";
            $bind[] = $category;
        }
        if ($brand) {
            $where[] = "p.brand_id = ?";
            $bind[] = $brand;
        }

        $whereClause = count($where) ? "WHERE " . implode(" AND ", $where) : "";

        // Tổng số bản ghi (cho phân trang)
        $countStmt = $this->conn->prepare("SELECT COUNT(*) FROM Products p $whereClause");
        $countStmt->execute($bind);
        $total = $countStmt->fetchColumn();

        // Danh sách sản phẩm
        $sql = "SELECT p.*, b.brand_name, c.category_name,
                       (SELECT image_url FROM Product_Images pi WHERE pi.product_id = p.product_id AND is_main = 1 LIMIT 1) AS main_image
                FROM Products p
                LEFT JOIN Brands b ON p.brand_id = b.brand_id
                LEFT JOIN Categories c ON p.category_id = c.category_id
                $whereClause
                ORDER BY p.created_at DESC
                LIMIT ? OFFSET ?";
        $bind[] = $limit;
        $bind[] = $offset;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($bind);
        $products = $stmt->fetchAll();

        return ['products' => $products, 'total' => $total];
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Products WHERE product_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO Products (name, slug, description, price, stock_quantity, category_id, brand_id, is_active)
                VALUES (:name, :slug, :description, :price, :stock_quantity, :category_id, :brand_id, :is_active)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $data['product_id'] = $id;
        $sql = "UPDATE Products SET name = :name, slug = :slug, description = :description,
                price = :price, stock_quantity = :stock_quantity, category_id = :category_id,
                brand_id = :brand_id, is_active = :is_active
                WHERE product_id = :product_id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM Products WHERE product_id = ?");
        return $stmt->execute([$id]);
    }

    public function getCategories() {
        return $this->conn->query("SELECT * FROM Categories WHERE is_active = 1 ORDER BY category_name")->fetchAll();
    }

    public function getBrands() {
        return $this->conn->query("SELECT * FROM Brands ORDER BY brand_name")->fetchAll();
    }
}
?>