<?php

set_include_path($_SERVER['DOCUMENT_ROOT'] . '/modules/');

require 'head/head.php';
require 'header/header.php';
echo $body;
require 'footer/footer.php';