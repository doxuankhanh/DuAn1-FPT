<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<!-- Kiểm tra xem người dùng đã đăng nhập hay chưa -->
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
    <?php if (count($data['clientOrder']) > 0) : ?>
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
                        <th class="th-checkCart" colspan="2">Trạng Thái Đơn Hàng</th>
                    </thead>
                    <tbody>
                        <?php foreach ($data['clientOrder'] as $clientOrder) : ?>
                            <!-- hiển thị những sản phẩm ngoài trạng thái đã giao hàng -->
                            <?php if ($clientOrder['statusID'] != 5) : ?> 
                                <!-- Những sản phẩm có trạng thái là đang chở xử lý và đang chờ xác nhận có  nút hủy đơn hàng -->
                                <?php if ($clientOrder['statusID'] == 1 || $clientOrder['statusID'] == 2) : ?>
                                    <tr class="tr-checkCart">
                                        <td class="td-checkCart"><?= "#P" . $clientOrder['orderDetailID'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['dateBuy'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['bookName'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= number_format($clientOrder['priceOrder']) ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['quantity'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= number_format($clientOrder['sumPriceOrder']) ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['statusOrderName'] ?></td>
                                        <td><a href="<?= URL ?>Home/destroyOrder/<?= $clientOrder['orderDetailID'] ?>" onclick="return confirm('Are you sure?');">HỦY</a></td>
                                    </tr>
                                <?php else : ?>
                                    <!-- Những trạng thái khác ngoài 1,2,5 thì không cho hủy -->
                                    <tr class="tr-checkCart">
                                        <td class="td-checkCart"><?= "#P" . $clientOrder['orderDetailID'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['dateBuy'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['bookName'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= number_format($clientOrder['priceOrder']) ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['quantity'] ?? '' ?></td>
                                        <td class="td-checkCart"><?= number_format($clientOrder['sumPriceOrder']) ?? '' ?></td>
                                        <td class="td-checkCart"><?= $clientOrder['statusOrderName'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <!-- Giỏ hàng trống -->
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
                    <button class=""><a href="<?= URL ?>Home/orderSuccess" class="submit-btn login">Đơn hàng đã giao</a></button>
                </table>
            </div>
        </div>
    <?php endif ?>
    <?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>