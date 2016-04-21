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
              var callPosts = function(currentWork) {
                  //var GETString = 'http://specialeducationsupportcenter.org/wp-content/themes/woo-child/processDisabilitiesPost.php';
                  $.ajax({
                      type: 'POST',
                      url: 'http://localhost:8080/nomadmystic/wordpress/wp-content/themes/nomadmystic/extras/Inventory.php?currentWork="' + currentWork + '"',
                      success: function (data, status, jqxhr) {
                          console.log("Request data: ", data);
                          console.log("Request status:", status);
                          console.log("Request jqxhr:", jqxhr);
                      }, error: function (jqxhr, status, error) {
                          console.log("Something went wrong!");
                          console.log("Something went wrong! jqxhr" + jqxhr);
                          console.log("Something went wrong! status" + status);
                          console.log("Something went wrong! error" + error);
                      }
                  });
              }; // ENd callPosts-->
              $('#work1').on('click', function() {
                  console.log('this');
                  var currentWorkButton = $('#currentWork');
                  currentWorkButton.submit(function(event) {
                      console.log(event);
                      console.log(event.target[0].value);
                      event.preventDefault();
                      var currentWork = event.target[0].value;
                      callPosts(currentWork);
                      return;
                  });
                  currentWorkButton.submit();

              });
          },
          finish: function() {

          }
      },
      'show_works': {
          init: function() {

          },
          finish: function() {
              $.get('../extras/Inventory.php', function(work) {
                  console.log(work);
              });

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
