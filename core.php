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

require 'inc/public/tt-db.php';

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
        define('TT_INC_PATH', trailingslashit( TT_PATH . 'inc' ));
        define('TT_VIEWS_PATH', trailingslashit( TT_PATH . 'views' ));

        $tt_plugin_data = get_plugin_data(TT_BASE_FILE);

        $tt_plugin_version = $tt_plugin_data['Version'];
        define('TT_PLUGIN_VER', $tt_plugin_version);
    }

    public function init(){

        require_once TT_PATH . 'inc/admin/tt-session-manager.php';
        TT_Session_Manager::init();


        require_once TT_PATH . 'vendor/autoload.php';
        require_once TT_INC_PATH . 'admin/codestar/codestar-framework.php';
        require_once TT_INC_PATH . 'admin/settings/tt-settings.php';

        register_activation_hook( TT_BASE_FILE, [$this, 'active']);
        register_deactivation_hook( TT_BASE_FILE, [$this, 'deactive']);

        // Class Registrations
        new TT_Assets();

        if (is_admin()) {
            new TT_Menu();
            new TT_Admin_Ajax();
        }

    }

    // When Plugin Activates
    public function active(){
        TT_db::create_tables();
    }

    // When Plugin Deactivates
    public function deactive(){

    }


    public function admin_php_version_notice(){
        include TT_VIEWS_PATH . 'admin/notice-error.php';
    }

}

TT_Core::core_instance();

?>