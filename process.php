<?php
  session_start();

  $questions = array(
    "Question 1",
    "Question 2",
    "Question 3",
    "Question 4",
    "Question 5"
  );

  $answers = array(
    array("A", "B", "C", "D"),
    array("E", "F", "G", "H"),
    array("I", "J", "K", "L"),
    array("M", "N", "O", "P"),
    array("Q", "R", "S", "T")
  );

  $correct_answers = array("B", "F", "J", "N", "Q");
 /*Out put of answers */
  if (isset($_POST['submit'])) {
    $answer_1 = $_POST['answer-0'];
    $answer_2 = $_POST['answer-1'];
    $answer_3 = $_POST['answer-2'];
    $answer_4 = $_POST['answer-3'];
    $answer_5 = $_POST['answer-4'];

/*Scoring */
    $score = $_SESSION['score'];
    
    if ($answer_1 == $correct_answers[0]) {
      $score++;
    } if ($answer_2 == $correct_answers[1]) {
      $score++;
    } if ($answer_3 == $correct_answers[2]) {
      $score++;
    } if ($answer_4 == $correct_answers[3]) {
      $score++;
    } if ($answer_5 == $correct_answers[4]) {
      $score++;
    }
    
    $_SESSION['score'] = $score;
  }
  /*Process of scoring */
  if (!isset($_SESSION['set']) || !isset($_POST['submit']))
  {
    $_SESSION['score'] = 0;
    $_SESSION['set'] = 0;
  }
  else {
    $_SESSION['set'] = $_SESSION['set'] + 1;
  }
  
  if ($_SESSION['set'] == 1) {
    $questions = array(
      "Question 6",
      "Question 7",
      "Question 8",
      "Question 9",
      "Question 10"
    );
    
    $answers = array(
      array("A", "B", "C", "D"),
      array("E", "F", "G", "H"),
      array("I", "J", "K", "L"),
      array("M", "N", "O", "P"),
      array("Q", "R", "S", "T")
    );
    
    
    $correct_answers = array("A", "E", "J", "O", "T");
  } else if ($_SESSION['set'] == 2) {
    $questions = array(
      "Question 11",
      "Question 12",
      "Question 13",
      "Question 14",
      "Question 15"
    );
    
    $answers = array(
      array("A", "B", "C", "D"),
      array("E", "F", "G", "H"),
      array("I", "J", "K", "L"),
      array("M", "N", "O", "P"),
      array("Q", "R", "S", "T")
    );
    
    $correct_answers = array("B", "E", "I", "N", "R");
  } else if ($_SESSION['set'] == 3) {
    $questions = array(
      "Question 16",
      "Question 17",
      "Question 18",
      "Question 19",
      "Question 20"
    );
    
    $answers = array(
      array("A", "B", "C", "D"),
      array("E", "F", "G", "H"),
      array("I", "J", "K", "L"),
      array("M", "N", "O", "P"),
      array("Q", "R", "S", "T")
    );
    
    $correct_answers = array("A", "B", "I", "O", "R");
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    
</head>
<body>
  <form method="post" action="process.php" class="form">
  <!--Output of questions and answers-->
    <?php
      if ($_SESSION['set'] < 4)
      {
        for ($i = 0; $i < 5; $i++)
        {
          echo "<h2>" . $questions[$i] . "</h2>";
          for ($k = 0; $k < 4; $k++)
          {
            echo "<input type='radio' name='answer-$i' value='" . $answers[$i][$k] . "' required />";
            echo "<label for='answer-$i'>" . $answers[$i][$k] . "</label>";
            echo "<br />";
          }
        }
        /*Score results*/
      } else {
        echo "<h1>Score: " . $_SESSION['score'] ."<p>$score/20</p>" . "</h1>";
      }
    ?>
    <input type="submit" name="submit" value="Next">
  </form>
</body>
</html>