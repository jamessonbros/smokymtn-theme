<?php
/**
 * Custom functions
 */

define('SMOKY_FB_URL', 'https://www.facebook.com/smokymtngetaways');



function smoky_heros()
{
  if (is_front_page()) {
    get_template_part('templates/carousel', 'front-page');
  }
}

/**
 * Advanced custom fields
 */
// Hide admin interface
define('ACF_LITE', true);
// Include Advanced Custom Fields files
include_once(dirname(__FILE__).'/advanced-custom-fields/acf.php');
// Activate ACF add-ons
include_once(dirname(__FILE__).'/acf-gallery/gallery.php');
include_once(dirname(__FILE__).'/acf-repeater/repeater.php');
// Include theme-specific custom fields
include_once(dirname(__FILE__).'/acf.php');

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
add_action('wp_enqueue_scripts', 'smoky_load_fonts');
function smoky_load_fonts()
{
  wp_register_style('gfont', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Belleza');

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

// misc nav css filtering
add_filter('nav_menu_css_class', 'smoky_filter_nav_menu_css_class', 10, 2);
function smoky_filter_nav_menu_css_class($classes, $item)
{
  // remove active class on blog nav item if not on `post` post_type
  if ($item->title == 'Blog') {
    if (!is_home() && !is_singular('post')) {
      // remove the active class
      $classes = array_diff($classes, array('active'));
    }
  }

  // add active class to rental/tax archives
  if (is_tax('rental_types') || is_singular('rental')) {
    // vacation
    if (is_tax('rental_types', 'vacation') || has_term('vacation', 'rental_types')) {
      if (false !== strpos($item->url, 'rentals/vacation'))
        $classes[] = 'active';
    }
    if (is_tax('rental_types', 'long-term') || has_term('long-term', 'rental_types')) {
      if (false !== strpos($item->url, 'rentals/long-term'))
        $classes[] = 'active';
    }
  }

  return $classes;
}


// rental CPT page titles
// If querying by bedrooms, append number of bedrooms to page title
add_filter('roots_title', 'smoky_rentals_titles', 500, 2);
function smoky_rentals_titles($title, $id)
{
  if (is_tax('rental_types')) {
    $bedrooms = get_query_var('bedrooms');
    if ($bedrooms) {
      $title = "$bedrooms Bedroom " . $title;
    }

    return $title;
  }

  return $title;
}


// rental url helpers
function get_booking_url($property_id)
{
  global $resco;
  $coid = $resco->get_COID();

  return 'http://secure.instantsoftwareonline.com/StayUSA/Availability.aspx?coid='.$resco->get_COID().'&amp;propid='.$property_id;
}
