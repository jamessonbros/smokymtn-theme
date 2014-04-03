<header class="site-header">
  <div class="stripe">
    <div class="container">
      <div class="row hidden-md hidden-lg">
        <div class="col-xs-12 col-sm-12">
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target=".nav-mobile-container">
            <span>
              <span class="glyphicon glyphicon-th-list"></span> 
              Main Menu
            </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse nav-mobile-container"></div>
        </div>
      </div>
      <div class="row hidden-xs hidden-sm">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
          <div class="nav-container nav-container-stripe-primary">
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
          <div class="nav-container nav-container-stripe-secondary">
            <ul class="list-inline" id="nav-contact">
              <li><a href="<?php echo SMOKY_FB_URL ?>" target="_blank" title="Find us on Facebook"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/fb.png" alt="Find us on Facebook"></a></li>
              <li><a href="tel:+18285868058">
                <span class="glyphicon glyphicon-phone-alt"></span>
                (828) 586-8058
              </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /stripe -->
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="logo-container">
            <a href="<?php echo home_url() ?>" title="<?php bloginfo('name') ?>">
              <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('name') ?>" class="img-responsive">
            </a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 hidden-xs hidden-sm">
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