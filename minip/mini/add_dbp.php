<?php

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "milk_db");

// ตรวจสอบว่ามีการ submit ข้อมูล
if (isset($_POST["product_name"])) {

    // เก็บข้อมูลจากฟอร์ม
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_qty = $_POST["product_qty"];
    $product_code = $_POST["product_code"];


    // อัพโหลดรูปภาพ
if (isset($_FILES["product_image"])) {
    $product_image = $_FILES["product_image"]["name"];
    $tmp_name = $_FILES["product_image"]["tmp_name"];
    $upload_dir = "../mini/image/";

    if (move_uploaded_file($tmp_name, $upload_dir . $product_image)) {
        // เขียน SQL
        $sql = "INSERT INTO product (product_name, product_price, product_qty, product_code, product_image) VALUES ('$product_name', '$product_price', '$product_qty', '$product_code', '$product_image')";

        // เรียกใช้ SQL
        $conn->query($sql);

        // แสดงข้อความแจ้งเตือน
        echo "<p>เพิ่มสินค้าเรียบร้อยแล้ว</p>";
        sleep(1);
        header('Location: index.php');
    } else {
        echo "<p>มีข้อผิดพลาดในการอัพโหลดรูปภาพ</p>";
    }
} else {
    $product_image = "";
}
    // อัพโหลดรูปภาพ
  if (isset($_FILES["product_image"])) {
      $product_image = $_FILES["product_image"]["name"];
      $tmp_name = $_FILES["product_image"]["tmp_name"];
      move_uploaded_file($tmp_name, "../mini/image/" . $product_image);
   } else {
       $product_image = "";
   }

    // เขียน SQL
    $sql = "INSERT INTO product (product_name, product_price, product_qty, product_code, product_image) VALUES ('$product_name', '$product_price', '$product_qty', '$product_code', '$product_image')";

    // เรียกใช้ SQL
    $conn->query($sql);

    // แสดงข้อความแจ้งเตือน
    echo "<p>เพิ่มสินค้าเรียบร้อยแล้ว</p>";;
    sleep(1);
    header('Location: index.php');
}

?>