
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

    <div class="booksite">
        <div class="div-title-banner">
            <h3>Tên Danh mục</h3>
        </div>
        <ul class="listbook">
            <?php foreach ($data['books'] as $book) : ?>
                <li class="li-book">
                    <a href="<?= URL ?>Book/bookDetail/<?= $book['id'] ?>">
                        <img style="" src="Public/upload/<?= $book['image'] ?>" alt="" title="<?= $book['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                                <div class="div-bookname-popup">
                                <p class="p-bookname-popup"><?= $book['bookName']?></p>
                                </div>
                                <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $book['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $book['author'] ?></li>
                                    <li class="li-infor-book"><?= $book['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <a href="#" class="a-price">Mua ngay</a>
                                <a href="#" class="a-buyNow"> <?= number_format($book['price'])?>đ</a>
                                </p>
                        </div>
                    </ul>
                </li>

            <?php endforeach ?>
        </ul>
    </div>
    </div>
