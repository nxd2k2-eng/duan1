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

.stat-sublabel {
    font-size: 12px;
    color: #94a3b8;
    margin-top: 4px;
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

/* ===== NEW DASHBOARD STYLES ===== */
.view-all-link {
    font-size: 13px;
    color: #3b82f6;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
}

.view-all-link:hover {
    color: #2563eb;
}

.brand-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #f8fafc;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.brand-item:hover {
    background: #f1f5f9;
}

.brand-name {
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 4px;
}

.brand-stats {
    font-size: 12px;
    color: #64748b;
}

.brand-revenue {
    font-size: 14px;
    font-weight: 700;
    color: #22c55e;
}

.product-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #f8fafc;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.product-item:hover {
    background: #f1f5f9;
}

.product-name {
    font-size: 13px;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 4px;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-stats {
    font-size: 11px;
    color: #64748b;
}

.product-growth {
    font-size: 14px;
    font-weight: 700;
    color: #22c55e;
}

.table-responsive {
    overflow-x: auto;
    margin-top: 16px;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table thead {
    background: #f8fafc;
}

.data-table th {
    padding: 12px 16px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #e2e8f0;
}

.data-table tbody tr {
    border-bottom: 1px solid #e2e8f0;
    transition: all 0.2s ease;
}

.data-table tbody tr:hover {
    background: #f8fafc;
}

.data-table td {
    padding: 16px;
    font-size: 14px;
    color: #1e293b;
}

.order-id {
    font-weight: 600;
    color: #3b82f6;
}

.customer-name {
    font-weight: 500;
}

.order-amount {
    font-weight: 600;
    color: #22c55e;
}

.order-date {
    color: #64748b;
    font-size: 13px;
}

.status-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.status-badge.pending {
    background: #fef3c7;
    color: #d97706;
}

.status-badge.processing {
    background: #dbeafe;
    color: #2563eb;
}

.status-badge.shipped {
    background: #e0e7ff;
    color: #6366f1;
}

.status-badge.delivered {
    background: #dcfce7;
    color: #16a34a;
}

.status-badge.cancelled {
    background: #fee2e2;
    color: #dc2626;
}

.action-btn {
    background: none;
    border: none;
    padding: 8px;
    cursor: pointer;
    color: #64748b;
    border-radius: 6px;
    transition: all 0.2s ease;
    font-size: 14px;
}

.action-btn:hover {
    background: #f1f5f9;
}

.action-btn.view:hover {
    color: #3b82f6;
}

.action-btn.edit:hover {
    color: #eab308;
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
@media (max-width: 1200px) {
    div[style*="grid-template-columns: 2fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
}

@media (max-width: 992px) {
    div[style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

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
    
    div[style*="grid-template-columns: 2fr 1fr"],
    div[style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: 1fr !important;
    }
    
    .page-content {
        padding: 16px;
    }
}

/* ===== PRODUCTS PAGE STYLES ===== */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.btn-primary {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

.btn-secondary {
    background: white;
    color: #64748b;
    border: 1px solid #e2e8f0;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.btn-secondary:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

/* Filter Bar */
.filter-bar {
    display: flex;
    gap: 12px;
    margin-bottom: 16px;
    flex-wrap: wrap;
}

.search-box-large {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.search-box-large input {
    width: 100%;
    padding: 10px 16px 10px 40px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
}

.search-box-large input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-box-large i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
}

.filter-select {
    padding: 10px 16px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
    color: #1e293b;
    background: white;
    cursor: pointer;
    min-width: 150px;
}

.filter-select:focus {
    outline: none;
    border-color: #3b82f6;
}

/* Stats Summary */
.stats-summary {
    display: flex;
    gap: 24px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 8px;
    margin-bottom: 16px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.stat-label {
    font-size: 14px;
    color: #64748b;
}

.stat-item .stat-value {
    font-size: 18px;
    font-weight: 700;
    color: #3b82f6;
}

/* Product Image */
.product-image {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image {
    color: #cbd5e1;
    font-size: 24px;
}

.product-name-cell {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.product-name-cell strong {
    color: #1e293b;
    font-size: 14px;
}

.product-name-cell small {
    color: #94a3b8;
    font-size: 12px;
}

.price-cell {
    font-weight: 600;
    color: #22c55e;
}

.stock-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
}

.stock-badge.in-stock {
    background: #dcfce7;
    color: #16a34a;
}

.stock-badge.out-of-stock {
    background: #fee2e2;
    color: #dc2626;
}

.action-buttons {
    display: flex;
    gap: 4px;
}

.action-btn.delete:hover {
    color: #ef4444;
    background: #fef2f2;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-top: 24px;
    padding-top: 24px;
    border-top: 1px solid #e2e8f0;
}

.page-link {
    padding: 8px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    color: #64748b;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s ease;
}

.page-link:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

.page-link.active {
    background: #3b82f6;
    color: white;
    border-color: #3b82f6;
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: white;
    border-radius: 12px;
    width: 90%;
    max-width: 800px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px;
    border-bottom: 1px solid #e2e8f0;
}

.modal-header h3 {
    font-size: 20px;
    font-weight: 600;
    color: #1e293b;
}

.modal-close {
    background: none;
    border: none;
    font-size: 28px;
    color: #94a3b8;
    cursor: pointer;
    line-height: 1;
    padding: 0;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.modal-close:hover {
    background: #f1f5f9;
    color: #64748b;
}

.modal form {
    padding: 24px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
}

.required {
    color: #ef4444;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 10px 14px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
    color: #1e293b;
    font-family: inherit;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-group small {
    font-size: 12px;
    color: #94a3b8;
}

.modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    padding: 20px 24px;
    border-top: 1px solid #e2e8f0;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    
    .filter-bar {
        flex-direction: column;
    }
    
    .filter-select {
        width: 100%;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
    }
}

</style>