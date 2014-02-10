<?php
/**
 * Custom functions
 */


// load favicon
add_action('wp_head', 'smoky_load_icons');
function smoky_load_icons()
{
  ?>
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/favicon.ico">
  <link rel="SHORTCUT ICON" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/assets/img/apple-touch-icon-152x152.png">
  <?php
}


// load custom fonts
add_action('wp_enqueue_styles', 'smoky_load_fonts');
function smoky_load_fonts()
{
  wp_register_style('gfont', '#URL-to-google-fonts#');

  wp_enqueue_style('gfont');
}



// filter menu items, ensure full URL
add_filter('nav_menu_link_attributes', 'smoky_filter_nav_menu_items', 10, 3);
function smoky_filter_nav_menu_items($atts, $item, $args)
{
  $href = $atts['href'];
  $home_url = home_url();
  $first_char = substr($href, 0, 1);

  // if menu item starts with /
  if ($first_char === '/') {
    $atts['href'] = $home_url.$atts['href'];
  }

  return $atts;
}