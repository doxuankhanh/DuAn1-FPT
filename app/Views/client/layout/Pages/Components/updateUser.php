<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>

<div class="div-login-form">
    <div class="div-form-site">
        <form action="<?= URL ?>Home/updateUser/<?= $data['user']['clientID'] ?>" class="form-login" method="post" enctype="multipart/form-data">
            <h3 class="h3-login">Thông tin tài khoản</h3>

            <div class="div-input-box">
                <input type="text" name="email" class="input-form-login" value="<?= $data['user']['email'] ?? '' ?>" required>
                <span class="span-label">Email</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span>
            </div>

            <div class="div-input-box">
                <input type="text" name="username" class="input-form-login" value="<?= $data['user']['username'] ?? '' ?>" required>
                <span class="span-label">username</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span>
            </div>

            <div class="div-input-box">
                <input type="text" name="accountName" class="input-form-login" value="<?= $data['user']['accountName'] ?? '' ?>" required>
                <span class="span-label">accountName</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span>
            </div>

            <!-- <div class="div-input-box">
                <input type="text" name="password" class="input-form-login" value="<?= $data['user']['password'] ?? '' ?>" required>
                <span class="span-label">Password</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span>
            </div> -->

            <div class="div-input-box">
                <input type="text" name="address" class="input-form-login" value="<?= $data['user']['address'] ?? '' ?>" required>
                <span class="span-label">address</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span>
            </div>

            <div class="div-input-box">
                <input type="text" name="phoneNumber" class="input-form-login" value="<?= $data['user']['phoneNumber'] ?? '' ?>" required>
                <span class="span-label">phoneNumber</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span>
            </div>

            <div class="div-input-box">
                <input type="file" name="image" class="input-form-login" autofocus style="width: 100%" value="">
                <span class="span-label">avartar</span>
                <!-- <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span> -->
            </div>

            <div class="div-input-box">
                <button class="submit-btn login" name="btn-update" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>