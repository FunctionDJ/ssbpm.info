console.log(`guide.js v2 loaded`);

const speed = 0;

const getAnchorCard = () => {
  let hash = window.location.hash;
  return hash.substr(1, hash.length);
}

const sdConverter = new showdown.Converter;

const sd = (md) => {
  let raw = sdConverter.makeHtml(md);
  if (raw) {
    if (raw.startsWith("<p>") && raw.endsWith("</p>")) {
      return raw.substring(3, raw.length - 4)
    } else {
      return raw
    }
  }
}

var currentCard = {
  id: "start"
};

// next button object
const nextPageButton = {
  nextPage: '',
  variable: "heyaaa",
  button: $('#nextPageButton'),
  setNext: function(nextPage) {
    this.nextPage = nextPage;
    this.button.attr("href", `#${nextPage}`);
    this.enable();
  },
  enable: function() {
    this.button.removeClass("disabled");
  },
  disable: function() {
    this.button.addClass("disabled");
  },
  load: function() {
    prevPageButton.addPrev(currentCard.id);
    if (cards[this.nextPage] != null) {
      cards[this.nextPage].show();
    } else {
      alert(`Woah there cowboy!\nSorry, something went wrong. Attempted to load\n    '${this.nextPage}'\nbut it doesn't exit. Please contact someone from\n    http://ssbpm.info/contact/\nand give them this error message. THANK YOU.`)
      throw `Error: The request card '${this.nextPage}' doesn't exist.`;
    }
    this.disable();
  }
}

// prev button object
const prevPageButton = {
  queue: [],
  button: $('#prevPageButton'),
  enable: function() {
    this.button.removeClass("disabled");
  },
  disable: function() {
    this.button.addClass("disabled");
  },
  addPrev: function(prevPage) {
    this.queue.push(prevPage);
    this.button.attr("href", `#${prevPage}`);
    this.enable();
  },
  load: function() {
    let prevPage = this.queue.pop();
    cards[prevPage].show();
    this.disable();
  }
}

class card {
  constructor(id, short, next, choices) {
    this.id = id;
    this.short = short;
    this.next = next;
    
    this.title = c[id].title;
    this.text = c[id].text;
    
    this.choices = [];

    if (choices) {
      for(let i = 0; i < choices.length; i++) {
        this.choices.push({
          target: choices[i],
          text: c[id].choices[choices[i]]
        });
        /*
          okay c is the translation object
          the id is something like "start", one of the cards generated as properties of c
          it's choices property holds the keys that are also the targets for identification
          so we plug the actual key we have which is choices[i] into choices' array
          in order to get it's text whew
        */
      }
    }
  }
  
  get HTMLobj() {
    // check if all required attributes were set
    let required = ["id", "short", "title", "text"];
    for(let i = 0; i < required.length; i++) {
      if (this[required[i]] == null) {
        throw `Error: this.${required[i]} undefined or null.`;
      }
    }

    let base = new element("div", {"id": "start", "style": "display: none"});
    let title = new element("h5", {"class": "card-title"});
    title.attachHTML(sd(this.title));
    let text = new element("p", {"class": "card-text"});
    text.attachHTML(sd(this.text));
    base.attachChild(title);
    base.attachChild(text);

    if (this.choices) {
      for (let i = 0; i < this.choices.length; i++) {
        let label = new element("label", {
          "for": `${this.short}-${i}`, "class": "radio-input"
        });

        label.attachChild(new element("input", {
          "type": "radio", "id": `${this.short}-${i}`,
          "value": `${this.choices[i].target}`, "name": this.id
        }));

        label.attachHTML(sd(this.choices[i].text));

        base.attachChild(label);
        base.attachChild(new element("br"));
      }
    }

    return base.element;
  }

  show() {
    // for prevPageButton
    currentCard = this;

    // remove all click handlers
    $('.radio-input input').off('click');

    let pagesContainer = $('#pages-container');

    // render HTML from object
    let html = this.HTMLobj;

    // get all children of the pagesContainer
    // should only be one child but this clears everything
    let currentPage = $('#pages-container > *');

    // hide every child using jQuery fade out
    currentPage.hide(speed, () => {
      pagesContainer.empty();
      pagesContainer.html(html);

      let newPage = $('#pages-container > *');

      newPage.show(speed, () => {
        if (this.next) {
          nextPageButton.setNext(this.next);
        }

        // if there are still entries in the queue for previous pages
        if (prevPageButton.queue.length) {
          prevPageButton.button.attr("href", `#${prevPageButton.queue[prevPageButton.queue.length - 1]}`);
          prevPageButton.enable();
        }

        // add click handlers for new choices even if they don't exist
        $(`#pages-container > * > .radio-input input`).click(() => {
          // if any of the buttons on this page are checked
          if ($(`#pages-container > * > .radio-input input`).is(':checked')) {
            let buttonValue = $(`#pages-container > * > .radio-input input:checked`).val();
            nextPageButton.setNext(buttonValue);
          }
        });
      });
    });
  }
}

var cards = {};

const newCard = (...args) => {
  cards[args[0]] = new card(...args);
}

(() => { // run after full page load

  // initial choice click event handler
  $(`#pages-container > * > .radio-input input`).click(() => {
    // if any of the buttons on this page are checked
    if ($(`#pages-container > * > .radio-input input`).is(':checked')) {
      let buttonValue = $(`#pages-container > * > .radio-input input:checked`).val();
      nextPageButton.setNext(buttonValue);
    }
  });
})();

const cardsCallback = () => {
  var cardAmount = 0;

  for (var key in cards) {
    cardAmount++;
  }

  console.log(`card.js loaded with ${cardAmount} cards.`);

  // attempt to load card that's in the window hash
  if (cards[getAnchorCard()]) {
    console.log(`Card '${getAnchorCard()}' loaded since it was found in the hash`)
    cards[getAnchorCard()].show();
  }
}