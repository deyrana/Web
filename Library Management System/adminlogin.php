<?php
ob_start();
@session_start();
require 'database.php';

if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(!empty($username) && !empty($password))
	{
		$query = "SELECT * FROM admin WHERE username = '$username'";
		if($result = $conn->query($query))
		{
			$num_col = count($result);
			if($num_col == 0)
				echo "<script>alert('Invalid username/password');</script>";
			else if($num_col == 1)
			{
				$row = $result->fetch_assoc();
				if($password == $row['password'])
				{
					$_SESSION['adid'] = $row['id'];
					header('Location: admindashboard.php');
				}
				else
					echo "<script>alert('Invalid username/password');</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('Please fill all the fields')</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sidebar.css">

    <style type="text/css">
    	h1,h4 {text-align: center;
    			font-family: algerian;
    			text-decoration: underline;
    	}

      h3{text-align: center;}

    </style>
</head>

<body>

<?php require 'header.php' ?>



	<h1>Admin Login</h1><br><br>
	<div id='wrapper'>
		
<!--Page content-->
<div id='page-content-wrapper'>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"><br><br>
			</div>

			<div class="col-md-6">
      <div class="panel panel-info">
      <div class="panel-heading"><h3>LOGIN</h3></div>
			<div class="panel-body">
				<form method="POST" action="adminlogin.php">
					  
  					<div class="form-group">
    				<label for="username">Username:</label>
    				<input type="text" class="form-control" name="username" placeholder="Enter Username here" required autocomplete="off">
  					</div>
 					
  					<div class="form-group">
    				<label for="pwd">Password:</label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password here" required autocomplete="off">
  					</div>
  					
  					
  					<button type="submit" class="btn btn-info">Login</button>
				</form>
        </div>
        </div>
			</div>
		</div>
	</div>
</div>
</div>
</body>

