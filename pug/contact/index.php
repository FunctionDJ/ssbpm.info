<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'contact'; // for header.php
$title = 'Contact - ssbpm.info';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body = <<<HTML

  <div class="container my-5" id="pagecontent">
    <h3 class="text-center my-4" data-t="contact">Contact</h3>

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

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';