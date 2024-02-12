<?php
	include 'config.php';
  
  session_start();
	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' />
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      padding-top: 50px;
    }

    #order {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .jumbotron {
      background-color: #f8d7da;
      border-radius: 10px;
    }

    .form-control {
      margin-bottom: 10px;
    }

    select {
      margin-bottom: 15px;
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }
  </style>

</head>

<body>
<?php include 'component/header.php';?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">การชำระเงิน!!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>จำนวนสินค้า : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>ค่าบริการส่ง : </b>Free</h6>
          <h5><b>ยอดชำระรวม : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="กรอกชื่อ" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="กรอกอีเมล" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="กรอกเบอร์โทรศัพท์" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="กรอกที่อยู่"></textarea>
          </div>
          <h6 class="text-center lead">เลือกช่องทางชำระเงิน</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">              <option value="" selected disabled>-เลือกช่องทางชำระเงิน-</option>
              <option value="cod">เก็บเงินปลายทาง</option>
              <option value="netbanking">ธนาคาร</option>
              <option value="cards">บัตรเครดิต</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="สั่งสินค้า" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>

</body>

</html>