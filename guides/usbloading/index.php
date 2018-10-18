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
              <input type="radio" id="ui-1" value="#page-3" name="#page-1">
              I have never softmodded my Wii.
            </label>
            <br/>
            <label for="ui-2" class="radio-input">
              <input type="radio" id="ui-2" value="#page-4" name="#page-1">
              I have a Homebrew Channel installed.
            </label>
            <br/>
            <label for="ui-3" class="radio-input">
              <input type="radio" id="ui-3" value="#page-4" name="#page-1">
              I can do USB Loading.
            </label>
            <br/>
          </div>

          <div id="softmod-1">
            <h5 class="card-title">1 Wii version</h5>
            <p class="card-text">In this step we'll check what Wii system menu version your Wii is running and how to update if needed.</p>

            <label for="ui-1" class="radio-input">
              <input type="radio" id="ui-1" value="#check-version-1" name="#check-version-1">
              I don't know what version my Wii has.
            </label>
            <br/>
            <label for="ui-2" class="radio-input">
              <input type="radio" id="ui-2" value="#softmod-2" name="#softmod-2">
              My Wii is running version 4.3.
            </label>
            <br/>
            <label for="ui-3" class="radio-input">
              <input type="radio" id="ui-3" value="#update-1" name="#update-1">
              My Wii is running anything below 4.3.
            </label>

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