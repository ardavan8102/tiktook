<?php
/*
Plugin Name: تیک توک - سیستم تیکت آنلاین
Plugin URI: https://ardavaneskandari.ir
Description: این افزونه برای وبسایت شما یک سیستم تیکت مدرن و جذاب اضافه میکند تا بتوانید هر چه راحت تر با مشتریان خود درارتباط باشید. کاملا رایگان :)
Author: Ardavan Eskandari
Version: 1.0.0
Author URI: https://ardavaneskandari.ir
*/

defined('ABSPATH') || exit('No Access');

class TT_Core {

    // Singleton Method
    // Check Core Instance Existence
    private static $_instance = null;

    const MINIMUM_PHP_VERSION = '8.1';

    public static function core_instance(){
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct() {

        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_php_version_notice']);
            return;
        }

        $this->constants();
        $this-> active();
        $this-> init();
    }

    public function constants(){
        define('TT_BASE_FILE' , __FILE__);
        define('TT_PATH' , trailingslashit(plugin_dir_path(TT_BASE_FILE)));
        define('TT_URL' , trailingslashit(plugin_dir_url(TT_BASE_FILE)));
        define('TT_ADMIN_ASSETS', trailingslashit( TT_URL . 'assets/admin' ));
        define('TT_FRONT_ASSETS', trailingslashit( TT_URL . 'assets/frontend' ));

        $tt_plugin_data = get_plugin_data(TT_BASE_FILE);

        $tt_plugin_version = $tt_plugin_data['Version'];
        define('TT_PLUGIN_VER', $tt_plugin_version);
    }

    public function init(){

        require_once TT_PATH . 'vendor/autoload.php';

        register_activation_hook( TT_BASE_FILE, [$this, 'active']);
        register_deactivation_hook( TT_BASE_FILE, [$this, 'deactive']);

        // Class Registrations
        new TT_Assets();

        if (is_admin()) {
            new TT_Menu();
            new TT_Tickets_Menu();
        }

    }

    // When Plugin Activates
    public function active(){
        TT_db::create_tables();
    }

    // When Plugin Deactivates
    public function deactive(){

    }


    public function admin_php_version_notice(){?>

        <style>

            .error-notice-custom {
                background-color: crimson !important;
                color: white !important;
                border-radius: 12px;
                box-shadow: 0 10px 24px #ed143d70;
                border: none;
            }
            .error-notice-custom p {
                padding: 12px !important;
                font-size: 16px !important;
                font-weight: 500 !important;
            }

            .notice-dismiss {
                background-color: white;
                padding: 6px;
                border-radius: 100px;
                top: 25%;
                left: 1%;
            }

        </style>

        <div class="notice notice-error error-notice-custom is-dismissible">
           <p>
             افزونه تیک توک برای اجرای صحیح نیاز به نسخه php 8.1 به بالا دارد. لطفا نسخه php هاست خود را ارتقا دهید.
           </p>
        </div>

<?
    }

}

TT_Core::core_instance();