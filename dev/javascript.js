$(document).ready(function(){

    var engImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Grossbritanien.gif";
    var deuImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Deutschland.gif";
    var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";

    var imgBtnSel = $('#imgBtnSel');
    var imgBtnEng = $('#imgBtnEng');
    var imgBtnDeu = $('#imgBtnDeu');
    var imgBtnFra = $('#imgBtnFra');

    var imgNavSel = $('#imgNavSel');
    var imgNavEng = $('#imgNavEng');
    var imgNavDeu = $('#imgNavDeu');
    var imgNavFra = $('#imgNavFra');

    var spanNavSel = $('#lanNavSel');
    var spanBtnSel = $('#lanBtnSel');

    imgBtnSel.attr("src",engImgLink);
    imgBtnEng.attr("src",engImgLink);
    imgBtnDeu.attr("src",deuImgLink);
    imgBtnFra.attr("src",fraImgLink);

    imgNavSel.attr("src",engImgLink);
    imgNavEng.attr("src",engImgLink);
    imgNavDeu.attr("src",deuImgLink);
    imgNavFra.attr("src",fraImgLink);

    $( ".language" ).on( "click", function( event ) {
	var currentId = $(this).attr('id');

	 if (currentId == "navEng") {
	    imgNavSel.attr("src",engImgLink);
	    spanNavSel.text("ENG");
	} else if (currentId == "navDeu") {
	    imgNavSel.attr("src",deuImgLink);
	    spanNavSel.text("DEU");
	} else if (currentId == "navFra") {
	    imgNavSel.attr("src",fraImgLink);
	    spanNavSel.text("FRA");
	}

	if (currentId == "btnEng") {
	    imgBtnSel.attr("src",engImgLink);
	    spanBtnSel.text("ENG");
	} else if (currentId == "btnDeu") {
	    imgBtnSel.attr("src",deuImgLink);
	    spanBtnSel.text("DEU");
	} else if (currentId == "btnFra") {
	    imgBtnSel.attr("src",fraImgLink);
	    spanBtnSel.text("FRA");
	}
	
    });
});

$('body').scrollspy({
    target: '.bs-docs-sidebar',
    offset: 40
});

$(function () {
  $('[data-toggle="popover"]').popover()
})