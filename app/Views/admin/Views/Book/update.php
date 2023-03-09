<style>
    input {
        display: block;
        margin-top: 20px;
    }
</style>
<h1>Update</h1>
<form action="<?= URL ?>/Book/update/<?= $data['book']['id']?>" method="post" enctype="multipart/form-data">
    <select name="cateID" id="">
        <?php foreach($data['cates'] as $cate):?>
            <?php if($cate['id'] === $data['book']['cateID']):?>
            <option value="<?= $cate['id'] ?? ''?>" selected><?= $cate['cateName'] ?? '' ?></option>
                <?php else:?>
            <option value="<?= $cate['id'] ?? ''?>"><?= $cate['cateName'] ?? ''?></option>
            <?php endif?>

        <?php endforeach?>
    </select>
    <input type="text" name="bookName" id="" placeholder="Enter your BookName" value="<?= $data['book']['bookName'] ?? ''?>">
    <label for="">Image</label>
    <input type="file" name="image" id="" value="">
    <img src="../../Public/upload/<?= $data['book']['image']?>" alt="" style="display: block; width: 120px;">
    <input type="text" name="author" id="" placeholder="Enter your author" value="<?= $data['book']['author'] ?? ''?>">
    <input type="text" name="price" id="" placeholder="Enter your price" value="<?= $data['book']['price'] ?? ''?>">
    <input type="text" name="description" id="" placeholder="Enter your description" value="<?= $data['book']['description'] ?? ''?>">
    <input type="submit" value="Gửi" name="btn-update">
</form>