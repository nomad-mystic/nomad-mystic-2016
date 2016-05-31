/*--
File = scripts.js
programmer = Keith Murphy
Date = 110-30-2014
--*/

$(document).ready(function() {
    $('a[title]').qtip({
	   position:{
	      my : 'bottom center',
		  at : 'center right'
		},
		style : {
		   classes : 'ui-tooltip-purple'
		}
	});//end qtip
});// end ready