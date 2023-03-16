<?php require_once "./app/Views/client/layout/Pages/header.php";?>
<div class="div-container-cart">
    <div class="div-main-cart">
        <table class="table-cart">
            <!-- <tr>
                <th>Tên Sách</th>
                <th></th>
                <th>Price</th>
            </tr> -->
            <thead class="thead-cart">Giỏ hàng của:</thead>
            <tr>
                <td class="td-cart"></td>
                <td class="td-cart">Tên sách</td>
                <td class="td-cart">Tác giả</td>
                <td class="td-cart">Gía</td>
                <td class="td-cart">Ngày mua</td>
                <td class="td-cart">Số lượng</td>
                <td class="td-cart">Ảnh</td>
            </tr>
            <tr class="tr-cart">
                
                <td class="td-cart"><button class="deleteBtn">Xóa</button></td>
                <td class="td-cart">Tích cực có chừng mực</td>
                <td class="td-cart">Magenlan</td>
                <td class="td-cart">120.000₫</td>
                <td class="td-cart">22/12/2202</td>
                <td class="td-cart">  <form action="" class="quantity" method="post">
                                        
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="subtracts"></button>
                                        <input type="number" value="1" style="-webkit-appearance: none;" min="1" name="quantity">
                                          <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>  
                                          <button class="updateBtn">Update</button></td>
                                        </form>
                <td class="td-cart">Ở đây có ảnh</td>
            </tr>
            <button class="button-paying">Thanh toán</button>
        </table>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php";?>