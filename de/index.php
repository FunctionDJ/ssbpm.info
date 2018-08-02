<?php

$root = $_SERVER['DOCUMENT_ROOT'];
// will return path of webserver root like "/user/ssbpm/www"

require_once($root . '/functions.php');
// load functions.php from root for doing all the hard work

// include file
includeWithError(); // default path and file works usually