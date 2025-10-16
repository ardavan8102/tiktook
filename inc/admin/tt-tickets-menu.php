<?php

defined('ABSPATH') || exit('No Access');

class TT_Tickets_Menu extends Base_Menu{

    public function __construct()
    {
        $this->page_title = 'لیست تیکت ها';
        $this->menu_title = 'لیست تیکت ها';
        $this->menu_slug = 'tiktook-tickets-list';
        $this->icon = TT_ADMIN_ASSETS . 'img/ticket.png';
        $this->has_sub_menu = false;
        $this->position = 3;

        parent::__construct();
    }

    public function page(){

    }


    public function deleted_tickets_list_page(){

    }

}