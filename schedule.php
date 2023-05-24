<?php
  include ('config.php');
	session_start();

  $e = $_SESSION['email'];

	$query = "SELECT * FROM advisor  WHERE email = '$e'";
	$result = mysqli_query($con , $query);
	while($row=mysqli_fetch_object($result)){
		$name = $row -> fullname;
	}
  if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $meeting_link = mysqli_real_escape_string($con,$_POST['meeting_link']);
    $daytime = mysqli_real_escape_string($con,$_POST['daytime']);
    $scheduled_by = mysqli_real_escape_string($con,$_POST['scheduled_by']);

    $query = "INSERT INTO group_meeting(title,meeting_link,daytime,scheduled_by)
    VALUES('$title','$meeting_link','$daytime','$scheduled_by')";
    
    $result = mysqli_query($con,$query);

    if($result==true){
      header("Location:advisor_login.php");
    }
    
    

  }
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {
			background-color: #222222;
			color: #ffffff;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		
		#calendar {
			margin: 50px auto;
			max-width: 800px;
			border: 1px solid #ffffff;
			padding: 20px;
			box-sizing: border-box;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: flex-start;
		}
		
		#calendar .event {
			background-color: #ffffff;
			color: #222222;
			padding: 10px;
			margin-bottom: 10px;
			box-sizing: border-box;
			flex-basis: calc(33.33% - 10px);
		}
		
		#new-event {
			margin: 50px auto;
			max-width: 800px;
			border: 1px solid #ffffff;
			padding: 20px;
			box-sizing: border-box;
		}
		
		label {
			display: block;
			margin-bottom: 10px;
		}
		
		input[type="text"] {
			width: 100%;
			padding: 10px;
			box-sizing: border-box;
			margin-bottom: 20px;
			font-size: 16px;
			border: none;
			border-bottom: 1px solid #ffffff;
			background-color: transparent;
			color: #ffffff;
		}
		
		button {
			background-color: #ffffff;
			color: #222222;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}
		
		@media screen and (max-width: 768px) {
			#calendar {
				max-width: 90%;
			}
			
			#calendar .event {
				flex-basis: calc(50% - 10px);
			}
		}
		
		@media screen and (max-width: 480px) {
			#calendar {
				max-width: 100%;
			}
			
			#calendar .event {
				flex-basis: calc(100% - 10px);
			}
			
			#new-event {
				max-width: 90%;
			}
		}
	</style>
</head>
<body>
	<h1>Advisor</h1>
	
	<div id="calendar"></div>
	
	<div id="new-event">
		<h2>Schedule a New Meeting</h2>
		
		<form method= "post">
			<label for="title">Title</label>
			<input type="text" id="title" name="title">
			
			<label for="link">Meeting link</label>
			<input type="text"  name="meeting_link">
			
			<label for="date">Date</label>
			<input type="datetime-local" id="date" name="daytime">

			
            <input type="hidden" name="scheduled_by" value = "<?php echo $name; ?>">
           
			
			<button type="submit" name="submit">Submit</button>
		</form>
	</div>
	
	<script src="script.js"></script>
	
	<!-- Displays each scheduled meeting at the bottom -->
	<script>
		// sample meetings data
		const meetings = [
			{
				title: "Meeting 1",
				date: "2023-03-20"
			},
		]
