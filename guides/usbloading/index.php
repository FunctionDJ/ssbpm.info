<?php
$root = $_SERVER['DOCUMENT_ROOT']; // set root for include and require
require_once $root . '/functions.php'; // require functions.php for loading translations and what not
fallbackEn(); // print english if no language was already printed
$lang = getHrefLang(); // get the code to insert before href="" attributes
$lcode = getLcode(); // get raw language code for html lang=""
$here = 'usbloading'; // for header.php
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
  <link rel="stylesheet" href="/guides/usbloading/guide.css">
  
  <title>ssbpm.info - Project M</title>
</head>
<body class="body container">

HTML;

include_once $root . '/modules/header/header.php'; // include header.php

echo <<<HTML

<div class="d-flex justify-content-center">
  <div id="guide-window" class="card w-100">
    <div class="card-body">
      <div id="pages-container">
        <div id="page-1">
          <h5 class="card-title">Page 1</h5>
          <p class="card-text">Something</p>
        </div>
        <div id="page-2">
          <h5 class="card-title">Page 2</h5>
          <p class="card-text">Something</p>
        </div>
        <div id="page-3">
          <h5 class="card-title">Page 3</h5>
          <p class="card-text">Something</p>
        </div>
      </div>
      <a id="prevPageButton" href="#page-1" onclick="prevPage()" class="btn btn-primary">Previous</a>
      <a id="nextPageButton" href="#page-3" onclick="nextPage()" class="btn btn-primary float-right">Next</a>
    </div>
  </div>
</div>

HTML;
include_once $root. '/modules/footer/footer.php'; // include footer.php

echo '<script src="/guides/usbloading/guide.js"></script>';

?>