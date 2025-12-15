<?php
require_once __DIR__ . '/../Models/ProductModel.php';

class ProductController {
    private $model;

    public function __construct($conn) {
        $this->model = new ProductModel($conn);
    }

    public function index() {
        $page = max(1, $_GET['page'] ?? 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $data = $this->model->getAll([
            'limit' => $limit,
            'offset' => $offset,
            'search' => $_GET['search'] ?? '',
            'category' => $_GET['category'] ?? '',
            'brand' => $_GET['brand'] ?? ''
        ]);

        $products = $data['products'];
        $total = $data['total'];
        $totalPages = ceil($total / $limit);

        $categories = $this->model->getCategories();
        $brands = $this->model->getBrands();

        // Truyền biến sang view
        require_once __DIR__ . '/../Views/products/list.php';
    }

    // Xử lý AJAX (add, edit, delete, get one)
    public function ajax() {
        header('Content-Type: application/json');

        if (!isset($_SESSION['admin_logged_in'])) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }

        $action = $_POST['action'] ?? '';

        switch ($action) {
            case 'get':
                $product = $this->model->find($_POST['id']);
                echo json_encode($product ?: ['success' => false]);
                break;

            case 'create':
                $data = [
                    'name' => $_POST['name'],
                    'slug' => $_POST['slug'],
                    'description' => $_POST['description'] ?? '',
                    'price' => $_POST['price'],
                    'stock_quantity' => $_POST['stock_quantity'],
                    'category_id' => $_POST['category_id'],
                    'brand_id' => $_POST['brand_id'],
                    'is_active' => $_POST['is_active'] ?? 1
                ];
                $result = $this->model->create($data);
                echo json_encode(['success' => $result, 'message' => $result ? 'Thêm thành công!' : 'Lỗi']);
                break;

            case 'update':
                $data = [
                    'name' => $_POST['name'],
                    'slug' => $_POST['slug'],
                    'description' => $_POST['description'] ?? '',
                    'price' => $_POST['price'],
                    'stock_quantity' => $_POST['stock_quantity'],
                    'category_id' => $_POST['category_id'],
                    'brand_id' => $_POST['brand_id'],
                    'is_active' => $_POST['is_active'] ?? 1
                ];
                $result = $this->model->update($_POST['id'], $data);
                echo json_encode(['success' => $result, 'message' => $result ? 'Cập nhật thành công!' : 'Lỗi']);
                break;

            case 'delete':
                $result = $this->model->delete($_POST['id']);
                echo json_encode(['success' => $result, 'message' => $result ? 'Xóa thành công!' : 'Lỗi']);
                break;

            default:
                echo json_encode(['success' => false, 'message' => 'Action không hợp lệ']);
        }
        exit;
    }
}
?>