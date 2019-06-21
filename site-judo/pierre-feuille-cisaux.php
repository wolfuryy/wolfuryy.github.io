<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

 <header>
   <h1>Jeu du Morpion</h1>
  </header>

  <nav>

    <ul class="navbar">
      <li><a href="index.html">le judo</a></li>
      <li><a href="pageCodeMoral.html">le code moral</a></li>
      <li><a href="pageOrdreDesCeintures.html">l'ordre des ceintures</a></li>
      <li><a href="sportifs.php">les sportifs</a></li>
    </ul>
  </nav>




<body class="plus-moins">
<?php
$reponseOfThePlayer = $_POST['reponse'];
$reponseOfTheBot = rand(1,3);


if ($reponseOfThePlayer == 'pierre') {
  $reponseOfThePlayer = 1;
}

if ($reponseOfThePlayer == 'feuille') {
  $reponseOfThePlayer = 2;
}

if ($reponseOfThePlayer == 'cisaux') {
  $reponseOfThePlayer = 3;
}

 if ($reponseOfTheBot == $reponseOfThePlayer):
  echo "égalité";
?>
<?php
elseif ($reponseOfTheBot ==  1 && $reponseOfThePlayer == 2):
?>
Tu as gagné
<img src="image/pierre-pour-gabion-beige-granulometrie-80-120-mm.jpg">
<?php
elseif ($reponseOfTheBot == 2 && $reponseOfThePlayer == 3):
?>
Tu as gagné
<img src="image/papier-bouffant.jpg">
<?php
elseif ($reponseOfTheBot == 1 && $reponseOfThePlayer == 3):
?>
j'ai gagné
<img src="image/pierre-pour-gabion-beige-granulometrie-80-120-mm.jpg">
<?php
elseif ($reponseOfTheBot == 2 && $reponseOfThePlayer == 1):
?>
j' ai gagné
<img src="image/papier-bouffant.jpg">
<?php
elseif ($reponseOfTheBot == 3 && $reponseOfThePlayer == 2):
?>
Tu as gagné
<img src="image/ciseaux-de-bureau.jpg">
<?php
elseif ($reponseOfTheBot == 3 && $reponseOfThePlayer == 1):
?>
Tu as gagné
<img src="image/ciseaux-de-bureau.jpg">
<?php
endif;
 ?>



<form class="text" method="post">
  <input type="text" name="reponse">
  <input type="submit" value="soumettre ma réponse">
</form>

</body>
</html>
