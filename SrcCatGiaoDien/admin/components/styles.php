<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: #f8fafc;
    color: #1e293b;
}

.admin-wrapper {
    display: flex;
    min-height: 100vh;
}

/* ===== SIDEBAR ===== */
.sidebar {
    width: 280px;
    background: #ffffff;
    border-right: 1px solid #e2e8f0;
    position: fixed;
    height: 100vh;
    overflow-y: auto;
    z-index: 1000;
    transition: all 0.3s ease;
}

.sidebar-header {
    padding: 24px 20px;
    border-bottom: 1px solid #e2e8f0;
}

.logo {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 24px;
    font-weight: 700;
    color: #3b82f6;
    text-decoration: none;
}

.logo-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}

.sidebar-nav {
    padding: 20px 0;
}

.nav-section {
    margin-bottom: 24px;
}

.nav-section-title {
    font-size: 11px;
    font-weight: 600;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0 20px 8px;
}

.nav-menu {
    list-style: none;
}

.nav-item {
    margin: 2px 12px;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    color: #64748b;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s ease;
    font-size: 14px;
    font-weight: 500;
}

.nav-link:hover {
    background: #f1f5f9;
    color: #3b82f6;
}

.nav-link.active {
    background: #eff6ff;
    color: #3b82f6;
}

.nav-link i {
    width: 20px;
    text-align: center;
    font-size: 18px;
}

.nav-badge {
    margin-left: auto;
    background: #fee2e2;
    color: #dc2626;
    font-size: 11px;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 12px;
}

/* ===== MAIN CONTENT ===== */
.main-content {
    flex: 1;
    margin-left: 280px;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* ===== TOPBAR ===== */
.topbar {
    background: #ffffff;
    border-bottom: 1px solid #e2e8f0;
    padding: 16px 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 999;
    margin: 0;
}

.topbar-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.toggle-sidebar {
    background: none;
    border: none;
    font-size: 24px;
    color: #64748b;
    cursor: pointer;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.toggle-sidebar:hover {
    background: #f1f5f9;
    color: #3b82f6;
}

.search-box {
    position: relative;
}

.search-box input {
    width: 300px;
    padding: 10px 16px 10px 40px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.2s ease;
}

.search-box input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-box i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

.notification-btn {
    position: relative;
    background: none;
    border: none;
    font-size: 20px;
    color: #64748b;
    cursor: pointer;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.notification-btn:hover {
    background: #f1f5f9;
    color: #3b82f6;
}

.notification-badge {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 8px;
    height: 8px;
    background: #ef4444;
    border-radius: 50%;
    border: 2px solid #ffffff;
}

.user-menu {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.user-menu:hover {
    background: #f1f5f9;
}

.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 14px;
}

.user-info {
    display: flex;
    flex-direction: column;
}

.user-name {
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
}

.user-role {
    font-size: 12px;
    color: #94a3b8;
}

/* ===== PAGE CONTENT ===== */
.page-content {
    padding: 16px 32px 32px 32px;
    flex: 1;
    background: #f8fafc;
}

.page-header {
    margin-bottom: 16px;
}

.page-title {
    font-size: 28px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
}

.page-subtitle {
    font-size: 14px;
    color: #64748b;
}

/* ===== STATS CARDS ===== */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 24px;
    margin-bottom: 32px;
}

.stat-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 24px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
}

.stat-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.stat-icon.blue {
    background: #eff6ff;
    color: #3b82f6;
}

.stat-icon.yellow {
    background: #fef9c3;
    color: #eab308;
}

.stat-icon.green {
    background: #dcfce7;
    color: #22c55e;
}

.stat-icon.purple {
    background: #f3e8ff;
    color: #a855f7;
}

.stat-trend {
    font-size: 12px;
    font-weight: 600;
    padding: 4px 8px;
    border-radius: 6px;
}

.stat-trend.up {
    background: #dcfce7;
    color: #16a34a;
}

.stat-trend.down {
    background: #fee2e2;
    color: #dc2626;
}

.stat-body {
    margin-bottom: 8px;
}

.stat-value {
    font-size: 32px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 4px;
}

.stat-label {
    font-size: 14px;
    color: #64748b;
}

/* ===== CHART CARD ===== */
.chart-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 24px;
}

.chart-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

.chart-title {
    font-size: 18px;
    font-weight: 600;
    color: #1e293b;
}

.chart-legend {
    display: flex;
    gap: 16px;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #64748b;
}

.legend-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.legend-dot.blue {
    background: #3b82f6;
}

.legend-dot.cyan {
    background: #06b6d4;
}

/* ===== FOOTER ===== */
.footer {
    background: #ffffff;
    border-top: 1px solid #e2e8f0;
    padding: 20px 32px;
    margin-left: 280px;
    text-align: center;
}

.footer-content p {
    font-size: 14px;
    color: #64748b;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-280px);
    }
    
    .sidebar.active {
        transform: translateX(0);
    }
    
    .main-content,
    .footer {
        margin-left: 0;
    }
    
    .search-box input {
        width: 200px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>