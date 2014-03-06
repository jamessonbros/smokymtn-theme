<?php
global $cfs, $resco;
?>

<article <?php post_class(); ?>>
  <div class="entry-summary">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="rental-summary">
          <?php the_excerpt(); ?>
        </div>
        <div class="rental-icons">
          <?php if ($cfs->get('pet_friendly')): ?>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/pet-friendly.png" alt="Pet Friendly" width="100" />
          <?php endif ?>
          <?php if ($cfs->get('on_special')): ?>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/special.png" alt="On Special" width="100" />
          <?php endif ?>
        </div>
        <p><a href="<?php the_permalink() ?>" class="btn btn-primary btn-sm">More info &raquo;</a></p>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="rental-thumbnail">
          <?php the_post_thumbnail('medium', array('class' => 'img-responsive')) ?>
        </div>
      </div>
    </div>
  </div>
</article>
