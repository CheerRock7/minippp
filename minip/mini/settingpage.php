<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
        <label for="product_code">รหัสสินค้า:</label>
        <input type="text" name="product_code" id="product_code" required>
        <br>
        <input type="submit" value="เพิ่มสินค้า">
    </form>
</body>
</html>
