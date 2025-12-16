<button type="button" class="btn btn-outline-primary mb-3">
    <a href="?role=admin&module=categories&action=create" class="text-decoration-none">
        Thêm mới
    </a>
</button>

<div class="card">
    <div class="card-header">Danh sách danh mục</div>

    <div class="card-body">
        <form method="GET" action="">
            <input type="hidden" name="role" value="admin">
            <input type="hidden" name="module" value="categories">

            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control"
                        value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm kiếm danh mục">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="width:60%">Tên danh mục</th>
                    <th>Slug</th>
                    <th>Trạng thái</th>
                    <th class="text-end">Hành động</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php if (empty($categories)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Không có danh mục nào</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($categories as $index => $cate): ?>
                        <tr>
                            <td><?= ($page - 1) * $limit + $index + 1 ?></td>

                            <td><?= htmlspecialchars($cate['name']) ?></td>
                            <td><?= htmlspecialchars($cate['slug']) ?></td>

                            <td>
                                <span class="badge <?= $cate['status'] ? 'bg-success' : 'bg-secondary' ?>">
                                    <?= $cate['status'] ? 'Hiển thị' : 'Ẩn' ?>
                                </span>
                            </td>

                            <td class="text-end">
                                <a href="?role=admin&module=categories&action=edit&id=<?= $cate['category_id'] ?>"
                                    class="btn btn-outline-primary btn-sm">Sửa</a>

                                <a href="?role=admin&module=categories&action=delete&id=<?= $cate['category_id'] ?>"
                                    class="btn btn-outline-danger btn-sm" onclick="return confirm('Xóa danh mục này?')">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- PHÂN TRANG -->
    <?php
    $totalPages = ceil($total / $limit);
    ?>
    <?php if ($totalPages > 1): ?>
        <div class="card-footer">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link"
                            href="?role=admin&module=categories&page=<?= $i ?>&keyword=<?= urlencode($keyword) ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>