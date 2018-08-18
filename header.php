<?php

function e($var) {
  echo $var ?? '';
}

isset($here) ? $$here = 'active' : $home = 'active' ;

$uri = $_SERVER['REQUEST_URI'];

?>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <a id="logo" href="http://ssbpm.info"><img src="/assets/logosmall.png" height="45px"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php e($home) ?>"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item <?php e($guide) ?>"><a class="nav-link" href="#">Guide</a></li>
        <li class="nav-item <?php e($about) ?>"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Wiki</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Softmodding</a>
            <a class="dropdown-item" href="#">PAL vs. NTSC</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>

      <ul id="langdropdown" class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Languages</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/da<?php e($uri) ?>">dansk</a>
            <a class="dropdown-item" href="/nl<?php e($uri) ?>">Nederlands</a>
            <a class="dropdown-item" href="<?php e($uri) ?>">English</a>
            <a class="dropdown-item" href="/fi<?php e($uri) ?>">suomi</a>
            <a class="dropdown-item" href="/fr<?php e($uri) ?>">français</a>
            <a class="dropdown-item" href="/de<?php e($uri) ?>">Deutsch</a>
            <a class="dropdown-item" href="/it<?php e($uri) ?>">italiano</a>
            <a class="dropdown-item" href="/es<?php e($uri) ?>">español</a>
            <a class="dropdown-item" href="/sv<?php e($uri) ?>">svenska</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>