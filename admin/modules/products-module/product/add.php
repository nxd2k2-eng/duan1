<form action="index.php?role=admin&module=products&action=store" method="POST" enctype="multipart/form-data">

    <div class="row">

        <!-- CỘT TRÁI -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header fw-bold">
                    Thêm sản phẩm
                </div>

                <div class="card-body">

                    <!-- Tên sản phẩm -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="title" placeholder="Nhập tên sản phẩm" required>
                    </div>

                    <!-- Danh mục -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Danh mục</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($categories as $cate): ?>
                                <option value="<?= $cate['category_id'] ?>">
                                    <?= htmlspecialchars($cate['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Ảnh -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ảnh sản phẩm</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Chấp nhận JPG, PNG, WEBP</small>
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Giá gốc (VND)</label>
                        <input type="number" class="form-control" name="price" min="0" required>
                    </div>

                    <!-- Giá khuyến mãi -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Giá khuyến mãi</label>
                        <input type="number" class="form-control" name="sale_price" min="0"
                            placeholder="Để trống nếu không khuyến mãi">
                    </div>

                    <!-- Mô tả ngắn -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mô tả ngắn</label>
                        <textarea class="form-control" name="short_description" rows="2"
                            placeholder="Mô tả ngắn hiển thị ngoài danh sách sản phẩm..."></textarea>
                    </div>

                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mô tả sản phẩm</label>
                        <textarea class="form-control" name="description" rows="4"
                            placeholder="Nhập mô tả sản phẩm..."></textarea>
                    </div>

                    <!-- Brand -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thương hiệu</label>
                        <input type="text" class="form-control" name="brand" placeholder="Nike, Adidas, Puma...">
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select class="form-select" name="is_active">
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!-- CỘT PHẢI -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Hành động
                </div>

                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            Lưu sản phẩm
                        </button>

                        <a href="?role=admin&module=products" class="btn btn-secondary">
                            Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>