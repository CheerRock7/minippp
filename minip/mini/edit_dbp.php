<?php
// Include config file
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $id = $_POST['id']; // Assuming you have a hidden input field for the product ID
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];
    $product_code = $_POST['product_code'];

    // Check if a new image is uploaded
    if (!empty($_FILES["product_image"]["name"])) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $product_image = $target_file;

        // Upload image
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            // Update product with new image
            $stmt = $conn->prepare("UPDATE product SET product_name=?, product_price=?, product_image=?, product_qty=?, product_code=? WHERE id=?");
            $stmt->bind_param("sssssi", $product_name, $product_price, $product_image, $product_qty, $product_code, $id);
        } else {
            echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
            sleep(1);
            header('Location: setting.php');
            exit(); // Terminate the script to prevent further execution
        }
    } else {
        // No new image, update product without changing the image
        $stmt = $conn->prepare("UPDATE product SET product_name=?, product_price=?, product_qty=?, product_code=? WHERE id=?");
        $stmt->bind_param("ssssi", $product_name, $product_price, $product_qty, $product_code, $id);
    }

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Product updated successfully!</div>";
        sleep(1);
        header('Location: index.php');
    } else {
        echo "<div class='alert alert-danger'>Failed to update product. Please try again.</div>";
        sleep(1);
        header('Location: setting.php');
    }
    $stmt->close();
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