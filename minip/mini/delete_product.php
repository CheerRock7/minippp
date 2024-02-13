<?php
// Include config file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $id = $_POST['id'];

    // Delete product from database
    $stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Product deleted successfully!</div>";
        sleep(1);
        header('Location: index.php');
    } else {
        echo "<div class='alert alert-danger'>Failed to delete product. Please try again.</div>";
        sleep(1);
        header('Location: setting.php');
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(function (form) {
            form.addEventListener('submit', function (event) {
                var confirmed = confirm('Are you sure you want to delete this product?');
                
                if (!confirmed) {
                    event.preventDefault(); // ยกเลิกการยื่นฟอร์มถ้ายืนยันไม่ใช่
                }
            });
        });
    });
</script>
