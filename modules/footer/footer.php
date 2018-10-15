<?php

$customJS = $customJS ?? '';

echo <<<HTML

  </div>

  <footer id="main_footer" style="background-color: #444" class="footer container">
    <div class="container d-flex justify-content-around text-muted font-weight-light">
      <span data-f="copyright">&copy; 2018 waffeln</span>
      <span>|</span>
      <span><a href="$lang/about/"><u data-f="about">About</u></a></span>
      <span>|</span>
      <span><a href="$lang/contact/"><u data-f="contact">Contact</u></a></span>
    </div>
  </footer>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- showdown.js for markdown -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.min.js" integrity="sha256-dwhppIrxD8qC6lNulndZgtIm4XBU9zoMd9OUoXzIDAE=" crossorigin="anonymous"></script>
  
  <!-- custom JS -->
  <script src="/modules/language.js"></script>
  $customJS

</body>
</html>

HTML;
