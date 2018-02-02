<?php
require 'database.php';
require 'sessions.php';

if (isset($_SESSION['uid']) && !empty($_SESSION['uid']))
{
	header('Location: FORMupdate.php');
}
else
{
	echo '<script>alert("You need to login first.");</script>';
}
?>