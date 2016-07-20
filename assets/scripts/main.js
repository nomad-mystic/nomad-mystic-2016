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
            },
            buildContent: {
                // handles: {
                //     titleOfFolderHidden: $('.titleOfFolderHidden'),
                //     titleOfIndividualHidden: $('.titleOfIndividualHidden'),
                //     getFolderValue: $('.titleOfFolderHidden').titleOfFolderHidden.text(),
                //     getIndividualValue: $('.titleOfIndividualHidden').titleOfIndividualHidden.text()
                // },
                getFolderContents: function() {
                    // DOM handlers to grab POST data from project-categories.php form post
                    var titleOfFolderHidden = $('.titleOfFolderHidden');
                    var titleOfIndividualHidden = $('.titleOfIndividualHidden');
                    var titleOfSchoolClassSelectedHidden = $('.titleOfSchoolClassSelectedHidden');
                    var getSchoolClassSelectedValue = titleOfSchoolClassSelectedHidden.text();
                    var getFolderValue = titleOfFolderHidden.text();
                    var getIndividualValue = titleOfIndividualHidden.text();
                    // console.log(getIndividualValue);
                    // get folder content to populate each individual tab with folder contents 
                    $.get(
                        'http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/' +
                        'fileSystem/getFiles.php?title_of_individual=' + getIndividualValue + '&title_of_folder=' + getFolderValue + '&title_of_school_class_selected=' + getSchoolClassSelectedValue + '',
                        function(data) {
                            // console.log(data);
                            // var parsedData = $.parseJSON(data);

                            // get the section from the returned file object
                            // loop over each folder returned from getFiles.php and create tabContent for each
                            for (var nameOfFolder in data) {
                                var arrayKey = data[nameOfFolder];
                                // console.log(JSON.stringify(data[nameOfFolder]));
                                // calling each file type for population of the DOM
                                Nomad.common.buildContent.createFileContentTab(arrayKey, data, nameOfFolder);
                            }
                            // create default tab content
                            Nomad.common.buildContent.createDefaultTabContentOnLoad();

                        }
                    ); // end get
                    // populate the DOM with current project on load
                    Nomad.common.buildContent.getCurrentProjectForViewing(getIndividualValue);
                },
                createDefaultTabContentOnLoad: function() {
                    $.get('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/wellcomeToCodeViewer.html', function(html) {
                        var tabCodeContent = $('#tabCodeContent');
                        tabCodeContent.html(html);
                    }); // end get() default content
                    // console.log('Inside createDefaultTabContentOnLoad');
                },
                getCurrentProjectForViewing: function(getIndividualValue) {
                    // Populate description with the title of the project selected
                    $.get('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/meta/individualMetaData.json', function(metaData) {
                        var activeIndividualProjectInView = $('#activeIndividualProjectInView');
                        // var parsedMetaData = $.parseJSON(metaData);
                        // console.log('Meta data ' + JSON.stringify(metaData.metaData));
                        // loop through metaData for each project type school-projects or featured
                        for (var projectType in metaData.metaData) {
                            if (metaData.metaData.hasOwnProperty(projectType)) {
                                // if this a a featured project
                                if (projectType === 'featured') {
                                    // loop through metaData object to find current featured project
                                    for (var featuredProjectName in metaData.metaData.featured) {
                                        if (metaData.metaData.featured.hasOwnProperty(featuredProjectName)) {
                                            if (featuredProjectName === getIndividualValue) {
                                                // console.log('Project Type A: featured ' + featuredProjectName);
                                                // console.log('Project Type A: featured ' + metaData.metaData.featured[featuredProjectName]);
                                                activeIndividualProjectInView.text(metaData.metaData.featured[featuredProjectName]);
                                            }
                                        }
                                    }
                                } else if (projectType === 'schoolProjects') {
                                    // loop through metaData object to find current schoolProject
                                    for (var schoolProjectName in metaData.metaData.schoolProjects) {
                                        if (metaData.metaData.schoolProjects.hasOwnProperty(schoolProjectName)) {
                                            if (schoolProjectName === getIndividualValue) {
                                                // console.log('Project Type A: featured ' + schoolProjectName);
                                                // console.log('Project Type A: featured ' + metaData.metaData.schoolProjects[schoolProjectName]);
                                                activeIndividualProjectInView.text(metaData.metaData.schoolProjects[schoolProjectName]);
                                            }
                                        }
                                    }
                                    // console.log('Project Type B: school project');
                                }
                            }
                        }
                    });
                },
                createFileContentTab: function (filesArray, parsedData, name) {
                    // This is part of a loop which creates the tab content for each folder type
                    var individualTabs = $('.individualTabs');
                    // if folder not empty
                    if (filesArray !== undefined) {
                        // console.log(filesArray);
                        // console.log(name + ' :name');
                        var output = '';
                        // check if the position on the filesArray is not Libraries
                        if (name !== 'Libraries') {
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
                                // console.log(filesArray[files] + ' :files array in loop');
                            }
                            output += '     </ul>';
                            output += '</li>';

                            // populate DOM with Tab
                            individualTabs.prepend(output);
                        } // end if name !== 'Libraries'
                        else {
                            // create links to the 'Libraries' used documentation website's if the filesArray is on 'Libraries
                            console.log(filesArray.length);
                            console.log(filesArray + ' :filesArray');
                            console.log(name);
                            $.get('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/meta/librariesMetaData.json', function(fileNamesInLibraries) {
                                console.log(fileNamesInLibraries);

                                // adding links to lib folder dynamically
                                output += '<li class="dropdown">';
                                output += '     <a class="dropdown-toggle" data-toggle="dropdown" href="#">' + name + '<span class="caret"></span></a>';
                                output += '     <ul class="dropdown-menu " role="menu">';

                                // Looping through files in libraries folder to fine a matching key for that library
                                for (var key in fileNamesInLibraries.libraries) {
                                    if (fileNamesInLibraries.libraries.hasOwnProperty(key)) {
                                        console.log('key: ' + key);
                                        console.log(fileNamesInLibraries.libraries[key]);
                                        if (filesArray.indexOf(fileNamesInLibraries.libraries[key])) {
                                            console.log(fileNamesInLibraries.libraries[key] + ' this is the comparison');
                                            output += '         <li><a href="' + fileNamesInLibraries.libraries[key].toString() + '"' +
                                                        'role="tab" ' +
                                                        'data-toggle="tab"' +
                                                        'target="_blank"' +
                                                        'class="individual">' + key + '</a></li>';
                                                    // console.log(filesArray[files] + ' :files array in loop');
                                        }
                                    }
                                } // end for loop

                                // closing out the tab for libraries
                                output += '     </ul>';
                                output += '</li>';

                                // // populate DOM with Tab
                                individualTabs.prepend(output);
                            });
                        } // end else
                    } else {
                        // console.log('This folder is undefined');
                    } // end filesArray !== undefined

                }, // end createFileContent();
                getTabContent: function(evnt) {
                    // DOM handlers to grab POST data from project-categories.php form post
                    var titleOfFolderHidden = $('.titleOfFolderHidden');
                    var titleOfIndividualHidden = $('.titleOfIndividualHidden');
                    var titleOfSchoolClassSelectedHidden = $('.titleOfSchoolClassSelectedHidden');
                    var getSchoolClassSelectedValue = titleOfSchoolClassSelectedHidden.text();
                    var getFolderValue = titleOfFolderHidden.text();
                    var getIndividualValue = titleOfIndividualHidden.text();

                    // get individual file in tab
                    if (evnt.target.classList[0] === 'individual') {
                        // console.log(evnt);
                        // console.log('Individual file');
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
                        
                        // this grabs the individual file content using PHP file_get_contents() function and echos that
                        // need to check and create AJAX call for get PHP server page
                        // if this is not a school project 
                        if (getSchoolClassSelectedValue === '') {
                            // console.log('This is a test for empty string in school projects hidden form');
                            $.get('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/getIndividualFileContent.php?target_post_folder_type=' + getFolderValue  + '&get_individual_project_folder=' + getIndividualValue + '&tab_selected=' + lowerTabContent + '&individual_target_file=' + targetFile + '', function(individualFileContents) {
                                // console.log(individualFileContents);
                                Nomad.common.buildContent.buildTabContent(individualFileContents);
                            });
                        } else {
                            $.get('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/getIndividualSchoolProjectFile.php?target_post_folder_type=' + getFolderValue  + '&get_individual_project_folder=' + getIndividualValue + '&tab_selected=' + lowerTabContent + '&individual_target_file=' + targetFile + '&title_of_school_class_selected=' + getSchoolClassSelectedValue + '', function(individualFileContents) {
                                // console.log(individualFileContents);
                                Nomad.common.buildContent.buildTabContent(individualFileContents);
                            });
                        }
                        

                    }
                }, // end getTabContent()
                buildTabContent: function(individualFileContents) {
                    // DOM handlers to grab POST data from project-categories.php form post
                    var titleOfFolderHidden = $('.titleOfFolderHidden');
                    var titleOfIndividualHidden = $('.titleOfIndividualHidden');
                    var titleOfSchoolClassSelectedHidden = $('.titleOfSchoolClassSelectedHidden');
                    var getFolderValue = titleOfFolderHidden.text();
                    var getIndividualValue = titleOfIndividualHidden.text();
                    var getSchoolClassSelectedValue = titleOfSchoolClassSelectedHidden.text();
                    
                    // checking to find the active tab text
                    var tabContent = $('.individualTabs .active');
                    var tabContentString = tabContent.find('a.dropdown-toggle').text();

                    // get file clicked on by user
                    var getActiveFile = $('ul.dropdown-menu li.active');
                    var activeFileText = getActiveFile.text();
                    // console.log('activeFileText ' + activeFileText);

                    // this div which holds the selected code content
                    var tabCodeContent = $('#tabCodeContent');

                    // This adds the active text for the viewer to know what file they are looking at
                    var activeIndividualFileInView = $('#activeIndividualFileInView');
                    activeIndividualFileInView.text(activeFileText);

                    // tabCodeContent.html(individualFileContents);
                    var output = '';
                    // Adding default tab-content text
                    tabCodeContent.html('Welcome String');
                    console.log('tabContentString: ' + tabContentString);
                    // check to see if active tab is images
                    if (tabContentString === 'Images') {
                        // check to see if the folder was images and school-projects
                        if (getFolderValue === 'school-projects') {
                            // clear tab content text
                            tabCodeContent.html('');
                            tabCodeContent.css('background', '#000');
                            tabCodeContent.append('<img src="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/' + getFolderValue + '/development/' + getSchoolClassSelectedValue + '/' + getIndividualValue + '/images/' + activeFileText + '" class="img-responsive center-block">');
                        } else if (getFolderValue === 'featured') {
                            // clear tab content text
                            tabCodeContent.html('');
                            tabCodeContent.css('background', '#000');
                            tabCodeContent.append('<img src="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/' + getFolderValue + '/development/' + getIndividualValue + '/images/' + activeFileText + '" class="img-responsive center-block">');
                        }
                    } else if (tabContentString === 'Libraries') {
                        // check it see if the active tab is Libraries
                        console.log('check it see if the active tab is Libraries');
                    } else {
                        // clear tab content text
                        tabCodeContent.html('');
                        tabCodeContent.css('background', 'transparent');
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
            } // end buildContent object
        },
        // Home page
        'home': {
            init: function() {
                // // JavaScript to be fired on the home page
                var createAnimations = {
                    // created style.Transition Animation with stroke-dashoffset
                    textPathAnimation: function(path, duration) {
                        for (var i=0; i < path.length; i++) {
                            // adds color back into the shape
                            path[i].style.stroke = '#fff';

                            var length = path[i].getTotalLength();
                            // Clear any previous transition
                            path[i].style.transition = path[i].style.webkitTransition = 'none';
                            // Set up the starting positions
                            path[i].style.strokeDasharray = length + ' ' + length;
                            // console.log(path[i].style.strokeDasharray);

                            path[i].style.strokeDashoffset = length;
                            // console.log(path[i].style.strokeDashoffset + ': path.style.strokeDashoffset');
                            // Trigger a layout so styles are calculated & the browser
                            // picks up the starting position before animating
                            path[i].getBoundingClientRect();
                            // Define our transition
                            path[i].style.transition = path[i].style.webkitTransition = 'stroke-dashoffset ' + duration + ' ease-in-out';
                            path[i].style.strokeDashoffset = '0';

                        }
                    }, // end textPath
                    fadeIdAnimation: function(id, duration) {
                        id.style.opacity = 1;
                        id.style.transition = 'opacity ' + duration + ' ease-in';

                    }, // end rotateAnimation
                    fadeClassAnimation: function(classArray, duration) {
                        // console.log(classArray);
                        for (var i=0; i < classArray.length; i++) {
                            classArray[i].style.opacity = 1;
                            classArray[i].style.transition = 'opacity ' + duration + ' ease-in';
                        }
                    }, // end fadeClassAnimation
                    fillPathAnimation: function(paths, duration) {
                        paths.css({
                            'fill': '#fff',
                            'transition': 'fill ' + duration
                        });
                    }
                }; // end createAnimations
                //
                //
                // /////// When user scrolls to homeAnimationArea
                var homeAnimationAreaAnimations = function() {
                    var homeAnimationArea =$('.homeAnimationArea');
                    function isScrolledIntoView(elem) {
                        var docViewTop = $(window).scrollTop();
                        var docViewBottom = docViewTop + $(window).height();
                        var elemTop = $(elem).offset().top;
                        var elemBottom = elemTop + $(elem).height();
                        return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));
                    }
                    $(window).scroll(0);
                    $(window).scroll(function(evnt) {
                        if (isScrolledIntoView(homeAnimationArea)) {
                            $(window).unbind('scroll');
                            //////////////////// header in homeAnimationArea shapes animations
                            // triangle
                            var headerTriangle = document.getElementById('headerTriangle');
                            createAnimations.fadeIdAnimation(headerTriangle, '1.5s');
                            // headerLargeHexagon
                            var headerLargeHexagon = document.getElementById('headerLargeHexagon');
                            createAnimations.fadeIdAnimation(headerLargeHexagon, '1s');

                            // headerSmallHexagon in homeAnimationArea
                            setTimeout(function () {
                                var headerSmallHexagon = document.getElementById('headerSmallHexagon');
                                createAnimations.fadeIdAnimation(headerSmallHexagon, '1s');
                                // animation for header text Dream Not of Today
                                setTimeout(function () {
                                    var dreamNotOfTodayPath = document.getElementsByClassName('dreamNotOfTodayPath');
                                    createAnimations.textPathAnimation(dreamNotOfTodayPath, '3s');
                                    // console.log(dreamNotOfTodayPath);
                                }, 500); // end Dream Not of Today
                            }, 1000); // end headerSmallHexagon

                            // sub lines and hexagons(bulletPoints) in homeAnimationArea
                            setInterval(function () {
                                // bulletPoints animations
                                var bulletPoints = document.getElementsByClassName('bulletPoints');
                                createAnimations.fadeClassAnimation(bulletPoints, '2s');
                                // console.log(bulletPoints);

                                // subLine animations
                                var subLines = document.getElementsByClassName('subLine');
                                createAnimations.fadeClassAnimation(subLines, '2s');
                                // console.log(subLines);
                            }, 2000); // end lines and bulletPoints

                            ///////////////////// Text Animations in homeAnimationArea
                            // delaying small text animation so it waits for the header to animate in
                            setTimeout(function () {
                                // animation for Web Development text
                                setTimeout(function () {
                                    var webDevelopmentPath = document.getElementsByClassName('webDevelopmentPath');
                                    createAnimations.textPathAnimation(webDevelopmentPath, '2s');
                                    // console.log(webDevelopmentPath);
                                }, 1000);

                                // animation for Text UI Development in homeAnimationArea
                                setTimeout(function () {
                                    var UIDevelopmentPath = document.getElementsByClassName('UIDevelopmentPath');
                                    createAnimations.textPathAnimation(UIDevelopmentPath, '2s');
                                    // console.log(UIDevelopmentPath);
                                }, 2000);

                                // animation for WordPress Development text in homeAnimationArea
                                setTimeout(function () {
                                    var wordpressDevelopmentPath = document.getElementsByClassName('wordpressDevelopmentPath');
                                    createAnimations.textPathAnimation(wordpressDevelopmentPath, '2s');
                                    // console.log(wordpressDevelopmentPath);
                                }, 3000);
                            }, 2500); // small text animation

                            // sets the timing/delay of the animation for text fills in homeAnimationArea
                            setTimeout(function () {
                                var dreamNotOfTodayPaths = $('.dreamNotOfTodayPath');
                                var webDevelopmentPaths = $('.webDevelopmentPath');
                                var UIDevelopmentPaths = $('.UIDevelopmentPath');
                                var wordpressDevelopmentPaths = $('.wordpressDevelopmentPath');

                                createAnimations.fillPathAnimation(dreamNotOfTodayPaths, '3s');
                                createAnimations.fillPathAnimation(webDevelopmentPaths, '4s');
                                createAnimations.fillPathAnimation(UIDevelopmentPaths, '5s');
                                createAnimations.fillPathAnimation(wordpressDevelopmentPaths, '6s');
                            }, 8000);
                        } // end if statement homeAnimationArea
                    }); // end scroll event callback
                }; // homeAnimationAreaAnimations
                // class animations for home page animation area "Dream not of Today"
                homeAnimationAreaAnimations();

                // fadeIn header image when user loads page
                // var homeLetterImage = document.getElementById('home_header_letter_layer');
                // createAnimations.fadeIdAnimation(homeLetterImage, '1s');

                ///////////// Three Sections call to action Featured, School, and Website SVGs
                var homeActionSections = function() {
                    // called from homePageHeaderAnimations() in timeout
                    setTimeout(function() {
                        var homeSectionsFeaturedPaths = $('.homePageFeaturedSectionsFeaturedPath');
                        createAnimations.textPathAnimation(homeSectionsFeaturedPaths, '2s');

                        var homeSectionsSchoolPaths = $('.homePageFeaturedSectionsSchoolPath');
                        createAnimations.textPathAnimation(homeSectionsSchoolPaths, '2s');

                        var homeSectionsWebsitesPath = $('.homePageFeaturedSectionsWebsitesPath');
                        createAnimations.textPathAnimation(homeSectionsWebsitesPath, '2s');

                        // Animations for filling three sections action words
                        setTimeout(function() {
                            createAnimations.fillPathAnimation(homeSectionsFeaturedPaths, '3s');
                            createAnimations.fillPathAnimation(homeSectionsSchoolPaths, '3s');
                            createAnimations.fillPathAnimation(homeSectionsWebsitesPath, '3s');
                        }, 2000);
                    }, 2000);
                }; // homeActionSections

                //////////// Home Page header animations
                var homePageHeaderAnimations = function() {
                    // animating Nomad Mystic letters in home page header
                    var headerMysticTextPaths = document.getElementsByClassName('headerMysticTextPath');
                    createAnimations.textPathAnimation(headerMysticTextPaths, '5s');

                    var homePageHeaderHexagon = document.getElementById('homePageHeaderHexagon');
                    createAnimations.fadeIdAnimation(homePageHeaderHexagon, '3s');

                    var homePageHeaderTriangle = document.getElementById('homePageHeaderTriangle');
                    createAnimations.fadeIdAnimation(homePageHeaderTriangle, '4s');

                    // fills Nomad Mystic text (SVG)
                    setTimeout(function() {
                        var headerMysticTextPaths = $('.headerMysticTextPath');
                        createAnimations.fillPathAnimation(headerMysticTextPaths, '3s');

                        homeActionSections();
                    }, 5000);
                }; // end homePageHeaderAnimations
                // creates animations for home page header SVG letters and shapes
                homePageHeaderAnimations();

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
        'individual': {
            init: function() {
                // get folder contents init function
                Nomad.common.buildContent.getFolderContents();
                // var saveFilesArray = [];
                // saveFilesArray.push(filesArray);
                // click event to get the content of individual tabs
                $('.individual').on('click', function(evnt) {
                    // var tabContent = $('ul.individualTabs .open');
                    Nomad.common.buildContent.getTabContent(evnt);

                });
            },
            finalize: function() {
                // this is testing AJAX call to get JSON for individual project and return files
                // in that folder define by file type
                // file types: path fileSystem/
                // html, css, development,
            }
        },
        'featured': {
            init: function() {
                // click code to submit hidden form to build content Refactor!!!
                var codeButton = $('.code_button a');
                codeButton.on('click', function(evnt) {
                    var findClassOfEvent = evnt.target.classList[0];
                    $('form#' + findClassOfEvent).submit();
                    evnt.preventDefault();
                }); // end codeButton Click

                // initializing share buttons for featured posts
                new ShareButton({
                    networks: {
                        facebook: {
                            appId: "abc123"
                        }
                    }
                });
            },
            finalize: function() {

            }
        }, // end featured
        'school': {
            init: function() {
                var findSchoolProjectButton = $('.school_projects_button a');
                findSchoolProjectButton.on('click', function(evnt) {
                    evnt.preventDefault();
                    var findClassOfEvent = evnt.target.classList[0];
                    $('form#' + findClassOfEvent).submit();
                    evnt.preventDefault();
                }); // end codeButton Click

                // click code to submit hidden form to build content Refactor!!!
                var codeButton = $('.code_button a');
                codeButton.on('hover', function(evnt) {
                    // console.log(evnt);
                    var findClassOfEvent = evnt.target.classList[0];
                    $('form#' + findClassOfEvent).submit();
                    evnt.preventDefault();
                }); // end codeButton Click
            },
            finalize: function() {
                
            }
        },
        'school_projects': {
            init: function () {
                // click code to submit hidden form to build content Refactor!!!
                var codeButton = $('.code_button a');
                codeButton.on('click', function (evnt) {
                    // console.log(evnt);
                    var findClassOfEvent = evnt.target.classList[0];
                    $('form#' + findClassOfEvent).submit();
                    evnt.preventDefault();
                }); // end codeButton Click
            },
            finalize: function () {
                var addProductionButtons = function() {
                    // add "Production" links on school-project that compile to the web
                    var productionButton = $('.production_button');
                    //get form
                    var schoolProjectsPostsForm = $('form.school_projects');
                    var forInputValuesForClassSelected = $('.title_of_school_class_selected').attr('value');

                    // get individual projects titles
                    var CIS133WString = 'computerinformationsystemscis195php';
                    var CIS195PString = 'javascriptforwebdeveloperscis133w';
                    var CAS213String = 'jqueryfordesignerscas213';
                    var CAS225String = 'phpandmysqlfordesignerscas225';
                    var CIS295String = 'computerinformationsystemscis295php';

                    // check if it is a school project page
                    if (schoolProjectsPostsForm) {
                        // show .production_buttons for classes that compile
                        if (forInputValuesForClassSelected === CIS133WString) {
                            productionButton.removeClass('displayNone');
                        } else if (forInputValuesForClassSelected === CIS195PString) {
                            productionButton.removeClass('displayNone');
                        } else if (forInputValuesForClassSelected === CAS213String) {
                            productionButton.removeClass('displayNone');
                        } else if (forInputValuesForClassSelected === CAS225String) {
                            productionButton.removeClass('displayNone');
                        } else if (forInputValuesForClassSelected === CIS295String) {
                            productionButton.removeClass('displayNone');
                        }
                    } // end schoolProjectsPostsForm checker
                }; // end addProductionButtons
                // add production_buttons to school projects that have compilable projects
                addProductionButtons();
            }
        }, // end school_projects
        'websites': {
            init: function () {

            }, //e dn init
            finalize: function () {

            } // end finalize
        }, // end school_projects
        'testing_svg': {
            init: function () {
                console.log('testing Init');
            }, //e dn init
            finalize: function () {

            } // end finalize
        } // end school_projects
    }; // end Nomad object

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



//////////////// One whole ajax call with error ans success callback functions
// This is going to be the works page holding all of my programs and submits to inventory.php Class
// 'works': {
//     init: function() {
//
//     },
//     finish: function() {
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
//     }
// },