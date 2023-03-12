<?php require_once "./app/Views/client/layout/Pages/header.php";?>
<div class="div-main-content">
    <div class="swiper" style="padding: 30px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide" style="background-image: url(Public/images/product/slide1.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(Public/images/product/slide2.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(Public/images/product/slide3.jpg);background-size: contain;background-position: center;">
            </div>
        </div>
        <!-- If we need pagination -->
    </div>

    <div>
        <div class="div-title-banner">
            <h3>SÁCH MỚI TÁI BẢN</h3>
        </div>
        <ul class="listbook">
            <?php foreach ($data['bookNew'] as $bookNew) : ?>
                <li class="li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $bookNew['id'] ?>">
                        <img style="" src="Public/upload/<?= $bookNew['image'] ?>" alt="" title="<?= $bookNew['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <p class="p-bookname-popup"><?= $bookNew['bookName'] ?></p>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $bookNew['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $bookNew['author'] ?></li>
                                    <li class="li-infor-book"><?= $bookNew['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <?= number_format($bookNew['price']) ?>
                            </p>
                            <a href="#" class="a-addCart">Thêm vào giỏ hàng</a>
                            <a href="#" class="a-buyNow">Mua ngay</a>
                        </div>
                    </ul>
                </li>

            <?php endforeach ?>
        </ul>
    </div>
    <!-- End sách mới tái bản -->

    <div>
        <div class="div-title-banner">
            <h3>SÁCH BÁN CHẠY</h3>
        </div>
        <ul class="listbook">
            <?php foreach ($data['bookSeller'] as $bookSeller) : ?>
                <li class= "li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $bookSeller['id'] ?>">
                        <img style="" src="Public/upload/<?= $bookSeller['image'] ?>" alt="" title="<?= $bookSeller['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <p class="p-bookname-popup"><?= $bookSeller['bookName'] ?></p>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $bookSeller['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $bookSeller['author'] ?></li>
                                    <li class="li-infor-book"><?= $bookSeller['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <?= number_format($bookSeller['price']) ?>
                            </p>
                            <a href="#" class="a-addCart">Thêm vào giỏ hàng</a>
                            <a href="#" class="a-buyNow">Mua ngay</a>
                        </div>
                    </ul>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <!-- END SÁCH BÁN CHẠY -->

    <div>
        <div class="div-title-banner">
            <h3>VĂN HỌC VIỆT NAM</h3>
        </div>
        <ul class="listbook">
            <?php foreach($data['literatureVN'] as $literatureVN):?>
        <li class= "li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $literatureVN['id'] ?>">
                        <img style="" src="Public/upload/<?= $literatureVN['image'] ?>" alt="" title="<?= $literatureVN['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <p class="p-bookname-popup"><?= $literatureVN['bookName'] ?></p>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $literatureVN['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $literatureVN['author'] ?></li>
                                    <li class="li-infor-book"><?= $literatureVN['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <?= number_format($literatureVN['price']) ?>
                            </p>
                            <a href="#" class="a-addCart">Thêm vào giỏ hàng</a>
                            <a href="#" class="a-buyNow">Mua ngay</a>
                        </div>
                    </ul>
                </li>
                <?php endforeach?>
        </ul>
    </div>
    <!-- END VĂN HỌC VIỆT NAM -->

    <div>
        <div class="div-title-banner">
            <h3>VĂN HỌC NƯỚC NGOÀI</h3>
        </div>
        <ul class="listbook">
            <?php foreach($data['literature'] as $literature):?>
        <li class= "li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $literature['id'] ?>">
                        <img style="" src="Public/upload/<?= $literature['image'] ?>" alt="" title="<?= $literature['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <p class="p-bookname-popup"><?= $literature['bookName'] ?></p>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $literature['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $literature['author'] ?></li>
                                    <li class="li-infor-book"><?= $literature['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <?= number_format($literature['price']) ?>
                            </p>
                            <a href="#" class="a-addCart">Thêm vào giỏ hàng</a>
                            <a href="#" class="a-buyNow">Mua ngay</a>
                        </div>
                    </ul>
                </li>
                <?php endforeach?>
        </ul>
    </div>
    <!-- END VĂN HỌC NƯỚC NGOÀI -->

    <div>
        <div class="div-title-banner">
            <h3>THIẾU NHI</h3>
        </div>
        <ul class="listbook">
            <?php foreach($data['children'] as $children):?>
        <li class= "li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $children['id'] ?>">
                        <img style="" src="Public/upload/<?= $children['image'] ?>" alt="" title="<?= $children['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <p class="p-bookname-popup"><?= $children['bookName'] ?></p>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $children['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $children['author'] ?></li>
                                    <li class="li-infor-book"><?= $children['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <?= number_format($children['price']) ?>
                            </p>
                            <a href="#" class="a-addCart">Thêm vào giỏ hàng</a>
                            <a href="#" class="a-buyNow">Mua ngay</a>
                        </div>
                    </ul>
                </li>
                <?php endforeach?>
        </ul>
    </div>
    <!-- END VĂN HỌC NƯỚC NGOÀI -->

</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php";?>
