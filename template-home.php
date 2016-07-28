<?php
/**
 * Template Name: Home Template
 */

$referrer = $_SERVER['HTTP_REFERER'];

?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>

    <?php
    // if the SERVER URL referrer is not the home page
    if ($referrer != 'http://localhost:3000/nomadmystic/') {
        // returns true if page was refreshed
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        // See which page URI we are on
        $href = $_SERVER['REQUEST_URI'];
        // var_dump($href);

        // if the href is the home page '/' on remote and the page was refreshed
        if ($pageWasRefreshed && $href === '/nomadmystic/') {
            // call home page with animation if the user refreshes page
            get_template_part('templates/content', 'home');
            // var_dump('Page was refreshed and was the home page');
        } else if (!isset($referrer)) {
            // call this if user is on the home page for the first time
            get_template_part('templates/content', 'home');
        } else if ($referrer === NULL) {
            // call this if user is on the home page for the first time
            get_template_part('templates/content', 'home');
        } else {
            // call static home page if user comes from any other page
            // besides a refresh
            get_template_part('templates/content', 'home-static');
            // var_dump($referrer);
        }

    } else {
        // call this if user is on the home page for the first time
        get_template_part('templates/content', 'home');
    }
    ?>

    <?php get_template_part('templates/', 'footer'); ?>
<?php endwhile; ?>
