<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<form action="<?= URL?>Home/searchOrder" method="post">
<input type="text" name="orderID" placeholder="Tìm kiếm..." required>
<input type="submit" name="btn-searchOrder" value="Tìm Kiếm">

</form>
<?php
if($data['result'] && count($data['result']) > 0) {
    _dump($data['result']);
}else {
    echo "DCM ĐÃ MUA Đ MÀ CÓ SẢN PHẨM MÀ TÌM";
}
?>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>