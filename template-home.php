<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'home'); ?>
  <?php get_template_part('templates/', 'footer'); ?>
<?php endwhile; ?>
