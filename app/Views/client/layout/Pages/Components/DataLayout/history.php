<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>

<?php if(!isset($_SESSION['userID'])) : ?>
    <div class="div-container-cart">
        <div class="div-main-cart">
            <div style="text-align: center; padding: 70px 0px" class="content_cart-empty">
                <h4>Không có lịch sử giao dịch!</h4>
                <h4>Bạn chưa đăng nhập!</h4>
                <h4>Nếu bạn chưa có tài khoản hãy <a href="<?= URL?>Home/register">Đăng ký</a> ngay!</h4> 
            </div>
        </div>
        
    </div>
<?php else :?>
    <div class="div-checkContainer">
        <div class="div-mainCheck">
            <h1 class="h3-checkCart">Lịch sử giao dịch</h1>
            <table class="table-checkCart">
                <thead class="thead-checkCart">
                    <th class="th-checkCart">Mã đơn hàng</th>
                    <th class="th-checkCart">Số tiền</th>
                    <th class="th-checkCart">Thời gian thanh toán</th>
                </thead>

                <tbody>
                    <?php if(count($data['history']) > 0) :?>
                        <?php foreach ($data['history'] as $history) :?>
                            <tr class="tr-checkCart">
                                <td class="td-checkCart"><?= "#P" . $history['orderDetailID']?></td>
                                <td class="td-checkCart"><?= number_format($history['sumPriceOrder'])?></td>
                                <td class="td-checkCart"><?= $history['dateBuy']?></td>
                                
                            </tr>
                        <?php endforeach?>
                    <?php else : ?>
                        <div style="text-align: center; padding: 70px 0px" class="content_cart-empty">
                            <h4>Bạn chưa có giao dịch nào !</h4>
                        </div>
                    <?php endif ?>
                </tbody>
            </table>
            
        </div>
    </div>

<?php endif ?>

<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>