<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<?php if (!isset($_SESSION['userID'])) : ?>
    <div class="div-container-cart">
        <div class="div-main-cart">
            <div class="cart-empty">
                <img src="../../../../../../../DuAn1-FPT/Public/images/product/cart_empty.png" alt="">
            </div>
            <div style="text-align: center;" class="content_cart-empty">
                <h4>Giỏ hàng đang cảm thấy trống trải</h4>
                <span>Ai đó ơi, mua sắm để nhận khuyến mãi ngay nào!</span>
                <a href="<?= URL ?>Home" class="submit-btn">Mua sắm ngay</a>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="div-checkContainer">
        <div class="div-mainCheck">
            <h1 class="h3-checkCart">THÔNG TIN CHI TIẾT ĐƠN HÀNG</h1>
            <table class="table-checkCart">
                <thead class="thead-checkCart">
                    <th class="th-checkCart">Mã Đơn Hàng</th>
                    <th class="th-checkCart">Ngày Mua</th>
                    <th class="th-checkCart">Tiêu Đề</th>
                    <th class="th-checkCart">Giá</th>
                    <th class="th-checkCart">Số lượng</th>
                    <th class="th-checkCart">Tổng tiền</th>
                    <th class="th-checkCart">Trạng Thái Đơn Hàng</th>
                </thead>
                <tbody>
                    <?php if (count($data['clientOrder']) > 0) : ?>
                        <?php foreach ($data['clientOrder'] as $clientOrder) : ?>
                            <tr class="tr-checkCart">
                                <td class="td-checkCart"><?= "#P" . $clientOrder['orderDetailID'] ?? '' ?></td>
                                <td class="td-checkCart"><?= $clientOrder['dateBuy'] ?? '' ?></td>
                                <td class="td-checkCart"><?= $clientOrder['bookName'] ?? '' ?></td>
                                <td class="td-checkCart"><?= number_format($clientOrder['priceOrder']) ?? '' ?></td>
                                <td class="td-checkCart"><?= $clientOrder['quantity'] ?? '' ?></td>
                                <td class="td-checkCart"><?= number_format($clientOrder['sumPriceOrder']) ?? '' ?></td>
                                <td class="td-checkCart"><?= $clientOrder['statusOrderName'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="div-main-cart">
                            <div class="cart-empty">
                                <img src="../../../../../../../DuAn1-FPT/Public/images/product/cart_empty.png" alt="">
                            </div>
                            <div style="text-align: center;" class="content_cart-empty">
                                <h4>Giỏ hàng đang cảm thấy trống trải</h4>
                                <span>Ai đó ơi, mua sắm để nhận khuyến mãi ngay nào!</span>
                                <a href="<?= URL ?>Home" class="submit-btn">Mua sắm ngay</a>
                            </div>
                        </div>

                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif ?>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>