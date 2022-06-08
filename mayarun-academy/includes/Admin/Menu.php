<?php

namespace Mayarun\Academy\Admin;

/**
 * The menu handler class
 */

 class Menu {

    function  __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
     }

     function admin_menu() {
         add_menu_page( __( 'Mayarun Academy', 'mayarun_academy' ), __( 'Academy', 'mayarun_academy'  ), 'manage_options', 'mayarun-academy', [ $this, 'plugin_page' ], 'dashicons-welcome-learn-more', null  );
     }

     function plugin_page() {
         echo 'Hello World';
     }
 }