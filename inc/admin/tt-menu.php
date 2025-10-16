<?php

defined('ABSPATH') || exit('No Access');

class TT_Menu extends Base_Menu{

    public function __construct()
    {
        $this->page_title = 'پشتیبانی تیک توک';
        $this->menu_title = 'تنظیمات تیک توک';
        $this->menu_slug = 'tiktook-plugin';
        $this->icon = TT_ADMIN_ASSETS . 'img/ticket.png';
        $this->has_sub_menu = true;
        $this->sub_items = [

            'settings' => [
                'page_title' => 'تنظیمات اصلی',
                'menu_title' => 'تنظیمات اصلی',
                'menu_slug' => 'tt-general-settings',
                'callback' => 'settings_page'
            ],

            'departments' => [
                'page_title' => 'دپارتمان ها',
                'menu_title' => 'دپارتمان ها',
                'menu_slug' => 'tt-depratment-list',
                'callback' => 'depratments_list_page'
            ],
            
        ];

        $this->position = 3;

        parent::__construct();
    }

    public function page(){

    }

    public function settings_page(){

    }

}