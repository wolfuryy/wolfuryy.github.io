<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>plus-moins</title>
      <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="plus-moins">

  <header>
   <h1>Jeu du plus ou Moins</h1>
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

      //Plus ou Moins
      $numero = file_get_contents('plus-moins-numero.json');
      if(!empty($numero)) {
        $random = $numero;
      }else {
        $random = rand(0,100);
        file_put_contents('plus-moins-numero.json', $random);
      }


      $form_reponse = $_POST['reponse'];
        if ($form_reponse < $random) {
          /*dire plus*/
          echo "plus";
        }
        elseif ($form_reponse>$random) {
            #dire moins
          echo "moins";
        }
        else {
              #dire bien joué
          file_put_contents('plus-moins-numero.json', '');
          echo "bien joué";
        }
    ?>

  <form class="text" method="post" ation="">
    <input type="text" name="reponse">
    <input type="submit" value="soumettre ma réponse">
  </form>
</section>

</body>
</html>
