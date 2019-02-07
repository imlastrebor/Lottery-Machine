<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<form action="arvontakone.php" method="post">

<input type="number" name="numberOne" min="1" max="30" required>
<input type="number" name="numberTwo" min="1" max="30" required>
<input type="number" name="numberThree" min="1" max="30" required>
<input type="number" name="numberFour" min="1" max="30" required>
<input type="number" name="numberFive" min="1" max="30" required>
<input type="number" name="numberSix" min="1" max="30" required>

<input type="submit" name="submit" value="Play">
</form>
  </body>
</html>



<?php

// Taulukkomuuttuja, johon on koottu input-kentät
$numbers = array('numberOne','numberTwo','numberThree','numberFour','numberFive','numberSix');

//Tyhjä taulukkomuuttuja
$playerNumbers = array();

//Ehtona on että submit-painiketta on painettu
if (isset($_POST['submit'])) {

  //Taulukkomuuttuja pilkotaan yksittäisiin osiin
  foreach($numbers as $number) {

    //Yksittäiset osat sijoitetaan uuteen taulukkomuuttujaan $playerNumbers.
    array_push($playerNumbers, $_POST[$number]);
  }

  // Tarkastetaan onko pelaaja antanut samoja lukuja.
  
  //Poistetaan moneen kertaan esiintyvät luvut ja tarkastetaan onko jäljelle jääneiden määrä < 6.
  if (count(array_unique($playerNumbers)) < 6 ) {
    echo "Don't choose multiple same numbers.";
  }
  else {
    echo "you almost win";
  }

}

 ?>
