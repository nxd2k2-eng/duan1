<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Toggle Sidebar
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}

// Sales Chart - Bar Chart
document.addEventListener('DOMContentLoaded', function() {
    const salesCtx = document.getElementById('salesChart');
    if (salesCtx && typeof chartData !== 'undefined') {
        const labels = chartData.map(item => item.day_name);
        const data = chartData.map(item => parseFloat(item.total));
        
        new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Doanh số (VNĐ)',
                    data: data,
                    backgroundColor: '#3b82f6',
                    borderRadius: 8,
                    barThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Doanh số: ' + new Intl.NumberFormat('vi-VN', { 
                                    style: 'currency', 
                                    currency: 'VND' 
                                }).format(context.parsed.y);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9' },
                        ticks: {
                            callback: function(value) {
                                return new Intl.NumberFormat('vi-VN').format(value);
                            }
                        }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }
    
    // Order Status Chart - Doughnut Chart
    const statusCtx = document.getElementById('statusChart');
    if (statusCtx && typeof statusData !== 'undefined') {
        const statusLabels = {
            'pending': 'Chờ xử lý',
            'processing': 'Đang xử lý',
            'shipped': 'Đang giao',
            'delivered': 'Đã giao',
            'cancelled': 'Đã hủy'
        };
        
        const statusColors = {
            'pending': '#eab308',
            'processing': '#3b82f6',
            'shipped': '#6366f1',
            'delivered': '#22c55e',
            'cancelled': '#ef4444'
        };
        
        const labels = statusData.map(item => statusLabels[item.status] || item.status);
        const data = statusData.map(item => parseInt(item.count));
        const colors = statusData.map(item => statusColors[item.status] || '#94a3b8');
        
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors,
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            font: { size: 12 }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed + ' đơn';
                            }
                        }
                    }
                }
            }
        });
    }
});

// Close sidebar on mobile when clicking outside
document.addEventListener('click', function(event) {
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('.toggle-sidebar');
    
    if (window.innerWidth <= 768) {
        if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    }
});
</script>