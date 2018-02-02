<?php
require 'database.php';
require 'sessions.php';

if(isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["sex"]))
{
	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$sex = $_POST["sex"];

	$query2 = "SELECT * FROM user";
	$result2 = $conn->query($query2);
	$total =  $result2->num_rows;
	$n = $total+1;

	if(!empty($name) && !empty($username) && !empty($password) && !empty($email) && !empty($sex))
	{
		$query="INSERT INTO user (uid, Name, Username, Password, Email, Gender) VALUES ('$n', '$name', '$username', '$password', '$email', '$sex');";
		$result = $conn->query($query);
		if($result)
		{
			echo "<script>alert('Registration Successful. Now login to continue.');</script>";
		}
		else
		{	
			echo "<script>alert('Failed to register. Please fill the details again');</script>";
			include 'home.php';
		}
	}

	else
	{	
		echo "<script>
				alert('Please fill all the details');
			  </script>";
		 include 'home.php';
	}
}
?>