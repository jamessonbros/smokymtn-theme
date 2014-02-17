<article <?php post_class(); ?>>
  <div class="entry-summary">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="rental-summary">
          <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink() ?>" class="btn btn-primary btn-sm">More info &raquo;</a>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="rental-thumbnail">
          <?php the_post_thumbnail('medium', array('class' => 'img-responsive')) ?>
        </div>
      </div>
    </div>
  </div>
</article>
