<?php 
global $resco, $cfs;
$property_id = get_post_meta(get_the_ID(), 'property_id', true);
$pets = $cfs->get('pet_friendly');
$special = $cfs->get('on_special');
?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-5 col-sm-push-7 col-md-5 col-md-push-7 col-lg-5 col-lg-push-7">
        <div class="rental-image">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', array('class' => 'img-responsive')) ?>
          <?php else: ?>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/no-image.jpeg" alt="<?php the_title_attribute() ?>" class="img-responsive">
          <?php endif ?>
        </div>
        <div class="booking-button">
          <p>
            <a href="<?php echo get_booking_url($property_id) ?>" class="btn btn-danger btn-block btn-lg">Check Rates &amp; Availability</a>
          </p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-7 col-sm-pull-5 col-md-7 col-md-pull-5 col-lg-7 col-lg-pull-5">
        <div class="entry-content">
          <?php the_excerpt(); ?>
        </div>
        <div class="rental-socials">
          <?php get_template_part('templates/addthis') ?>
        </div>

        <div class="rental-icons">
          <?php if ($pets): ?>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/petfriendly.gif" alt="Pet Friendly" width="90" />
          <?php endif ?>

          <?php if ($special): ?>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/special.jpg" alt="On Special" width="90" />
          <?php endif ?>

          <?php if ($tour360_url = $cfs->get('tour360_url')): ?>
            <a href="<?php echo $tour360_url ?>" class="btn btn-primary" target="_blank">
              <span class="glyphicon glyphicon-repeat"></span> 
              360&deg; Tour &raquo;
            </a>
          <?php endif ?>

        </div>
        <!-- /icons -->
        
      </div>
    </div>
    <!-- /row -->
    <div class="row">

      <?php
      $content = get_the_content();
      if (!$content)
        $content = $post->property_data->desc;
      
      $rates = $cfs->get('rates');
      $images = $post->property_data->images;
      $longitude = $post->property_data->long;
      $latitude = $post->property_data->lat;
      ?>
      
      <div id="tabs">
        
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
          <?php if ($images): ?>
          <li><a href="#tab-photos" data-toggle="tab">Photos</a></li>
          <?php endif ?>
          <?php if ($rates): ?>
          <li><a href="#tab-rates" data-toggle="tab">Rates</a></li>
          <?php endif ?>
          <?php if ($longitude && $latitude): ?>
          <li><a href="#tab-map" data-toggle="tab">Map</a></li>
          <?php endif; ?>
        </ul>
      
        <div class="tab-content">

          <div class="tab-pane active" id="tab-description">
            <h2>Description</h2>
            <?php echo $content ?>
          </div>
        
          <?php if (!empty($images)): ?>
          <div class="tab-pane" id="tab-photos">
            <h2>Photos</h2>
            <div class="images photos photo-gallery row">
            <?php $i = 1; ?>
            <?php foreach ($images as $image): ?>
              <div class="image photo-gallery-image col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <a href="<?php echo $image->url ?>">
                  <img src="<?php echo $image->url ?>" alt="<?php the_title_attribute() ?>" />
                </a>
              </div>
              <?php if ($i % 3 == 0): ?>
                <div class="clearfix"></div>
              <?php endif ?>
            <?php $i++; endforeach; ?>
            </div>
          </div>
          <?php endif ?>
          

          <?php if ($rates): ?>
          <div class="tab-pane" id="tab-rates">
            <h2>Rates</h2>
            <div class="rates">
              <?php echo $rates ?>
            </div>
          </div>
          <?php endif ?>
          
          <?php if ($longitude && $latitude): ?>
          <div class="tab-pane" id="tab-map">
            <h2>Map</h2>
            <input type="hidden" name="longitude" value="<?php echo $longitude ?>">
            <input type="hidden" name="latitude" value="<?php echo $latitude ?>">
            <div id="map"><a href="#">View a map &raquo;</a></div>
          </div>
          <?php endif ?>

        </div>
        <!-- /tab-content -->
        
      </div>
      <!-- /tabs -->

    </div>
  </article>
<?php endwhile; ?>
