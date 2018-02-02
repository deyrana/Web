<?php
require 'database.php';
require 'sessions.php';

if (isset($_SESSION['aid']) && !empty($_SESSION['aid'])) 
{
	$query = "SELECT * FROM questions";
	$result = $conn->query($query);
	$total =  $result->num_rows;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Question</title>
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
  				max-width: 1000px;
  				margin: 40px auto;
  				border-radius: 4px;
  				box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
			}

		label,li { color: white; }
    </style>
</head>
<body>
	<h1>Delete Question</h1><br>
	<h3>Here's a list of all the questions</h3><br>
	<div class="col-md-3"></div>
	<div class="col-md-6">
    <form method="POST" action="deleteques.php">
    <div class="form-group">
    	<label>Select any one of these questions : </label>
    	<select name="questions" class="form-control">
    	<?php while($rows = $result->fetch_assoc()): ?>
        	<option value="<?php echo $rows['question_number'] ?>"><?php echo $rows['text'] ?></option>
      	<?php endwhile; ?>
      	</select>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary">Delete</button>
    </div>
    </form>
    <br><p class="ap">Back to <a href="adminhome.php">Admin Panel</a><br></p>
    </div>
</body>
</html>







<?php
if(isset($_POST['questions']) && !empty($_POST['questions']))
{
	$q = $_POST['questions'];
	$query2 = "DELETE FROM questions WHERE question_number = $q";
	$result2 = $conn->query($query2);
	for($i=$q+1; $i<=$total; $i++)
	{ 
		$query3 = "UPDATE questions SET question_number = $i-1 WHERE question_number = $i ";
		$result3 = $conn->query($query3);
	}

  $query4 = "DELETE FROM choices WHERE question_number = $q";
  $result4 = $conn->query($query4) or die('4 failed');

  for($i=$q+1; $i<=$total ; $i++)
  {
    $query7 = "UPDATE choices SET question_number = $i-1 WHERE question_number = $i";
    $result7 = $conn->query($query7) or die('7 unsuccess');
  }



	echo '<script> alert("success"); </script>';
}
}
else
	echo 'You are not logged in';
?>



