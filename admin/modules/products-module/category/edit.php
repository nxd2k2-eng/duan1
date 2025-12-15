<form action="?role=admin&module=categories&action=update" method="POST">

    <!-- ID danh mục -->
    <input type="hidden" name="id" value="<?= $category['category_id'] ?>">

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    Chỉnh sửa danh mục
                </div>
                <div class="card-body">

                    <!-- Tên danh mục -->
                    <div class="mb-3">
                        <label class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="name"
                            value="<?= htmlspecialchars($category['name']) ?>" placeholder="Nhập tên danh mục" required>
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug"
                            value="<?= htmlspecialchars($category['slug']) ?>" placeholder="slug-tu-dong-hoac-tu-nhap">
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" name="status">
                            <option value="1" <?= $category['status'] ? 'selected' : '' ?>>
                                Hiển thị
                            </option>
                            <option value="0" <?= !$category['status'] ? 'selected' : '' ?>>
                                Ẩn
                            </option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!-- Cột phải -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    Hành động
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            Cập nhật danh mục
                        </button>
                        <a href="?role=admin&module=categories" class="btn btn-secondary">
                            Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>