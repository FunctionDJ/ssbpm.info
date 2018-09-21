<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'home'; // for header.php
$title = 'ssbpm.info - Project M';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body =  <<<HTML

  <div class="pt-3 mx-5 pb-5">
    
    <h3 data-t="welcome" class="text-center my-4">Guides</h3>

    <p><span class="h5">Hackless</span> <span>NTSC</span></p>
    <p>This method is the easiest to install Project M since it doesn't require any kind of softmodding, but it is only available for people who own a Wii and physical Super Smash Bros. Brawl Disc that are NTSC.<br/>
    Another drawback of this method is that you always need a Wii Remote and therefore a sensor bar and batteries or battery pack for that Remote in order to launch Super Smash Bros. Brawl.<br/>
    Finally this method only allows Brawl mods up to 2GB in size since Brawl itself doesn't read any bigger SD Cards.<br/>
    This method uses the stage loader exploit which is why this limitation exists only for this method and not for the others.</p>

    <div class="w-100 text-center"><a class="btn btn-primary my-2" href="#">Hackless Guide</a></div>
    
    <p><span class="h5">Homebrew</span> <span>NTSC</span></p>
    <p>This method requires the Homebrew Channel, a NTSC Wii and a NTSC Super Smash Bros. Brawl physical disc.<br/>
    This allows you to install Priiloader so you almost never need a Wii Remote again and can do most things with a GameCube controller.<br/>
    A furhter advantage over the hackless method is that you can use mods that are more than 2GB in size like Legacy XP and such, and you don't need to remove all stage builder stages.<br/>
    This method launches the Project M (or whatever mod) launcher from the Homebrew Channel to directly inject the files and changes while launching Brawl, so you instantly start the mod.<br/>

    <div class="w-100 text-center"><a class="btn btn-primary my-2" href="#">Homebrew Guide</a></div>

    <p><span class="h5">USB Loading</span> <span>All regions</span></p>
    <p>This is currently the only method for all PAL Wiis or people without a physical working disc of NTSC Super Smash Bros. Brawl.<br/>
    It requires the Homebrew Channel, d2x-cIOS for being able to load Wii Backups (you can load most Wii Games except for Project M and alike from an SD as well, which is why it's Backup Loading and not necessarily USB Loading), a Backup Loader app (USB Loader GX, Configurable USB Loader / CFG Loader, WiiFlow ...) and a NTSC Brawl ISO file.<br/>

    <div class="w-100 text-center"><a class="btn btn-primary my-2" href="#">USB Loading Guide</a></div>
    
  </div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';
