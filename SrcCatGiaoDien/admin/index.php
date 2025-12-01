<?php
// Include header
require_once "header.php";

// Include sidebar
require_once "components/sidebar.php";

// Include main layout
require_once "layouts/main-layout.php";

// ===== ROUTING SYSTEM =====
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Xác định file cần include
switch($page) {
    case 'dashboard':
        require_once "pages/dashboard.php";
        break;
        
    case 'products':
        require_once "pages/products.php";
        break;
        
    case 'categories':
        // require_once "pages/categories.php";
        echo '<div class="page-header"><h1 class="page-title">Quản lý danh mục</h1></div>';
        echo '<div class="chart-card"><p>Trang này đang được phát triển...</p></div>';
        break;
        
    case 'brands':
        // require_once "pages/brands.php";
        echo '<div class="page-header"><h1 class="page-title">Quản lý thương hiệu</h1></div>';
        echo '<div class="chart-card"><p>Trang này đang được phát triển...</p></div>';
        break;
        
    case 'orders':
        // require_once "pages/orders.php";
        echo '<div class="page-header"><h1 class="page-title">Quản lý đơn hàng</h1></div>';
        echo '<div class="chart-card"><p>Trang này đang được phát triển...</p></div>';
        break;
        
    case 'customers':
        // require_once "pages/customers.php";
        echo '<div class="page-header"><h1 class="page-title">Quản lý khách hàng</h1></div>';
        echo '<div class="chart-card"><p>Trang này đang được phát triển...</p></div>';
        break;
        
    default:
        require_once "pages/dashboard.php";
        break;
}

// Close main layout
require_once "layouts/main-layout-close.php";

// Include footer
require_once "footer.php";
?>