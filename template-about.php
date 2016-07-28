<?php
/**
 * Template Name: About the Nomad Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'about'); ?>
    <?php get_template_part('templates', 'footer'); ?>
<?php endwhile; ?>
