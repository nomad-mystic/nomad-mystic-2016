<?php
/**
 * Template Name: Project Categories Template
 * @package WordPress
 */



?>


<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'project-categories'); ?>
    
<?php endwhile; ?>
