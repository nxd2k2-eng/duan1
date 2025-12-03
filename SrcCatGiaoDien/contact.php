<?php
require_once "header.php";
?>

<!-- Breadcrumb Start -->
<div class="container-fluid py-5" style="background: rgba(0, 0, 0, 0.05);">
    <div class="container text-center">
        <h1 class="display-5 text-primary mb-3">Liên Hệ Với Chúng Tôi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Liên Hệ</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- Contact Info -->
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="rounded p-4" style="background: rgba(0, 0, 0, 0.03);">
                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mb-4"
                        style="width: 70px; height: 70px;">
                        <i class="fas fa-map-marker-alt fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Địa Chỉ</h4>
                    <p class="mb-2">123 Nguyễn Huệ, Quận 1, TP.HCM</p>
                    <p class="mb-0">Việt Nam</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.2s">
                <div class="rounded p-4" style="background: rgba(0, 0, 0, 0.03);">
                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mb-4"
                        style="width: 70px; height: 70px;">
                        <i class="fas fa-envelope fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Email</h4>
                    <p class="mb-2">contact@shoeshop.vn</p>
                    <p class="mb-0">support@shoeshop.vn</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="rounded p-4" style="background: rgba(0, 0, 0, 0.03);">
                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mb-4"
                        style="width: 70px; height: 70px;">
                        <i class="fa fa-phone-alt fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Hotline</h4>
                    <p class="mb-2">1900 1000</p>
                    <p class="mb-0">8:00 - 22:00 (Hàng Ngày)</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="row g-4">
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.1s">
                <div class="rounded p-5" style="background: rgba(0, 0, 0, 0.03);">
                    <h4 class="mb-4">Gửi Tin Nhắn Cho Chúng Tôi</h4>
                    <form method="POST" action="">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Họ Tên</label>
                                <input type="text" class="form-control border-0" id="name" name="name" 
                                    placeholder="Nhập họ tên của bạn" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control border-0" id="email" name="email" 
                                    placeholder="Nhập email của bạn" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Số Điện Thoại</label>
                                <input type="tel" class="form-control border-0" id="phone" name="phone" 
                                    placeholder="Nhập số điện thoại" required>
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Chủ Đề</label>
                                <input type="text" class="form-control border-0" id="subject" name="subject" 
                                    placeholder="Chủ đề của tin nhắn" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Nội Dung</label>
                            <textarea class="form-control border-0" id="message" name="message" rows="5" 
                                placeholder="Nhập nội dung tin nhắn của bạn" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 px-5">Gửi Tin Nhắn</button>
                    </form>
                </div>
            </div>

            <!-- Map & Additional Info -->
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="rounded p-5" style="background: rgba(0, 0, 0, 0.03); height: 100%;">
                    <h4 class="mb-4">Thông Tin Thêm</h4>
                    
                    <div class="mb-4">
                        <h5 class="text-primary mb-2">Giờ Làm Việc</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-check text-primary me-2"></i>
                                <strong>Thứ 2 - Thứ 6:</strong> 8:00 - 20:00
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-primary me-2"></i>
                                <strong>Thứ 7 - Chủ Nhật:</strong> 9:00 - 22:00
                            </li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-primary mb-2">Mạng Xã Hội</h5>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-sm btn-primary rounded-circle">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary rounded-circle">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary rounded-circle">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary rounded-circle">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h5 class="text-primary mb-2">Hỗ Trợ Khách Hàng</h5>
                        <p class="mb-2">Đội ngũ hỗ trợ khách hàng của chúng tôi sẵn sàng giúp bạn 24/7.</p>
                        <p class="mb-0">Hãy liên hệ với chúng tôi nếu bạn có bất kỳ câu hỏi hoặc yêu cầu.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row mt-5">
            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                <h4 class="mb-4">Câu Hỏi Thường Gặp</h4>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 mb-3 rounded" style="background: rgba(0, 0, 0, 0.03);">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                Thời gian giao hàng bao lâu?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Giao hàng tiêu chuẩn từ 2-5 ngày làm việc. Giao hàng nhanh có sẵn cho một số địa điểm với phí bổ sung.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 rounded" style="background: rgba(0, 0, 0, 0.03);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                Chính sách đổi trả là gì?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Bạn có thể đổi hoặc trả sản phẩm trong vòng 30 ngày kể từ ngày mua. Sản phẩm phải còn nguyên vẹn và không được sử dụng.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 rounded" style="background: rgba(0, 0, 0, 0.03);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                Có miễn phí vận chuyển không?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Có! Đơn hàng từ 500.000đ trở lên sẽ được miễn phí vận chuyển toàn quốc.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 rounded" style="background: rgba(0, 0, 0, 0.03);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Làm cách nào để chọn size phù hợp?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Hãy xem hướng dẫn size chi tiết ở trang sản phẩm hoặc liên hệ với chúng tôi để được tư vấn.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php
require_once "footer.php";
?>
