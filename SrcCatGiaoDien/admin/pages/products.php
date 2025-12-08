<?php

// Lấy danh sách sản phẩm với phân trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1; // ép về 1 nếu nhỏ hơn
$limit = 10;
$offset = ($page - 1) * $limit;


// Lọc theo tìm kiếm
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';

// Build query
$where = ["p.is_active IN (0, 1)"];
$params = [];

if ($search) {
    $where[] = "(p.name LIKE ? OR p.slug LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

if ($category) {
    $where[] = "p.category_id = ?";
    $params[] = $category;
}

if ($brand) {
    $where[] = "p.brand_id = ?";
    $params[] = $brand;
}

$whereClause = implode(" AND ", $where);

// Đếm tổng số sản phẩm
$countSql = "SELECT COUNT(*) as total FROM products p WHERE $whereClause";
$stmt = $conn->prepare($countSql);
$stmt->execute($params);
$total = $stmt->fetch()['total'];
$totalPages = ceil($total / $limit);

// Lấy danh sách sản phẩm
$sql = "SELECT 
            p.*,
            b.brand_name,
            c.category_name,
            (SELECT image_url FROM Product_Images WHERE product_id = p.product_id AND is_main = 1 LIMIT 1) as main_image
        FROM Products p
        LEFT JOIN Brands b ON p.brand_id = b.brand_id
        LEFT JOIN Categories c ON p.category_id = c.category_id
        WHERE $whereClause
        ORDER BY p.created_at DESC
        LIMIT ? OFFSET ?";

$params[] = $limit;
$params[] = $offset;

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();

// Lấy danh sách categories và brands cho filter
$categories = $conn->query("SELECT * FROM Categories WHERE is_active = 1 ORDER BY category_name")->fetchAll();
$brands = $conn->query("SELECT * FROM Brands ORDER BY brand_name")->fetchAll();
?>

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Quản lý sản phẩm</h1>
        <p class="page-subtitle">Quản lý toàn bộ sản phẩm trong cửa hàng</p>
    </div>
    <button class="btn-primary" onclick="openAddModal()">
        <i class="fas fa-plus"></i> Thêm sản phẩm
    </button>
</div>

<!-- Filters -->
<div class="filter-bar">
    <div class="search-box-large">
        <i class="fas fa-search"></i>
        <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." value="<?php echo htmlspecialchars($search); ?>">
    </div>
    
    <select id="categoryFilter" class="filter-select">
        <option value="">Tất cả danh mục</option>
        <?php foreach($categories as $cat): ?>
            <option value="<?php echo $cat['category_id']; ?>" <?php echo $category == $cat['category_id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($cat['category_name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <select id="brandFilter" class="filter-select">
        <option value="">Tất cả thương hiệu</option>
        <?php foreach($brands as $b): ?>
            <option value="<?php echo $b['brand_id']; ?>" <?php echo $brand == $b['brand_id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($b['brand_name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <button class="btn-secondary" onclick="applyFilters()">
        <i class="fas fa-filter"></i> Lọc
    </button>
    
    <button class="btn-secondary" onclick="resetFilters()">
        <i class="fas fa-redo"></i> Reset
    </button>
</div>

<!-- Stats Summary -->
<div class="stats-summary">
    <div class="stat-item">
        <span class="stat-label">Tổng sản phẩm:</span>
        <span class="stat-value"><?php echo $total; ?></span>
    </div>
    <div class="stat-item">
        <span class="stat-label">Đang hiển thị:</span>
        <span class="stat-value"><?php echo count($products); ?></span>
    </div>
</div>

<!-- Products Table -->
<div class="chart-card">
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th width="80">Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Thương hiệu</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Tồn kho</th>
                    <th>Trạng thái</th>
                    <th width="120">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($products)): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 60px;">
                            <i class="fas fa-box-open" style="font-size: 48px; color: #94a3b8; margin-bottom: 16px;"></i>
                            <p style="color: #64748b;">Không tìm thấy sản phẩm nào</p>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td>
                            <div class="product-image">
                                <?php if($product['main_image']): ?>
                                    <img src="<?php echo htmlspecialchars($product['main_image']); ?>" alt="Product">
                                <?php else: ?>
                                    <div class="no-image"><i class="fas fa-image"></i></div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="product-name-cell">
                                <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                                <small><?php echo htmlspecialchars($product['slug']); ?></small>
                            </div>
                        </td>
                        <td><?php echo htmlspecialchars($product['brand_name'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($product['category_name'] ?? 'N/A'); ?></td>
                        <td class="price-cell"><?php echo formatMoney($product['price']); ?></td>
                        <td>
                            <span class="stock-badge <?php echo $product['stock_quantity'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                                <?php echo $product['stock_quantity']; ?>
                            </span>
                        </td>
                        <td>
                            <?php if($product['is_active']): ?>
                                <span class="status-badge delivered">Còn Hàng</span>
                            <?php else: ?>
                                <span class="status-badge cancelled">Hết Hàng</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" onclick="viewProduct(<?php echo $product['product_id']; ?>)" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" onclick="editProduct(<?php echo $product['product_id']; ?>)" title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" onclick="deleteProduct(<?php echo $product['product_id']; ?>, '<?php echo htmlspecialchars($product['name']); ?>')" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <?php if($totalPages > 1): ?>
    <div class="pagination">
        <?php if($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>&category=<?php echo $category; ?>&brand=<?php echo $brand; ?>" class="page-link">
                <i class="fas fa-chevron-left"></i>
            </a>
        <?php endif; ?>
        
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <?php if($i == $page): ?>
                <span class="page-link active"><?php echo $i; ?></span>
            <?php else: ?>
                <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&category=<?php echo $category; ?>&brand=<?php echo $brand; ?>" class="page-link">
                    <?php echo $i; ?>
                </a>
            <?php endif; ?>
        <?php endfor; ?>
        
        <?php if($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>&category=<?php echo $category; ?>&brand=<?php echo $brand; ?>" class="page-link">
                <i class="fas fa-chevron-right"></i>
            </a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

<!-- Add/Edit Product Modal -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Thêm sản phẩm mới</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <form id="productForm" method="POST" action="actions/product_action.php">
            <input type="hidden" name="action" id="formAction" value="add">
            <input type="hidden" name="product_id" id="productId">
            
            <div class="form-grid">
                <div class="form-group">
                    <label>Tên sản phẩm <span class="required">*</span></label>
                    <input type="text" name="name" id="productName" required>
                </div>
                
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" id="productSlug">
                    <small>Để trống để tự động tạo từ tên</small>
                </div>
                
                <div class="form-group">
                    <label>Giá <span class="required">*</span></label>
                    <input type="number" name="price" id="productPrice" required min="0" step="1000">
                </div>
                
                <div class="form-group">
                    <label>Tồn kho <span class="required">*</span></label>
                    <input type="number" name="stock_quantity" id="productStock" required min="0">
                </div>
                
                <div class="form-group">
                    <label>Thương hiệu</label>
                    <select name="brand_id" id="productBrand">
                        <option value="">-- Chọn thương hiệu --</option>
                        <?php foreach($brands as $b): ?>
                            <option value="<?php echo $b['brand_id']; ?>"><?php echo htmlspecialchars($b['brand_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category_id" id="productCategory">
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?php echo $cat['category_id']; ?>"><?php echo htmlspecialchars($cat['category_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group full-width">
                    <label>Mô tả</label>
                    <textarea name="description" id="productDescription" rows="4"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="is_active" id="productStatus">
                        <option value="1">Hoạt động</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal()">Hủy</button>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Lưu
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Filter functions
function applyFilters() {
    const search = document.getElementById('searchInput').value;
    const category = document.getElementById('categoryFilter').value;
    const brand = document.getElementById('brandFilter').value;
    
    let url = '?page=1';
    if(search) url += '&search=' + encodeURIComponent(search);
    if(category) url += '&category=' + category;
    if(brand) url += '&brand=' + brand;
    
    window.location.href = url;
}

function resetFilters() {
    window.location.href = '?';
}

// Enter to search
document.getElementById('searchInput').addEventListener('keypress', function(e) {
    if(e.key === 'Enter') {
        applyFilters();
    }
});

// Modal functions
function openAddModal() {
    document.getElementById('modalTitle').textContent = 'Thêm sản phẩm mới';
    document.getElementById('formAction').value = 'add';
    document.getElementById('productForm').reset();
    document.getElementById('productModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('productModal').style.display = 'none';
}

function editProduct(id) {
    // TODO: Load product data via AJAX and fill form
    alert('Chức năng sửa sẽ được hoàn thiện sau');
}

function viewProduct(id) {
    alert('Xem chi tiết sản phẩm #' + id);
}

function deleteProduct(id, name) {
    if(confirm('Bạn có chắc muốn xóa sản phẩm "' + name + '"?')) {
        // TODO: Implement delete via AJAX
        alert('Chức năng xóa sẽ được hoàn thiện sau');
    }
}

// Auto generate slug from name
document.getElementById('productName').addEventListener('input', function() {
    if(!document.getElementById('productSlug').value) {
        const slug = this.value
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-');
        document.getElementById('productSlug').value = slug;
    }
});

// Close modal on outside click
window.onclick = function(event) {
    const modal = document.getElementById('productModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>