<?php
require 'database.php';
require 'sessions.php';

if(isset($_SESSION['uid']) && !empty($_SESSION['uid']))
{
	header('Location: FORMuserHome.php');
}
else
{
	include 'userlogin.php';
}
?>