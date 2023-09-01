<?php 

/*
 Plugin Name: Our Word Filter Plugin
 Description: Replaces a list of words.
 Version: 1.0
 Author: Dan
 Author URI: https://articole.smart.eu

*/

if(! defined('ABSPATH')) exit; // Exit if accessed directly

class OurWorldFilterPlugin {
  function __construct() {
    add_action('admin_menu', array($this, 'ourMenu'));
  }

  function ourMenu() {
    add_menu_page(
      'Words to Filter', // Document title
      'Word Filter', // Sidebar text
      'manage_options', // user permissions required
      'ourwordfilter', // slug
      array($this, 'wordFilterPage'), // html for the page
      'dashicons-smiley', // icon
      100, // number whre menu appears vertically, 1-Top, 100-Down
    );

    // FIRST ITEM IN THE SUBMENU that copies the MENU Item and Link
    add_submenu_page( // Used to display the first Item in the SubMenu
      'ourwordfilter', // menu to add the submenu
      'Words to Filter', // name of the submenu in browser
      'Words lists', // text in sidebar
      'manage_options', // capability for users to see the page
      'ourwordfilter',// slug
      array($this, 'wordFilterPage'), // funtion that outputs the html
    );
    // End FIRST ITEM IN THE SUBMENU that copies the MENU Item and Link

    add_submenu_page(
      'ourwordfilter', // menu to add the submenu
      'Word Filter Options', // name of the submenu in browser
      'Options', // text in sidebar
      'manage_options', // capability for users to see the page
      'word-filter-options',// slug
      array($this, 'optionsSubPage'), // funtion that outputs the html
    );
  }

  // html for the MENU page
  function wordFilterPage() { ?>
    Hello, world
  <?php }

  // html for the SUBMENU page
  function optionsSubPage() { ?>
    Hello, world from the Options page
  <?php }

}

$ourWordFilterPlugin = new OurWorldFilterPlugin();

