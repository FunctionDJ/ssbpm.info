console.log('language.js loaded');

function changeLocale() {
  const change = document.querySelectorAll('[data-t]'); // get all elements that have a data-t attribute and puts them into an array
  change.forEach(elem => { // for each individual element do
    const keys = elem.dataset.t; // get the value of the data-t attribute
    elem.innerHTML = digObject(translation, keys); // change the inner html of the element from the translations
  });
}

function digObject(obj, prop) { // big thanks to @Miraris#0001 on DevCord
  return prop.split('.').reduce((acc, cur) => { // split the given propery (string) by period
    // take the subobject / subproperty if there is still something after the period left, traversing the object tree
    // i.e. "key.subkey.property" will translate to key=>subkey=>property (and it's value)
    return acc ? acc[cur] : undefined
  }, obj || self)
}

(function() { // execute after page load
  //changeLocale();
})();