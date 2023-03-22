<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<?php if(!isset($_SESSION['userID'])):?>
    <h1>Vui lòng đăng nhập để mua sắm</h1>
    <?php else:?>
        <div class="div-checkContainer">
            <div class="div-mainCheck">
                <h1 class="h3-checkCart">THÔNG TIN CHI TIẾT ĐƠN HÀNG</h1>
            <table class="table-checkCart">
                <thead class="thead-checkCart">
                    <th class="th-checkCart">Mã Đơn Hàng</th>
                    <th  class="th-checkCart">Ngày Mua</th>
                    <th class="th-checkCart">Tiêu Đề</th>
                    <th class="th-checkCart">Giá</th>
                    <th class="th-checkCart">Số lượng</th>
                    <th class="th-checkCart">Tổng tiền</th>
                    <th class="th-checkCart">Trạng Thái Đơn Hàng</th>
                </thead>
                <tbody>
                    <?php foreach($data['clientOrder'] as $clientOrder):?>
                    <tr class="tr-checkCart">
                        <td class="td-checkCart"><?= "#P".$clientOrder['orderDetailID'] ?? ''?></td>
                        <td class="td-checkCart"><?= $clientOrder['dateBuy'] ?? ''?></td>
                        <td class="td-checkCart"><?= $clientOrder['bookName'] ?? ''?></td>
                        <td class="td-checkCart"><?= number_format($clientOrder['priceOrder']) ?? ''?></td>
                        <td class="td-checkCart"><?= $clientOrder['quantity'] ?? ''?></td>
                        <td class="td-checkCart"><?= number_format($clientOrder['sumPriceOrder']) ?? ''?></td>
                        <td class="td-checkCart"><?= $clientOrder['statusOrderName']?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif ?>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>