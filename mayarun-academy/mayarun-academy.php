<?php

/**
 * Plugin name: Mayrun Academy
 * Description: A tutorial plugin for mayarun
 * Author: Yanis Ahmed
 * Plugin URI: https://www.mayarun.com
 * Author URI: https://www.mayarun.com
 * Version: 1.0
 * License: GPL2 or later
 * License URI:
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */

final class Mayarun_Academy
{
    /**
     * plugin version
     * 
     * @var string
     */
    const version = '1.0'; 

    /**
     * 
     * class constructor
     */
    private function __construct()
    {
        $this->define_constants();

        register_activation_hook( __FILE__ , [ $this, 'activate' ]  );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initailize a singleton instance 
     * 
     * @return \Mayarun_Academy
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * define the requested plugin constant
     * 
     * @return void
     */
    public function define_constants() {
        define( 'MR_ACADEMY_VERSION', self::version );
        define( 'MR_ACADEMY_FILE', __FILE__ );
        define( 'MR_ACADEMY_PATH', __DIR__ );
        define( 'MR_ACADEMY_URL', plugins_url('', MR_ACADEMY_FILE ) );
        define( 'MR_ACADEMY_ASSETS', MR_ACADEMY_URL . '/assets' );
    }


    /**
     * Initialize the plugin
     * 
     * @return void
     */
    public function init_plugin() {
         new Mayarun\Academy\Admin\Menu();
    }

    /**
     * do stuffs upon plugin activation
     * 
     * @return void
     */
    public function activate() {
        $installed = get_option( 'mr_academy_installed' );
        if( ! $installed ){
            update_option( 'mr_academy_installed', time() );
        }
        update_option( 'mr_academy_version', MR_ACADEMY_VERSION );
    }

    
}

/**
 * Initialize the main plugin
 * 
 * @return \Mayarun_Academy
 */

function mayarun_academy() {
    return Mayarun_Academy::init();
}

 //Kick off the plugin
 
mayarun_academy();
