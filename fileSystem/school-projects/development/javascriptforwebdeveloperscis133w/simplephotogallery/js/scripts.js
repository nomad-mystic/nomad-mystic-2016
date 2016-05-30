$(document).ready(function() {
    // this technique doesn't work well.  Two separate images must be used: old and new, layered on top of one another.
    //$("#divBigImage img").fadeTo(0, 0);
    /*
     $('div#thumbnails a').hover(
         function() {
             var sHref = $(this).attr("href");
             $("#divBigImage img").attr("src", sHref);
             $("#divBigImage img").fadeTo(2000, 1);
         },
         function() {
             $("#divBigImage img").fadeTo(1000, 0);
         }
     );
     */
    // this seems to work just fine
    // 2: show the first image when the page is loaded
    var sHref =	$("div#thumbnails li:first > a").attr("href");
    $("#divBigImage img").attr("src", sHref);

    // 1: loop thrue each of thumbnail anchor tags, and attach a mouseover event to each
    $('div#thumbnails a').mouseover(
        function() {
            $("#divBigImage img").hide();
            $("#divBigImage img").attr("src", $(this).attr("href"));
            $("#divBigImage img").fadeIn(1000);
        }
    );

    // 3: if you want to disable the thumbnail click.
    // Otherwise, the big pic will display in a separate window
    // $('div#thumbnails a').click(
    // 	function() {
    // 		return false;
    // 	}
    // );
}); // ready
