function changeLocale(language) {
    fetch(`${language}.json`)
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            const change = document.querySelectorAll('[data-id]');
            change.forEach(elem => {
                const keys = elem.dataset.id;
                elem.innerHTML = digObject(json, keys);
            });
        });
}

function digObject(obj, prop) { // big thanks to @Miraris#0001
    return prop.split('.').reduce((acc, cur) => {
        return acc ? acc[cur] : undefined
    }, obj || self)
}

function getURLLang() {
    const suffix = window.location.search;
    const search = suffix.indexOf('lang=');

    if (search > -1) { // indexOf returns -1 if nothing found
        return suffix.substring(search + 5, search + 7);
    } else {
        return null;
    }
}

function setURLLang(locale) {
    const suffix = window.location.search;
    const regex = /(?:\?|&)lang=([^&]*)/ig;
    const regArray = regex.exec(suffix);

    if (regArray)

    if (searchStart > -1) { // indexOf returns -1 if nothing found
        // lang= found
        // now we wanna find the end of the value


        const pre = suffix.substring(0, search + 5);
        const post = suffix.substring(search + 7, suffix.length);

        window.history.pushState(null, null, pre + locale + post);
        // re-assembles everything before lang and after, only changing the value
    } else {
        // no lang= found
        const searchFirst = suffix.indexOf('?');

        if (searchFirst > -1) {
            // there is a ? parameter
            const add = `&lang=${locale}`;
            window.history.pushState(null, null, window.location.search + add);
            // puts &lang=something at the end of the URL
        } else {
            // there is no ? parameter, therefore no others, maybe #anchor
            const add = `?lang=${locale}`;
            window.history.pushState(null, null, add + window.location.search);
            // puts ?lang=something at the beginning of the URL
        }
    }
}

function isSupportedLang(locale) {
    const languages = ["de", "en", "fr", "es", "it"];
    return (languages.indexOf(locale) > -1);
}

/*(function() { // gets executed on DOM ready
    const URLLang = getURLLang(); // get ?lang= or &lang=
    let locale;

    if (isSupportedLang(URLLang)) {
        // prioritize URL set language over browser language
        // required in order to allow sharing links where the language persists
        locale = URLLang;
    } else if (isSupportedLang(browserLang)) {
        locale = browserLang;
        setURLLang(locale);
    } else {
        locale = "en";
        setURLLang("en");
    }

    console.log(`Locale: ${locale}`);
})();*/