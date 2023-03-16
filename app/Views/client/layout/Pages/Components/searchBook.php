<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-main-content">
    <div class="swiper" style="padding: 30px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide" style="background-image: url(../../../../../../../DuAn1-FPT/Public/images/product/slide1.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../../../DuAn1-FPT/Public/images/product/slide2.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../../../DuAn1-FPT/Public/images/product/slide3.jpg);background-size: contain;background-position: center;">
            </div>
        </div>
        <!-- If we need pagination -->
    </div>

    <div>
        <div class="div-title-banner">
            <h3>Kết quả tìm kiếm:</h3>
        </div>
        <ul class="listbook">
            <?php foreach ($data['bookSearch'] as $bookNew) : ?>
                <li class="li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $bookNew['id'] ?>/<?= $bookNew['cateID'] ?>">
                        <img style="" src="../../../../../../../DuAn1-FPT/Public/upload/<?= $bookNew['image'] ?>" alt="" title="<?= $bookNew['bookName'] ?>">
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

                                <a href="#" class="a-price"> <?= number_format($bookNew['price']) ?></a>
                                <a href="#" class="a-buyNow">Mua ngay</a>
                            </p>
                        </div>
                    </ul>
                </li>

            <?php endforeach ?>
        </ul>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>