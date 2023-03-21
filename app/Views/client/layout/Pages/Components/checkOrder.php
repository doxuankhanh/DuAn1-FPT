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
                    <th class="th-checkCart">Tổng tiền</th>
                    <th class="th-checkCart">Trạng Thái Đơn Hàng</th>
                </thead>
                <tbody>
                    <tr class="tr-checkCart">
                        <td class="td-checkCart">1</td>
                        <td class="td-checkCart">2003</td>
                        <td class="td-checkCart">okc</td>
                        <td class="td-checkCart">120000</td>
                        <td class="td-checkCart">Đã giao</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        <?= _dump($data['clientOrder'] ?? '')?>
<?php endif?>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>