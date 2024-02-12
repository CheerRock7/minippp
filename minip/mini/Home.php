<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:./auth/login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:./auth/login.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PPK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
  <?php include 'component/header.php';?>
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel" data-bs-interval="3000" >
        <div class="carousel-indicators">
          <li type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
          <li type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></li>
          <li type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></li>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image/banner1.jpg" class="d-block w-100" alt="img" ">
          </div>
          <div class="carousel-item">
            <img src="image/banner2.jpg" class="d-block w-100" alt="img" ">
          </div>
          <div class="carousel-item">
            <img src="image/banner3.jpg" class="d-block w-10" alt="img" ">
          </div>
        </div>
      </div>

  <?php include 'component/New.php';?>

  <?php include 'component/nav_setting.php';?>

  <?php include 'component/footer.php';?>
</body>

</html>

