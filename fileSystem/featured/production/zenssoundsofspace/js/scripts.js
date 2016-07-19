/**
 * Created by endof on 2/11/2016.
 */
$(function() {
    // Init Fancy box plugin
    $(".fancybox").fancybox();


    $('#step1').on('click', function() {
        $('#zen-participation').stop().hide('slow');
    });
    $('#step2').on('click', function() {
        $('#zen-participation').stop().show('slow');
    });
    $('#step3').on('click', function() {
        $('.requirements').stop().fadeToggle(1000);
    });

    $('#step4').on('click', function() {
        $('.requirements').stop().slideToggle(1000);
    });

    $('#step5').on('click', function() {
        $('.requirements').stop().slideUp(1000)
            .slideDown(1000)
            .fadeOut(1000)
            .fadeIn(1000);
    });

    $('#step6').on('click', function(){
        $.get('data/spaceSounds.txt', function(data) {
            var parsedData = $.parseJSON(data);
            var output = '';
            output += '<h2 class="text-center">Sounds From Space</h2>';
            output += '<h5 class="text-center">Provided by NASA and SoundCloud.com API</h5>';
            for (var i=0; i < parsedData.result.length; i++) {
                output += '<div class="row">';
                output += '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-default">';
                output += '<div class="panel-body">';
                output += '     <h2>' + parsedData.result[i].title + '</h2>';
                output += '     <p>' + parsedData.result[i].description + '</p>';
                output += '     <p><span class="label label-info">' + parsedData.result[i].last_modified + '</span></p>';
                output += '     <button class="streamURL" data-URI="' + parsedData.result[i].stream_url + '">Stream</button>';
                output += '     <button class="pause">Pause</button>';
                output += '</div>';
                output += '</div>';
                output += '</div>';
            }
            $('.extra1').html(output);
            streamInit();
        });
    });

    // function to start and pause the selected title
    var streamInit = function() {
        $('.streamURL').on('click', function(evnt) {
            var streamURL = evnt.target.dataset.uri;
            evnt.target.parentElement.parentElement.style.backgroundColor = 'red';

            //var stringstreamURL = streamURL.toString();
            SC.stream(streamURL).then(function(player){
                player.play();
                // removing the color from the background on finish
                player.on('finish', function() {
                    evnt.target.parentElement.parentElement.style.backgroundColor = '';
                });

                $('.pause').on('click', function() {
                   player.pause();
                    evnt.target.parentElement.parentElement.style.backgroundColor = '';
                });
            });
        });
    }; // End streamInit
    // This is the SoundCloud API key and load of SDK
    SC.initialize({
        client_id: 'a6bc06ca9bc1a498091a24576eca3683'
    });

    $('#step7').on('click', function(envt) {
        $.get('data/images.txt', function(data) {
            var parsedImages = $.parseJSON(data);
            var imagesOutput = '';
            imagesOutput = '<h2 class="text-center">Images from Space</h2>';
            imagesOutput += '<div class="row">';
            $.each(parsedImages.images[0], function(key, value) {
                imagesOutput += '<div class="col-md-3 col-lg-3">';
                imagesOutput += '<div class="thumbnail">';
                imagesOutput += '<a class="fancybox" rel="group1" href="' + value + '"><img src="' + value + '" class="img-responsive"></a>';
                imagesOutput += '</div>';
                imagesOutput += '</div>';
            });
            imagesOutput += '</div>';
            $('#extra2').html(imagesOutput);
        }); // End Get
    });

    $('.navbar-toggle').on('click', function() {
        var bootstrapNavigation = $('#bootstrapNavigation');

        if (bootstrapNavigation.hasClass('collapse')) {
            bootstrapNavigation.removeClass('collapse');
            bootstrapNavigation.addClass('collapse.in');
        } else {
            bootstrapNavigation.removeClass('collapse.in');
            bootstrapNavigation.addClass('collapse');
        }
    });
}); // End Ready
