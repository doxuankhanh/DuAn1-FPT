<?php require_once "./app/Views/client/layout/Pages/header.php";?>
<div class="div-login-form">
    <div class="div-form-site">
        <form action="<?= URL?>Home/login" class="form-login" method="post">
            <h3 class="h3-login">Đăng nhập</h3>
            <label for="name">Email</label>
            <input type="text" class="input-form-login" name="email" value="<?= $data['email'] ?? ''?>">
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['email_err'] ?? ''?></span>
            <label for="pwd">Mật khẩu</label>
            <input type="password" class="input-form-login" name="password" value="<?= $data['password'] ?? ''?>">
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['password_err'] ?? ''?></span>
            <div style="color: tomato;font-style: italic; font-size: 16px;"><?= $data['msgErr'] ?? ''?></div>
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"></span>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php";?>
