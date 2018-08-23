<?php
$root = $_SERVER['DOCUMENT_ROOT']; // set root for include and require
require_once $root . '/functions.php'; // require functions.php for loading translations and what not
fallbackEn(); // print english if no language was already printed
$lang = getHrefLang(); // get the code to insert before href="" attributes
$lcode = getLcode(); // get raw language code for html lang=""
$here = 'contact'; // for header.php
echo <<<HTML

<!doctype html>
<html lang="$lcode">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="/modules/body.css">
  <link rel="stylesheet" href="/modules/header/header.css">
  <link rel="stylesheet" href="/modules/footer/footer.css">

  <title>ssbpm.info - Project M</title>
</head>
<body class="body container">

HTML;

include_once $root . '/modules/header/header.php'; // include header.php

echo <<<HTML

  <div class="container my-5" id="pagecontent">
    <h4 class="text-center my-4" data-t="contact">Contact</h4>

    <div class="d-flex justify-content-center flex-wrap">
      <div class="card m-3" style="width: 20rem">
        <div class="card-body">
          <h5 data-t="waffeln.name" class="card-title">waffeln</h5>
          <h6 data-t="waffeln.role" class="card-subtitle mb-2 text-muted">Head Developer & Maintainer</h6>
          <p data-t="waffeln.info" class="card-text"><em>Really</em> likes this game.</p>
          <a class="card-link" href="https://twitter.com/wffln">Twitter</a>
          <a class="card-link" href="mailto:sinusstudios@gmail.com">E-Mail</a>
        </div>
      </div>
      <div class="card m-3" style="width: 20rem">
        <div class="card-body">
          <h5 data-t="titibandit.name" class="card-title">Titibandit</h5>
          <h6 data-t="titibandit.role" class="card-subtitle mb-2 text-muted">Founder & Contributor</h6>
          <p data-t="titibandit.info" class="card-text">-/-</p>
          <a class="card-link" href="https://twitter.com/wffln">Twitter</a>
          <a class="card-link" href="mailto:sinusstudios@gmail.com">E-Mail</a>
        </div>
      </div>
    </div>
  </div>

HTML;
include_once $root. '/modules/footer/footer.php'; // include footer.php
?>