var cards = {};
let n = '';

const getChoices = (n, ...targets) => {
  let choices = [];

  for(let i = 0; i < targets.length; i++) {
    choices.push({
      target: targets[i],
      text: c[n][0][i]
    });
  }

  return choices;
}

n = "start";
cards[n] = new card(
  n, "ui", null, c[n].shift(), c[n].shift(),
  getChoices(n, "no-softmod", "prepare-sd", "conf-usb-loader")
);

n = "updating";
cards[n] = new card(
  n, "up", null, c[n].shift(), c[n].shift(),
  getChoices(n, "find-wii-version", "disc-updating")
);

n = "fresh-start";
cards[n] = new card(
  n, "fs", null, c[n].shift(), c[n].shift(),
  getChoices(n, "find-wii-version", "letterbomb", "updating")
);

n = "find-wii-version";
cards[n] = new card(
  n, "fwv", null, c[n].shift(), c[n].shift(),
  getChoices(n, "letterbomb", "updating")
);

n = "updating2";
cards[n] = new card(
  n, "up2", null, c[n].shift(), c[n].shift(),
  getChoices(n, "letterbomb", "disc-updating", "parental-code-removal")
);

n = "letterbomb";
cards[n] = new card(
  n, "lb", "prepare-sd", c[n].shift(), c[n].shift(),
);

n = "prepare-sd";
cards[n] = new card(
  n, "p-sd", "prepare-usb", c[n].shift(), c[n].shift(),
);

n = "prepare-usb";
cards[n] = new card(
  n, "p-usb", "d2x-cIOS", c[n].shift(), c[n].shift(),
);

// end of card generation

let cardAmount = 0;

for (var key in cards) {
  cardAmount++;
}

console.log(`card.js loaded with ${cardAmount} cards.`);

// attempt to load card that's in the window hash
if (cards[getAnchorCard()]) {
  console.log(`Card '${getAnchorCard()} loaded since it was found in the hash`)
  cards[getAnchorCard()].show();
}