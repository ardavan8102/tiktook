<?php
defined('ABSPATH') || exit('No Access');

if (!class_exists('TT_Session_Manager')) {
    class TT_Session_Manager {
        

        public static function init() {
            // با هوک init اجرا میشه
            add_action('init', [__CLASS__, 'start_session'], 1);
        }

        public static function start_session() {
            if (session_status() === PHP_SESSION_NONE) {

                // 🔧 تنظیم مسیر جدید برای ذخیره سشن
                $session_path = WP_CONTENT_DIR . '/uploads/sessions';
                if (!file_exists($session_path)) {
                    mkdir($session_path, 0755, true);
                }
                ini_set('session.save_path', $session_path);

                session_start();
            }
        }

    }
}