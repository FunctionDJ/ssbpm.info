<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'projectm'; // for header.php
$title = 'Project M - ssbpm.info';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body = <<<HTML

  <div class="m-3 m-sm-5">
    <h5 data-t="projectm">Project M</h5><br/>
    <p data-t="1">"***Project M*** is a [gameplay modification](https://www.ssbwiki.com/Gameplay_modification) of [*Super Smash Bros. Brawl*](https://www.ssbwiki.com/Super_Smash_Bros._Brawl) designed to make the gameplay more closely resemble that of [*Super Smash Bros. Melee*](https://www.ssbwiki.com/Super_Smash_Bros._Melee), as well as [*Super Smash Bros.*](https://www.ssbwiki.com/Super_Smash_Bros.) to a lesser extent. *Project M's* primary change from *Brawl* is that the speed of gameplay has been generally increased and the character landing lag is shorter, alonside the restoration of *Melee* mechanics and elements, such as the addition of [Mewtwo](https://www.ssbwiki.com/Mewtwo_(PM)) and [Roy](https://www.ssbwiki.com/Roy_(PM)) after their absence in *Brawl*. *Project M's* development team was partly descended from the original developers for [*Brawl+*](https://www.ssbwiki.com/Brawl%2B), later known as the **PMDT** or **Project M Dev Team** (formerly the **PMBR** or **Project M Backroom**), having members from over ten countries. Development of the mod officially concluded on December 1st, 2015, with version 3.6 being the last official release of *Project M*.</p>
    <p data-t="2">*Project M* has been commonly featured at several [national](https://www.ssbwiki.com/National_tournament) [tournaments](https://www.ssbwiki.com/Tournament), such as the Zenith series, [The Big House series](https://www.ssbwiki.com/The_Big_House_(tournament_series)), and [Apex 2014](https://www.ssbwiki.com/Apex_2014), and it remains the most popular gameplay mod of *Brawl* in tournament settings. Starting in 2013, *Project M* saw a rapid rise in its popularity as more characters became playable and the mod became more familiar at Smash tournaments. By 2014, it began to develop its tournament scene, with the number entrants for Apex 2014's *PM* singles event notably surpassing the number of competitors for *Brawl*. Despite the end of *Project M's* official development, it still has been able to maintain its tournament presence seperate from *Brawl*, including the formation of its Backroom, the New PMBR, on July 21, 2016.</p>
    <p data-t="3">*Project M* only supports [NTSC](https://www.ssbwiki.com/NTSC) versions of *Brawl*, and no [PAL](https://www.ssbwiki.com/PAL) build was ever released. As a result, running *Project M* outside of NTSC regions requires homebrew as to allow the Wii to run an NTSC version of the game."</p>
    <p class="text-right" data-t="4"> \- [ssbwiki.com](https://www.ssbwiki.com/Project_M), accessed 23rd of August, 2018</p>
  </div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';