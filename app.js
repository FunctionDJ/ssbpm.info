const path = require('path');
const fs = require('fs');
const pug = require('pug');

var showdown = require('showdown'),
    converter = new showdown.Converter();

const sd = (md) => {
  let raw = converter.makeHtml(md);
  return raw.substring(3, raw.length - 4)
}

const translation = JSON.parse(fs.readFileSync(__dirname + "/lang/de.json"));

const html = pug.renderFile('index.pug', {
  t: translation,
  basedir: __dirname,
  sd: sd
});

fs.writeFile(__dirname + "/index.html", html, function(err) {
  if (err) {
    console.log(err);
  }

  console.log("File saved");
})