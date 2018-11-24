<?php

// set the global path variable that holds root + URI without the language code
// which makes the path of the to-include index.php (without the extention)
// we also need this for the translation file in the printTranslation function
$GLOBALS['locpath'] = $_SERVER['DOCUMENT_ROOT'] . substr($_SERVER['REQUEST_URI'], 3);
$GLOBALS['enpath'] = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];

function getLanguage() {
  $uri = $_SERVER['REQUEST_URI'];
  return substr($uri, 1, 2);
}

function loadSkeleton($lang = null) {
  if (is_null($lang)) {
    $lang = getLanguage();
  }

  printTranslation($lang); // echo the translation JSON into the document
  $GLOBALS['included'] = true;
  // set the lang global variable that's required for all hyperlinks to redirect to the right language
  $GLOBALS['language'] = $lang;

  // tell including index.php (and recursively header.php etc.)
  // that they are being 'remotely loaded' with a URI that starts with a language code
  include_once $GLOBALS['locpath'] . 'index.php';
}

function printTranslation($lang) {

  // set the path variable to the global path + /lang/ subdirectory, where the JSON files are
  $path = ($lang == 'en') ? $GLOBALS['enpath'] . 'lang/' : $GLOBALS['locpath'] . '/lang/';

  echo "<script>"; // we always want to echo javascript

  // print header translation
  echo "const header = ";
  $headerTranslationFileLoc = $_SERVER['DOCUMENT_ROOT'] . '/modules/header/lang/' . $lang . '.json';
  $headerTranslationFileEn = $_SERVER['DOCUMENT_ROOT'] . '/modules/header/lang/en.json';
  if (file_exists($headerTranslationFileLoc)) {
    echo file_get_contents($headerTranslationFileLoc);
  } else {
    echo file_get_contents($headerTranslationFileEn);
  }
  echo ";\n";
  
  // print footer translation
  echo "const footer = ";
  $footerTranslationFileLoc = $_SERVER['DOCUMENT_ROOT'] . '/modules/footer/lang/' . $lang . '.json';
  $footerTranslationFileEn = $_SERVER['DOCUMENT_ROOT'] . '/modules/footer/lang/en.json';
  if (file_exists($footerTranslationFileLoc)) {
    echo file_get_contents($footerTranslationFileLoc);
  } else {
    echo file_get_contents($footerTranslationFileEn);
  }
  echo ";\n";

  if (file_exists($path . $lang . '.json')) { // if the requested language JSON file exists
    echo "const translation = " . file_get_contents($path . $lang . '.json'); // hand it over to JS as a JS object
  } else if (file_exists($path . 'en.json')) { // if not, load english
    echo "const translation = " . file_get_contents($path . 'en.json');
  } else { // if neither found, output error
    echo "alert('No language file found! =( Please contact sinusstudios@gmail.com')";
  }

  echo ";</script>\n";
}

function fallbackEn() {
  if (!isset($GLOBALS['included'])) { // if functions.php isn't already loading a translation
    printTranslation('en'); // then just load english
  }
}

function getHrefLang() {
  // required for hyperlinks
  // the return gets inserted into the HEREDOC of the body to make links stay in-language
  if (isset($GLOBALS['language'])) {
    return '/' . $GLOBALS['language'];
  } else {
    return '';
  }
}

function getLcode() {
  // returns raw language code or english by default
  // currently only used for html lang attribute
  if (isset($GLOBALS['language'])) {
    return $GLOBALS['language']; // no /xx for the lang attribute in HTML, just xx
  } else {
    return 'en'; // default is english
  }
}

function printDebug($string) {
  echo "\n<!-- " . $string . " -->\n";
}