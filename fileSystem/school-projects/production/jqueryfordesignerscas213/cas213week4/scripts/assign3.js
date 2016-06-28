
//File Name: assign4.1.js
//Date: 10-8-2014
//Programmer: Keith Murphy

$(document).ready(function() {
     dynamicFaq();
	 $('#scrolling').jScrollPane({
	     showArrows: true,
		 verticalGutter: 30,
		 hijackInternalLinks: true,
		 animateScroll: true
		 
	}); //for the id scrolling
}); //for the ready


function dynamicFaq() {
	    $('dd').hide();
		$('dt').bind('click', function() {
		     $(this).toggleClass('open').next().slideToggle();
		
		});  // for the click 
} // for the dynamic function 