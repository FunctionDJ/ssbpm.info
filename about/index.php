<?php
$root = $_SERVER['DOCUMENT_ROOT']; // set root for include and require
require_once $root . '/functions.php'; // require functions.php for loading translations and what not
fallbackEn(); // print english if no language was already printed
$lang = getHrefLang(); // get the code to insert before href="" attributes
$lcode = getLcode(); // get raw language code for html lang=""
$here = 'about'; // for header.php
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

  <link rel="icon" type="image/png" href="/favicon.ico"/>

  <title data-t="title">About - ssbpm.info</title>
</head>
<body class="body container">

HTML;

include_once $root . '/modules/header/header.php'; // include header.php

echo <<<HTML

  <div class="m-5" id="pagecontent">
    <h5 data-t="about">About</h5>
    <p data-t="1">ssbpm.info is an informational / educational website about the video game modification "Project M" of the 2008 Nintendo Wii game Super Smash Bros. Brawl.
    Any people related to this site can not be held liable for any damage that might occur by following guides from this website.</p>
    <br/>
    <p><span data-t="2">ssbpm.info is being maintained by the european Project M gaming community.</span><br/>
    <span  data-t="3">For details, information and inquiries, please <a href="/contact"/>contact</a> waffeln, the lead maintainer.</span></p>
    <br/>
    <p data-t="4">&copy; 2018 waffeln</p>
    <p data-t="5">This project is licensed under the GNU PL v3 license.</p>
  </div>

HTML;
include_once $root. '/modules/footer/footer.php'; // include footer.php
?>