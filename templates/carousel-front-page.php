<?php 
$slides = get_field('slides');
?>

<?php if (is_array($slides) && count($slides)): ?>
  <div class="carousel slide" id="carousel-front-page" data-ride="carousel">
    <div class="container">
      
      <ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($slides); $i++): ?>
          <li data-target="#carousel-front-page" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? 'active' : '' ?>"></li>
        <?php endfor ?>
      </ol>

      <div class="carousel-inner">
        <?php for ($i = 0; $i < count($slides); $i++): ?>
          <div class="item <?php echo $i == 0 ? 'active' : '' ?>">
            <img src="<?php echo $slides[$i]['image']['sizes']['slide'] ?>" alt="" class="img-responsive carousel-slide">
          </div>
        <?php endfor ?>
      </div>
      <!-- /carousel-inner -->

      <?php /*
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
      */ ?>

    </div>
    <!-- /container -->
  </div>
  <!-- /carousel-front-page -->
<?php endif ?>