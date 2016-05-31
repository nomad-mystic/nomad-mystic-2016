/*
	file = assign8.1.js
	programmer = keith Murphy 
	date = 11-13-2014

*/
$(document).ready(function() {
    var loadingImage = $('<img src="images/ajax-loader.gif">');

    $('#jaxed-nav a').each(function(){
        $(this).attr('href', '#' + $(this).attr('href'));
    });// end each

    $(window).bind('hashchange', function(e) {
        var url = e.fragment;

        setTimeout(function(){
            $('#hole').load(url + ' #hole-fill');
        }, 1000); // added by RON

        $('#jaxed-nav li.current').removeClass('current');

        if (url) {
            $('#hole').append('<p id="loading"></p>');
            $('#loading').append(loadingImage);
            $('#jaxed-nav a[href="#' + url + '"]').parents('li').addClass('current');
            $('#hole-fill').fadeOut('fast', function(){
                $('#loading').show();
            });
        } else {
            $('#jaxed-nav li:first-child').addClass('current');

        }
    });//end hashchange

	$(window).trigger('hashchange');
});//end ready