<h1>Update</h1>
<form action="<?= URL?>Cate/update/<?= $data['cate']['id']?>" method="post">
    <label for="">Name</label>
    <input type="text" name="cateID" id="" disabled value="<?= $data['cate']['id'] ?? ''?>">
    <input type="text" name="cateName" id="" value="<?= $data['cate']['cateName'] ?? ''?>">
    <input type="submit" value="Gửi" name="btn-update">
</form>