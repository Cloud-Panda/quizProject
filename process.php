<?php
  session_start();

  $questions = array(
    "Who is the richest model in the world?",
    "In what year did New York fashion week start?",
    "How many fashion weeks are there per year?",
    "Who is the Creative Director of Louis Vuitton? ",
    "Doc Martens were first created from what material?"
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
      "Who is the highest paid model?",
      "Is kylie Jenner considered a model?",
      "How many Vogue cover's has Kim Kardashian had?",
      "When did woman's shoes start to differ from men?",
      "where did Levi originate?"
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
      "In what type of building is the Met Gala hosted in?",
      "Where do shoes with pointy shoes come from?",
      "What is the most judged shoe to wear?",
      "How old is the ritual for wearing black to a funeral?",
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
      "How old is Vogue magazine?",
      "Who started the trend regards to lip plumpers?",
      "Who is not a Victoria Secret Angel?",
      "Wich of the following is not a model?",
      "Who of the following has never been at the Met Gala?"
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP Quiz</title>
    <link rel="stylesheet" type="text/css" href="css/quiz.css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Cinzel+Decorative" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caladea&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|EB+Garamond|Libre+Baskerville|Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>
  <form method="post" action="process.php" class="form">
  <!--Output of questions and answers-->
  <div class="container-wrap">
  <div class="container">
    <?php
      if ($_SESSION['set'] < 4)
      {
        for ($i = 0; $i < 5; $i++)
        {
          echo "<h2>" . $questions[$i] . "</h2>";
          for ($k = 0; $k < 4; $k++)
          {
            echo "<div id='border-thing'>";
            echo "<input type='radio' id='radio-btn' name='answer-$i' value='" . $answers[$i][$k] . "' required />";
            echo "<label id='radio-btn' for='answer-$i'>" . $answers[$i][$k] . "</label>";
            echo "<br />";
            echo "</div>";
          }
        }
        /*Score results*/
      } else {
        echo "<h1>Score: " . $_SESSION['score'] ."<p>$score/20</p>" . "</h1>";
      }
    ?>
    <input type="submit" name="submit" value="Next" id="next-btn">
  </form>
  </div>
    </div>
</body>
</html>