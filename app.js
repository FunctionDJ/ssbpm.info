const path = require('path');
const fs = require('fs');
const pug = require('pug');
const file = require('file');

var showdown = require('showdown'),
    converter = new showdown.Converter();

const sd = (md) => {
  let raw = converter.makeHtml(md);
  return raw.substring(3, raw.length - 4)
}

const renderLang = ['en', 'de'];

file.walkSync('pug\\', (dirPath, dirs, files) => {
  for(var key in files) {
    let file = files[key];
    let filepath = path.join(__dirname, dirPath, file);
    let basepath = path.join(__dirname, dirPath);
    let includePath = path.join(__dirname, 'pug');
    if (path.extname(filepath) == '.pug' && dirPath != 'pug\\modules') {
      renderPug(file, filepath, basepath, includePath);
    }
  }
})

process.exit();


file.walk('./pug/', (nullValue, dirPath, dirs, files) => {
  for(var key in files) {
    let file = files[key];
    if (path.extname(file) = '.pug') {
      renderLang.forEach((lcode) => {

        const tbody = JSON.parse(fs.readFileSync(`${__dirname}/lang/${lcode}.json`));
      });
    }
  }
});

const renderPug = (file, filepath, basepath, includePath) => {
  renderLang.forEach((lcode) => {

    // get main translation
    const tbodyPath = path.join(basepath, 'lang', `${lcode}.json`);
    const tbody = JSON.parse(fs.readFileSync(tbodyPath));

    // get header translation
    const theaderPath = path.join(includePath, 'modules', 'header-lang', `${lcode}.json`);
    const theader = JSON.parse(fs.readFileSync(theaderPath));

    // get footer translation
    const tfooterPath = path.join(includePath, 'modules', 'footer-lang', `${lcode}.json`);
    const tfooter = JSON.parse(fs.readFileSync(tfooterPath));

    let html = pug.renderFile(filepath, {
      lcode: lcode,
      t: tbody,
      th: theader,
      tf: tfooter,
      basedir: includePath,
      sd: sd
    });

    let destPath = path.join(basepath, path.basename(filepath) + '.html');

    fs.writeFile(destPath, html, function(err) {
      if (err) {
        console.log(err);
      }

      console.log(`${destPath} saved`);
    })
  })
}