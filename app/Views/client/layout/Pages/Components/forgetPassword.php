<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<center>
    <h1>Quên mật khẩu</h1>
    <form action="<?= URL ?>Home/forgetPassword" method="post">
        <input type="text" placeholder="Enter your email" name="email"> <br>
        <input type="submit" name="btn-forgetPass" value="Gửi">
        <a href="<?= URL?>Home/login">Login</a>
    </form>
</center>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>