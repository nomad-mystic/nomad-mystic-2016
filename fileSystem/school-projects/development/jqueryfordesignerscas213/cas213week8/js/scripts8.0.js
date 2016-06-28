$(document).ready(function() {
	$('#book-grid').dataTable({
		'sPaginationType' : 'full_numbers',
		'bJQueryUI' : true,
		'bFilter' : false,
		'aaSorting' : [[4, 'desc']]
	});
});//end ready