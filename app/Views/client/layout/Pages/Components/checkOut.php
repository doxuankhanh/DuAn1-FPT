<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>

<div class="div-checkout-container">
    <div class="div-checkout-main">
        <h2 class=" h2-checkout">Đặt hàng thành công!<br>Cảm ơn bạn đã mua hàng</h2>
        <form action="<?= URL ?>Home/checkOut" method="post">
            <div class="div-infor-checkout">
                <h4 style="">Thông tin người mua</h4>
                <div class="div-infor site">
                    <div class="div-title">
                        <p class="p-infor">Họ tên</p>
                        <p class="p-infor">Email</p>
                        <p class="p-infor">Số điện thoại</p>
                        <p class="p-infor">Địa chỉ</p>
                    </div>
                    <div class="div-infor-main">
                        <p class="p-infor"><input type="text" name="username" id="" value="<?= $_SESSION['username'] ?? '' ?>" disabled></p>
                        <p class="p-infor"><input type="text" name="email" id="" value="<?= $_SESSION['email'] ?? '' ?>" disabled></p>
                        <p class="p-infor"><input type="text" name="phoneNumber" id="" value="<?= $_SESSION['phone'] ?? '' ?>" disabled></p>
                        <p class="p-infor"><input type="text" name="address" id="" value="<?= $_SESSION['address'] ?? '' ?>" disabled></p>
                    </div>
                    <h2>Thông tin sản phẩm</h2>
                    <table class="table-checkout">
                        <thead class="thead-checkout">
                            <th>STT</th>
                            <th>Book Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            foreach ($data['carts'] as $key => $value) :
                                $subtotal = ($value['quantity'] * $value['price']);
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['bookName'] ?? '' ?></td>
                                    <td><?= number_format($value['price'] ?? '') ?></td>
                                    <td><?= $value['quantity'] ?? '' ?></td>
                                    <td><?= number_format($subtotal) ?></td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Phí vận chuyển</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Tổng cộng</strong></td>
                                <td><?= number_format($total) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h2 class="h2-checkout">
                <button type="submit">Xác nhận thanh toán </button>
            </h2>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>