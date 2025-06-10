// index.js

// MOBILE MENU TOGGLE
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // LOGIN MODAL
    const loginButtons = Array.from(document.querySelectorAll('button')).filter(
        btn => btn.textContent.trim() === 'Masuk'
    );
    const loginModal = document.getElementById('loginModal');
    const closeLoginModal = document.getElementById('closeLoginModal');

    function showLoginModal() {
        if (loginModal) {
            loginModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function hideLoginModal() {
        if (loginModal) {
            loginModal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    loginButtons.forEach(button => {
        button.addEventListener('click', showLoginModal);
    });

    if (closeLoginModal) {
        closeLoginModal.addEventListener('click', hideLoginModal);
    }

    if (loginModal) {
        loginModal.addEventListener('click', function (event) {
            if (event.target === loginModal) {
                hideLoginModal();
            }
        });
    }

    // CHARTS
    if (typeof echarts !== 'undefined') {
        // Category Chart
        const categoryChartEl = document.getElementById('categoryChart');
        if (categoryChartEl) {
            const categoryChart = echarts.init(categoryChartEl);
            const categoryOption = {
                animation: false,
                tooltip: {
                    trigger: 'item',
                    backgroundColor: 'rgba(255, 255, 255, 0.8)',
                    textStyle: { color: '#1f2937' }
                },
                legend: {
                    top: 'bottom',
                    left: 'center',
                    textStyle: { color: '#1f2937' }
                },
                series: [{
                    name: 'Kategori Event',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 10,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: { show: false, position: 'center' },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: 18,
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: { show: false },
                    data: [
                        { value: 35, name: 'Konser', itemStyle: { color: 'rgba(87, 181, 231, 1)' } },
                        { value: 25, name: 'Seminar', itemStyle: { color: 'rgba(141, 211, 199, 1)' } },
                        { value: 20, name: 'Workshop', itemStyle: { color: 'rgba(251, 191, 114, 1)' } },
                        { value: 15, name: 'Pameran', itemStyle: { color: 'rgba(252, 141, 98, 1)' } }
                    ]
                }]
            };
            categoryChart.setOption(categoryOption);
        }

        // Sales Chart
        const salesChartEl = document.getElementById('salesChart');
        if (salesChartEl) {
            const salesChart = echarts.init(salesChartEl);
            const salesOption = {
                animation: false,
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(255, 255, 255, 0.8)',
                    textStyle: { color: '#1f2937' }
                },
                xAxis: {
                    type: 'category',
                    data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    axisLine: { lineStyle: { color: '#ddd' } },
                    axisLabel: { color: '#1f2937' }
                },
                yAxis: {
                    type: 'value',
                    axisLine: { lineStyle: { color: '#ddd' } },
                    axisLabel: { color: '#1f2937' },
                    splitLine: { lineStyle: { color: '#eee' } }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    top: '3%',
                    containLabel: true
                },
                series: [{
                    name: 'Penjualan Tiket',
                    type: 'line',
                    smooth: true,
                    data: [1200, 1800, 1500, 2500, 3000, 3500],
                    itemStyle: { color: 'rgba(87, 181, 231, 1)' },
                    lineStyle: { width: 3 },
                    areaStyle: {
                        color: {
                            type: 'linear',
                            x: 0,
                            y: 0,
                            x2: 0,
                            y2: 1,
                            colorStops: [
                                { offset: 0, color: 'rgba(87, 181, 231, 0.3)' },
                                { offset: 1, color: 'rgba(87, 181, 231, 0.1)' }
                            ]
                        }
                    },
                    showSymbol: false
                }]
            };
            salesChart.setOption(salesOption);

            window.addEventListener('resize', function () {
                if (categoryChartEl) echarts.getInstanceByDom(categoryChartEl).resize();
                if (salesChartEl) echarts.getInstanceByDom(salesChartEl).resize();
            });
        }
    }
});
