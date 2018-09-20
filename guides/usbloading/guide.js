console.log("guide.js loaded");
const debugmode = true;

var currentPage = '';
var nextChoicePage= '';

function debugLog(ind, log) {
  if (debugmode) {
    var spaces = '';
    for (let i = 0; i < ind; i++) {
      spaces += '  ';
    }
    log ? console.log(spaces + log) : console.log('');
  }
}

function nextPage() {
  debugLog();
  debugLog(1, 'nextPage() called');

  // get next page
  let nextPage = nextChoicePage || $(currentPage).data('next');
  debugLog(2, `Next page is set to: '${nextPage}'`)

  // set prev page attribute
  $(nextPage).data('prev', currentPage);

  // load next page
  loadPage(nextPage);
}

function prevPage() {
  debugLog();
  debugLog(1, 'prevPage() called');

  // get previous page, either from the prev attribute or the fallback
  // fallback is an attribute pages will have that don't have one exact
  // previous page, because of user input choices.
  // the user should land at that choice again.
  // this is ONLY the case when there has not been made a choice,
  // for instance, when the user refreshes.
  // because of the nextPage() function, usually a previous page should be set
  let prevPage = $(currentPage).data('prev') || $(currentPage).data('fallback');

  // load previous page
  loadPage(prevPage);
}

function loadPage(page) {
  debugLog();
  debugLog(1, `loadPage('${page}') called`);

  // set current page
  currentPage = page;

  // set previous button to previous page
  // get the prevpage attribute from the current page
  let prevPage = $(currentPage).data('prev');
  setPrevPage(prevPage);

  // remove all click handlers from all radio buttons
  $('.radio-input input').off('click');
  debugLog(2, 'Removed all click handlers from radio buttons')

  // hide all pages
  $('#pages-container div').hide('fast');
  debugLog(2, 'Hiding all pages');

  // show new page
  $(page).show('fast');
  debugLog(2, `Showing requested page '${page}'`);

  // load next page link

  // if there are any user choices in the new page
  if ($(`${page} .radio-input`).length > 0) {
    debugLog(3, 'There are radio buttons on this page');

    $('#nextPageButton').show('fast');

    // if any of the buttons on this page are checked
    if ($(`${page} .radio-input input`).is(':checked')) {
      // enable the next page button
      $('#nextPageButton').removeClass('disabled');
      debugLog(3, 'Enabled Next button');
    } else {
      // disable the next page button
      $('#nextPageButton').addClass('disabled');
      debugLog(3, 'Disabled Next button');
    }

    // if any radio button group (that is the bordered clickable area) is clicked
    debugLog(3, 'Registering radio button click handlers');
    $(`${page} .radio-input input`).click(() => {
      debugLog(1, '');
      debugLog(1, 'Radio button clicked');
      
      // if any of the buttons on this page are checked
      if ($(`${page} .radio-input input`).is(':checked')) {
        debugLog(2, 'A radio button is checked');
        let buttonValue = $(`${page} .radio-input input:checked`).val();
        debugLog(2, `Value: '${buttonValue}'`);

        // change the next page attribute
        // this gets the value of the currently selected user option
        $(page).data('next', buttonValue);

        // set next page attributes on the button
        setNextPage(buttonValue);

        debugLog(2, `Next attribute now: '${$(page).data('next')}'`)

        // remove the disabled group on the next button (makes it clickable)
        $('#nextPageButton').removeClass('disabled');
        debugLog(2, 'Enabled Next button');
      }
    });
  } else {
    // there are no radio buttons on this loaded page
    // set the nextPageButton's values
    // from the next attribute of the current page
    let nextPage = $(currentPage).data('next');
    setNextPage(nextPage);
  }
}

function setNextPage(page) {
  debugLog(0, `• setNextPage('${page}') called`);
  let button = $('#nextPageButton')
  if (page) {
    button.attr('href', page);
    button.show('fast');
  } else {
    button.hide();
  }
}

function setPrevPage(page) {
  debugLog(0, `• setPrevPage('${page}') called`);
  let button = $('#prevPageButton');
  if (page) {
    button.attr('href', page);
    button.show('fast');
  } else {
    button.hide();
  }
}

(function() { // run after full page load
  
  // if element with the id from the hash in the URI exists
  if ($(window.location.hash).length) {

    // show it
    loadPage(window.location.hash);
  } else {

    // show the first page (not final lol)
    loadPage('#start');
  }
})();