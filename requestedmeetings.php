<?php
    include ('config.php');
    session_start();
  
    $e = $_SESSION['email'];
  
    $query = "SELECT * FROM users  WHERE email = '$e'";
    $result = mysqli_query($con , $query);
    while($row=mysqli_fetch_object($result)){
      $name = $row -> fullname;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $name; ?></title>
  <style>
    body {
      background-color: #222222;
      color: white;
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 1.4;
      margin: 0;
      padding: 0;
    }
    h1 {
      text-align: center;
      padding: 20px 0;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    .request {
      margin: 10px 0;
      padding: 10px;
      background-color: green;
      color: black;
      border-radius: 10px;
      display: flex;
      flex-direction:column;
      align-items: center;
    }
    .request p {
      flex: 1;
      margin: 0;
      padding: 0;
      font-size: 18px;
      font-weight: bold;
    }
    .request label {
      margin: 0;
      padding: 0;
      font-size: 16px;
      font-weight: normal;
      margin-left: 10px;
    }
    .request input[type="checkbox"] {
      margin-right: 10px;
    }
    .reply-form {
      margin: 20px 0;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
    }
    .reply-form label {
      margin-right: 10px;
      font-size: 18px;
      font-weight: bold;
    }
    .reply-form input[type="text"] {
      flex: 1;
      padding: 5px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
    }
    .reply-form input[type="submit"] {
      padding: 5px 20px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      background-color: black;
      color: white;
      cursor: pointer;
    }
    .reply-form:nth-of-type(odd) {
      background-color: #555;
    }
  </style>
</head>
<body>
  
    <h1>Requested meetings</h1>
    <div class="container">
      <div class="request">
        <?php
         $getpost = mysqli_query($con, "SELECT * FROM private_meeting");
         while($row1=mysqli_fetch_array($getpost)){
           ?>

          <p>Title: <?php echo $row1['title']; echo "  ";echo $row1['daytime'];?></p>
          <p>Description: <?php echo $row1['descr']; ?></p>
          <p>Day and date: <?php echo $row1['daytime']; ?></p>
          <p>Requested by: <?php echo $row1['request_from']; ?></p>
          <hr></hr>
         <?php
         }
        ?>
        <label>
          <input type="checkbox" name="confirmed"> Confirm
        </label>
      </div>
    </div>
    <hr></hr>
   
      
    

</body>
</html>