<?php
  $filename = 'liste-judokas.json';
  $json = file_get_contents($filename);
  $liste_judokas = json_decode($json);

  foreach ($liste_judokas as $key => $judoka) {
    $liste_judokas[$key] =  (array) $judoka;
  }

  $judoka_id = $_GET['id'];

$judoka_selectionne = [];
foreach ($liste_judokas as $judoka_num => $judoka) {

  if ($_GET['id'] == $judoka_num){
    $judoka_selectionne = $judoka;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>les sportifs</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="sportifs">

  <header>
   <h1>Détail du sportif</h1>
  </header>

  <nav>

    <ul class="navbar">
      <li><a href="index.html">le judo</a></li>
      <li><a href="pageCodeMoral.html">le code moral</a></li>
      <li><a href="pageOrdreDesCeintures.html">l'ordre des ceintures</a></li>
      <li><a href="sportifs.php">les sportifs</a></li>
    </ul>
  </nav>
  <p>
    <?php echo $judoka_selectionne['details']; ?><br />
    <a href="<?php echo $judoka_selectionne['url']; ?>" target="blank">
      pour en savoir plus
  </p>


</body>

</html>
