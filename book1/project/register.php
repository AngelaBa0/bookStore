<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") ;

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php'); /*This line sends an HTTP header to redirect the user to the "login.php" page after successful registration*/ 
      }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   } 
   /* creates a div and prints a message on the top of the page ( if it is available) 
    with an x near it . if the user clicks it the div will be deleted*/ 
}
?>

<div class="container">
      <div class="forms-container">
        <div class="signin-signup">

        <form action="" method="post">
          <!-- sends the data encrypted to the html (post)   -->
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Username" class="box" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" class="box"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" class="box" />
            </div>
         <br> 

            <select name="user_type" class="box">
              <option value="user">user</option>
              <option value="admin">admin</option>
           </select>
          
            <input type="submit" name="submit" value="Sign Up" class="btn solid" />

          
          </form>
        </div>   </div>
      </div>
</body>
</html>