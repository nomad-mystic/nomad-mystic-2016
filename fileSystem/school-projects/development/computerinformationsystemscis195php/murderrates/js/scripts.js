/*
    Programmer = Keith Murphy
    File = scripts.js
    Date Created = 10_9_2015
    Last Mod = 10_13_2015
 */

$(document).ready(function() {

    $('.accordion').accordion({
        heightStyle: 'content',
        collapsible: true,
        active: false,
        icons: {
            "header": "ui-icon-plus",
            "activeHeader": "ui-icon-minus"
        }
    });

    //// For the 2012 Murder Rates in the USA
    $.get('data/murder_rate_2012.php', function(data) {

        var parsedData = jQuery.parseJSON(data);

        // The North East
        for (var ne=0; ne < parsedData.theNorthEast.length; ne++) {

            var theNorthEast = $('.murderRate2012 .theNorthEast');

            theNorthEast.append($('<h4></h4>', {
                class: 'displayBlock' ,
                text: parsedData.theNorthEast[ne].stateName
            }));
            theNorthEast.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theNorthEast[ne].stateRate
            }));
            theNorthEast.append($('<span></span>', {
                text: parsedData.theNorthEast[ne].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // The Midwest
        for (var mw=0; mw < parsedData.theMidwest.length; mw++) {

            var theMidwest = $('.murderRate2012 .theMidwest');

            theMidwest.append($('<h4></h4>', {
                class: 'displayBlock' ,
                text: parsedData.theMidwest[mw].stateName
            }));
            theMidwest.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theMidwest[mw].stateRate
            }));
            theMidwest.append($('<span></span>', {
                text: parsedData.theMidwest[mw].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // The West North Central
        for (var wnc=0; wnc < parsedData.theWestNorthCentral.length; wnc++) {
            var theWestNorthCentral = $('.murderRate2012 .theWestNorthCentral');
            theWestNorthCentral.append($('<h4></h4>', {
                class: 'displayBlock' ,
                text: parsedData.theWestNorthCentral[wnc].stateName
            }));
            theWestNorthCentral.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theWestNorthCentral[wnc].stateRate
            }));
            theWestNorthCentral.append($('<span></span>', {
                text: parsedData.theWestNorthCentral[wnc].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // The South
        for (var so=0; so < parsedData.theSouth.length; so++) {
            var theSouth = $('.murderRate2012 .theSouth');
            theSouth.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theSouth[so].stateName
            }));
            theSouth.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theSouth[so].stateRate
            }));
            theSouth.append($('<span></span>', {
                text: parsedData.theSouth[so].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // the East South Central
        for (var esc=0; esc < parsedData.theEastSouthCentral.length; esc++) {
            var theEastSouthCentral = $('.murderRate2012 .theEastSouthCentral');
            theEastSouthCentral.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theEastSouthCentral[esc].stateName
            }));
            theEastSouthCentral.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theEastSouthCentral[esc].stateRate
            }));
            theEastSouthCentral.append($('<span></span>', {
                text: parsedData.theEastSouthCentral[esc].stateRate,
                class: 'paddingLeft'
            }));
        } // End For Loop

        // The South West Central
        for (var swc=0; swc < parsedData.theSouthWestCentral.length; swc++) {

            var theSouthWestCentral = $('.murderRate2012 .theSouthWestCentral');

            theSouthWestCentral.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theSouthWestCentral[swc].stateName
            }));
            theSouthWestCentral.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theSouthWestCentral[swc].stateRate
            }));
            theSouthWestCentral.append($('<span></span>', {
                text: parsedData.theSouthWestCentral[swc].stateRate,
                class: 'paddingLeft'
            }));
        }// End For Loop

        // The West
        for (var w=0; w < parsedData.theWest.length; w++) {

            var theWest = $('.murderRate2012 .theWest');

            theWest.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theWest[w].stateName
            }));
            theWest.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theWest[w].stateRate
            }));
            theWest.append($('<span></span>', {
                text: parsedData.theWest[w].stateRate,
                class: 'paddingLeft'
            }));
        } // End For Loop

        // The Pacific
        for (var p=0; p < parsedData.thePacific.length; p++) {

            var thePacific = $('.murderRate2012 .thePacific');

            thePacific.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.thePacific[p].stateName
            }));
            thePacific.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.thePacific[p].stateRate
            }));
            thePacific.append($('<span></span>', {
                text: parsedData.thePacific[p].stateRate,
                class: 'paddingLeft'
            }));
        } // End For Loop
    }); // end get 2012

    /////////////////This is for the 2011 Data
    $.get('data/murder_rate_2011.php', function(data) {
        var parsedData = jQuery.parseJSON(data);

        // The North East
        for (var ne=0; ne < parsedData.theNorthEast.length; ne++) {

            var theNorthEast = $('.murderRate2011 .theNorthEast');

            theNorthEast.append($('<h4></h4>', {
                class: 'displayBlock' ,
                text: parsedData.theNorthEast[ne].stateName
            }));
            theNorthEast.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theNorthEast[ne].stateRate
            }));
            theNorthEast.append($('<span></span>', {
                text: parsedData.theNorthEast[ne].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // The Midwest
        for (var mw=0; mw < parsedData.theMidwest.length; mw++) {

            var theMidwest = $('.murderRate2011 .theMidwest');

            theMidwest.append($('<h4></h4>', {
                class: 'displayBlock' ,
                text: parsedData.theMidwest[mw].stateName
            }));
            theMidwest.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theMidwest[mw].stateRate
            }));
            theMidwest.append($('<span></span>', {
                text: parsedData.theMidwest[mw].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // The West North Central
        for (var wnc=0; wnc < parsedData.theWestNorthCentral.length; wnc++) {

            var theWestNorthCentral = $('.murderRate2011 .theWestNorthCentral');
            theWestNorthCentral.append($('<h4></h4>', {
                class: 'displayBlock' ,
                text: parsedData.theWestNorthCentral[wnc].stateName
            }));
            theWestNorthCentral.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theWestNorthCentral[wnc].stateRate
            }));
            theWestNorthCentral.append($('<span></span>', {
                text: parsedData.theWestNorthCentral[wnc].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // The South
        for (var so=0; so < parsedData.theSouth.length; so++) {
            var theSouth = $('.murderRate2011 .theSouth');
            theSouth.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theSouth[so].stateName
            }));
            theSouth.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theSouth[so].stateRate
            }));
            theSouth.append($('<span></span>', {
                text: parsedData.theSouth[so].stateRate,
                class: 'paddingLeft'
            }));
        } // End For loop

        // the East South Central
        for (var esc=0; esc < parsedData.theEastSouthCentral.length; esc++) {
            var theEastSouthCentral = $('.murderRate2011 .theEastSouthCentral');
            theEastSouthCentral.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theEastSouthCentral[esc].stateName
            }));
            theEastSouthCentral.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theEastSouthCentral[esc].stateRate
            }));
            theEastSouthCentral.append($('<span></span>', {
                text: parsedData.theEastSouthCentral[esc].stateRate,
                class: 'paddingLeft'
            }));
        } // End For Loop

        // The South West Central
        for (var swc=0; swc < parsedData.theSouthWestCentral.length; swc++) {

            var theSouthWestCentral = $('.murderRate2011 .theSouthWestCentral');

            theSouthWestCentral.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theSouthWestCentral[swc].stateName
            }));
            theSouthWestCentral.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theSouthWestCentral[swc].stateRate
            }));
            theSouthWestCentral.append($('<span></span>', {
                text: parsedData.theSouthWestCentral[swc].stateRate,
                class: 'paddingLeft'
            }));
        }// End For Loop

        // The West
        for (var w=0; w < parsedData.theWest.length; w++) {

            var theWest = $('.murderRate2011 .theWest');

            theWest.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.theWest[w].stateName
            }));
            theWest.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.theWest[w].stateRate
            }));
            theWest.append($('<span></span>', {
                text: parsedData.theWest[w].stateRate,
                class: 'paddingLeft'
            }));
        } // End For Loop

        // The Pacific
        for (var p=0; p < parsedData.thePacific.length; p++) {

            var thePacific = $('.murderRate2011 .thePacific');

            thePacific.append($('<h4></h4>', {
                class: 'displayBlock',
                text: parsedData.thePacific[p].stateName
            }));
            thePacific.append($('<progress></progress>', {
                max: 2000,
                value: parsedData.thePacific[p].stateRate
            }));
            thePacific.append($('<span></span>', {
                text: parsedData.thePacific[p].stateRate,
                class: 'paddingLeft'
            }));
        } // End For Loop
    }); // End get 2011
}); // End $Ready
