<?php
require 'sessions.php';
session_destroy();
header('Location: home.php');
?>