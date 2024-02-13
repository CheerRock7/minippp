<?php
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $user_id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']); // Use md5 to hash the password

    // Update user information in the database
    $stmt = $conn->prepare("UPDATE user_info SET name = ?, email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $email, $password, $user_id);

    if ($stmt->execute()) {
        echo "User information updated successfully.";
        sleep(1);
        header('Location:edituser.php');
    } else {
        echo "Error updating user information: " . mysqli_error($conn);
    }

    $stmt->close();
}

$conn->close();
?>
