<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    
</head>
<body>
    <?php include 'add_dbp.php';?>

    <h1>เพิ่มสินค้า</h1>
    <form action="add_dbp.php" method="post" enctype="multipart/form-data">
        <label for="product_name">ชื่อสินค้า:</label>
        <input type="text" name="product_name" id="product_name" required>
        <br>
        <label for="product_price">ราคาสินค้า:</label>
        <input type="number" name="product_price" id="product_price" required>
        <br>
        <label for="product_image">รูปภาพสินค้า:</label>
        <input type="file" name="product_image" id="product_image">
        <br>
        <label for="product_qty">จำนวนสินค้า:</label>
        <input type="number" name="product_qty" id="product_qty" required>
        <br>
        <label for="product_code">รหัสสินค้า</label>
        <input type="text" name="product_code" id="product_code" required>
        <br>
        <input type="submit" value="เพิ่มสินค้า">
    </form>
</body>
</html>