<?php
require 'database.php';
require 'sessions.php';

if(isset($_SESSION['aid']) && !empty($_SESSION['aid']))
{
  include 'FORMaddQ.php';
  if(isset($_POST['submit']))
  {
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question'];
    $correct_choice = $_POST['correct_choice'];
    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];

    $query = "INSERT INTO questions (question_number, text) VALUES ($question_number, '$question_text')";
    $result= $conn->query($query) or die('Error applying query');

    if($result)
    {
      foreach ($choices as $choice => $value) {
        if($value!='')
        {
          if($correct_choice == $choice){
            $is_correct=1;
          }else{
            $is_correct=0;
          }

          $query2 = "INSERT INTO choices (question_number, is_correct, text) VALUES ($question_number, $is_correct, '$value')";
          if ($result2 = $conn->query($query2)) {
            continue;
          }
          else
            echo 'error';
        }
      }
      header('Location: addQ.php');
    }
  }
}
else
{
  echo 'You are not Logged in!';
}
?>