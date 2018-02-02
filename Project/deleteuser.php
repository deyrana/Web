<?php
require 'database.php';
require 'sessions.php';

if (isset($_SESSION['aid']) && !empty($_SESSION['aid'])) 
{
	$query2 = "SELECT * FROM user";
	$result2 = $conn->query($query2);
	$total =  $result2->num_rows;
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
  				max-width: 1000px;
  				margin: 40px auto;
  				border-radius: 4px;
  				box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
			}

		label,li { color: white; }
    </style>
</head>
<body>
	<h1>Delete User</h1><br>
	<h3>Here's a list of all the students who have taken the test</h3><br>
	<div class="col-md-3"></div>
	<div class="col-md-8">
    <form method="POST" action="deleteuser.php">
    <div class="form-group">
    	<label>Select any one of these student : </label>
    	<select name="Names" class="form-control">
    	<?php while($rows = $result2->fetch_assoc()): ?>
        	<option value="<?php echo $rows['uid'] ?>"><?php echo $rows['Name'] ?></option>
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
if(isset($_POST['Names']) && !empty($_POST['Names']))
{
	$n = $_POST['Names'];
	$query = "DELETE FROM user WHERE uid = $n";
	$result = $conn->query($query) or die('failed');
	for ($i=$n+1; $i<=$total; $i++)
	{ 
		$query3 = "UPDATE user SET uid = $i-1 WHERE uid = $i ";
		$result3 = $conn->query($query3) or die('updation failed');
	}
	echo '<script> alert("success"); </script>';
}
}
else
	echo 'You are not logged in';
?>



