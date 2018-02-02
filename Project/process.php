<?php

require 'database.php';
require 'sessions.php';

if(!isset($_SESSION['score']))
{
	$_SESSION['score'] = 0;
}

if($_POST)
{
	$number = $_POST['number'];
	$selected_choice = $_POST['choice'];
	$next = $number + 1;

	$query = "SELECT * FROM choices WHERE question_number = $number AND is_correct = 1";
	$result = $conn->query($query) or die(failed);
	$rows = $result->fetch_assoc();
	$correct_choice = $rows['id'];

	$query2 = "SELECT * FROM questions";
	$result2 = $conn->query($query2);
	$total = $result2->num_rows;

	if($correct_choice == $selected_choice)
	{
		$_SESSION['score']++;
		echo "<script>alert('Correct Answer');</script>";
	}
	else
	{
		echo "<script>alert('Incorrect Answer');</script>";
	}

	if($number==$total)
	{
		header('Location: final.php');
		exit();
	}
	else
	{
		header('Location: FORMtest.php?n='.$next);
	}

}

?>