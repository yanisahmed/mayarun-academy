<?php

namespace Mayarun\Academy\Frontend;

/**
 * Shortcode handler class
 * 
 */

 class Shortcode {

    /**
     * Initialize the class
     */
     function __construct() {
         add_shortcode('mayarun-academy', [ $this, 'render_shortcode' ] );
     }

     /**
      * Shortcode handler class
      * 
      * @param array $atts
      * @param string $content
      * 
      * @retrun string
      */

     public function render_shortcode( $atts, $content = '' ) {
        return 'Hello from shortcode';
     }
 }