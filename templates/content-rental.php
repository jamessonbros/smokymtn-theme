<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="rental-thumbnail">
          <?php the_post_thumbnail() ?>
        </div>
      </div>
      <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
        <div class="rental-summary">
          <?php the_excerpt(); ?>
        </div>
      </div>
    </div>
  </div>
</article>
