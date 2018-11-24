console.log('language.js loaded');

// big thanks to @Miraris#0001 and @qnp#4091
// this regular expression matches "[something](in-site-link)"
// this is required to add "/xx/" country code to the beginning of JS-loaded links
const regex = /(\[[^\]]+\]\()(?!http)([^)]*)(?=\))/gm; // regular expression
const converter = new showdown.Converter(); // initialize showdown converter
const debug = false;

function changeLocale(lang, dataAttribute, translationObject) {
  debug ? console.log('') : null;
  debug ? console.log(`changeLocale('${lang}', '${dataAttribute}', '${translationObject}') called`) : null;
  const elements = document.querySelectorAll(`[data-${dataAttribute}]`); // get all elements with a data-t="" attribute
  elements.forEach(elem => { // for each individual element do
    debug ? console.log('') : null;
    debug ? console.log(`  Element: ${elem}`) : null;
    let key = elem.dataset[dataAttribute]; // the key is the value of data-t="value"
    debug ? console.log(`    Key: ${key}`) : null;

    if (digObject(translationObject, key)) {// if a translation was found
      let attributes = digObject(translationObject, key); // use digObject() to find the key after the last period and return it's value
      debug ? console.log(`   Translation found: ${attributes}`) : null;
      if (typeof attributes == 'string') { // if the attributes is a string
        elem.innerHTML = mark2HTML(attributes, lang); // just change the innerHTML
      } else { // but if it's an object
        for (let attr in attributes) { // do for all individual subkey of attributes
          if (attr = 'html') { // if the key is html change the innerHTML of the element
            elem.innerHTML = mark2HTML(attributes[attr], lang); // same as attributes['html'] in this case
          } else { // otherwise change the attribute the key is named after, like href or title or whatever
            elem.setAttribute(attr, attributes[attr]);
          }
        }
      }
    } else { // if no translation was found
      debug ? console.log(`    No translation found`) : null;
      elem.innerHTML = mark2HTML(elem.innerHTML, lang); // just process the current HTML content
    }
  });
  debug ? console.log('') : null;
}

function mark2HTML(string, lang) {
  debug ? console.log('') : null;
  debug ? console.log(`      mark2HTML('${string}', '${lang}') called`) : null;

  if (lang == 'en') {
    lang = '';
  } else {
    lang = '/' + lang; // with a /xx language code and then the link
  }

  let result = string.replace(regex, function(_, a, b) { // replace the matched link
    return a + lang + b;
    // so that [title](/link/) will become [title](/xx/link)
  });

  debug ? console.log(`        result = '${result}'`) : null;

  result = converter.makeHtml(result); // convert translation or inner HTML of the element if no translation
  
  debug ? console.log(`        result = '${result}'`) : null;

  result =  result.substring(3, result.length - 4); // trim generated <p></p> by showdown.js
  
  debug ? console.log(`        result = '${result}'`) : null;
  debug ? console.log('') : null;

  return result;
}

function digObject(obj, prop) { // big thanks to @Miraris#0001 on DevCord
  return prop.split('.').reduce((acc, cur) => { // split the given propery (string) by period
    // take the subobject / subproperty if there is still something after the period left, traversing the object tree
    // i.e. "key.subkey.property" will translate to key=>subkey=>property (and it's value)
    return acc ? acc[cur] : undefined
  }, obj || self)
}

(function() { // execute after page load
  // changeLocale(translation['lang-code']);
  changeLocale(translation['lang-code'], 'h', header);
  changeLocale(translation['lang-code'], 't', translation);
  changeLocale(translation['lang-code'], 'f', footer);
})();