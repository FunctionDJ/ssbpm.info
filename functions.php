<?php

// set the global path variable that holds root + URI without the language code
// which makes the path of the to-include index.php (without the extention)
// we also need this for the translation file in the printTranslation function
$GLOBALS['path'] = $_SERVER['DOCUMENT_ROOT'] . substr($_SERVER['REQUEST_URI'], 3);

function loadSkeleton($lang) {
  
  printTranslation($lang); // echo the translation JSON into the document
  $GLOBALS['included'] = true;
  // tell including index.php (and recursively header.php etc.)
  // that they are being 'remotely loaded' with a URI that starts with a language code
  include_once $GLOBALS['path'] . 'index.php';
}

function printTranslation($lang) {

  // set the path variable to the global path + /lang/ subdirectory, where the JSON files are
  $path = $GLOBALS['path'] . '/lang/';

  echo "<script>"; // we always want to echo javascript

  if (file_exists($path . $lang . '.json')) { // if the requested language JSON file exists
    echo "const translation = " . file_get_contents($path . $lang . '.json'); // hand it over to JS as a JS object
  } else if (file_exists($path . 'en.json')) { // if not, load english
    echo "const translation = " . file_get_contents($path . 'en.json');
  } else { // if neither found, output error
    echo "alert('No language file found! =( Please contact sinusstudios@gmail.com')";
  }

  echo ";</script>\n";
}