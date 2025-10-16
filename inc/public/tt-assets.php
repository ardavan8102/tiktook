<?php

defined('ABSPATH') || exit('No Access');

class TT_Assets{

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'front_assets']);
        add_action( 'admin_enqueue_scripts', [$this, 'admin_assets']);
    }


    public function admin_assets(){
        wp_enqueue_script('tt-app-js', TT_ADMIN_ASSETS . 'js/app.js', ['jquery'], TT_PLUGIN_VER, true);
    }


    public function front_assets(){
        wp_enqueue_style('tt-style', TT_FRONT_ASSETS . 'css/style.css', '', TT_PLUGIN_VER);
    }

}