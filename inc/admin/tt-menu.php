<?php

defined('ABSPATH') || exit('No Access');

class TT_Menu extends Base_Menu{

    public function __construct()
    {
        $this->page_title = 'پشتیبانی تیک توک';
        $this->menu_title = 'تیک توک :)';
        $this->menu_slug = 'tiktook-plugin';
        $this->icon = TT_ADMIN_ASSETS . 'img/ticket.png';
        $this->has_sub_menu = true;
        $this->sub_items = [

            'settings' => [
                'page_title' => 'تنظیمات',
                'menu_title' => 'تنظیمات',
                'menu_slug' => 'tiktook-settings',
                'callback' => ''
            ],

            'tickets' => [
                'page_title' => 'لیست تیکت ها',
                'menu_title' => 'لیست تیکت ها',
                'menu_slug' => 'tt-tickets-list',
                'callback' => 'tt_tickets_list_page'
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

    public function tt_tickets_list_page(){

    }

    public function depratments_list_page(){
        
        $manager = new TT_Admin_Department_Manager();
        $manager->page();

    }

}