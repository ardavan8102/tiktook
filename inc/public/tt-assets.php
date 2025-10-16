<?php

defined('ABSPATH') || exit('No Access');

class TT_Assets{

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'front_assets']);
        add_action( 'admin_enqueue_scripts', [$this, 'admin_assets']);
    }


    public function admin_assets(){
        // Scripts
        wp_enqueue_script('tt-select2-js', TT_ADMIN_ASSETS . 'js/select2.min.js', ['jquery'], '', true);
        wp_enqueue_script('tt-app', TT_ADMIN_ASSETS . 'js/app.js', ['jquery'], TT_PLUGIN_VER, true);

        // Localize
        wp_localize_script('tt-app', 'TT_DATA', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('tt_search_users'),
        ]);

        // Styles
        wp_enqueue_style('tt-admin-style', TT_ADMIN_ASSETS . 'css/style.css', '', TT_PLUGIN_VER);
        wp_enqueue_style('tt-select2-style', TT_ADMIN_ASSETS . 'css/select2.min.css', '', TT_PLUGIN_VER);
    }


    public function front_assets(){
        wp_enqueue_style('tt-style', TT_FRONT_ASSETS . 'css/style.css', '', TT_PLUGIN_VER);
    }

}