<form action="?role=admin&module=categories&action=store" method="POST">
    <div class="row">

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    Thông tin danh mục
                </div>

                <div class="card-body">

                    <!-- Tên danh mục -->
                    <div class="mb-3">
                        <label class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="name" required placeholder="Nhập tên danh mục">
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="Để trống sẽ tự tạo">
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" name="status">
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Ẩn</option>
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
                        <button type="submit" class="btn btn-success">
                            Lưu danh mục
                        </button>
                        <a href="index.php?role=admin&module=categories" class="btn btn-secondary">
                            Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>