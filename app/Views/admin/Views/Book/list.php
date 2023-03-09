
<a href="<?= URL?>Book/new">Thêm Mới</a>
<h1>List Book</h1>
<table style="width: 100%;">
    <thead style="background-color: palevioletred;">
        <tr>
            <th>ID</th>
            <th>CateName</th>
            <th>Name</th>
            <th>Image</th>
            <th>Author</th>
            <th>Price</th>
            <th>Description</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($data['books']) > 0) : ?>
            <?php foreach($data['books'] as $book):?>
                <tr>
                    <td><?= $book['id'] ?? ''?></td>
                    <td><?= $book['cateID'] ?? ''?></td>
                    <td><?= $book['bookName'] ?? ''?></td>
                    <td><img src="./Public/upload/<?= $book['image']?>" alt="." style="width: 120px;"></td>
                    <td><?= $book['author'] ?? ''?></td>
                    <td><?= $book['price'] ?? ''?></td>
                    <td><?= $book['description'] ?? ''?></td>
                    <td><a href="<?= URL?>Book/update/<?= $book['id']?>">Update</a></td>
                    <td><a onclick="return confirm('Are you sure?')" href="<?= URL?>Book/delete/<?= $book['id']?>">Delete</a></td>
                </tr>
                <?php endforeach?>
        <?php else: ?>
            <div>Nothing</div>
            <?php endif?>
    </tbody>
</table>