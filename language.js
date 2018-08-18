console.log('language.js loaded');

function changeLocale(language) {
    fetch(`/${language}/${language}.json`)
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            const change = document.querySelectorAll('[data-id]');
            change.forEach(elem => {
                const keys = elem.dataset.id;
                elem.innerHTML = digObject(json, keys);
            });

            console.log(`  ${json.language} loaded`);
        });
}

function digObject(obj, prop) { // big thanks to @Miraris#0001
    return prop.split('.').reduce((acc, cur) => {
        return acc ? acc[cur] : undefined
    }, obj || self)
}

(function() {
    changeLocale(language);
})();