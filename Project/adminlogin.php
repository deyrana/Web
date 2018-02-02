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
    	h1,h3,.msg {text-align: center;
    			font-family: algerian;
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

<nav class='navbar navbar-default'>
	<div class="container-fluid">

	<div class="navbar-head">
		<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#mnavbar'>
			 <span class="glyphicon glyphicon-list"></span>
		</button>
		<a href="#" class="navbar-brand">Paath$hala</a>
	</div>

	<div class="collapse navbar-collapse" id="mnavbar">
		<ul class='nav navbar-nav'>
			<li><a href="home.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
			<li  class='active'><a href="adminlogin.php">Admin Login  <span class="glyphicon glyphicon-wrench"></span></a></li>
			<li><a href="userlogin.php">User Login  <span class="glyphicon glyphicon-user"></span></a></li>
		</ul>

		</ul>
	</div>
	</div>
</nav>



<h1>Admin Login</h1><br>
<div id='wrapper'>
		
<!--Page content-->
			<p class="text-right"><h3>Login Here</h3></p>
				<form method="POST" action="adminlogin.php">
  					<div class="form-group">
    				<label for="username">Username:</label>
    				<input type="text" class="form-control" name="username" placeholder="Enter Username here">
  					</div>
 					
  					<div class="form-group">
    				<label for="pwd">Password:</label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password here">
  					</div>
  				 	<button type="submit" class="btn btn-primary">Login</button>
				</form>
				<div class="msg">Go to <a href="home.php">Home</a></div>
		</div>
	</div>
</div>
</div>
</body>






<?php
require 'database.php';
require 'sessions.php';

if(isset($_POST["username"]) && isset($_POST["password"]))
{
	if (!empty($_POST["username"]) && !empty($_POST["password"])) 
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$query = "SELECT * FROM admin WHERE  Username = '$username'";
		if($result = $conn->query($query))
		{
			$num_col = count($result);
			if($num_col==0)
				echo 'Admin doesn\'t exists';
			else if($num_col== 1)
			{
				$row = $result->fetch_assoc();					
				if( $password == $row["Password"] )																			
				{
					$aid = $row["aid"];
					$_SESSION['aid'] = $aid; 
					header('Location: adminhome.php');
				}
				else
					echo "<script>alert('Wrong password');</script>";
			}
		}
	}
	else
	{	
		echo "<script>alert('Please enter all the fields');</script>";
	}
}
?>
