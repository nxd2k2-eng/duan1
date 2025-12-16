<!-- Checkout Page Start -->
<div class="container-fluid bg-light overflow-hidden py-5">
    <div class="container py-5">
        <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.1s">Chi tiết thanh toán</h1>
        <form action="#">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Tên<sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Họ<sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ <sup>*</sup></label>
                        <input type="text" class="form-control" placeholder="Số nhà, Tên đường">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Thành phố/Tỉnh<sup>*</sup></label>
                        <select id="province" class="form-control" style="background:#fff !important; color:#000;">
                            <option value="">Chọn tỉnh/thành</option>
                        </select>
                    </div>
                    <script>
                        fetch("https://provinces.open-api.vn/api/v1/")
                            .then(response => response.json())
                            .then(data => {
                                const select = document.getElementById("province");
                                data.forEach(item => {
                                    const option = document.createElement("option");
                                    option.value = item.code;
                                    option.textContent = item.name;
                                    select.appendChild(option);
                                });
                            });
                    </script>
                    <div class="form-item">
                        <label class="form-label my-3">Mã bưu điện<sup>*</sup></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                        <input type="tel" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ Email<sup>*</sup></label>
                        <input type="email" class="form-control">
                    </div>
                    <hr>
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address">
                        <label class="form-check-label" for="Address-1">Giao đến địa chỉ khác?</label>
                    </div>
                    <div class="form-item">
                        <textarea id="noteBox" name="text" class="form-control" spellcheck="false" cols="30" rows="11"
                            placeholder="Ghi chú đơn hàng (Tùy chọn)" style="display:none;"></textarea>
                    </div>
                    <script>
                        const checkbox = document.getElementById("Address-1");
                        const noteBox = document.getElementById("noteBox");

                        checkbox.addEventListener("change", function() {
                            noteBox.style.display = this.checked ? "block" : "none";
                        });
                    </script>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="text-start">Tên kính</th>
                                    <th scope="col">Mẫu</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sản phẩm 1 -->
                                <tr class="text-center">
                                    <th scope="row" class="text-start">
                                        Kính mắt thời trang nam
                                    </th>
                                    <td>KMN01</td>
                                    <td>350.000đ</td>
                                    <td class="text-center">2</td>
                                    <td>700.000đ</td>
                                </tr>

                                <!-- Sản phẩm 2 -->
                                <tr class="text-center">
                                    <th scope="row" class="text-start">
                                        Kính chống UV nữ
                                    </th>
                                    <td>UVN23</td>
                                    <td>420.000đ</td>
                                    <td class="text-center">1</td>
                                    <td>420.000đ</td>
                                </tr>

                                <!-- Dòng tạm tính -->
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="mb-0 text-dark">Tạm tính</p>
                                    </td>
                                    <td>
                                        <div class="text-center border-bottom border-top py-1">
                                            <p class="mb-0 text-dark">1.120.000đ</p>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Dòng tổng cộng -->
                                <tr>
                                    <th scope="row"></th>
                                    <td>
                                        <p class="mb-0 text-dark text-uppercase">TỔNG CỘNG</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="text-center border-bottom border-top py-1">
                                            <p class="mb-0 text-dark">1.120.000đ</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row g-0 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1"
                                    name="Transfer" value="Transfer">
                                <label class="form-check-label" for="Transfer-1">
                                    <i class="fa fa-credit-card" style="font-size: 24px; margin-right: 8px;"></i>
                                    Chuyển khoản trực tiếp
                                </label>

                            </div>
                            <p class="text-start text-dark">Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn làm tham chiếu thanh toán. Đơn hàng sẽ không được giao cho đến khi tiền được ghi nhận trong tài khoản của chúng tôi.</p>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                    name="Delivery" value="Delivery">
                                <label class="form-check-label" for="Delivery-1">
                                    <img src="/assets/img/thanhtoan-vinlite1.png" alt="Visa" style="width:40px; height:auto; margin-right:8px;">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                    name="Paypal" value="Paypal">
                                <label class="form-check-label" for="Paypal-1">
                                    <img src="/assets/img/0015909_paypal-standard.png" alt="Visa" style="width:100px; height:auto; margin-right:8px;">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Visa-1"
                                    name="Visa" value="Visa">
                                <label class="form-check-label" for="Visa-1">
                                    <img src="/assets/img/Visa_Inc._logo.svg.png" alt="Visa" style="width:50px; height:auto; margin-right:8px;">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="button"
                            class="btn btn-primary border-secondary py-3 px-4 text-uppercase w-100 text-primary">Đặt
                            Hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->