$(document).ready(function() {

	function externalLinks() {
		$('a.new-window').bind('click', function(event) {
			var location = $(this).attr('href');
			window.open(location);
			event.preventDefault();
		}); // for click
	} // for the externalLinks

	externalLinks();
}); //for the ready

