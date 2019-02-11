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

  //Taulukkomuuttuja $numbers pilkotaan yksittäisiin osiin
  foreach($numbers as $number) {

    //Pelaajan antamat luvut sijoitetaan uuteen taulukkomuuttujaan $playerNumbers.
    array_push($playerNumbers, $_POST[$number]);
  }

  // Tarkastetaan onko pelaaja antanut samoja lukuja.

  //Poistetaan moneen kertaan esiintyvät luvut ja tarkastetaan onko jäljelle jääneiden määrä < 6.
  if (count(array_unique($playerNumbers)) < 6 ) {
    echo "Don't choose multiple same numbers.";
  }
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
    count($resultsCompare);

    //Jos saatujen osumien määrä on < 1, näytetään alla oleva teksti.
    if (count($resultsCompare) < 1) {
      echo "Valitettavasti et saanut yhtään oikein!";
    }
    //Jos saatujen osumien määrä on  1, näytetään alla oleva teksti.
    elseif (count($resultsCompare) == 1) {
      echo "Yksi oikein: " . $results;
    }
    //Jos saatujen osumien määrä on < 1, näytetään alla oleva teksti.
    else {
      echo "Oikeat numerot: " . $results;
    }
    echo "<br>" . "<br>";
  }
}



//DELETE THIS, just for testing

echo "<br>" . "<br>" . "Player's numbers" . "<br>";
print_r($playerNumbers);
echo "<br>";
    //DELETE THIS, just for testing
    echo "<br>" . "<br>" . "All machine numbers" . "<br>";
    print_r($randomNumbers);
    echo "<br>" . "Unique count" . "<br>";
  echo  count(array_unique($randomNumbers));
  echo "<br>" . "Unique machine numbers" . "<br>";
print_r(array_unique($randomNumbers));



 ?>
