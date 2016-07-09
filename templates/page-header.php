<?php //use Roots\Sage\Titles; ?>

<header class="banner">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div>
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationNavbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo home_url(); ?>">
                      <img src="/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/nav_logo_dark.png"
                           alt="This is the navigation logo for nomadmystic.com" class="img-responsive">
                  </a>
              </div>

            <?php
            wp_nav_menu(array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
                  'container_id'      => 'navigationNavbar',
                  'menu_class'        => 'nav navbar-nav navbar-right',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
            );
            ?>
        </div>
    </nav>
    <?php
        // dynamic header image
        // URI now: '/nomadmystic/project-category/'
        $location_pathname = $_SERVER['REQUEST_URI'];
    // need to
    if ($location_pathname  === '/nomadmystic/') {


        $lower_header_background_image_path = 'home_header_background.jpg';
        require_once('home-header-svg.php');
//        $lower_header_letter_image_path = 'home_header_letter_layer.png';

    } else {
        $sliced_location_pathname = substr($location_pathname, 13, -1);
        $lower_location_pathname = strtolower($sliced_location_pathname);
        $lower_header_background_image_path = $lower_location_pathname . '_header_background.jpg';
        $lower_header_letter_image_path = $lower_location_pathname . '_header_letter_layer.png';

        require_once('header-include.php');
    }

    ?>
    
</header>
