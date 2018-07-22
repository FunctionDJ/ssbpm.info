var set_locale_to = function(locale) {
    if (locale) {
        $.i18n().locale = locale;
	}
	$('body').i18n();
};

jQuery(function() {
    $.i18n().load( {
        'en': './js/i18n/english.json',
        'de': './js/i18n/german.json',
        'fr': './js/i18n/french.json'
    } ).done(function() {
        set_locale_to(url('?locale'));
		
        History.Adapter.bind(window, 'statechange', function(){
			set_locale_to(url('?locale'));
        });
		
		// Switches the language when selecting a drop-down option
        $('.switch-locale').on('click', 'a', function(e) {
			e.preventDefault();
			History.pushState(null, null, "?locale=" + $(this).data('locale'));
        });
    });
});
