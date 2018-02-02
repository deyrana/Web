<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

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

		.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}
    </style>
</head>
<body>
	<h1>User Home</h1><br>
  <h3>Welcome, 
  <?php
  require 'database.php';
  require 'sessions.php';
  $uid=$_SESSION['uid'];
  $query = "SELECT Name FROM user WHERE uid = $uid";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  echo $row['Name'];
  ?>
  </h3>
	<form>
		<ul class="tab-group">
        <li class="tab"><a href="update.php">Edit Info  <span class="glyphicon glyphicon-edit"></span></a></li>
        <li class="tab"><a href="test.php">Take Test <span class="glyphicon glyphicon-pencil"></span></a></li>
        <li class="tab"><a href="viewresult.php">View Result <span class="glyphicon glyphicon-list-alt"></span></a></li>
        <li class="tab"><a href="adminlogout.php">Logout <span class="glyphicon glyphicon-off"></span></a></li>
     </ul>
	</form>
</body>