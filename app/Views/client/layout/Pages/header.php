<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../../../../DuAn1-FPT/Public/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <div class="div-container">
        <header>
            <div class="div-introduct">
                <a class="anchor-a" href="#">GIỚI THIỆU</a>
                <a class="anchor-a" href="#">LỊCH SỬ GIAO DỊCH</a>
                <a class="anchor-a" href="#">kIỂM TRA ĐƠN HÀNG</a>
            </div>
            <div class="div-login-site">
                <?php if(!isset($_SESSION['userID'])):?>
                <a class="anchor-a" href="<?= URL?>Home/login">ĐĂNG NHẬP</a>
                <a class="anchor-a" href="<?= URL?>Home/register">ĐĂNG KÝ</a>
                <?php elseif(isset($_SESSION['username']) && $_SESSION['role'] === '0'):?>
                <a class="anchor-a" href="<?= URL?>Home/destroy">ĐĂNG XUẤT</a>
                <a class="anchor-a" href="<?= URL?>Admin">ADMIN</a>
                <?php else:?>
                <a class="anchor-a" href="<?= URL?>Home/destroy">ĐĂNG XUẤT</a>
                <?php endif?>
                <div class="p-setting anchor-a " style="display: inline;" href="#"><img class="img-setting" src="../../../../../../DuAn1-FPT/Public/images/product/settings-icon-13.png" alt="">
                <div class="ul-setting">
                    <p class="li-setting">TênNgườiDùng</p>
                    <p class="li-setting"><a href="">Sửa Thông Tin</a></p>
                    <p class="li-setting"><a href="">LogOut</a></p>
                </div>
            </div>
            </div>
        </header>
        <div class="div-banner">
            <a href="<?= URL?>Home">
                <img src="../../../../../../DuAn1-FPT/Public/images/product/banner.png" alt="" class="img-banner">
            </a>
            <div class="div-searchsite">
                <a href="#" class="cart"></a>
                <form action="" method="post">
                    <input type="text" class="search-box" placeholder="Tìm kiếm sách của bạn..." name="bookName">
                    <input type="image" type="submit" name="search-btn" src="../../../../../../DuAn1-FPT/Public/images/product/searchbg.png" value="Tìm kiếm"
                        class="search-btn">
                </form>
            </div>
        </div>
        <div class="div-nav">
            <ul class="ul-nav">
                <li class="li-nav"><a href="#">DANH MỤC SÁCH</a>
                    <ul class="ul-child-list">
                        <?php foreach($data['cates'] as $cate):?>
                        <li class="li-child-list"><a href="<?= URL?>Home/bookFollowCategories/<?= $cate['id'] ?? ''?>"><?= $cate['cateName'] ?? ''?></a>
                            <!-- <ul class="ul-child-last-list">
                                <li class="li-child-last-list">Tác phẩm 1</li>
                                <li class="li-child-last-list">Tác phẩm 2</li>
                                <li class="li-child-last-list">Tác phẩm 3</li>
                            </ul> -->
                        </li>
                        <?php endforeach?>
                    </ul>
                </li>
                <li class="li-nav"><a href="<?= URL?>Home/loadBookView">SÁCH CÓ LƯỢT XEM NHIỀU NHẤT</a></li>
                <li class="li-nav"><a href="#">CHƯƠNG TRÌNH KHUYẾN MÃI</a></li>
                <li class="li-nav"><a href="#">GIẢM GIÁ ĐẶC BIỆT</a></li>
            </ul>
        </div>