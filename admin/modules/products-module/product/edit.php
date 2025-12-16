<form action="index.php?role=admin&module=products&action=update" method="POST" enctype="multipart/form-data">

    <!-- ID sản phẩm -->
    <input type="hidden" name="id" value="<?= $product['product_id'] ?>">

    <div class="row">

        <!-- CỘT TRÁI -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header fw-bold">
                    Cập nhật sản phẩm
                </div>

                <div class="card-body">

                    <!-- Tên sản phẩm -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="title"
                            value="<?= htmlspecialchars($product['title']) ?>" required>
                    </div>

                    <!-- Danh mục -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Danh mục</label>
                        <select class="form-select" name="category_id" required>
                            <?php foreach ($categories as $cate): ?>
                                <option value="<?= $cate['category_id'] ?>" <?= $product['category_id'] == $cate['category_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cate['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Ảnh hiện tại -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ảnh hiện tại</label><br>
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= $product['image'] ?>" class="img-thumbnail mb-2" style="width:120px">
                        <?php else: ?>
                            <p class="text-muted">Chưa có ảnh</p>
                        <?php endif; ?>
                    </div>

                    <!-- Ảnh mới -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ảnh mới (nếu muốn thay)</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Giá gốc (VND)</label>
                        <input type="number" class="form-control" name="price" min="0" value="<?= $product['price'] ?>"
                            required>
                    </div>

                    <!-- Giá khuyến mãi -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Giá khuyến mãi</label>
                        <input type="number" class="form-control" name="sale_price" min="0"
                            value="<?= $product['sale_price'] ?>">
                    </div>

                    <!-- ✅ MÔ TẢ NGẮN (THÊM MỚI) -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mô tả ngắn</label>
                        <textarea class="form-control" name="short_description" rows="2"
                            placeholder="Mô tả ngắn hiển thị ở danh sách / client">
<?= htmlspecialchars(trim($product['short_description'] ?? '')) ?>
                        </textarea>
                    </div>

                    <!-- MÔ TẢ ĐẦY ĐỦ -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mô tả sản phẩm</label>
                        <textarea class="form-control" name="description"
                            rows="4"><?= htmlspecialchars(trim($product['description'])) ?></textarea>
                    </div>

                    <!-- Brand -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thương hiệu</label>
                        <input type="text" class="form-control" name="brand"
                            value="<?= htmlspecialchars($product['brand']) ?>">
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select class="form-select" name="is_active">
                            <option value="1" <?= $product['is_active'] ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="0" <?= !$product['is_active'] ? 'selected' : '' ?>>Ẩn</option>
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
                        <button type="submit" class="btn btn-primary">
                            Cập nhật sản phẩm
                        </button>
                        <a href="index.php?role=admin&module=products" class="btn btn-secondary">
                            Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>