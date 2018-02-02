<?php
require 'database.php';
require 'sessions.php';

$query = "SELECT * FROM questions";
$result = $conn->query($query);
$total = $result->num_rows;
$next = $total+1;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Home</title>
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

		label { color: white; }
    </style>
</head>
<body>
	<h1>Add Questions</h1><br>

	<form method="POST" action="addQ.php">
    <div class="form-group">
      <label for="quesno">Question Number: </label><br>
      <input type="number" name="question_number" value="<?php echo $next ?>">
    </div>
		<div class="form-group">
    	<label for="ques">Add The Question Here in not more than 200 words:</label>
    	<textarea class="form-control" name="question" placeholder="Enter Question here"></textarea>
  	</div>
  	<div class="form-group">
      <label>Choice #1: </label>
      <input type="text" name="choice1">
    </div>
    <div class="form-group">
      <label>Choice #2: </label>
      <input type="text" name="choice2">
    </div>
    <div class="form-group">
      <label>Choice #3: </label>
      <input type="text" name="choice3">
    </div>
    <div class="form-group">
      <label>Choice #4: </label>
      <input type="text" name="choice4">
    </div>
    <div class="form-group">
      <label>Correct Choice Number: </label>
      <input type="number" name="correct_choice">
    </div>
  	<button type="submit" name="submit" class="btn btn-primary">Add</button>
	</form>
  <p class="ap">Back to <a href="adminhome.php">Admin Panel</a><br></p>
</body>