<button type="button" class="btn btn-outline-primary mb-3">
    <a href="?role=admin&module=products&action=create"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
        </svg>
        Thêm sản phẩm
    </a>
</button>

<div class="card">
    <div class="card-header">
        Danh sách sản phẩm
    </div>

    <div class="card-body">
        <div class="row">
            <form method="GET" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <?php
                $exploded = explode('&', $_SERVER['QUERY_STRING']);
                foreach ($exploded as $item):
                    $pair = explode('=', $item);
                    if ($pair[0] === 'keyword') {
                        continue;
                    }
                    ?>
                    <input type="hidden" name="<?= htmlspecialchars($pair[0]) ?>" value="<?= htmlspecialchars($pair[1]) ?>">
                <?php endforeach; ?>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" value="<?= $_GET['keyword'] ?? '' ?>" name="keyword" class="form-control"
                            placeholder="Tìm kiếm...">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if (empty($productList['data'])): ?>
        <div class="card-body text-center">
            <p>Không có sản phẩm nào trong hệ thống</p>
            <a href="?role=admin&module=products&action=create" class="btn btn-primary">Tạo mới sản phẩm</a>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Mô tả ngắn</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($productList['data'] as $product): ?>
                        <tr>
                            <td><?= $product['product_id'] ?></td>

                            <!-- Ảnh -->
                            <td>
                                <img src="<?= $product['image'] ?? 'uploads/default.jpg' ?>" class="img-thumbnail"
                                    style="width:60px;height:40px;object-fit:cover">
                            </td>

                            <!-- Tên -->
                            <td><?= htmlspecialchars($product['title']) ?></td>

                            <!-- Danh mục -->
                            <td><?= htmlspecialchars($product['name'] ?? '—') ?></td>

                            <!-- Giá -->
                            <td><?= number_format($product['price']) ?> VND</td>

                            <!-- Giá KM -->
                            <td>
                                <?= $product['sale_price']
                                    ? number_format($product['sale_price']) . ' VND'
                                    : '<span class="text-muted">—</span>' ?>
                            </td>

                            <!-- ✅ MÔ TẢ NGẮN -->
                            <td style="max-width:200px">
                                <small class="text-muted">
                                    <?= !empty($product['short_description'])
                                        ? htmlspecialchars(mb_strimwidth($product['short_description'], 0, 80, '...'))
                                        : '—' ?>
                                </small>
                            </td>

                            <!-- ✅ MÔ TẢ -->
                            <td style="max-width:260px">
                                <small class="text-muted">
                                    <?= !empty($product['description'])
                                        ? htmlspecialchars(mb_strimwidth(strip_tags($product['description']), 0, 120, '...'))
                                        : '—' ?>
                                </small>
                            </td>

                            <!-- Trạng thái -->
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input product-active-switch" type="checkbox"
                                        data-id="<?= $product['product_id'] ?>" <?= $product['is_active'] ? 'checked' : '' ?>>
                                </div>
                            </td>

                            <!-- Hành động -->
                            <td class="text-end" style="white-space:nowrap">
                                <a href="?role=admin&module=products&action=edit&id=<?= $product['product_id'] ?>"
                                    class="btn btn-outline-primary btn-sm">Sửa</a>

                                <a href="?role=admin&module=products&action=delete&id=<?= $product['product_id'] ?>"
                                    class="btn btn-outline-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>
        </div>
        <div class="card-footer">
            <nav aria-label="Page navigation example">
                <?php
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $limit = 10;
                $totalPages = ceil($productList['total'] / $limit);
                ?>

                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="?role=admin&module=products&page=1">Trang đầu</a></li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item"><a class="page-link"
                                href="?role=admin&module=products&page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item"><a class="page-link"
                            href="?role=admin&module=products&page=<?= $totalPages ?>">Trang cuối</a></li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
    <script>
        document.querySelectorAll('.product-active-switch').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const productId = this.dataset.id;
                const status = this.checked ? 1 : 0;

                fetch('?role=admin&module=products&action=update-active', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${productId}&status=${status}`
                })
                    .then(res => res.json())
                    .then(data => {
                        if (!data.success) {
                            alert('Cập nhật trạng thái thất bại');
                            this.checked = !this.checked;
                        }
                    })
                    .catch(() => {
                        alert('Có lỗi xảy ra');
                        this.checked = !this.checked;
                    });
            });
        });
    </script>

</div>