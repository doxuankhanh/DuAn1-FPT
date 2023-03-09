<style>
    input {
        display: block;
        margin-top: 20px;
    }
</style>
<h1>Thêm sách</h1>
<form action="<?= URL ?>/Book/new" method="post" enctype="multipart/form-data">
    <select name="cateID" id="">
        <?php foreach($data['cates'] as $cate):?>
            <option value="<?= $cate['id'] ?? ''?>"><?= $cate['cateName'] ?? ''?></option>
        <?php endforeach?>
    </select>
    <input type="text" name="bookName" id="" placeholder="Enter your BookName">
    <input type="file" name="image" id="">
    <input type="text" name="author" id="" placeholder="Enter your author">
    <input type="text" name="price" id="" placeholder="Enter your price">
    <input type="text" name="description" id="" placeholder="Enter your description">
    <input type="submit" value="Gửi" name="btn-new">
</form>