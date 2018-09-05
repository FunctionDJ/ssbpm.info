console.log("guide.js loaded");
const debugmode = true;

function debugLog(ind, log) {
  if (debugmode) {
    var spaces = '';
    for (let i = 0; i < ind; i++) {
      spaces += '  ';
    }
    console.log(spaces + log);
  }
}

function nextPage() {
  debugLog(1, 'nextPage() called');
  let current = window.location.hash;
  let page = current.substr(6);
  debugLog(2, 'page = ' + page);
  let next = '#page-' + ++page;
  $(current).hide('fast');
  $(next).show('fast');
  $('#prevPageButton').attr('href', current);
  $('#nextPageButton').attr('href', next);
}

function prevPage() {
  debugLog(1, 'prevPage() called');
  let current = window.location.hash;
  let page = current.substr(6);
  debugLog(2, 'page = ' + page);
  let prev = '#page-' + --page;
  debugLog(2, 'prev = ' + prev);
  $(current).hide('fast');
  $(prev).show('fast');
  $('#prevPageButton').attr('href', prev);
  $('#nextPageButton').attr('href', current);
}

(function() { // run after full page load
  
  $('#page-2').show();
})();