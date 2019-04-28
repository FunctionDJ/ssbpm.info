const express = require('express')
const app = express()
const port = 3000
const path = require("path")
const sass = require("node-sass")
const fs = require("fs")

const languages = ["de", "fr"]

/*app.use(sass({
  src: path.join(__dirname, "src/sass"),
  dest: path.join(__dirname, "src/css"),
  indentedSyntax: true,
  prefix: '/css',
  response: false
}))*/

// app.use("/css", express.static("src/css"))

app.set("view engine", "pug")
app.set("views", path.join(__dirname, "/src"))

app.get('*', (req, res) => {
  let folders = req.originalUrl.split("/").filter(v => v !== "")

  let fileName = ""
  if (folders[0]) {
    fileName = folders.slice(-1)[0]
  }

  if (folders[0] === "en") {
    handleEnPath(res, folders)
    return
  }

  if (fileName.endsWith(".css")) {
    handleCSS(res, folders)
    return
  }

  if (!fileName.includes(".")) {
    handlePug(res, folders)
    return
  }

  res.send("What are you looking for?")
})

app.listen(port, () => {
  console.log(`Example app listening on port ${port}!`)
  console.log(`Server should run on http://localhost:3000`)
})

const handleCSS = (res, folders) => {
  let cssPath = path.parse(
    path.join(...folders)
  )

  let sassPath = path.join("src", cssPath.dir, cssPath.name + ".sass")
  console.log(sassPath)
  
  sass.render({
    file: sassPath
  }, (err, result) => {
    console.log(result)
    res.setHeader("Content-Type", "text/css")
    res.send(result.css)
  })
}

const handleEnPath = (res, folders) => {
  folders.shift()
  res.redirect("/" + folders.join("/"))
}

const handlePug = (res, folders) => {
  let lang = "en"

  if (languages.includes(folders[0])) {
    lang = folders.shift()
  }

  let indexFile = path.join(...folders, "index")

  let metaTranslation = JSON.parse(
    fs.readFileSync(
      path.join("src", "components", "lang", `${lang}.json`)
    )
  )

  let contentTranslation = JSON.parse(
    fs.readFileSync(
      path.join("src", ...folders, "lang", `${lang}.json`)
    )
  )

  let translation = {
    m: metaTranslation,
    t: contentTranslation
  }

  try {
    res.render(indexFile, translation)
  } catch (e) {
    throw new Error(e)
  }
}