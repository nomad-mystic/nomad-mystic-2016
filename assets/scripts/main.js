/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Nomad = {
        // All pages
        'common': {
            init: function() {
                // JavaScript to be fired on all pages
                // adding animation to mobile menu on click
                $(".navbar-toggle").on("click", function () {
                    $(this).toggleClass("active");
                });
            },
            finalize: function() {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function() {
                // JavaScript to be fired on the home page

            },
            finalize: function() {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function() {
                // JavaScript to be fired on the about us page
            }
        },
        // This is going to be the works page holding all of my programs and submits to inventory.php Class
        'works': {
            init: function() {

            },
            finish: function() {
                // var callPosts = function(currentWork) {
                //     //var GETString = 'http://specialeducationsupportcenter.org/wp-content/themes/woo-child/processDisabilitiesPost.php';
                //     $.ajax({
                //         type: 'POST',
                //         url: 'http://localhost:8080/nomadmystic/wordpress/wp-content/themes/nomadmystic/extras/Inventory.php?currentWork="' + currentWork + '"',
                //         success: function (data, status, jqxhr) {
                //             console.log("Request data: ", data);
                //             console.log("Request status:", status);
                //             console.log("Request jqxhr:", jqxhr);
                //         }, error: function (jqxhr, status, error) {
                //             console.log("Something went wrong!");
                //             console.log("Something went wrong! jqxhr" + jqxhr);
                //             console.log("Something went wrong! status" + status);
                //             console.log("Something went wrong! error" + error);
                //         }
                //     });
                // }; // ENd callPosts-->
                // $('#work1').on('click', function() {
                //     console.log('this');
                //     var currentWorkButton = $('#currentWork');
                //     currentWorkButton.submit(function(event) {
                //         console.log(event);
                //         console.log(event.target[0].value);
                //         event.preventDefault();
                //         var currentWork = event.target[0].value;
                //         callPosts(currentWork);
                //         return;
                //     });
                //     currentWorkButton.submit();
                // });
            }
        },
        'individual': {
            init: function() {
                // DOM handlers to grab POST data from project-categories.php form post
                var titleOfFolderHidden = $('.titleOfFolderHidden');
                var titleOfIndividualHidden = $('.titleOfIndividualHidden');
                var getFolderValue = titleOfFolderHidden.text();
                var getIndividualValue = titleOfIndividualHidden.text();
                console.log(getIndividualValue);
                var closure = {
                    getFolderContents: function() {
                        $.get(
                            'http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/' +
                            'fileSystem/getFiles.php?title_of_individual=' + getIndividualValue + '&title_of_folder=' + getFolderValue + '',
                            function(data) {
                                // console.log(data);
                                var parsedData = $.parseJSON(data);
                                // console.log(parsedData);

                                // get the section from the returned file object
                                for (var key in parsedData) {
                                    var arrayKey = parsedData[key];
                                    // calling each file type for population of the DOM
                                    closure.createFileContentTab(arrayKey, parsedData, key);
                                }
                            }
                        ); // end get

                    },
                    createFileContentTab: function (filesArray, parsedData, name) {
                        var individualTabs = $('.individualTabs');
                        console.log(filesArray);
                        // if folder not empty
                        if (filesArray !== undefined) {
                            // console.log(filesArray.length);
                            console.log(filesArray);
                            var output = '';

                            // creating DOM pieces
                            output += '<li class="dropdown">';
                            output += '     <a class="dropdown-toggle" data-toggle="dropdown" href="#">' + name + '<span class="caret"></span></a>';
                            output += '     <ul class="dropdown-menu " role="menu">';

                            // looping through each file in the folder and populating the DOM with Tab dropdown
                            // Starting at 2 to remove the first two files '.' and '..' from data loop
                            for (var files = 2; files < filesArray.length; files++) {
                                output += '         <li><a href="#' + filesArray[files] + '" ' +
                                    'role="tab" ' +
                                    'data-toggle="tab"' +
                                    'class="individual">' + filesArray[files] + '</a></li>';
                                // console.log(filesArray[files]);
                            }
                            output += '     </ul>';
                            output += '</li>';

                            // populate DOM with Tab
                            individualTabs.prepend(output);

                        } else {
                            console.log('This folder is undefined');
                        }

                    }, // end createFileContent();
                    getTabContent: function(evnt) {
                        // var targetDropdownText =[];
                        // var targetIndividual = evnt.target.classList[0];

                        // get individual file in tab
                        if (evnt.target.classList[0] === 'individual') {
                            console.log(evnt);
                            console.log('Individual file');
                            // individual file selected
                            var targetFile = evnt.target.innerText;

                            var tabContent = $('ul.individualTabs .open');

                            // find the individual folder clicked
                            var tabContentString = tabContent.find('a.dropdown-toggle');

                            var tabContentText = tabContentString.text();
                            var lowerTabContent = tabContentText.toLowerCase();
                            // console.log(getFolderValue + ' getFolderValue');
                            // console.log(lowerTabContent + ' tabContent');

                            // call to populate code in pre tags
                            // $.get('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/' + getFolderValue + '/development/' + getIndividualValue + '/' + lowerTabContent + '/' + targetFile + '', function(data) {

                            var activeListItem = tabContent.find('li.active');
                            // check for the active class
                            // if (targetFile === '') {
                                // this grabs the individual file content using PHP file_get_contents() function and echos that
                                // value to the page for retrieval
                                $.get('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/getIndividualFileContent.php?targetPostFolderType=' + getFolderValue  + '&getIndividualProjectValue=' + getIndividualValue + '&tabSelected=' + lowerTabContent + '&individualTargetFile=' + targetFile + '', function(individualFileContents) {
                                    // console.log(individualFileContents);
                                    closure.buildTabContent(individualFileContents);

                                });
                            // }
                        }
                    }, // end getTabContent()
                    buildTabContent: function(individualFileContents) {
                        // checking to find the active tab
                        var tabContent = $('.individualTabs .active');
                        var tabContentString = tabContent.find('a.dropdown-toggle').text();

                        // get file clicked on by user
                        var getActiveFile = $('ul.dropdown-menu li.active');
                        var activeFileText = getActiveFile.text();
                        console.log('activeFileText ' + activeFileText);
                        // grabbing and clearing tab content
                        var tabCodeContent = $('#tabCodeContent');
                        // tabCodeContent.html(individualFileContents);
                        var output = '';

                        // Adding default tab-content text
                        tabCodeContent.html('Welcome String');
                        // check to see if active tab is images
                        if (tabContentString === 'Images') {
                            // clear tab content text
                            tabCodeContent.html('');
                            tabCodeContent.append('<img src="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/' + getFolderValue + '/development/' + getIndividualValue + '/images/' + activeFileText + '" class="img-responsive">');
                        } else {
                            // clear tab content text
                            tabCodeContent.html('');
                            // console.log('Parent tabContent ' + tabContentString);
                            // creating each individual tabs content with the code clicked on by user
                            // create tab content
                            output += '<div class="tab-content">';
                            // for (var files = 2; files < filesArray.length; files++) {
                            output += ' <div class="tab-pane active" role="tabpanel">';
                            output += '     <pre class="prettyprint">';
                            output += '         <code class="tabCodeContent">' + individualFileContents;
                            output += '         </code>';
                            output += '     </pre>';
                            output += ' </div><!--tab-pane-->';
                            // }
                            output += '</div><!--tab-content-->';
                            tabCodeContent.append(output);

                            $('.prettyprint').removeClass("prettyprinted");
                            prettyPrint();
                        }

                    } // end buildTabContent
                };



                // get folder contents init function
                var filesArray = closure.getFolderContents();
                var saveFilesArray = [];
                saveFilesArray.push(filesArray);
                // click event to get the content of individual tabs
                $('.individual').on('click', function(evnt) {
                    var tabContent = $('ul.individualTabs .open');
                    closure.getTabContent(evnt);

                });
            },
            finish: function() {
                var folder = $('.folder');
                // this is testing AJAX call to get JSON for individual project and return files
                // in that folder define by file type
                // file types: path fileSystem/
                // html, css, development,
            }
        },
        'featured': {
            init: function() {
                var codeButton = $('.code_button a');
                codeButton.on('click', function(evnt) {
                    var findClassOfEvent = evnt.target.classList[0];
                    $('form#' + findClassOfEvent).submit();
                    // this.submit();
                    evnt.preventDefault();
                }); // end codeButton Click
            },
            finish: function() {

            }
        }
    };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function(func, funcname, args) {
        var fire;
        var namespace = Nomad;
        funcname = (funcname === undefined) ? 'init' : funcname;
        fire = func !== '';
        fire = fire && namespace[func];
        fire = fire && typeof namespace[func][funcname] === 'function';

        if (fire) {
            namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        // Fire common init JS
        UTIL.fire('common');

        // Fire page-specific init JS, and then finalize JS
        $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
            UTIL.fire(classnm);
            UTIL.fire(classnm, 'finalize');
        });

        // Fire common finalize JS
        UTIL.fire('common', 'finalize');
    }
};

// Load Events
$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.


// // create tab content
// output += '<div class="tab-content">';
// for (var files = 2; files < filesArray.length; files++) {
//     output += ' <div class="tab-pane active" role="tabpanel" id="' + filesArray[files] + '">';
//     output += '     <pre class="prettyprint">';
//     output += '         <xmp >';
//     output += '             <div id="snippetOutputOne"> Testing text</div>';
//     output += '         </xmp>';
//     output += '     </pre>';
//     output += ' </div><!--tab-pane-->';
// }
// output += '</div><!--tab-content-->';