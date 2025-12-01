<?php
// Lấy tất cả dữ liệu cần thiết
$stats = getStats($conn);
$chartData = getSalesChartData($conn);
$topProducts = getTopProducts($conn, 4);
$recentOrders = getRecentOrders($conn, 6);
$brandStats = getBrandStats($conn);
$categoryStats = getCategoryStats($conn);
$orderStatusStats = getOrderStatusStats($conn);
?>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Tổng quan về hoạt động kinh doanh shop giày của bạn</p>
</div>

<!-- Main Stats Grid - 4 Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon blue">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="stat-trend <?php echo $stats['orders_growth'] >= 0 ? 'up' : 'down'; ?>">
                <i class="fas fa-arrow-<?php echo $stats['orders_growth'] >= 0 ? 'up' : 'down'; ?>"></i> 
                <?php echo abs($stats['orders_growth']); ?>%
            </div>
        </div>
        <div class="stat-body">
            <div class="stat-value"><?php echo formatNumber($stats['total_orders']); ?></div>
            <div class="stat-label">Tổng đơn hàng</div>
            <div class="stat-sublabel"><?php echo $stats['pending_orders']; ?> đơn chờ xử lý</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon green">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-trend <?php echo $stats['revenue_growth'] >= 0 ? 'up' : 'down'; ?>">
                <i class="fas fa-arrow-<?php echo $stats['revenue_growth'] >= 0 ? 'up' : 'down'; ?>"></i> 
                <?php echo abs($stats['revenue_growth']); ?>%
            </div>
        </div>
        <div class="stat-body">
            <div class="stat-value"><?php echo formatMoney($stats['revenue']); ?></div>
            <div class="stat-label">Doanh thu</div>
            <div class="stat-sublabel">TB: <?php echo formatMoney($stats['avg_order_value']); ?>/đơn</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon yellow">
                <i class="fas fa-shoe-prints"></i>
            </div>
            <div class="stat-trend up">
                <i class="fas fa-arrow-up"></i> +32%
            </div>
        </div>
        <div class="stat-body">
            <div class="stat-value"><?php echo formatNumber($stats['total_products']); ?></div>
            <div class="stat-label">Sản phẩm</div>
            <div class="stat-sublabel"><?php echo formatNumber($stats['total_products_sold']); ?> đã bán</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon purple">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-trend <?php echo $stats['customers_growth'] >= 0 ? 'up' : 'down'; ?>">
                <i class="fas fa-arrow-<?php echo $stats['customers_growth'] >= 0 ? 'up' : 'down'; ?>"></i> 
                <?php echo abs($stats['customers_growth']); ?>%
            </div>
        </div>
        <div class="stat-body">
            <div class="stat-value"><?php echo formatNumber($stats['total_customers']); ?></div>
            <div class="stat-label">Khách hàng</div>
            <div class="stat-sublabel">Giá trị kho: <?php echo formatMoney($stats['inventory_value']); ?></div>
        </div>
    </div>
</div>

<!-- Two Column Layout -->
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 24px;">
    
    <!-- Sales Chart -->
    <div class="chart-card">
        <div class="chart-header">
            <div>
                <h3 class="chart-title">Doanh số bán hàng</h3>
                <p style="font-size: 13px; color: #94a3b8; margin-top: 4px;">7 ngày gần đây</p>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-dot blue"></span>
                    <span>Doanh số</span>
                </div>
            </div>
        </div>
        <div style="height: 300px;">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
    
    <!-- Order Status Stats -->
    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Trạng thái đơn hàng</h3>
        </div>
        <div style="height: 300px; display: flex; align-items: center; justify-content: center;">
            <canvas id="statusChart"></canvas>
        </div>
    </div>
    
</div>

<!-- Pass data to JavaScript -->
<script>
const chartData = <?php echo json_encode($chartData); ?>;
const statusData = <?php echo json_encode($orderStatusStats); ?>;
</script>

