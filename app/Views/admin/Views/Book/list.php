<!doctype html>
<html lang="en">

<head>
  <title>Danh Mục</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>

  </style>
</head>

<body>
  <!-- Begin Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand mx-2" href="#">DANH SÁCH SẢN PHẨM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
    <form action="" method="POST">
      <h6 class="mx-2">Tìm Kiếm Sản Phẩm</h6>
      <div class="form-group mx-2 my-2">
        <input type="search" name="bookName" id="" class="form-control" placeholder="Tìm kiếm sản phẩm của bạn...">
      </div>
      <div class="form-group  mx-2">
        <select name="cateID" id="" class="form-control">
          <option value="0" selected> -- Tất Cả -- </option>
          <?php foreach ($data['cates'] as $cate) : ?>
            <option value="<?= $cate['id'] ?>"><?= $cate['cateName'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group mx-2 my-2">
        <input type="submit" value="Tìm Kiếm" name="btn-search" class="btn btn-info">
        <a href="<?= URL?>Book/new" class="btn btn-primary">Thêm mới</a>
      </div>
    </form>
  </header>
  <!-- End Header -->

  <!-- Begin Main -->
  <main class="m-2">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên Sản Phẩm</th>
          <th scope="col">Tên Danh Mục</th>
          <th scope="col">Trạng Thái</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Tác Giả</th>
          <th scope="col">Giá</th>
          <th scope="col">Mô Tả</th>
          <th scope="col" colspan="2" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($data['books']) > 0) : ?>
          <?php foreach ($data['books'] as $book) : ?>
            <tr>
              <th scope="row"><?= $book['id'] ?></th>
              <th scope="row"><?= $book['bookName'] ?></th>
              <th scope="row"><?= $book['cateName'] ?? 'Nothing'?></th>
              <th scope="row"><?= $book['statusName'] ?? 'Nothing'?></th>
              <th><img src="../Public/upload/<?= $book['image'] ?>" alt="." style="height: 120px;"></th>
              <th scope="row"><?= $book['author'] ?></th>
              <th scope="row"><?= number_format($book['price']) ?></th>
              <th scope="row"><p style="text-overflow: ellipsis; overflow: hidden; -webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; width: 20%;"><?= $book['description'] ?></p></th>
              <th><a href="<?= URL?>Book/update/<?= $book['id']?>" class="btn btn-info">Update</a></th>
              <th><a href="<?= URL?>Book/delete/<?= $book['id']?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Delete</a></th>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="alert alert-danger">
            Không có sản phẩm mà bạn muốn tìm!
          </div>
      </tbody>
    <?php endif ?>
    </table>
    <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
      <ul class="pagination">
        <!-- <li class="page-item">
          <a class="page-link" href="index.php?act=productList&page=<?= $pages?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li> -->
        <?php for ($i = 1; $i <= $data['pages']; $i++) { ?>
          <li class="page-item"><a class="page-link" href="<?= URL?>Admin/listBook/page=<?= $i?>"><?= $i ?></a></li>
        <?php } ?>
        <!-- <li class="page-item"><a class="page-link" href="">1</a></li> -->
        <!-- <li class="page-item">
          <a class="page-link" href="index.php?act=productList&page=<?= $pages+=1?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li> -->
      </ul>
    </nav>
  </main>
  <!-- End Main -->

  <!-- Begin Footer -->
  <footer>
  </footer>
  <!-- End Footer -->

</body>

</html>