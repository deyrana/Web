<?php 
require 'sessions.php';

if(isset($_SESSION['aid']) && !empty($_SESSION['aid']))
{
  include 'FORMadminHome.php';
}
else
{
  include 'adminlogin.php';
}

?>