<!-- Three Column Layout -->
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 24px;">
    
    <!-- Top Brands -->
    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Top thương hiệu</h3>
        </div>
        <div style="display: grid; gap: 12px;">
            <?php if(empty($brandStats)): ?>
                <div style="text-align: center; padding: 40px; color: #94a3b8;">
                    <i class="fas fa-tags" style="font-size: 36px; margin-bottom: 12px;"></i>
                    <p>Chưa có dữ liệu</p>
                </div>
            <?php else: ?>
                <?php foreach($brandStats as $brand): ?>
                <div class="brand-item">
                    <div style="flex: 1;">
                        <div class="brand-name"><?php echo htmlspecialchars($brand['brand_name']); ?></div>
                        <div class="brand-stats">
                            <?php echo $brand['product_count']; ?> SP • <?php echo $brand['total_sold']; ?> đã bán
                        </div>
                    </div>
                    <div class="brand-revenue"><?php echo formatMoney($brand['revenue']); ?></div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Category Distribution -->
    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Danh mục sản phẩm</h3>
        </div>
        <div style="display: grid; gap: 12px;">
            <?php if(empty($categoryStats)): ?>
                <div style="text-align: center; padding: 40px; color: #94a3b8;">
                    <i class="fas fa-layer-group" style="font-size: 36px; margin-bottom: 12px;"></i>
                    <p>Chưa có dữ liệu</p>
                </div>
            <?php else: ?>
                <?php 
                $colors = ['#3b82f6', '#eab308', '#22c55e', '#a855f7', '#ef4444', '#06b6d4'];
                foreach($categoryStats as $index => $category): 
                    $color = $colors[$index % count($colors)];
                ?>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="width: 8px; height: 8px; border-radius: 50%; background: <?php echo $color; ?>;"></div>
                    <div style="flex: 1;">
                        <div style="font-size: 14px; font-weight: 500; color: #1e293b;">
                            <?php echo htmlspecialchars($category['category_name']); ?>
                        </div>
                        <div style="font-size: 12px; color: #94a3b8;">
                            <?php echo $category['product_count']; ?> SP • <?php echo $category['total_sold']; ?> đã bán
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Top Products -->
    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Sản phẩm bán chạy</h3>
        </div>
        <div style="display: grid; gap: 12px;">
            <?php if(empty($topProducts)): ?>
                <div style="text-align: center; padding: 40px; color: #94a3b8;">
                    <i class="fas fa-box" style="font-size: 36px; margin-bottom: 12px;"></i>
                    <p>Chưa có dữ liệu</p>
                </div>
            <?php else: ?>
                <?php foreach($topProducts as $product): ?>
                <div class="product-item">
                    <div style="flex: 1;">
                        <div class="product-name"><?php echo htmlspecialchars($product['name']); ?></div>
                        <div class="product-stats">
                            <?php echo $product['total_sold']; ?> đã bán • <?php echo formatMoney($product['revenue']); ?>
                        </div>
                    </div>
                    <div class="product-growth">+<?php echo $product['growth']; ?>%</div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
</div>

<!-- Recent Orders Table -->
<div class="chart-card">
    <div class="chart-header">
        <h3 class="chart-title">Đơn hàng gần đây</h3>
        <a href="#" class="view-all-link">Xem tất cả <i class="fas fa-arrow-right"></i></a>
    </div>
    
    <?php if(empty($recentOrders)): ?>
        <div style="text-align: center; padding: 60px; color: #94a3b8;">
            <i class="fas fa-shopping-bag" style="font-size: 48px; margin-bottom: 16px;"></i>
            <p>Chưa có đơn hàng nào</p>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Khách hàng</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($recentOrders as $order): ?>
                    <tr>
                        <td class="order-id">#<?php echo $order['order_id']; ?></td>
                        <td class="customer-name"><?php echo htmlspecialchars($order['customer_name']); ?></td>
                        <td><?php echo $order['item_count']; ?> sản phẩm</td>
                        <td class="order-amount"><?php echo formatMoney($order['total_amount']); ?></td>
                        <td><?php echo getStatusBadge($order['status']); ?></td>
                        <td class="order-date"><?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></td>
                        <td>
                            <button class="action-btn view" title="Xem chi tiết">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn edit" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>