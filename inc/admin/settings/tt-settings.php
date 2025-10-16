<?php

defined('ABSPATH') || exit('No Access');

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'tt_settings';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'framework_title' => 'تیکت پشتیبانی تیـــک تـــوک',

    'menu_title' => 'تنظیمات تیک توک',
    'menu_slug'  => 'tiktook-settings',
    'menu_hidden' => true,

    // Show Extras
    'show_footer' => false,
    'ajax_save' => true,
    'sticky_header' => true,
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Tab Title 1',
    'fields' => array(

      //
      // A text field
      array(
        'id'    => 'opt-text',
        'type'  => 'text',
        'title' => 'Simple Text',
      ),

    )
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Tab Title 2',
    'fields' => array(

      // A textarea field
      array(
        'id'    => 'opt-textarea',
        'type'  => 'textarea',
        'title' => 'Simple Textarea',
      ),

    )
  ) );

}
