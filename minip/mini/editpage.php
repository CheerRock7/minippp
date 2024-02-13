<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 500px; /* หรือเลือกค่าที่เหมาะสมตามที่คุณต้องการ */
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input, button {
            margin-bottom: 15px;
            width: 100%; /* ทำให้ input และ button ทั้งหมดเต็ม width */
        }

        img {
            max-width: 200px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            width: 100%;

        }

        button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

button.delete-btn {
    background-color: #f44336; /* สีแดง */
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

button.delete-btn:hover {
    background-color: #d32f2f; /* สีแดงเข้ม */
}

    </style>
</head>
<body>

<h2>Search Product by ID</h2>
<form action="" method="get">
    <label for="search_id">Product ID:</label>
    <input type="text" name="id" id="search_id" required>
    <button type="submit">Search</button>
</form>

<?php
include 'config.php';

// Check if product ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details
    $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
?>

        <h2>Edit Product</h2>
        <form action="edit_dbp.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required>

            <label for="product_price">Product Price:</label>
            <input type="number" name="product_price" value="<?php echo $product['product_price']; ?>" required>

            <label for="product_qty">Product Quantity:</label>
            <input type="number" name="product_qty" value="<?php echo $product['product_qty']; ?>" required>

            <label for="product_code">Product Code:</label>
            <input type="text" name="product_code" value="<?php echo $product['product_code']; ?>" required>

            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image">

            <img src="<?php echo $product['product_image']; ?>" alt="Product Image" style="max-width: 200px;">

            <div class="button-container">
                <button type="submit">Update Product</button>

            </div>
        </form>
        <form action="delete_product.php" method="post" class="delete-form">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
</form>
<?php
    } else {
        echo "Product not found.";
    }

    $stmt->close();
}
?>

</body>
</html>