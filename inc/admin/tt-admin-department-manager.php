<?php

defined('ABSPATH') || exit('No Access');


class TT_Admin_Department_Manager {

    private $wpdb;
    private $tableName;

    public function __construct() {

        global $wpdb;
        $this->wpdb = $wpdb;
        $this->tableName = $wpdb->prefix . 'tt_departments';

    }

    public function page(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Add Department
            if (isset($_POST['add_department_nonce'])) {

                if (!isset($_POST['add_department_nonce']) || !wp_verify_nonce( $_POST['add_department_nonce'], 'add_department')){
                    exit('Sorry, Your Nonce did not verified.');
                }

                $insert = $this->insert_department($_POST);

                if ($insert) {
                    wp_redirect( admin_url('admin.php?page=tt-depratment-list'));
                    exit;
                }
            }
            
        } else {
            $departments = $this->get_departments();

            include TT_VIEWS_PATH . "admin/departments/main.php";
        }

        

    }


    private function get_departments(){

        return $this->wpdb->get_results(
            "SELECT * FROM " . $this->tableName . " ORDER BY position"
        );

    }


    private function get_single_department_info($id){

        return $this->wpdb->get_row(
            $this->wpdb->prepare(
                "SELECT * FROM " . $this->tableName . " WHERE ID = %d",
                $id
            )
            
        );

    }



    private function insert_department($data){

        $data = [
            'name' => sanitize_text_field( $data['name'] ),
            'parent' => $data['parent'] ? intval($data['parent']) : 0,
            'position' => $data['position'] ? intval($data['position']) : 0,
            'description' => $data['description'] ? sanitize_textarea_field( $data['description']) : null
        ];

        $data_format = [
            '%s', '%d', '%d', '%s'
        ];

        $insert_process = $this->wpdb->insert(
            $this->tableName,
            $data,
            $data_format,
        );

        return $insert_process ? $this->wpdb->insert_id : null;

    }

}