<?php

fallbackEn(); // print english if no language was already printed

$lcode = getLcode(); // get raw language code for html lang=""

$title = $title ?? 'ssbpm.info';

$customCSS = $customCSS ?? '';

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
  $customCSS

  <title>$title</title>
</head>
<body id="body" class="container d-flex flex-column pt-sm-4">
  <div class="bg-white" style="flex: 1">

HTML;
