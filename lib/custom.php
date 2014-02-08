<?php
/**
 * Custom functions
 */


// load favicon
add_action('wp_head', 'smoky_load_favicon');
function smoky_load_favicon()
{
  ?>
  <link rel="icon" href="<?php echo home_url() ?>/favicon.ico">
  <link rel="SHORTCUT ICON" href="<?php echo home_url() ?>/favicon.ico">
  <?php
}


// load custom fonts
add_action('wp_enqueue_styles', 'smoky_load_fonts');
function smoky_load_fonts()
{
  wp_register_style('gfont', '#URL-to-google-fonts#');

  wp_enqueue_style('gfont');
}