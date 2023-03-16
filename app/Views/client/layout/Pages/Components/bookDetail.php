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
                                        
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="subtracts"></button>
                                        <input id="input-detail" type="number" value="1" style="-webkit-appearance: none;" min="1" name="quantity">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                        <button type="submit" class="updateBtn">Update</button></td>

                                    </div>
                                    <div>
                                        <button class="detail-btn" type="submit" name="btn-add-cart" >Thêm vào giỏ hàng</button>
                                        <button class="detail-btn" type="submit" name="btn-buy-cart" >Mua ngay</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div style="margin-top: 10px;"><?= $_SESSION['msgCartIsset'] ?? '';
                                unset($_SESSION['msgCartIsset']) ?>
                        </div>
                        <div style="margin-top: 10px;"><?= $_SESSION['msgEmptyID'] ?? '';
                                unset($_SESSION['msgEmptyID']) ?>
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
                <span class="detail-title2">SÁCH CÙNG DANH MỤC</span>
            </div>
            <div class="slide flex col-gap-20">
                <!-- <div style="width: 20%; flex-wrap: wrap;"> -->
               <?php if (count($data['similarBook']) > 0) : ?>
                    <?php foreach ($data['similarBook'] as $similarBook) : ?>
                        <div class="content">
                        <a href="<?= URL ?>Home/bookDetail/<?= $similarBook['id'] ?>/<?= $similarBook['cateID'] ?>">
                            <img style="" src="../../../../../../../DuAn1-FPT/Public/upload/<?= $similarBook['image'] ?>" alt="" title="<?= $similarBook['bookName'] ?>">
                        </a>
                        </div>
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
                <div class="box-comment">
                    <form action="" method="post" id="comment-form">
                        <input type="text" name="note" id="comment" placeholder="Comment here..." class="input-comment">
                        <input type="submit" value="POST" class="btn-comment" id="submit-comment" name="btn-comment">
                    </form>
                    <div id="result-comment">
                        <?= _dump($data['comments'] ?? '') ?>
                    </div>
                    <div style="font-size: 18px; color:tomato"><?= $_SESSION['msgCmtEmpty'] ?? '';
                            unset($_SESSION['msgCmtEmpty']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>