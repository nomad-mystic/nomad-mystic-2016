$(document).ready(function() {
    $('.answer').hide();
// >>> this page is providing a taste of javascript and jquery
    // $('#main h2').toggle(
    // 	function() {
    // 		// $(this).next('.answer').show();  // #1
    // 		$(this).next('.answer').slideDown("fast"); // #2: comment out #1 and uncomment this line
    // 		$(this).addClass('close');
    // 	},
    // 	function() {
    // 		// $(this).next('.answer').hide();  // #1
    // 		$(this).next('.answer').slideUp("fast"); // #2: comment out #1 and uncomment this line
    // 		$(this).removeClass('close');
    // 	}
    // ); // end toggle

// #3: comment out the entire jquery section above and uncomment out the following section to make it fade.
// fade in and out
    $('#main h2').toggle(
        function() {
            $(this).next('.answer').fadeIn();
            $(this).addClass('close');
        },
        function() {
            $(this).next('.answer').fadeOut();
            $(this).removeClass('close');
        }
    ); // end toggle
}); // ready