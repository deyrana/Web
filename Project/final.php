<?php
require 'database.php';
require 'sessions.php';

$uid = $_SESSION['uid'];

$score = $_SESSION['score'];
$query = "UPDATE user SET Score = $score WHERE uid = $uid ";
$result = $conn->query($query);

$query2 = "SELECT * FROM questions";
$result2 = $conn->query($query2);
$total = $result2->num_rows;

$percent = ($score*100)/$total;

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
    	h3, h1, .ap,h4 {text-align: center;
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
	<h1>Aptitude Test</h1><br>
  <h3>You are done!</h3><br>
  <?php 
  if($percent>=90){?>
  <h4>You know Everything, Jon Snow!!</h4>
  <?php
  }
  else if($percent>=50 && $percent<90){?>
  <h4>You are indeed the king of seven kingdoms!!</h4>
  <?php
  }
  else if($percent>=20 && $percent<50){?>
  <h4>Try hard to become a knight!!</h4>
  <?php
  }
  else{?>
  <h4>You are indeed Jon Snow :-P</h4>
  <?php } ?>

	<form method="POST" action="process.php">

      <label>You have completed your quiz</label><br><br>
      <label><p>Final Score: <?php echo $_SESSION['score']?>/<?php echo $total;?></p></label><br><br>
      <button type="submit" class="btn btn-primary" name="final_submit"><a href="FORMtest.php?n=1"><label>Retake Quiz</label></a></button><br><br>

	</form>
  <p class="ap">Back to <a href="userhome.php">User Panel</a><br></p>
  }
</body>
</html>
