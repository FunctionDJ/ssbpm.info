console.log(`guide.js v2 loaded`);

const getAnchorCard = () => {
  let hash = window.location.hash;
  return hash.substr(1, hash.length);
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
    this.enable();
  },
  load: function() {
    let prevPage = this.queue.pop();
    cards[prevPage].show();
    this.disable();
  }
}

// card class
class card {
  constructor(id, short, next, title, text, choices) {
    this.id = id;
    this.short = short;
    this.next = next;
    this.title = title;
    this.text = text;
    this.choices = choices;
  }

  get HTMLobj() {
    let required = ["id", "short", "title", "text"];
    for(let i = 0; i < required.length; i++) {
      if (this[required[i]] == null) {
        throw `Error: this.${required[i]} undefined or null.`;
      }
    }

    if (this.next == null && this.choices == null) {
      throw `Error: Both this.next and this.choices undefined or null.`;
    }

    let base = document.createElement("div");
    base.setAttribute("id", "start");
    base.setAttribute("style", "display: none");

    let title = document.createElement("h5");
    title.setAttribute("class", "card-title");
    let titleText = document.createTextNode(this.title);
    title.appendChild(titleText);
    base.appendChild(title);

    let text = document.createElement("p");
    text.setAttribute("class", "card-text");
    let textText = document.createTextNode(this.text);
    text.appendChild(textText);
    base.appendChild(text);

    if (this.choices) {
      for (let i = 0; i < this.choices.length; i++) {
        let label = document.createElement("label");
        label.setAttribute("for", `${this.short}-${i}`);
        label.setAttribute("class", "radio-input");

        let input = document.createElement("input");
        input.setAttribute("type", "radio");
        input.setAttribute("id", `${this.short}-${i}`);
        input.setAttribute("value", `${this.choices[i].target}`);
        input.setAttribute("name", `${this.id}`);
        label.appendChild(input);

        let labelText = document.createTextNode(this.choices[i].text);
        label.appendChild(labelText);

        base.appendChild(label);

        let lineBreak = document.createElement("br");
        base.appendChild(lineBreak);
      }
    }

    return base;
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
    currentPage.hide('fast', () => {
      pagesContainer.empty();
      pagesContainer.html(html);

      let newPage = $('#pages-container > *');

      newPage.show('fast', () => {
        if (this.next) {
          nextPageButton.setNext(this.next);
        }

        // if there are still entries in the queue for previous pages
        if (prevPageButton.queue.length) prevPageButton.enable();

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