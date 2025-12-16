<!-- Our Products Start -->
<div class="container-fluid product py-5">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <div class="col-lg-4 text-start wow fadeInLeft" data-wow-delay="0.1s">
                    <h1>Sản Phẩm Của Chúng Tôi</h1>
                </div>
                <div class="col-lg-8 text-end wow fadeInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                href="#tab-1">
                                <span class="text-dark" style="width: 130px;">Tất Cả Sản Phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex py-2 mx-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                <span class="text-dark" style="width: 130px;">Sản Phẩm Mới</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                <span class="text-dark" style="width: 130px;">Nổi Bật</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                <span class="text-dark" style="width: 130px;">Bán Chạy</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        if (!empty($productsAll)):
                            foreach ($productsAll['data'] as $product):
                        ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="product-item-inner border rounded">
                                            <div class="product-item-inner-item">
                                                <img src="<?= htmlspecialchars($product['image']) ?>" class="img-fluid w-100 rounded-top" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid w-100 rounded-top" alt="Kính Lumos Classic">
                                                <div class="product-new">Mới</div>
                                                <div class="product-details">
                                                    <a href="/?view=single-product&id=<?= htmlspecialchars($product['product_id']) ?>"><i class="fa fa-eye fa-1x"></i></a>
                                                </div>
                                            </div>
                                            <div class="text-center rounded-bottom p-4">
                                                <a href="#" class="d-block mb-2">Kính Gọng Nhựa</a>
                                                <a href="?view=single-product&id=<?= htmlspecialchars($product['product_id']) ?>" class="d-block h4"><?= htmlspecialchars($product['title']) ?></a>
                                                <?php if (!empty($product['sale_price'])): ?>
                                                    <del class="me-2 fs-5"><?= htmlspecialchars(number_format($product['price'])) ?></del>
                                                    <span class="text-primary fs-5"><?= htmlspecialchars(number_format($product['sale_price'])) ?></span>
                                                <?php else: ?>
                                                    <span class="text-primary fs-5"><?= htmlspecialchars(number_format($product['price'])) ?></span>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                    class="fas fa-shopping-cart me-2"></i> Thêm Vào Giỏ</a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-random"></i></span></a>
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-heart"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
                <!-- Các tab khác (New Arrivals, Featured, Top Selling) giữ nguyên cấu trúc nhưng thay đổi nội dung tương tự -->
            </div>
        </div>
    </div>
</div>
<!-- Our Products End -->