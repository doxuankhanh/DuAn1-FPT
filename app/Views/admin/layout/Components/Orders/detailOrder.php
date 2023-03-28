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
            <a class="navbar-brand mx-2" href="#">CHI TIẾT ĐƠN HÀNG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </header>

    <main class="m-2">
        <div class="d-flex">
            <div class="col-3">
                <h4>THÔNG TIN KHÁCH HÀNG</h4>
                <div class="table-responsive">
                    <table class="table table-striped
                    table-hover	
                    table-borderless
                    table-primary
                    align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>FULL NAME</th>
                                <th>PHONE NUMBER</th>
                                <th>ADDRESS</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr class="table-primary" >
                                    <td scope="row"><?= $data['order']['clientName'] ?? ''?></td>
                                    <td><?= $data['order']['phoneNumber'] ?? ''?></td>
                                    <td><?= $data['order']['address'] ?? ''?></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="col-9">
                <h4>THÔNG TIN CHI TIẾT ĐƠN HÀNG</h4>
                <div class="table-responsive">
                    <table class="table table-striped
                    table-hover	
                    table-borderless
                    table-primary
                    align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>CODE</th>
                                <th>PRO NAME</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                                <th>DATE BUY</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr class="table-primary" >
                                    <td scope="row"><?= "#P".$data['order']['orderDetailID'] ?? ''?></td>
                                    <td><?= $data['order']['bookName'] ?? ''?></td>
                                    <td><?= number_format($data['order']['priceOrder']) ?? ''?></td>
                                    <td><?= $data['order']['quantity'] ?? ''?></td>
                                    <td><?= number_format($data['order']['sumPriceOrder']) ?? ''?></td>
                                    <td><?= $data['order']['dateBuy'] ?? ''?></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <form action="<?= URL?>Order/updateStatusOrder/<?= $data['order']['orderID']?>" method="post">
            <label for="" class="form-label">Trạng Thái Đơn Hàng</label>
            <select class="form-select form-select-lg" name="statusID" id="">
                <?php foreach($data['statusOrders'] as $statusOrder):?>
                    <?php if($statusOrder['id'] === $data['order']['statusID']):?>
                        <option value="<?= $statusOrder['id']?>" selected><?= $statusOrder['statusOrderName'] ?? ''?></option>
                        <?php else:?>
                            <option value="<?= $statusOrder['id']?>"><?= $statusOrder['statusOrderName'] ?? ''?></option>
                            <?php endif?>
                <?php endforeach?>
            </select>
            <a href="<?= URL?>Admin/listOrder/page/<?= $i?>"><button type="submit" class="btn btn-info mx-2 my-2" name="updateStatus">Cập Nhật</button></a>
            </form>
        </div>
    </main>
</body>

</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php"; ?>