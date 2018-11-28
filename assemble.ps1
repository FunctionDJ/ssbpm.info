Write-Host 'Converting SCSS to CSS...'
sass .\custom\modules\main.scss .\custom\modules\main.css

Write-Host 'Copying customs...'
xcopy .\custom .\html /EXCLUDE:excludedFilesFromCustom.txt /S /I /R /Y /Q

Write-Host 'Rendering Pug files...'
node app.js