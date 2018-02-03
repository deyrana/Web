<?php

@$conn = new mysqli('localhost', 'root', '', 'lms');

if($conn->connect_error)
{
	die('Unable to connect to database');
}
?>