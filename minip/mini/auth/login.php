<?php

include dirname(__FILE__) . '/../config.php';
session_start();

$message =[];

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
    header('location:../Home.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   

   <style>
body {
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   margin: 0;
   padding: 0;
   background-color: #f5f5f5;
}

.form-container {
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding: 20px;
   padding-bottom: 70px;
}

.form-container form {
   width: 400px;
   border-radius: 8px;
   border: 2px solid #3498db;
   padding: 30px;
   text-align: center;
   background-color: #fff;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-container form h3 {
   font-size: 24px;
   margin-bottom: 20px;
   text-transform: uppercase;
   color: #333;
}

.form-container form .box {
   width: calc(100% - 28px);
   border-radius: 5px;
   border: 2px solid #95a5a6;
   padding: 12px;
   font-size: 16px;
   margin: 10px 0;
}

.form-container form input[type="submit"] {
   background-color: #2ecc71;
   color: #fff;
   padding: 12px;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   font-size: 18px;
   transition: background-color 0.3s ease;
}

.form-container form input[type="submit"]:hover {
   background-color: #27ae60;
}

.form-container form p {
   margin-top: 20px;
   font-size: 18px;
   color: #333;
}

.form-container form p a {
   color: #e74c3c;
   text-decoration: none;
   font-weight: bold;
}

.form-container form p a:hover {
   text-decoration: underline;
}

.message {
   background-color: #e74c3c;
   color: #fff;
   padding: 10px;
   margin: 10px 0;
   border-radius: 4px;
   cursor: pointer;
}

.error-message {
   color: #e74c3c;
   margin-top: 10px;
}

   </style>


</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" required placeholder="enter email" class="box">
      <input type="password" name="password" required placeholder="enter password" class="box">
      <input type="submit" name="submit" class="btn" value="login now">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

</body>
</html>