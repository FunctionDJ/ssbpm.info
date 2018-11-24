<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'projectm'; // for header.php
$title = 'Project M - ssbpm.info';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body = <<<HTML
<div class="pt-3 mx-5 pb-5">
  <h3 class="text-center my-4">Wii models</h3>
  <p>Not counting the special editions, there are 3 major versions of the Wii you could come accross. Here is chronologically ordered list of the different models. Not all Wiis are created equal, and some have some obvious adavantages over the others. If you don't have a Wii yet, make sure you get the good kind!</p>
<p><span class="h5">The Original Nintendo Wii</span> <span>2006-2011</span></p>
<img src="original_wii.jpg" width="200" class="rounded float-right border">
<p><span style="font-weight:bold">This is the kind of wii you want.</span> This is the first model of Wii that debuted in 2006. They are compatible with Gamecube controllers, and possess an SD card slot. The Gamecube controller is the prefered way of playing the game, and the SD card is our gateway into being able to launch homebrew software, which allows us to launch Project M in the first place. It's for these reasons that this Wii model is the most desirable one to play Project M. Fortunately, this is also the most prolific kind. They come in with a stand, as they are also meant to stand vertically as in the picture. That was the model that was produced at the time when the Wii was the most popular, which is why a lot of people still have one of these Wiis in their guest bedroom. If you need to get your hands on one, ask some friends! They probably have an old one laying around that is jsut gathering dust. They are otherwise pretty easy to come by on listings website for as little as 20 bucks. If you plan on buying one this way, I would recommend looking for one with a faulty disc drive (they are more and more common). They are usually seen as worthless and get sold for very little money, but using USB Loading (LINK TO GUIDE), they can play the game just as well.</p>
<p>Exists in <span class="color-info-white">white</span>, <span class="color-info-black">black</span> and <span class="color-info-red">red</span> color.</p>
<p><span class="h5">The Family edition Wii</span> <span>2011-2013</span></p>
<img src="family_wii.jpg" height="125" class="rounded float-right border">
<p>This kind of Wii came a lot later and was not produced for a long time. Altough it is possible to use homebrew software and play Project M on this Wii, you won't be able to use Gamecube controllers, since they are not retro-compatible with Gamecube games, and this is a huge drawback. If you have such a Wii laying around, it's probably good to try the game. But if you plan on playing Project M more regularly with it, using an original Wii is strongly recommended, just because of the Gamecube controller compatibility.</br>
These Wiis are only meant to sit horizontally, unlike the original Wii. A good way to tell them apart is the Wii logo on the front of the console: it is horizontal on these Wiis as you can tell from the picture.</p>
<p>Exists in <span class="color-info-white">white</span>, <span class="color-info-black">black</span> and <span class="color-info-blue">blue</span> color.</p>
<p><span class="h5">The Wii Mini</span> <span>2012-2017</span></p>
<img src="mini_wii.jpg" height="180" class="rounded float-right border">
<p>The last Wii model to be produced. You really want to avoid the Wii mini. There are not a lot of them around, but they're pretty much useless for our purpose since they neither support Gamecube controllers, nor have a SD card slot. So getting homebrew software to run on them will be impossible (or really really hard), and then you won't have the option to use Gamecube controllers, should you be able to start Project M in the first place.</p>
</div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';