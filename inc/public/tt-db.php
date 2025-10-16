<?php

defined('ABSPATH') || exit('No Access');

class TT_db {


    public static function create_tables(){

        global $wpdb;

        $departments = $wpdb->prefix . 'tt_departments';
        $users = $wpdb->prefix . 'tt_users';
        $tickets = $wpdb->prefix . 'tt_tickets';
        $replies = $wpdb->prefix . 'tt_replies';


        $charset = $wpdb->get_charset_collate();


        $departments_sql = "CREATE TABLE IF NOT EXISTS `" . $departments ."` (
            `ID` bigint(20) NOT NULL AUTO_INCREMENT,
            `name` varchar(128) NOT NULL,
            `parent` bigint(20) NOT NULL DEFAULT '0',
            `position` int(11) NOT NULL DEFAULT '1',
            `description` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`ID`),
            KEY `parent` (`parent`))
            ENGINE=InnoDB " . $charset . ";";


        $users_sql = "CREATE TABLE IF NOT EXISTS `" . $users ."` (
            `ID` bigint(20) NOT NULL AUTO_INCREMENT,
            `department_id` bigint(20) NOT NULL,
            `user_id` bigint(20) NOT NULL,
            PRIMARY KEY (`ID`),
            KEY `department_id` (`department_id`),
            KEY `user_id` (`user_id`))
            ENGINE=InnoDB " . $charset . ";";


        $tickets_sql = "CREATE TABLE IF NOT EXISTS `" . $tickets ."` (
            `ID` bigint(20) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `body` text NOT NULL,
            `creator_id` bigint(20) DEFAULT NULL,
            `user_id` bigint(20) DEFAULT NULL,
            `user_name` varchar(64) DEFAULT NULL,
            `user_email` varchar(128) DEFAULT NULL,
            `user_phone` varchar(16) DEFAULT NULL,
            `from_admin` tinyint(1) DEFAULT NULL,
            `department_id` bigint(20) NOT NULL,
            `status` varchar(64) NOT NULL,
            `priority` varchar(32) NOT NULL,
            `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `reply_date` varchar(19) DEFAULT NULL,
            `voice` tinyint(512) DEFAULT NULL,
            `file` text DEFAULT NULL,
            PRIMARY KEY (`ID`),
            KEY `title` (`title`),
            KEY `creator_id` (`creator_id`),
            KEY `from_admin` (`from_admin`),
            KEY `department_id` (`department_id`),
            KEY `status` (`status`))
            ENGINE=InnoDB " . $charset . ";";


        $replies_sql = "CREATE TABLE IF NOT EXISTS `" . $replies ."` (
            `ID` bigint(20) NOT NULL AUTO_INCREMENT,
            `ticket_id` bigint(20) NOT NULL,
            `body` text NOT NULL,
            `creator_id` bigint(20) DEFAULT NULL,
            `from_admin` tinyint(1) DEFAULT NULL,
            `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `voice` tinyint(512) DEFAULT NULL,
            `file` text DEFAULT NULL,
            PRIMARY KEY (`ID`),
            KEY `ticket_id` (`ticket_id`))
            ENGINE=InnoDB " . $charset . ";";

        if (!function_exists('dbDelta')) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        }


        dbDelta($departments_sql);
        dbDelta($users_sql);
        dbDelta($tickets_sql);
        dbDelta($replies_sql);
    }

}