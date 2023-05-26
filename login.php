<?php
  session_start();

  if (isset($_SESSION['email'])) {
      header("Location:general advisory.php");
  }

  // Include database connectivity
    
  include_once('config.php');
  
  if (isset($_POST['submit'])) {

      $errorMsg = "";

      $email    = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['password']); 
      $hash=md5($password);
      
  if (!empty($email) || !empty($password)) {
        $query  = "SELECT email,password FROM users WHERE email = '$email' and password='$hash'";
        $result = mysqli_query($con, $query);


        if(mysqli_num_rows($result) == 1){
          $_SESSION['email'] = $email;
                header("Location:general advisory.php");
            }else{
                $errorMsg = "Email or Password is invalid";
            }    
          }
        }
?>

<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:50px">
<h1 style="text-align: center;">LOGIN</h1><br>
  <div class="row">
     <div class="col-md-4"></div>
      <div class="col-md-4" style="margin-top:20px">
        <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        $errorMsg
                      </div>";
            }
        ?>
        <form action="" method="POST">
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <p>Are you new user? <a href="signup.php">Sign Up</a></p>
          <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Login">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
