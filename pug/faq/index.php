<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'faq'; // for header.php
$title = 'Frequently Asked Questions - ssbpm.info';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body =  <<<HTML

  <div class="p-5">

    <h5>Is softmodding / hacking illegal?</h5>
    <p class="pb-2">
      No. Softmodding or hacking is not illegal. Nobody can sue you over this.<br/>
      You are only breaking Nintendo's terms of service which means they are not required to offer you any service anymore, like online play or warranty case repairs (none of which apply today anyway anymore).<br/>
      So really, you're not giving up anything when softmodding or hacking your Wii.
    </p>

    <h5>Why is it 'softmodding' and not 'hacking'?</h5>
    <p>
      Technically speaking softmodding is also hacking, but hacking can also mean (or rather traditionally means) hardware modifications when talking about modifications to a console.<br/>
      Softmodding - as the term implies - only means using software to modify a system without installing modchips or other means of external modification.<br/>
      The cool thing about softmodding is that you don't need to open up your Wii, buy usually rare or expensive modchips or risk breaking your Wii with physical damage.<br/>
      Softmodding is a lot safer and easier to do, since you can do almost everything with an SD Card and a computer with an internet connection.<br/>
      This is one of the biggest advantages of the Nintendo Wii since the modding community has done so much reverse engineering and finding security holes in the software for running foreign code. Other consoles like the XBOX360 always require hardware modifications in order to hack.
    </p>

    <h5>Is softmodding hard?</h5>
    <p>Absolutely not. Anyone with a little knowledge about how downloading things from the internet and how the Windows Explorer / MacOS Finder / Linux File Explorer works

  </div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';
