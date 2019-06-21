<!DOCTYPE html>
<html>
<head>
  <title>les sportifs</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="sportifs">

  <header>
    <H2>les sportifs</H2>
  </header>
  <nav>

    <ul class="navbar">
      <li><a href="index.html">le judo</a></li>
      <li><a href="pageCodeMoral.html">le code moral</a></li>
      <li><a href="pageOrdreDesCeintures.html">l'ordre des ceintures</a></li>
      <li><a href="sportifs.php">les sportifs</a></li>
    </ul>
  </nav>

<?php
  $filename = 'liste-judokas.json';
  $json = file_get_contents($filename);
  $liste_judokas = json_decode($json);

  foreach ($liste_judokas as $key => $judoka) {
    $liste_judokas[$key] =  (array) $judoka;
  }

  if(!empty($_POST) && !empty($_POST['judoka_name'])) {
    $form_judoka_name = $_POST['judoka_name'];
    $form_judoka_url = $_POST['judoka_url'];
    $form_judoka_image = $_POST['judoka_image'];
    $form_judoka_title = $_POST['judoka_title'];

    /* if ($form_search=$form_judoka_name)
      href="<?php echo $judoka['name']; ?>" */

    $nouveau_judoka = [
      'name' => $form_judoka_name,
      'url'=> $form_judoka_url,
      'image'=>$form_judoka_image,
      'title'=>$form_judoka_title
    ];

    $existe = false;
    foreach ($liste_judokas as $key => $judoka) {
      if($judoka['name'] == $nouveau_judoka['name']) {
        $existe = true;
        break;
      }
    }

    if( !$existe ) {
      $liste_judokas[] = $nouveau_judoka;
      file_put_contents($filename, json_encode($liste_judokas, JSON_PRETTY_PRINT));
    }
  }
  elseif(!empty($_POST) && !empty($_POST['search'])) {
    $form_search = $_POST['search'];
    echo "search : " . $form_search;


    foreach ($liste_judokas as $judoka_num => $judoka) {
      if($judoka['name'] == $form_search) {
        $judoka_id = "judoka-" . $judoka_num;
        header('Location: http://localhost/site-judo/sportifs.php#' . $judoka_id);
      }
    }
}
?>


<form method="post" ation="">

    <input type="search" id="maRecherche" name="search"
     placeholder="Rechercher sur le site…" required>
    <button>Rechercher</button>
</form>

<form method="post" ation="">
  <input type="text" name="judoka_name" placeholder="Nom" required>
  <br>
  <input type="text" name="judoka_url" placeholder="Url" required>
  <br>
  <input type="text" name="judoka_image" placeholder="Image" required>
  <br>
  <input type="text" name="judoka_title" placeholder="Titre" required>
  <br>
  <input type="submit" value="Ajouter mon judoka">
</form>

  <section>
    <?php foreach ($liste_judokas as $judoka_num => $judoka) { ?>
      <div id="judoka-<?php echo ($judoka_num + 1); ?>">
        <a href="sportif-details.php?id=<?php echo $judoka_num; ?>" ><img src="<?php echo $judoka['image']; ?>" alt= "photo de <?php echo $judoka['name']; ?>" title="<?php echo $judoka['title']; ?>" id="<?php echo $judoka['name']; ?>" /></a>
        <p><?php echo $judoka['name']; ?></p>
      </div>
    <?php } ?>
  </section>


</body>

</html>
