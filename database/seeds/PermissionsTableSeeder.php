<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_settings',
                'table_name' => NULL,
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
                'permission_group_id' => NULL,
            ),
            9 => 
            array (
                'id' => 15,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            10 => 
            array (
                'id' => 16,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            11 => 
            array (
                'id' => 17,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            12 => 
            array (
                'id' => 18,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            13 => 
            array (
                'id' => 19,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            14 => 
            array (
                'id' => 20,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            15 => 
            array (
                'id' => 21,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            16 => 
            array (
                'id' => 22,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            17 => 
            array (
                'id' => 23,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            18 => 
            array (
                'id' => 24,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2017-05-07 21:33:08',
                'updated_at' => '2017-05-07 21:33:08',
                'permission_group_id' => NULL,
            ),
            19 => 
            array (
                'id' => 35,
                'key' => 'browse_conditions',
                'table_name' => 'conditions',
                'created_at' => '2017-05-07 22:24:08',
                'updated_at' => '2017-05-07 22:24:08',
                'permission_group_id' => NULL,
            ),
            20 => 
            array (
                'id' => 36,
                'key' => 'read_conditions',
                'table_name' => 'conditions',
                'created_at' => '2017-05-07 22:24:08',
                'updated_at' => '2017-05-07 22:24:08',
                'permission_group_id' => NULL,
            ),
            21 => 
            array (
                'id' => 37,
                'key' => 'edit_conditions',
                'table_name' => 'conditions',
                'created_at' => '2017-05-07 22:24:08',
                'updated_at' => '2017-05-07 22:24:08',
                'permission_group_id' => NULL,
            ),
            22 => 
            array (
                'id' => 38,
                'key' => 'add_conditions',
                'table_name' => 'conditions',
                'created_at' => '2017-05-07 22:24:08',
                'updated_at' => '2017-05-07 22:24:08',
                'permission_group_id' => NULL,
            ),
            23 => 
            array (
                'id' => 39,
                'key' => 'delete_conditions',
                'table_name' => 'conditions',
                'created_at' => '2017-05-07 22:24:08',
                'updated_at' => '2017-05-07 22:24:08',
                'permission_group_id' => NULL,
            ),
            24 => 
            array (
                'id' => 40,
                'key' => 'browse_data_participants',
                'table_name' => 'data_participants',
                'created_at' => '2017-05-07 22:38:35',
                'updated_at' => '2017-05-07 22:38:35',
                'permission_group_id' => NULL,
            ),
            25 => 
            array (
                'id' => 41,
                'key' => 'read_data_participants',
                'table_name' => 'data_participants',
                'created_at' => '2017-05-07 22:38:35',
                'updated_at' => '2017-05-07 22:38:35',
                'permission_group_id' => NULL,
            ),
            26 => 
            array (
                'id' => 42,
                'key' => 'edit_data_participants',
                'table_name' => 'data_participants',
                'created_at' => '2017-05-07 22:38:35',
                'updated_at' => '2017-05-07 22:38:35',
                'permission_group_id' => NULL,
            ),
            27 => 
            array (
                'id' => 43,
                'key' => 'add_data_participants',
                'table_name' => 'data_participants',
                'created_at' => '2017-05-07 22:38:35',
                'updated_at' => '2017-05-07 22:38:35',
                'permission_group_id' => NULL,
            ),
            28 => 
            array (
                'id' => 44,
                'key' => 'delete_data_participants',
                'table_name' => 'data_participants',
                'created_at' => '2017-05-07 22:38:35',
                'updated_at' => '2017-05-07 22:38:35',
                'permission_group_id' => NULL,
            ),
            29 => 
            array (
                'id' => 45,
                'key' => 'browse_designs',
                'table_name' => 'designs',
                'created_at' => '2017-05-07 22:46:22',
                'updated_at' => '2017-05-07 22:46:22',
                'permission_group_id' => NULL,
            ),
            30 => 
            array (
                'id' => 46,
                'key' => 'read_designs',
                'table_name' => 'designs',
                'created_at' => '2017-05-07 22:46:22',
                'updated_at' => '2017-05-07 22:46:22',
                'permission_group_id' => NULL,
            ),
            31 => 
            array (
                'id' => 47,
                'key' => 'edit_designs',
                'table_name' => 'designs',
                'created_at' => '2017-05-07 22:46:22',
                'updated_at' => '2017-05-07 22:46:22',
                'permission_group_id' => NULL,
            ),
            32 => 
            array (
                'id' => 48,
                'key' => 'add_designs',
                'table_name' => 'designs',
                'created_at' => '2017-05-07 22:46:22',
                'updated_at' => '2017-05-07 22:46:22',
                'permission_group_id' => NULL,
            ),
            33 => 
            array (
                'id' => 49,
                'key' => 'delete_designs',
                'table_name' => 'designs',
                'created_at' => '2017-05-07 22:46:22',
                'updated_at' => '2017-05-07 22:46:22',
                'permission_group_id' => NULL,
            ),
            34 => 
            array (
                'id' => 50,
                'key' => 'browse_instructions',
                'table_name' => 'instructions',
                'created_at' => '2017-05-07 22:55:26',
                'updated_at' => '2017-05-07 22:55:26',
                'permission_group_id' => NULL,
            ),
            35 => 
            array (
                'id' => 51,
                'key' => 'read_instructions',
                'table_name' => 'instructions',
                'created_at' => '2017-05-07 22:55:26',
                'updated_at' => '2017-05-07 22:55:26',
                'permission_group_id' => NULL,
            ),
            36 => 
            array (
                'id' => 52,
                'key' => 'edit_instructions',
                'table_name' => 'instructions',
                'created_at' => '2017-05-07 22:55:26',
                'updated_at' => '2017-05-07 22:55:26',
                'permission_group_id' => NULL,
            ),
            37 => 
            array (
                'id' => 53,
                'key' => 'add_instructions',
                'table_name' => 'instructions',
                'created_at' => '2017-05-07 22:55:26',
                'updated_at' => '2017-05-07 22:55:26',
                'permission_group_id' => NULL,
            ),
            38 => 
            array (
                'id' => 54,
                'key' => 'delete_instructions',
                'table_name' => 'instructions',
                'created_at' => '2017-05-07 22:55:26',
                'updated_at' => '2017-05-07 22:55:26',
                'permission_group_id' => NULL,
            ),
            39 => 
            array (
                'id' => 55,
                'key' => 'browse_form_elements',
                'table_name' => 'form_elements',
                'created_at' => '2017-05-07 23:37:07',
                'updated_at' => '2017-05-07 23:37:07',
                'permission_group_id' => NULL,
            ),
            40 => 
            array (
                'id' => 56,
                'key' => 'read_form_elements',
                'table_name' => 'form_elements',
                'created_at' => '2017-05-07 23:37:07',
                'updated_at' => '2017-05-07 23:37:07',
                'permission_group_id' => NULL,
            ),
            41 => 
            array (
                'id' => 57,
                'key' => 'edit_form_elements',
                'table_name' => 'form_elements',
                'created_at' => '2017-05-07 23:37:07',
                'updated_at' => '2017-05-07 23:37:07',
                'permission_group_id' => NULL,
            ),
            42 => 
            array (
                'id' => 58,
                'key' => 'add_form_elements',
                'table_name' => 'form_elements',
                'created_at' => '2017-05-07 23:37:07',
                'updated_at' => '2017-05-07 23:37:07',
                'permission_group_id' => NULL,
            ),
            43 => 
            array (
                'id' => 59,
                'key' => 'delete_form_elements',
                'table_name' => 'form_elements',
                'created_at' => '2017-05-07 23:37:07',
                'updated_at' => '2017-05-07 23:37:07',
                'permission_group_id' => NULL,
            ),
            44 => 
            array (
                'id' => 60,
                'key' => 'browse_select_options',
                'table_name' => 'select_options',
                'created_at' => '2017-05-07 23:41:09',
                'updated_at' => '2017-05-07 23:41:09',
                'permission_group_id' => NULL,
            ),
            45 => 
            array (
                'id' => 61,
                'key' => 'read_select_options',
                'table_name' => 'select_options',
                'created_at' => '2017-05-07 23:41:09',
                'updated_at' => '2017-05-07 23:41:09',
                'permission_group_id' => NULL,
            ),
            46 => 
            array (
                'id' => 62,
                'key' => 'edit_select_options',
                'table_name' => 'select_options',
                'created_at' => '2017-05-07 23:41:09',
                'updated_at' => '2017-05-07 23:41:09',
                'permission_group_id' => NULL,
            ),
            47 => 
            array (
                'id' => 63,
                'key' => 'add_select_options',
                'table_name' => 'select_options',
                'created_at' => '2017-05-07 23:41:09',
                'updated_at' => '2017-05-07 23:41:09',
                'permission_group_id' => NULL,
            ),
            48 => 
            array (
                'id' => 64,
                'key' => 'delete_select_options',
                'table_name' => 'select_options',
                'created_at' => '2017-05-07 23:41:09',
                'updated_at' => '2017-05-07 23:41:09',
                'permission_group_id' => NULL,
            ),
            49 => 
            array (
                'id' => 65,
                'key' => 'browse_studies',
                'table_name' => 'studies',
                'created_at' => '2017-05-07 23:44:35',
                'updated_at' => '2017-05-07 23:44:35',
                'permission_group_id' => NULL,
            ),
            50 => 
            array (
                'id' => 66,
                'key' => 'read_studies',
                'table_name' => 'studies',
                'created_at' => '2017-05-07 23:44:35',
                'updated_at' => '2017-05-07 23:44:35',
                'permission_group_id' => NULL,
            ),
            51 => 
            array (
                'id' => 67,
                'key' => 'edit_studies',
                'table_name' => 'studies',
                'created_at' => '2017-05-07 23:44:35',
                'updated_at' => '2017-05-07 23:44:35',
                'permission_group_id' => NULL,
            ),
            52 => 
            array (
                'id' => 68,
                'key' => 'add_studies',
                'table_name' => 'studies',
                'created_at' => '2017-05-07 23:44:35',
                'updated_at' => '2017-05-07 23:44:35',
                'permission_group_id' => NULL,
            ),
            53 => 
            array (
                'id' => 69,
                'key' => 'delete_studies',
                'table_name' => 'studies',
                'created_at' => '2017-05-07 23:44:35',
                'updated_at' => '2017-05-07 23:44:35',
                'permission_group_id' => NULL,
            ),
            54 => 
            array (
                'id' => 70,
                'key' => 'browse_study_loaders',
                'table_name' => 'study_loaders',
                'created_at' => '2017-05-07 23:52:51',
                'updated_at' => '2017-05-07 23:52:51',
                'permission_group_id' => NULL,
            ),
            55 => 
            array (
                'id' => 71,
                'key' => 'read_study_loaders',
                'table_name' => 'study_loaders',
                'created_at' => '2017-05-07 23:52:51',
                'updated_at' => '2017-05-07 23:52:51',
                'permission_group_id' => NULL,
            ),
            56 => 
            array (
                'id' => 72,
                'key' => 'edit_study_loaders',
                'table_name' => 'study_loaders',
                'created_at' => '2017-05-07 23:52:51',
                'updated_at' => '2017-05-07 23:52:51',
                'permission_group_id' => NULL,
            ),
            57 => 
            array (
                'id' => 73,
                'key' => 'add_study_loaders',
                'table_name' => 'study_loaders',
                'created_at' => '2017-05-07 23:52:51',
                'updated_at' => '2017-05-07 23:52:51',
                'permission_group_id' => NULL,
            ),
            58 => 
            array (
                'id' => 74,
                'key' => 'delete_study_loaders',
                'table_name' => 'study_loaders',
                'created_at' => '2017-05-07 23:52:51',
                'updated_at' => '2017-05-07 23:52:51',
                'permission_group_id' => NULL,
            ),
            59 => 
            array (
                'id' => 75,
                'key' => 'browse_personality_items',
                'table_name' => 'personality_items',
                'created_at' => '2017-05-07 23:55:27',
                'updated_at' => '2017-05-07 23:55:27',
                'permission_group_id' => NULL,
            ),
            60 => 
            array (
                'id' => 76,
                'key' => 'read_personality_items',
                'table_name' => 'personality_items',
                'created_at' => '2017-05-07 23:55:27',
                'updated_at' => '2017-05-07 23:55:27',
                'permission_group_id' => NULL,
            ),
            61 => 
            array (
                'id' => 77,
                'key' => 'edit_personality_items',
                'table_name' => 'personality_items',
                'created_at' => '2017-05-07 23:55:27',
                'updated_at' => '2017-05-07 23:55:27',
                'permission_group_id' => NULL,
            ),
            62 => 
            array (
                'id' => 78,
                'key' => 'add_personality_items',
                'table_name' => 'personality_items',
                'created_at' => '2017-05-07 23:55:27',
                'updated_at' => '2017-05-07 23:55:27',
                'permission_group_id' => NULL,
            ),
            63 => 
            array (
                'id' => 79,
                'key' => 'delete_personality_items',
                'table_name' => 'personality_items',
                'created_at' => '2017-05-07 23:55:27',
                'updated_at' => '2017-05-07 23:55:27',
                'permission_group_id' => NULL,
            ),
            64 => 
            array (
                'id' => 80,
                'key' => 'browse_item_scales',
                'table_name' => 'item_scales',
                'created_at' => '2017-05-07 23:59:09',
                'updated_at' => '2017-05-07 23:59:09',
                'permission_group_id' => NULL,
            ),
            65 => 
            array (
                'id' => 81,
                'key' => 'read_item_scales',
                'table_name' => 'item_scales',
                'created_at' => '2017-05-07 23:59:09',
                'updated_at' => '2017-05-07 23:59:09',
                'permission_group_id' => NULL,
            ),
            66 => 
            array (
                'id' => 82,
                'key' => 'edit_item_scales',
                'table_name' => 'item_scales',
                'created_at' => '2017-05-07 23:59:09',
                'updated_at' => '2017-05-07 23:59:09',
                'permission_group_id' => NULL,
            ),
            67 => 
            array (
                'id' => 83,
                'key' => 'add_item_scales',
                'table_name' => 'item_scales',
                'created_at' => '2017-05-07 23:59:09',
                'updated_at' => '2017-05-07 23:59:09',
                'permission_group_id' => NULL,
            ),
            68 => 
            array (
                'id' => 84,
                'key' => 'delete_item_scales',
                'table_name' => 'item_scales',
                'created_at' => '2017-05-07 23:59:09',
                'updated_at' => '2017-05-07 23:59:09',
                'permission_group_id' => NULL,
            ),
        ));
        
        
    }
}