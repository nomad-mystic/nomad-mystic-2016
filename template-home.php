<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/home', 'header'); ?>
  <?php get_template_part('templates/content', 'home'); ?>
<?php endwhile; ?>
