<?php
/**
 * Theme Setup.
 *
 * @since 1.0.1
 *
 * @package Peacock
 */

namespace PEACOCK_THEME\Inc;

use PEACOCK_THEME\Inc\Traits\Singleton;

class ThemeSetup
{
    use Singleton;

    protected function __construct()
    {

        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks(){

        /**
         * Actions
         * 
         * @since 1.0.1
         */
        

    }

}