<?php require_once "./app/Views/client/layout/Pages/header.php";?>
<div class="div-login-form">
    <div class="div-formSignIn-site">
        <center>
            <div style="color: seagreen; text-transform: uppercase; font-size: 20px;"><?= $data['msgSuccess'] ?? ''?></div>
        </center>
        <form action="<?= URL?>Home/register" class="form-login" method="post">
            <h3 class="h3-login">Đăng Ký</h3>
            <label for="mail">Email :</label>
            <input type="email" name="email" class="input-form-login" value="<?= $data['email'] ?? ''?> ">
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['email_err'] ?? '' ?></span>
            <label for="name">FullName :</label>
            <input type="text" name="username" class="input-form-login" value="<?= $data['username'] ?? ''?>" >
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['username_err'] ?? ''?></span>
            <label for="name">Account :</label>
            <input type="text" name="accountName" class="input-form-login" value="<?= $data['accountName'] ?? ''?>" >
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['accountName_err'] ?? ''?></span>
            <label for="pwd">Mật khẩu :</label>
            <input type="password" name="password" class="input-form-login" value="<?= $data['password'] ?? ''?>" >
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['password_err'] ?? ''?></span>
            <label for="Repwd">Xác nhận mật khẩu :</label>
            <input type="password" name="passwordRepeat" class="input-form-login" value="<?= $data['passwordRepeat'] ?? ''?>" >
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['passwordRepeat_err'] ?? '' ?></span>
            <label for="phoneNum">Số điện thoại :</label>
            <input type="text" name="phoneNumber" class="input-form-login" value="<?= $data['phoneNumber'] ?? ''?>" >
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['phoneNumber_err'] ?? ''?></span>
            <label for="address">Địa chỉ :</label>
            <input type="text" name="address" class="input-form-login" value="<?= $data['address'] ?? ''?>" >
            <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['address_err'] ?? ''?></span>
            <button type="submit" name="btn-register">Đăng Ký</button>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php";?>
