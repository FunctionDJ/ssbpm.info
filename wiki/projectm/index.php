<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php'; // require functions.php for loading translations and what not

$here = 'projectm'; // for header.php
$title = 'Project M - ssbpm.info';
$lang = getHrefLang(); // get the code to insert before href="" attributes

$body = <<<HTML
        <div class="pt-3 mx-5 pb-5">
	    <h3 class="text-center my-4">Project M</h3>
	    <div>
		<blockquote class="blockquote">
	      	<p class="mb-0"> Project M is a community-made mod of Brawl inspired by Super Smash Bros. Melee's gameplay designed to add rich, technical gameplay to a balanced cast of characters while additionally enhancing the speed of play. </p>
	      	<footer class="blockquote-footer text-right">Project M Development Team</footer>
	    	</blockquote>
	    </div>
	    <p> Project M is a game modification (mod) of the famous platform fighter Super Smash Bros. Brawl for the Wii. It is a fast-paced and competitive fighting game that is technically deep, but still very accessible and enjoyable to newcomers. The mod modifies the game's physics quite heavily, and also adds a ton of content in the form of playable characters, stages, characters costumes and play modes. All the characters are in some way modified, which makes the entire cast competitively viable. Two good videos presenting the mod (a short one and a longer one) are embedded if you want to know more about it.</p>
	    <div class="row youtube_row">
	      <div class="col-md-6">
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Wa80vYApInc"></iframe>
		</div>
	      </div>
	      <div class="col-md-6">
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/OmUH5rmZyps"></iframe>
		</div>
	      </div>
	    </div>
	    <p> The game has a really passionate community that is still actively playing, organizing tournaments, and creating enjoyable content. Have a look at the PM subreddit, or check out the newly created community-content Hub: Project M Nexus! </p>

	 </div>

HTML;

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/loader.php';
