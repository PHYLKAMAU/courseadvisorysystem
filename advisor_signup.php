<?php
  
  // Include database connectivity
      
  include_once('config.php');
  session_start();
  
  if (isset($_POST['submit'])) {
      
      $errorMsg = "";
      
      $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $email    = mysqli_real_escape_string($con, $_POST['email']);
      $school = mysqli_real_escape_string($con, $_POST['school']);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $hash= md5($password);
      
      $sql = "SELECT * FROM advisor WHERE email = '$email'";
      $execute = mysqli_query($con, $sql);
        
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorMsg = "Email in not valid try again";
      }else if(strlen($password) < 6) {
          $errorMsg  = "Password should be six digits";
      }else if($execute->num_rows == 1){
          $errorMsg = "This Email is already exists";
      }else{
          $query= "INSERT INTO advisor(fullname,username,email,school,password) 
                  VALUES('$fullname','$username','$email','$school','$hash')";
          $result = mysqli_query($con, $query);
      if ($result == true) {
          header("Location:advisor_login.php");
      }else{
          $errorMsg  = "You are not Registred..Please Try again";
      }
    }
  }

?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>sign up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:50px">
<h1 style="text-align:center;"> ADVISOR SIGNUP</h1><br>
  <div class="row">
    <div class="col-md-4"></div>
      <div class="col-md-4">
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
             <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="">
          </div>
          <div class="form-group">
             <input type="text" class="form-control" name="username" placeholder="Username" required="">
          </div>
          <div class="form-group">
             <input type="email" class="form-control" name="email" placeholder="Email" required="">
          </div>
          <div class="form-group">
            <select name="school" >
              <option value="">School</option>
              <option value="SAFS">School of Agriculture and Food Science</option>
              <option value="SED">School of Education</option>
              <option value="SON">School of Nursing</option>
              <option value="SBE">School of Business and Economics</option>
              <option value="SEA">School of Engineering and Architecture</option>
              <option value="SPAS">School of Pure and Applied Sciences</option>
              <option value="SCI">School of Computing and Informatics</option>
              <option value="SHS">School of Health Sciences</option>
              
            </select>
          </div>
          <div class="form-group">
             <input type="password" class="form-control" name="password" placeholder="Password" required="">
          </div>
          <p>If you have account <a href="login.php">Login</a></p>
          <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Sign Up">  
        </form>
      </div>
    </div>
  </div>
</body>
</html>