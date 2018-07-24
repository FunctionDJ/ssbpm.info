<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PM on PAL Guide - ssbpm.info</title>

    <!-- script tag filled with the browser HTTP_ACCEPT_LANGUAGE variable from PHP script -->
    <script>
        <?php echo "const browserLang = '".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)."';\n" ?>
    </script>
</head>
<body>
    <p data-id="keys.paragraph">This is a paragraph.</p>
    <input type="button" onclick="changeLocale('sample');" value="Exec">
    <script src="locale.js"></script>
</body>
</html>