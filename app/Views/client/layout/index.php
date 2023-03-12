<?php
require_once "./app/Views/client/layout/Pages/header.php";
if(isset($data['pages'])) {
    require_once "./app/Views/". $data['pages'].".php";
}else{
    require_once "./app/Views/client/layout/Pages/home.php";
}

// require_once './app/Views/client/layout/bookDetail.php';

require_once "./app/Views/client/layout/Pages/footer.php";
?>