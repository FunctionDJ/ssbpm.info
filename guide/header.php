<?php

// function "echo If Not Null"
// used to not output an error if the variable isn't set
function eINN (&$variable) {
    echo isset($variable) ? $variable : '';
}

if (isset($_GET["active"])) {
    $t = $_GET["active"];
    $$t = $t; // if active=guide, $guide = 'guide'; etc. eINN() important!
}

echo <<<HTML

<header>
    
</header>

HTML;
