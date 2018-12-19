Write-Host 'Copying custom showdown.js file...'
cp .\node_modules\custom-showdown\dist\showdown.min.js .\custom\modules\custom-showdown.js -Force

Write-Host 'Converting SCSS to CSS...'
sass .\custom\modules\main.scss .\custom\modules\main.css

Write-Host 'Copying customs...'
xcopy .\custom .\html /EXCLUDE:excludedFilesFromCustom.txt /S /I /R /Y /Q

# /S exclude empty directories
# /I force assume directory
# /R overwrite read-only files
# /Y skip file overwrite prompts
# /Q skip OSD for copying files

Write-Host 'Rendering Pug files...'
node app.js