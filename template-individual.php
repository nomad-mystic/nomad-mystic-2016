<?php
/**
 * Template Name: Individual Template
 */

?>


<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'individual'); ?>
<?php endwhile; ?>
