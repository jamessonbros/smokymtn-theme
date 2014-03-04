<?php get_template_part('templates/page', 'header') ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'rental'); ?>
<?php endwhile; ?>

<?php get_template_part('templates/pagination') ?>