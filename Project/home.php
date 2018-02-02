<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paath$hala</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sidebar.css">

    <style type="text/css">
    	h1,h3,h4 {text-align: center;
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
		label, .msg { color: white; }
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
			<li class='active'><a href="#">Home <span class="glyphicon glyphicon-home"></span></a></li>
			<li ><a href="adminlogin.php">Admin Login  <span class="glyphicon glyphicon-wrench"></span></a></li>
			<li ><a href="userlogin.php">User Login  <span class="glyphicon glyphicon-user"></span></a></li>
		</ul>

		</ul>
	</div>
	</div>
</nav>



	<h1>WELCOME TO PAATH$HALA.COM</h1><br><br>
	<div id='wrapper'>
		
<!--Page content-->
<div id='page-content-wrapper'>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6"><br><br>
				<div class="well well-lg">
					<p>
					<h4>NOTICE</h4>
						Welcome to PAATH$HALA.COM. This is a FREE Website. You can take test to check your Knowledge. For that you need to register first. If you are an existing user, please login to continue. If you score more, you are surely knowledgeable. If you score less, then you are a piece of shit. ;-P<br><br>
            - Developer.
					</p>
				</div>
			</div>

			<div class="col-md-6">
			<p class="text-right"><h3>REGISTRATION</h3></p>
				<form method="POST" action="register.php">
					  <div class="form-group">
    				<label for="name">Name:</label>
    				<input type="text" class="form-control" name="name" placeholder="Enter name here" required autocomplete="off">
  					</div>
  					<div class="form-group">
    				<label for="username">Username:</label>
    				<input type="text" class="form-control" name="username" placeholder="Enter Username here" required autocomplete="off">
  					</div>
 					<div class="form-group">
    				<label for="email">Email address:</label>
    				<input type="email" class="form-control" name="email" placeholder="Enter email here" required autocomplete="off">
  					</div>
  					<div class="form-group">
    				<label for="pwd">Password:</label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password here" required autocomplete="off">
  					</div>
  					<div class="form-group">
  					<label for="sex">Gender:</label>
  					<select name="sex">
  						<option value="m">Male</option>
  						<option value="f">Female</option>
  						<option value="oth">Others</option>
  					</select>
  					</div>
  					<p class="msg">Already a user? <a href="userlogin.php">Login</a> here</p><br>
  					
  					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</body>

