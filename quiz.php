<?php

  $index = 0;
  $user_answer = "";
  $correct_answers = array(3, 0, 2, 3);

  $questions = array(
    "What is 1 + 1?",
    "How many toenails does humans have?",
    "How do you spell blue?",
    "What's the third day of the week?",

  );

  $answers = array(
    array("7", "4", "1", "2"),
    array("10", "2", "-2", "0"),
    array("red", "bruh", "blue", "orange"),
    array("May", "Monday", "1997", "Wednesday"),
    
  );

  $correct = array ("2", "10","blue","wednesday");

  if (isset($_POST['submit'])) {
    $index = $_POST['question-index'];
    $user_answer = $_POST['user-answer']; 
    echo "<br>Actual answer: " . $answers[$index-1][$correct_answers[$index-1]] . "<br>";
    if ($user_answer == $answers[$index-1][$correct_answers[$index-1]]) 
    {
      echo "Correct!";
    } else {
      echo "Wrong!";
    }

    echo "You answered " . $user_answer;
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>

    <div class="questions">
      <form action="/quiz.php" method="post">
        <h2 class="question-title"><?php echo $questions[$index] ?></h2>
        <?php
          for ($i = 0; $i < 4; $i++)
          {          
            echo "<input type='radio' name='user-answer' value=" . $answers[$index][$i] . ">";
            echo "<label for='answer'>" . $answers[$index][$i] . "</label>";
            echo "<br/>";
          }
        ?>
        <br>
        <input type="hidden" name="question-index" value=<?php echo $index + 1 ?>> 
        <input type="submit" name="submit" value="Next">
      </form>
    </div>
    <!-- <div class="answers">
    </div> -->
  </body>
</html>