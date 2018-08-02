<?php

// takes a path from the URL after root directory and returns without the first (language) folder
// if no path given, it gets current path (default)
// returns either "/" or "/" + [folder + "/"] e.g. "/wiki/" or "/wiki/softmodding/"
// includes root path! no need to attach manually!
function getLoadPath($var = null) {

    // if $var not defined at function call (= null), get current path
    $url = is_null($var) ? $_SERVER['REQUEST_URI'] : $var;
    // $_SERVER['REQUEST_URI'] returns something like "/fr/wiki/softmodding/"

    // splitting the variable into an array
    $foldersRaw = explode("/", $url);
    // returns something like ['', 'fr', 'wiki', 'softmodding', '']

    // removing empty entries from the array
    $foldersFiltered = [];
    foreach($foldersRaw as $value) {
        if ($value != '') {
            array_push($foldersFiltered, $value);
            // if the current value of the array is not empty, push it
            // makes $foldersFiltered something like ['fr', 'wiki', 'softmodding']
        }
    }

    // removing the first entry (language)
    $foldersTrimmed = array_splice($foldersFiltered, 1);
    // removes first array item, returns something like ['wiki', 'softmodding']

    $path = '/';
    // the path we'll assemble now

    foreach($foldersTrimmed as $value) {
        $path .= $value . '/';
        // add back the folders
        // in example it adds 'wiki/softmodding/'
        // making $includepath '/wiki/softmodding/'
    }

    // attach root folder tree to path
    return $_SERVER['DOCUMENT_ROOT'] . $path;

}

// gets language of calling file from the directory structure
// basically just returns first folder name after root in the URL
function getLanguage() {

    $url = $_SERVER['REQUEST_URI'];
    // $_SERVER['REQUEST_URI'] returns something like "/fr/wiki/softmodding/"

    // splitting the variable into an array
    $foldersRaw = explode("/", $url);
    // returns something like ['', 'fr', 'wiki', 'softmodding', '']

    // removing empty entries from the array
    $foldersFiltered = [];
    foreach($foldersRaw as $value) {
        if ($value != '') {
            array_push($foldersFiltered, $value);
            // if the current value of the array is not empty, push it
            // makes $foldersFiltered something like ['fr', 'wiki', 'softmodding']
        }
    }

    return $foldersFiltered[0];
    // returns something like "fr"
}

// this function loads another file with a custom error output
// default for $loadPath is getLoadPath() and 'index.php' as $file
// this means that if general file is included, there is no need for using getLoadPath()
// in most cases
function includeWithError($loadPath = null, $file = 'index.php') {

    if (is_null($loadPath)) {
        $loadPath = getLoadPath() . $file;
    } else {
        $loadPath .= $file;
    }

    // set language in $_GET for include
    $_GET['lang'] = getLanguage();

    if (!@include_once $loadPath) {
        echo '<style>* {font-family: Arial};</style>';
        echo '<br/><h2>' . $loadPath . ' requested, but not found 😢<br/></h2>';
        echo "<h3>It's likely not translated or created yet</h3>";
        echo '<input type="button" value="Go back!" onclick="history.back()">';
    }
}

// this function gets the language from GET ?lang= / &lang=
// and checks if it's valid, otherwise returns 'en'
function resolveLang() {

    // load languages
    $languages = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/languages.json');
    $languages = json_decode($languages);

    $lang = $_GET['lang'] ?? 'en';

    if (!property_exists($languages, $_GET['lang'])) {
        $lang = 'en';
    }

    return $lang;
}