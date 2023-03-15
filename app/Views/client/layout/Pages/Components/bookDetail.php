<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>

<div class="div-main-content">
    <div class="detail-content">
        <div class="detail-row flex">
            <div>
                <img src="../../../../../../../DuAn1-FPT/Public/upload/<?= $data['book']['image'] ?>" alt="img" />
            </div>
            <div>
                <h2 class="detail-title">
                    <?= $data['book']['bookName'] ?>
                </h2>
                <div class="flex detail-info">
                    <ul class="detail-ul">
                        <li>Mã sản phẩm: <a href="#"> <?= $data['book']['id'] ?></a></li>
                        <li>Tác giả: <a href="#"><?= $data['book']['author'] ?></a></li>
                        <li>Lượt xem: <?= $data['book']['view'] ?></li>
                        <!-- <li>Dịch giả: <a href="#">Hoàng Đức Long</a></li>
                        <li>Nhà xuất bản: <a href="#">Thế Giới</a></li>
                        <li>Số trang: 622</li>
                        <li>Kích thước: 15.5x24 cm</li> -->
                        <li>Ngày phát hành: <?= $data['book']['dateAdded'] ?></li>
                    </ul>
                    <div>
                        <form action="" method="post">
                            <span>Giá bìa: <span class="price-old">150.000đ</span></span>
                            <span class="shop-pr">Giá : <?= number_format($data['book']['price']) ?>đ (Đã có VAT)</span>
                            <div class="q">
                                <span>SỐ LƯỢNG:</span>
                                <div class="flex e">
                                    <div class="quantity">
                                        <span id="abatement">-</span>
                                        <!-- <span class="span-cart">1</span> -->
                                        <input id="input-detail" type="number" value="1" class="span-cart"/>
                                        <span id="augment">+</span>
                                    </div>
                                    <div>
                                        <button class="detail-btn" type="submit">Thêm vào giỏ hàng</button>
                                        <button class="detail-btn" type="submit">Mua ngay</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-if">
            <h3>Giới thiệu sách</h3>
            <span>
                <?= $data['book']['description'] ?>
            </span>
        </div>

        <div>
            <div class="dt">
                <span class="detail-title2">SÁCH CÙNG DANH MỤC</span>
            </div>
            <div class="flex col-gap-20">
                <!-- <div style="width: 20%; flex-wrap: wrap;"> -->
                <?php if (count($data['similarBook']) > 0) : ?>
                    <?php foreach ($data['similarBook'] as $similarBook) : ?>
                        <a href="<?= URL ?>Home/bookDetail/<?= $similarBook['id'] ?>/<?= $similarBook['cateID'] ?>">
                            <img style="" src="../../../../../../../DuAn1-FPT/Public/upload/<?= $similarBook['image'] ?>" alt="" title="<?= $similarBook['bookName'] ?>">
                        </a>
                    <?php endforeach ?>
                <?php else : ?>
                    </center>
                    <div>Không có sản phẩm cùng danh mục</div>
                <?php endif ?>
                <!-- </div> -->
            </div>
        </div>

        <div>
            <div class="dt">
                <span class="detail-title2">Bình luận</span>
            </div>
            <div class="flex col-gap-20">

            </div>
        </div>
    </div>
</div>

<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>