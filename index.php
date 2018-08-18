<?php

// set root for loading files
$root = $_SERVER['DOCUMENT_ROOT'];

// load functions.php
require_once $root . '/functions.php';

// load languages
$languages = file_get_contents($root . '/languages.json');
$languages = json_decode($languages);

// get language
$lang = resolveLang($langDir ?? '');

$here = 'home';

// hand language to javascript
echo '<script>const language = "' . $lang . '";</script>';

?>

<!doctype html>
<html lang="<?php echo $lang ?>">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="/body.css">
  <link rel="stylesheet" href="/header.css">

  <title>ssbpm.info - Project M</title>
</head>
<body class="body container">
  <?php include_once $root . '/header.php'; ?>

  <div class="container" id="pagecontent">
      <h1 data-id="h1">Henlo fren</h1>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- custom JS -->
  <script src="/language.js"></script>
</body>
</html>