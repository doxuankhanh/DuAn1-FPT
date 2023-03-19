<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>

<div class="div-checkout-container">
        <div class="div-checkout-main">
            <h2 class=" h2-checkout">Đặt hàng thành công!<br>
        
                                Cảm ơn bạn đã mua hàng <3</h2>
            <div class="div-infor-checkout">
                <h4>Thông tin người mua</h4>
                <table class="table-infor">
                    <thead class="thead-infor">
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </thead>
                    <tbody>
                        <tr class="tr-infor">
                            <td>Tên</td>
                            <td>Mail</td>
                            <td>Địa chỉ</td>
                            <td>Số Điện thoại</td>
                        </tr>
                    </tbody>
                </table>
              
                <h2>Thông tin sản phẩm</h2>
                <table class="table-checkout">
                    <thead class="thead-checkout">
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Gía</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hachiko</td>
                            <td>116.000</td>
                            <td>1</td>
                            <td>116.000</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Phí vận chuyển</td>
                            <td>26.000</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Tổng cộng</strong></td>
                            <td>242.000</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <h2 class="h2-checkout">
                    <button>Xác nhận thanh toán </button>
                </h2>
            </div>
        </div>
    </div>
    <?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>