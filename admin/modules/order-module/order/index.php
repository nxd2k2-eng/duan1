<button type="button" class="btn btn-outline-primary mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
        viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
        <path
            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
    </svg>
    Thêm mới
</button>
<div class="card"></div>
<div class="card-header">
    Danh sách đơn hàng
</div>
<div class="card-body">
    <div class="row">
        <form action="">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm danh mục">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="table-reponsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên người nhận</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái đơn</th>
                <th scope="col">Tổng tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th scope="row">1</th>
                <td><a href="/admin/order-detail.php">Nguyễn Văn A</a></td>
                <td>0123456789</td>
                <td>123 Đường ABC, Quận 1, TP.HCM</td>
                <td>Đang xử lý</td>
                <td>1,000,000 VND</td>
                <td style="white-space:nowrap">
                    <a href="/admin/order-detail.php" class="btn btn-sm btn-primary">Sửa</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card-footer">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
</div>