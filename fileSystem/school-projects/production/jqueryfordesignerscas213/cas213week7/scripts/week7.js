/*
    File Name = week7.js
    Programmer = Keith Murphy
    Date = 11-7-2014
*/
$(document).ready(function(){
    
    extraTabs(); // for opening link in new tab not part of the assignment week7

// for the assignment below    
    $('a[rel="dolomites"]').colorbox({
        speed : 1000,
        opacity : .5,
        fadeOut : 500
    });// end colorbox 
}); // end ready

/*---extra code for opening the link into a new tab---*/
function extraTabs() {
    $('a.externaltab').bind('click', function(extab){
        var location = $(this).attr('href');
        window.open(location);
        extab.preventDefault();
    });
} // end the extratabs function 