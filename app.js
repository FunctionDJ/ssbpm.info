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

const renderPug = (file, filepath, basepath, includePath, relativePath) => {
  renderLang.forEach((lcode) => {

    const tbodyPath = path.join(basepath, 'lang', `${lcode}.json`);
    const theaderPath = path.join(includePath, 'modules', 'header-lang', `${lcode}.json`);
    const tfooterPath = path.join(includePath, 'modules', 'footer-lang', `${lcode}.json`);

    // if any translation file is missing
    if (!fs.existsSync(tbodyPath)) {
      console.log(`ERROR: Couldn't render ${filepath} for language '${lcode}' because ${tbodyPath} is missing! Skipping this file...`);
      return
    }
    if (!fs.existsSync(theaderPath)) {
      console.log(`ERROR: Couldn't render ${filepath} for language '${lcode}' because ${theaderPath} is missing! Skipping this file...`);
      return
    }
    if (!fs.existsSync(tfooterPath)) {
      console.log(`ERROR: Couldn't render ${filepath} for language '${lcode}' because ${tfooterPath} is missing! Skipping this file...`);
      return
    }

    // get main translation
    const tbody = JSON.parse(fs.readFileSync(tbodyPath));

    // get header translation
    const theader = JSON.parse(fs.readFileSync(theaderPath));

    // get footer translation
    const tfooter = JSON.parse(fs.readFileSync(tfooterPath));

    if (lcode == 'en') {
      var lpath = '';
    } else {
      var lpath = '/' + lcode;
    }

    let html = pug.renderFile(filepath, {
      lcode: lcode,
      lpath: lpath,
      t: tbody,
      th: theader,
      tf: tfooter,
      basedir: includePath,
      sd: sd,
      pretty: true
    });

    let basePathExplode = includePath.split(path.sep);
    basePathExplode.pop(); // remove last array element
    let newBasePath = path.join(...basePathExplode);

    let relPathExplode = relativePath.split(path.sep);
    relPathExplode.shift(); //remove first array element

    if (lcode == 'en') {
      var destPath = path.join(newBasePath, 'html', ...relPathExplode);
    } else {
      var destPath = path.join(newBasePath, 'html', lcode, ...relPathExplode);
    }

    let destFile = path.join(destPath, path.basename(filepath, '.pug') + '.html')

    fs.mkdirSync(destPath, {recursive: true}, (err) => {
      if (err) {
        console.log(err);
      }
    });

    fs.writeFileSync(destFile, html, function(err) {
      if (err) {
        console.log(err);
      }
    });

    console.log(`Rendered ${destFile}`);
  })
}

file.walkSync('pug\\', (dirPath, dirs, files) => {
  for(var key in files) {
    let file = path.basename(files[key]);
    let filepath = path.join(__dirname, dirPath, file);
    let basepath = path.join(__dirname, dirPath);
    let includePath = path.join(__dirname, 'pug');
    if (path.extname(filepath) == '.pug' && dirPath != 'pug\\modules') {
      renderPug(file, filepath, basepath, includePath, dirPath);
    }
  }
})