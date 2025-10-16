<?php
defined('ABSPATH') || exit('No Access');

class TT_Admin_Ajax {
    public function __construct() {
        add_action('wp_ajax_tt_search_users',        [$this, 'department_admin_search_users']); // ویرگولِ تهش حذف
        add_action('wp_ajax_nopriv_tt_search_users', [$this, 'department_admin_search_users']); // برای کاربر لاگ‌اوت
    }

    public function department_admin_search_users(){

        //
        if (isset($_POST['nonce'])) {
            check_ajax_referer('tt_search_users', 'nonce');
        }

        // term یا q را بپذیر
        $term = '';
        if (isset($_POST['term'])) {
            $term = sanitize_text_field(wp_unslash($_POST['term']));
        } elseif (isset($_POST['q'])) {
            $term = sanitize_text_field(wp_unslash($_POST['q']));
        }

        if ($term === '') {
            wp_send_json([]); // 
        }

        $args = [
            'search'         => '*' . $term . '*',
            'search_columns' => ['user_login', 'user_email', 'user_nicename'],
            'number'         => 20,
        ];

        $users = (new WP_User_Query($args))->get_results();

        $items = [];
        if (!empty($users)) {
            foreach ($users as $user) {
                $items[] = [
                    'id'   => $user->ID,
                    'text' => $user->user_login . ' (' . $user->user_email . ')',
                ];
            }
        }

        wp_send_json($items);
    }
}
