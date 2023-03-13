<div class="div-cart-popup-container">
    <div class="div-cart-popup-content">
        <header class="header-cart"><h3>Giỏ hàng</h3></header>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Sách 18+</td>
                <td>699600₫</td>
                <td>1</td>
                <td>699600₫</td>
            </tr>
        </table>
    </div>
</div>
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
    <!-- End sách mới tái bản -->

    <div>
        <div class="div-title-banner">
            <h3>SÁCH BÁN CHẠY</h3>
        </div>
        <ul class="listbook">

            <li>
                <a href="#">
                    <img src="Public/images/product/pro1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
    <!-- END SÁCH BÁN CHẠY -->

    <div>
        <div class="div-title-banner">
            <h3>VĂN HỌC VIỆT NAM</h3>
        </div>
        <ul class="listbook">

            <li>
                <a href="#">
                    <img src="Public/images/product/pro1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
    <!-- END VĂN HỌC VIỆT NAM -->

    <div>
        <div class="div-title-banner">
            <h3>VĂN HỌC NƯỚC NGOÀI</h3>
        </div>
        <ul class="listbook">

            <li>
                <a href="#">
                    <img src="Public/images/product/pro1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
    <!-- END VĂN HỌC NƯỚC NGOÀI -->

    <div>
        <div class="div-title-banner">
            <h3>THIẾU NHI</h3>
        </div>
        <ul class="listbook">

            <li>
                <a href="#">
                    <img src="Public/images/product/pro1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
    <!-- END VĂN HỌC NƯỚC NGOÀI -->

    <div>
        <div class="div-title-banner">
            <h3>THỜI SỰ - CHÍNH TRỊ</h3>
        </div>
        <ul class="listbook">
            <li>
                <a href="#">
                    <img src="Public/images/product/pro1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
    <!-- END THỜI SỰ - CHÍNH TRỊ -->

    <div>
        <div class="div-title-banner">
            <h3>THỜI SỰ - CHÍNH TRỊ</h3>
        </div>
        <ul class="listbook">

            <li>
                <a href="#">
                    <img src="Public/images/product/pro1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
    <!-- END THAM KHẢO -->

    <div>
        <div class="div-title-banner">
            <h3>GIẢM GIÁ ĐẶC BIỆT</h3>
        </div>
        <ul class="listbook">

            <li>
                <a href="#">
                    <img src="Public/images/product/pro1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
    <!-- END GIẢM GIÁ ĐẶC BIỆT -->
</div>