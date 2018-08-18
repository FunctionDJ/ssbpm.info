<?php
error_reporting(0); // turn off error reporting so we can use possible undefined variables in the HEREDOC

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

echo <<<HTML
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <a id="logo" href="http://ssbpm.info"><img src="/assets/logosmall.png" height="45px"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item $home"><a data-t="header.home" class="nav-link" href="#">Home</a></li>
        <li class="nav-item $guide"><a data-t="header.guide" class="nav-link" href="#">Guide</a></li>
        <li class="nav-item $about"><a data-t="header.about" class="nav-link" href="#">About</a></li>
        <li class="nav-item dropdown">
          <a data-t="header.wiki" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Wiki</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a data-t="header.softmodding" class="dropdown-item" href="#">Softmodding</a>
            <a data-t="header.palvsntsc" class="dropdown-item" href="#">PAL vs. NTSC</a>
            <a data-t="header.somethingelse" class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>

      <ul id="langdropdown" class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a data-t="header.languages" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Languages</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/da$uri">dansk</a>
            <a class="dropdown-item" href="/nl$uri">Nederlands</a>
            <a class="dropdown-item" href="$uri">English</a>
            <a class="dropdown-item" href="/fi$uri">suomi</a>
            <a class="dropdown-item" href="/fr$uri">français</a>
            <a class="dropdown-item" href="/de$uri">Deutsch</a>
            <a class="dropdown-item" href="/it$uri">italiano</a>
            <a class="dropdown-item" href="/es$uri">español</a>
            <a class="dropdown-item" href="/sv$uri">svenska</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
HTML;

error_reporting(E_ALL);
?>