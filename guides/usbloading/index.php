<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'usbloading'; // for header.php
$title = 'USB Loading - ssbpm.info';
$lang = getHrefLang(); // get the code to insert before href="" attributes
$customCSS = '<link rel="stylesheet" href="/guides/usbloading/guide.css">';
$customJS = '<script src="guide.js"></script>';

$body = <<<HTML

<div id="content" class="d-flex justify-content-center">
  <div class="w-100">
    <a href="/guides/usbloading/">← Go back to start</a>
    <div id="guide-window" class="card">
      <div class="card-body">
        <div id="pages-container">

          <div id="start">
            <h5 class="card-title">Start - Getting to where you need</h5>
            <p class="card-text">Maybe you already have some steps done and can skip some things in this guide.</p>

            <label for="ui-1" class="radio-input">
              <input type="radio" id="ui-1" value="#fresh-start" name="#start">
              I have never softmodded my Wii.
            </label>
            <br/>
            <label for="ui-2" class="radio-input">
              <input type="radio" id="ui-2" value="#prepare-sd" name="#start">
              I have a Homebrew Channel installed.
            </label>
            <br/>
            <label for="ui-3" class="radio-input">
              <input type="radio" id="ui-3" value="#conf-usb-loader" name="#start">
              I can do USB Loading.
            </label>
            <br/>
          </div>

          <div id="fresh-start">
            <h5 class="card-title">Fresh Start: Checking your Wii version</h5>
            <p class="card-text">In this step we'll check what Wii system menu version your Wii is running and how to update if needed.</p>

            <label for="fs-1" class="radio-input">
              <input type="radio" id="fs-1" value="#find-wii-version" name="#fresh-start">
              I don't know what version my Wii has.
            </label>
            <br/>
            <label for="fs-2" class="radio-input">
              <input type="radio" id="fs-2" value="#letterbomb" name="#fresh-start">
              My Wii is running version 4.3.
            </label>
            <br/>
            <label for="fs-3" class="radio-input">
              <input type="radio" id="fs-3" value="#updating" name="#fresh-start">
              My Wii is running anything below 4.3.
            </label>
          </div>

          <div id="find-wii-version" data-prev="#fresh-start">
            <h5 class="card-title">Finding your Wii version</h5>
            <p class="card-text">In order to find your Wii version you need to go into Settings -> Wii System and you should see your Wii system version at the top right of the screen. The letter at the end tells you which region the Wii is from. U is USA, E is Europe (and Australia and some parts of South America), J is Japane and K is Korea.<br/>If it says 4.3, then your Wii is up to date. If it's lower, it's outdated.</p>

            <label for="fwv-1" class="radio-input">
              <input type="radio" id="fwv-1" value="#find-wii-version" name="#find-wii-version">
              My version starts with "4.3".
            </label>
            <br/>
            <label for="fwv-2" class="radio-input">
              <input type="radio" id="fwv-2" value="#updating" name="#find-wii-version">
              My version does not start with "4.3".
            </label>
          </div>

          <div id="updating">
            <h5 class="card-title">Updating your Wii</h5>
            <p class="card-text">Go into the Wii settings and update your Wii. You need an internet connection for this. Check if your Wii is version 4.3 after this.</p>

            <label for="up-1" class="radio-input">
              <input type="radio" id="up-1" value="#find-wii-version" name="#updating">
              My Wii is now updated to 4.3.
            </label>
            <br/>
            <label for="up-2" class="radio-input">
              <input type="radio" id="up-2" value="#disc-updating" name="#updating">
              I can't connect my Wii to the internet or i have a different error.
            </label>
            </label>
            <br/>
            <label for="up-2" class="radio-input">
              <input type="radio" id="up-2" value="#parental-code-removal" name="#updating">
              Parental Access is preventing me from updating or setting up an internet connection.
            </label>
          </div>

          <div id="letterbomb">
            <h5 class="card-title">Using Letterbomb to install the Homebrew Channel</h5>
            <p class="card-text">Now we'll be using Letterbomb to actuall softmod your Wii and install the Homebrew channel (and BootMii).<br/>
          </div>

          <div id="prepare-sd" data-prev="" data-next="#prepare-usb">
            <h5 class="card-title">Preparing your SD card</h5>
            <p class="card-text"></p>
          </div>

          <div id="prepare-usb" data-prev="#prepare-sd" data-next="#d2x-cios">
            <h5 class="card-title">Preparing your USB device</h5>
            <p class="card-text">Put the Brawl ISO on your FAT32 formatted USB device (min. 8GB, max. 2TB partition) using the wbfs_file tool.</p>
          </div>

          <div id="d2x-cios" data-prev="#prepare-usb" data-next="#pm-test-run">
            <h5 class="card-title">Installing d2x-cIOS to your Wii</h5>
            <p class="card-text">Install d2x-cIOS-v8-final, base IOS 56, slot 249, highest revision number to your Wii and exit the d2x installer once it's done.</p>
          </div>

          <div id="pm-test-run" data-prev="#d2x-cios">
            <h5 class="card-title">Running Project M</h5>
            <p class="card-text">Open USB Loader GX and start Brawl.</p>
          </div>

          <div id="" data-prev="#pm-test-run">
            <h5 class="card-title">Congratulations! You've successfully installed Project M on a PAL Wii using USB Loading.</h5>
            <p class="card-text">What do you want to do now?</p>
          </div>

          <div id="" data-prev="" data-next="">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
          </div>
          <!--TEMPLATE: <div id="" data-prev="" data-next="">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
          </div>-->
        </div>
        <a id="prevPageButton" href="#page-1" onclick="prevPage()" class="btn btn-primary">Previous</a>
        <a id="nextPageButton" href="#page-3" onclick="nextPage()" class="btn btn-primary float-right disabled">Next</a>
      </div>
    </div>
  </div>
</div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';