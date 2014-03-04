<?php get_template_part('templates/page', 'header') ?>

<?php 
$term_obj = get_term_by('slug', $term, 'rental_types');
$descr = term_description($term_obj->term_id, 'rental_types');
?>

<?php if ($descr): ?>
<div class="term-description">
  <?php echo term_description($term_obj->term_id, 'rental_types') ?>
</div>
<!-- /term-description -->
<?php endif ?>