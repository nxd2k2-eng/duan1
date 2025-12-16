<!-- Trang Giỏ Hàng Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh </th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Tổng</th>
                    </tr>
                </thead>

                <tbody>
                    
                    <?php 
                    $total=0;
                    foreach ($cartItems as $item):
                        // dump($item);
                        $total += $item['quantity'] * (!empty($item['sale_price']) ? $item['sale_price'] : $item['price']);
                    ?>

                        <tr>
                            <th scope="row">
                                <p class="mb-0 py-4"><?= $item['title'] ?></p>
                            </th>
                            <td>
                                <img src="<?= $item['image'] ?>" width="50" alt="">
                            </td>
                            <td>
                                <?php if (!empty($item['sale_price'])): ?>
                                    <del class="text-primary fs-5"><?= htmlspecialchars(number_format($item['price'], 2)) ?></del>
                                    <span class="ms-2 text-danger fs-5"><?= htmlspecialchars(number_format($item['sale_price'], 2)) ?></span>
                                <?php else: ?>
                                    <span class="text-primary fs-5"><?= htmlspecialchars(number_format($item['price'], 2)) ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group quantity py-4"  style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button data-price="<?= (!empty($item['sale_price'])? $item['sale_price']: $item['price']) ?>" data-id="<?= $item['product_id'] ?>" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm text-center border-0"
                                        value="<?= $item['quantity'] ?>">
                                    <div class="input-group-btn">
                                        <button data-price="<?= (!empty($item['sale_price'])? $item['sale_price']: $item['price']) ?>" data-id="<?= $item['product_id'] ?> "class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="sub-total">
                                <p class="mb-0 py-4"><?= number_format ($item['quantity']* (!empty($item['sale_price'])? $item['sale_price']: $item['price']))  ?></p>
                            </td>
                            <td class="py-4">
                                <button class="btn btn-md rounded-circle bg-light border">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <input type="text"
                class="border-0 border-bottom rounded me-5 py-3 mb-4"
                placeholder="Mã giảm giá">
            <button class="btn btn-primary rounded-pill px-4 py-3" type="button">
                Áp dụng mã
            </button>
        </div>

        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Tổng cộng</h5>
                        <p class="mb-0 pe-4 total"><?=  number_format($total) ?></p>
                    </div>
                    <button
                        class="btn btn-primary rounded-pill px-4 py-3 text-uppercase mb-4 ms-4"
                        type="button">
                        Tiến hành thanh toán
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trang Giỏ Hàng End -->
<script>
    jQuery(document).ready(function($) {
        

        $('.btn-plus').click(function() {
            let price = $(this).data('price');
            let inputQty = parseInt($(this).closest('.input-group').find('input').val());
            let subTotal= $(this).closest('tr').find('.sub-total p');
            
            subTotal.text(((inputQty + 1) * price).toLocaleString());
            updateCartTotal();
            

        });
        $('.btn-minus').click(function() {
            let price = $(this).data('price');
            let inputQty = $(this).closest('.input-group').find('input');

            if(parseInt(inputQty.val())<=1){
                return;
            }

            let subTotal = $(this).closest('tr').find('.sub-total p');
            
            subTotal.text(((iparseInt(inputQty.val())-1) * price).toLocaleString());
            updateCartTotal();



        });


        function updateCartTotal() {
            let total = 0;
            $('.sub-total p').each(function() {
                
                total += parseFloat($(this).text().replace(/,/g, ''));
            });
            // Cập nhật tổng tiền vào phần tử hiển thị tổng tiền
            $('.total').text(total.toLocaleString());
        }
    });
</script>