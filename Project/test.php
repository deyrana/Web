<?php
require 'database.php';
require 'sessions.php';

if (isset($_SESSION['uid']) && !empty($_SESSION['uid']))
{
	$query = "SELECT * FROM questions";
	$result = $conn->query($query);
	$total = $result->num_rows;


?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">
    	h1, h2, .ap {text-align: center;
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

		label,ul { color: white; }
    </style>
</head>
<body>
	<h1>Game Of Thrones Quizzer</h1>
	<h2>INSTRUCTIONS</h2>
	<form>
		<label>Test Your GoT Knowledge</label>
		<ul>
			<li>Number of Questions: <?php echo $total ?></li>
			<li>Type: Multiple Choice</li>
			<li>Estimated time: <?php echo $total ?> minutes</li><br>
		</ul>
		<button type="submit" class="btn btn-primary"><a href="FORMtest.php?n=1"><label>Start Quiz</label></a></button><br><br>
	</form>
</body>
</html>

<?php
}
else
{
	echo '<script>alert("You need to login first.");</script>';
}

?>