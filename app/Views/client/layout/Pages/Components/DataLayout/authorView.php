<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>


<?php
_dump($data['authors']);
foreach ($data['authors'] as $value)  {
    // echo '<img src="../../../../../../../DuAn1-FPT/Public/images/authorImg/'.$value['imgAuthor'].'">';
}

?>  

<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>
