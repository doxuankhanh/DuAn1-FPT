<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-container-cart">
    <div class="div-main-cart">
        <?php if (count($data['carts']) > 0) : ?>
            <table class="table-cart">
                <thead class="thead-cart">Giỏ hàng của bạn:</thead>
                <thead>
                    <tr>
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
                                <form action="<?= URL ?>Home/updateCart/<?= $cart['cartID'] ?>" class="quantity" method="post">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="subtracts"></button>
                                    <input type="number" value="<?= $cart['quantity'] ?>" style="-webkit-appearance: none;" min="1" name="quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                    <button class="updateBtn" type="submit" name="btn-updateCart" style="cursor: pointer;">Update</button>
                                </form>
                            </td>
                            <td class="td-cart"><img src="../../../../../../../DuAn1-FPT/Public/upload/<?= $cart['image'] ?? '' ?>" alt=""></td>
                        </tr>
                    <?php endforeach ?>
                    <button class="button-paying">Thanh toán</button>
                </tbody>
                <div class="đây là msg thông báo khi người dùng đã xóa giỏ hàng">
                    <?= $_SESSION['msgDelSuccessCart'] ?? '';
                    unset($_SESSION['msgDelSuccessCart']) ?>
                </div>
                <div class="đây là msg thông báo khi người dùng update giỏ hàng thành công">
                    <?= $_SESSION['msgUpdateCartSuccess'] ?? '';
                    unset($_SESSION['msgUpdateCartSuccess']) ?>
                </div>
            </table>
        <?php else : ?>
            <div style="text-align: center;">Không có sản phẩm nào trong giỏ hàng của bạn!</div>
        <?php endif ?>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>