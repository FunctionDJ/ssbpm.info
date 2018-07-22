// a simple function to change the locale
var set_locale_to = function(locale) {
  
  // change i18n locale
  if (locale) {
    $.i18n().locale = locale;
  }
  
  // apply i18n change to all body contents
  $('body').i18n();
};

var update_stuff = function(locale) {
  if(locale) {
    
    console.log('update_stuff called');
  
    /* UPDATE LINKS ON THE WEBSITE WITH THE LOCALE */
    // only attach ?lang locale if locale is defined and has a value
    var siteURL = "http://" + top.location.host.toString();

    // console.log('update_links was called with the locale value : ' + locale)

    // the below (outcommented) line enforces a lesser border on all links before the thicker border was applied
    // because if the element list should change for the filter (it shouldn't) it would just ADD those elements to the visual aid
    // with this it's basically like a clear and makes sure ONLY the elements matched by the filter last time it ran are marked thick
    // $('a[href]').css('border', '1px #222 dotted');


    // select all <a with a href that doesn't start with http or with #
    // (external links or anchors where the locale persist anyway)
    // AND select all a with a href that starts with the siteURL (like http://ssbpm.info or http://127.0.0.1)
    // but none CONTAINING a #
    // $('a[href]:not([href^="http"]):not([href^="#"]), a[href^="'+siteURL+'"]:not([href~="#"]').css('border', '3px #222 dotted');
    // the above line of code marks all target elements with a dotted border to see if the filter is correct

    // same selector
    $('a[href]:not([href^="http"]):not([href^="#"]), a[href^="'+siteURL+'"]:not([href~="#"]').each(function() {
      var parts = this.href.split("#"); // split original href at #
      parts[0] = parts[0].replace(/\?.*/,""); // remove anything starting with a ? from the base
      if(parts[1] != null && parts[1] != '') { // if second string is not empty (there is a # where it was split)
        this.href = parts[0] + "?lang=" + locale + "#" + parts[1]; // make href like URL?lang=en#anchor
      } else {
        this.href = parts[0] + "?lang=" + locale; // otherwise make href like URL?lang=en
      }

      /* you may ask why all this mumbo jumbo?
        well there are links which have an anchor at the end of their href like
        /wiki/exploits/#letterbomb
        but since according to this https://stackoverflow.com/questions/12682952/proper-url-forming-with-query-string-and-anchor-hashtag
        the order should be ?params and then #anchors i didn't even test and just
        made this code that strips the entire code into parts and re-assembles it

        first it removes the anchor and saves it if there is one
        then it strips the locale if there is one
        then it re-assembles the href with the original part, the locale and then optionally the anchor
      */
    
    });
    
    /* UPDATE FLAGS */
    // this removes all classes from the element with the id "flag" and adds the classes flag-icon and flag-icon-xx
    $('#flag-d, #flag-m').removeClass();
    $('#flag-d, #flag-m').addClass('flag-icon');
    
    if(locale == 'en') { // en is not a valid country code for the css flags, it's gb
      $('#flag-d, #flag-m').addClass('flag-icon-gb');
    } else {
      $('#flag-d, #flag-m').addClass('flag-icon-' + locale);
    }
    
    /* locale list
    deu - de - germany (german)
    gbr - gb - great britain (english)
    dnk - dk - denmark (danish)
    fra - fr - france (french)
    grc - gr - greece (greek)
    fin - fi - finland (finnish)
    ita - it - italy (italian)
    swe - se - sweden (swedish)
    esp - es - spain (spanish)
    */
    
    /* UPDATE TEXT NEXT TO FLAG */
    
    switch(locale) {
      case 'de': $('.flag-text').html('DEU'); break;
      case 'en': $('.flag-text').html('ENG'); break;
      case 'dk': $('.flag-text').html('DNK'); break;
      case 'fr': $('.flag-text').html('FRA'); break;
      case 'gr': $('.flag-text').html('GRC'); break;
      case 'fi': $('.flag-text').html('FIN'); break;
      case 'it': $('.flag-text').html('ITA'); break;
      case 'se': $('.flag-text').html('SWE'); break;
      case 'es': $('.flag-text').html('ESP'); break;
    }
    
  }
};

jQuery(function($) {
  
  // activate bootstrap popover and tooltip
  $(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();
  });
  
  $('[data-trigger="focus"]').click(function(){
    this.popover('hide');
  });
  
  // load all the translations
  $.i18n().load( {
    'en': 'i18n/en.json',
    'de': 'i18n/de.json'
  } ).done( function() { 
    
    /*
    
    everything in here happens once all the translation have been loaded
    
    */
    
    // all links inside a parent element with the class .switch-locale lose their default behaviour and instead
    // change the URL ?lang= parameter
    $('.switch-locale').on('click', 'a', function(e) {
      var locale = $(this).data('locale');
      e.preventDefault();
      History.pushState(null, null, "?lang=" + locale);
      
      // update all links on locale change
      update_stuff(locale);
    });
    
    // get locale from the URL and set it as the locale (function from the very top)
    set_locale_to(url('?lang'));
    
    // update all links on page load
    update_stuff(url('?lang'));
    
    // listen for changes and change the locale accordingly
    // if there is no locale in the URL, default to lang="en" from <html>
    History.Adapter.bind(window, 'statechange', function(){
      set_locale_to(url('?lang'));
    });
    
    // output something to the console to indicate successful loading
    console.log('jQuery.i18n successfully loaded 💪');
  } );
  
  // 'en' is the default, not needed because jQuery.i18n checks for the <html lang=""> attribute but this might be useful later
  /*
  $.i18n( {
    locale: 'en'
  });
  */
  
});