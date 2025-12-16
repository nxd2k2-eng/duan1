<?php

class CategoryController
{
    private $connection;
    private $categoryModel;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->categoryModel = new Category($connection);
    }

    public function index()
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $limit = 10;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        $result = $this->categoryModel->getAllCategories($page, $limit, $keyword, 1,'desc');

        $categories = $result['data'];
        $total = $result['total'];

        require_once "admin/category.php";
    }

    public function create()
    {
        $categories = $this->categoryModel->getAllCategories();
        require_once "admin/product-category-add.php";
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location:?role=admin&module=categories");
            exit;
        }

        // Lấy dữ liệu từ form
        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $status = isset($_POST['status']) ? (int) $_POST['status'] : 1;

        // Validate đơn giản
        if ($name === '') {
            echo "Tên danh mục không được để trống";
            exit;
        }

        // Nếu không nhập slug → tự tạo từ name
        if ($slug === '') {
            $slug = $this->generateSlug($name);
        }

        // Gửi sang Model
        $this->categoryModel->createCategory([
            'name' => $name,
            'slug' => $slug,
            'status' => $status
        ]);

        // Quay lại danh sách
        header("Location:?role=admin&module=categories");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        if (!$id) {
            header("Location:?role=admin&module=categories");
            exit;
        }

        $category = $this->categoryModel->getOneCategory($id);
        if (!$category) {
            header("Location:?role=admin&module=categories");
            exit;
        }

        require_once "admin/product-category-edit.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location:?role=admin&module=categories");
            exit;
        }

        $id = (int) $_POST['id'];
        $name = trim($_POST['name']);
        $slug = trim($_POST['slug']);
        $status = (int) $_POST['status'];

        if ($name === '') {
            header("Location:?role=admin&module=categories&action=edit&id=$id");
            exit;
        }

        $this->categoryModel->updateCategory([
            'id' => $id,
            'name' => $name,
            'slug' => $slug,
            'status' => $status
        ]);

        header("Location:?role=admin&module=categories");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        if (!$id) {
            header("Location:?role=admin&module=categories");
            exit;
        }

        // Nếu danh mục đang có sản phẩm → KHÔNG XÓA
        if ($this->categoryModel->hasProducts($id)) {
            echo "<script>
            alert('Không thể xóa! Danh mục đang có sản phẩm.');
            window.location.href='?role=admin&module=categories';
        </script>";
            exit;
        }

        // Không có sản phẩm → xóa cứng
        $this->categoryModel->hardDeleteCategory($id);

        header("Location:?role=admin&module=categories");
        exit;
    }


    private function generateSlug($string)
    {
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9\s-]/u', '', $string);
        $string = preg_replace('/[\s-]+/', '-', $string);
        return trim($string, '-');
    }

}
