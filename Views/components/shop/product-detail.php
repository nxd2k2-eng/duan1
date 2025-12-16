<div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row g-4 single-product">
        <div class="col-xl-6">
            <div class="single-carousel owl-carousel">
                <div class="single-item" data-dot="<img class='img-fluid' src='img/product-4.png' alt=''>">
                    <div class="single-inner bg-light rounded">
                        <img src="assets/img/product-4.png" class="img-fluid rounded" alt="Image">
                    </div>
                </div>
                <div class="single-item" data-dot="<img class='img-fluid' src='img/product-5.png' alt=''>">
                    <div class="single-inner bg-light rounded">
                        <img src="assets/img/product-5.png" class="img-fluid rounded" alt="Image">
                    </div>
                </div>
                <div class="single-item" data-dot="<img class='img-fluid' src='img/product-6.png' alt=''>">
                    <div class="single-inner bg-light rounded">
                        <img src="assets/img/product-6.png" class="img-fluid rounded" alt="Image">
                    </div>
                </div>
                <div class="single-item" data-dot="<img class='img-fluid' src='img/product-7.png' alt=''>">
                    <div class="single-inner bg-light rounded">
                        <img src="assets/img/product-7.png" class="img-fluid rounded" alt="Image">
                    </div>
                </div>
                <div class="single-item" data-dot="<img class='img-fluid' src='img/product-3.png' alt=''>">
                    <div class="single-inner bg-light rounded">
                        <img src="assets/img/product-3.png" class="img-fluid rounded" alt="Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <h4 class="fw-bold mb-3"><?= htmlspecialchars($product['title']) ?></h4>
            <p class="mb-3">Danh mục: <?= htmlspecialchars($product['category_name']) ?></p>
            <h5 class="fw-bold mb-3">
                <?php if (!empty($product['sale_price'])): ?>
                    <del class="me-2 fs-5"><?= htmlspecialchars(number_format($product['price'])) ?></del>
                    <span class="text-primary fs-5"><?= htmlspecialchars(number_format($product['sale_price'])) ?></span>
                <?php else: ?>
                    <span class="text-primary fs-5"><?= htmlspecialchars(number_format($product['price'])) ?></span>
                <?php endif; ?>
            </h5>

            <div>
                <p class="mb-4"><?= htmlspecialchars($product['short_description']) ?></p>

            </div>
            <?php   ?>
            <div class="input-group quantity mb-5" style="width: 100px;">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <?php if (!isset($_SESSION['user'])): ?>
                <p class="text-danger mb-4">Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!</p>
            <?php endif; ?>
            <button <?php !isset($_SESSION['user']) ? 'disabled= "disabled" ' : ' ' ?> href="javascript:;"
                class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                    class="fa fa-shopping-bag me-2 text-white"></i> Add to cart</button>
        </div>
        <div class="col-lg-12">
            <nav>
                <div class="nav nav-tabs mb-3">
                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                        id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about"
                        aria-selected="true">Description</button>
                    <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-mission-tab"
                        data-bs-toggle="tab" data-bs-target="#nav-mission" aria-controls="nav-mission"
                        aria-selected="false">Reviews</button>
                </div>
            </nav>
            <div class="tab-content mb-5">
                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <?= $product['description'] ?>
                </div>
                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                    <div class="d-flex">
                        <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                            style="width: 100px; height: 100px;" alt="">
                        <div class="">
                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                            <div class="d-flex justify-content-between">
                                <h5>Jason Smith</h5>
                                <div class="d-flex mb-3">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p>The generated Lorem Ipsum is therefore always free from repetition
                                injected humour, or non-characteristic
                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                            style="width: 100px; height: 100px;" alt="">
                        <div class="">
                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                            <div class="d-flex justify-content-between">
                                <h5>Sam Peters</h5>
                                <div class="d-flex mb-3">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                repetition injected humour, or non-characteristic
                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="nav-vision" role="tabpanel">
                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                        tempor sit. Aliqu diam
                        amet diam et eos labore. 3</p>
                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore.
                        Clita erat ipsum et lorem et sit</p>
                </div>
            </div>
        </div>
        <form action="#">
            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="border-bottom rounded">
                        <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="border-bottom rounded">
                        <input type="email" class="form-control border-0" placeholder="Your Email *">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="border-bottom rounded my-4">
                        <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                            placeholder="Your Review *" spellcheck="false"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between py-3 mb-5">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 me-3">Please rate:</p>
                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                <i class="fa fa-star text-muted"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary border border-secondary text-primary rounded-pill px-4 py-3">
                            Post Comment</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>