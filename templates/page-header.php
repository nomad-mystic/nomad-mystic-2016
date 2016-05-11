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
    <div class="jumbotron home-jumbotron">
        <div class="container">
            <img src="/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/home_logo.png" class="img-responsive" alt="Header logo for nomadmystic.com">
        </div>
    </div><!--jumbotron-->
</header>
