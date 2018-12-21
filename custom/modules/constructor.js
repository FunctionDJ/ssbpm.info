console.log('constructor.js loaded');

class element {
  constructor(name, attributes, text) {
    this.element = document.createElement(name);
    if (attributes) this.addAttr(attributes);
    if (text) this.addText(text);
  }

  addAttr(attributes) {
    for(var key in attributes) {
      this.element.setAttribute(key, attributes[key]);
    }
  }

  addText(text) {
    this.element.appendChild(document.createTextNode(text));
  }

  attachChild(element) {
    this.element.appendChild(element.element);
  }

  attachHTML(html) {
    this.element.insertAdjacentHTML('beforeend', html);
  }
}