<?php
  session_start();

  /*Process of scoring */
  if (!isset($_SESSION['set']) || !isset($_POST['submit']))
  {
    $_SESSION['score'] = 0;
    $_SESSION['set'] = 0;
  }

  if ($_SESSION['set'] == 0) {
    $questions = array(
      "1. Who is the richest model in the world?",
      "2. In what year did New York fashion week start?",
      "3. How many fashion weeks are there per year?",
      "4. Who created the brand 'Yeezy' ",
      "5. Doc Martens were first created from what material?"
    );

    $answers = array(
      array("Kendall Jenner", "Gisele Bündchen", "Selena Gomez", "Gigi Hadid"),
      array("1987", "1943", "1912", "1992"),
      array("1", "40", "70", "5"),
      array("Adidas", "Kanye West", "Nike", "Random guy who sold it for millions"),
      array("Old tires", "Leather", "Plastic", "Silk")
    );

    $correct_answers = array("B", "F", "J", "N", "Q");
  }
  
  else if ($_SESSION['set'] == 1) {
    $questions = array(
      "6. Who is the highest paid model?",
      "7. Is kylie Jenner considered a model?",
      "8. How many Vogue cover's has Kim Kardashian had?",
      "9. When did woman's shoes start to differ from men?",
      "10. where did Levi originate?"
    );
    
    $answers = array(
      array("Kendall Jenner", "Gigi Hadid", "Cara Delevine", "Taylor Swift"),
      array("Yes", "No", "Maybe", "Who is that?"),
      array("20", "8", "5", "10"),
      array("2000's", "1919", "15th Century", "100BC"),
      array("South Africa", "Germany", "Italy", "San Francisco")
    );
    
    
    $correct_answers = array("A", "E", "J", "O", "T");
    }
    else if ($_SESSION['set'] == 2) {
    $questions = array(
      "11. In what type of building is the Met Gala hosted in?",
      "12. Where do shoes with pointy toes come from?",
      "13. What is the most judged shoe to wear?",
      "14. How old is the ritual for wearing black to a funeral?",
      "15. What is an appropriate name linked with 'bikini>'"
    );
    
    $answers = array(
      array("Movie Theatre", "Art Museum", "Bussiness Building", "School"),
      array("Poland", "England", "Germany", "USA"),
      array("Crocks", "Jelly babies", "Gum boots", "Uggs"),
      array("Decades", "Thousands of years", "Millions of years", "Hundreds of years"),
      array("Bather", "Bombshell", "Two-piece", "Babe")
    );
    
    $correct_answers = array("B", "E", "I", "N", "R");
  } else if ($_SESSION['set'] == 3) {
    $questions = array(
      "16. How old is Vogue magazine?",
      "17. Who started the trend regards to lip plumpers?",
      "18. Who is not a Victoria Secret Angel?",
      "19. Wich of the following is not a model?",
      "20. Who of the following has never been at the Met Gala?"
    );
    
    $answers = array(
      array("128years", "50years", "60years", "10years"),
      array("Kim Kardashian", "Human Ken doll", "Cardi-B", "Kylie Jenner"),
      array("Ariana Grande", "Kendall Jenner", "GIgi Hadid", "Bella Hadid"),
      array("Kylie Jenner", "Kim Kardashian", "Candice Swaneapoel", "Jacob Zuma"),
      array("Kris Jenner", "Khloe Kardashian", "Zayn Malik", "Harry Styles")
    );
    
    $correct_answers = array("A", "H", "I", "O", "R");
  }

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
    
    $_SESSION['set'] = $_SESSION['set'] + 1;
    $_SESSION['score'] = $score;
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
        echo  '<input type="submit" name="submit" value="Next" id="next-btn">';
        /*Score results*/
      } 
      else {
        // echo "<h1>Score: "."<p>/20</p>" . "</h1>"
        /*echo $_SESSION['score'];*/
        if ($score <= 9){
        echo "<h1 id='score-h1'>Score:$score/20 "."<p>You did your best, you can always try again</p>" . "</h1>";
        }
        else if($score <= 15){
          echo "<h1 id='score-h1'>Score:$score/20 "."<p>You did okay, maybe a bit more research and you'll be a pro</p>" . "</h1>";
        }
        else if ($score >=16){
          echo "<h1>Score:$score/20 "."<p>I guess you proved me wrong. Congratulaitons </p>" . "</h1>";
        }
      }
    ?>
   
  </form>
  </div>
    </div>
</body>
</html>