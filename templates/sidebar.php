<?php 
// if showing rentals or rental taxonomy
if (is_post_type_archive('rental') || is_tax('rental_types')) {
  if (is_tax('rental_types', 'vacation')) {
    dynamic_sidebar('vacation');
  } elseif (is_tax('rental_types', 'long-term')) {
    dynamic_sidebar('long-term');
  }
} 
elseif (is_singular('rental')) {
  global $post;

  $terms = wp_get_object_terms(get_the_ID(), 'rental_types');
  if (!is_wp_error($terms) && isset($terms[0]) && is_object($terms[0])) {
    $term = $terms[0];
    if (is_active_sidebar($term->slug)) {
      dynamic_sidebar($term->slug);
    }
  }
}
elseif (is_page()) {
  global $post;

  $real_estate_page = get_page_by_path('real-estate');
  $real_estate_page_id = $real_estate_page->ID;
  $area_info_page = get_page_by_path('area-information');
  $area_info_page_id = $area_info_page->ID;

  // if showing real estate page or sub-page
  if (is_page($real_estate_page_id) || in_array($real_estate_page_id, $post->ancestors)) {
    dynamic_sidebar('real-estate');
  } elseif (is_page($area_info_page_id) || in_array($area_info_page_id, $post->ancestors)) {
    dynamic_sidebar('area-info');
  } else {
    dynamic_sidebar('sidebar-primary');
  }
}
else {
  dynamic_sidebar('sidebar-primary');
}