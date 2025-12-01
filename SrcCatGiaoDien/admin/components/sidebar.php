<?php
// Lấy trang hiện tại để active menu
$currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>
<aside class="sidebar">
    <!-- Logo -->
    <div class="sidebar-header">
        <a href="index.php" class="logo">
            <div class="logo-icon">
                <i class="fas fa-shoe-prints"></i>
            </div>
            <span>Shop</span>
        </a>
    </div>
    
    <!-- Navigation -->
    <nav class="sidebar-nav">
        
        <!-- Home Section -->
        <div class="nav-section">
            <div class="nav-section-title">Tổng quan</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php?page=dashboard" class="nav-link <?php echo $currentPage == 'dashboard' ? 'active' : ''; ?>">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=statistics" class="nav-link <?php echo $currentPage == 'statistics' ? 'active' : ''; ?>">
                        <i class="fas fa-chart-pie"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Shop Management -->
        <div class="nav-section">
            <div class="nav-section-title">Quản lý Shop</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php?page=products" class="nav-link <?php echo $currentPage == 'products' ? 'active' : ''; ?>">
                        <i class="fas fa-shoe-prints"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=categories" class="nav-link <?php echo $currentPage == 'categories' ? 'active' : ''; ?>">
                        <i class="fas fa-layer-group"></i>
                        <span>Danh mục</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=brands" class="nav-link <?php echo $currentPage == 'brands' ? 'active' : ''; ?>">
                        <i class="fas fa-tags"></i>
                        <span>Thương hiệu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=attributes" class="nav-link <?php echo $currentPage == 'attributes' ? 'active' : ''; ?>">
                        <i class="fas fa-palette"></i>
                        <span>Màu sắc & Size</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Orders -->
        <div class="nav-section">
            <div class="nav-section-title">Đơn hàng</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php?page=orders" class="nav-link <?php echo $currentPage == 'orders' ? 'active' : ''; ?>">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Đơn hàng</span>
                        <span class="nav-badge">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=shipping" class="nav-link <?php echo $currentPage == 'shipping' ? 'active' : ''; ?>">
                        <i class="fas fa-truck"></i>
                        <span>Vận chuyển</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=returns" class="nav-link <?php echo $currentPage == 'returns' ? 'active' : ''; ?>">
                        <i class="fas fa-undo"></i>
                        <span>Hoàn trả</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Customers -->
        <div class="nav-section">
            <div class="nav-section-title">Khách hàng</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php?page=customers" class="nav-link <?php echo $currentPage == 'customers' ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i>
                        <span>Người dùng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=reviews" class="nav-link <?php echo $currentPage == 'reviews' ? 'active' : ''; ?>">
                        <i class="fas fa-star"></i>
                        <span>Đánh giá</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=coupons" class="nav-link <?php echo $currentPage == 'coupons' ? 'active' : ''; ?>">
                        <i class="fas fa-gift"></i>
                        <span>Mã giảm giá</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Content -->
        <div class="nav-section">
            <div class="nav-section-title">Nội dung</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php?page=banners" class="nav-link <?php echo $currentPage == 'banners' ? 'active' : ''; ?>">
                        <i class="fas fa-bullhorn"></i>
                        <span>Banner & Ads</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=news" class="nav-link <?php echo $currentPage == 'news' ? 'active' : ''; ?>">
                        <i class="fas fa-newspaper"></i>
                        <span>Tin tức</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=email" class="nav-link <?php echo $currentPage == 'email' ? 'active' : ''; ?>">
                        <i class="fas fa-envelope"></i>
                        <span>Email Marketing</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Settings -->
        <div class="nav-section">
            <div class="nav-section-title">Hệ thống</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php?page=settings" class="nav-link <?php echo $currentPage == 'settings' ? 'active' : ''; ?>">
                        <i class="fas fa-cog"></i>
                        <span>Cài đặt</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=admins" class="nav-link <?php echo $currentPage == 'admins' ? 'active' : ''; ?>">
                        <i class="fas fa-user-shield"></i>
                        <span>Quản trị viên</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </nav>
</aside>