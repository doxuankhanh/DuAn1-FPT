<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-container-cart">
    <div class="div-main-cart">
        <?php if (count($data['carts']) > 0) : ?>
            <table class="table-cart">
                <div class="div-header-cart">
                    <header class="thead-cart">
                        <div class="đây là msg thông báo khi người dùng đã xóa giỏ hàng">
                            <?= $_SESSION['msgDelSuccessCart'] ?? '';
                            unset($_SESSION['msgDelSuccessCart']) ?>
                        </div>
                        <div class="đây là msg thông báo khi người dùng update giỏ hàng thành công">
                            <?= $_SESSION['msgUpdateCartSuccess'] ?? '';
                            unset($_SESSION['msgUpdateCartSuccess']) ?>
                        </div>
                    </header>
                    <!-- <div class="card">
                        <form action="" class="form-cartCheckOut" method="post">
                            <h3 class="h3-cart">Card Info</h3>
                            <div class="div-input-infor">
                                <input type="text" class="input-form-login" value="" name="firstName" required>
                                <span class="span-label">Họ</span>
                            </div>
                            <div class="div-input-infor">
                                <input type="text" class="input-form-login" value="" name="lastName" required>
                                <span class="span-label">Tên</span>
                            </div>

                            <div class="div-input-infor">
                                <input type="text" class="input-form-login" value="" name="address" required>
                                <span class="span-label">Địa chỉ</span>
                            </div>
                            <div class="div-input-infor">
                                <input type="text" class="input-form-login" value="" name="phoneNum" required>
                                <span class="span-label">Số điện thoại</span>
                            </div>
                            <div class="div-input-checkout">
                                <label for="checkFirst">Thanh toán khi nhận</label>
                                <input type="radio" name="check" id="checkFirst" class="checkFirst" value="Thanh toán khi nhận">
                                <label for="checkAfter">Thanh toán qua tài khoản</label>
                                <input type="radio" name="check" id="checkAfter" class="checkAfter" value="Thanh toán qua tài khoản">
                            </div>
                        </form>
                    </div> -->
                </div>
                <thead class="thead-title">
                    <tr class="tr-title">
                        <td class="td-cart">Remove</td>
                        <td class="td-cart">Product</td>
                        <td class="td-cart">Price</td>
                        <td class="td-cart">Quantity</td>
                        <td class="td-cart">Image</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['carts'] as $cart) : ?>
                        <tr class="tr-cart">
                            <td class="td-cart"><a href="<?= URL ?>Home/delCart/<?= $cart['cartID'] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><button class="deleteBtn" style="cursor: pointer;">Xóa</button></a></td>
                            <td class="td-cart"><?= $cart['bookName'] ?? '' ?></td>
                            <td class="td-cart"><?= number_format($cart['price'] ?? '') ?></td>
                            <td class="td-cart">
                                <form action="<?= URL ?>Home/updateCart/<?= $cart['cartID'] ?>" class="form-CountPrd" method="post">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="subtracts-cart"></button>
                                    <input type="number" value="<?= $cart['quantity'] ?>" style="-webkit-appearance: none;" name="quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus-cart"></button>
                                    <button class="updateBtn" type="submit" name="btn-updateCart" style="cursor: pointer;">Update</button>
                                </form>
                            </td>
                            <td class="td-cart"><img src="../../../../../../../DuAn1-FPT/Public/upload/<?= $cart['image'] ?? '' ?>" alt=""></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <button class="button-paying">Thanh toán</button>
        <?php else : ?>
            <div style="text-align: center;">Không có sản phẩm nào trong giỏ hàng của bạn!</div>
        <?php endif ?>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>