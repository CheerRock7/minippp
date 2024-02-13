<?php
include 'config.php';


if(isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    $query = "SELECT name FROM user_info WHERE id = $user_id";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['name'];
    } else {
        $username = "Guest";
    }
} else {
    $username = "Guest";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>PPK</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
<style>
    body{
        background : white;
    }
</style>
</head>
<body>

    <!-- Navbar start -->

    <nav class="navbar navbar-expand-md bg-white navbar-drak">
    <a class="navbar-brand text-dark" href="Home.php">
            <img src="image/logo.jpg" alt="logo" width="30" height="30" class="d-inline-block align-text-center ">
            PPK
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link animate__animated animate__fadeIn text-dark" href="index.php"><i class="fa-solid fa-tag mr-2"></i>Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animate__animated animate__fadeIn text-dark" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item dropdown">
        <!-- แสดง Dropdown สำหรับผู้ใช้ทั่วไปหรือ Guest -->
        <?php if ($username === "Guest"): ?>
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i> <?php echo $username; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="index.php?logout=<?php echo $username; ?>" onclick="return confirm('Are you sure you want to logout?');" class="dropdown-item delete-btn">Logout</a>
            </div>
        <?php endif; ?>
        <?php if ($username === "admin"): ?>
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i> <?php echo $username; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="setting.php">Add</a>
            <a class="dropdown-item" href="edit.php">Edit</a>
            <a class="dropdown-item" href="edituser.php">setting</a>
            <a class="dropdown-item" href="order.php">order</a>
            <hr class="dropdown-divider">
            <a href="index.php?logout=<?php echo $username; ?>" onclick="return confirm('Are you sure you want to logout?');" class="dropdown-item delete-btn">Logout</a>
        <?php else: ?>
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i> <?php echo $username; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="edituser.php">setting</a>
            <a href="index.php?logout=<?php echo $username; ?>" onclick="return confirm('Are you sure you want to logout?');" class="dropdown-item delete-btn">Logout</a>
        <?php endif; ?>
        </div>
        </li>
            </ul>
        </div>
    </nav>
        
</body>

</html>
