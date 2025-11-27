<?php
// Lấy dữ liệu từ database
$stats = getStats($conn);
$chartData = getSalesChartData($conn);
$topProducts = getTopProducts($conn, 4);
?>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Chào mừng trở lại! Đây là tổng quan về shop giày của bạn.</p>
</div>

<!-- Stats Cards -->
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
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon yellow">
                <i class="fas fa-shoe-prints"></i>
            </div>
            <div class="stat-trend up">
                <i class="fas fa-arrow-up"></i> +45%
            </div>
        </div>
        <div class="stat-body">
            <div class="stat-value"><?php echo formatNumber($stats['total_products_sold']); ?></div>
            <div class="stat-label">Sản phẩm bán ra</div>
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
        </div>
    </div>
</div>

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

<!-- Pass data to JavaScript -->
<script>
const chartData = <?php echo json_encode($chartData); ?>;
</script>

<!-- Weekly Stats -->
<div class="chart-card">
    <div class="chart-header">
        <h3 class="chart-title">Sản phẩm bán chạy tuần này</h3>
    </div>
    
    <div style="display: grid; gap: 16px;">
        
        <?php if(empty($topProducts)): ?>
            <div style="text-align: center; padding: 40px; color: #94a3b8;">
                <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 16px;"></i>
                <p>Chưa có dữ liệu sản phẩm</p>
            </div>
        <?php else: ?>
            <?php 
            $icons = ['shopping-cart', 'star', 'comment-dots', 'heart'];
            $colors = ['blue', 'yellow', 'green', 'purple'];
            $iconColors = ['#3b82f6', '#eab308', '#22c55e', '#a855f7'];
            ?>
            <?php foreach($topProducts as $index => $product): ?>
            <div style="display: flex; align-items: center; gap: 16px; padding: 16px; background: #f8fafc; border-radius: 8px;">
                <div class="stat-icon <?php echo $colors[$index]; ?>" style="width: 56px; height: 56px;">
                    <i class="fas fa-<?php echo $icons[$index]; ?>"></i>
                </div>
                <div style="flex: 1;">
                    <div style="font-weight: 600; color: #1e293b; margin-bottom: 4px;">
                        <?php echo htmlspecialchars($product['name']); ?>
                    </div>
                    <div style="font-size: 13px; color: #64748b;">
                        Đã bán: <?php echo $product['total_sold']; ?> sản phẩm
                    </div>
                </div>
                <div style="font-size: 20px; font-weight: 700; color: <?php echo $iconColors[$index]; ?>;">
                    +<?php echo $product['growth']; ?>%
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>
</div>