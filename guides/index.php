<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'home'; // for header.php
$title = 'ssbpm.info - Project M';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body =  <<<HTML

  <div class="container pt-3">
    
    <h3 data-t="welcome" class="text-center my-4">Guides</h3>
      

    

  </div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';
