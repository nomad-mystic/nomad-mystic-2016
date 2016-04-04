<?php
/**
 * Template Name: Show Works Template
 */


require_once('extras/Inventory.php');
?>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'showWorks'); ?>

<?php endwhile; ?>
