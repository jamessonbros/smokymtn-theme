<?php 

/* Theme's custom ACF fields */

// Slideshow
if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_slideshow',
    'title' => 'Slideshow',
    'fields' => array (
      array (
        'key' => 'field_5310fce4a861b',
        'label' => 'Slides',
        'name' => 'slides',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_5310fcfaa861c',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '1200x450 (pixel W x H)',
            'required' => 1,
            'column_width' => '',
            'save_format' => 'object',
            'preview_size' => 'slide',
            'library' => 'all',
          ),
        ),
        'row_min' => '',
        'row_limit' => 8,
        'layout' => 'row',
        'button_label' => 'Add Slide',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
