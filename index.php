<?php

// set root for loading files
$root = $_SERVER['DOCUMENT_ROOT'];

// load functions.php
require_once $root . '/functions.php';

// load languages
$languages = file_get_contents($root . '/languages.json');
$languages = json_decode($languages);

// get language
$lang = resolveLang($langDir);


// hand language to javascript
echo '<script>const language = "' . $lang . '";</script>';

?>

<html lang="">
<head>
    <title>ssbpm.info - Project M</title>
</head>
<body>
    <h1 data-id="h1">Henlo fren</h1>
    <script src="/language.js"></script>
</body>
</html>