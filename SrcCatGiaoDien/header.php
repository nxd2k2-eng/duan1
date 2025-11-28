<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOEZ - Shop Giày Chính Hãng</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Đang tải...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none border-bottom d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="#" class="text-muted me-2">Trợ giúp</a><small> / </small>
                    <a href="#" class="text-muted mx-2">Hỗ trợ</a><small> / </small>
                    <a href="#" class="text-muted ms-2">Liên hệ</a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-dark">Hotline:</small>
                <a href="tel:19001000" class="text-muted">1900 1000</a>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted me-2" data-bs-toggle="dropdown"><small>VND</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item">VND</a>
                            <a href="#" class="dropdown-item">USD</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted mx-2" data-bs-toggle="dropdown"><small>Tiếng Việt</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item">Tiếng Việt</a>
                            <a href="#" class="dropdown-item">English</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Logo + Search + Icons -->
    <div class="container-fluid px-5 py-4 d-none d-lg-block">
        <div class="row gx-0 align-items-center text-center">
            <div class="col-md-4 col-lg-3 text-center text-lg-start">
                <a href="index.html" class="navbar-brand p-0">
                    <h1 class="display-5 text-primary m-0">
                        <i class="fas fa-shoe-prints text-secondary me-2"></i>SHOEZ
                    </h1>
                </a>
            </div>

            <div class="col-md-4 col-lg-6 text-center">
                <div class="position-relative ps-4">
                    <div class="d-flex border rounded-pill">
                        <input class="form-control border-0 rounded-pill w-100 py-3" type="text" placeholder="Tìm kiếm giày Nike, Adidas, Vans...">
                        <select class="form-select text-dark border-0 border-start rounded-0 p-3" style="width: 200px;">
                            <option value="">Tất cả danh mục</option>
                            <option>Giày Thể Thao</option>
                            <option>Giày Sneaker</option>
                            <option>Giày Tây</option>
                            <option>Giày Sandal</option>
                            <option>Dép</option>
                        </select>
                        <button type="button" class="btn btn-primary rounded-pill py-3 px-5">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a href="#" class="text-muted me-4"><i class="fas fa-heart fa-2x"></i></a>
                    <a href="#" class="text-muted position-relative">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-primary sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="text-white m-0"><i class="fas fa-shoe-prints me-2"></i>SHOEZ</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Trang chủ</a>
                    <a href="shop.html" class="nav-item nav-link">Sản phẩm</a>
                    <a href="sale.html" class="nav-item nav-link text-warning">Sale 50%</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Thương hiệu</a>
                        <div class="dropdown-menu m-0">
                            <a href="#" class="dropdown-item">Nike</a>
                            <a href="#" class="dropdown-item">Adidas</a>
                            <a href="#" class="dropdown-item">Vans</a>
                            <a href="#" class="dropdown-item">Converse</a>
                            <a href="#" class="dropdown-item">Puma</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid py-5 px-0 hero-header">
        <div class="row g-0">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1400" class="d-block w-100" alt="Nike Red">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Nike Air Force 1</h1>
                                <p class="fs-5 text-white">Giảm tới 40% - Chỉ từ 1.890.000đ</p>
                                <a href="#" class="btn btn-primary py-3 px-5">Mua ngay</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1600269454443-a7b7e7a1a9d8?w=1400" class="d-block w-100" alt="Adidas Ultraboost">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Adidas Ultraboost 23</h1>
                                <p class="fs-5 text-white">Công nghệ đỉnh cao - Chỉ 3.290.000đ</p>
                                <a href="#" class="btn btn-primary py-3 px-5">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="bg-primary h-100 d-flex align-items-center justify-content-center flex-column text-white p-5">
                    <h2 class="mb-4">Flash Sale Hôm Nay!</h2>
                    <h1 class="display-4 mb-4">GIÀY VANS</h1>
                    <p class="fs-4 mb-4">Chỉ từ <del>1.290k</del> → 799k</p>
                    <a href="#" class="btn btn-light py-3 px-5">Săn deal ngay</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Services Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-4 col-lg-2">
                <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
                <h6>Miễn phí vận chuyển</h6>
                <p class="mb-0">Toàn quốc từ 500k</p>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <i class="fas fa-exchange-alt fa-3x text-primary mb-3"></i>
                <h6>Đổi trả dễ dàng</h6>
                <p class="mb-0">Trong 30 ngày</p>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                <h6>Hỗ trợ 24/7</h6>
                <p class="mb-0">Luôn sẵn sàng giúp bạn</p>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                <h6>Cam kết chính hãng</h6>
                <p class="mb-0">Hoàn tiền 200% nếu fake</p>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <i class="fas fa-credit-card fa-3x text-primary mb-3"></i>
                <h6>Thanh toán COD</h6>
                <p class="mb-0">Nhận hàng mới trả tiền</p>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <i class="fas fa-gift fa-3x text-primary mb-3"></i>
                <h6>Quà tặng hấp dẫn</h6>
                <p class="mb-0">Mỗi đơn hàng trên 1 triệu</p>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Bạn có thể thêm phần danh mục, sản phẩm nổi bật, footer... ở đây (mình cắt bớt cho ngắn) -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>
</html>