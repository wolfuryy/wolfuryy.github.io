<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="plus-moins">

    <nav>
    <ul class="navbar">
      <li><a href="index.html">le judo</a></li>
      <li><a href="pageCodeMoral.html">le code moral</a></li>
      <li><a href="pageOrdreDesCeintures.html">l'ordre des ceintures</a></li>
      <li><a href="sportifs.php">les sportifs</a></li>
    </ul>
  </nav>

<?php

#set
$liste_mots = file_get_contents('liste-mots.json');
$pendu = [];
if(!empty($liste_mots)) {
  $liste_mots = json_decode($liste_mots);
  $reponse="";

  shuffle($liste_mots);
  $mot_choisi_fichier = file_get_contents("nombre_de_lettre.json");
  if(!empty($mot_choisi_fichier)) {
    $mots_choisi = json_decode($mot_choisi_fichier);
  }else {
    $mots_choisi=current($liste_mots);
  }

  var_dump($mots_choisi);
  var_dump($mots_choisi[0]); // sizeof($mots_choisi)
  file_put_contents("nombre_de_lettre.json", json_encode($mots_choisi,JSON_PRETTY_PRINT));

#reset
  var_dump($_POST['reset']);
if( !empty($_POST['reset']) ) {
  $liste_mots = file_get_contents('liste-mots.json');
  $pendu = [];
  $reponse="";

  if(!empty($liste_mots)) {
    $liste_mots = json_decode($liste_mots);
    shuffle($liste_mots);
    var_dump($liste_mots);
    $mots_choisi=current($liste_mots);
    }
    file_put_contents("nombre_de_lettre.json", json_encode($mots_choisi,JSON_PRETTY_PRINT));
    $mot_choisi_fichier = file_get_contents("nombre_de_lettre.json");

    if(!empty($mot_choisi_fichier)) {
      $mots_choisi = json_decode($mot_choisi_fichier);
    } else {
    var_dump($mots_choisi);
    var_dump($mots_choisi[0]); // sizeof($mots_choisi)
    file_put_contents("nombre_de_lettre.json", json_encode($mots_choisi,JSON_PRETTY_PRINT));
    $_POST['reset']="";
  }
}




  #réponse joueur
  if(!empty($_POST['reponse'])){
    $reponse=$_POST['reponse'];
  }
  if(!empty($_POST['lettre'])){
    $lettre=$_POST['lettre'];

    for ($i=0; $i <=sizeof($mots_choisi) ; $i++) {
      if ($mots_choisi[$i]== $lettre) {
        echo $i;//affiché la lettre sur le bon tiret
        echo $lettre;
      }
    }
  }
}

#vérif
if (!empty($reponse)){
if ($reponse == $mots_choisi){
  echo "gg vous avez trouvé, je ne dominerai pas tout de suite le monde";
}
}
var_dump($reponse)
?>


  <form class="text" method="post" ation="">
    <input type="text" name="reponse">
    <input type="submit" value="soumettre ma réponse">
  </form>

    <form class="text" method="post" ation="">
    <input type="text" name="lettre">
    <input type="submit" value="soumettre une lettre">
  </form>

  <form classe="text" method="post" ation="">
    <input type="submit" name="reset" value="Reset">
  </form>

</body>
</html>
