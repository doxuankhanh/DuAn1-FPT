<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  margin: 0 auto;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
#payment-online input[type="number"] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
}
</style>
<script>
    $(document).ready(function(){
        let screen = $(document).width();
        let form = $("#payment-online").width();
        let wMargin = (screen - form)/2;
        $("#payment-online").css({"margin": "0 " + wMargin + "px"});
    });
</script>
<?php $total = 0;
    foreach ($data['carts'] as $key => $value) {
        $subtotal = ($value['quantity'] * $value['price']);
        $total += $subtotal;
    }
?>
<div class="row">   
  <div class="col-100">
    <div class="container" id="payment-online">
      <form action="<?= URL ?>Home/paymentOnline" method="post">
        <div class="row">
          <div class="col-50">
            <h3>Thanh toán online</h3>
            <?php if(isset($data['errorMessage'])): ?>
                <label style="color: red;"><?= $data['errorMessage'] ?></label>
            <?php endif; ?>
            <label>Số tiền cần thanh toán</label>
            <label><?= number_format($total) ?> VNĐ</label>
            <label for="fname">Loại thẻ chấp nhận thanh toán</label>
            <div class="icon-container">
              <i class="fa-brands fa-cc-visa" style="color:navy;"></i>
              <i class="fa-brands fa-cc-amex" style="color:blue;"></i>
              <i class="fa-brands fa-cc-mastercard" style="color:red;"></i>
              <i class="fa-brands fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Họ tên chủ thẻ(*)</label>
            <input type="text" id="cname" name="cardname" value="<?php echo isset($_POST['cardname']) ?  $_POST['cardname'] : ''?>" placeholder="Nguyen Van A">
            <label for="ccnum">Số thẻ(*)</label>
            <input type="text" id="ccnum" name="cardnumber" value="<?php echo isset($_POST['cardnumber']) ?  $_POST['cardnumber'] : '' ?>" placeholder="1111222233334444">
            <label for="expmonth">Tháng hêt hạn của thẻ(*)</label>
            <input type="number" id="expmonth" name="expmonth" value="<?php echo isset($_POST['expmonth']) ?  $_POST['expmonth'] : ''?>" placeholder="5" maxlength="2">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Năm hết hạn của thẻ(*)</label>
                <input type="number" id="expyear" name="expyear" value="<?php echo isset($_POST['expyear']) ?  $_POST['expyear'] : ''?>" placeholder="2018" maxlength="4">
              </div>
              <div class="col-50">
                <label for="cvv">CVV(*)</label>
                <input type="text" id="cvv" name="cvv" value="<?php echo isset($_POST['cvv']) ?  $_POST['cvv'] : ''?>" placeholder="352" maxlength="3">
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" value="Thanh toán" class="btn" name="payment">
      </form>
    </div>
  </div>
</div>
                        </table>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>