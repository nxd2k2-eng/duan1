<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="mb-4 text-center">Đăng nhập</h1>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Nhập mật khẩu">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Đăng nhập
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