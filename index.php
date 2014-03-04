<?php get_template_part('templates/page', 'header'); ?>

<?php get_template_part('templates/no-posts') ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php get_template_part('templates/pagination') ?>
