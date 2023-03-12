<?php
_dump($data['book']);
?>

<div class="div-main-content">
    <div class="detail-content">
        <div class="detail-row flex">
            <div>
                <img src="Public/upload/<?= $data['book']['image'] ?>" alt="img" />
            </div>
            <div>
                <h2 class="detail-title">
                    <?= $data['book']['bookName'] ?>
                </h2>
                <div class="flex detail-info">
                    <ul class="detail-ul">
                        <li>Mã sản phẩm: <a href="#"> <?= $data['book']['id'] ?></a></li>
                        <li>Tác giả: <a href="#"><?= $data['book']['author'] ?></a></li>
                        <li>Dịch giả: <a href="#">Hoàng Đức Long</a></li>
                        <li>Nhà xuất bản: <a href="#">Thế Giới</a></li>
                        <li>Số trang: 622</li>
                        <li>Kích thước: 15.5x24 cm</li>
                        <li>Ngày phát hành: <?= $data['book']['dateAdded'] ?></li>
                    </ul>
                    <div>
                        <span>Giá bìa: <span class="price-old">150.000đ</span></span>
                        <span class="shop-pr">Giá Nhã Nam: <?= $data['book']['price'] ?>đ (Đã có VAT)</span>
                        <div class="q">
                            <span>SỐ LƯỢNG:</span>
                            <div class="flex e">
                                <div class="quantity">
                                    <button id="abatement">-</button>
                                    <input id="input-detail" disabled type="number" value="1" />
                                    <button id="augment">+</button>
                                </div>
                                <div>
                                    <span class="detail-btn">Thêm vào giỏ hàng</span>
                                    <span class="detail-btn">Mua ngay</span>
                                </div>
                            </div>
                        </div>
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
                <span class="detail-title2">SÁCH CÙNG TÁC GIẢ</span>
            </div>
            <div class="flex col-gap-20">
                <div style="width: 20%; flex-wrap: wrap;">
                    <img src="./accets/img/pro1.jpg" alt="">
                </div>
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