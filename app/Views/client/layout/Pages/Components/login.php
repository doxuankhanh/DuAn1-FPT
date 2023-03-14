<?php require_once "./app/Views/client/layout/Pages/header.php";?>

<div class="div-login-form">
    <div class="div-form-site">
        <form action="<?= URL?>Home/login" class="form-login" method="post">
            <h3 class="h3-login">Đăng nhập</h3>
            <div class="div-input-box">
            <input type="text" class="input-form-login" value="<?= $data['email'] ?? ''?>" required>
            <span class="span-label">Email</span>
            <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? ''?></span>
            </div>
            
           <div class="div-input-box">
           <input type="password" class="input-form-login" value="<?= $data['password'] ?? ''?>" required>
           <span class="span-label">Mật khẩu</span>
            <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['password_err'] ?? ''?></span>
           </div>
       
           <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['msgErr'] ?? ''?></span>
            
            
           <div class="div-input-box">
           <button class="submit-btn login" type="submit">Đăng nhập</button>
           </div>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php";?>
