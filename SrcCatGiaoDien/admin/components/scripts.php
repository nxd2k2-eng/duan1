<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Toggle Sidebar
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}

// Sales Chart - SỬ DỤNG DATA THẬT TỪ DATABASE
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('salesChart');
    if (ctx && typeof chartData !== 'undefined') {
        // Chuẩn bị data từ PHP
        const labels = chartData.map(item => item.day_name);
        const data = chartData.map(item => parseFloat(item.total));
        
        new Chart(ctx, {
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
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('vi-VN', { 
                                        style: 'currency', 
                                        currency: 'VND' 
                                    }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f1f5f9'
                        },
                        ticks: {
                            callback: function(value) {
                                return new Intl.NumberFormat('vi-VN').format(value);
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
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