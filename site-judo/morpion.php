<!DOCTYPE html>
<html>
<head>
  <title>Jeu du plus ou Moins</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="plus-moins">

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

  <section>
    <?php


      // Morpion

#set
      $tableau_etat = file_get_contents('morpion-etat-tableau.json');
      $morpion = [];
      if(!empty($tableau_etat)) {
        $morpion_test = json_decode($tableau_etat);
        foreach ($morpion_test as $key => $m) {
          $morpion[$key] = $m;
        }
      }else {
        for ($i=1; $i <= 9; $i++) {
          $morpion[$i] = '';
        }
        file_put_contents('morpion-etat-tableau.json', json_encode($morpion, JSON_PRETTY_PRINT));
      }

#reset
      if( !empty($_POST['reset']) ) {
        $morpion = [];
        for ($i=1; $i <= 9; $i++) {
          $morpion[$i] = '';
        }
        file_put_contents('morpion-etat-tableau.json', json_encode($morpion, JSON_PRETTY_PRINT));
      }





#réponse joueur
      if(!empty($_POST['reponse']) && $_POST['reponse'] >= 1 && $_POST['reponse'] <= 9 ) {
        $form_reponse = $_POST['reponse'];
        $morpion[$form_reponse] = 'x';
        file_put_contents("morpion-etat-tableau.json", json_encode($morpion, JSON_PRETTY_PRINT));
        var_dump($tableau_etat);
      }

#réponse bot
$cases_vides = [];
for ($i=1; $i <= 9; $i++) {
  if( $morpion[$i] == '' ) {
    $cases_vides[] = $i;
  }
}

$nouvelle_case = array_rand($cases_vides);
$case = $cases_vides[ $nouvelle_case ];
$morpion[$case] = 'o';
file_put_contents("morpion-etat-tableau.json", json_encode($morpion, JSON_PRETTY_PRINT));

#qui gagne ?
if ($morpion['3'] !== '' && $morpion['3'] == $morpion['5'] && $morpion['5'] == $morpion['7']){
  echo "nous avons un vainqueur";
}
elseif ($morpion['1'] !== '' && $morpion['1'] == $morpion['5'] && $morpion['5'] == $morpion['9']) {
  echo "nous avons un vainqueur";
}
elseif ($morpion['1'] !== '' && $morpion['1'] == $morpion['2'] && $morpion['2'] == $morpion['3']) {
  echo "nous avons un vainqueur";
}
elseif ($morpion['4'] !== '' && $morpion['4'] == $morpion['5'] && $morpion['5'] == $morpion['6']) {
  echo "nous avons un vainqueur";
}
elseif ($morpion['7'] !== '' && $morpion['7'] == $morpion['8'] && $morpion['8'] == $morpion['9']) {
  echo "nous avons un vainqueur";
}
elseif ($morpion['1'] !== '' && $morpion['1'] == $morpion['4'] && $morpion['4'] == $morpion['7']) {
  echo "nous avons un vainqueur";
}
elseif ($morpion['2'] !== '' && $morpion['2'] == $morpion['5'] && $morpion['5'] == $morpion['8']) {
  echo "nous avons un vainqueur";
}
elseif ($morpion['3'] !== '' && $morpion['3'] == $morpion['6'] && $morpion['6'] == $morpion['9']) {
  echo "nous avons un vainqueur";
}elseif( sizeof($cases_vides) == 0 ) {
  echo "Personne n'a gagné";
}

// $morpion[]


    ?>

    <section style="width:300px; display:flex;flex-wrap:wrap;">
      <?php for ($i=1; $i <= sizeof($morpion); $i++) { ?>
        <section style="padding: 20px;width: calc(33.33% - 42px); border: 1px solid grey;margin:0px;font-size:20px;"><?php echo $morpion[$i]; ?></section>
      <?php } ?>
</section>
  <br><br>

  <form class="text" method="post" ation="">
    <input type="text" name="reponse">
    <input type="submit" value="soumettre ma réponse">
  </form>

<form classe="text" method="post" ation="">
  <input type="submit" name="reset" value="Reset">
</form>

  </section>


</body>
</html>
