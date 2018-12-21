newCard("start", "st", null, ["bomb", "sd-check", "str2hax"]);
newCard("bomb", "bm", null, ["letterbomb-1", "bannerbomb", "???"]);
newCard("letterbomb-1", "lb1", "letterbomb-2");
newCard("letterbomb-2", "lb2", null, ["letterbomb-3", "wiibrand"]);
newCard("wiibrand", "wb", "letterbomb-3");
newCard("str2hax", "s2h");

// required to load the card from anchor on load and logging the card count
cardsCallback();