<?php
// Include config file
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    // Assuming you have a 'product_image' folder to store uploaded images
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    $product_image = $target_file;
    $product_qty = $_POST['product_qty'];
    $product_code = $_POST['product_code'];

    // Upload image
    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        // Insert product into database
        $stmt = $conn->prepare("INSERT INTO product (product_name, product_price, product_image, product_qty, product_code) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $product_name, $product_price, $product_image, $product_qty, $product_code);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Product uploaded successfully!</div>";
            sleep(1);
            header('Location: index.php');
        } else {
            echo "<div class='alert alert-danger'>Failed to upload product. Please try again.</div>";
            sleep(1);
            header('Location: setting.php');
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
        sleep(1);
        header('Location: setting.php');
    }
}

// Display cart item count
if(isset($_GET['cartItem'])) {
    $stmt = $conn->prepare("SELECT * FROM cart");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;
    echo $rows;
}
?>