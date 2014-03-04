<?php 
$bedrooms = get_query_var('bedrooms');
$term_obj = get_term_by('slug', $term, 'rental_types');
$descr = term_description($term_obj->term_id, 'rental_types');
?>

<?php if (!$bedrooms && $descr): ?>

  <?php get_template_part('templates/page', 'header') ?>

  <div class="term-description">
    <?php echo term_description($term_obj->term_id, 'rental_types') ?>
  </div>
  <!-- /term-description -->

<?php else: ?>

  <?php get_template_part('archive-rental') ?>

<?php endif ?>