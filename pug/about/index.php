<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'about'; // for header.php
$title = 'About - ssbpm.info';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body = <<<HTML

  <div class="m-5">
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

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';