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

const newCard = (id, short, next, choices) => {
  if (choices) {
    var condChoices = getChoices(n, choices);
  } else {
    var condChoices = null;
  }

  cards[id] = new card(
    id, short, next, c[id].shift(), c[id].shift(), condChoices
  )
}

newCard("start", "st", null, ["ntsc-u", "pal-k-j", "idk"]);
newCard("ntsc-u", "nu", null, ["choice-1", "choice-2"])
newCard("pal-k-j", "pkj");

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