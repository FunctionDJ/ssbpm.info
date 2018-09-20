<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'home'; // for header.php
$title = 'ssbpm.info - Project M';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body =  <<<HTML

  <div class="container pt-3 text-center">

    <h3 data-t="welcome" class="mt-4">Welcome to</h3>
    <img src="/assets/logosmall.png" class="img-fluid mb-4"/>

    <p data-t="intro.1">This website was made for people interested in [Project M](/wiki/projectm), the premier Super Smash Bros. Brawl modification.</p>
    <p data-t="intro.2">To get started installing Project M, click here:</p>
    <a data-t="intro.guidebutton" class="btn btn-primary btn-lg mt-4" href="$lang/guide/">PM Installation Guide</a>

  </div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';