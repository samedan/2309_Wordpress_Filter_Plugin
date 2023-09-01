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
    $mainPageHook = add_menu_page(
      'Words to Filter', // Document title
      'Word Filter', // Sidebar text
      'manage_options', // user permissions required
      'ourwordfilter', // slug
      array($this, 'wordFilterPage'), // html for the page
      'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+Cg==', // icon
      // plugin_dir_url(__FILE__).'custom.svg', // icon as original SVG
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

    // CSS custom for the Menu page
    add_action("load-{$mainPageHook}", array($this, 'mainPageAssets'));
  }

  // html for the MENU page
  function wordFilterPage() { ?>
    <div class="wrap">
      <h1>Word Filter</h1>
      <form method="POST">
          <label for="plugin_words_to_filter"><p>Enter a <strong>comma-separated</strong> list of words to filter from your site's content.</p></label>
          <div class="word-filter__flex-container">
            <textarea id="plugin_words_to_filter" name="plugin_words_to_filter" placeholder="bad, mean, awful, horrible"></textarea>
          </div>
          <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes" />
      </form>
    </div>
  <?php }

  // html for the SUBMENU page
  function optionsSubPage() { ?>
    Hello, world from the Options page
  <?php }

  // CSS custom for the Menu page
  function mainPageAssets() {
      wp_enqueue_style('filterAdminCss', plugin_dir_url(__FILE__).'styles.css');
  }

}

$ourWordFilterPlugin = new OurWorldFilterPlugin();

