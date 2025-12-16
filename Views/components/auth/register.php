<?php
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="mb-4 text-center">Đăng Ký</h1>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
                    </div>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và tên</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Nhập mật khẩu">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                            placeholder="Xác nhận mật khẩu">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            placeholder="Nhập số điện thoại">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control"
                            placeholder="Nhập địa chỉ">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Đăng ký
                    </button>
                </form>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger mt-3">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>