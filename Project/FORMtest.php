<?php
require 'database.php';
require 'sessions.php';

$number = $_GET['n'];
$query = "SELECT * FROM questions WHERE question_number = $number";
$result = $conn->query($query) ;
$rows = $result->fetch_assoc();


$query2 = "SELECT * FROM choices WHERE question_number = $number";
$result2 = $conn->query($query2) ;


$query3 = "SELECT * FROM questions";
  $result3 = $conn->query($query3);
  $total = $result3->num_rows;
  if($number==$total)
  {
    $msg = "View result";
  }
  else
    $msg= "Next Question";


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <style type="text/css">
    	h1, .ap {text-align: center;
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


      ul {list-style-type: none;}

		label,li { color: white; }
    </style>


</head>
<body>

	<h1>Aptitude Test</h1><br>
	<form method="POST" action="process.php">
  <label>
    <?php echo 'Q.'.$number.' '.$rows['text']?><br><br>
    <img src="<?php echo $number?>.jpg" height="250" width="250" class="img-rounded"/><br><br>
  </label>
		<div class="form-group">
    <ul>
      <?php while($rows2 = $result2->fetch_assoc()): ?>
        <li><input type="radio" name="choice" value="<?php echo $rows2['id']?>"> <label><?php echo $rows2['text']?></label></li>
      <?php endwhile; ?>
      
    </ul>
  	</div>
  	<button type="submit" class="btn btn-primary"><?php echo $msg; ?></button><br><br>
    <input type="hidden" name="number" value="<?php echo $number; ?>">
	</form>
  <p class="ap">Back to <a href="userhome.php">User Panel</a><br></p>
</body>
</html>



