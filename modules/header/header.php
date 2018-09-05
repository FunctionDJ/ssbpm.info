<?php

isset($here) ? $$here = 'active' : $home = 'active' ;
// if $here is set from the including index.php, set a variable of it's value to "active"
// i.e. $here = 'guide' => $guide = 'active'
// these variables are then used to highlight the active tab via the class attribute

// the URI is appended to the language dropdown links in order to not send the user to the homepage on language switch
if (isset($GLOBALS['included'])) { // if the including index.php was included by the functions.php
  $uri = substr($_SERVER['REQUEST_URI'], 3); // remove the '/xx' from the URI because it's a language code
} else {
  $uri = $_SERVER['REQUEST_URI']; // otherwise use the full URI
}

error_reporting(0); // turn off error reporting so we can use possible undefined variables in the HEREDOC

echo <<<HTML
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <a id="logo" href="$lang/"><img src="/assets/logosmall.png" height="45px"/></a>
    <div class="d-flex justify-content-end"><!-- this is for bundling the dropdown toggle menu and the language note to the right -->
      <span id="language-note" class="nav-link">Change language &rarr;</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
        
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item $home"><a data-h="home" class="nav-link" href="$lang/">Home</a></li>
        <li class="nav-item $guide"><a data-h="guides" class="nav-link" href="$lang/guides/">Guides</a></li>
        <li class="nav-item $faq"><a data-h="faq" class="nav-link" href="$lang/faq/">F.A.Q.</a></li>
        <li class="nav-item dropdown">
          <a data-h="wiki" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Wiki</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a data-h="projectm" class="dropdown-item" href="$lang/wiki/projectm/">Project M</a>
            <a data-h="softmodding" class="dropdown-item" href="$lang/wiki/softmodding/">Softmodding</a>
            <a data-h="wiimodels" class="dropdown-item" href="$lang/wiki/wiimodels/">Wii models / types</a>
            <a data-h="homebrewapps" class="dropdown-item" href="$lang/wiki/homebrewapps/">Homebrew Apps</a>
            <a data-h="brickprotection" class="dropdown-item" href="$lang/wiki/brickprotection/">Brick protection</a>
            <a data-h="exploits" class="dropdown-item" href="$lang/wiki/exploits/">Exploits</a>
            <a data-h="palvsntsc" class="dropdown-item" href="$lang/wiki/palvsntsc/">PAL vs. NTSC explained</a>
          </div>
        </li>
        <li class="nav-item $contact"><a data-h="contact" class="nav-link" href="$lang/contact/">Contact</a></li>
        <li class="nav-item $about"><a data-h="about" class="nav-link" href="$lang/about/">About</a></li>
      </ul>

      <ul id="langdropdown" class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a data-h="language-dropdown" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!--<a class="dropdown-item" href="/da$uri">Dansk</a>
            <a class="dropdown-item" href="/nl$uri">Nederlands</a>-->
            <a class="dropdown-item" href="$uri">English</a>
            <!--<a class="dropdown-item" href="/fi$uri">Suomi</a>
            <a class="dropdown-item" href="/fr$uri">Français</a>-->
            <a class="dropdown-item" href="/de$uri">Deutsch</a>
            <!--<a class="dropdown-item" href="/it$uri">Italiano</a>
            <a class="dropdown-item" href="/es$uri">Español</a>
            <a class="dropdown-item" href="/sv$uri">Svenska</a>-->
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
HTML;

error_reporting(E_ALL); // restore error reporting just in case
?>