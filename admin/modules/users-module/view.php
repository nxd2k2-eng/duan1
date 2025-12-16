<div class="card">
    <div class="card-header">Khách hàng</div>
    <div class="card-body">
        <form action="">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="">Tên khách hàng</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="">Mật khẩu</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>

<div class="card"></div>
<div class="card-header">Đơn hàng đã mua</div>
<div class="table-resposive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#STT</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th>1</th>
                <td>DH001</td>
                <td>2025-10-15 14:30:00</td>
                <td>Hoàn thành</td>
                <td>1,500,000 VND</td>
                <td><a href="order-detail.php?order_id=DH001" class="btn btn-sm btn-info">Xem chi tiết</a></td>
            </tr>
            <tr>
                <th>2</th>
                <td>DH002</td>
                <td>2025-10-15 11:42:00</td>
                <td>Đang vận chuyển</td>
                <td>2,200,000 VND</td>
                <td><a href="order-detail.php?order_id=DH002" class="btn btn-sm btn-info">Xem chi tiết</a></td>
            </tr>
        </tbody>
    </table>
</div>
</div>