<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADVISOR</title>
	<style>
		body {
			background-color: #222222;
		}
		h1 {
			text-align: center;
			color: white;
		}
		#button-container {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 100px;
		}
		#links {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		#links a {
			display: block;
			width: 200px;
			height: 200px;
			margin-bottom: 20px;
			background-color: black;
			color: white;
			text-align: center;
			line-height: 200px;
			font-weight: bold;
			border-radius: 10px;
			text-decoration: none;
			transition: background-color 0.3s ease;
		}
		#links a:hover {
			background-color: grey;
		}
	</style>
</head>
<body>
	<h1>ADVISOR</h1>
	<div id="links">
		<a href="schedule.php">Schedule A Meeting</a>
		<a href="requestedmeetings.php">Requested Meetings</a>
		<a href="edit.php">Edit Q&amp;A</a>
	</div>
</body>
</html>
