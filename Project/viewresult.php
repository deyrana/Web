<?php
require 'database.php';
require 'sessions.php';

$uid = $_SESSION['uid'];

$query = "SELECT Name, Score FROM user WHERE uid = $uid";
$result = $conn->query($query) or die('Failed');
$rows = $result->fetch_assoc();

$query2 = "SELECT * FROM questions";
$result2 = $conn->query($query2);
$total = $result2->num_rows;

$percentage = ($rows['Score']*100)/$total;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <style type="text/css">
    	h3, h1, .ap {text-align: center;
    			font-family: algerian;
    			text-decoration: underline;
    	}

    	form {
  				background: rgba(19, 35, 47, 0.9); 
  				padding: 40px;
  				max-width: 600px;
  				margin: 40px auto;
  				border-radius: 4px;
  				box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
			}

		label,li { color: white; }
    </style>
</head>
<body>
	<h1>Test Result</h1><br>
  <h3>Here's your result, <?php echo $rows['Name']; ?></h3><br>
	<form method="POST" action="viewresult.php">

      <label>Report card</label><br><br>
      <label><p>Final Score: <?php echo $rows['Score']; ?>/<?php echo $total;?></p></label><br>
      <label><p>Percentage Secured: <?php echo $percentage; ?> %</p></label><br><br>

	</form>
  <p class="ap">Back to <a href="userhome.php">User Panel</a><br></p>
</body>
</html>
