<a href="<?= URL?>Cate/new">Tạo mới</a>
<table style="width: 100%;">
    <thead style="background-color: wheat;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['cates'] as $cate):?>
        <tr>
            <td><?= $cate['id'] ?? ''?></td>
            <td><?= $cate['cateName'] ?? ''?></td>
            <td><a href="<?= URL?>Cate/update/<?= $cate['id'] ?? ''?>">Update</a></td>
            <td><a onclick="return confirm('Are you sure?')" href="<?= URL?>Cate/delete/<?= $cate['id'] ?? ''?>">Delete</a></td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>