<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  </head>
  <body>


    <?php   if (!isset($_POST['submit'])) {
              echo "<h2 class=\"otsikko\">Lottery machine</h2>";
              echo "<h3>Select six numbers and click play</h3>";
            }

            if (isset($_POST['submit'])) {
              echo "<h2 class=\"otsikkoPieni\">Lottery machine</h2>";
            } ?>
<form class="numbersForm" action="arvontakone.php" method="post">

  <input type="number" name="numberOne" min="1" max="30" required value="<?php echo isset($_POST['numberOne']) ? $_POST['numberOne'] : '' ?>" >
  <input type="number" name="numberTwo" min="1" max="30" required value="<?php echo isset($_POST['numberTwo']) ? $_POST['numberTwo'] : '' ?>" >
  <input type="number" name="numberThree" min="1" max="30" required value="<?php echo isset($_POST['numberThree']) ? $_POST['numberThree'] : '' ?>" >
  <input type="number" name="numberFour" min="1" max="30" required value="<?php echo isset($_POST['numberFour']) ? $_POST['numberFour'] : '' ?>" >
  <input type="number" name="numberFive" min="1" max="30" required value="<?php echo isset($_POST['numberFive']) ? $_POST['numberFive'] : '' ?>" >
  <input type="number" name="numberSix" min="1" max="30" required value="<?php echo isset($_POST['numberSix']) ? $_POST['numberSix'] : '' ?>" >

  <div class="numbersFormButton">
    <input type="submit" name="submit" value="Play">

  </div>
</form>
  </body>
</html>

<div class="resultBox">

<?php

  // Taulukkomuuttuja, johon on koottu input-kentät
  $numbers = array('numberOne','numberTwo','numberThree','numberFour','numberFive','numberSix');

  //Tyhjä taulukkomuuttuja
  $playerNumbers = array();


  //Ehtona on että submit-painiketta on painettu
  if (isset($_POST['submit'])) {



    //Taulukkomuuttuja $numbers pilkotaan yksittäisiin osiin
    foreach($numbers as $number) {

      //Pelaajan antamat luvut sijoitetaan uuteen taulukkomuuttujaan $playerNumbers.
      array_push($playerNumbers, $_POST[$number]);
    }

    // Tarkastetaan onko pelaaja antanut samoja lukuja.

    //Poistetaan moneen kertaan esiintyvät luvut ja tarkastetaan onko jäljelle jääneiden määrä < 6.
    if (count(array_unique($playerNumbers)) < 6 ) {
      echo "<h3>Don't choose multiple same numbers.</h3>";
    }

    //Jos samoja lukuja ei löydy toteutetaan alla olevat asiat.
    else {

      //Taulukkomuuttuja, johon on syötetään koneen luvut
        $randomNumbers = array();

      //Syötetään $randomNumbers taulukkoon satunnaisia lukuja kunnes sieltä löytyy 6 toisistaan eroavaa lukua.
        while (count(array_unique($randomNumbers)) < 6)  {
          array_push($randomNumbers, rand(1,30));
        }

      //Luodaan muuttuja, jossa verrataan taulukoita $randomNumbers ja $playerNumbers ja poimitaan sieltä luvut, jotka löytyvät molemmista.
        $resultsCompare = array_intersect(array_unique($randomNumbers), $playerNumbers);

      //Ottaa muuttujasta löytyvät arvot ja tekee niistä stringin.
        $results = implode(", ", $resultsCompare);

      //Lasketaan saatujen osumien määrä.
          echo "<h3> You got " . count($resultsCompare) . " right </h3>";

        //Luodaan ehdot joilla saadaan tulostettua eri tekstejä tulosten perusteella.
        if (count($resultsCompare) < 1) {
          echo "<h2> Oh no! <br> No win... </h2>";
        }
        elseif (count($resultsCompare) == 1) {
          echo "<h3> Number: " . $results . "</h3><h2> Good!</h2>";
        }
        elseif (count($resultsCompare) == 2) {
          echo "<h3> Numbers: " . $results . "</h3><h2> Nice!</h2>";
        }
        elseif (count($resultsCompare) == 3) {
          echo "<h3> Numbers: " . $results . "</h3><h2> Bingo!</h2>";
        }
        elseif (count($resultsCompare) == 4) {
          echo "<h3> Numbers: " . $results . "</h3><h2> Amazing!</h2>";
        }
        elseif (count($resultsCompare) == 5) {
          echo "<h3> Numbers: " . $results . "</h3><h2> BIG MONEY!</h2>";
        }
        elseif (count($resultsCompare) == 6) {
          echo "<h3> Numbers: " . $results . "</h3><h2> Quit your job!</h2>";
        }
    }
  }

?>

</div>
