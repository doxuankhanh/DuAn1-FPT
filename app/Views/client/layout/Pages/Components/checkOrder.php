<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<?php if(!isset($_SESSION['userID'])):?>
    <h1>Vui lòng đăng nhập để mua sắm</h1>
    <?php else:?>
        <h1>THÔNG TIN CHI TIẾT ĐƠN HÀNG</h1>
        <?= _dump($data['clientOrder'] ?? '')?>
<?php endif?>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>