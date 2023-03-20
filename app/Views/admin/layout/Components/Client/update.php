<?php require_once "./app/Views/admin/layout/Components/header.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <title>Cập Nhật Khách Hàng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand mx-2" href="#">CẬP NHẬT KHÁCH HÀNG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </header>

    <main class="m-2">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" class="form-control" disabled value="<?= $data['client']['clientID'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="">Tên Khách Hàng</label>
                <input type="text" class="form-control" name="username" value="<?= $data['client']['username'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="">Account</label>
                <input type="text" class="form-control" name="accountName" value="<?= $data['client']['accountName'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $data['client']['email'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="">Mật Khẩu</label>
                <input type="text" class="form-control" name="password" value="<?= $data['client']['password'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" class="form-control" name="address" value="<?= $data['client']['address'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="">Số Điện Thoại</label>
                <input type="text" class="form-control" name="phoneNumber" value="<?= $data['client']['phoneNumber'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" id="" placeholder="" name="avatar">
                <div style="margin: 20px 0;"><img src="../../Public/upload/<?= $data['client']['avatar'] ?>" alt="" style="width: 120px;"></div>

            </div>

            <div class="form-group">
                <label for="">Vai Trò</label>
                <select name="role" id="" class="form-control" value="<?= $data['client']['role'] ?? '' ?>">
                    <option value="0">Admin</option>
                    <option value="1">Khách Hàng</option>
                </select>
            </div>

            <div class="form-group mx-auto my-2">
                <input type="submit" name="btn-update" value="Cập Nhật" class="btn btn-primary">
                <a href="<?= URL ?>Admin/listClient" class="btn btn-primary">Danh Sách</a>
            </div>
        </form>
    </main>

    <footer>
    </footer>
</body>

</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php"; ?>