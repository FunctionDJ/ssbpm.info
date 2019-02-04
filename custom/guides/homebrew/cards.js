newCard("start", "st", null, ["bomb", "sd-check", "str2hax-1"]);
newCard("sd-check", "sdc", null, ["bomb", "str2hax-1"]);
newCard("bomb", "bm", null, ["letterbomb-1", "bannerbomb-v2", "bannerbomb-v1", "disc-exploits"]);
newCard("letterbomb-1", "lb1", "letterbomb-2");
newCard("letterbomb-2", "lb2", null, ["letterbomb-3", "wilbrand"]);
newCard("letterbomb-3", "lb3", "letterbomb-4");
newCard("letterbomb-4", "lb4", "hackmii-1");
newCard("bannerbomb-v2", "bb", "hackmii-1");
newCard("bannerbomb-v1", "bb", "hackmii-1");

newCard("str2hax-1", "s2h1", "str2hax-2");
newCard("str2hax-2", "s2h2", "hackmii-1");
newCard("hackmii-1", "hm1", "hackmii-2");
newCard("hackmii-2", "hm2");


// required to load the card from anchor on load and logging the card count
cardsCallback();