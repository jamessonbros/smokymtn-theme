<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <?php smoky_heros() ?>

  <div class="wrap container" role="document">
    <?php if (roots_display_sidebar()) : ?>
      <div class="row visible-xs">
        <div class="col-xs-12 sidebar-mobile">
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target=".sidebar-mobile-container">
            <span class="glyphicon glyphicon-th-list"></span>
            <span>Page Menu</span>
          </button>
          <div class="collapse sidebar-mobile-container"></div>
        </div>
      </div>
    <?php endif ?>
    <div class="content row">
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?> hidden-xs" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
