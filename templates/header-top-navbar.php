<header class="site-header">
  <div class="stripe">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
          <div class="nav-container">
            <?php if (has_nav_menu('top_navigation')) {
              wp_nav_menu(array(
                'theme_location' => 'top_navigation',
                'container' => false,
                'menu_class' => 'list-inline',
                'menu_id' => 'top-nav',
              ));
            } ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <div class="nav-container">
            <?php if (has_nav_menu('top_right_navigation')) {
              wp_nav_menu(array(
                'theme_location' => 'top_right_navigation',
                'container' => false,
                'menu_class' => 'list-inline',
                'menu_id' => 'top-right-nav',
              ));
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /stripe -->
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="logo-container">
            <a href="<?php echo home_url() ?>" title="<?php bloginfo('name') ?>">
              <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('name') ?>" class="img-responsive">
            </a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
          <div class="nav-container">
            <?php if (has_nav_menu('primary_navigation')) {
              wp_nav_menu(array(
                'theme_location' => 'primary_navigation',
                'container' => false,
                'menu_class' => 'list-inline',
                'menu_id' => 'primary-nav',
              ));
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>