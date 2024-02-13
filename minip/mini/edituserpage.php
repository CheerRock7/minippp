<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            max-width: 400px;
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
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        button.delete-btn {
            background-color: #f44336;
            color: white;
        }

        button.delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<?php
include 'config.php';

// Assuming you have a session started

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];

    // Fetch user details based on logged-in user ID
    $stmt = $conn->prepare("SELECT * FROM user_info WHERE id = ?");
    $stmt->bind_param("i", $loggedInUserId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
?>

        <h2>Edit User</h2>
        <form action="edituser_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Update User</button>
        </form>
<?php
    } else {
        echo "<p>User not found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>User not logged in.</p>";
}
?>

</body>
</html>
