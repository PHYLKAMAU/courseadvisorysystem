<?php
  include ('config.php');
	session_start();

  $e = $_SESSION['email'];

	$query = "SELECT * FROM users  WHERE email = '$e'";
	$result = mysqli_query($con , $query);
	while($row=mysqli_fetch_object($result)){
		$name = $row -> fullname;
	}
  if(isset($_POST['request_meet'])){
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $daytime = mysqli_real_escape_string($con,$_POST['daytime']);
    $request_from = mysqli_real_escape_string($con,$_POST['request_from']);

    $query = "INSERT INTO private_meeting(title,descr,daytime,request_from)
    VALUES('$title','$description','$daytime','$request_from')";
    
    $result = mysqli_query($con,$query);

    if($result==true){
      header("Location:login.php");
    }
    
    

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?></title>
    <link rel="stylesheet" href="general.css">
</head>
<body>
    <div class="links">
        <ul>
          <li><a href="#">join us</a></li>
          <li><a href="#">students</a></li>
          <li><a href="#">staff</a></li>
          <li><a href="#">procurement</a></li>
          <li><a href="#">careers </a></li>
          <li>donate</li>
          <li>alumni</li>
        </ul>
      </div>
      <header>
        <div class="logo">
          <img itemprop="image" src="https://www.must.ac.ke/wp-content/uploads/2022/07/logo4_png_version.fw_.png" 
          width="360" height="100" alt="Mobile Logo">
        </div>
        <nav >
          <div class="nav-links">
            <ul>
              <li><a href="homepagelogin.php">home</a></li>
              <li><a href="#">about must</a></li>
              <li><a href="#">academic</a></li>
              <li><a href="#">programs</a></li>
              <li><a href="#">research</a></li>
              <li><a href="#">library</a></li>
              <li><a href="#">E-learnig</a></li>
              <li><a href="#">services</a></li>
            </ul>
          </div>
        </nav>
      </header>
    
      <section class="hero">
        <div class="booking">
          <form action="" method="post">
            <h3>private meeting</h3>
            <div class="meet_title">
              <label for="title">Title</label>
              <input type="text" name = "title" placeholder = "Title">
            </div>
            <div class="describe">
              <label for="decription">Description</label>
              <textarea name="description" id="" cols="30" rows="10" placeholder=" brief meeting description"></textarea>
            </div>
           <div class="time">
            <label for="time">Day and Time</label>
            <input type="datetime-local" name="daytime" placeholder="date and time" id="">
           </div>
           <div class="hidden">
            <input type="hidden" name="request_from" value = "<?php echo $name; ?>">
           </div>
           <div class="btn">
            <input type="submit" name="request_meet" id="btn">
           </div>
            
            
          </form>
        </div>
        

          
         
    

        <div class="up-coming">
          <p>up coming events</p>
          <ul id="upComing">
            <li><a href="#"> <?php
         $getpost = mysqli_query($con, "SELECT * FROM `group meeting`");
         while($row1=mysqli_fetch_array($getpost)){
           ?>

          <p>Title: <?php echo $row1['title']; echo "  ";echo $row1['daytime'];?></p>
          <p>meeting link:<a> <?php echo $row1['meeting_link']; ?></a></p>
          <p>Day and date: <?php echo $row1['daytime']; ?></p>
          <p>scheduled by: <?php echo $row1['scheduled_by']; ?></p>
          <hr></hr>
         <?php
         }
        ?></a></li>
            <!--<li><a href="#">Computer science class meeting <br> date 25-04-2023 time 1600h</a></li>
            <li><a href="#">Computer science course advisory <br> date 25-04-2023 time 1600h</a></li>
        -->
            
          </ul> 
        </div>
        <div class="btn"><button onclick="location.href='logout.php'">logout</button></div>
        
      </section>
      <script src="general4.js"></script>
    
</body>
</html>