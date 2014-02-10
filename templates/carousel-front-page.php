<?php 
$images = get_posts(array(
  'post_type' => 'attachment',
  'post_mime_type' => 'image',
  'post_parent' => get_the_ID(),
  'posts_per_page' => -1,
));
?>

<div class="carousel slide" id="carousel-front-page" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php for ($i = 0; $i < count($images); $i++): ?>
      <li data-target="#carousel-front-page" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? 'active' : '' ?>"></li>
    <?php endfor ?>
  </ol>
  <div class="carousel-inner">
    <?php for ($i = 0; $i < count($images); $i++): ?>
      <div class="item <?php echo $i == 0 ? 'active' : '' ?>">
        <?php echo wp_get_attachment_image($images[$i]->ID, 'carousel') ?>
      </div>
    <?php endfor ?>
  </div>
  <a class="left carousel-control" href="#carousel-front-page" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-front-page" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>